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
 * @property int $cart_product_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Residue $residue
 * @method static \Illuminate\Database\Eloquent\Builder|CartProductResidue newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|CartProductResidue newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|CartProductResidue query()
 * @method static \Illuminate\Database\Eloquent\Builder|CartProductResidue whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CartProductResidue whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CartProductResidue whereResidueId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CartProductResidue whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CartProductResidue whereCartProductId($value)
 * @property-read \App\Models\CartProduct $cartProduct
 * @mixin \Eloquent
 */

class CartProductResidue extends Model
{
    use HasFactory;

    protected $table = 'cart_product_residues';

    protected $fillable = [
        'residue_id',
        'cart_product_id',
    ];

    public function residue()
    {
        return $this->belongsTo(Residue::class);
    }

    public function cartProduct()
    {
        return $this->belongsTo(CartProduct::class);
    }

}
