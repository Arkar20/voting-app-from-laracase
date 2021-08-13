<?php

namespace App\Http\Livewire\Idea;

use App\Models\Idea;
use Livewire\Component;

class Single extends Component
{
    public Idea $idea;

    public function render()
    {
        return view('livewire.idea.single');
    }
}
