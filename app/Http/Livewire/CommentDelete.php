<?php

namespace App\Http\Livewire;

use App\Models\Comment;
use Livewire\Component;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class CommentDelete extends Component
{
    use AuthorizesRequests;
    protected $listeners = ['commentTodelete'];
    public $comment;

    public function commentTodelete(Comment $comment)
    {
        $this->comment = $comment;
    }

    public function deleteComment()
    {
        $this->authorize('update', $this->comment);
        $this->comment->delete();
        $this->emit('commentHasDelete', 'Comment has deleted');
    }

    public function render()
    {
        return view('livewire.idea.comment-delete');
    }
}
