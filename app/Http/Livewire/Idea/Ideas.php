<?php

namespace App\Http\Livewire\Idea;

use App\Models\Idea;
use App\Models\votes;
use App\Models\Status;
use Livewire\Component;
use App\Models\Category;
use Livewire\WithPagination;

class Ideas extends Component
{
    use WithPagination;

    public $category;
    public $status;

    protected $queryString = ['status', 'category'];

    protected $listeners = ['FilterStatusChanged'];

    public function FilterStatusChanged($newStatus)
    {
        if ($newStatus === 'All Ideas') {
            $this->status = null;
        } else {
            $this->status = $newStatus;
        }
        $this->resetPage();
    }

    public function render()
    {
        $statuses = cache()
            ->get('statuses')
            ->pluck('id', 'name');
        $categories = cache()
            ->get('categories')
            ->pluck('id', 'name');

        return view('livewire.idea.ideas', [
            'ideas' => Idea::when(
                $this->status && $this->status !== 'All',
                function ($query) use ($statuses) {
                    return $query->where(
                        'status_id',
                        $statuses->get($this->status)
                    );
                }
            )
                ->when($this->category, function ($query) use ($categories) {
                    return $query->where(
                        'category_id',
                        $categories->get($this->category)
                    );
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
