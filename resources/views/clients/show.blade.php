@extends('layouts.app')

@section('content')
    <div class="grid w-4/5 grid-cols-12 gap-2 mx-auto mt-10">
        <div class="flex flex-col items-center justify-start col-span-3 pt-8 pb-10 bg-neutral-950">
            <img class="rounded-full w-h-28 h-28" src="{{ asset('images/pfp.jpg') }}" alt="">
            <p class="my-5 text-4xl font-bold text-center text-lime-300">Hi, {{ $client->firstName }}</p>
            <p class="text-center text-neutral-600">{{ $client->firstName }} {{ $client->lastName }}</p>
            <p class="text-center text-neutral-600">{{ $client->personalCode }}</p>
        </div>
        <div class="flex flex-col items-center justify-start col-span-4 gap-4 p-20 bg-neutral-950">
            <p class="text-3xl">Total Balance</p>
            <hr class="w-full border-neutral-600">
            <p class="text-6xl text-lime-300"><span class="mr-0.5">$</span>
                @php
                    $sum = 0;
                    foreach ($accounts as $account) {
                        if ($account->client_id === $client->id) {
                            $sum += $account->balance;
                        }
                    }
                    echo number_format($sum, 2);
                @endphp</p>
        </div>
        <div class="grid grid-cols-2 col-span-5 gap-10 p-10 bg-neutral-950">
            <div class="text-xl text-center">
                <p>Owned accounts</p>
                <hr class="my-2">
                <p class="text-lime-300">
                    @php
                        $count = 0;
                        foreach ($accounts as $account) {
                            $count++;
                        }
                        echo $count;
                    @endphp
                </p>
            </div>
            <div class="text-xl text-center">
                <p>Average account balance</p>
                <hr class="my-2">
                <p class="text-lime-300">$<span class="mx-0.5">
                        @php
                            $balanceArray = [];
                            foreach ($accounts as $account) {
                                $balanceArray[] = $account->balance;
                            }
                            echo number_format(array_sum($balanceArray) / count($balanceArray), 2);
                        @endphp
                    </span>
                </p>
            </div>
            <div class="text-xl text-center">
                <p>Maximum account balance</p>
                <hr class="my-2">
                <p class="text-lime-300">$<span class="mx-0.5">
                        @php
                            echo number_format(max($balanceArray), 2);
                        @endphp
                    </span>
                </p>
            </div>
            <div class="text-xl text-center">
                <p>Minimum account balance</p>
                <hr class="my-2">
                <p class="text-lime-300">$<span class="mx-0.5">
                        @php
                            echo number_format(min($balanceArray), 2);
                        @endphp
                    </span>
                </p>
            </div>
        </div>
        <div class="flex flex-col items-center col-span-3 row-span-2 gap-6 p-10 bg-neutral-950">
            <a href="{{ route('clients.edit', ['client' => $client->id]) }}" class="w-full">
                <div class="w-full p-6 text-xl text-center border-2 hover:border-lime-300 border-neutral-600">
                    Edit Client Details
                </div>
            </a>
            <a href="" class="w-full mt-6">
                <div class="w-full p-6 text-xl text-center border-2 border-red-600 hover:bg-red-600 hover:text-white">
                    Delete Client
                </div>
            </a>
        </div>
        <div class="flex flex-col items-center justify-center h-40 col-span-3 gap-5 font-bold bg-neutral-950">
            <img class="w-14 h-14" src="{{ asset('images/deposit.svg') }}" alt="Deposit">
            Deposit
        </div>
        <div class="flex flex-col items-center justify-center h-40 col-span-3 gap-5 font-bold bg-neutral-950">
            <img class="w-14 h-14" src="{{ asset('images/withdraw.svg') }}" alt="Withdraw">
            Withdraw
        </div>
        <div class="flex flex-col items-center justify-center h-40 col-span-3 gap-5 font-bold bg-neutral-950">
            <img class="w-14 h-14" src="{{ asset('images/delete.svg') }}" alt="Delete">
            Delete
        </div>
        <div class="w-full col-span-9">
            <table class="w-full text-white border-separate">
                <thead class="text-black bg-lime-400">
                    <tr>
                        <th class="p-3">Action</th>
                        <th class="p-3">Account Number (IBAN)</th>
                        <th class="p-3 text-center">Balance</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($accounts as $account)
                        <tr class="bg-neutral-950">
                            <td><a class="flex justify-center gap-2"
                                    href="{{ route('accounts.edit', ['account' => $account->id]) }}"><img class="w-5 h-5"
                                        src="{{ asset('images/edit.svg') }}" alt="Edit">Edit</a>
                            </td>
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
        </form>
    </div>
@endsection
