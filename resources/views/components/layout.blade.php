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
        <!-- Container -->
        <nav class="flex flex-row justify-between items-center px-2 py-4 border-b border-white/10">
            <!-- Navigation -->
            <div class="inline-flex items-center gap-x-2">
                <div >
                            <!-- Logo -->
                    <a href=""><img class="w-10 h-10 bg-white rounded-xl py-1 px-1"src="{{ asset('images/pill-icon.png') }}" alt=""></a>
                </div>
                <div class="">
                <x-nav-link href="/medicines" :active="request()->is('medicines')"><button>Medicine</button></x-nav-link >
                <x-nav-link href=""><button>Sales</button></x-nav-link >
                <x-nav-link href="/orders" :active="request()->is('suppliers')"><button>Orders</button></x-nav-link >
                <x-nav-link href="/suppliers" :active="request()->is('suppliers')"><button>Supplier</button></x-nav-link >
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

                                            <x-logout-button>Log Out</x-logout-button>
                                        </form>
                                @endauth
                            </div>
            </div>
        </nav>
        <header class="bg-white shadow">
            <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8 sm:flex sm:justify-between">
                <h1 class="text-3xl font-bold tracking-tight text-gray-900">{{ $heading }}</h1>
            </div>
        </header>
        <main>
        <div class="mx-auto max-w-7xl py-6 sm:px-6 lg:px-8">
                {{ $slot }}
            </div>
        </main> 

    </div>
</body>
</html>