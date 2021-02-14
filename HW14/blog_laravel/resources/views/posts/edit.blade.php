<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit new post in') }} - {{ $post->title }}
        </h2>
    </x-slot>
    <form method="POST" action="{{ route('posts.update', ['post' => $post]) }}">
        @csrf
        @method('PUT')
        <div>
            <x-label for="title" :value="__('Title')" />

            <x-input id="title" class="block mt-1 w-full" type="text" name="title" required autofocus value="{{ $post->title }}" />
        </div>

        <div class="mt-4">
            <x-label for="content" :value="__('Post content')" />
            <x-input type="text" id="content" class="block mt-1 w-full" name="content" required value="{{ $post->content }}"/>
        </div>

        <div class="flex items-center justify-end mt-4">

            <x-button class="ml-3">
                {{ __('Edit post') }}
            </x-button>
        </div>
    </form>
</x-app-layout>
