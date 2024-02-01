@extends('layouts.operation')

@section('form')
    <div class="flex flex-col gap-4">
        <p class="text-xl text-center">Presets</p>
        <hr>
        <div class="flex justify-center gap-4 px-4 mb-4">
            <button
                onclick="
                event.preventDefault();
                document.getElementById('withdraw').value = 1"
                class="px-4 py-2 rounded-lg bg-neutral-800 hover:bg-neutral-700">$1.00</button>
            <button onclick="
            event.preventDefault();
            document.getElementById('withdraw').value = 10"
                class="px-4 py-2 rounded-lg bg-neutral-800 hover:bg-neutral-700">$10.00</button>
            <button
                onclick="
            event.preventDefault();
            document.getElementById('withdraw').value = 100"
                class="px-4 py-2 rounded-lg bg-neutral-800 hover:bg-neutral-700">$100.00</button>
            <button
                onclick="
            event.preventDefault();
            document.getElementById('withdraw').value = 1000"
                class="px-4 py-2 rounded-lg bg-neutral-800 hover:bg-neutral-700">$1000.00</button>
        </div>
        <input id='withdraw' placeholder="Enter desigred amount..." type="number" name='withdraw'
            class="block w-full py-5 px-4 mt-2 mb-0 ml-0 mr-0 text-base border rounded-md border-neutral-600 placeholder-neutral-700 focus:outline-none focus:border-neutral-500 bg-neutral-950 @error('withdraw') border-red-500  @enderror" />
        @error('withdraw')
            <p class="absolute pt-0 pb-0 pl-2 pr-2 mb-0 ml-2 mr-0 -mt-3 font-medium text-red-500 right-6 bg-neutral-950">
                {{ $message }}</p>
        @enderror
    </div>
@endsection

@section('title')
    Withdraw
@endsection
