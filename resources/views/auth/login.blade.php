<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Login</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet"/>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.css" rel="stylesheet"/>

    <style>
        .custom-scrollbar::-webkit-scrollbar {
            display: none; /* Masquer la barre de défilement */
        }
    </style>

</head>

<body class="bg-white overflow-y-auto custom-scrollbar">
<div class="h-screen flex justify-center items-center">
    <div class="w-full max-w-sm p-4 bg-white border border-gray-200 rounded-lg shadow sm:p-6 md:p-8">
        <h5 class="text-xl font-medium text-gray-900 mb-4">S'identifier</h5>


        <form class="space-y-6 max-w-sm mx-auto" method="POST" action="{{ route('login') }}">
            @csrf
            <div class="mb-5">
                <label for="email" :value="__('Email')"
                       class="block mb-2 text-sm font-medium text-gray-900">Email</label>
                <input id="email" type="email" name="email" :value="old('email')" required autofocus type="text"
                       id="identifiant"
                       class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-red-500 focus:border-red-500 block w-full p-2.5"
                       placeholder="Entrez votre email" required/>
                <span :messages="$errors->get('email')"></span>

            </div>

            <div class="mb-5">
                <label for="password" :value="__('Password')" class="block mb-2 text-sm font-medium text-gray-900">Mot
                    de passe</label>
                <input id="password"
                       type="password"
                       name="password"
                       required placeholder="••••••••"
                       class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-red-500 focus:border-red-500 block w-full p-2.5"
                       required/>

                <span :messages="$errors->get('password')"></span>
            </div>

            <div class="flex items-start">
                <div class="flex items-start">
                    <div class="flex items-center h-5">
                        <input id="remember" type="checkbox" value=""
                               class="text-red-500 w-4 h-4 border border-gray-300 rounded bg-gray-50 focus:ring-transparent cursor-pointer"
                        />
                    </div>
                    <label for="remember" class="ms-2 text-sm font-medium text-gray-900">Se souvenir de moi</label>
                </div>
                @if (Route::has('password.request'))
                    <a class="ms-auto text-sm text-red-700 hover:underline" href="{{ route('password.request') }}">
                        Mot de passe oublié ?
                    </a>
                @endif
            </div>
            <button type="submit"
                    class="w-full text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center ">
                Se connecter
            </button>
        </form>

    </div>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>
</body>
</html>
