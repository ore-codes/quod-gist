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

            <a href="{{ route('profile.show') }}">
                <div class="mt-3 flex items-center text-sm font-semibold text-indigo-700">
                    <div>View your profile</div>

                        <div class="ml-1 text-indigo-500">
                            <svg viewBox="0 0 20 20" fill="currentColor" class="arrow-right w-4 h-4"><path fill-rule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                        </div>
                </div>
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

            <a href="{{ route('servers.index') }}">
                <div class="mt-3 flex items-center text-sm font-semibold text-indigo-700">
                        <div>Start chatting</div>

                        <div class="ml-1 text-indigo-500">
                            <svg viewBox="0 0 20 20" fill="currentColor" class="arrow-right w-4 h-4"><path fill-rule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                        </div>
                </div>
            </a>
        </div>
    </div>
</div>
