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

    // protected $queryString = ['status'];

    // public function mounted()
    // {
    //     if (Route::currentRouteName() === 'idea.show') {
    //         $this->status = null;
    //         $this->queryString = [];
    //     }
    // }

    public function setStatus($status = null)
    {
        // $this->status = $status;
        $this->emit('FilterStatusChanged', $status);
        if (
            app('router')
                ->getRoutes()
                ->match(app('request')->create(URL::previous()))
                ->getName() == 'idea.show'
        ) {
            return redirect()->route('idea.index', ['status' => $this->status]);
        }
    }

    public function render()
    {
        $this->statusCounts = Idea::getIdeasStatusCounts()[0];
        return view('livewire.idea.idea-filter');
    }
}
