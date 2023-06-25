<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Inquiry;

class AdminInquiryController extends Controller
{
    public function showAll(){
        $inquiries = Inquiry::with(['user'])->orderBy('created_at','DESC')->paginate(10);
        // dd($inquiries);
        return view('admin/inquiry/showAllPage',compact('inquiries'));
    }
    public function mailList(){
        return view('admin/inquiry/mailList');
    }
    public function store(Request $request){
        return to_route('admin.inquiry.showAll');
    }
}
