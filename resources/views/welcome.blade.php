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

<body class="bg-white overflow-y-auto custom-scrollbar">
<!--#region Navbar -->
<nav id="Accueil" class="bg-transparent shadow mb-4">
    <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
        <a href="{{route('login')}}" class="flex items-center space-x-3 rtl:space-x-reverse">
            <img src="images/logoAFDC.png" class="h-10" alt="AFDC Logo" />
            <span class="self-center text-2xl font-semibold whitespace-nowrap dancing-script-base">Au fil des contes</span>
        </a>
        <button data-collapse-toggle="navbar-default" type="button" class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200" aria-controls="navbar-default" aria-expanded="false">
            <span class="sr-only">Open main menu</span>
            <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 17 14">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 1h15M1 7h15M1 13h15"/>
            </svg>
        </button>
        <div class="hidden w-full md:block md:w-auto" id="navbar-default">
            <ul class="font-medium flex flex-col p-4 md:p-0 mt-4 md:flex-row md:space-x-8 rtl:space-x-reverse md:mt-0 md:border-0 ">
                <li>
                    <a href="#info" class="block py-2 px-3 text-gray-900 hover:text-[#dc2626] rounded md:p-0" aria-current="page">Informations</a>
                </li>
                <li>
                    <a href="#maj" class="block py-2 px-3 text-gray-900 rounded hover:text-[#dc2626] md:p-0">Mise à jour</a>
                </li>
                <li>
                    <a href="#Livre" class="block py-2 px-3 text-gray-900 rounded hover:text-[#dc2626] md:p-0 ">Livre d'or</a>
                </li>
                <li>
                    <a href="#Contact" class="block py-2 px-3 text-gray-900 rounded hover:text-[#dc2626] md:p-0">Contact</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<!--#endregion -->

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
<div class="relative w-screen h-screen bg-cover flex flex-col items-center justify-center">
    <div class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 z-10">
        <div class="w-[500px] h-[500px] bg-red-500 rounded-full"></div>
    </div>
    <div class="text-3xl font-bold abhaya-libre-medium text-center">
        Parce que chaque enfant mérite un conte qui guérit.
        <br>
        Écoutez, surmontez.
    </div>
    <div class="flex flex-col items-center justify-center mt-4 z-10">
        <img src="images/mockup_accueil.png" class="w-1/3">
        <a href="#"
           class="mt-14 rounded-full bg-[#dc2626] flex flex-col items-center w-48 py-1 px-2 transition-transform hover:scale-110">
            <div class="text-xl text-white">Télécharger</div>
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                 stroke="white" class="w-6 h-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="m19.5 8.25-7.5 7.5-7.5-7.5"/>
            </svg>
        </a>
    </div>
</div>

<!--#endregion -->

<!--#region Informations  -->
<div id="info" class="bg-cover w-screen flex mt-32">
    <div class="ml-16 mt-12 w-1/2 ">
        <div class="text-4xl mb-8">Informations</div>
        <div>
            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc vel ipsum id risus pretium luctus sit amet ut
            elit. In a mattis nisi. Duis lacinia purus sed tellus dapibus faucibus. Mauris non ex commodo, pellentesque
            purus vitae, auctor erat. Quisque vel ex nulla. Morbi sodales, risus in faucibus malesuada, dolor sem
            blandit ligula, eget lobortis felis tortor et purus. Donec ligula enim, porta eget aliquet id, cursus et
            enim. Pellentesque in lacus vitae neque rhoncus sollicitudin a in nulla. Cras volutpat blandit nisl ut
            ultrices. Duis sed finibus mauris. Nam massa ex, fermentum sit amet blandit id, vestibulum nec nunc. Cras
            massa felis, auctor at mollis pulvinar, efficitur nec ipsum.
        </div>
    </div>
    <div class="flex justify-center w-2/3">
        <img src="images/mockup_info.png" class="w-2/3">
    </div>
</div>

    <!--#endregion -->

    <!--#region Mise à Jour  -->

<div id="maj" class="bg-cover w-screen flex mt-10 mb-32">
    <div class="flex justify-center w-2/3">
        <img src="images/illuenfant.png" class="w-1/2">
    </div>
    <div class="mr-16 mt-12 w-1/2">
        <div class="text-4xl mt-16 mr-16 mb-8">Mise à jour</div>
        <div class="text-justify">
            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc vel ipsum id risus pretium luctus sit amet ut
            elit. In a mattis nisi. Duis lacinia purus sed tellus dapibus faucibus. Mauris non ex commodo, pellentesque
            purus vitae, auctor erat. Quisque vel ex nulla. Morbi sodales, risus in faucibus malesuada, dolor sem
            blandit ligula, eget lobortis felis tortor et purus. Donec ligula enim, porta eget aliquet id, cursus et
            enim. Pellentesque in lacus vitae neque rhoncus sollicitudin a in nulla. Cras volutpat blandit nisl ut
            ultrices. Duis sed finibus mauris. Nam massa ex, fermentum sit amet blandit id, vestibulum nec nunc. Cras
            massa felis, auctor at mollis pulvinar, efficitur nec ipsum.

        </div>
    </div>
    </div>
    <!--#endregion -->

    <!--#region Livre d'or  -->
<div id="Livre" class="flex flex-col items-center mb-16">
    <div class="w-full max-w-md p-4 bg-white border border-gray-200 rounded-lg shadow sm:p-8  shadow-lg">
        <div class="flex items-center justify-between mb-4">
            <h5 class="text-xl font-bold leading-none text-gray-900 dancing-script-base">Qu'est ce que les enfants
                pensent de nous 📜?</h5>
        </div>
        <div class="flow-root max-h-80 overflow-y-auto custom-scrollbar">
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
                                <p class="text-sm text-gray-500 abhaya-libre-medium" style="white-space: normal;">
                                    {{ $livre->commentaire_livreor }}
                                </p>
                            </div>
                        </div>
                    </li>

                @endforeach
            </ul>
        </div>
        <div class="flex flex-col items-center ">
            <button id="openModal_message" type="button" class="w-2/3 py-2.5 px-5 me-2 mb-2 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-[#dc2626] focus:z-10 focus:ring-4 focus:ring-gray-100">Ecrire un message</button>
        </div>
    </div>
</div>


<!--#endregion -->
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

    <!--#region Modal Message  -->
    <div id="modal_message" class="fixed inset-0 bg-white bg-opacity-25 flex justify-center items-center hidden z-50 md:inset-0 h-[calc(100%-1rem)] max-h-full">
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
                    <button type="submit" class="bg-[#D13415] text-white px-4 py-2 rounded-md hover:bg-[#dc2626]">Envoyer</button>
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


    <footer class="bg-gray-400 bg-opacity-10 rounded-lg shadow-lg m-4">
        <div class="w-full max-w-screen-xl mx-auto p-4 md:py-4">
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
            <div class="flex flex-col">
                <span class="block text-sm text-gray-500 mb-2">Sponsored by</span>
                <div class="flex gap-4">
                    <a href="https://www.engagement-leucemie.com/">
                <img src="images/logo_engagementleucemie.png" class="w-10">
                    </a>
                <a href="http://pasteurmontroland.com/">
                <img src="images/logo pasteurs.webp" class="w-10">
                </a>
                </div>
                <div class="flex flex-col items-center justify-center">
            <span class="block text-sm text-gray-500 sm:text-center self-center">© 2024 <a href="https://pasteurmontroland.com/" class="hover:underline">R.A.L.F™</a>. All Rights Reserved.</span>
                </div>
                </div>
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
