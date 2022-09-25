<?php

namespace App\Models;

use Carbon\Traits\Timestamp;
use Illuminate\Database\Eloquent\Model;

class Kangaroo extends Model
{
    use Timestamp;

    protected $fillable = [
        'user_id',
        'birth_date',
        'name',
        'nickname',
        'color',
        'gender',
        'friendliness',
        'weight',
        'height',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
