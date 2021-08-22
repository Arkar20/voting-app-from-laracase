<?php

namespace App\Models;

use App\Models\Idea;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Comment extends Model
{
    use HasFactory;

    protected $fillable = ['comment', 'idea_id', 'user_id'];
    protected $with = ['user'];
    protected $perPage = 10;

    public function idea()
    {
        return $this->belongsTo(Idea::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function isOwner($idea)
    {
        return $this->user->is($idea->user);
    }
}
