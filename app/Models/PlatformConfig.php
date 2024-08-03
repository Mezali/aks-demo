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
 * @property string $key
 * @property string $name
 * @property string $value
 * @property string $type
 * @property string|null $description
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|PlatformConfig filter(array $input = [], $filter = null)
 * @method static \Illuminate\Database\Eloquent\Builder|PlatformConfig newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PlatformConfig newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PlatformConfig onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|PlatformConfig paginateFilter($perPage = null, $columns = [], $pageName = 'page', $page = null)
 * @method static \Illuminate\Database\Eloquent\Builder|PlatformConfig query()
 * @method static \Illuminate\Database\Eloquent\Builder|PlatformConfig simplePaginateFilter($perPage = null, $columns = [], $pageName = 'page', $page = null)
 * @method static \Illuminate\Database\Eloquent\Builder|PlatformConfig sort($sort)
 * @method static \Illuminate\Database\Eloquent\Builder|PlatformConfig whereBeginsWith($column, $value, $boolean = 'and')
 * @method static \Illuminate\Database\Eloquent\Builder|PlatformConfig whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PlatformConfig whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PlatformConfig whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PlatformConfig whereEndsWith($column, $value, $boolean = 'and')
 * @method static \Illuminate\Database\Eloquent\Builder|PlatformConfig whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PlatformConfig whereKey($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PlatformConfig whereLike($column, $value, $boolean = 'and')
 * @method static \Illuminate\Database\Eloquent\Builder|PlatformConfig whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PlatformConfig whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PlatformConfig whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PlatformConfig whereValue($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PlatformConfig withTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|PlatformConfig withoutTrashed()
 * @mixin \Eloquent
 */
class PlatformConfig extends Model
{
    use HasFactory, Sortable, Filterable, SoftDeletes;
}
