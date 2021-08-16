<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function getClasses()
    {
        $attributes = [
            'Open' => 'bg-green-400',
            'Closed' => 'bg-red-400',
            'In Progress' => 'bg-yellow-400',
            'Implemented' => 'bg-blue-400',
        ];

        return $attributes[$this->name];
    }
}
