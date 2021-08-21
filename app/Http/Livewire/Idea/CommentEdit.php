<?php

namespace App\Http\Livewire\Idea;

use App\Models\Comment;
use Livewire\Component;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class CommentEdit extends Component
{
    use AuthorizesRequests;

    protected $listeners = ['commentToUpdate'];

    public $comment;
    public $body;

    protected $rules = [
        'body' => 'required|min:3|max:500',
    ];

    public function commentToUpdate(Comment $comment)
    {
        $this->comment = $comment;
    }
    public function updateComment()
    {
        $this->authorize('update', $this->comment);
        $this->validate();
        $this->comment->update(['comment' => $this->body]);
        $this->emit('commentHasUpdated', 'Comment has been updated');
        $this->reset();
    }

    public function render()
    {
        return view('livewire.idea.comment-edit');
    }
}
