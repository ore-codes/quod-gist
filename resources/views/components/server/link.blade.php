<a href="{{ route('servers.show', ['id' => $server->id]) }}"
   class="flex-grow-1 hover:bg-gray-100 bg-white text-center shadow-lg m-4 max-w-48 min-h-48 py-2 rounded-lg">
    <h3 class="inline-flex justify-center items-center w-32 h-32 m-4 shadow-sm bg-gray-100 font-semibold text-2xl rounded-full"
        style="color: {{$server->color}};">{{ $server->name }}</h3>
    <p class="text-sm">{{ $server->members->count() }} members</p>
    <p class="text-sm italic">You are {{ $server->members->contains(Auth::user()) ? '' : 'not' }} a member</p>
</a>
