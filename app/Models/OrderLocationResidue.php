<?php

namespace App\Models;

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
 * @property int $order_location_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Residue $residue
 * @method static \Illuminate\Database\Eloquent\Builder|OrderLocationResidue newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|OrderLocationResidue newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|OrderLocationResidue query()
 * @method static \Illuminate\Database\Eloquent\Builder|OrderLocationResidue whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrderLocationResidue whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrderLocationResidue whereResidueId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrderLocationResidue whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrderLocationResidue whereOrderLocationId($value)
 * @property-read \App\Models\OrderLocation $orderLocation
 * @mixin \Eloquent
 */

class OrderLocationResidue extends Model
{
    use HasFactory;

    protected $table = 'order_location_residues';

    protected $fillable = [
        'residue_id',
        'order_location_id',
    ];

    public function residue()
    {
        return $this->belongsTo(Residue::class);
    }

    public function orderLocation()
    {
        return $this->belongsTo(OrderLocation::class);
    }

}
