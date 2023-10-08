<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Admin;
use App\Models\Matching;

class MatchingOfAdminController extends Controller
{
    public function index(Matching $matching){
        $matchings = $matching->where('admin_id', Auth::id())->where('is_accepted', 0)->get();
        $applicants = [];
        $matched_users = $matching->where('admin_id', Auth::id())->where('is_accepted', 1)->get();
        $matched_lists = [];
        
        foreach($matchings as $matching){
            $applicants[] = $matching->user()->first();
        }
        
        foreach($matched_users as $matched_user){
            $matched_lists[] = $matched_user->user()->first();
        }
        
        return view('admin.matching')->with(['matchings'=>$matchings, 'applicants'=>$applicants, 'matched_lists'=>$matched_lists]);
    }
    
    public function accept(Matching $matching){
        $matching->is_accepted = 1;
        $matching->save();
        return redirect()->route('admin.matching');
    }
    
    public function reject(Matching $matching){
        $matching->is_accepted = 2;
        $matching->save();
        return redirect()->route('admin.matching');
    }
}
