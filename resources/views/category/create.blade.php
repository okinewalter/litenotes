<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create Category') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">           
            <div class="my-6 p-6 bg-white border-b border-gray-200 shadow-sm sm:rounded-lg">
 
                 <form action="{{ route('categories.store') }}" method="post">
                 @csrf
                 <x-text-input 
                 type="text" 
                 name="title" 
                 field="title" 
                 placeholder="Title" 
                 class="w-full" 
                 atuocomplete=off
                 :value="@old('title')"></x-text-input>
                  
                 <x-primary-button class="mt-6">Save Category</x-primary-button>
                 </form>
            </div>
        </div>
    </div>
</x-app-layout>
