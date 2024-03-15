@extends('template')

@section('title')
    Les Cavernes
@endsection

@section('cavernes')
    block py-2 px-3 text-red-400 bg-red-700 rounded md:bg-transparent md:p-0
@endsection

@section('body')

<div class="grid grid-cols-2 md:grid-cols-3 gap-4 mt-6 ml-6 mr-6">
    @foreach ($cavernes as $caverne)
    <div class="relative">
        <img class="h-auto max-w-full rounded-lg" src="/images/cavernes/{{$caverne->image_caverne}}.jpg" alt="">
        <div class="absolute bottom-0 w-full flex text-center place-items-center flex-col shadow">
            <h1 class="text-xl font-bold">{{$caverne->titre_caverne}}</h1>
            <button class="w-fit relative inline-flex items-center justify-center p-0.5 mb-2 me-2 overflow-hidden text-sm font-medium text-gray-900 rounded-lg group bg-gradient-to-br from-purple-500 to-pink-500 group-hover:from-purple-500 group-hover:to-pink-500 hover:text-white dark:text-white focus:ring-4 focus:outline-none focus:ring-purple-200 dark:focus:ring-purple-800">
                <span class="relative px-5 py-2.5 transition-all ease-in duration-75 bg-white dark:bg-red-600 rounded-md group-hover:bg-opacity-0">
                <a href="{{'conte.index'}}">Voir les contes associés a la caverne</a>
                </span>
            </button>
        </div>
    </div>
    @endforeach
</div>

@endsection
