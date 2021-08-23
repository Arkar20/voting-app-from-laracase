<?php

namespace App\Http\Livewire\Idea;

use App\Models\Idea;
use Livewire\Component;
use App\Notifications\CommentAdded;
use App\Traits\handleRedirecttrait;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider;

class IdeaComment extends Component
{
    use handleRedirecttrait;

    public $idea;
    public $comment;

    protected $rules = ['comment' => 'required|min:5'];

    public function mount(Idea $idea)
    {
        $this->idea = $idea;
    }

    public function addComment()
    {
        $this->redirectToLogin();
        $this->validate();
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
