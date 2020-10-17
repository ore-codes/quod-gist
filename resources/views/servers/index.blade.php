<x-app-layout>
    <x-slot name="header">
        <h2 class="app-header">Available servers</h2>
    </x-slot>

    <div class="flex flex-col items-center sm:flex-wrap sm:flex-row">
        @foreach($servers as $server)
            <x-server.link :server="$server" />
        @endforeach
    </div>
</x-app-layout>
