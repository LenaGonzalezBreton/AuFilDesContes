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
                        <button class="text-white bg-orange-400 hover:bg-orange-500 focus:outline-none focus:ring-4 focus:ring-orange-300 font-medium rounded-full text-sm px-5 py-2.5 text-center me-2 mb-2 dark:focus:ring-orange-900 w-full">
                            Modifier
                        </button>
                    </td>
                    <td class="px-6 py-4">
                        <form action="{{route('motcle.destroy',[$m])}}" method="post">
                            @csrf @method('delete')
                            <button type="submit" class="text-white bg-red-700 hover:bg-red-800 focus:outline-none focus:ring-4 focus:ring-red-300 font-medium rounded-full text-sm px-5 py-2.5 text-center me-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900 w-full">
                                Supprimer
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
