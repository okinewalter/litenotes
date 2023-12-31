<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create Note') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">           
            <div class="my-6 p-6 bg-white border-b border-gray-200 shadow-sm sm:rounded-lg">
 
                 <form action="{{ route('notes.store') }}" method="post">
                 @csrf
                 <x-text-input 
                 type="text" 
                 name="title" 
                 field="title" 
                 placeholder="Title" 
                 class="w-full" 
                 atuocomplete=off
                 :value="@old('title')"></x-text-input>
                 <x-textarea 
                 name="text" 
                 rows="10" 
                 field="text" 
                 placeholder="Start typing here..." 
                 class="w-full mt-6"
                 :value="@old('text')"></x-textarea>
                 <x-checkbox-input 
                 name="public" 
                 class="mt-6"
                 label="Make Public"                
                 :value="old('public')"></x-checkbox-input>
                 <x-dropdown-input
                 name="category_id"
                 class="mt-6"
                 label="Category"
                 :options="$categories"                 
                 :selected="old('category_id')"></x-dropdown-input>
                 <x-primary-button class="mt-6">Save Note</x-primary-button>
                 </form>
            </div>
        </div>
    </div>
</x-app-layout>
