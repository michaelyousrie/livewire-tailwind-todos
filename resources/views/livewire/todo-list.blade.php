<div>
    <h1 class="font-bold text-5xl">Todo List</h1>
    <div class="my-5">
        <input type="text" id="search" wire:model="search" class="w-5/12 border border-gray-500 p-1" placeholder="Search todos by title..">
    </div>

    <table class="table rounded p-5 table-auto">
        <thead>
            <tr class="bg-gray-700 text-white">
                <th class="border border-gray-800 px-5 py-3">#</th>
                <th class="border border-gray-800 px-5 py-3">ID</th>
                <th class="border border-gray-800 px-5 py-3">Title</th>
                <th class="border border-gray-800 px-5 py-3">Completed?</th>
                <th class="border border-gray-800 px-5 py-3">Created At</th>
                <th class="border border-gray-800 px-5 py-3">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($todos as $index => $todo)
                <tr>
                    <td class="border border-gray-400 px-4 py-2">{{ $index + 1 }}</td>
                    <td class="border border-gray-400 px-4 py-2">{{ $todo->id }}</td>
                    <td class="border border-gray-400 px-4 py-2">{{ $todo->title }}</td>
                    <td class="border border-gray-400 px-4 py-2 {{ $todo->completed ? 'text-green-600' : 'text-red-600' }}">
                        @if ($todo->completed)
                            <div class="font-semibold">&check; Yes</div>
                        @else
                            <div class="font-semibold">&#10005; No</div>
                        @endif
                    </td>
                    <td class="border border-gray-400 px-4 py-2">{{ $todo->created_at->format('Y-m-d H:i:s A') }}</td>
                    <td class="border border-gray-400 px-4 py-2">
                        @if($todo->completed)
                            <button wire:click="inComplete({{ $todo->id }})" class="text-yellow-600 border border-yellow-500 p-2 font-semibold hover:border-yellow-600">&#10005; Mark incomplete</button>
                        @else
                            <button wire:click="complete({{ $todo->id }})" class="text-green-600 border border-green-300 p-2 font-semibold hover:border-green-400">&check; Mark complete</button>
                        @endif
                        <button wire:click="remove({{ $todo->id }})" class="text-red-400 border border-red-300 p-2 font-semibold hover:border-red-400">&#10005; Delete</button>
                    </td>
                </tr>
            @endforeach
        </tbody>
        {{ $todos->links() }}
    </table>
    <div class="my-5">
        <button wire:click="filter" class="text-white bg-blue-800 border border-blue-600 p-3 w-50 hover:bg-blue-900">Show {{ $filtered ? 'All' : 'Incomplete only' }}</button>
        <button wire:click="removeCompleted" class="text-white bg-red-500 border border-red-600 p-3 w-50 hover:bg-red-600">Delete All Completed</button>
        <button wire:click="markAllCompleted" class="text-white bg-green-800 border border-green-600 p-3 w-50 hover:bg-green-900">Mark All As Completed</button>
        <button wire:click="markAllIncomplete" class="text-white bg-yellow-800 border border-yellow-400 p-3 w-50 hover:bg-yellow-900">Mark All As Incompleted</button>
    </div>
</div>
