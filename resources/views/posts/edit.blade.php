<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Edit Post') }}
            </h2>
        </div>
        
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <form action="{{ route('posts.update', ['post' => $post->id]) }}" method="post" class="">
                        @csrf
                        <input type="hidden" name="_method" value="PUT">
                        <div class="flex">
                            <div class="w-1/2 p-2">
                                <label for="">Title: </label>
                                <input type="text" name="title" class="w-full rounded-md" value="{{ $post->title }}">
                            </div>
                            <div class="w-1/2 p-2">
                                <label for="">Body: </label>
                                <br>
                                <textarea name="body" id="body" cols="30" rows="10" class="w-full rounded-md">{{ $post->body }}</textarea>
                            </div>
                        </div>
                        <div class="w-full text-right">
                            <button class="bg-blue-600 text-white rounded-md p-2">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
