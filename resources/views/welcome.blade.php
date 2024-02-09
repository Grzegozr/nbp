@extends('layouts.master')

@section('body')
    <h3 class="text-gray-700 text-3xl font-medium">Panel główny</h3>

    <div class="mt-4">
        <h4 class="text-gray-600">Ulubione waluty</h4>
        <div class="flex flex-wrap -mx-6 my-4">
                @foreach($favoriteCurrencies as $favoriteCurrency)
                    <x-favorite-currency-card
                        :code="$favoriteCurrency->currency->code"
                        :name="$favoriteCurrency->currency->name"
                        :rate="$favoriteCurrency->rate"
                        :id="$favoriteCurrency->id"
                        table="favorite_currencies"
                    />
                @endforeach

        </div>
    </div>

    <div class="mt-4">
        <h4 class="text-gray-600">Waluty</h4>

        <div class="mt-6">
            <div class="bg-white shadow rounded-md overflow-hidden my-6">
                <table class="text-left w-full border-collapse">
                    <thead class="border-b">
                    <tr>
                        <th class="py-3 px-5 bg-indigo-800 font-medium uppercase text-sm text-gray-100">Nazwa</th>
                        <th class="py-3 px-5 bg-indigo-800 font-medium uppercase text-sm text-gray-100">Kod</th>
                        <th class="py-3 px-5 bg-indigo-800"></th>
                    </tr>
                    </thead>
                    <tbody>
                    @forelse($currencies as $currency)
                        <tr class="hover:bg-gray-200">
                            <td class="py-4 px-6 border-b text-gray-700 text-lg">{{$currency->name}}</td>
                            <td class="py-4 px-6 border-b text-gray-500">{{$currency->code}}</td>
                            <td class="border-b text-right">
                                <form action="{{ route('favorite_currencies.store') }}" method="POST">
                                    @csrf
                                    <input type="hidden" name="currency_id" value="{{ $currency->id }}">
                                    <button type="submit" class="flex items-center justify-center px-2 py-1 bg-blue-500 text-white rounded-md hover:bg-blue-600">
                                        <svg class="w-4 h-4 mr-1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                            <path fill-rule="evenodd" d="M10 17.5l-6.95 2.53c-0.75 0.27-1.55-0.36-1.4-1.14l1.1-7.37L0.3 6.97C-0.22 6.45 0.02 5.55 0.74 5.41l7.62-1.16L9.62 0c0.3-0.72 1.35-0.72 1.65 0l1.26 4.25 7.62 1.16c0.72 0.14 0.97 1.04 0.44 1.56l-5.59 5.27 1.1 7.37c0.15 0.78-0.65 1.41-1.4 1.14L10 17.5z" clip-rule="evenodd"></path>
                                        </svg>
                                        Dodaj do ulubionych
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr class="hover:bg-gray-200">
                            <td colspan="3" class="py-4 px-6 border-b text-gray-700 text-lg">Brak danych</td>
                        </tr>
                    @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

        @include('components.delete-modal')

@endsection

@section('scripts')
    <script src="{{ asset('js/delete_modal.js') }}"></script>
@endsection
