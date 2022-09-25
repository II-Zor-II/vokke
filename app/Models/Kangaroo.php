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

    /**
     * convert weight from grams to kilograms
     * @param $value
     * @return void
     */
    public function setWeightAttribute($value)
    {
        $this->attributes['weight'] = $value * 1000;
    }

    /**
     * convert weight from kilograms to grams
     * @param $value
     * @return float|int
     */
    public function getWeightAttribute($value)
    {
        return $value / 1000;
    }

    /**
     * convert height from feet to millimeters
     * @param $value
     * @return void
     */
    public function setHeightAttribute($value)
    {
        $this->attributes['height'] = $value * 304.8;
    }

    /**
     * convert height from millimeters to feet
     * @param $value
     * @return float
     */
    public function getHeightAttribute($value)
    {
        return $value / 304.8;
    }

}
