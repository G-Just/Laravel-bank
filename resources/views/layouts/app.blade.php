<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Laravel Bank</title>

    <!-- Scripts -->
    @vite('resources/css/app.css')
</head>

<body
    class="h-screen w-screen text-white relative bg-[url('../../public/images/main_background.jpg')] bg-cover bg-no-repeat bg-fixed overflow-x-hidden">
    <nav class="flex justify-between w-full px-16 py-6 max-md:px-4">
        <div class="flex justify-start w-2/12">
            <a href="{{ route('home') }}"><img class="w-10 h-w-10" src="{{ asset('images/laravel_icon.svg') }}"
                    alt="Logo"></a>
        </div>
        <div class="flex justify-center gap-20 mt-2 text-nowrap max-xl:gap-10 max-lg:text-xs">
            <a class="text-xl hover:underline hover:text-lime-400 underline-offset-8"
                href="{{ route('clients') }}">Client
                List</a>
            <a class="text-xl hover:underline hover:text-lime-400 underline-offset-8"
                href="{{ route('clients.create') }}">New Client</a>
            <a class="text-xl hover:underline hover:text-lime-400 underline-offset-8"
                href="{{ route('accounts.create') }}">New
                Account</a>
            <a class="text-xl hover:underline hover:text-lime-400 underline-offset-8"
                href="{{-- {{ route('accounts.transfer') }} --}}">Transfer
                funds</a>
        </div>
        <div class="flex items-center justify-end w-2/12 mt-2">
            <a class="flex gap-2" href="{{ route('logout') }}"
                onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();">
                <img class="w-6 h-w-6" src="{{ asset('images/logout.svg') }}" alt="Logout">
                <p class="max-xl:hidden">{{ Auth::user()->name ?? 'FAILED' }}</p>
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
            </form>
        </div>
    </nav>
    <div class="absolute right-2 bg-lime-300 w-96 top-24 @if (session()->has('message')) block @else hidden @endif">
        <div class="p-4">
            <div class="flex items-start">
                <div class="ml-3 w-0 flex-1 pt-0.5">
                    <p class="text-lg font-bold text-black">{{ session()->get('message') }}</p>
                </div>
            </div>
        </div>
    </div>
    <div class="absolute right-2 bg-red-600 w-96 top-24 @if (session()->has('error')) block @else hidden @endif">
        <div class="p-4">
            <div class="flex items-start">
                <div class="ml-3 w-0 flex-1 pt-0.5">
                    <p class="text-lg font-bold text-black">{{ session()->get('error') }}</p>
                </div>
            </div>
        </div>
    </div>
    @yield('content')
</body>

</html>
