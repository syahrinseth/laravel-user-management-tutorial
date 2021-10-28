<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Edit Role') }}
            </h2>
        </div>
        
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <form action="{{ route('roles.update', ['role' => $role->id]) }}" method="post" class="">
                        @csrf
                        <input type="hidden" name="_method" value="PUT">
                        <div class="flex">
                            <div class="w-1/2 p-2">
                                <label for="">Name: </label>
                                <input type="text" name="name" class="w-full rounded-md" value="{{ $role->name }}">
                            </div>
                            <div class="w-1/2 p-2">
                                <label for="">Permission: </label>
                                @foreach($permission as $p)
                                    <div>
                                        <label for="{{ $p->name }}">{{ $p->name }}</label>
                                        <input class="rounded-md" id="{{ $p->name }}" type="checkbox" name="permission[]" value="{{ $p->name }}" {{ $role->permissions->contains(function($value, $key) use ($p){ return $value->name == $p->name; }) ? 'checked' : '' }}>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        <div class="w-full text-right">
                            <button class="bg-blue-600 text-white rounded-md p-2">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
