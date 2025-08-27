<?php

namespace App\Models\Career;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsTo; // Import BelongsTo

class Job extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = [];

    /**
     * Get the Profession that owns the Job
     *
     * @return BelongsTo  // Correct return type hint
     */
    public function profession(): BelongsTo
    {
        return $this->belongsTo(Profession::class, 'profession_id');
    }

    /**
     * Get the Team that owns the Job
     *
     * @return BelongsTo  // Correct return type hint
     */
    public function team(): BelongsTo
    {
        return $this->belongsTo(Team::class, 'team_id');
    }

    /**
     * Get the Location that owns the Job
     *
     * @return BelongsTo  // Correct return type hint
     */
    public function location(): BelongsTo
    {
        return $this->belongsTo(Location::class, 'location_id');
    }
}
