<x-app-layout>

    <x-container>
        @if($posts->isNotEmpty())
        <div class="text-lg text-white grid-cols-1 gap-1">
            <div class="flex items-center mb-3">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="48" height="48" color="#ffffff" fill="none">
                <circle cx="12" cy="12" r="10" stroke="currentColor" stroke-width="1.5" />
                <path d="M7.5 17C9.8317 14.5578 14.1432 14.4428 16.5 17M14.4951 9.5C14.4951 10.8807 13.3742 12 11.9915 12C10.6089 12 9.48797 10.8807 9.48797 9.5C9.48797 8.11929 10.6089 7 11.9915 7C13.3742 7 14.4951 8.11929 14.4951 9.5Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" />
                </svg>
                <p class="ml-3">{{ $posts->first()->user->name }}</p>
                
            </div>
            
            <div class="flex items-center text-sm color text-gray-400 ">
                <p>Joined {{ $posts->first()->user->created_at->format('F Y') }}</p>
            </div>
            
        </div>
            
        @endif

        <form action="{{route('friends.store', $user)}}" class="px-4 mb-8" method="POST">
            @csrf 
            <div class="flex justify-end">
            <x-submit-button>Add Friend</x-submit-button>
            </div>
        </form>

        @foreach($posts as $post)

        <x-card class="mb-4">
            {{ $post->body }}
            <div class="text-xs text-slate-500">
                {{ $post -> created_at -> diffForHumans() }}
            </div>
        </x-card>
        @endforeach
    </x-container>

</x-app-layout>