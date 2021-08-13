<?php

namespace App\Models;

use App\Models\User;
use App\Models\votes;
use App\Models\Status;
use App\Models\Category;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Idea extends Model
{
    use HasFactory, Sluggable;

    protected $guarded = [];
    protected $with = ['category', 'status'];
    protected $withCount = ['votes'];

    public static $PAGINATED_NUMBER = 10;
    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title',
            ],
        ];
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

        return votes::create(['user_id' => $user, 'idea_id' => $this->id]);
    }
    public function removeVote($user = null)
    {
        $user = $user ?: auth()->id();

        votes::where('user_id', $user)
            ->where('idea_id', $this->id)
            ->delete();
    }
}
