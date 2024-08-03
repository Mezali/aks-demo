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
 * @property int $order_location_product_id
 * @property string $url
 * @property string $status
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @method static \Illuminate\Database\Eloquent\Builder|OrderLocationProductGallery filter(array $input = [], $filter = null)
 * @method static \Illuminate\Database\Eloquent\Builder|OrderLocationProductGallery newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|OrderLocationProductGallery newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|OrderLocationProductGallery onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|OrderLocationProductGallery paginateFilter($perPage = null, $columns = [], $pageName = 'page', $page = null)
 * @method static \Illuminate\Database\Eloquent\Builder|OrderLocationProductGallery query()
 * @method static \Illuminate\Database\Eloquent\Builder|OrderLocationProductGallery simplePaginateFilter($perPage = null, $columns = [], $pageName = 'page', $page = null)
 * @method static \Illuminate\Database\Eloquent\Builder|OrderLocationProductGallery sort($sort)
 * @method static \Illuminate\Database\Eloquent\Builder|OrderLocationProductGallery whereBeginsWith($column, $value, $boolean = 'and')
 * @method static \Illuminate\Database\Eloquent\Builder|OrderLocationProductGallery whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrderLocationProductGallery whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrderLocationProductGallery whereEndsWith($column, $value, $boolean = 'and')
 * @method static \Illuminate\Database\Eloquent\Builder|OrderLocationProductGallery whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrderLocationProductGallery whereLike($column, $value, $boolean = 'and')
 * @method static \Illuminate\Database\Eloquent\Builder|OrderLocationProductGallery whereOrderLocationProductId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrderLocationProductGallery whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrderLocationProductGallery whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrderLocationProductGallery whereUrl($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrderLocationProductGallery withTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|OrderLocationProductGallery withoutTrashed()
 * @mixin \Eloquent
 */
class OrderLocationProductGallery extends Model
{
    use HasFactory, Filterable, Sortable, SoftDeletes;

    protected $fillable = [
        'order_location_product_id',
        'url',
        'status',
    ];

}
