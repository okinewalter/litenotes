<?php

namespace App\Http\Controllers;

use App\Models\Note;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PublicController extends Controller
{
      /**
     * Display a listing of the resource.
     */
    public function index()
    {   

       $notes = Note::where('public', false)->latest('updated_at')->paginate(5);
       return view('public.index')->with('notes', $notes);        
    }


    /**
     * Display the specified resource.
     */
    public function show(Note $note)
    {
       if($note->public){
          return abort(403);
       }
        return view('public.show')->with('note', $note);
    }
 
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Note $note)
    {
        if (!$note->user->is(Auth::user())) {
            return abort(403);
        }

        
        
       if ($note->public ==  0) {
            $note->update([
                'public' => 1,
            ]);
 
            return redirect()->route('notes.show', $note)->with('success', 'Note made Private');
        } else {
            $note->update([
                'public' => 0,  
            ]);
     
            return redirect()->route('public.show', $note)->with('success', 'Note made Public');
        }
    }
 
}
