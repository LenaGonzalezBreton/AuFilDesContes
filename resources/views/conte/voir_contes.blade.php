@extends('template')

@section('title')
    action conte
@endsection

@section('contes')
    block py-2 px-3 text-red-400 bg-red-700 rounded md:bg-transparent md:p-0
@endsection

@section('body')
    <div class="p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400" role="alert">
        <span class="font-medium">
            <div class="justify-center items-center flex">
                <form method="post" action="{{route('rechercheConteCaverne')}}">
                    @csrf
                    <input name="idCaverne" type="hidden" value="{{$idCaverne}}">
                    <input name="search" class="w-fit h-fit center border-2" placeholder="Recherche ...">
                    <button class=" bg-white text-gray border-2 border-r-2 border-b-2 hover:border-r-4 hover:border-b-4 hover:border-l hover-t">Rechercher</button>
                </form>
            </div>
        </span>
    </div>
    
    
    
<div class="grid grid-cols-2 md:grid-cols-3 gap-4 mt-6 ml-6 mr-6">
    @foreach ($contes as $c)
    <?php 
    $motCle = $c->motcles;
    ?>
    <div class="relative flex flex-col justify-center items-center">
        <div class="justify-center flex items-center relative place-items-center">
            <img class="w-3/5 rounded-lg aspect-square  " src="/images/cavernes/{{$c->image_conte}}.jpg" alt="">
            <a class="flex justify-center items-center inline-bloc align-middle w-3/5 duration-300 ease-in-out absolute text-8xl text-white h-4/6 hover:text-black hover:text-9xl hover:h-3/4" href=""><i class=" uil uil-play-circle "></i></a>
        </div>
        <div class="bottom-0 w-full flex text-center place-items-center flex-col shadow">
            <h1 class="text-xl font-bold">{{$c->titre_conte}}</h1>
            <p>{{$c->intro_conte}}</p>
            {{-- <p>{{$motCle['libelle_conte']}}</p> --}}
        </div>
    </div>
    @endforeach
</div>
@endsection
