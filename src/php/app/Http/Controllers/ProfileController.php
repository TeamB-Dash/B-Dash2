<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use App\Models\UserProfile;
use App\Models\Department;
use App\Models\UserFollow;

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
}