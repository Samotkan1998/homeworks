<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ $blog->name }}
        </h2>
    </x-slot>
    <form method="POST" action="{{ route('blogs.update', ['blog' => $blog]) }}">
        @csrf
        @method('PUT')
        <div>
            <x-label for="name" :value="__('Name')" />

            <x-input id="name" class="block mt-1 w-full" type="text" name="name" required autofocus value="{{ $blog->name }}" />
        </div>

        <div class="flex items-center justify-end mt-4">

            <x-button class="ml-3">
                {{ __('Edit blog') }}
            </x-button>
        </div>
    </form>
</x-app-layout>
