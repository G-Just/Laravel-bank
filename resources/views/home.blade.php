@extends('layouts.app')

@section('content')
    <section class="p-5 m-5 rounded bg-neutral-950">
        <h3 class="mb-5 text-xl xl:text-2xl">
            Laravel-bank statistics
            <p class="text-base text-gray-600">
                I can prove anything by statistics, except the truth. </p>
        </h3>

        <div class="flex flex-col gap-5 mt-8 xl:flex-row">
            <div class="w-full xl:w-1/5">
                <div class="p-2 font-bold text-center text-black rounded bg-lime-300">
                    Total
                </div>
                <div class="py-8 mt-2 text-center border border-gray-300 rounded">
                    <h2 class="pb-2 text-xl font-bold xl:text-2xl"><span
                            class="mx-1">$</span>{{ number_format($accounts->sum('balance'), 2) }}</h2>
                    <h4 class="inline text-sm text-gray-500">Total holdings</h4>
                </div>
            </div>

            <div class="w-full xl:w-2/5">
                <div class="p-2 font-bold text-center text-black rounded bg-lime-300">
                    Clients
                </div>
                <div class="flex gap-5 mt-2">
                    <div class="w-1/2 py-8 text-center border border-gray-300 rounded">
                        <h2 class="pb-2 text-xl font-bold xl:text-2xl">{{ $clients->count() }}</h2>
                        <h4 class="inline text-sm text-gray-500">Rregistered clients</h4>
                    </div>
                    <div class="w-1/2 py-8 text-center border border-gray-300 rounded">
                        <h2 class="pb-2 text-xl font-bold xl:text-2xl"><span class="mx-0.5">$</span>
                            {{ number_format($accounts->sum('balance') / $clients->count(), 2) }}</h2>
                        <h4 class="inline text-sm text-gray-500">Average client balance</h4>
                    </div>
                </div>
                <div class="flex gap-5 mt-4">
                    <div class="w-1/2 py-8 text-center border border-gray-300 rounded">
                        <h2 class="pb-2 text-xl font-bold xl:text-2xl">{{ $emptyClients }}</h2>
                        <h4 class="inline text-sm text-gray-500">Clients with no accounts</h4>
                    </div>
                    <div class="w-1/2 py-8 text-center border border-gray-300 rounded">
                        <h2 class="pb-2 text-xl font-bold xl:text-2xl"><span class="mx-0.5">$</span>
                            {{ number_format($accounts->sum('balance') / $clients->count(), 2) }}</h2>
                        <h4 class="inline text-sm text-gray-500">Average client balance</h4>
                    </div>
                </div>
            </div>

            <div class="w-full xl:w-2/5">
                <div class="p-2 font-bold text-center text-black rounded bg-lime-300">
                    Accounts
                </div>
                <div class="flex gap-5 mt-2">
                    <div class="w-1/2 py-8 text-center border border-gray-300 rounded">
                        <h2 class="pb-2 text-xl font-bold xl:text-2xl">{{ $accounts->count() }}</h2>
                        <h4 class="inline text-sm text-gray-500">Open accounts</h4>
                    </div>
                    <div class="w-1/2 py-8 text-center border border-gray-300 rounded">
                        <h2 class="pb-2 text-xl font-bold xl:text-2xl"><span class="mx-0.5">$</span>
                            {{ number_format($accounts->avg('balance'), 2) }}</h2>
                        <h4 class="inline text-sm text-gray-500">Average balance</h4>
                    </div>
                </div>
                <div class="flex gap-5 mt-4">
                    <div class="w-1/2 py-8 text-center border border-gray-300 rounded">
                        <h2 class="pb-2 text-xl font-bold xl:text-2xl"><span class="mx-0.5">$</span>
                            {{ number_format($accounts->max('balance'), 2) }}</h2>
                        <h4 class="inline text-sm text-gray-500">Biggest balance</h4>
                    </div>
                    <div class="w-1/2 py-8 text-center border border-gray-300 rounded">
                        <h2 class="pb-2 text-xl font-bold xl:text-2xl"><span class="mx-0.5">$</span>
                            {{ number_format($accounts->min('balance'), 2) }}</h2>
                        <h4 class="inline text-sm text-gray-500">Smallest balance</h4>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
