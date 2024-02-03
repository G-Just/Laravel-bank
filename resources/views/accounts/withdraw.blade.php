@extends('layouts.form')

@section('form')
    <form action="{{ route('accounts.operation') }}" method="POST" class="relative w-full mt-6 mb-0 ml-0 mr-0 space-y-4">
        <p class="text-2xl font-bold text-center">{{ $client->firstName }} {{ $client->lastName }}</p>
        <hr class="mx-2 md:mx-32 border-neutral-700">

        {{-- Account selector --}}
        <div class="relative flex justify-center ">
            <select
                class="w-full pt-4 pb-4 pl-4 pr-4 mt-2 mb-0 ml-0 mr-0 text-base border rounded-md border-neutral-600 placeholder-neutral-700 focus:outline-none focus:border-neutral-500 bg-neutral-950"
                name="id" required>
                <option class="hidden" value="" disabled selected>Select an account ...</option>
                @forelse ($client->accounts as $account)
                    <option value="{{ $account->id }}">{{ $account->IBAN }}
                        | ${{ number_format($account->balance, 2) }}</option>
                @empty
                    <option disabled value="">No accounts found</option>
                @endforelse
            </select>
        </div>

        {{-- Presets --}}
        <div class="flex justify-center gap-4 pt-10">
            <button
                onclick="event.preventDefault();const inp = document.getElementById('amount');
            inp.value = +inp.value + 1"
                class="px-3 py-1 text-lg rounded-lg hover:bg-neutral-700 bg-neutral-800">$ 1.00</button>
            <button
                onclick="event.preventDefault();const inp = document.getElementById('amount');
            inp.value = +inp.value + 10"
                class="px-3 py-1 text-lg rounded-lg hover:bg-neutral-700 bg-neutral-800">$ 10.00</button>
            <button
                onclick="event.preventDefault();const inp = document.getElementById('amount');
            inp.value = +inp.value + 100"
                class="px-3 py-1 text-lg rounded-lg hover:bg-neutral-700 bg-neutral-800">$ 100.00</button>
            <button
                onclick="event.preventDefault();const inp = document.getElementById('amount');
            inp.value = +inp.value + 1000"
                class="px-3 py-1 text-lg rounded-lg hover:bg-neutral-700 bg-neutral-800">$ 1000.00</button>
        </div>

        {{-- Amount --}}
        <div class="relative">
            <p class="absolute pt-0 pb-0 pl-2 pr-2 mb-0 ml-2 mr-0 -mt-3 font-medium bg-neutral-950">
                Amount</p>
            <input id='amount' placeholder="$ 50.00" type="text" name='amount'
                class="block w-full py-5 pl-4 pr-4 mt-2 mb-0 ml-0 mr-0 text-base border rounded-md border-neutral-600 placeholder-neutral-700 focus:outline-none focus:border-neutral-500 bg-neutral-950 @error('amount') border-red-500  @enderror" />
            @error('amount')
                <p class="absolute pt-0 pb-0 pl-2 pr-2 mb-0 ml-2 mr-0 -mt-3 font-medium text-red-500 right-6 bg-neutral-950">
                    {{ $message }}</p>
            @enderror
        </div>
        <div class="relative">
            <button class="px-8 py-4 mt-8 font-bold text-black hover:bg-lime-500 bg-gradient-to-tr bg-lime-400 rounded-xl"
                type="submit">Withdraw</button>
        </div>

        <input type="hidden" name="type" value="withdraw">
        @csrf
    </form>
@endsection

@section('title')
    Withdraw
@endsection
