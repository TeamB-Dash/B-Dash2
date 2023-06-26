<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Inquiry;
use App\Models\User;

class AdminInquiryController extends Controller
{
    public function showAll(){
        $inquiries = Inquiry::with(['user'])->orderBy('created_at','DESC')->paginate(10);
        // dd($inquiries);
        return view('admin/inquiry/showAllPage',compact('inquiries'));
    }
    public function mailList(){
        $users = User::with(['role'])->whereHas('role',function($query){
            $query->where('role','=','0');
        })
        ->get();

        return view('admin/inquiry/mailList',compact('users'));
    }

    public function update(Request $request){

        if(isset($request->deleteRole)){
            $user = User::with(['role'])->find($request->deleteRole);
            $user->role->inquiry_send = 0;
            $user->role->save();
        } else if(isset($request->addRoleTo)){
            $user = User::with(['role'])->find($request->addRoleTo);
            $user->role->inquiry_send = 1;
            $user->role->save();
        } else if(isset($request->addRoleCc)){
            $user = User::with(['role'])->find($request->addRoleCc);
            $user->role->inquiry_send = 2;
            $user->role->save();
        }
        return to_route('admin.inquiry.mailList');
    }
}
