<?php 

use Spatie\GoogleCalendar\Event as CalendarEvent;

if(!function_exists('calendarEvents'))
{
    function calendarEvents()
    {
        $events = CalendarEvent::get();
        return $events;
    }
}

if(!function_exists('flashMessageSet'))
{
    function flashMessageSet($msg, $class)
    {
        Session::flash('message', $msg); 
        Session::flash('alert-class', $class); 
    }
}

if(!function_exists('flashMessageGet'))
{
    function flashMessageGet()
    {
        $class = Session::get('alert-class');
        $message = Session::get('message');
        if($message){
            echo '<div class="alertFlash alert alert-'.$class.'" role="alert"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>'.$message.'</div>';
        }
    }
}