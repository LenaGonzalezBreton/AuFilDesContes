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
                    {{-- <input name="idCaverne" type="hidden" value="{{$idCaverne}}"> --}}
                    <input name="search" class="w-fit h-fit center border-2" placeholder="Recherche ...">
                    <button class=" bg-white text-gray border-2 border-r-2 border-b-2 hover:border-r-4 hover:border-b-4 hover:border-l hover-t">Rechercher</button>
                </form>
            </div>
        </span>
    </div>
    

    <div class="grid grid-cols-2 md:grid-cols-3 gap-4 mt-6 ml-6 mr-6">

        <div class="relative" >
            <a href="{{route('conte.create')}}">
                <img class="h-auto max-w-full scale-75 rounded-lg hover:scale-100 hover:ease-in-out duration-200 border-double border-8 border-red-600" src="/assets/images/add_conte.png" alt="">
            </a>
            <a href=""></a>
        </div>
    
        @foreach ($contes as $conte)
        <?php 
        if($conte->nombre_note_conte > 0) {
            $note = $conte->note_conte / $conte->nombre_note_conte ;
        } 
        else {
            $note = 0;
        }

        ?>
            <div class="relative rounded-lg border-double border-4 border-red-600 flex justify-center overflow-hidden items-center min-h-[550px]" id="conte_{{$conte->id}}">
                <img class="max-w-full" src="storage/images/contes/{{$conte->image_conte}}" alt="">
                <div class="absolute flex justify-center items-center">
                    <button onclick="playIntro({{$conte->id}})" class="text-5xl text-white border-4 rounded-full p-2 bg-gray-700 "><i id="logo_play_{{$conte->id}}" class="uil uil-play"></i></button>
                </div>
                <div class="absolute bottom-0 w-full flex text-center place-items-center flex-col bg-slate-200/60">
                    <h1 class="text-2xl font-bold">{{$conte->titre_conte}}</h1>
                    <h2 class="font-medium">Intro : </h2>
                    <audio controlsList="nodownload" id="intro_{{$conte->id}}" class="w-9/12 hidden" src="storage/sounds/contes/intros/{{$conte->intro_conte}}" controls></audio>
                    <h2 class="font-medium">Histoire :</h2>
                    <audio controlsList="nodownload" class="w-9/12" src="storage/sounds/contes/histoires/{{$conte->histoire_conte}}" controls></audio>
                    <div class="flex flex-row justify-around w-full">
                        <div class="flex flex-col">
                            <p>Nombre de lecture</p>
                            {{$conte->nombre_lecture_conte}}
                        </div>

                        <div class="flex flex-col">
                            <p>Note</p>
                            {{$note}}
                        </div>

                        <div class="flex flex-col">
                            <p>Nombre de notation</p>
                            {{$conte->nombre_note_conte}}
                        </div>
                    </div>
                </div>
                <div class="absolute flex flex-row w-full justify-end text-4xl top-3 right-5">
                    <a class="bg-slate-200/90 rounded-l-lg text-green-600 hover:text-white hover:bg-green-600" href="{{route('conte.edit' ,$conte->id)}}"><i class="uil uil-edit"></i></a>
                    <button onclick="GetId({{$conte->id}})" type="button" class="bg-slate-200/90 rounded-r-lg text-red-600 hover:text-white hover:bg-red-600" data-modal-target="popup-modal" data-modal-toggle="popup-modal" >
                        <i class="font-black uil uil-times-circle"></i>
                    </button>
                </div>
            </div>
        @endforeach
        
        <div id="popup-modal" tabindex="-1" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
            <div class="relative p-4 w-full max-w-md max-h-full">
                <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                    <button type="button" id="close_modal" class="absolute top-3 end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="popup-modal">
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                        </svg>
                        <span class="sr-only">Fermer</span>
                    </button>
                    <div class="p-4 md:p-5 text-center">
                        <svg class="mx-auto mb-4 text-gray-400 w-12 h-12 dark:text-gray-200" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 11V6m0 8h.01M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/>
                        </svg>
                        <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">Vous êtes sur de vouloir supprimer le conte ? Cela supprimera aussi les fichiers liés a ce conte (image, intro, histoire)</h3>
                        <button onclick="destroyConte()" type="button" class="py-2.5 px-5 ms-3 text-sm font-medium text-white focus:outline-none bg-white rounded-lg border border-red-200 hover:bg-red-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-red-800 dark:text-gray-400 dark:border-red-800 dark:hover:text-white dark:hover:bg-red-700">
                            Oui, Supprimer
                        </button>
                        <button data-modal-hide="popup-modal" type="button" class="py-2.5 px-5 ms-3 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">Non, annuler</button>
                    </div>
                </div>
            </div>
        </div>
    </div>    
    

{{-- <div class="grid grid-cols-2 md:grid-cols-3 gap-4 mt-6 ml-6 mr-6">
    @foreach ($contes as $c)
    <?php 
    $motCle = $c->motcles;
    ?>
    <div class="relative flex flex-col justify-center items-center min-h-[550px]  border-double border-4 border-red-600 ">
        <div class="justify-center flex items-center relative place-items-center">
            <img class="max-w-full" src="storage/images/{{$c->image_conte}}" alt="">
            <a class="flex justify-center items-center inline-bloc align-middle w-3/5 duration-300 ease-in-out absolute text-8xl text-white h-4/6 hover:text-black hover:text-9xl hover:h-3/4" href=""><i class=" uil uil-play-circle "></i></a>
        </div>
        <div class="bottom-0 w-full flex text-center place-items-center flex-col shadow absolute">
            <h1 class="text-xl font-bold">{{$c->titre_conte}}</h1>
            <p>{{$c->intro_conte}}</p>
        </div>
    </div>
    @endforeach
</div> --}}
@endsection
