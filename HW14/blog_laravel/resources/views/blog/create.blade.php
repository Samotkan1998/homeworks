<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ $blog->name }}
        </h2>
    </x-slot>
    <form method="POST" action="{{ route('blogs.store', ['blog' => $blog->id]) }}">
        @csrf
        <div>
            <x-label for="name" :value="__('Name')" />

            <x-input id="name" class="block mt-1 w-full" type="text" name="name" required autofocus />
        </div>

        <div class="flex items-center justify-end mt-4">

            <x-button class="ml-3">
                {{ __('Create blog') }}
            </x-button>
        </div>
    </form>
</x-app-layout>
