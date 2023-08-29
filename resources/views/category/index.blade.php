<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{   __('Categories')  }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <x-alert-success>
                {{ session('success')}}
            </x-alert-success>

            
            <a href="{{ route('categories.create') }}" class="btn-link btn-lg mb-2">+ New Category</a>
         

            @forelse($categories as $category)
             <div class="my-6 p-6 bg-white border-b border-gray-200 shadow-sm sm:rounded-lg">
                <h2 class="font-bold text-2xl">
                <a 
                    
                    href="{{ route('categories.show', $category) }}"
             
                    >{{ $category->title }}
                </a>
                </h2>
                
                <span class="block mt-4 text-sm opacity-70">{{  $category->updated_at->diffForHumans() }}</span>
            </div>
            @empty 
                      
            <p>You have no category yet.
           

            @endforelse
           {{  $categories->links() }}
    </div>
</x-app-layout>
