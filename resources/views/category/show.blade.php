<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{   __('Category')   }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <x-alert-success>
                {{ session('success')}}
            </x-alert-success>
            <div class="flex">
              
                <p class="opacity-70"><strong>Created: </strong>{{  $category->created_at->diffForHumans() }}</p>
                <p class="opacity-70 ml-8"><strong>Updated: </strong>{{  $category->updated_at->diffForHumans() }}</p>
                
                
                <a href="{{ route('categories.edit', $category )}}" class="btn-link ml-auto">Edit Category</a>
                <form action="{{ route('categories.destroy', $category)}}" method="post">
                @method('delete') 
                @csrf 
                <button type="submit" class="btn btn-danger ml-4" onclick="return confirm('Are you sure you wish to delete forever')">Delete Category</button>
                </form>

                           
             </div>
         
            
             <div class="my-6 p-6 bg-white border-b border-gray-200 shadow-sm sm:rounded-lg">
                <h2 class="font-bold text-4xl">
                 {{ $category->title }} 
                 </h2>                 
                 <p>Notes under {{ $category->title }} {{  $category->note()->count() }}</p>
                     
            </div>
           
    </div>
</x-app-layout>
