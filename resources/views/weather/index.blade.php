<x-guest-layout>
    <x-card>
        <x-slot name="title">
            {{ __('Get the city humidity') }}
        </x-slot>
        <form action="{{ route('weather.get') }}" method="POST">
            @csrf
            <div>
                <x-label for="city" value="{{ __('Enter city name') }}" />
                <x-input id="city" class="block mt-1 w-full" type="text" name="city" :value="old('city')" required
                    autofocus />
            </div>
            <div class="flex items-center justify-end mt-4 space-x-4">
                <x-button class="ml-4" href="{{ route('weather.map') }}">
                    {{ __('See all cities on the map') }}
                </x-button>
                <x-button class="ml-4" href="{{ route('weather.history') }}">
                    {{ __('View query history') }}
                </x-button>
                <x-button class="ml-4">
                    {{ __('Get Weather') }}
                </x-button>
            </div>
        </form>
    </x-card>
</x-guest-layout>
