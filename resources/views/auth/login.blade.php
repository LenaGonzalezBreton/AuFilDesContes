@extends('layouts.auth')

@section('title', 'Créer un compte')

@section('content')
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
        <p class="ms-auto text-sm text-gray-700 mt-2">
            Vous n'avez pas de compte ? <a class="text-red-500 hover:underline cursor-pointer" href="{{ route('register') }}" >Créez en un !</a>
        </p>
@endsection
