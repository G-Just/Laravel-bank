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
        <form class="flex flex-col w-2/3 gap-4 max-sm:w-full max-sm:px-4 max-md:w-3/4" method="POST"
            action="{{ route('login') }}">
            @csrf
            <div class="flex flex-col items-start gap-2">
                <label for="email" class="col-md-4 col-form-label text-md-end"></label>
                <label for="email">Email</label>
                <input
                    class="w-full px-3 py-2 border-2 focus:outline-none focus:ring-2 ring-lime-600 placeholder:text-neutral-700 focus:bg-neutral-900 hover:border-lime-800 rounded-xl bg-neutral-950 border-neutral-800"
                    type="text" name="email" id="email" placeholder="Enter your email">
                @error('email')
                    <span class="" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="flex flex-col items-start gap-2">
                <label for="password">Password</label>
                <input
                    class="w-full px-3 py-2 border-2 focus:outline-none focus:ring-2 ring-lime-600 placeholder:text-neutral-700 focus:bg-neutral-900 hover:border-lime-800 rounded-xl bg-neutral-950 border-neutral-800"
                    type="password" name="password" id="password" placeholder="Enter your password">
                @error('password')
                    <span class="" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
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
