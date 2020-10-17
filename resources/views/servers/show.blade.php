<x-app-layout>
    <x-slot name="header">
        <h2 class="app-header" style="color: {{ $server->color }}">{{ $server->name }}</h2>
    </x-slot>

    <div id="app" class="max-w-3xl mx-auto my-6 md:rounded shadow bg-gray-50">
        <app :server="{{ $server }}" :user="{{ Auth::user() }}"></app>
    </div>

    @push ('scripts')
        <script src="{{ asset('js/chats.js') }}"></script>
    @endpush
</x-app-layout>
