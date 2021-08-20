<?php

namespace App\Http\Livewire\Idea;

use App\Models\Idea;
use App\Models\Comment;
use Livewire\Component;
use Livewire\WithPagination;

class IdeaComments extends Component
{
    use WithPagination;

    public $idea;
    protected $listeners = ['commented'];

    public function commented()
    {
        $this->idea->refresh();
    }

    public function mount(Idea $idea)
    {
        $this->idea = $idea;
    }

    public function render()
    {
        return view('livewire.idea.idea-comments', [
            'comments' => $this->idea
                ->comments()
                ->latest()
                ->simplePaginate(10),
        ]);
    }
}
