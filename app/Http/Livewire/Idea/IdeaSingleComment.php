<?php

namespace App\Http\Livewire\Idea;

use App\Models\Idea;
use App\Models\Comment;
use Livewire\Component;

class IdeaSingleComment extends Component
{
    public $comment;

    public function mount(Comment $comment)
    {
        $this->comment = $comment;
    }

    public function render()
    {
        return view('livewire.idea.idea-single-comment');
    }
}
