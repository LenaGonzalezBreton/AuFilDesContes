@extends('template')

@section('title')
    action caverne
@endsection

@section('dashboard')
    block py-2 px-3 text-red-400 bg-red-700 rounded md:bg-transparent md:p-0
@endsection

@section('body')

<div class="flex flex-col">
    <div class="flex flex-row max-h-full bg-red-500">
        <div class="flex w-4/5 flex-col justify-center items-center border-4 h-2/4">
            <h1 class="text-2xl font-bold text-white">Contes</h1>
            <div class="flex w-full justify-end text-white pr-4">
                <p>Nombre de contes : {{$contes->count()}}</p>
            </div>

            <div class="flex flex-row w-full justify-around text-center text-white mt-5">
                <h3 class="w-1/4">Nom</h3>
                <h3 class="w-1/4">Nombre de lecture</h3>
                <h3 class="w-1/4">Note</h3>
                <h3 class="w-1/4">Caverne associée</h3>
            </div>

            <div class="flex flex-col w-full text-white mt-5 border-4 border-red-800  bg-red-600 max-h-80 min-h-80 overflow-x-hidden overflow-y-scroll">
                @if (count($contes) == 0)
                <div class="flex justify-center text-3xl font-bold">
                    <h3>Aucun contes</h3>
                </div>
                
                @else
                @foreach ($contes as $conte)
                <?php if($conte->nombre_note_conte > 0) {
                    $note = $conte->note_conte / $conte->nombre_note_conte ;
                } 
                else {
                    $note = 0;
                }

                
                ?>
                <div class="flex flex-row w-full justify-around text-center">
                    <h3 class="w-1/4">{{$conte->titre_conte}}</h3>
                    <h3 class="w-1/4">{{$conte->nombre_lecture_conte}}</h3>
                    <h3 class="w-1/4">{{round($note)}}</h3>
                    <h3 class="w-1/4">{{$conte->caverne->titre_caverne}}</h3>

                    {{-- <h3>{{$conte->}}</h3>
                    <h3>{{$conte->titre_conte}}</h3> --}}
                </div>  
                @endforeach
                @endif
            </div>

        </div>
        <div class="flex w-1/5 flex-col items-center border-4">
            <h1 class="text-2xl font-bold text-white">Livre d'or</h1>
                <div class="flex flex-row w-full justify-around text-center text-white mt-5">
                    <h3 class="w-1/4">Commentaire</h3>
                    <h3 class="w-1/4">Valider / Refuser</h3>
                </div>

                <div class="flex flex-col justify-start w-full text-white mt-5 bg-red-600 max-h-80 min-h-80 overflow-x-hidden overflow-y-scroll border-4 border-red-800 break-words">
                @foreach ($livreor as $com)
                <div class="flex flex-row h-2/5 gap-4">
                    <h3 class="w-3/4">{{$com->commentaire_livreor}}</h3>
                    <div class="flex flex-row gap-4 text-2xl">
                        <form action="{{route('livreor.update', [$com->id])}}" method="post">
                            @csrf
                            @method('PUT')
                            <button class="hover:text-3xl ease-in-out duration-300" type="submit"><i class="uil uil-check-square"></i></button>
                        </form>
                        <form action="{{route('livreor.destroy', [$com->id])}}" method="post">
                            @csrf
                            @method('DELETE')
                            <button class="hover:text-3xl ease-in-out duration-300" type="submit"><i class="uil uil-times-circle"></i></button>
                        </form>
                    </div>
                </div>
                @endforeach
                </div>
        </div>
    </div>
    <div class="flex flex-row max-h-full bg-red-200 max-h-96 min-h-96">
        <div class="flex w-1/5 items-center flex-col text-red-500 border-4 border-red-400 ">
            <h1 class="text-2xl font-bold">Mots clefs</h1>
            <div class="flex flex-row w-full justify-around text-center mt-5">
                <h3 class="w-1/4">Intitulé</h3>
                <h3 class="w-1/4">Conte associée</h3>
            </div>

            
            <div class="flex flex-col justify-around w-full text-white mt-6 bg-red-400 max-h-64 min-h-64 overflow-x-hidden overflow-y-scroll border-4 border-red-600 break-words">
                @foreach ($motcles as $mot)
                <div class="flex flex-row h-2/5 gap-4 w-full justify-around text-center">
                    <h3 class="w-3/4">{{$mot->nom_motcle}}</h3>
                    <h3 class="w-3/4">{{count($mot->contes)}}</h3>

                </div>
                @endforeach
            </div>
        </div>


        <div class="flex w-4/5 items-center flex-col border-4 border-red-400">
            <h1 class="text-2xl font-bold text-red-500">Cavernes</h1>
            <div class="flex w-full justify-end text-red-500 pr-4">
                <p>Nombre de cavernes : {{$cavernes->count()}}</p>
            </div>

            <div class="flex flex-row w-full justify-around text-center text-red-500 mt-5">
                <h3 class="w-1/4">Nom</h3>
                <h3 class="w-1/4">Nombre de contes associées</h3>
                <h3 class="w-1/4">Voir les contes associées</h3>

            </div>

            
            <div class="flex flex-col w-full text-white mt-6 border-4 border-red-600  bg-red-400 max-h-64 min-h-64 overflow-x-hidden overflow-y-scroll">
                @if (count($cavernes) == 0)
                <div class="flex justify-center text-3xl font-bold">
                    <h3>Aucune cavernes</h3>
                </div>
                
                @else
                @foreach ($cavernes as $cav)            
                <div class="flex flex-row w-full justify-around text-center">
                    <h3 class="w-1/4">{{$cav->titre_caverne}}</h3>
                    <h3 class="w-1/4">{{count($cav->conte)}}</h3>
                    {{-- Fonctionnalité pas encore dispo --}}
                    <h3 class="w-1/4"><a href="#">Voir les contes</a></h3>

                    {{-- <h3>{{$conte->}}</h3>
                    <h3>{{$conte->titre_conte}}</h3> --}}
                </div>  
                @endforeach
                @endif
            </div>
            
        </div>
    </div>

</div>

@endsection
