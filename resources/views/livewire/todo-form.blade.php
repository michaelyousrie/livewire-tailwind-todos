<div class="bg-gray-200 my-4 border border-gray-300 rounded">
    <h1 class="font-bold text-5xl mb-3">Add Todo</h1>
    <form action="#" method="post" wire:submit.prevent="store">
        <div>
            <label for="title">Title:</label>
            <input type="text" id="title" wire:model="title" class="w-10/12 border border-gray-300 p-1">
            @error('title')
                <div class="w-12/12 bg-red-200 p-2 m-2">
                    <span class="text-red-700">{{ $message }}</span>
                </div>
            @enderror
        </div>

        <div class="my-2">
            <label for="completed">Completed?</label>
            <input type="checkbox" id="completed" wire:model="completed">
            @if($completed == true) <span class="text-green-600 font-semibold">Yes &check;</span> @else <span class="text-red-600 font-semibold">No &#10005;</span> @endif
        </div>

        <div>
            <button type="submit" class="border border-blue-700 bg-blue-600 text-white p-2 w-4/12 m-5 hover:bg-blue-700 rounded">Add Todo</button>
        </div>
    </form>
</div>
