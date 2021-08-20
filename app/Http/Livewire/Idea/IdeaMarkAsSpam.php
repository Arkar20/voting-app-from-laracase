<?php

namespace App\Http\Livewire\Idea;

use App\Models\Idea;
use Livewire\Component;
use Illuminate\Support\Facades\Http;

class IdeaMarkAsSpam extends Component
{
    public $idea;

    public function mount(Idea $idea)
    {
        $this->idea = $idea;
    }

    public function spamIdea()
    {
        if (auth()->guest()) {
            abort(400);
        }
        $this->idea->increment('spam_count');
        $this->emit('spamCountHasIncreased', 'This Idea Has Marked As Spam!');
    }
    public function render()
    {
        return view('livewire.idea.idea-mark-as-spam');
    }
}
