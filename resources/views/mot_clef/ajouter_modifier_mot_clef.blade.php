@extends('template')

@section('title')
    action caverne
@endsection

@section('mots-clefs')
    block py-2 px-3 text-red-400 bg-red-700 rounded md:bg-transparent md:p-0
@endsection

@section('body')
    <div class="p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400" role="alert">
        <span class="font-medium">Danger alert!</span> Ajouter modifier mot clef.
    </div>
@endsection
