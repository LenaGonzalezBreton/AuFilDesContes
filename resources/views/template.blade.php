<!doctype html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport"
              content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <script src="https://cdn.tailwindcss.com"></script>
        <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.css" rel="stylesheet" />
        <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.8/css/line.css">
        <link rel="stylesheet" href="{{asset("assets/css/style.css")}}">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>
            @yield('title', 'null')
        </title>
    </head>

    <body class="bg-gray-700">
        <div>
                <nav class="sticky top-0 bg-red-800  drop-shadow shadow-blue-600 z-50">
                    <div class=" max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
                        <a href="{{route('dashboard')}}" class=" hover:animate-spin flex items-center space-x-3 rtl:space-x-reverse ">
                            <img src="{{asset('assets/images/logo.png')}}" class="rounded-full bg-white size-16" alt="Flowbite Logo">
                        </a>
                        <div class="flex md:order-2 space-x-3 md:space-x-0 rtl:space-x-reverse">
                            <button data-collapse-toggle="navbar-sticky" type="button" class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600" aria-controls="navbar-sticky" aria-expanded="false">
                                <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 17 14">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 1h15M1 7h15M1 13h15"/>
                                </svg>
                            </button>
                        </div>
                        <div class="items-center justify-between hidden w-full md:flex md:w-auto md:order-1" id="navbar-sticky">
                            <ul class="flex flex-col p-4 md:p-0 mt-4 font-medium border border-red-100 rounded-lg bg-red-800 md:space-x-8 rtl:space-x-reverse md:flex-row md:mt-0 md:border-0 ">
                                <li>
                                    <a href="{{route('dashboard')}}" class="@yield('dashboard', ' block py-2 px-3 text-red-600 hover:text-white rounded hover:bg-white md:hover:bg-transparent md:p-0 ')" >Dashboard</a>
                                </li>
                                <li>
                                    <a href="{{route('motcle.index')}}" class="@yield('mots-clefs', ' block py-2 px-3 text-red-600 hover:text-white rounded hover:bg-white md:hover:bg-transparent md:p-0 ')">Mots Clefs</a>
                                </li>
                                <li>
                                    <a href="{{route('conte.index')}}" class="@yield('contes', ' block py-2 px-3 text-red-600 hover:text-white rounded hover:bg-white md:hover:bg-transparent md:p-0 ')">Contes</a>
                                </li>
                                <li>
                                    <a href="{{route('caverne.index')}}" class="@yield('cavernes', ' block py-2 px-3 text-red-600 hover:text-white rounded hover:bg-white md:hover:bg-transparent md:p-0 ')">Cavernes</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </nav>

                @if(session('success'))
                    <div class="flex w-full border-4 bg-green-400 border-green-500 p-5 flex-col items-center justify-center success">
                    <p class="success">{{Session::get('success')}}</p>
                    </div>
                
                @else @if(session('error'))
                    <div class="flex w-full border-4 bg-red-400 border-red-500 p-5 flex-col items-center justify-center animation">
                        <p class="text-xl">{{Session::get('error')}}</p>
                        </div>
                
                @endif
                @endif


            <div class="h-full">
                @yield('body', 'Rien à afficher pour le moment.')
            </div>
        </div>

        <script src="/assets/js/script.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    </body>

</html>
