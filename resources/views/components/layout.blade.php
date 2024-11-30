<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-gray-800 text-white">
    <div class="px-2">
        <!-- Main Container -->
    <header class="flex flex-row justify-between items-center px-2 py-4 border-b border-white/10">
        <!-- Navigation -->
         <div class="inline-flex items-center gap-x-2">
            <div >
                        <!-- Logo -->
                <a href=""><img class="w-10 h-10 bg-white rounded-xl py-1 px-1"src="{{ asset('img/icon.jfif') }}" alt=""></a>
            </div>
            <div class="">
            <a class="mx-2 p-2 bg-gray-700 rounded-xl" href=""><button>Product</button></a>
            <a class="mx-2 p-2 bg-gray-700 rounded-xl" href=""><button>Sales</button></a>
            <a class="mx-2 p-2 bg-gray-700 rounded-xl" href=""><button>Reports</button></a>
            <a class="mx-2 p-2 bg-gray-700 rounded-xl" href=""><button>Supplier</button></a>
            </div>

         </div>
         <div>
            <div>
            <div class="ml-4 flex items-center md:ml-6">
                            @guest
                                <x-nav-link href="/login" :active="request()->is('login')">Log In</x-nav-link>
                                <x-nav-link href="/register" :active="request()->is('register')">Register</x-nav-link>
                            @endguest

                            @auth
                                    <form method="POST" action="/logout">
                                        @csrf

                                        <x-form-button>Log Out</x-form-button>
                                    </form>
                            @endauth
                        </div>
         </div>
</header>
    <div class="px-2 py-2 bg-gray-900">

        <!-- Main Content -->
        <div>
                    <!-- Header -->
        <h1 class="text-xl">
        {{$slot}}        
        </h1>
        </div>
    </div>
    </div>
</body>
</html>