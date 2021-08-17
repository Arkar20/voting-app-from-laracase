<?php

namespace App\Http\Livewire\Idea;

use App\Models\Idea;
use Livewire\Component;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class IdeaEditModel extends Component
{
    use AuthorizesRequests;

    public $title;
    public $desc;
    public $category_id;
    public $ideaToUpdate;

    protected $rules = [
        'title' => 'required|min:6',
        'desc' => 'required|min:6',
        'category_id' => 'required',
    ];

    public function mount(Idea $idea)
    {
        $this->ideaToUpdate = $idea;
        $this->title = $idea->title;
        $this->desc = $idea->desc;
        $this->category_id = $idea->category_id;
    }

    public function updateIdea()
    {
        if (auth()->guest()) {
            return abort(404);
        }
        $this->authorize('update', $this->ideaToUpdate);

        $this->validate();

        $this->ideaToUpdate->update([
            'title' => $this->title,
            'desc' => $this->desc,
            'category_id' => $this->category_id,
        ]);

        $this->emit('ideaUpdated'); //close the modal and refrese the idea show component
    }

    public function render()
    {
        return view('livewire.idea.idea-edit-model');
    }
}
