<?php

namespace App\Http\Controllers;

use Barryvdh\DomPDF\Facade\Pdf;
use Validator;
use App\Models\Event;
use Illuminate\Http\Request;
use Carbon\Carbon;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('event.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        request()->validate(Event::$rules);
        $evento=Event::create($request->all());
        
    }

    /**
     * Display the specified resource.
     */
    public function show(Event $event)
    {
        $evento=Event::all();
        return response()->json($evento);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        //
        $evento=Event::find($id);
        $evento->start=Carbon::createFromFormat('Y-m-d H:i:s', $evento->start)->format('Y-m-d H:i:s');
        $evento->end=Carbon::createFromFormat('Y-m-d H:i:s', $evento->end)->format('Y-m-d H:i:s');
        return response()->json($evento);
        
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Event $event)
    {
        //
        request()->validate(Event::$rules);
        $event->update($request->all());
        return response()->json($event);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //
        $evento=Event::find($id)->delete();

        return response()->json($evento);

    }

    public function imprimir()
    {
        //$eventos = Event::all();
        $date = Carbon::now()->locale('es');
        $eventos = Event::whereMonth('end', '=', Carbon::now())->orderBy('id','ASC')->paginate(500);
        $pdf = Pdf::loadView('event.pdf', compact('eventos','date'));
        return $pdf->stream();
    }
}
