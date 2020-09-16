<?php

namespace App\Http\Livewire;

use App\Models\Todo;
use Livewire\Component;

class TodoForm extends Component
{
    public $title = null;
    public $completed = false;

    protected $rules = [
        'title'     => 'required|min:5'
    ];

    public function render()
    {
        return view('livewire.todo-form');
    }

    public function store()
    {
        $this->validate();

        Todo::forceCreate([
            'title'     => $this->title,
            'completed' => $this->completed
        ]);

        $this->title = null;
        $this->completed = false;

        $this->emit("updated");
    }
}
