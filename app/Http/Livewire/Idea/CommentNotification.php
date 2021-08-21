<?php

namespace App\Http\Livewire\Idea;

use Livewire\Component;

class CommentNotification extends Component
{
    public $notis;

    protected $listeners = ['showNotifications'];

    public function showNotifications()
    {
        $this->notis = auth()->user()->unreadNotifications;
    }

    public function mount()
    {
        $this->notis = collect([]);
    }

    public function render()
    {
        return view('livewire.idea.comment-notification');
    }
}
