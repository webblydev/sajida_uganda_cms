<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\ApproachItem;

class Approach extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = [];

    public function approachItems()
    {
        return $this->hasMany(ApproachItem::class, 'approach_id');
    }

}
