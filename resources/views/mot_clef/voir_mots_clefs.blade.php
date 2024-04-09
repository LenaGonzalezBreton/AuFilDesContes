@extends('template')

@section('title')
    action caverne
@endsection

@section('mots-clefs')
    block py-2 px-3 text-red-400 bg-red-700 rounded md:bg-transparent md:p-0
@endsection

@section('body')
    <div class="relative overflow-x-auto">
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase dark:text-gray-400 bg-gray-700">
                <tr>
                    <th scope="col" class="px-6 py-3 text-center">
                        Mots Clefs
                    </th>
                    <th scope="col" class="px-6 py-3">
                    </th>
                    <th scope="col" class="px-6 py-3">
                    </th>
                </tr>
            </thead>
            <tbody>
            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                <th scope="row" class=" font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    <div class="w-full bg-gray-800 flex justify-center">
                        <form action="{{route('ajouter-mot-clef')}}" method="get">
                            @csrf
                            <button type="submit" class="text-white bg-gradient-to-r from-green-400 via-green-500 to-green-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-green-300 dark:focus:ring-green-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center m-2">Ajouter</button>
                        </form>
                    </div>
                </th>
                <td></td>
                <td></td>
            </tr>
            @foreach($mots_clefs as $m)
                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        <div class="font-semibold text-gray-900 underline dark:text-white decoration-red-500 underline-offset-2 decoration-2 text-center col-span-2">{{$m->nom_motcle}}</div>
                    </th>
                    <td class="px-6 py-4">
                        <form action="{{route('motcle.edit',[$m])}}" method="get">
                            @csrf @method('get')
                            <button class="text-white bg-orange-400 hover:bg-orange-500 focus:outline-none focus:ring-4 focus:ring-orange-300 font-medium rounded-full text-sm px-5 py-2.5 text-center me-2 mb-2 dark:focus:ring-orange-900 w-full">
                                Modifier
                            </button>
                        </form>
                    </td>
                    <td class="px-6 py-4">
                        <button onclick="GetIdMotClef({{$m->id}})" type="submit" class="text-white bg-red-700 hover:bg-red-800 focus:outline-none focus:ring-4 focus:ring-red-300 font-medium rounded-full text-sm px-5 py-2.5 text-center me-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900 w-full" data-modal-target="popup-modal" data-modal-toggle="popup-modal">
                            Supprimer
                        </button>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

    <div id="popup-modal" tabindex="-1" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="relative p-4 w-full max-w-md max-h-full">
            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                <button type="button" class="absolute top-3 end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="popup-modal">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                    </svg>
                    <span class="sr-only">Fermer</span>
                </button>
                <div class="p-4 md:p-5 text-center">
                    <svg class="mx-auto mb-4 text-gray-400 w-12 h-12 dark:text-gray-200" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 11V6m0 8h.01M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/>
                    </svg>
                    <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">Vous êtes sur de vouloir supprimer le mot clef ? Cette action est définitive.</h3>
                    <button onclick="destroyMotClef()" type="button" class="py-2.5 px-5 ms-3 text-sm font-medium text-white focus:outline-none bg-white rounded-lg border border-red-200 hover:bg-red-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-red-800 dark:text-gray-400 dark:border-red-800 dark:hover:text-white dark:hover:bg-red-700">
                        Oui, Supprimer
                    </button>
                    <button data-modal-hide="popup-modal" type="button" class="py-2.5 px-5 ms-3 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">Non, annuler</button>
                </div>
            </div>
        </div>
    </div>
@endsection
