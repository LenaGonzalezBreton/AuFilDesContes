@extends('template')

@section('title')
    action caverne
@endsection

@section('mots-clefs')
    block py-2 px-3 text-red-400 bg-red-700 rounded md:bg-transparent md:p-0
@endsection

@section('body')
    <div class="grid mt-16">
        <form class="max-w-sm mx-auto" method="POST">
            <div>
                <label for="motclef" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white underline decoration-red-600 decoration-2 underline-offset-2">Mot Clef :</label>
                <input type="text" id="motclef" class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 " required />
            </div>
            <button type="submit" class="w-full text-white bg-gradient-to-r from-green-400 via-green-500 to-green-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-green-300 dark:focus:ring-green-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center mt-2">Valider</button>
        </form>
    </div>
@endsection
