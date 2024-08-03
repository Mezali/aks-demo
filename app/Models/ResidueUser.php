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
 * @property int $residue_id
 * @property int $user_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Residue $residue
 * @property-read \App\Models\User $user
 * @method static \Illuminate\Database\Eloquent\Builder|ResidueUser newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ResidueUser newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ResidueUser query()
 * @method static \Illuminate\Database\Eloquent\Builder|ResidueUser whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ResidueUser whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ResidueUser whereResidueId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ResidueUser whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ResidueUser whereUserId($value)
 * @mixin \Eloquent
 */
class ResidueUser extends Model 
{
    use HasFactory;

    protected $table = 'residue_users';

    protected $fillable = [
        'residue_id',
        'user_id',
    ];

    public function residue()
    {
        return $this->belongsTo(Residue::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
