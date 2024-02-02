@extends('layouts.form')

@section('form')
    <form action="{{ route('clients.destroy', $client) }}" method="POST"
        class="relative w-full mt-6 mb-0 ml-0 mr-0 space-y-8">
        @method('delete')
        <p class="text-2xl text-center">Are you sure you want to delete this client ?
        <p class="text-center"><span class="text-red-600">IMPORTANT</span>: all accounts associated with the
            client will be <span class="text-red-600">PERMANETLY</span> deleted.</p>
        <hr>
        <p class="text-5xl font-bold text-center">{{ $client->firstName }} {{ $client->lastName }}</p>
        <p class="font-bold text-center text-neutral-700">{{ $client->personalCode }}</p>
        </p>
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
    Delete Client
@endsection
