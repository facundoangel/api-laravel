<?php

namespace App\Http\Controllers;

use App\Models\Note;
use Illuminate\Http\Request;
use App\Http\Requests\noteRequest;

class noteController extends Controller
{


 

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json([
            'status' => 'success',
            'notes' => Note::all()
        ],200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(noteRequest $request)
    {
        $validated = $request->validated();

  
        $note = Note::create($validated);
        return response()->json([
            'status' => 'success',
            'note' => $note
        ],201);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(noteRequest $request)
    {
        $validated = $request->validated();

        

        
        $note = Note::create($validated);
        return response()->json([
            'status' => 'success',
            'note' => $note
        ],201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $note = Note::find($id);
        if(!empty($id) && $note){
            
            return response()->json([
                'status' => 'success',
                'note' => $note
            ],200);
        }
        return response()->json([
            'status' => 'error',
            'message' => 'Note not found'
        ],404);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $note = Note::find($id);


        if(!empty($id) && $note){
            $note->title = $request->title;
            $note->description = $request->description;
            $note->save();
            return response()->json([
                'status' => 'success',
                'note' => $note
            ],200);
        }else{
            return response()->json([
                'status' => 'error',
                'message' => 'Note not found'
            ],404);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $note = Note::find($id);

        if(!empty($id) && $note){
            $note->delete();
            return response()->json([
                'status' => 'success',
                'message' => 'Note deleted'
            ],200);
        }else{
            return response()->json([
                'status' => 'error',
                'message' => 'Note not found'
            ],404);
        }
    }
}
