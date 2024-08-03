<?php

namespace App\Models;

use App\Data\DefaultPermissions;
use App\Enums\ProfileTypeEnum;
use App\Traits\Sortable;
use EloquentFilter\Filterable;
use Illuminate\Support\Collection;

use Illuminate\Database\Eloquent\{
    Factories\HasFactory,
    Relations\BelongsToMany,
    Model,
    SoftDeletes
};

/**
 * 
 *
 * @property int $id
 * @property int $user_id
 * @property string $type
 * @property int|null $company_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \App\Models\User|null $company
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Permission> $permissions
 * @property-read int|null $permissions_count
 * @property-read \App\Models\User $user
 * @method static \Illuminate\Database\Eloquent\Builder|Profile filter(array $input = [], $filter = null)
 * @method static \Illuminate\Database\Eloquent\Builder|Profile newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Profile newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Profile onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Profile paginateFilter($perPage = null, $columns = [], $pageName = 'page', $page = null)
 * @method static \Illuminate\Database\Eloquent\Builder|Profile query()
 * @method static \Illuminate\Database\Eloquent\Builder|Profile simplePaginateFilter($perPage = null, $columns = [], $pageName = 'page', $page = null)
 * @method static \Illuminate\Database\Eloquent\Builder|Profile sort($sort)
 * @method static \Illuminate\Database\Eloquent\Builder|Profile whereBeginsWith($column, $value, $boolean = 'and')
 * @method static \Illuminate\Database\Eloquent\Builder|Profile whereCompanyId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Profile whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Profile whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Profile whereEndsWith($column, $value, $boolean = 'and')
 * @method static \Illuminate\Database\Eloquent\Builder|Profile whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Profile whereLike($column, $value, $boolean = 'and')
 * @method static \Illuminate\Database\Eloquent\Builder|Profile whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Profile whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Profile whereUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Profile withTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Profile withoutTrashed()
 * @mixin \Eloquent
 */
class Profile extends Model
{
    use HasFactory, Filterable, Sortable, SoftDeletes;

    public static function CreateProfile(array $data): Profile
    {
        $profile = new Profile();
        $profile->fill($data);
        $profile->save();
        return $profile;
    }

    protected $fillable = [
        'user_id',
        'type',
        'company_id',
        'default_permissions',
        'permissions'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function permissions(): BelongsToMany
    {
        return $this->belongsToMany(Permission::class);
    }

    public function getPermissions(): Collection
    {


        if ((new ProfileTypeEnum($this->type))->equals(
            ProfileTypeEnum::ADMIN(),
            ProfileTypeEnum::CUSTOMER(),
            ProfileTypeEnum::LEGAL_CUSTOMER(),
            ProfileTypeEnum::SELLER(),
            ProfileTypeEnum::LEGAL_SELLER(),
            ProfileTypeEnum::SELLER_DRIVER(),
            ProfileTypeEnum::FINAL_DESTINATION(),
            ProfileTypeEnum::LEGAL_FINAL_DESTINATION(),
        )) {
            return collect(DefaultPermissions::get(ProfileTypeEnum::from($this->type)));
        } else {
            return collect(explode(',', $this->permissions));
        }
    }

    public function company()
    {
        return $this->belongsTo(User::class, 'company_id');
    }
}
