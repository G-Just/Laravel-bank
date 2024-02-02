@extends('layouts.form')

@section('form')
    <form action="{{ route('accounts.store') }}" method="POST" class="relative w-full mt-6 mb-0 ml-0 mr-0 space-y-8">
        <div class="relative flex justify-center ">
            <h1 class="text-3xl text-lime-300 max-lg:text-xl">{{ $IBAN }}</h1>
        </div>
        <input type="hidden" name="IBAN" value={{ $IBAN }}>
        <div class="relative flex justify-center ">
            <select
                class="w-full pt-4 pb-4 pl-4 pr-4 mt-2 mb-0 ml-0 mr-0 text-base border rounded-md border-neutral-600 placeholder-neutral-700 focus:outline-none focus:border-neutral-500 bg-neutral-950"
                name="client_id" required>
                <option class="hidden" value="" disabled selected>Select a client ...</option>
                @forelse ($clients as $client)
                    <option value="{{ $client->id }}">{{ $client->firstName }} {{ $client->lastName }}
                        | {{ $client->personalCode }}</option>
                @empty
                    <option disabled value="">No clients found</option>
                @endforelse
            </select>
        </div>
        <div class="relative">
            <button class="px-8 py-4 mt-8 font-bold text-black hover:bg-lime-500 bg-gradient-to-tr bg-lime-400 rounded-xl"
                type="submit">New Account</button>
        </div>
        @csrf
    </form>
@endsection

@section('title')
    Create a new account
@endsection
