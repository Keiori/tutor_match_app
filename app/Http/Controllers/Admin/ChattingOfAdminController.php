<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Admin;
use App\Models\Matching;
use App\Models\Chatting;

class ChattingOfAdminController extends Controller
{
    public function index(Matching $matching)
    {
        $matched_users = $matching->where('admin_id', Auth::id())->where('is_accepted', 1)->get();
        $matched_lists = [];
        
        foreach($matched_users as $matched_user){
            $matched_lists[] = $matched_user->user()->first();
        }
        return view('admin.chatting')->with(['matched_lists'=>$matched_lists]);
    }
    
    public function private_chatting(Chatting $chatting, User $user)
    {
        $chattings = $chatting->where('admin_id', Auth::id())->where('user_id', $user->id)->get();
        return view('admin.private_chatting')->with(['chattings'=>$chattings, 'user'=>$user]);
    }
    
    public function store(Request $request, Chatting $chatting, User $user)
    {
        $input_chat['chatting'] = $request['chatting'];
        $input_chat['user_id'] = $user->id;
        $input_chat['admin_id'] = Auth::id();
        $input_chat['is_admin'] = true;
        
        $chatting->fill($input_chat)->save();
        return back();
    }
}
