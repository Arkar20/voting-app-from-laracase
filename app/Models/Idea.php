<?php

namespace App\Models;

use App\Models\User;
use App\Models\votes;
use App\Models\Status;
use App\Models\Comment;
use App\Models\Category;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use App\Exceptions\RegisterException;
use App\Exceptions\RemoveVoteException;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Idea extends Model
{
    use HasFactory, Sluggable;

    protected $guarded = [];
    protected $with = ['category', 'status', 'user'];
    protected $withCount = ['votes', 'comments'];

    public static $PAGINATED_NUMBER = 10;

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title',
            ],
        ];
    }
    public static function boot()
    {
        parent::boot();

        static::deleting(function ($idea) {
            votes::where('idea_id', $idea->id)->delete();
            $idea->comments()->delete();
        });
    }

    // goback url ]
    public function goBack()
    {
        return url()->previous();
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    public function status()
    {
        return $this->belongsTo(Status::class);
    }
    public function votes()
    {
        return $this->belongsToMany(User::class, 'votes');
    }
    public function isVoted($user = null)
    {
        $user = $user ?: auth()->id();

        return votes::where('user_id', $user)
            ->where('idea_id', $this->id)
            ->exists();
    }
    public function vote($user = null)
    {
        $user = $user ?: auth()->id();

        if ($this->isVoted()) {
            throw new RegisterException();
        } else {
            votes::create(['user_id' => $user, 'idea_id' => $this->id]);
        }
    }
    public function removeVote($user = null)
    {
        $user = $user ?: auth()->id();

        $voteToRemove = votes::where('user_id', $user)->where(
            'idea_id',
            $this->id
        );

        if (!$voteToRemove->exists()) {
            throw new RemoveVoteException();
        } else {
            $voteToRemove->delete();
        }
    }
    public static function getIdeasStatusCounts()
    {
        return Idea::query()
            ->selectRaw('count(*) as all_ideas')
            ->selectRaw('count(case when status_id=1 then 1 end) as open_ideas')
            ->selectRaw(
                'count(case when status_id=3 then 1 end) as in_progress_ideas'
            )
            ->selectRaw(
                'count(case when status_id=4 then 1 end) as implemented_ideas'
            )
            ->selectRaw(
                'count(case when status_id=2 then 1 end) as closed_ideas'
            )
            ->get()
            ->toArray();
    }
    // updaing the vote's status
    public function updateVote($status)
    {
        $this->update([
            'status_id' => $status,
        ]);
    }
    //adding comments
    public function addComment($comment)
    {
        if (auth()->guest()) {
            return redirect('/login');
        }

        return $this->comments()->create([
            'comment' => $comment,
            'user_id' => auth()->id(),
        ]);
    }
    //refactoring the ideas filter
    public function scopeIdeaFilter($query, $data, $field)
    {
        $statuses = cache()
            ->get('statuses')
            ->pluck('id', 'name');

        $query->when($data && $data !== 'All', function ($query) use (
            $statuses,
            $data
        ) {
            return $query->where('status_id', $statuses->get($data));
        });
    }
}
