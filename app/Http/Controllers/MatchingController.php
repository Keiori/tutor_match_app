<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Admin;
use App\Models\Subject;
use App\Models\Matching;

class MatchingController extends Controller
{
    public function index(Admin $admin, Matching $matching, Request $request)
    {
        $admins = $admin->all();
        $matchings = [];
        
        foreach($admins as $admin) {
            if ($matching->where('admin_id', $admin->id)->where('is_accepted', 0)->exists()) {
                $matchings[$admin->id] = 0;
            }elseif ($matching->where('admin_id', $admin->id)->where('is_accepted', 1)->exists()) {
                $matchings[$admin->id] = 1;
            }else {
                $matchings[$admin->id] = 2;
            }
        }
        
        $subjects = Subject::all();
        $search_admins = $admin->all();
        $selected = $request['subjects_array'];
        $search_results = [];
        
        foreach($search_admins as $search_admin) {
            $is_searched = true;
            if(!is_null($selected)) {
                foreach ($selected as $subject_id) {
                    if($search_admin->subjects()->where('id', $subject_id)->exists() === false) {
                        $is_searched = false;
                        break;
                    }
                }
                if($is_searched) {
                    $search_results[$search_admin->id] = $search_admin;
                }
            }
        }

        return view('matching')->with(['admins'=>$admins, 'matchings'=>$matchings, 'subjects'=>$subjects, 'search_results'=>$search_results]);
    }
    
    
    public function apply(Matching $matching, Admin $admin)
    {
        $user = Auth::user();
        $matching->user_id = $user["id"];
        $matching->admin_id = $admin["id"];
        $matching->save();
        return redirect()->route('matching');
    }
    
    
    public function cancel(Matching $matching, Admin $admin)
    {
        $user = Auth::user();
        $matching = Matching::where('user_id', $user["id"])->where('admin_id', $admin["id"])->first();
        $matching->delete();
        return redirect()->route('matching');
    }
}
