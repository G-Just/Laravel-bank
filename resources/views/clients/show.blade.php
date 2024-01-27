@extends('layouts.app')

@section('content')
    <div class="grid w-4/5 grid-cols-12 gap-2 mx-auto mt-10">
        <div class="flex flex-col items-center justify-start col-span-3 pt-8 pb-10 bg-neutral-950">
            <img class="w-h-28 h-28" src="{{ asset('images/pfp.png') }}" alt="">
            <p class="my-5 text-4xl font-bold text-center text-lime-300">Hi, {{ $client->firstName }}</p>
            <p class="text-center text-neutral-600">{{ $client->firstName }} {{ $client->lastName }}</p>
            <p class="text-center text-neutral-600">{{ $client->personalCode }}</p>
        </div>
        <div class="col-span-4 bg-neutral-950">Balance</div>
        <div class="col-span-5 bg-neutral-950">Stats</div>
        <div class="col-span-3 row-span-2 bg-neutral-950">Options</div>
        <div class="col-span-3 bg-neutral-950">Deposit</div>
        <div class="col-span-3 bg-neutral-950">Withdraw</div>
        <div class="col-span-3 bg-neutral-950">Delete</div>
        <div class="w-full col-span-9">
            <table class="w-full text-white border-separate">
                <thead class="text-black bg-lime-400">
                    <tr>
                        <th class="p-3">Select</th>
                        <th class="p-3">Account Number (IBAN)</th>
                        <th class="p-3 text-center">Balance</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($accounts as $account)
                        <tr class="bg-neutral-950">
                            <td class="text-center"><input type="radio" name="selected"></td>
                            <td class="p-3">
                                <div class="flex align-items-center">
                                    <div class="ml-3">
                                        <div class="tracking-widest">
                                            {{-- long ass IBAN splitter :( --}}
                                            @php
                                                echo substr($account->IBAN, 0, 4) . ' ' . substr($account->IBAN, 4, 4) . ' ' . substr($account->IBAN, 8, 4) . ' ' . substr($account->IBAN, 12, 4) . ' ' . substr($account->IBAN, 16, 4);
                                            @endphp
                                        </div>
                                    </div>
                                </div>
                            </td>
                            <td class="px-10 py-3 font-bold text-center">
                                <p><span class="mx-0.5">$</span>{{ $account->balance }}</p>
                            </td>
                        </tr>
                    @endforeach
                <tbody>
            </table>
        </div>
    </div>
@endsection
