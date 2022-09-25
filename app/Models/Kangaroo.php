<?php

namespace App\Models;

use Carbon\Traits\Timestamp;
use Illuminate\Database\Eloquent\Model;

class Kangaroo extends Model
{
    use Timestamp;

    public function user() {
        return $this->belongsTo(User::class);
    }
}
