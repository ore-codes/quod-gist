<x-guest-layout>
    <header class="px-8 py-4 shadow-sm">
        @include('svg-sprite')
        <x-jet-application-mark class="inline h-9 w-9" />
        <h1 class="inline font-bold text-2xl text-gray-800 leading-tight">{{ config('app.name', 'QuodGist') }}</h1>
    </header>

    <main class="flex flex-wrap p-16 min-h-screen items-stretch">
        <div class="w-full text-3xl md:text-5xl text-gray-500 md:w-1/2">
            <h2 class="my-4">Welcome to QuodGist, the discussion forum for true coders.</h2>
            <div class="flex flex-col items-center md:flex-row gap-4 w-full py-4">
                <a href="{{ route('register') }}"><x-jet-button class="text-sm md:text-3xl capitalize">Create an account</x-jet-button></a>
                <a href="{{ route('login') }}"><x-jet-button class="text-sm md:text-3xl capitalize">Log in</x-jet-button></a>
            </div>
        </div>
        <p class="welcome-art w-full md:w-1/2 h-96"></p>
    </main>
</x-guest-layout>
