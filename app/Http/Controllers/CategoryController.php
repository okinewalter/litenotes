<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;
 

class CategoryController extends Controller
{
     /**
     * Display a listing of the resource.
     */
    public function index()
    {    
       $category = Category::whereBelongsTo(Auth::user())->latest('updated_at')->paginate(5);
       return view('category.index')->with('categories', $category);        
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('category.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|max:120',
             Rule::unique('categories')->where(function ($query) use ($request) {
                return $query->where('slug', Str::slug($request->input('slug')));
            })         
        ]);
        
        Auth::user()->categories()->create([           
            'slug' => Str::slug($request->title),
            'title' =>$request->title,
          
        ]);

        return redirect()->route('categories.index');
      

    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
       if(!$category->user->is(Auth::user())){
          return abort(403);
       }
        return view('category.show')->with('category', $category);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        if(!$category->user->is(Auth::user())){
            return abort(403);
         }
          return view('category.edit')->with('category', $category);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
    {
        if(!$category->user->is(Auth::user())){
            return abort(403);
         }
         
        $request->validate([
            'title' => 'required|max:120',
            'text' => 'required'
        ]);
        
        $category->update([   
            'title' =>$request->title,
          
        ]);

        return redirect()->route('category.show', $category)->with('success','Category updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        if(!$category->user->is(Auth::user())){
            return abort(403);
         }

        if($category->note()->count() > 0){
            return redirect()->route('category.index')->with('success','Category has Notes, therefore you cannot delete them');
         }
        
        $category->delete();

        return redirect()->route('category.index')->with('success','Category deleted');
    }
}
