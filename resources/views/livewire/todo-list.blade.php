<div>
    <h1 class="font-bold text-5xl">Todo List</h1>
    <table class="table rounded p-5 table-auto">
        <thead>
            <tr class="bg-indigo-200">
                <th class="border border-blue-400 px-5 py-3">#</th>
                <th class="border border-blue-400 px-5 py-3">ID</th>
                <th class="border border-blue-400 px-5 py-3">Title</th>
                <th class="border border-blue-400 px-5 py-3">Completed?</th>
                <th class="border border-blue-400 px-5 py-3">Created At</th>
                <th class="border border-blue-400 px-5 py-3">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($todos as $index => $todo)
                <tr class="{{ $todo->completed ? 'bg-green-100' : 'bg-red-100' }}">
                    <td class="border border-gray-400 px-4 py-2">{{ $index + 1 }}</td>
                    <td class="border border-gray-400 px-4 py-2">{{ $todo->id }}</td>
                    <td class="border border-gray-400 px-4 py-2">{{ $todo->title }}</td>
                    <td class="border border-gray-400 px-4 py-2 {{ $todo->completed ? 'text-green-400' : 'text-red-400' }}">
                        @if ($todo->completed)
                            <div class="font-semibold">&check; Yes</div>
                        @else
                            <div class="font-semibold">&#10005; No</div>
                        @endif
                    </td>
                    <td class="border border-gray-400 px-4 py-2">{{ $todo->created_at->format('Y-m-d H:i:s A') }}</td>
                    <td class="border border-gray-400 px-4 py-2">
                        @if($todo->completed)
                            <button wire:click="inComplete({{ $todo->id }})" class="text-yellow-600 border border-yellow-500 p-2 font-semibold hover:border-yellow-600">&#10005; Mark InComplete</button>
                        @else
                            <button wire:click="complete({{ $todo->id }})" class="text-green-600 border border-green-300 p-2 font-semibold hover:border-green-400">&check; Mark Complete</button>
                        @endif

                        <button wire:click="remove({{ $todo->id }})" class="text-red-400 border border-red-300 p-2 font-semibold hover:border-red-400">&#10005; Delete</button>
                    </td>
                </tr>
            @endforeach
        </tbody>
        {{ $todos->links() }}
    </table>
    <div class="my-5">
        <button wire:click="removeCompleted" class="text-white bg-red-500 border border-red-600 p-3 w-50 hover:bg-red-600">Delete All Completed Todos</button>
        <button wire:click="markAllCompleted" class="text-white bg-green-500 border border-green-600 p-3 w-50 hover:bg-green-600">Mark All Todos As Completed</button>
        <button wire:click="markAllIncomplete" class="text-white bg-yellow-500 border border-yellow-600 p-3 w-50 hover:bg-yellow-600">Mark All Todos As InComplete</button>
    </div>
</div>
