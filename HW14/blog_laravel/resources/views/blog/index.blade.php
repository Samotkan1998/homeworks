<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Blogs') }}
        </h2>
        <a href="{{ route('blogs.create') }}">{{ __('Create new blog') }}</a>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <ul class="list-disc">
                        @foreach($blogs as $blog)
                            <li style="display: flex; justify-content: space-between;">
                                <a href="{{ route('blog_posts.list', ['blog' => $blog->id]) }}">{{$blog->name}}</a>
                                <div style="display: flex; justify-content: space-between;">
                                    <a href="{{ route('blog.edit', ['blog' => $blog]) }}">Edit</a>
                                    <form style="margin-left: 15px;" method="POST" action="{{ route('blog.destroy', ['blog' => $blog]) }}">
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
