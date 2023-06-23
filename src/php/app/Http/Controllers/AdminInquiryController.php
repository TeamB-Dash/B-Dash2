<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminInquiryController extends Controller
{
    public function showAll(){
        return view('admin/inquiry/showAllPage');
    }
    public function mailList(){
        return view('admin/inquiry/mailList');
    }
    public function store(Request $request){
        return to_route('admin.inquiry.showAll');
    }
}
