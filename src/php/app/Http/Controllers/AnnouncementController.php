<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Announcement;

class AnnouncementController extends Controller
{
    public function showAll(){
        $announcements = Announcement::orderBy('created_at','DESC')->paginate(10);
        return view('admin/announcement/showAllPage',compact('announcements'));
    }
    public function create(){
        return view('admin/announcement/create');
    }
    public function store(Request $request){
        return to_route('admin.announcement.showAll');
    }
}
