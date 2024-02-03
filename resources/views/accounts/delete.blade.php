@extends('layouts.form')

@section('form')
    <form action="{{ route('accounts.destroy', $client) }}" method="POST"
        class="relative w-full mt-6 mb-0 ml-0 mr-0 space-y-5">
        @method('delete')
        <p class="text-2xl text-center">Make you sure to select the correct account
        <p class="pb-4 text-sm text-center">Accounts with non-zero balance cannot be deleted and will be un-selectable
        <p class="text-center"><span class="text-red-600">IMPORTANT</span>: selected account will be deleted <span
                class="text-red-600">PERMANETLY</span>.</p>
        <hr>

        {{-- Account selector --}}
        <div class="relative flex justify-center ">
            <select
                class="w-full pt-4 pb-4 pl-4 pr-4 mt-2 mb-0 ml-0 mr-0 text-base border rounded-md border-neutral-600 placeholder-neutral-700 focus:outline-none focus:border-neutral-500 bg-neutral-950"
                name="account_id" required>
                <option class="hidden" value="" disabled selected>Select an account ...</option>
                @forelse ($client->accounts as $account)
                    <option @if ($account->balance !== 0) disabled @endif value="{{ $account->id }}">
                        {{ $account->IBAN }}
                        | ${{ number_format($account->balance, 2) }}
                    </option>
                @empty
                    <option disabled value="">No accounts found</option>
                @endforelse
            </select>
        </div>
        <div class="flex items-center justify-center gap-4 text-center">
            <button class="px-8 py-4 mt-8 font-bold text-black hover:bg-lime-500 bg-gradient-to-tr bg-lime-400 rounded-xl"
                type="submit">Delete</button>
            <a class="px-8 py-4 mt-8 font-bold text-black bg-red-400 hover:bg-red-500 bg-gradient-to-tr rounded-xl"
                href="{{ route('clients.show', $client) }}">Cancel</a>
            @csrf
        </div>
    </form>
@endsection

@section('title')
    Delete
@endsection
