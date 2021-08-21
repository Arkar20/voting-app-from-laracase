<?php

namespace App\Http\Livewire\Idea;

use App\Models\Idea;
use Livewire\Component;
use App\Notifications\CommentAdded;

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
        $newComment = $this->idea->addComment($this->comment);
        $this->idea->user->notify(new CommentAdded($newComment));
        $this->comment = '';
        $this->emit('commented', 'Your Comment Has Added!');
    }
    public function render()
    {
        return view('livewire.idea.idea-comment');
    }
}
