@extends('layouts.form')

@section('form')
    <form action="{{ route('clients.store') }}" method="POST" class="relative w-full mt-6 mb-0 ml-0 mr-0 space-y-8">

        {{-- Name --}}
        <div class="relative">
            <p class="absolute pt-0 pb-0 pl-2 pr-2 mb-0 ml-2 mr-0 -mt-3 font-medium bg-neutral-950">
                Name</p>
            <input placeholder="John" type="text" name='firstName'
                class="block w-full py-5 pl-4 pr-4 mt-2 mb-0 ml-0 mr-0 text-base border rounded-md border-neutral-600 placeholder-neutral-700 focus:outline-none focus:border-neutral-500 bg-neutral-950 @error('firstName') border-red-500  @enderror" />
            @error('firstName')
                <p class="absolute pt-0 pb-0 pl-2 pr-2 mb-0 ml-2 mr-0 -mt-3 font-medium text-red-500 right-6 bg-neutral-950">
                    {{ $message }}</p>
            @enderror
        </div>

        {{-- Last Name --}}
        <div class="relative">
            <p class="absolute pt-0 pb-0 pl-2 pr-2 mb-0 ml-2 mr-0 -mt-3 font-medium bg-neutral-950">
                Last Name</p>
            <input placeholder="Doe" type="text" name="lastName"
                class="block w-full py-5 pl-4 pr-4 mt-2 mb-0 ml-0 mr-0 text-base border rounded-md border-neutral-600 placeholder-neutral-700 focus:outline-none focus:border-neutral-500 bg-neutral-950 @error('lastName') border-red-500  @enderror" />
            @error('lastName')
                <p class="absolute pt-0 pb-0 pl-2 pr-2 mb-0 ml-2 mr-0 -mt-3 font-medium text-red-500 right-6 bg-neutral-950">
                    {{ $message }}</p>
            @enderror
        </div>

        {{-- Personal Code --}}
        <div class="relative">
            <p class="absolute pt-0 pb-0 pl-2 pr-2 mb-0 ml-2 mr-0 -mt-3 font-medium bg-neutral-950">
                Personal Code</p>
            <input placeholder="33208238990" type="text" name="personalCode"
                class="block w-full py-5 pl-4 pr-4 mt-2 mb-0 ml-0 mr-0 text-base border rounded-md border-neutral-600 placeholder-neutral-700 focus:outline-none focus:border-neutral-500 bg-neutral-950 @error('personalCode') border-red-500  @enderror" />
            @error('personalCode')
                <p class="absolute pt-0 pb-0 pl-2 pr-2 mb-0 ml-2 mr-0 -mt-3 font-medium text-red-500 right-6 bg-neutral-950">
                    {{ $message }}</p>
            @enderror
        </div>

        {{-- Submit --}}
        <div class="relative">
            <button class="px-8 py-4 mt-8 font-bold text-black hover:bg-lime-500 bg-gradient-to-tr bg-lime-400 rounded-xl"
                type="submit">New Client</button>
        </div>
        @csrf
    </form>
@endsection

@section('title')
    {{ __('Register a new client') }}
@endsection
