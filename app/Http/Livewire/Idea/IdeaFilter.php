<?php

namespace App\Http\Livewire\Idea;

use App\Models\Idea;
use Livewire\Component;
use Illuminate\Routing\Route;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\URL;

class IdeaFilter extends Component
{
    public $status;
    public $statusCounts;
    public $param;

    protected $listeners = ['statusHasChanged'];

    public function mount()
    {
        $this->statusCounts = Idea::getIdeasStatusCounts()[0];
    }

    public function statusHasChanged()
    {
        $this->statusCounts = Idea::getIdeasStatusCounts()[0];
    }

    public function setStatus($status = null)
    {
        $this->param = $status;

        if (
            app('router')
                ->getRoutes()
                ->match(app('request')->create(URL::previous()))
                ->getName() == 'idea.show'
        ) {
            return redirect()->route('idea.index', ['status' => $this->status]);
        }
        $this->emit('FilterStatusChanged', $status);
    }

    public function render()
    {
        return view('livewire.idea.idea-filter');
    }
}
