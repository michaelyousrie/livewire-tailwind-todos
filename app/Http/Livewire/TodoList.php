<?php

namespace App\Http\Livewire;

use App\Models\Todo;
use Livewire\Component;
use Livewire\WithPagination;

class TodoList extends Component
{
    use WithPagination;

    public $filtered = false;
    public $search = null;

    protected $listeners = [
        'updated'   => '$refresh'
    ];

    public function render()
    {
        if ($this->filtered) {
            $todos = Todo::where('completed', false)->latest()->paginate(10);
        } else {
            if (!empty($this->search)) {
                $todos = Todo::where('title', 'like', "%{$this->search}%")->latest()->paginate(10);
            } else {
                $todos = Todo::latest()->paginate(10);
            }
        }

        return view('livewire.todo-list', ['todos' => $todos]);
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

    public function filter()
    {
        $this->filtered = !$this->filtered;
    }
}
