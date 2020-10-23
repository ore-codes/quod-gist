<x-app-layout>
    <x-slot name="header">
        <h2 class="app-header flex justify-between" style="color: {{ $server->color }}" x-data="{}">
            <span>{{ $server->name }}</span>
            <form @submit.prevent="leaveServer({{ route('server_members.remove', ['serverId' => $server->id]) }}, '{{ route('servers.index') }}')">
                <button type="submit" class="text-red-500 text-sm font-semibold" title="Leave server">
                    <svg class="inline svg-icon"><use xlink:href="#icon-exit"></use></svg>
                    <span class="hidden md:inline">Leave server</span>
                </button>
            </form>
        </h2>
    </x-slot>

    <div id="app" class="max-w-3xl mx-auto my-6 md:rounded shadow bg-gray-50">
        <app :server="{{ $server }}" :user="{{ Auth::user() }}"></app>
    </div>

    @push ('scripts')
        <script src="{{ mix('js/app.js') }}"></script>
        <script src="{{ mix('js/chats.js') }}"></script>
    @endpush
</x-app-layout>
