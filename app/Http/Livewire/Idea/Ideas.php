<?php

namespace App\Http\Livewire\Idea;

use App\Models\Idea;
use App\Models\votes;
use App\Models\Status;
use Livewire\Component;
use Livewire\WithPagination;

class Ideas extends Component
{
    use WithPagination;

    public function render()
    {
        $statuses = Status::all()->pluck('id', 'name');
        $status = request()->get('status');

        return view('livewire.idea.ideas', [
            'ideas' => Idea::when($status && $status !== 'All', function (
                $query
            ) use ($statuses, $status) {
                return $query->where('status_id', $statuses->get($status));
            })
                ->addSelect([
                    'voted_at_id' => votes::select('id')
                        ->where('user_id', auth()->id())
                        ->whereColumn('idea_id', 'ideas.id'),
                ])
                ->latest()
                ->simplePaginate(10),
        ]);
    }
}
