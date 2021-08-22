<?php

namespace App\Http\Livewire\Idea;

use App\Models\Idea;
use Livewire\Component;
use Illuminate\Notifications\DatabaseNotification;

class CommentNotification extends Component
{
    public $notis;
    public $notisCount;
    public $loadingStatus = true;
    protected $listeners = [
        'showNotifications',
        'commented' => 'showNotifications',
    ];

    public function showNotifications()
    {
        $this->notis = auth()->user()->unreadNotifications;
        $this->getNotiCount();
        $this->loadingStatus = false;
    }
    public function markAsAllRead()
    {
        $this->notis->markAsRead();
        $this->notisCount = 0;
    }
    public function markSingleNotiRead($notificationId)
    {
        $notification = DatabaseNotification::find($notificationId);
        $notification->markAsRead();

        $idea = Idea::find($notification->data['idea_id']);
        $comments = $idea->comments()->pluck('id');

        $gotoPage = (int) ($comments->count() / 10 + 1);
        session()->flash('scrollToComment', $notification->data['comment_id']);

        return redirect()->route('idea.show', [
            $notification->data['idea_slug'],
            'page' => $gotoPage,
        ]);
    }

    public function mount()
    {
        $this->notis = collect([]);
        $this->getNotiCount();
    }
    public function getNotiCount()
    {
        $this->notisCount = auth()
            ->user()
            ->unreadNotifications()
            ->count();
    }

    public function render()
    {
        return view('livewire.idea.comment-notification');
    }
}
