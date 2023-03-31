<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    protected $table = 'events';

    protected $fillable = [
        'title',
        'description',
        'date',
        'time',
        'location',
        'instructors',
        'cost',
        'limit',
        'state',
    ];

    public function users()
    {
        return $this->belongsToMany(User::class);
    }
}
