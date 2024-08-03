<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use App\Observers\UserObserver;
use App\Traits\Sortable;
use EloquentFilter\Filterable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Collection;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Traits\HasRoles;

use Illuminate\Database\Eloquent\{
    Attributes\ObservedBy,
    Factories\HasFactory,
    Relations\BelongsTo,
    Relations\BelongsToMany,
    Relations\HasMany,
    Relations\HasManyThrough,
    SoftDeletes
};

/**
 * 
 *
 * @property int $id
 * @property string|null $customer_id
 * @property string $name
 * @property string $document_type
 * @property string $document_number
 * @property string $email
 * @property \Illuminate\Support\Carbon|null $email_verified_at
 * @property mixed $password
 * @property string|null $photo
 * @property string|null $phone
 * @property string|null $secondary_phone
 * @property string|null $secondary_email
 * @property string|null $last_login_at
 * @property string|null $fantasy_name
 * @property string|null $state_registration
 * @property string|null $municipal_registration
 * @property string|null $responsible_name
 * @property string|null $responsible_document
 * @property string|null $responsible_office
 * @property string|null $responsible_departament
 * @property string|null $responsible_phone
 * @property string|null $responsible_email
 * @property string|null $responsible_secondary_phone
 * @property string|null $responsible_secondary_email
 * @property string|null $description
 * @property string|null $cnh
 * @property string|null $cnh_expiration_date
 * @property string|null $remember_token
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property string $sales_amount
 * @property string $total_fees
 * @property string $net_total
 * @property string $total_withdrawn
 * @property string $total_balance
 * @property string $blocked_balance
 * @property string $available_balance
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Address> $address
 * @property-read int|null $address_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\City> $citiesCoverage
 * @property-read int|null $cities_coverage_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\CityUser> $city
 * @property-read int|null $city_count
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection<int, \Illuminate\Notifications\DatabaseNotification> $notifications
 * @property-read int|null $notifications_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Profile> $profiles
 * @property-read int|null $profiles_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Residue> $residues
 * @property-read int|null $residues_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Laravel\Sanctum\PersonalAccessToken> $tokens
 * @property-read int|null $tokens_count
 * @method static \Database\Factories\UserFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|User filter(array $input = [], $filter = null)
 * @method static \Illuminate\Database\Eloquent\Builder|User newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|User paginateFilter($perPage = null, $columns = [], $pageName = 'page', $page = null)
 * @method static \Illuminate\Database\Eloquent\Builder|User query()
 * @method static \Illuminate\Database\Eloquent\Builder|User simplePaginateFilter($perPage = null, $columns = [], $pageName = 'page', $page = null)
 * @method static \Illuminate\Database\Eloquent\Builder|User sort($sort)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereAvailableBalance($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereBeginsWith($column, $value, $boolean = 'and')
 * @method static \Illuminate\Database\Eloquent\Builder|User whereBlockedBalance($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereCnh($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereCnhExpirationDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereCustomerId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereDocumentNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereDocumentType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmailVerifiedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEndsWith($column, $value, $boolean = 'and')
 * @method static \Illuminate\Database\Eloquent\Builder|User whereFantasyName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereLastLoginAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereLike($column, $value, $boolean = 'and')
 * @method static \Illuminate\Database\Eloquent\Builder|User whereMunicipalRegistration($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereNetTotal($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User wherePhone($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User wherePhoto($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereResponsibleDepartament($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereResponsibleDocument($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereResponsibleEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereResponsibleName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereResponsibleOffice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereResponsiblePhone($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereResponsibleSecondaryEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereResponsibleSecondaryPhone($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereSalesAmount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereSecondaryEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereSecondaryPhone($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereStateRegistration($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereTotalBalance($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereTotalFees($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereTotalWithdrawn($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User withTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|User withoutTrashed()
 * @mixin \Eloquent
 */

#[ObservedBy([UserObserver::class])]
class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, Filterable, Sortable, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'document_number',
        'document_type',
        'name',
        'email',
        'secondary_email',
        'phone',
        'secondary_phone',
        'password',
        'cnh',
        'description',
        'fantasy_name',
        'state_registration',
        'municipal_registration',
        'responsible_name',
        'responsible_document',
        'responsible_office',
        'responsible_departament',
        'responsible_phone',
        'responsible_email',
        'responsible_secondary_phone',
        'responsible_secondary_email',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function profiles(): HasMany
    {
        return $this->hasMany(Profile::class);
    }

    public function getProfiles(): Collection
    {
        return $this->profiles;
    }

    public function address(): HasMany
    {
        return $this->hasMany(Address::class);
    }

    public function getDefaultAddress(): ?Address
    {
        return $this->adrress()->where('default', 1)->first();
    }

    public function getActiveAddress(): ?Address
    {
        return $this->address()->where('active', 1)->first();
    }

    public function city(): HasMany
    {
        return $this->HasMany(CityUser::class);
    }

    public function citiesCoverage(): BelongsToMany
    {
        return $this->belongsToMany(City::class, 'city_users');
    }

    public function getCitiesCoverage(): Collection
    {
        return $this->city->citiesCoverage;
    }

    public function residues(): HasManyThrough
    {
        return $this->hasManyThrough(Residue::class, ResidueUser::class, 'user_id', 'id', 'id', 'residue_id');
    }
}
