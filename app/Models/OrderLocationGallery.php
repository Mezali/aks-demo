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
 * @method static \Illuminate\Database\Eloquent\Builder|OrderLocationGallery filter(array $input = [], $filter = null)
 * @method static \Illuminate\Database\Eloquent\Builder|OrderLocationGallery newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|OrderLocationGallery newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|OrderLocationGallery onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|OrderLocationGallery paginateFilter($perPage = null, $columns = [], $pageName = 'page', $page = null)
 * @method static \Illuminate\Database\Eloquent\Builder|OrderLocationGallery query()
 * @method static \Illuminate\Database\Eloquent\Builder|OrderLocationGallery simplePaginateFilter($perPage = null, $columns = [], $pageName = 'page', $page = null)
 * @method static \Illuminate\Database\Eloquent\Builder|OrderLocationGallery sort($sort)
 * @method static \Illuminate\Database\Eloquent\Builder|OrderLocationGallery whereBeginsWith($column, $value, $boolean = 'and')
 * @method static \Illuminate\Database\Eloquent\Builder|OrderLocationGallery whereEndsWith($column, $value, $boolean = 'and')
 * @method static \Illuminate\Database\Eloquent\Builder|OrderLocationGallery whereLike($column, $value, $boolean = 'and')
 * @method static \Illuminate\Database\Eloquent\Builder|OrderLocationGallery withTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|OrderLocationGallery withoutTrashed()
 * @mixin \Eloquent
 */
class OrderLocationGallery extends Model
{
    use HasFactory, SoftDeletes, Sortable, Filterable;
}
