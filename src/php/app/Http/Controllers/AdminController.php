<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Services\SearchUserService;
use App\Models\User;
use App\Models\UserRole;
use App\Models\Department;

use function PHPUnit\Framework\isEmpty;
use function PHPUnit\Framework\isNull;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        return view('admin/top');
    }

    public function users(Request $request)
    {
        $users = SearchUserService::searchUser($request);
        $departments = Department::all();

        return view('admin/users/index',compact('users','departments'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin/users/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        return to_route('admin.top')->with('status', 'user created!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::find($id);
        return view('admin/users/show',compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);
        return view('admin/users/edit',compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        return to_route('admin.top')->with('status', 'update completed!');
    }

    public function showDeletePage($id){
        $user = User::find($id);
        return view('admin/users/deletePage',compact('user'));
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        UserRole::where('user_id',$id)->delete();
        return redirect()->back()->with('status', '削除しました');
    }

    public function roles(){
        $users = User::whereHas('role',function($query){
            $query->where('role','=','0');
        })
        ->get();
        return view('admin/users/showRoles',compact('users'));
    }

    public function registerNewRole(Request $request){
        $users = collect([]);
        $request->merge(['status' => 'working']);
        if(isset($request->name)){
            $users = SearchUserService::searchUser($request);
        }

        return view('admin/users/registerRolePage',compact('users'));
    }

    public function storeNewRole($id){
        $user = User::with(['role'])->find($id);
        if(!is_null($user->deleted_at) && is_null($user->role)){
            $userRole = UserRole::create([
                'user_id' => $id,
                'role' => 0,
            ]);
            return to_route('admin.users.role')->with('status','登録しました');
        } else if($user->role->role === 0) {
            return to_route('admin.users.role')->with('status','既に登録済みです');
        } else {
            return to_route('admin.users.role')->with('status','登録できないユーザーです');
        }
    }
}
