<x-app-layout>
    <x-container>

    <div class="flex">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24" color="#ffffff" fill="none">
        <path d="M12.5 22H6.59087C5.04549 22 3.81631 21.248 2.71266 20.1966C0.453365 18.0441 4.1628 16.324 5.57757 15.4816C7.67837 14.2307 10.1368 13.7719 12.5 14.1052C13.3575 14.2261 14.1926 14.4514 15 14.7809" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
        <path d="M16.5 6.5C16.5 8.98528 14.4853 11 12 11C9.51472 11 7.5 8.98528 7.5 6.5C7.5 4.01472 9.51472 2 12 2C14.4853 2 16.5 4.01472 16.5 6.5Z" stroke="currentColor" stroke-width="1.5" />
        <path d="M18.5 22L18.5 15M15 18.5H22" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" />
        </svg>
        <h2 class="ml-2 text-lg text-white mb-4">Friends Requests</h2>
    </div>


        @foreach($friendRequest as $user)
                <x-card class="mb-4">

                    
                    <div class="flex justify-between items-center">
                        {{ $user->name }}
                        <div class="flex">
                        <form action="{{ route('friends.update', $user) }}" method="POST">
                            @csrf 
                            @method('PUT')
                            <x-submit-button>Confirm</x-submit-button>
                        </form>

                        <form action="{{ route('friends.destroy', $user) }}" method="POST">
                            @csrf 
                            @method('DELETE')
                            <x-delete-button>Delete</x-delete-button>
                        </form>
                        
                        
                        </div>
                        
                    </div>
                    
                </x-card>
        @endforeach
        <div class="flex">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24" color="#ffffff" fill="none">
        <path d="M12 22C6.47715 22 2.00004 17.5228 2.00004 12C2.00004 6.47715 6.47719 2 12 2C16.4777 2 20.2257 4.94289 21.5 9H19" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
        <path d="M12 8V12L14 14" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
        <path d="M21.9551 13C21.9848 12.6709 22 12.3373 22 12M15 22C15.3416 21.8876 15.6753 21.7564 16 21.6078M20.7906 17C20.9835 16.6284 21.1555 16.2433 21.305 15.8462M18.1925 20.2292C18.5369 19.9441 18.8631 19.6358 19.1688 19.3065" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
        </svg>
        <h2 class="ml-2 text-lg text-white mb-4">Pending Requests</h2>
        </div>

        @foreach($sentRequest as $user)
                <x-card class="mb-4">
                    {{ $user->name }}

                </x-card>
        @endforeach
    </x-container>
</x-app-layout>