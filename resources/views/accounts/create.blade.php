@extends('layouts.app')

@section('content')
    <div class="relative flex justify-center w-full mt-20">
        <div class="relative w-2/5 2xl:w-1/2 xl:w-3/5 max-lg:w-full lg:mx-20 md:mx-10 max-sm:mx-2">
            <div
                class="relative z-10 flex flex-col items-start justify-start pt-10 pb-10 pl-10 pr-10 shadow-2xl bg-neutral-950 rounded-xl">
                <p class="w-full text-4xl font-medium leading-snug text-center">Register a new account</p>
                <form action="{{ route('accounts.store') }}" method="POST"
                    class="relative w-full mt-6 mb-0 ml-0 mr-0 space-y-8">
                    <div class="relative flex justify-center ">
                        <h1 class="text-3xl text-lime-300">{{ $IBAN }}</h1>
                    </div>
                    <input type="hidden" name="IBAN" value={{ $IBAN }}>
                    <div class="relative flex justify-center ">
                        <select
                            class="w-full pt-4 pb-4 pl-4 pr-4 mt-2 mb-0 ml-0 mr-0 text-base border rounded-md border-neutral-600 placeholder-neutral-700 focus:outline-none focus:border-neutral-500 bg-neutral-950"
                            name="client_id" required>
                            <option class="hidden" value="" disabled selected>Select a client ...</option>
                            @foreach ($clients as $client)
                                <option value="{{ $client->id }}">{{ $client->firstName }} {{ $client->lastName }}
                                    | {{ $client->personalCode }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="relative">
                        <button
                            class="px-8 py-4 mt-8 font-bold text-black hover:bg-lime-500 bg-gradient-to-tr bg-lime-400 rounded-xl"
                            type="submit">New Account</button>
                    </div>
                    @csrf
                </form>
            </div>
            <svg viewbox="0 0 91 91"
                class="absolute top-0 z-0 w-32 h-32 -mt-12 -ml-12 fill-current -right-12 text-lime-300">
                <g stroke="none" strokewidth="1" fillrule="evenodd">
                    <g fillrule="nonzero">
                        <g>
                            <g>
                                <circle cx="3.261" cy="3.445" r="2.72" />
                                <circle cx="15.296" cy="3.445" r="2.719" />
                                <circle cx="27.333" cy="3.445" r="2.72" />
                                <circle cx="39.369" cy="3.445" r="2.72" />
                                <circle cx="51.405" cy="3.445" r="2.72" />
                                <circle cx="63.441" cy="3.445" r="2.72" />
                                <circle cx="75.479" cy="3.445" r="2.72" />
                                <circle cx="87.514" cy="3.445" r="2.719" />
                            </g>
                            <g transform="translate(0 12)">
                                <circle cx="3.261" cy="3.525" r="2.72" />
                                <circle cx="15.296" cy="3.525" r="2.719" />
                                <circle cx="27.333" cy="3.525" r="2.72" />
                                <circle cx="39.369" cy="3.525" r="2.72" />
                                <circle cx="51.405" cy="3.525" r="2.72" />
                                <circle cx="63.441" cy="3.525" r="2.72" />
                                <circle cx="75.479" cy="3.525" r="2.72" />
                                <circle cx="87.514" cy="3.525" r="2.719" />
                            </g>
                            <g transform="translate(0 24)">
                                <circle cx="3.261" cy="3.605" r="2.72" />
                                <circle cx="15.296" cy="3.605" r="2.719" />
                                <circle cx="27.333" cy="3.605" r="2.72" />
                                <circle cx="39.369" cy="3.605" r="2.72" />
                                <circle cx="51.405" cy="3.605" r="2.72" />
                                <circle cx="63.441" cy="3.605" r="2.72" />
                                <circle cx="75.479" cy="3.605" r="2.72" />
                                <circle cx="87.514" cy="3.605" r="2.719" />
                            </g>
                            <g transform="translate(0 36)">
                                <circle cx="3.261" cy="3.686" r="2.72" />
                                <circle cx="15.296" cy="3.686" r="2.719" />
                                <circle cx="27.333" cy="3.686" r="2.72" />
                                <circle cx="39.369" cy="3.686" r="2.72" />
                                <circle cx="51.405" cy="3.686" r="2.72" />
                                <circle cx="63.441" cy="3.686" r="2.72" />
                                <circle cx="75.479" cy="3.686" r="2.72" />
                                <circle cx="87.514" cy="3.686" r="2.719" />
                            </g>
                            <g transform="translate(0 49)">
                                <circle cx="3.261" cy="2.767" r="2.72" />
                                <circle cx="15.296" cy="2.767" r="2.719" />
                                <circle cx="27.333" cy="2.767" r="2.72" />
                                <circle cx="39.369" cy="2.767" r="2.72" />
                                <circle cx="51.405" cy="2.767" r="2.72" />
                                <circle cx="63.441" cy="2.767" r="2.72" />
                                <circle cx="75.479" cy="2.767" r="2.72" />
                                <circle cx="87.514" cy="2.767" r="2.719" />
                            </g>
                            <g transform="translate(0 61)">
                                <circle cx="3.261" cy="2.846" r="2.72" />
                                <circle cx="15.296" cy="2.846" r="2.719" />
                                <circle cx="27.333" cy="2.846" r="2.72" />
                                <circle cx="39.369" cy="2.846" r="2.72" />
                                <circle cx="51.405" cy="2.846" r="2.72" />
                                <circle cx="63.441" cy="2.846" r="2.72" />
                                <circle cx="75.479" cy="2.846" r="2.72" />
                                <circle cx="87.514" cy="2.846" r="2.719" />
                            </g>
                            <g transform="translate(0 73)">
                                <circle cx="3.261" cy="2.926" r="2.72" />
                                <circle cx="15.296" cy="2.926" r="2.719" />
                                <circle cx="27.333" cy="2.926" r="2.72" />
                                <circle cx="39.369" cy="2.926" r="2.72" />
                                <circle cx="51.405" cy="2.926" r="2.72" />
                                <circle cx="63.441" cy="2.926" r="2.72" />
                                <circle cx="75.479" cy="2.926" r="2.72" />
                                <circle cx="87.514" cy="2.926" r="2.719" />
                            </g>
                            <g transform="translate(0 85)">
                                <circle cx="3.261" cy="3.006" r="2.72" />
                                <circle cx="15.296" cy="3.006" r="2.719" />
                                <circle cx="27.333" cy="3.006" r="2.72" />
                                <circle cx="39.369" cy="3.006" r="2.72" />
                                <circle cx="51.405" cy="3.006" r="2.72" />
                                <circle cx="63.441" cy="3.006" r="2.72" />
                                <circle cx="75.479" cy="3.006" r="2.72" />
                                <circle cx="87.514" cy="3.006" r="2.719" />
                            </g>
                        </g>
                    </g>
                </g>
            </svg>
            <svg viewbox="0 0 91 91"
                class="absolute bottom-0 z-0 w-32 h-32 -mb-12 -mr-12 fill-current -left-12 text-lime-300">
                <g stroke="none" strokewidth="1" fillrule="evenodd">
                    <g fillrule="nonzero">
                        <g>
                            <g>
                                <circle cx="3.261" cy="3.445" r="2.72" />
                                <circle cx="15.296" cy="3.445" r="2.719" />
                                <circle cx="27.333" cy="3.445" r="2.72" />
                                <circle cx="39.369" cy="3.445" r="2.72" />
                                <circle cx="51.405" cy="3.445" r="2.72" />
                                <circle cx="63.441" cy="3.445" r="2.72" />
                                <circle cx="75.479" cy="3.445" r="2.72" />
                                <circle cx="87.514" cy="3.445" r="2.719" />
                            </g>
                            <g transform="translate(0 12)">
                                <circle cx="3.261" cy="3.525" r="2.72" />
                                <circle cx="15.296" cy="3.525" r="2.719" />
                                <circle cx="27.333" cy="3.525" r="2.72" />
                                <circle cx="39.369" cy="3.525" r="2.72" />
                                <circle cx="51.405" cy="3.525" r="2.72" />
                                <circle cx="63.441" cy="3.525" r="2.72" />
                                <circle cx="75.479" cy="3.525" r="2.72" />
                                <circle cx="87.514" cy="3.525" r="2.719" />
                            </g>
                            <g transform="translate(0 24)">
                                <circle cx="3.261" cy="3.605" r="2.72" />
                                <circle cx="15.296" cy="3.605" r="2.719" />
                                <circle cx="27.333" cy="3.605" r="2.72" />
                                <circle cx="39.369" cy="3.605" r="2.72" />
                                <circle cx="51.405" cy="3.605" r="2.72" />
                                <circle cx="63.441" cy="3.605" r="2.72" />
                                <circle cx="75.479" cy="3.605" r="2.72" />
                                <circle cx="87.514" cy="3.605" r="2.719" />
                            </g>
                            <g transform="translate(0 36)">
                                <circle cx="3.261" cy="3.686" r="2.72" />
                                <circle cx="15.296" cy="3.686" r="2.719" />
                                <circle cx="27.333" cy="3.686" r="2.72" />
                                <circle cx="39.369" cy="3.686" r="2.72" />
                                <circle cx="51.405" cy="3.686" r="2.72" />
                                <circle cx="63.441" cy="3.686" r="2.72" />
                                <circle cx="75.479" cy="3.686" r="2.72" />
                                <circle cx="87.514" cy="3.686" r="2.719" />
                            </g>
                            <g transform="translate(0 49)">
                                <circle cx="3.261" cy="2.767" r="2.72" />
                                <circle cx="15.296" cy="2.767" r="2.719" />
                                <circle cx="27.333" cy="2.767" r="2.72" />
                                <circle cx="39.369" cy="2.767" r="2.72" />
                                <circle cx="51.405" cy="2.767" r="2.72" />
                                <circle cx="63.441" cy="2.767" r="2.72" />
                                <circle cx="75.479" cy="2.767" r="2.72" />
                                <circle cx="87.514" cy="2.767" r="2.719" />
                            </g>
                            <g transform="translate(0 61)">
                                <circle cx="3.261" cy="2.846" r="2.72" />
                                <circle cx="15.296" cy="2.846" r="2.719" />
                                <circle cx="27.333" cy="2.846" r="2.72" />
                                <circle cx="39.369" cy="2.846" r="2.72" />
                                <circle cx="51.405" cy="2.846" r="2.72" />
                                <circle cx="63.441" cy="2.846" r="2.72" />
                                <circle cx="75.479" cy="2.846" r="2.72" />
                                <circle cx="87.514" cy="2.846" r="2.719" />
                            </g>
                            <g transform="translate(0 73)">
                                <circle cx="3.261" cy="2.926" r="2.72" />
                                <circle cx="15.296" cy="2.926" r="2.719" />
                                <circle cx="27.333" cy="2.926" r="2.72" />
                                <circle cx="39.369" cy="2.926" r="2.72" />
                                <circle cx="51.405" cy="2.926" r="2.72" />
                                <circle cx="63.441" cy="2.926" r="2.72" />
                                <circle cx="75.479" cy="2.926" r="2.72" />
                                <circle cx="87.514" cy="2.926" r="2.719" />
                            </g>
                            <g transform="translate(0 85)">
                                <circle cx="3.261" cy="3.006" r="2.72" />
                                <circle cx="15.296" cy="3.006" r="2.719" />
                                <circle cx="27.333" cy="3.006" r="2.72" />
                                <circle cx="39.369" cy="3.006" r="2.72" />
                                <circle cx="51.405" cy="3.006" r="2.72" />
                                <circle cx="63.441" cy="3.006" r="2.72" />
                                <circle cx="75.479" cy="3.006" r="2.72" />
                                <circle cx="87.514" cy="3.006" r="2.719" />
                            </g>
                        </g>
                    </g>
                </g>
            </svg>
        </div>
    </div>
@endsection
