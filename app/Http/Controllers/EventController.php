<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

use App\Http\Requests;
use App\Event;
use Auth;


class EventController extends Controller
{

    public function index()
    {
        $event = Event::all();
        return view('events.index',compact('event'));
 
    }

    public function create()
    {
        return view('events.create');
    }

    public function store(Request $request)
    {
        $event = new Event;
        $event->user_id = Auth::user()->id;
        $event->title = $request->title;
        $event->description = $request->description;
        $event->date = $request->date;
        $event->venue = $request->venue;
        $event->save();

        return redirect()->route('home')->with('success','New Event Created Successfully');

    }

    public function show($id)
    {
        $event = Event::find($id);
        return view('events.show' ,compact('event'));
        
    }

    public function edit($id)
    {
        $event = Event::find($id);
        return view('events.edit' ,compact('event'));
        
    }

    public function update(Request $request, $id)
    {
          Event::find($id)->update($request->all());
          return redirect()->route('events.index')->with('success','Updated successfully');
    }

    public function destroy($id)
    {
        Event::find($id)->delete();
        return redirect()->route('events.index')->with('success','Deleted successfully');
    }
}
