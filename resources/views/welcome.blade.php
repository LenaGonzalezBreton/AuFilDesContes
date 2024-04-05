<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Au fil des contes</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet"/>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.css" rel="stylesheet"/>

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Abhaya+Libre:wght@400;500;600;700;800&family=Dancing+Script:wght@400..700&display=swap');

        .abhaya-libre-medium {
            font-family: "Abhaya Libre", serif;
            font-weight: 500;
            font-style: normal;
        }

        .dancing-script-base {
            font-family: "Dancing Script", cursive;
            font-optical-sizing: auto;
            font-weight: 500;
            font-style: normal;
        }


        .custom-scrollbar::-webkit-scrollbar {
            display: none; /* Masquer la barre de défilement */
        }
    </style>

</head>

<body class="flex flex-col justify-center items-center overflow-y-auto custom-scrollbar">

<!--#region Bouton bounce  -->
<a href="#Accueil"
   class="fixed bottom-5 right-5 rounded-full border border-2 border-white p-2 animate-bounce bg-white bg-opacity-50">
    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
         class="w-6 h-6">
        <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 10.5 12 3m0 0 7.5 7.5M12 3v18"/>
    </svg>
</a>
<!--#endregion -->

<!--#region Accueil  -->
<div id="Accueil" class="bg-[url('images/Fondafdc.png')] w-screen h-screen bg-cover">
    <div class="flex flex-col items-center mt-16">
        <img id="openModal" src="{{ asset('images/logoAFDC.png') }}" class="w-32">
        <div class="flex gap-4">
            <a class="hover:underline" href="#info">Informations</a>
            <a class="hover:underline" href="#maj">Mise à jours</a>
            <a class="hover:underline" href="#Livre">Livre d'or</a>
            <a class="hover:underline" href="#contact">Contact</a>
        </div>
    </div>

    <div class="flex flex-col items-center mt-16">
        <div class="text-6xl dancing-script-base">Au fil des contes</div>
        <div class="text-3xl abhaya-libre-medium">Parce que chaque enfant mérite un conte qui guérit.</div>
        <div class="text-3xl abhaya-libre-medium">Écoutez, surmontez.</div>
        <a href="#"
           class="mt-8 rounded-full border border-2 border-white bg-white bg-opacity-50 flex flex-col items-center w-48 py-1 px-2 mt-4">
            <div class="text-xl">Télécharger</div>
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                 stroke="currentColor" class="w-6 h-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="m19.5 8.25-7.5 7.5-7.5-7.5"/>
            </svg>

        </a>
    </div>
</div>
<!--#endregion -->

