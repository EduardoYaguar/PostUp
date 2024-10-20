<x-app-layout>

    <x-container>
        <form action="{{ route('posts.store') }}" class="px-4 mb-8" method="POST">
            @csrf 
            <textarea name="body" placeholder="What's on your mind?" rows="2" class="p-0 w-full mb-2 text-white bg-transparent border-0 border-b-2 border-slate-800 focus:border-b-slate-700 focus:ring-0 resize-none overflow-hidden"></textarea>
            <div class="flex justify-end">
            <x-submit-button>Post !</x-submit-button>
            </div>
        </form>


        @foreach($posts as $post)
        <a href="{{route('profile.show', $post->user)}}" class="px-6 mb-2 flex items-center gap-2 font-medium text-slate-100">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24" color="#ffffff" fill="none">
        <circle cx="12" cy="12" r="10" stroke="currentColor" stroke-width="1.5" />
        <path d="M7.5 17C9.8317 14.5578 14.1432 14.4428 16.5 17M14.4951 9.5C14.4951 10.8807 13.3742 12 11.9915 12C10.6089 12 9.48797 10.8807 9.48797 9.5C9.48797 8.11929 10.6089 7 11.9915 7C13.3742 7 14.4951 8.11929 14.4951 9.5Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" />
        </svg>

            {{$post->user->name}}
        </a>
        <x-card class="mb-4">
            {{ $post->body }}
            <div class="text-xs text-slate-500">
                {{ $post -> created_at -> diffForHumans() }}
            </div>
        </x-card>
        @endforeach
    </x-container>

</x-app-layout>