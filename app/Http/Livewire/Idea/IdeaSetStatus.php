<?php

namespace App\Http\Livewire\Idea;

use App\Models\Idea;
use Livewire\Component;
use Illuminate\Support\Facades\Mail;
use App\Mail\IdeaSendEmailOnChangeStatus;

class IdeaSetStatus extends Component
{
    public Idea $idea;
    public $status;
    public $notify_voters;

    /**
     * @Route("Route", name="RouteName")
     */

    public function mount()
    {
        $this->status = $this->idea->status_id;
    }
    public function statusChange()
    {
        if ($this->notify_voters) {
            $this->idea
                ->votes()
                ->select('name', 'email')
                ->chunk(100, function ($voters) {
                    foreach ($voters as $voter) {
                        Mail::to($voter)
                        ->subject("Status Has Changed")
                        ->queue(
                            new IdeaSendEmailOnChangeStatus($this->idea)
                        );
                    }
                });
        }
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
