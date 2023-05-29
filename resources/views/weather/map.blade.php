<x-guest-layout>
    <x-card>
        <x-slot name="title">
            {{ __('Humidity of the cities') }}
        </x-slot>
        <div class="w-full space-x-4 flex">
            <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800"
                href="{{ route('weather.index') }}">
                {{ __('Home') }}
            </a>
            <a class="ml-4 underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800"
                href="{{ route('weather.history') }}">
                {{ __('View query history') }}
            </a>
        </div>

        <div id="map" class="mt-5 max-h-80 h-80"></div>
    </x-card>
    @push('styles')
        <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"
            integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=" crossorigin="" />
    @endpush
    @push('scripts')
        <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"
            integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin=""></script>

        <script>
            var humidityData = @json($humidityData);

            var map = L.map('map').setView([humidityData[0].latitude, humidityData[0].longitude], 3);

            L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                maxZoom: 19,
                attribution: '&copy; OpenStreetMap contributors'
            }).addTo(map)

            humidityData.forEach(function(data) {
                var marker = L.marker([data.latitude, data.longitude]).addTo(map);
                marker.bindPopup('City: <strong>' + data.city + '</strong><br>Humidity: ' + data.humidity + '%');
            });
        </script>
    @endpush
</x-guest-layout>
