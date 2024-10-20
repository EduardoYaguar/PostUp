<x-app-layout>

    <x-container>
        <form action="{{ route('posts.store') }}" class="px-4 mb-8" method="POST">
            @csrf 
            <textarea name="body" placeholder="Comment your ideas..." rows="2" class="p-0 w-full mb-2 text-white bg-transparent border-0 border-b-2 border-slate-800 focus:border-b-slate-700 focus:ring-0 resize-none overflow-hidden"></textarea>
            <div class="flex justify-end">
                <input type="submit" value="Post !" class="px-4 py-2 bg-sky-400 rounded-full text-white hover:bg-sky-600 hover:cursor-pointer font-semibold text-sm">
            </div>
        </form>


        @foreach($posts as $post)
        <a href="{{route('profile.show', $post->user)}}" class="px-6 mb-2 flex items-center gap-2 font-medium text-slate-100">
        <svg class="h-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6">
            <path fill-rule="evenodd" d="M18.685 19.097A9.723 9.723 0 0 0 21.75 12c0-5.385-4.365-9.75-9.75-9.75S2.25 6.615 2.25 12a9.723 9.723 0 0 0 3.065 7.097A9.716 9.716 0 0 0 12 21.75a9.716 9.716 0 0 0 6.685-2.653Zm-12.54-1.285A7.486 7.486 0 0 1 12 15a7.486 7.486 0 0 1 5.855 2.812A8.224 8.224 0 0 1 12 20.25a8.224 8.224 0 0 1-5.855-2.438ZM15.75 9a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0Z" clip-rule="evenodd" />
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