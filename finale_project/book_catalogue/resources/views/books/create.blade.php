<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create new book') }}
        </h2>
    </x-slot>
    <div class="form_wrap">
        <form method="POST" action="{{ route('books.store') }}">
            @csrf
            <div class="single_input">
                <x-label for="title" :value="__('Title')" />
                <x-input id="title" class="block mt-1 w-full" type="text" name="title" required autofocus />
            </div>
            <div class="single_input">
                <x-label for="writer" :value="__('Author')" />
                <x-input id="writer" class="block mt-1 w-full" type="text" name="writer" required autofocus />
            </div>

            <div class="single_input">
                <x-label for="genre" :value="__('Genre')" />
                <x-input id="genre" class="block mt-1 w-full" type="text" name="genre" required autofocus />
            </div>

            <div class="single_input">
                <x-label for="photo_src" :value="__('Photo link')" />
                <x-input id="photo_src" class="block mt-1 w-full" type="text" name="photo_src" required autofocus />
            </div>

            <div class="mt-4 single_input">
                <x-label for="annotation" :value="__('Annotation')" />
                <textarea id="annotation" class="block mt-1 w-full"
                            name="annotation"
                          required> </textarea>
            </div>

            <div class="flex items-center justify-end mt-4">
                <x-button class="ml-3">
                    {{ __('Add new book') }}
                </x-button>
            </div>


        </form>
    </div>
</x-app-layout>
