@extends('layouts.auth')

@section('title', 'Créer un compte')

@section('content')
    <h5 class="text-xl font-medium text-gray-900 mb-4">Créer mon compte</h5>


    <form class="space-y-6 max-w-sm mx-auto" method="POST" action="{{ route('') }}">
        @csrf
        <div class="mb-5">
            <label for="name"  class="block mb-2 text-sm font-medium text-gray-900">Nom</label>
            <input id="name" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-red-500 focus:border-red-500 block w-full p-2.5" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" placeholder="Entrez votre nom"/>
            <span :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!--#region email -->
        <div class="mb-5">
            <label for="email" :value="__('Email')"
                   class="block mb-2 text-sm font-medium text-gray-900">Email</label>
            <input id="email" type="email" name="email" :value="old('email')" required autofocus type="text"
                   id="identifiant"
                   class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-red-500 focus:border-red-500 block w-full p-2.5"
                   placeholder="Entrez votre email" required/>
            <span :messages="$errors->get('email')"></span>

        </div>
<!--#endregion -->

        <!--#region password -->
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

        <!--#endregion -->

        <div class="mb-5">
            <label for="password_confirmation" :value="__('Confirm Password')" class="block mb-2 text-sm font-medium text-gray-900"> Confirmer le mot de passe</label>

            <input id="password_confirmation" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-red-500 focus:border-red-500 block w-full p-2.5"
                          type="password"
                          name="password_confirmation" required autocomplete="new-password" placeholder="••••••••"/>

            <span :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500" href="{{ route('login') }}">
                {{ __('Already registered?') }}
            </a>
        </div>

        <button type="submit"
                class="w-full text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center ">
            Créer le compte
        </button>
    </form>
@endsection
