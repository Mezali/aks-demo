<?php

namespace App\Models;

use App\Traits\Sortable;
use EloquentFilter\Filterable;

use Illuminate\Database\Eloquent\{
    Factories\HasFactory,
    Model,
    SoftDeletes
};

/**
 * 
 *
 * @property int $id
 * @property string $name
 * @property string $description
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\User> $users
 * @property-read int|null $users_count
 * @method static \Illuminate\Database\Eloquent\Builder|Residue filter(array $input = [], $filter = null)
 * @method static \Illuminate\Database\Eloquent\Builder|Residue newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Residue newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Residue onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Residue paginateFilter($perPage = null, $columns = [], $pageName = 'page', $page = null)
 * @method static \Illuminate\Database\Eloquent\Builder|Residue query()
 * @method static \Illuminate\Database\Eloquent\Builder|Residue simplePaginateFilter($perPage = null, $columns = [], $pageName = 'page', $page = null)
 * @method static \Illuminate\Database\Eloquent\Builder|Residue sort($sort)
 * @method static \Illuminate\Database\Eloquent\Builder|Residue whereBeginsWith($column, $value, $boolean = 'and')
 * @method static \Illuminate\Database\Eloquent\Builder|Residue whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Residue whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Residue whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Residue whereEndsWith($column, $value, $boolean = 'and')
 * @method static \Illuminate\Database\Eloquent\Builder|Residue whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Residue whereLike($column, $value, $boolean = 'and')
 * @method static \Illuminate\Database\Eloquent\Builder|Residue whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Residue whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Residue withTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Residue withoutTrashed()
 * @mixin \Eloquent
 */
class Residue extends Model
{
    use HasFactory, SoftDeletes, Filterable, Sortable;

    protected $fillable = [
        'name',
        'description',
    ];

    public function users()
    {
        return $this->belongsToMany(User::class);
    }
}
