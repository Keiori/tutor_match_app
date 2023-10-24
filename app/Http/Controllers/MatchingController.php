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
        $appliers = $matching->where('user_id', Auth::id())->where('is_accepted', 0)->get();
        // 承認済
        $matchers = $matching->where('user_id', Auth::id())->where('is_accepted', 1)->get();
        
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
            'admins' => $admins, 
            'matchings' => $matchings, 
            'subjects' => $subjects, 
            'search_results' => $search_results, 
            'appliers' => $appliers,
            'matchers' => $matchers
        ]);
    }
    
    public function show_profile(Admin $admin)
    {
        $sex_options = ['男', '女', 'その他'];
        $institution_options = ['大学', '大学院', '社会人'];
        $grade_options = ['大学1年生', '大学2年生', '大学3年生', '大学4年生', '修士1年生', '修士2年生', '社会人'];
        $teach_experience_options = ['1年未満', '1年以上2年未満', '2年以上3年未満', '3年以上4年未満', '4年以上5年未満', '5年以上'];
        
        return view('show_profile')->with([
            'sex_options' => $sex_options,
            'institution_options' => $institution_options,
            'grade_options' => $grade_options,
            'teach_experience_options' => $teach_experience_options,
            'admin' => $admin
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
