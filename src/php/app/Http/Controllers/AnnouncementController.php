<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AnnouncementController extends Controller
{
    public function showAll(){
        return view('admin/announcement/showAllPage');
    }
    public function create(){
        return view('admin/announcement/create');
    }
    public function store(Request $request){
        return to_route('admin.announcement.showAll');
    }
}
