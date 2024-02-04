@extends('layouts.form')

@section('form')
    <form action="{{ route('accounts.operation') }}" method="POST" class="relative w-full mt-6 mb-0 ml-0 mr-0">
        <div class="relative flex justify-center ">
            <p class="absolute pt-0 pb-0 pl-2 pr-2 mb-0 ml-2 mr-0 -mt-3 font-medium left-4 top-2 bg-neutral-950">
                From</p>
            <select
                class="w-full pt-4 pb-4 pl-4 pr-4 mt-2 mb-0 ml-0 mr-0 text-base border rounded-md border-neutral-600 placeholder-neutral-700 focus:outline-none focus:border-neutral-500 bg-neutral-950"
                name="from" required>
                <option class="hidden" value="" disabled selected>Select an account ...</option>
                @forelse ($accounts as $account)
                    <option value="{{ $account->id }}">{{ $account->IBAN }} -> $ {{ number_format($account->balance, 2) }}
                        &nbsp||&nbsp
                        Owner: {{ $account->client->firstName }} {{ $account->client->lastName }}
                    </option>
                    @empty{{ $account->client->firstName }}
                    <option value="-1" disabled>No accounts found</option>
                @endforelse
            </select>
        </div>
        <div class="flex justify-center mt-0">
            <img class="w-14 h-14" src="{{ asset('images/transfer.svg') }}" alt="">
        </div>
        <div class="relative flex justify-center ">
            <p class="absolute pt-0 pb-0 pl-2 pr-2 mb-0 ml-2 mr-0 -mt-3 font-medium left-4 top-2 bg-neutral-950">
                To</p>
            <select
                class="w-full pt-4 pb-4 pl-4 pr-4 mt-2 mb-0 ml-0 mr-0 text-base border rounded-md border-neutral-600 placeholder-neutral-700 focus:outline-none focus:border-neutral-500 bg-neutral-950"
                name="to" required>
                <option class="hidden" value="" disabled selected>Select an account ...</option>
                @forelse ($accounts as $account)
                    <option value="{{ $account->id }}">{{ $account->IBAN }} -> $ {{ number_format($account->balance, 2) }}
                        &nbsp||&nbsp
                        Owner: {{ $account->client->firstName }} {{ $account->client->lastName }}
                    </option>
                    @empty{{ $account->client->firstName }}
                    <option value="-1" disabled>No accounts found</option>
                @endforelse
            </select>
        </div>
        <hr class="my-12 border-neutral-700">
        <div class="relative">
            <p class="absolute pt-0 pb-0 pl-2 pr-2 mb-0 ml-2 mr-0 -mt-3 font-medium bg-neutral-950">
                Amount</p>
            <input placeholder="Enter desired amount" type="number" name="amount"
                class="block w-full pt-4 pb-4 pl-4 pr-4 mt-2 mb-0 ml-0 mr-0 text-base border rounded-md border-neutral-600 placeholder-neutral-700 focus:outline-none focus:border-neutral-500 bg-neutral-950" />
        </div>
        <div class="relative">
            <button class="px-8 py-4 mt-10 font-bold text-black hover:bg-lime-500 bg-gradient-to-tr bg-lime-400 rounded-xl"
                type="submit">Transfer</button>
        </div>
    </form>
@endsection

@section('title')
    Transfer funds
@endsection
