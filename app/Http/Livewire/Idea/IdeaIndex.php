<?php

namespace App\Http\Livewire\Idea;

use App\Models\Idea;
use Livewire\Component;

class IdeaIndex extends Component
{
    public $idea;
    public $votes_count;
    public $hasVoted;

    public function mount($idea)
    {
        $this->idea = $idea;
        $this->votes_count = $idea->votes_count;
        $this->hasVoted = $idea->voted_at_id;
    }
    public function handleVote()
    {
        if (!auth()->check()) {
            return redirect('/login');
        }
        if (isset($this->hasVoted)) {
            $this->idea->removeVote(auth()->id());
            $this->votes_count--;
            $this->hasVoted = null;
        } else {
            $this->idea->vote(auth()->id());
            $this->votes_count++;
            $this->hasVoted = true;
        }
    }
    public function render()
    {
        return view('livewire.idea.idea-index');
    }
}
