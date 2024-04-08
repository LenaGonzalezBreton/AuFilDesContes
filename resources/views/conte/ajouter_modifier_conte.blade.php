@extends('template')

@section('title')
    Gestion Conte
@endsection

@section('contes')
    block py-2 px-3 text-red-400 bg-red-700 rounded md:bg-transparent md:p-0
@endsection

@section('body')
<div class="w-ful flex flex-row justify-center text-center content-center ">
    <div class="w-6/12 bg-red-800 border border rounded-[40px] my-8 min-h-[800px]">
      <?php if(isset($conte)){
        $action = route('conte.update', $conte);
        }
        else{
          $action = route('conte.store');
          }
          ?>
        <div class="flex flex-row justify-start m-5"><form action="{{route('conte.index')}}"><button type="submit"><i class="uil uil-corner-down-left text-white text-xl  "></i></button></form></div>
        @if(isset($conte))<p class="text-white">Vous pouvez laisser vide pour garder les anciennes données </p>@endif

        <form class="max-w-5xl mx-auto bg-red-800 p-4" action="<?php echo $action; ?>" method="POST" enctype="multipart/form-data">
          @csrf
          @if(isset($conte)) @method('PUT') @else @method('POST') @endif
           
            <div class="mb-5 flex flex-col justify-center items-center w-full">

              <label for="email" class="block mb-2 text-xl font-medium text-gray-900 dark:text-white">Image du conte</label>
              <img id="img_url" class="w-2/6" src="/storage/images/contes/<?php if(isset($conte)){echo($conte->image_conte);}else{echo('add.png');}?>" alt="" srcset="">
              <div class="flex flex-row w-full">
                <div class="w-8/12 mr-10">
                  <label for="text" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white mt-5">Nom du conte</label>
                  <input type="text" name="titre_conte" id="text" value="<?php if(isset($conte)){echo($conte->titre_conte);}else{echo("");}?>" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-red-400 dark:border-red-300 dark:placeholder-red-800 dark:text-red-800 dark:focus:ring-red-300 dark:focus:border-red-300" placeholder="Nom du conte" @if(isset($conte)) @else required @endif  /></div>
                <div class="w-4/12 flex flex-col justify-center"> 
                  <label for="text" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white mt-5">Nom de la caverne</label>
                    <div class="flex flex-row items-end text-3xl text-white gap-10">
                      <select name="cav" id="underline_select" class=" block py-2.5 px-0 w-full text-sm text-gray-500 bg-transparent border-0 border-b-2 border-gray-200 appearance-none dark:text-gray-400 dark:border-gray-700 focus:outline-none focus:ring-0 focus:border-gray-200 peer">
                        <option selected>@if(isset($conte)){{$conte->caverne->titre_caverne}}@else Choisir une caverne @endif</option>
                          @foreach ($cavs as $cav)
                            <option value="{{$cav->id}}">{{$cav->titre_caverne}}</option>
                          @endforeach
                      </select> 
                      <a class="hover:text-4xl ease-in-out duration-300 hover:text-red-400" href="{{route('caverne.create')}}"><i class="uil uil-focus-add"></i></a>
                  </div>
                </div>
              </div>

                  
              <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white mt-5" for="file_input"><?php if(isset($conte)){echo("Remplacer l'image du conte");}else{echo("Définir l'image du conte");}?></label>
              <input @if(isset($conte)) @else required @endif  name="image" id="image" type="file" id="img_file" onChange="img_pathUrl(this);" class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400" aria-describedby="file_input_help" accept=".png">
              <p class="mt-1 text-sm text-gray-500 dark:text-gray-300" id="file_input_help">PNG uniquement.</p>

              <div class="flex flex-row w-full gap-10">
                <div class="w-full">
                    <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white mt-5" for="file_input"><?php if(isset($conte)){echo("Remplacer l'intro du conte");}else{echo("Définir l'intro du conte");}?></label>
                    <input @if(isset($conte)) @else required @endif  name="intro" id="intro" type="file" class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400" aria-describedby="file_input_help" accept=".mp3">
                    <p class="mt-1 text-sm text-gray-500 dark:text-gray-300" id="file_input_help">MP3 uniquement.</p>

                </div>
                <div class="w-full">
                    <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white mt-5" for="file_input"><?php if(isset($conte)){echo("Remplacer l'histoire du conte");}else{echo("Définir l'histoire du conte");}?></label>
                    <input @if(isset($conte)) @else required @endif  name="histoire" id="histoire" type="file" class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400" aria-describedby="file_input_help" accept=".mp3">
                    <p class="mt-1 text-sm text-gray-500 dark:text-gray-300" id="file_input_help">MP3 uniquement.</p>
                </div>
              </div>  
              
              <div class="w-full flex flex-col ">
                <label for="text" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white mt-5">Liste des mots clé  </label>
              
                <div class="relative overflow-x-auto overflow-y-scroll max-h-[250px]">
                <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                  <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400 text-center">
                    <tr>
                      <th scope="col" class="px-6 py-3">
                        Mots clé
                      </th>
                      <th scope="col" class="px-6 py-3">
                        Nombre de conte lié a celui-ci
                      </th>
                      <th scope="col" class="px-6 py-3">
                        lié à ce conte
                      </th>
                  </tr>
                  </thead>
                  <tbody>
                    @foreach ($allmotcles as $mot)
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 text-center">
                      <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        {{$mot->nom_motcle}}
                      </th>
                      <td class="px-6 py-4">
                        <?php $contes_mots = $mot->contes()?>
                        {{$contes_mots->count()}}
                      </td>
                      <td class="px-6 py-4">
                        @if(isset($conte)) 
                          @if($conte->motcles()->where('mot_cle_id', $mot->id)->exists())
                          <input type="checkbox" checked name="motcle[]" value="{{$mot->id}}">
                          @else
                            <input type="checkbox" name="motcle[]" value="{{$mot->id}}">
                          @endif
                        @else
                          <input type="checkbox" name="motcle[]" value="{{$mot->id}}">
                        @endif
                      </td>
                    </tr>
                    @endforeach

            
                </tbody>
              </table>
            </div>

            </div>
            </div>
      
            <button type="submit" class="text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-red-600 dark:hover:bg-red-500 dark:focus:ring-blue-800">Ajouter</button>
          </form>
    </div>

</div>


    
@endsection
