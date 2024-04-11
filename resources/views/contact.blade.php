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
        <div class="flex items-center space-x-3 rtl:space-x-reverse">
        <a href="{{route('login')}}">
            <img src="images/logoAFDC.png" class="h-10" alt="AFDC Logo" />
        </a>
        <a href="{{route('home')}}" class="self-center text-2xl font-semibold whitespace-nowrap dancing-script-base">Au fil des contes</a>
        </div>

        <button data-collapse-toggle="navbar-default" type="button" class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200" aria-controls="navbar-default" aria-expanded="false">
            <span class="sr-only">Open main menu</span>
            <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 17 14">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 1h15M1 7h15M1 13h15"/>
            </svg>
        </button>
        <div class="hidden w-full md:block md:w-auto" id="navbar-default">
            <ul class="font-medium flex flex-col p-2 md:p-0 mt-4 md:flex-row md:space-x-8 rtl:space-x-reverse md:mt-0 md:border-0 ">
                <li>
                    <a href="{{route('home')}}" class="block py-2 px-3 text-gray-900 hover:text-[#dc2626] rounded md:p-0" aria-current="page">Informations</a>
                </li>
                <li>
                    <a href="{{route('home')}}" class="block py-2 px-3 text-gray-900 rounded hover:text-[#dc2626] md:p-0">Mise à jour</a>
                </li>
                <li>
                    <a href="{{route('home')}}" class="block py-2 px-3 text-gray-900 rounded hover:text-[#dc2626] md:p-0 ">Livre d'or</a>
                </li>
                <li>
                    <a href="#" class="block py-2 px-3 text-gray-900 rounded hover:text-[#dc2626] md:p-0">Contact</a>
                </li>
                <li>
                    <a href="download/aufildescontes.apk" download class="text-white bg-red-500 hover:bg-red-700 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-4 py-2 text-center">Télécharger</a>
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

<body class="bg-gray-100">
<div class="h-screen flex justify-center items-center">
    <div class="w-full max-w-sm p-4 bg-white border border-gray-200 rounded-lg shadow sm:p-6 md:p-8">
        <h5 class="text-xl font-medium text-gray-900 mb-4">Ecrivez-nous ici !</h5>
        <form class="mb-6">
            @csrf
            <div class="mb-6">
                <label for="email" class="block mb-2 text-sm font-medium text-gray-900">Votre email</label>
                <input type="email" id="email" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-red-500 focus:border-red-500 block w-full p-2.5" placeholder="nom@entreprise.com" required />
            </div>
            <div class="mb-6">
                <label for="subject" class="block mb-2 text-sm font-medium text-gray-900">Sujet</label>
                <input type="text" id="subject" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-red-500 focus:border-red-500 block w-full p-2.5" placeholder="Expliquez nous votre problème" required />
            </div>
            <div class="mb-6">
                <label for="message" class="block mb-2 text-sm font-medium text-gray-900">Votre message</label>
                <textarea id="message" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-red-500 focus:border-red-500" placeholder="Votre message..."></textarea>
            </div>
            <button type="submit" class="text-white bg-red-500 hover:bg-red-700 w-full focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 mb-2 block">Envoyer le message</button>
        </form>
        <p class="mb-2 text-sm text-gray-500">
            <a href="#" class="hover:underline">aide@au-fil-des-contes.fr</a>
        </p>
    </div>

</div>

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
                    <a href="#contact" class="hover:underline me-4 md:me-6">Contact</a>
                </li>
                <li>
                    <a href="download/aufildescontes.apk" download class="hover:underline">Télécharger</a>
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
