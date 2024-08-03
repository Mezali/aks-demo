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
 * @property string $old_value
 * @property string $value
 * @property int $modified_by
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string|null $deleted_at
 * @method static \Illuminate\Database\Eloquent\Builder|UserConfigHistory newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|UserConfigHistory newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|UserConfigHistory query()
 * @method static \Illuminate\Database\Eloquent\Builder|UserConfigHistory whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserConfigHistory whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserConfigHistory whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserConfigHistory whereModifiedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserConfigHistory whereOldValue($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserConfigHistory wherePlatformConfigId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserConfigHistory whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserConfigHistory whereUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserConfigHistory whereValue($value)
 * @mixin \Eloquent
 */
class UserConfigHistory extends Model
{
    use HasFactory;
}
