@extends('template')

@section('title')
    action conte
@endsection

@section('contes')
    block py-2 px-3 text-red-400 bg-red-700 rounded md:bg-transparent md:p-0
@endsection

@section('body')
    <div class="p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400" role="alert">
        <span class="font-medium">Danger alert!</span> Voir conte.
    </div>
    
    
    @foreach ($contes as $c)
    <?php 
    $motCle = $c->motcles;
    ?>
<div class="grid grid-cols-2 md:grid-cols-3 gap-4 mt-6 ml-6 mr-6">

    <div class="relative flex flex-col justify-center items-center">
        <div class="justify-center text-center">
            <img class="w-3/5 rounded-lg aspect-square absolute " src="/images/cavernes/{{$c->image_conte}}.jpg" alt="">
            <a class="duration-300 ease-in-out relative text-8xl text-white h-4/6 hover:text-black hover:text-9xl hover:h-3/4" href=""><i class=" uil uil-play-circle "></i></a>
        </div>
        <div class="bottom-0 w-full flex text-center place-items-center flex-col shadow">
            <h1 class="text-xl font-bold">{{$c->titre_conte}}</h1>
            <p>{{$c->intro_conte}}</p>
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
