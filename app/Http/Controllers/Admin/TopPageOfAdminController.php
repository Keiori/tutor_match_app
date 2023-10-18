<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Admin;
use App\Models\Subject;
use App\Models\Matching;
use App\Models\Event;
use Carbon\Carbon;

class TopPageOfAdminController extends Controller
{
    public function index(Event $event)
    {
        $sex_options = ['男', '女', 'その他'];
        $institution_options = ['大学', '大学院', '社会人'];
        $grade_options = ['大学1年生', '大学2年生', '大学3年生', '大学4年生', '修士1年生', '修士2年生', '社会人'];
        $teach_experience_options = ['1年未満', '1年以上2年未満', '2年以上3年未満', '3年以上4年未満', '4年以上5年未満', '5年以上'];
        
        $events = Event::orderBy('date', 'asc')->where('admin_id', Auth::id())->get();
        $future_events = [];
        $past_events = [];
        $now = Carbon::today();

        foreach($events as $event) {
            if ($now->lte($event->date)) {
                $future_events[] = $event;
            }else {
                $past_events[] = $event;
            }
        }

        return view('admin.dashboard')->with([
            'sex_options' => $sex_options,
            'institution_options' => $institution_options,
            'grade_options' => $grade_options,
            'teach_experience_options' => $teach_experience_options,
            'events' => $events,
            'future_events' => $future_events,
            'past_events' => $past_events
        ]);
    }
    
    public function add(Matching $matching, Event $event)
    {
        $matchings = $matching->where('admin_id', Auth::id())->where('is_accepted', 1)->get();
        $matched_user_ids = [];
        foreach($matchings as $matching){
            $matched_user_ids[] = $matching->user_id;
        }
        
        $matched_users = User::whereIn('id', $matched_user_ids)->get();

        return view('admin.add_schedule')->with(['matched_users' => $matched_users, 'event' => $event]);
    }
    
    public function store(Request $request, Event $event)
    {
        $input = $request['event'];
        $input['admin_id'] = Auth::id();
        $event->fill($input)->save();
        return redirect('/admin/dashboard/');
    }
    
    public function edit(Matching $matching, Event $event)
    {
        $matchings = $matching->where('admin_id', Auth::id())->where('is_accepted', 1)->get();
        $matched_user_ids = [];
        foreach($matchings as $matching){
            $matched_user_ids[] = $matching->user_id;
        }
        
        $matched_users = User::whereIn('id', $matched_user_ids)->get();
        
        return view('admin.edit_schedule')->with(['matched_users' => $matched_users, 'event' => $event]);
    }
    
    public function update(Request $request, Event $event)
    {
        $update_event = $request['event'];
        $event->fill($update_event)->save();

        return redirect('/admin/dashboard/');
    }
    
    public function delete(Event $event)
    {
        $event->delete();
        return redirect('/admin/dashboard/');
    }
}
