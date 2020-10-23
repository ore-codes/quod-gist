<div class="p-6 sm:px-20 bg-white border-b border-gray-200">
    <div>
        <x-jet-application-logo class="block h-12 w-auto" />
    </div>

    <div class="mt-8 text-2xl">
        Welcome to {{ config('app.name', 'QuodGist') }}!
    </div>

    <div class="mt-6 text-gray-500">
        Here you can join chat servers and chat with friends on the same servers. Choose any of the options below to get started quickly!
    </div>
</div>

<div class="bg-gray-200 bg-opacity-25 grid grid-cols-1 md:grid-cols-2">
    <div class="p-6">
        <div class="flex items-center">
            <svg class="w-8 h-8 text-gray-400"><use xlink:href="#profile" /></svg>
            <div class="ml-4 text-lg text-gray-600 leading-7 font-semibold"><a href="{{ route('profile.show') }}">Profile</a></div>
        </div>

        <div class="ml-12">
            <div class="mt-2 text-sm text-gray-500">
                 Manage your profile details. Set or remove your profile photo. Enable two-factor authentication and manage your browsing sessions across all your browsers.
            </div>

            <a class="mt-3 flex items-center text-sm font-semibold text-indigo-700" href="{{ route('profile.show') }}">
                <span>View your profile</span>
                <svg class="ml-1 text-indigo-500 w-4 h-4"><use xlink:href="#icon-arrow-right2" /></svg>
            </a>
        </div>
    </div>

    <div class="p-6 border-t border-gray-200 md:border-t-0 md:border-l">
        <div class="flex items-center">
            <svg class="w-8 h-8 text-gray-400"><use xlink:href="#chats" /></svg>
            <div class="ml-4 text-lg text-gray-600 leading-7 font-semibold"><a href="{{ route('servers.index') }}">Chats</a></div>
        </div>

        <div class="ml-12">
            <div class="mt-2 text-sm text-gray-500">
                A chat server is an independent thread where users can join to chat with each other. The chats are secured with end-to-end encryption. The chats may only be seen by the members of the server.
            </div>

            <a class="mt-3 flex items-center text-sm font-semibold text-indigo-700" href="{{ route('servers.index') }}">
                <span>Start chatting</span>
                <svg class="ml-1 text-indigo-500 w-4 h-4"><use xlink:href="#icon-arrow-right2" /></svg>
            </a>
        </div>
    </div>
</div>
