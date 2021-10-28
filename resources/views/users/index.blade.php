<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Users') }}
            </h2>
        </div>
        
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <table class="table-auto w-full border-collapse border border-green-800">
                        <thead>
                            <tr>
                                <th class="w-1/3 border border-green-600 p-2">
                                    Name 
                                </th>
                                <th class="w-1/4 border border-green-600 p-2">
                                    Role
                                </th>
                                <th class="w-1/4 border border-green-600 p-2">
                                    Action
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach( $data as $d )
                            <tr>
                                <td class="w-1/3 border border-green-600 p-2">
                                    {{ $d->name }}
                                </td>
                                <td class="w-1/4 border border-green-600 p-2">
                                    {{ $d->roles->implode('name', ', ') }}
                                </td>
                                <td class="w-1/4 border border-green-600 p-2">
                                    @can('user-edit')
                                        <a href="{{ route('users.edit', ['user' => $d->id]) }}" class="bg-blue-600 text-white rounded-md p-2">Edit</a>
                                    @endcan
                                    @can('user-delete')
                                        @if($d->id != auth()->user()->id)
                                        <form action="{{ route('users.destroy', ['user' => $d->id]) }}" method="post">
                                            @csrf
                                            <input type="hidden" name="_method" value="DELETE">
                                            <button href="#" class="bg-red-600 text-white rounded-md p-2">Delete</button>
                                        </form> 
                                        @endif
                                    @endcan
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
