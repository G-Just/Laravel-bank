@extends('layouts.app')

@section('content')
    <div class="grid w-5/6 grid-cols-12 gap-2 mx-auto mt-10 text-nowrap max-2xl:w-full max-2xl:px-4">
        <div
            class="flex flex-col items-center justify-start col-span-3 pt-8 pb-10 bg-neutral-950 max-xl:col-span-6 max-md:col-span-12">
            <img class="rounded-full w-h-28 h-28" src="{{ asset('images/pfp.jpg') }}" alt="">
            <p class="my-5 text-4xl font-bold text-center text-lime-300">Hi, {{ $client->firstName }}</p>
            <p class="text-center text-neutral-600">{{ $client->firstName }} {{ $client->lastName }}</p>
            <p class="text-center text-neutral-600">{{ $client->personalCode }}</p>
        </div>
        <div
            class="flex flex-col items-center justify-start col-span-4 gap-4 p-20 bg-neutral-950 max-xl:col-span-6 max-md:col-span-12">
            <p class="text-3xl">Total Balance</p>
            <hr class="w-full border-neutral-600">
            <p class="text-6xl text-lime-300 max-md:text-4xl max-lg:text-5xl"><span class="mr-0.5">$</span>
                {{ number_format($client->accounts()->sum('balance'), 2) }}
            </p>
        </div>
        <div class="grid grid-cols-2 col-span-5 gap-10 p-10 bg-neutral-950 max-xl:col-span-6 max-md:col-span-12">
            <div class="text-xl text-center">
                <p>
                    <span class="max-xl:hidden">Owned accounts</span>
                    <span class="max-xl:block xl:hidden">Accounts</span>
                </p>
                <hr class="my-2">
                <p class="text-lime-300">
                    {{ $client->accounts()->count() }}
                </p>
            </div>
            <div class="text-xl text-center">
                <p>
                    <span class="max-xl:hidden">Average balance</span>
                    <span class="max-xl:block xl:hidden">Average</span>
                </p>
                <hr class="my-2">
                <p class="text-lime-300">$<span class="mx-0.5">
                        {{ number_format($client->accounts()->avg('balance'), 2) }}
                    </span>
                </p>
            </div>
            <div class="text-xl text-center">
                <p>
                    <span class="max-xl:hidden">Maximum balance</span>
                    <span class="max-xl:block xl:hidden">Max</span>
                </p>
                <hr class="my-2">
                <p class="text-lime-300">$<span class="mx-0.5">
                        {{ number_format($client->accounts()->max('balance'), 2) }}
                    </span>
                </p>
            </div>
            <div class="text-xl text-center">
                <p>
                    <span class="max-xl:hidden">Minimum balance</span>
                    <span class="max-xl:block xl:hidden">Min</span>
                </p>
                <hr class="my-2">
                <p class="text-lime-300">$<span class="mx-0.5">
                        {{ number_format($client->accounts()->min('balance'), 2) }}
                    </span>
                </p>
            </div>
        </div>
        <div
            class="flex flex-col items-center col-span-3 row-span-2 gap-6 p-10 max-md:col-span-12 bg-neutral-950 max-xl:col-span-6 max-xl:flex-row max-xl:row-span-1">
            <a href="{{ route('clients.edit', $client) }}" class="w-full">
                <div class="w-full p-6 text-xl text-center border-2 hover:border-lime-300 border-neutral-600">
                    <p>
                        <span class="max-xl:hidden">Edit client details</span>
                        <span class="max-xl:block xl:hidden">Edit</span>
                    </p>
                </div>
            </a>
            <a href="{{ route('clients.delete', $client) }}" class="w-full">
                <div
                    class="w-full p-6 text-xl text-center border-2 border-neutral-600 hover:border-red-600 hover:bg-red-600 hover:text-white">
                    <p>
                        <span class="max-xl:hidden">Delete client</span>
                        <span class="max-xl:block xl:hidden">Delete</span>
                    </p>
                </div>
            </a>
        </div>
        <a href="{{ route('accounts.deposit', $client) }}"
            class="flex flex-col items-center justify-center h-40 col-span-3 gap-5 font-bold duration-200 bg-neutral-950 max-xl:col-span-4 hover:ring-4 ring-lime-300 ring-inset">
            <img class="w-14 h-14" src="{{ asset('images/deposit.svg') }}" alt="Deposit">
            Deposit
        </a>
        <a href="{{ route('accounts.withdraw', $client) }}"
            class="flex flex-col items-center justify-center h-40 col-span-3 gap-5 font-bold duration-200 bg-neutral-950 max-xl:col-span-4 hover:ring-4 ring-lime-300 ring-inset">
            <img class="w-14 h-14" src="{{ asset('images/withdraw.svg') }}" alt="Withdraw">
            Withdraw
        </a>
        <a href="{{ route('accounts.delete', $client) }}"
            class="flex flex-col items-center justify-center h-40 col-span-3 gap-5 font-bold duration-200 bg-neutral-950 max-xl:col-span-4 hover:ring-4 ring-lime-300 ring-inset">
            <img class="w-14 h-14" src="{{ asset('images/delete.svg') }}" alt="Delete">
            Delete
        </a>
        <div class="w-full col-span-9 max-xl:col-span-12">
            <table class="w-full text-white border-separate">
                <thead class="text-black bg-lime-400">
                    <tr>
                        <th class="p-3 max-md:px-1">Action</th>
                        <th class="p-3 max-md:px-1"><span class="max-md:hidden">Account Number </span>IBAN</th>
                        <th class="p-3 text-center max-md:px-1">Balance</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($client->accounts as $account)
                        <tr class="bg-neutral-950">
                            <td><a class="flex justify-center gap-2"
                                    href="{{ route('accounts.edit', ['account' => $account->id]) }}">
                                    <img class="w-5 h-5" src="{{ asset('images/edit.svg') }}" alt="Edit"><span
                                        class="max-md:hidden">Edit</span></a>
                            </td>
                            <td class="p-3">
                                <div class="flex align-items-center">
                                    <div class="ml-3 max-md:ml-0">
                                        <div class="tracking-widest max-md:tracking-tight">
                                            {{-- long ass IBAN splitter :( --}}
                                            @php
                                                echo substr($account->IBAN, 0, 4) . ' ' . substr($account->IBAN, 4, 4) . ' ' . substr($account->IBAN, 8, 4) . ' ' . substr($account->IBAN, 12, 4) . ' ' . substr($account->IBAN, 16, 4);
                                            @endphp
                                        </div>
                                    </div>
                                </div>
                            </td>
                            <td class="px-10 py-3 font-bold text-center max-md:px-1">
                                <p><span class="mx-0.5">$</span>{{ number_format($account->balance, 2) }}</p>
                            </td>
                        </tr>
                    @empty
                        <tr class="bg-neutral-950">
                            <td class="p-3 text-center">
                                No data
                            </td>
                            <td class="p-3 text-center">
                                No data
                            </td>
                            <td class="p-3 text-center">
                                No data
                            </td>
                        </tr>
                    @endforelse
                <tbody>
            </table>
        </div>
        </form>
    </div>
@endsection
