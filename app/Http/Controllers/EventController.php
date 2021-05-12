<?php

namespace App\Http\Controllers;

use App\Http\Requests\EventStoreRequest;
use App\Http\Requests\EventUpdateRequest;
use App\Http\Resources\EventCollection;
use App\Http\Resources\EventResource;
use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;
use Illuminate\Support\Facades\Storage;


class EventController extends Controller
{

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        // ['purchases' => new PurchaseCollection(Auth::user()->account->accountable->purchases()->with(['transactions', 'purchasedItems', 'courier'])->paginate())]

        // 'prescription_image' => Storage::disk('s3')->temporaryUrl($this->file, now()->addMinutes(5)),

        return Inertia::render('Dashboard', [
            // 'events' => Event::all()->where('user_id', Auth::user()->id),
            'events' => new EventCollection(Auth::user()->events)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return Inertia::render(
            'CompleteEvent'
        );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(EventStoreRequest $request)
    {
        $event = $request->user()->events()->save(new Event($request->only('title', 'event_date', 'about')));

        $imgFileName = $event->id . '.' . $request->file->getClientOriginalExtension();
        $filePath = 'eventFiles/' . $imgFileName;

        Storage::disk('s3')->put($filePath, file_get_contents($request->file));

        $event->file = $filePath;
        $event->save();

        return redirect()->route('events.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function edit(Event $event)
    {
        return Inertia::render(
            'UpdateEvent',
            ['event' => new EventResource($event)]
        );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function update(EventUpdateRequest $request, Event $event)
    {
        // dd($request->all());
        $event->fill([
            "title" => $request->input('title'),
            "about" => $request->input('about'),
            "event_date" => $request->input('event_date'),
        ])->save();

        return redirect()->route('events.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function destroy(Event $event)
    {
        $event->delete();
        return redirect()->route('events.index');
    }
}