<!--#region Informations  -->
<div class="bg-[#836c54] bg-cover w-screen">
    <div id="info" class="flex flex-col items-center text-4xl mt-4">Informations</div>
    <div class="mt-16 mb-16 gap-6 w-1/2 mx-auto">
        <div class="">
            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc vel ipsum id risus pretium luctus sit amet ut
            elit. In a mattis nisi. Duis lacinia purus sed tellus dapibus faucibus. Mauris non ex commodo, pellentesque
            purus vitae, auctor erat. Quisque vel ex nulla. Morbi sodales, risus in faucibus malesuada, dolor sem
            blandit ligula, eget lobortis felis tortor et purus. Donec ligula enim, porta eget aliquet id, cursus et
            enim. Pellentesque in lacus vitae neque rhoncus sollicitudin a in nulla. Cras volutpat blandit nisl ut
            ultrices. Duis sed finibus mauris. Nam massa ex, fermentum sit amet blandit id, vestibulum nec nunc. Cras
            massa felis, auctor at mollis pulvinar, efficitur nec ipsum.

            Donec auctor dictum ipsum, quis malesuada nisi venenatis quis. Nulla facilisi. Nullam ac semper orci, non
            pulvinar orci. Nam congue, nulla vitae condimentum vestibulum, turpis nunc lacinia ligula, ut tempus diam
            quam id magna. Aenean porttitor sagittis nibh id euismod. Mauris vel velit dui. Mauris tortor nunc,
            vestibulum pulvinar tristique nec, consectetur ut nunc. Vivamus cursus commodo libero in accumsan. Duis id
            vestibulum est.

        </div>
    </div>

    <!--#endregion -->

    <!--#region Mise à Jour  -->
    <div id="maj" class="flex flex-col items-center text-4xl mt-4">Mise à jour</div>
    <div class="mt-16 mb-16 gap-6 w-1/2 mx-auto">
        <div class="">
            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc vel ipsum id risus pretium luctus sit amet ut
            elit. In a mattis nisi. Duis lacinia purus sed tellus dapibus faucibus. Mauris non ex commodo, pellentesque
            purus vitae, auctor erat. Quisque vel ex nulla. Morbi sodales, risus in faucibus malesuada, dolor sem
            blandit ligula, eget lobortis felis tortor et purus. Donec ligula enim, porta eget aliquet id, cursus et
            enim. Pellentesque in lacus vitae neque rhoncus sollicitudin a in nulla. Cras volutpat blandit nisl ut
            ultrices. Duis sed finibus mauris. Nam massa ex, fermentum sit amet blandit id, vestibulum nec nunc. Cras
            massa felis, auctor at mollis pulvinar, efficitur nec ipsum.

            Donec auctor dictum ipsum, quis malesuada nisi venenatis quis. Nulla facilisi. Nullam ac semper orci, non
            pulvinar orci. Nam congue, nulla vitae condimentum vestibulum, turpis nunc lacinia ligula, ut tempus diam
            quam id magna. Aenean porttitor sagittis nibh id euismod. Mauris vel velit dui. Mauris tortor nunc,
            vestibulum pulvinar tristique nec, consectetur ut nunc. Vivamus cursus commodo libero in accumsan. Duis id
            vestibulum est.

        </div>
    </div>
    <!--#endregion -->

    <!--#region Livre d'or  -->
    <div id="Livre" class="flex flex-col items-center mb-16">
    <div class="w-full max-w-md p-4 bg-white border border-gray-200 rounded-lg shadow sm:p-8">
        <div class="flex items-center justify-between mb-4">
            <h5 class="text-xl font-bold leading-none text-gray-900 dancing-script-base">Qu'est ce que les enfants
                pensent de nous 📜?</h5>
        </div>
        <div class="flow-root">
            <ul role="list" class="divide-y divide-gray-200">
                @foreach($livres as $livre)
                    <li class="py-3 sm:py-4">
                            <div class="flex items-center">
                                <div class="flex-shrink-0">
                                </div>
                                <div class="flex-1 min-w-0 ms-4">
                                    <p class="text-sm font-medium text-gray-900 truncate dancing-script-base">
                                        {{ $livre->prenom }} ✨
                                    </p>
                                    <p class="text-sm text-gray-500 truncate abhaya-libre-medium">
                                        {{ $livre->commentaire_livreor }}
                                    </p>
                                </div>
                            </div>
                        </li>

                @endforeach
            </ul>
            <div class="flex flex-col items-center ">
                <button id="openModal_message" type="button" class="w-2/3 py-2.5 px-5 me-2 mb-2 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-[#dc2626] focus:z-10 focus:ring-4 focus:ring-gray-100">Ecrire un message</button>
            </div>
        </div>
    </div>
    </div>
    <!--#endregion -->

    <!--#region Modal  -->
    <div id="modal" class="fixed inset-0 bg-white bg-opacity-25 flex justify-center items-center hidden">
        <div class="bg-white bg-opacity-35 backdrop-blur border border-2 border-white p-8 rounded shadow-md">
            <div>
                <form action="#" method="POST">
                    <div class="mb-4">
                        <label for="text" class="block text-sm font-medium text-gray-700">Identifiant</label>
                        <input type="text" id="identifiant" name="identifiant"
                               class="mt-1 px-4 py-2 block w-full border rounded-md">
                    </div>
                    <div class="mb-6">
                        <label for="password" class="block text-sm font-medium text-gray-700">Mot de passe</label>
                        <input type="password" id="password" name="password"
                               class="mt-1 px-4 py-2 block w-full border rounded-md">
                    </div>
                    <div class="flex items-center justify-between">
                        <button type="submit"
                                class="bg-[#836c54] hover:bg-blue-600 text-white font-semibold py-2 px-4 rounded">
                            Se connecter
                        </button>
                        <a href="#" class="text-sm text-blue-500 hover:text-blue-600">Mot de passe oublié ?</a>
                    </div>
                </form>

            </div>
            <button id="closeModal" class="mt-4 bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">
                Fermer
            </button>
        </div>
    </div>

    <!--#region Script Modal  -->
    <script>
        // Attend que le DOM soit chargé
        document.addEventListener('DOMContentLoaded', function () {
            // Sélectionnez le bouton pour ouvrir la popup
            var openModalButton = document.getElementById('openModal');
            // Sélectionnez le bouton pour fermer la popup
            var closeModalButton = document.getElementById('closeModal');
            // Sélectionnez la div modale
            var modal = document.getElementById('modal');

            // Ajoutez un écouteur d'événements pour le clic sur le bouton pour ouvrir la popup
            openModalButton.addEventListener('click', function () {
                modal.classList.remove('hidden'); // Afficher la popup
            });

            // Ajoutez un écouteur d'événements pour le clic sur le bouton pour fermer la popup
            closeModalButton.addEventListener('click', function () {
                modal.classList.add('hidden'); // Masquer la popup
            });
        });
    </script>
    <!--#endregion -->
    <!--#endregion -->

    <!--#region Modal Message  -->
    <div id="modal_message" class="fixed inset-0 bg-white bg-opacity-25 flex justify-center items-center hidden">
        <div class="bg-white bg-opacity-35 backdrop-blur border border-2 border-white p-8 rounded shadow-md">
            <h2 class="text-xl font-semibold mb-4">Laisse nous un message !</h2>
            <form action="{{route('addLivreOr')}}" method="POST">
                @csrf
                <div class="mb-4">
                    <label for="prenom" class="block text-sm font-medium text-gray-700">Prénom</label>
                    <input type="text" id="prenom" name="prenom" class="mt-1 px-4 py-2 block w-full border rounded-md">
                </div>
                <div class="mb-4">
                    <label for="message" class="block text-sm font-medium text-gray-700">Message (maximum 50 caractères)</label>
                    <textarea required id="message" name="message" rows="3" maxlength="50" class="mt-1 px-4 py-2 block w-full border rounded-md"></textarea>
                </div>
                <div class="flex justify-end">
                    <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600">Envoyer</button>
                    <button id="closeModal_message" type="button" class="bg-gray-300 text-gray-700 px-4 py-2 rounded-md ml-2 hover:bg-gray-400">Annuler</button>
                </div>
            </form>
        </div>
    </div>

    <script>
        // Attend que le DOM soit chargé
        document.addEventListener('DOMContentLoaded', function () {
            // Sélectionnez le bouton pour ouvrir la popup
            var openModalButton = document.getElementById('openModal_message');
            // Sélectionnez le bouton pour fermer la popup
            var closeModalButton = document.getElementById('closeModal_message');
            // Sélectionnez la div modale
            var modal = document.getElementById('modal_message');
            // Sélectionnez les champs de formulaire
            var prenomInput = document.getElementById('prenom');
            var messageInput = document.getElementById('message');

            // Fonction pour vider les champs de formulaire
            function clearFormFields() {
                prenomInput.value = '';
                messageInput.value = '';
            }

            // Ajoutez un écouteur d'événements pour le clic sur le bouton pour ouvrir la popup
            openModalButton.addEventListener('click', function () {
                modal.classList.remove('hidden'); // Afficher la popup
            });

            // Ajoutez un écouteur d'événements pour le clic sur le bouton pour fermer la popup
            closeModalButton.addEventListener('click', function () {
                modal.classList.add('hidden'); // Masquer la popup
                clearFormFields(); // Vider les champs de formulaire
            });
        });
    </script>


    <!--#endregion -->

    <!--#region Footer  -->


    <footer class="bg-white bg-opacity-70 rounded-lg shadow m-4">
        <div class="w-full max-w-screen-xl mx-auto p-4 md:py-8">
            <div class="sm:flex sm:items-center sm:justify-between">
                <a href="#" class="flex items-center mb-4 sm:mb-0 space-x-3 rtl:space-x-reverse">
                    <img src="/images/logoAFDC.png" class="h-14" alt="AufilDescontes Logo" />
                    <span class="self-center text-2xl font-semibold whitespace-nowrap dancing-script-base">Au Fil des Contes</span>
                </a>
                <ul class="flex flex-wrap items-center mb-6 text-sm font-medium text-gray-500 sm:mb-0">
                    <li>
                        <a href="#info" class="hover:underline me-4 md:me-6">Infos</a>
                    </li>
                    <li>
                        <a href="#maj" class="hover:underline me-4 md:me-6">Mise à jour</a>
                    </li>
                    <li>
                        <a href="#Livre" class="hover:underline me-4 md:me-6">Livre D'or</a>
                    </li>
                    <li>
                        <a href="#contact" class="hover:underline">Contact</a>
                    </li>
                </ul>
            </div>
            <hr class="my-6 border-gray-200 sm:mx-auto lg:my-8" />
            <span class="block text-sm text-gray-500 sm:text-center">© 2024 <a href="https://pasteurmontroland.com/" class="hover:underline">R.A.L.F™</a>. All Rights Reserved.</span>
        </div>
    </footer>


    <!--#endregion -->

    <!--#region Défilement js  -->
    <script>
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                e.preventDefault();

                const target = document.querySelector(this.getAttribute('href'));

                window.scrollTo({
                    top: target.offsetTop,
                    behavior: 'smooth'
                });
            });
        });
    </script>
    <!--#endregion -->
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>
</body>
</html>
