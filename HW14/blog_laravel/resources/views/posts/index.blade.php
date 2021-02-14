<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Posts of blog') }} - {{ $blog->name }}
        </h2>
        <a href="{{ route('create.post', ['blog' => $blog->id]) }}"> {{ __('Add new post') }}</a>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <ul class="list-disc">
                        @foreach($posts as $post)
                            <li style="display: flex; justify-content: space-between;">
                                <a href="{{ route('posts.show', ['post' => $post->id]) }}">{{$post->title}}</a>
                                <div style="display: flex; justify-content: space-between;">
                                    <a href="{{ route('posts.edit', ['post' => $post]) }}">Edit</a>
                                    <form style="margin-left: 15px;" method="POST" action="{{ route('posts.destroy', ['post' => $post]) }}">
                                        @csrf
                                        @method('DELETE')
                                        <button>Remove</button>
                                    </form>
                                </div>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
