<?php

namespace App\Http\Livewire\Idea;

use App\Models\Idea;
use Livewire\Component;

class IdeaSetStatus extends Component
{
    public Idea $idea;
    public $status;

    /**
     * @Route("Route", name="RouteName")
     */
    public function statusChange()
    {
        $this->idea->update([
            'status_id' => $this->status,
        ]);
        $this->emit('statusHasChanged');
    }

    public function render()
    {
        return view('livewire.idea.idea-set-status');
    }
}
