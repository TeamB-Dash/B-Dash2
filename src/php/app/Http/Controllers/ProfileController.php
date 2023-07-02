<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use App\Mail\SendInquiryMail;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\View\View;
use App\Models\UserProfile;
use App\Models\Department;
use App\Models\UserFollow;
use App\Models\Inquiry;
use App\Models\User;
use App\Models\UserRole;
use App\Services\SearchService;

class ProfileController extends Controller
{
    public function edit(Request $request): View
    {
        $user = $request->user();
        $user_profile = UserProfile::where('user_id', $user->id)->first();
        $departments = Department::all();
        $followings = $user->followings()->get();
        $followeds = $user->followeds()->get();

        return view('profile.edit', [
            'user' => $user,
            'user_profile' => $user_profile,
            'departments' => $departments,
            'followings' => $followings,
            'followeds' => $followeds,
        ]);
    }

    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $user = $request->user();
        $user_profile = UserProfile::where('user_id', $user->id)->first();

        $user->name = $request->name;
        $user->department_id = $request->department_id;
        $user->beginner_flg = $request->beginner_flg;
        // $request->user()->id = $request->email;
        $user->email = $request->email;
        $user->entry_date = $request->entry_date;
        $user->gender = $request->gender;
        $user_profile->blood_type = $request->blood_type;
        $user_profile->birthday = $request->birthday;
        $user_profile->github_url = $request->github_url;
        $user_profile->qiita_url = $request->qiita_url;
        $user_profile->self_introduction = $request->self_introduction;

        $request->user()->save();
        $user_profile->save();

        return redirect()->route('profile.edit');
    }

    // public function destroy(Request $request): RedirectResponse
    // {
    //     $request->validateWithBag('userDeletion', [
    //         'password' => ['required', 'current-password'],
    //     ]);

    //     $user = $request->user();

    //     Auth::logout();

    //     $user->delete();

    //     $request->session()->invalidate();
    //     $request->session()->regenerateToken();

    //     return Redirect::to('/');
    // }

    public function followingUserDestroy($id)
    {
        UserFollow::where('user_id', $id)->delete();
        return redirect()->route('profile.edit');
    }

    public function followedUserDestroy($id)
    {
        UserFollow::where('followed_user_id', $id)->delete();
        return redirect()->route('profile.edit');
    }

    /**
     * ユーザー検索
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function searchUser(Request $request)
    {
        $request->merge(['status' => 'working']);
        $users = SearchService::searchUser($request);
        $departments = Department::all();

        return view('profile/searchUser',compact('users','departments'));
    }

    /**
     * 問い合わせを新規作成し、担当の管理者へメール通知を行う
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function submitInquiry(Request $request)
    {
        $rules = [
            'body' => ['max:1000','required'],
        ];

        $user_name = User::find($request->user_id)->name;
        $toUser = User::whereHas('role',function($query){
            $query->where('inquiry_send',1);
        })->select('email')->get()->toArray();
        $ccUser = User::whereHas('role',function($query){
            $query->where('inquiry_send',0);
        })->select('email')->get()->toArray();

        DB::beginTransaction();
        try{
            $this->validate($request,$rules);
            $inquiry = Inquiry::create([
                'user_id' => $request->user_id,
                'body' => $request->inquiry,
                'referer' => $request->referer,
            ]);
            DB::commit();
            $this->sendEmail($user_name,$inquiry->body,$toUser,$ccUser);
            return to_route('questions.index')->with('status','お問い合わせを送信しました');
        }catch(\Exception $e){
            DB::rollBack();
            dd($e->getMessage());
            return to_route('questions.index')->with('status','お問い合わせの送信に失敗しました');
        }
    }

    /**
     * メールを送信する処理
     *
     * @param $body 問い合わせ内容
     * @param $name 問い合わせしたユーザー名
     * @param $toUser toに設定した管理者（=user_roleテーブルのinquiry_sendカラムが1のユーザー）
     * @param $toUser ccに設定した管理者（=user_roleテーブルのinquiry_sendカラムが2のユーザー）
     *
     * @return void
     */
    public function sendEmail($body,$name,$toUser,$ccUser){
        Mail::to($toUser)->cc($ccUser)->send(new SendInquiryMail($body,$name));
    }

}
