<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Event;
use App\Models\User;
use Illuminate\Console\Scheduling\Event as SchedulingEvent;

class EventController extends Controller
{
    public function index(){

        $search = request('search');

        if($search){ 

            $events = Event::where([
                ['title', 'like', '%'.$search.'%']
            ])->get();
        } else {
            $events = Event::all();
        }

    return view('welcome', ['events' => $events, 'search' => $search]);
    }

    public function create(){
        return view('events.create'); 
    }

    public function contact(){
        return view('contact');
    }

    public function store(Request $request){
        $event = new Event;

        $event->title = $request->title;
        $event->date = $request->date;
        $event->city = $request->city;
        $event->private = $request->private;
        $event->description = $request->description;
        $event->items = $request->items;

        if($request->hasfile('image') && $request->file('image')->isValid()){
            
            $requestImage = $request->image;

            $extension = $requestImage->extension();

            $imageName = md5($requestImage->getClientOriginalName() . strtotime("now") . "." . $extension);

            $requestImage->move(public_path('img/events'), $imageName);

            $event->image = $imageName;
        } 

        $user = auth()->user();
        $event->user_id = $user->id;

        $event->save();

        return redirect('/')->with('msg', 'Frete criado com sucesso 👍!');
    }

    public function show($id){

        $event = Event::findOrFail($id);

        $eventOwner = User::where('id', $event->user_id)->first()->toArray();

        return view('events.show', ['event' => $event, 'eventOwner' => $eventOwner]);
        
    }

    public function dashboard(){
        $user = auth()->user();

        $events = $user->events;

        return view('events.dashboard', ['events' => $events]);
    }
    
}
