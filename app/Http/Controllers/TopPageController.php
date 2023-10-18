<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Admin;
use App\Models\Subject;
use App\Models\Matching;
use App\Models\Event;
use Carbon\Carbon;

class TopPageController extends Controller
{
    public function index(Event $event)
    {
        $sex_options = ['男', '女', 'その他'];
        $grade_options = ['中学1年生', '中学2年生', '中学3年生', '高校1年生', '高校2年生', '高校3年生', '既卒生'];
        $goal_options = ['受験', '学校フォロー', '内部進学'];
        
        $events = Event::orderBy('date', 'asc')->where('user_id', Auth::id())->get();
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

        return view('dashboard')->with([
            'sex_options' => $sex_options,
            'grade_options' => $grade_options,
            'goal_options' => $goal_options,
            'events' => $events,
            'future_events' => $future_events,
            'past_events' => $past_events
        ]);
    }
    
    public function show(Event $event)
    {
        return view('show_schedule')->with(['event' => $event]);
    }
}
