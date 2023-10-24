<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Admin;
use App\Models\Matching;
use App\Models\Chatting;

class ChattingController extends Controller
{
    public function index(Matching $matching)
    {
        $matched_users = $matching->where('user_id', Auth::id())->where('is_accepted', 1)->get();
        $matched_lists = [];
        
        foreach($matched_users as $matched_user){
            $matched_lists[] = $matched_user->admin()->first();
        }
        return view('chatting')->with(['matched_lists'=>$matched_lists]);
    }
    
    public function private_chatting(Chatting $chatting, Admin $admin)
    {
        $chattings = $chatting->where('user_id', Auth::id())->where('admin_id', $admin->id)->get();
        
        return view('private_chatting')->with(['chattings'=>$chattings, 'admin'=>$admin]);
    }
    
    public function store(Request $request, Chatting $chatting, Admin $admin)
    {
        $input_chat['chatting'] = $request['chatting'];
        $input_chat['user_id'] = Auth::id();
        $input_chat['admin_id'] = $admin->id;
        $input_chat['is_admin'] = false;
        $chatting->fill($input_chat)->save();
        return back();
    }
}
