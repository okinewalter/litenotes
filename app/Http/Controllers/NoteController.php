<?php

namespace App\Http\Controllers;

use App\Models\Note;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NoteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {   
       //$notes = Note::where('user_id', Auth::id())->latest('updated_at')->paginate(5);
       //$notes = Auth::user()->notes()->latest('updated_at')->paginate(5);
       $notes = Note::whereBelongsTo(Auth::user())->latest('updated_at')->paginate(5);
       return view('notes.index')->with('notes', $notes);        
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::where('user_id', Auth::id())->get();
        return view('notes.create', compact('categories'));         
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|max:120',
            'text' => 'required',         
            'category_id' => 'nullable|exists:categories,id' // Validate that the selected category exists in the categories table
        ]);
        
        Auth::user()->notes()->create([           
            'uuid' => Str::uuid(),
            'title' =>$request->title,
            'text' =>$request->text,
            'public' => $request->has('public') ? false : true,
            'category_id' => $request->input('category_id')
        ]);

        return redirect()->route('notes.index');
      

    }

    /**
     * Display the specified resource.
     */
    public function show(Note $note)
    {
       if(!$note->user->is(Auth::user())){
          return abort(403);
       }
        return view('notes.show')->with('note', $note);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Note $note)
    {
        if(!$note->user->is(Auth::user())){
            return abort(403);
        }

        $categories = Category::where('user_id', Auth::id())->get();
        return view('notes.edit', compact('note', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Note $note)
    {
        if(!$note->user->is(Auth::user())){
            return abort(403);
         }
         
        $request->validate([
            'title' => 'required|max:120',
            'text' => 'required'
        ]);
        
        $note->update([   
            'title' =>$request->title,
            'text' =>$request->text,
            'public' => $request->has('public') ? false : true,
            'category_id' => $request->input('category_id')
        ]);

        return redirect()->route('notes.show', $note)->with('success','Note updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Note $note)
    {
        if(!$note->user->is(Auth::user())){
            return abort(403);
         }
        
        $note->delete();

        return redirect()->route('notes.index')->with('success','Note moved to trash');
    }
}
