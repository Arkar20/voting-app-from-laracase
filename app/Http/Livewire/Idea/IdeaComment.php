<?php

namespace App\Http\Livewire\Idea;

use App\Models\Idea;
use Livewire\Component;

class IdeaComment extends Component
{
    public $idea;
    public $comment;

    public function mount(Idea $idea)
    {
        $this->idea = $idea;
    }
    public function addComment()
    {
        // dd($this->idea->comments);
        $this->idea->addComment($this->comment);

        $this->emit('commented', 'Your Comment Has Added!');
    }
    public function render()
    {
        return view('livewire.idea.idea-comment');
    }
}
