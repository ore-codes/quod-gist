<div class="m-2 p-2 shadow-lg rounded" x-data="{color: '{{ $server->color }}'}"
     x-bind:style="`color: ${invertColor(color, true)}; background-color: ${color};`">
    <details>
        <summary class="py-1 text-xl">{{ $server->name }}</summary>
        <div class="p-2 border-t border-gray-300">
            <p><strong>{{ $server->members->count() }}</strong> members</p>
            <p><strong>{{ $server->messages->count() }}</strong> messages</p>
            @foreach($server->members as $member)
                <x-server.member :user="$member"></x-server.member>
            @endforeach
        </div>
    </details>
</div>
