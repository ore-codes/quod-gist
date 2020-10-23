<x-app-layout>
    <x-slot name="header">
        <h2 class="app-header flex justify-between" style="color: {{ $server->color }}">
            <span>{{ $server->name }}</span>
            <button class="text-red-500 text-sm font-semibold">
                <span>Leave server</span>
            </button>
        </h2>
    </x-slot>

    <div id="app" class="max-w-3xl mx-auto my-6 md:rounded shadow bg-gray-50">
        <app :server="{{ $server }}" :user="{{ Auth::user() }}"></app>
    </div>

    @push ('scripts')
        <script src="{{ mix('js/chats.js') }}"></script>
    @endpush
</x-app-layout>
