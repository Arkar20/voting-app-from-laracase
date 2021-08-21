<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>Voting App</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600;700&display=swap">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">

        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>
        @livewireStyles
    </head>
    <body class="font-sans  bg-gray-background text-gray-900 text-sm">
        <header class="flex flex-col md:flex-row items-center justify-between px-8 py-4">
            <a href="#" class="uppercase text-2xl text-gray-400">Arkar 
                <span class="text-green-600 font-bold ">Voting</span>
                App</a>
            <div class="flex items-center mt-2 md:mt-0">
                <div 
                x-data
                @click="$dispatch('open-noti-box')"
                class="relative hover:bg-gray-200 cursor-pointer ">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9" />
                     </svg>
                        <div class="absolute -top-2 -right-2 w-4 h-4 rounded-full bg-red-600 flex items-center justify-center">
                            <span class="text-white text-xs">0</span>
                        </div>
                </div>

                @if (Route::has('login'))
                    <div class="px-6 py-4">
                        @auth
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf

                                <a href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                                    this.closest('form').submit();">
                                    {{ __('Log out') }}
                                </a>
                            </form>
                        @else
                            <a href="{{ route('login') }}" class="text-sm text-gray-700 underline">Log in</a>

                            @if (Route::has('register'))
                                <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 underline">Register</a>
                            @endif
                        @endauth
                    </div>
                @endif
                <a href="#">
                    <img src="https://www.gravatar.com/avatar/00000000000000000000000000000000?d=mp" alt="avatar" class="w-10 h-10 rounded-full">
                </a>
            </div>
        </header>

        <main class="container mx-auto max-w-custom flex flex-col md:flex-row relative">
            <div class="w-70 mx-auto md:mx-0 md:mr-5 bg-white shadow-sm border-green-300">
            

                @if (Auth::check())
                     {{-- start of vote form  --}}
                <div class="vote-form  shadow-lg px-4 border-1 py-2">
                <div class="vote-title py-4 space-y-2">
                    <h1 class="text-center text-xl ">Add and idea</h1>
                    <h1 class="text-center text-xs w-full ">Let Us know what you would like and we will take over</h1>
                </div>
                <form class="flex-col space-y-2" action="{{route('idea.store')}}" method="post">
                    @csrf

                    <div>
                        <input type="text" 
                            class="w-full  border-1 focus:border-green-400 rounded-3xl  border-gray-200 bg-gray-100 text-gray-800"
                            placeholder="Enter your Ideas"
                            name="title"
                            />
                    </div>
                    <div>
                        <select 
                            class="w-full border-1 rounded-3xl focus:border-green-400   border-gray-200 bg-gray-100 text-gray-800"
                            placeholder="Enter your Ideas"
                            >
                           
                            <option>Categroy</option>
                        </select>
                    </div>
                    <div>
                        <textarea  
                            class="w-full border-1 rounded-3xl  focus:border-green-400  border-gray-200 bg-gray-100 text-gray-800"
                            rows="6"
                            placeholder="Describe YOurself"
                            name="desc"
                            >
                        </textarea>
                    </div>
                    <div class="flex justify-between">
                        <button class="flex items-center justify-center h-11 text-xs bg-gray-400 text-white font-semibold rounded-xl border border-blue hover:bg-blue-hover transition duration-150 ease-in px-6 py-3">
                                Attach
                        </button>
                             <button
                                type="submit"
                                class="flex items-center justify-center h-11 text-xs bg-blue-400 text-white font-semibold rounded-xl border border-blue hover:bg-blue-hover transition duration-150 ease-in px-6 py-3"
                            >
                                <span class="ml-1">Submit</span>
                            </button>
                    </div>



                </form>
            </div>
                {{-- end of vote form  --}}
                @else
                {{-- start of unauthicated vote form  --}}
                <div class="vote-form  shadow-lg px-4 border-1 py-2">
                <div class="vote-title py-4 space-y-2">
                    <h1 class="text-center text-xl ">Add and idea</h1>
                    <h1 class="text-center text-xs w-full ">Participate By Loggin in.</h1>
                </div>
                <form class="flex-col space-y-2"  method="post">
                    
                    <div class="flex justify-between">
                        <button class="flex items-center justify-center h-11 text-xs bg-gray-400 text-white font-semibold rounded-xl border border-blue hover:bg-blue-hover transition duration-150 ease-in px-6 py-3">
                                Attach
                        </button>

                             <button
                                type="submit"
                                class="flex items-center justify-center h-11 text-xs bg-blue-400 text-white font-semibold rounded-xl border border-blue hover:bg-blue-hover transition duration-150 ease-in px-6 py-3"
                            >
                                <span class="ml-1">Submit</span>
                            </button>
                    </div>



                </form>
            </div>
                {{-- end of unauthicated vote form  --}}
               @endif

            </div>
            <div class="w-full px-2 md:px-0 md:w-175">
                    
                    <livewire:idea.idea-filter />

                <div class="mt-8">
                    {{ $slot }}
                </div>
            </div>

            <x-toast-notification />
           {{-- start of notification  --}}
            <livewire:idea.comment-notification />
           {{-- end of notification  --}}
        </main>
       

    </body>
    @livewireScripts
</html>
