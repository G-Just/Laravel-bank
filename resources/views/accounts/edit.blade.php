@extends('layouts.form')

@section('form')
    <form action="{{ route('accounts.update', ['account' => $account]) }}" method="POST"
        class="relative w-full mt-6 mb-0 ml-0 mr-0 space-y-8">
        @method('PUT')
        <div class="relative flex flex-col justify-center gap-8">
            <div class="relative">
                <p class="absolute pt-0 pb-0 pl-2 pr-2 mb-0 ml-2 mr-0 -mt-3 font-medium bg-neutral-950">
                    IBAN</p>
                <input placeholder={{ $account->IBAN }} value={{ $account->IBAN }} type="text" name='IBAN'
                    class="block w-full py-5 pl-4 pr-4 mt-2 mb-0 ml-0 mr-0 text-base border rounded-md border-neutral-600 placeholder-neutral-700 focus:outline-none focus:border-neutral-500 bg-neutral-950 @error('IBAN') border-red-500  @enderror" />
                @error('IBAN')
                    <p class="absolute pt-0 pb-0 pl-2 pr-2 mb-0 ml-2 mr-0 -mt-3 font-medium text-red-500 right-6 bg-neutral-950">
                        {{ $message }}</p>
                @enderror
            </div>
        </div>
        <div class="relative">
            <button class="px-8 py-4 mt-8 font-bold text-black hover:bg-lime-500 bg-gradient-to-tr bg-lime-400 rounded-xl"
                type="submit">Change</button>
        </div>
        @csrf
    </form>
@endsection

@section('title')
    Edit account details
@endsection
