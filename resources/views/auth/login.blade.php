<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')
    <title>Login</title>
</head>

<body class="flex w-screen h-screen overflow-hidden text-white">
    <div class="flex flex-col items-center w-2/5 gap-8 py-20 text-center bg-neutral-950 max-2xl:w-3/5 max-lg:w-full">
        <div class="mb-16">
            <img class="w-28 h-w-28" src="{{ asset('images/laravel_icon.svg') }}" alt="Logo">
            <p class="mt-2 font-bold tracking-wide">Laravel Bank</p>
        </div>
        <form class="flex flex-col w-2/3 gap-10 max-sm:w-full max-sm:px-4 max-md:w-3/4" method="POST"
            action="{{ route('login') }}">
            @csrf
            <div class="relative">
                <p class="absolute pt-0 pb-0 pl-2 pr-2 mb-0 ml-2 mr-0 -mt-3 font-medium bg-neutral-950">
                    Email</p>
                <input placeholder="email@domain.com" type="text" name='email'
                    class="block w-full py-4 pl-4 pr-4 mt-2 mb-0 ml-0 mr-0 text-base border rounded-md border-neutral-600 placeholder-neutral-700 focus:outline-none focus:border-neutral-500 bg-neutral-950 @error('email') border-red-500  @enderror" />
                @error('email')
                    <p
                        class="absolute pt-0 pb-0 pl-2 pr-2 mb-0 ml-2 mr-0 -mt-3 font-medium text-red-500 right-6 bg-neutral-950">
                        {{ $message }}</p>
                @enderror
            </div>
            <div class="relative">
                <p class="absolute pt-0 pb-0 pl-2 pr-2 mb-0 ml-2 mr-0 -mt-3 font-medium bg-neutral-950">
                    Password</p>
                <input placeholder="Password" type="password" name='password'
                    class="block w-full py-4 pl-4 pr-4 mt-2 mb-0 ml-0 mr-0 text-base border rounded-md border-neutral-600 placeholder-neutral-700 focus:outline-none focus:border-neutral-500 bg-neutral-950 @error('password') border-red-500  @enderror" />
                @error('password')
                    <p
                        class="absolute pt-0 pb-0 pl-2 pr-2 mb-0 ml-2 mr-0 -mt-3 font-medium text-red-500 right-6 bg-neutral-950">
                        {{ $message }}</p>
                @enderror
            </div>
            <button
                class="px-8 py-4 my-8 font-bold text-black hover:bg-lime-500 bg-gradient-to-tr bg-lime-400 rounded-xl"
                type="submit">Login</button>
            <p class="text-sm font-thin">By signing in at Laravel Bank you confirm that you've read and accepted the
                <span><a href="" class="underline hover:text-lime-600 underline-offset-4">Terms of
                        Service</a></span>
                and
                <span><a href="" class="underline hover:text-lime-600 underline-offset-4">Privacy
                        Policy</a></span>.
            </p>
        </form>
        <p class="text-sm">© 2024 Laravel Bank</p>
    </div>
    <div
        class="flex-grow bg-[url('../../public/images/login_background.jpg')] 
    max-2xl:bg-[center_left_-300px] bg-no-repeat">
    </div>
</body>
