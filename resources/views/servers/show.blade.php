<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between" x-data="{}">
            <h2 class="app-header" style="color: {{ $server->color }}">{{ $server->name }}</h2>
            <a href="{{ route('servers.index') }}" class="text-gray-600 hover:text-gray-800 mr-2 order-first">
                <svg class="inline svg-icon"><use xlink:href="#icon-arrow-left2"></use></svg>
                <span class="hidden md:inline">Back to server list</span>
            </a>
            <form @submit.prevent="leaveServer('{{ route('server_members.remove', ['serverId' => $server->id]) }}', '{{ route('servers.index') }}')">
                <button type="submit" class="text-red-500 text-sm font-semibold" title="Leave server">
                    <svg class="inline svg-icon"><use xlink:href="#icon-exit"></use></svg>
                    <span class="hidden md:inline">Leave server</span>
                </button>
            </form>
        </div>
    </x-slot>

    <div class="flex flex-col gap-2">
        <x-server.members :server="$server"></x-server.members>

        <div id="app" class=" flex-grow max-w-3xl mx-auto my-6 md:rounded shadow bg-gray-50">
            <app :server="{{ $server }}" :user="{{ Auth::user() }}"></app>
        </div>
    </div>

    @push ('scripts')
        <script src="{{ mix('js/app.js') }}"></script>
        <script src="{{ mix('js/chats.js') }}"></script>
    @endpush
</x-app-layout>
