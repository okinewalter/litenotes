<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ !$note->trashed() ? __('Notes') : __('Trashed') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <x-alert-success>
                {{ session('success')}}
            </x-alert-success>
            <div class="flex">
               
                <p class="opacity-70"><strong>Created: </strong>{{  $note->created_at->diffForHumans() }}</p>
                <p class="opacity-70 ml-8"><strong>Updated: </strong>{{  $note->updated_at->diffForHumans() }}</p>
                
                
 



                 
  
             </div>
         
            
             <div class="my-6 p-6 bg-white border-b border-gray-200 shadow-sm sm:rounded-lg">
                <h2 class="font-bold text-4xl">
                 {{ $note->title }} 
                 </h2>
                 <span class="bg-yellow-200">Category: {{ $note->category ? $note->category->title : 'No Category' }}</span>
                 <span class="bg-green-200">Status: {{ $note->public ? 'Private' : 'Public' }}</span>
                 <span class="bg-pink-200">Author: {{ $note->user->name}}</span>
                <p class="mt-6 whitespace-pre-wrap">{{ $note->text }}</p>               
            </div>
           
    </div>
</x-app-layout>
