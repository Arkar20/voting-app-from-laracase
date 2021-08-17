<?php

namespace App\Http\Livewire\Idea;

use App\Models\Idea;
use Livewire\Component;

class IdeaDeleteModal extends Component
{
    public $idea;

    public function mount(Idea $idea)
    {
        $this->idea = $idea;
    }

    public function deleteIdea()
    {
        if (
            auth()->guest() ||
            auth()
                ->user()
                ->cannot('delete', $this->idea)
        ) {
            abort(403);
        }
        $this->idea->delete();
        $this->emit('ideadeleted');
        return redirect()->route('idea.index');
    }
    public function render()
    {
        return view('livewire.idea.idea-delete-modal');
    }
}
