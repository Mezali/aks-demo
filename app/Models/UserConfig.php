<?php

namespace App\Models;

use Illuminate\Database\Eloquent\{
    Factories\HasFactory,
    Model
};

/**
 * 
 *
 * @property int $id
 * @property int $user_id
 * @property int $platform_config_id
 * @property string $value
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string|null $deleted_at
 * @method static \Illuminate\Database\Eloquent\Builder|UserConfig newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|UserConfig newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|UserConfig query()
 * @method static \Illuminate\Database\Eloquent\Builder|UserConfig whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserConfig whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserConfig whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserConfig wherePlatformConfigId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserConfig whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserConfig whereUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserConfig whereValue($value)
 * @mixin \Eloquent
 */
class UserConfig extends Model
{
    use HasFactory;
}
