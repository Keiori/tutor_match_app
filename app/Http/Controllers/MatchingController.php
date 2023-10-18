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
        // allの部分をtake等を使うことによって取得件数を限定
        $admins = $admin->all();
        // 講師一覧
        $matchings = [];
        // 申請中
        $applying = $matching->where('user_id', Auth::id())->where('is_accepted', 0)->get();
        // 承認済
        $is_applied = $matching->where('user_id', Auth::id())->where('is_accepted', 1)->get();
        
        // 講師一覧を表示する際にボタンの切り替え処理
        foreach($admins as $admin) {
            if ($matching->where('admin_id', $admin->id)->where('user_id', Auth::id())->where('is_accepted', 0)->exists()) {
                $matchings[$admin->id] = 0;
            }elseif ($matching->where('admin_id', $admin->id)->where('user_id', Auth::id())->where('is_accepted', 1)->exists()) {
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

        return view('matching')->with([
            'admins'=>$admins, 
            'matchings'=>$matchings, 
            'subjects'=>$subjects, 
            'search_results'=>$search_results, 
            'applying'=>$applying,
            'is_applied'=>$is_applied
        ]);
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
