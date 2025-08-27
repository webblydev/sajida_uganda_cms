<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class MiddleBanner extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = [];

    // public function middleBannerItems()
    // {
    //     return $this->hasMany(MiddleBannerItems::class, 'middle_banner_id');
    // }
}
