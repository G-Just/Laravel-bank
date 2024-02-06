@extends('layouts.app')

@section('content')

    {{-- search bar --}}
    <div class="flex justify-center my-8 max-md:mx-4">
        <div class="relative flex items-center mr-4">
            <button>
                <img class="w-6 h-6" src="{{ asset('images/filter.svg') }}" alt="filter"
                    onclick="
                    const popup = document.getElementById('filters')
                    if (popup.classList.contains('flex')){
                        popup.classList.remove('flex')
                        popup.classList.add('hidden')
                    } else {
                        popup.classList.add('flex')
                        popup.classList.remove('hidden')
                    };">
            </button>
            <div id='filters'
                class="absolute flex-col hidden p-4 rounded-lg lg:-translate-x-1/2 w-96 bg-neutral-950 top-14 left-1/2">
                <form action="{{ route('clients.list') }}" method="GET">
                    <div>
                        <input class="accent-lime-300"@if (request()->has('positive')) checked @endif type="checkbox"
                            name="positive" id="positive">
                        <label for="positive">Hide clients with positive balance</label>
                    </div>
                    <div>
                        <input class="accent-lime-300"@if (request()->has('negative')) checked @endif type="checkbox"
                            name="negative" id="negative">
                        <label for="negative">Hide clients with negative or zero balance</label>
                    </div>
                    <div>
                        <input class="accent-lime-300"@if (request()->has('empty')) checked @endif type="checkbox"
                            name="empty" id="empty">
                        <label for="empty">Hide clients without accounts</label>
                    </div>
            </div>
        </div>
        <div class="items-center border-2 border-neutral-700 flex rounded-full bg-neutral-900 px-2 w-full max-w-[600px]">
            @if (Request::get('search'))
                <p class="flex gap-2 px-4 py-1 bg-black rounded-full">{{ app('request')->input('search') }}<a
                        href="{{ route('clients.list') }}">&#10005;</a></p>
            @endif
            <input id='searchBar' focus name="search" type="text"
                class="w-full bg-neutral-900 flex bg-transparent pl-4 text-[#cccccc] outline-0" placeholder="Search..." />
            <button type="submit" class="relative p-2 rounded-full bg-neutral-900">
                <svg width="30px" height="30px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <g id="SVGRepo_bgCarrier" stroke-width="0" />
                    <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round" />
                    <g id="SVGRepo_iconCarrier">
                        <path
                            d="M14.9536 14.9458L21 21M17 10C17 13.866 13.866 17 10 17C6.13401 17 3 13.866 3 10C3 6.13401 6.13401 3 10 3C13.866 3 17 6.13401 17 10Z"
                            stroke="#999" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                    </g>
                </svg>
            </button>
        </div>
    </div>

    <div class="grid grid-cols-3 px-20 max-2xl:grid-cols-2 max-lg:grid-cols-1 sm:gap-x-6 max-md:px-2">

        {{-- Individual client cards --}}
        @forelse ($clients as $client)
            <div
                class="p-6 mb-6 border-2 rounded-lg bg-neutral-950 max-md:p-2 hover:bg-neutral-900 hover:border-lime-600 h-72 border-neutral-800">
                <a href="{{ route('clients.show', ['client' => $client->id]) }}">
                    <div class="flex items-center justify-between">
                        <div class="flex items-center">
                            <img class="object-cover w-10 h-10 mr-2 rounded-full" src="{{ asset('images/pfp.jpg') }}"
                                alt="profile" />
                            <div>
                                <h3 class="text-lg font-semibold">{{ $client->firstName }} {{ $client->lastName }}</h3>
                                <span class="block text-xs font-normal text-gray-500">{{ $client->personalCode }}</span>
                            </div>
                        </div>
                        <p class="text-2xl text-lime-300"><span>$</span>
                            {{ number_format($client->accounts()->sum('balance'), 2) }}
                        </p>
                    </div>
                    <div class="flex flex-col w-full h-32 gap-2 pr-2 mt-8 overflow-y-auto">
                        @foreach ($client->accounts as $account)
                            <div class="flex justify-between border-b-2 border-neutral-700">
                                <p>{{ $account->IBAN }}</p>
                                <p><span class="mr-0.5">$</span>{{ $account->balance }}</p>
                            </div>
                        @endforeach
                    </div>
                    <div class="flex items-center justify-between mt-5 text-sm font-semibold ">
                        <div class="flex">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                stroke="currentColor" class="w-5 h-5 mr-2 text-base text-gray-500">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M6 6.878V6a2.25 2.25 0 012.25-2.25h7.5A2.25 2.25 0 0118 6v.878m-12 0c.235-.083.487-.128.75-.128h10.5c.263 0 .515.045.75.128m-12 0A2.25 2.25 0 004.5 9v.878m13.5-3A2.25 2.25 0 0119.5 9v.878m0 0a2.246 2.246 0 00-.75-.128H5.25c-.263 0-.515.045-.75.128m15 0A2.25 2.25 0 0121 12v6a2.25 2.25 0 01-2.25 2.25H5.25A2.25 2.25 0 013 18v-6c0-.98.626-1.813 1.5-2.122" />
                            </svg>
                            <span class="mr-1">
                                {{ $client->accounts()->count() }}
                            </span>Accounts
                        </div>
                        <div class="flex items-center">
                            Tier:
                            @php
                                $sum = $client->accounts()->sum('balance');
                                echo match (true) {
                                    $sum >= 1000000 => 'Diamond<img class=\'mx-2 w-4 h-4 \' src=' . asset('images/diamond.svg') . " alt='diamond'>",
                                    $sum >= 100000 => 'Platinum<img class=\'mx-2 w-4 h-4 \' src=' . asset('images/platinum.svg') . " alt='diamond'>",
                                    $sum >= 10000 => 'Gold<img class=\'mx-2 w-4 h-4 \' src=' . asset('images/gold.svg') . " alt='diamond'>",
                                    $sum >= 500 => 'Silver<img class=\'mx-2 w-4 h-4 \' src=' . asset('images/silver.svg') . " alt='diamond'>",
                                    default => 'N/A',
                                };
                            @endphp
                        </div>
                    </div>
                </a>
            </div>
        @empty
            <p class="mt-20 text-4xl text-center col-span-full">No data found</p>
        @endforelse
    </div>
    {{-- <div class="flex justify-center pb-10"> {{ $clients->links() }}</div> --}}
@endsection
