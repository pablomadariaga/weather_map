<x-guest-layout>
    <x-card>
        <x-slot name="title">
            {{ __('Query history') }}
        </x-slot>

        <div class="w-full space-x-4 flex">
            <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800"
                href="{{ route('weather.index') }}">
                {{ __('Home') }}
            </a>
            <a class="ml-4 underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800"
                href="{{ route('weather.map') }}">
                {{ __('Map') }}
            </a>
        </div>
        <table class="table-auto border-collapse border w-full mt-5">
            <thead>
                <tr>
                    <th class="p-3 border border-gray-600">{{ __('City') }}</th>
                    <th class="p-3 border border-gray-600">{{ __('Humidity') }}</th>
                    <th class="p-3 border border-gray-600">{{ __('Date') }}</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($histories as $history)
                    <tr>
                        <td class="p-3 border border-gray-600">{{ $history['city']['name'] }}</td>
                        <td class="p-3 border border-gray-600">{{ $history['humidity'] }}</td>
                        <td class="p-3 border border-gray-600">{{ $history['created_at'] }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </x-card>
</x-guest-layout>
