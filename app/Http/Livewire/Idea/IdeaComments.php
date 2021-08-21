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
    protected $listeners = [
        'commented',
        'commentHasUpdated',
        'commentHasDelete',
    ];

    public function commentHasDelete()
    {
        $this->idea->comments;
    }
    public function commentHasUpdated()
    {
        $this->idea->comments;
    }

    public function commented()
    {
        $this->idea->refresh();
        $this->gotoPage(
            $this->idea
                ->comments()
                ->paginate()
                ->lastPage()
        );
    }

    public function mount(Idea $idea)
    {
        $this->idea = $idea;
    }

    public function render()
    {
        return view('livewire.idea.idea-comments', [
            'comments' => $this->idea->comments()->paginate(),
            'idea' => $this->idea,
        ]);
    }
}
