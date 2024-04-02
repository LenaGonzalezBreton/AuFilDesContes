@extends('template')

@section('title')
    action caverne
@endsection

@section('cavernes')
    block py-2 px-3 text-red-400 bg-red-700 rounded md:bg-transparent md:p-0
@endsection

@section('body')
<div class="w-ful flex flex-row justify-center text-center content-center ">
    <div class="w-6/12 bg-red-800 border border rounded-[40px] my-8 min-h-[800px]">
      <?php if(isset($cav)){
        $action = route('caverne.update', $cav);
        }
        else{
          $action = route('caverne.store');
          }
          ?>
        <div class="flex flex-row justify-start m-5"><form action="{{route('caverne.index')}}"><button type="submit"><i class="uil uil-corner-down-left text-white text-xl  "></i></button></form></div>
        @if(isset($cav))<p class="text-white">Vous pouvez laisser vide pour garder les anciennes données </p>@endif

        <form class="max-w-sm mx-auto bg-red-800 p-4" action="<?php echo $action; ?>" method="POST" enctype="multipart/form-data">
          {{-- {{route('caverne.store')}} --}}
          @csrf
          @if(isset($cav)) @method('PUT') @else @method('POST') @endif
           
            <div class="mb-5 flex flex-col justify-center">

              <label for="email" class="block mb-2 text-xl font-medium text-gray-900 dark:text-white">Image de la caverne</label>
              <img id="img_url" src="/storage/images/cavernes/<?php if(isset($cav)){echo($cav->image_caverne);}else{echo('add.png');}?>" alt="" srcset="">

              <label for="text" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white mt-5">Nom de la caverne</label>
              <input type="text" name="titre_caverne" id="text" value="<?php if(isset($cav)){echo($cav->titre_caverne);}else{echo("");}?>" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-red-400 dark:border-red-300 dark:placeholder-red-800 dark:text-red-800 dark:focus:ring-red-300 dark:focus:border-red-300" placeholder="Nom de la caverne" required />
                  
              <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white mt-5" for="file_input"><?php if(isset($cav)){echo("Remplacer l'image de la caverne");}else{echo("Définir l'image de la caverne");}?></label>
              <input name="image" id="image" type="file" id="img_file" onChange="img_pathUrl(this);" class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400" aria-describedby="file_input_help" accept=".png">
              <p class="mt-1 text-sm text-gray-500 dark:text-gray-300" id="file_input_help">PNG uniquement.</p>

              <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white mt-5" for="file_input"><?php if(isset($cav)){echo("Remplacer l'intro de la caverne");}else{echo("Définir l'intro de la caverne");}?></label>
              <input name="intro" id="intro" type="file" class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400" aria-describedby="file_input_help" accept=".mp3">
              <p class="mt-1 text-sm text-gray-500 dark:text-gray-300" id="file_input_help">MP3 uniquement.</p>

            </div>
      
            <button type="submit" class="text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-red-600 dark:hover:bg-red-500 dark:focus:ring-blue-800">Ajouter</button>
          </form>
    </div>

</div>


  
@endsection
