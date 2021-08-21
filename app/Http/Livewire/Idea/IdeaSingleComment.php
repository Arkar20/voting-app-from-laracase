<?php

namespace App\Http\Livewire\Idea;

use App\Models\Idea;
use App\Models\Comment;
use Livewire\Component;

class IdeaSingleComment extends Component
{
    public $comment;
    public $idea;

    protected $listeners = ['commentHasUpdated'];

    public function commentHasUpdated()
    {
        $this->comment->refresh();
    }
    public function mount(Comment $comment, Idea $idea)
    {
        $this->comment = $comment;
        $this->idea = $idea;
    }
    public function setCommentEditId(Comment $comment)
    {
        $this->emit('commentToUpdate', $comment);
    }
    public function setDeleteComment(Comment $comment)
    {
        $this->emit('commentTodelete', $comment);
    }

    public function render()
    {
        return view('livewire.idea.idea-single-comment');
    }
}
