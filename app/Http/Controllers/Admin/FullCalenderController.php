<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Event;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Spatie\GoogleCalendar\Event as CalendarEvent;

class FullCalenderController extends Controller
{
    public function index(Request $request)
    {
  
        if($request->ajax()) {
            $start_date =  Carbon::parse( $request->start);
            $end_date =  Carbon::parse($request->end);

            // $data = Event::whereDate('start', '>=', $request->start)
            // ->whereDate('end',   '<=', $request->end)
            // ->where('user_id',Auth::id())
            // ->get(['id', 'title', 'start', 'end']);

            $events = CalendarEvent::get($start_date,$end_date);
            $event_data = array();
            foreach($events as $event){
                $event_data[] = array(
                    'id' => $event->id,
                    'title' => $event->name,
                    'start' => $event->start->dateTime,
                    'end' => $event->end->dateTime,
                );
            }
            return response()->json($event_data);
        }
  
        return view('fullcalender');
    }

    public function ajax(Request $request)
    {
        $user_id = Auth::id();
        switch ($request->type) {
           case 'add':
                // $event = Event::create([
                //   'title' => $request->title,
                //   'start' => $request->start,
                //   'end' => $request->end,
                //   'user_id' => $user_id,
                // ]);
                $event = CalendarEvent::create([
                    'name' => $request->title,
                    'startDateTime' => Carbon::parse($request->start),
                    'endDateTime' => Carbon::parse($request->end),
                 ]);    
                $event_data = array(
                    'id' => $event->id,
                    'title' => $event->name,
                    'start' => $event->start->dateTime,
                    'end' => $event->end->dateTime,
                );        
                return response()->json($event_data);
             break;
  
            case 'update':
                $event = CalendarEvent::find($request->id)->update([
                    'name' => $request->title,
                    'startDateTime' => Carbon::parse( $request->start),
                    'endDateTime' => Carbon::parse($request->end),
                ]);
                $event_data = array(
                    'id' => $event->id,
                    'title' => $event->name,
                    'start' => $event->start->dateTime,
                    'end' => $event->end->dateTime,
                );        
                return response()->json($event_data);
            break;
  
           case 'delete':
            //   $event = Event::find($request->id)->delete();
              $event = CalendarEvent::find($request->id)->delete();
              return response()->json($event);
             break;
             
           default:
             # code...
             break;
        }
    }    
    
    public function googleEventList()
    {
        $events = calendarEvents();
        if(count($events) > 0) : 
            foreach($events as $key=>$event) : 
                if($key==4) break;
                echo '<li>
                    <p class="text-muted mb-2">'.\Carbon\Carbon::parse($event->start->dateTime)->format("j F, Y") .'</p>
                    <p class="mb-2">'.$event->name.'</p>
                </li>';                            
            endforeach;
        else:
            echo '<li><p class="mb-2 text-danger">No upcoming events available!</p></li>';
        endif;        
    }
}
