<?php

namespace App\Http\Livewire\Idea;

use App\Models\Idea;
use Livewire\Component;
use App\Exceptions\RegisterException;
use App\Exceptions\RemoveVoteException;

class Single extends Component
{
    public $idea;
    public $votes_count;
    public $hasVoted;

    protected $listeners = [
        'statusHasChanged' => 'componentRefresh',
        'ideaUpdated' => 'componentRefresh',
        'spamCountHasIncreased' => 'componentRefresh',
        'spamUnmark' => 'componentRefresh',
        'commented' => 'componentRefresh',
        'commentHasDelete' => 'componentRefresh',
    ];

    public function mount($idea)
    {
        $this->idea = $idea;
        $this->votes_count = $idea->votes_count;
        $this->hasVoted = $idea->isVoted();
    }

    public function componentRefresh()
    {
        $this->idea->refresh();
    }
    public function handleVote()
    {
        if (!auth()->check()) {
            return redirect('/login');
        }
        if ($this->hasVoted) {
            try {
                $this->idea->removeVote(auth()->id());
            } catch (RemoveVoteException $e) {
                //do nothing
            }
            $this->votes_count--;
            $this->hasVoted = false;
        } else {
            try {
                $this->idea->vote(auth()->id());
            } catch (RegisterException $e) {
                //do nothing
            }
            $this->votes_count++;
            $this->hasVoted = true;
        }
    }
    public function render()
    {
        return view('livewire.idea.single');
    }
}
