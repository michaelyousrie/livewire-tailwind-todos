<?php

namespace App\Http\Livewire;

use App\Models\Todo;
use Livewire\Component;
use Livewire\WithPagination;

class TodoList extends Component
{
    use WithPagination;

    public function render()
    {
        return view('livewire.todo-list', ['todos' => Todo::paginate(10)]);
    }

    public function complete($id)
    {
        Todo::find($id)->update(['completed' => true]);
    }

    public function inComplete($id)
    {
        Todo::find($id)->update(['completed' => false]);
    }

    public function remove($id)
    {
        Todo::find($id)->delete();
    }

    public function removeCompleted()
    {
        Todo::where('completed', true)->delete();
    }

    public function markAllCompleted()
    {
        Todo::where('completed', false)->update(['completed' => true]);
    }

    public function markAllIncomplete()
    {
        Todo::where('completed', true)->update(['completed' => false]);
    }
}
