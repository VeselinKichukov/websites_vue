<?php

namespace App;

use App\Filters\WebsiteFilters;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class Website extends Model
{
    /**
     * Attributes to guard against mass assignment.
     *
     * @var array
     */
    protected $guarded = [];

    /**
     * The attributes that should be cast to different types.
     *
     * @var array
     */
    protected $casts = ['created_at' => 'datetime:Y-m-d H:i'];

    /**
     * Apply all relevant website filters.
     *
     * @param Builder $query
     * @param WebsiteFilters $filters
     * @return Builder
     */
    public function scopeFilter($query, $filters)
    {
        return $filters->apply($query);
    }
}
