<x-app-layout>
    <x-slot name="header">
        <h2 class="app-header">Join "{{ $server->name  }}"</h2>
    </x-slot>

    <p class="text-2xl mx-8 px-4 py-6 text-gray-800 border-b-2 border-gray-300">
        You are not a member of <span class="text-3xl" style="color: {{$server->color}}">{{ $server->name }}</span> and,
        thus, have no access. Would you like to join this server?
    </p>

    <form action="{{ route('server_members.add', ['id' => $server->id]) }}" method="post">
        @csrf
        <x-jet-button type="submit" class="float-right m-8">Yes, Join me</x-jet-button>
    </form>
</x-app-layout>
