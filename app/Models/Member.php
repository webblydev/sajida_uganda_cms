<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\MemberType;
use App\Models\MemberCategory;

class Member extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = [];

    public function designation()
    {
        return $this->belongsTo(MemberType::class, 'member_type_id');
    }
    public function category()
    {
        return $this->belongsTo(MemberCategory::class, 'member_category_id');
    }
}
