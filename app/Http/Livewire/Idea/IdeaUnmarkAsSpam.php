<?php

namespace App\Http\Livewire\Idea;

use App\Models\Idea;
use Livewire\Component;

class IdeaUnmarkAsSpam extends Component
{
    public $idea;

    public function mount(Idea $idea)
    {
        $this->idea = $idea;
    }

    public function unmarkSpam()
    {
        $this->authorize('viewAny', $this->idea); //only admin can unmark

        $this->idea->spam_count = 0;
        $this->idea->save();
        $this->emit('spamUnmark');
    }
    public function render()
    {
        return view('livewire.idea.idea-unmark-as-spam');
    }
}
