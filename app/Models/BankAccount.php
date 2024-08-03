<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * 
 *
 * @property int $id
 * @property int $user_id
 * @property int $bank_id
 * @property int $enabled
 * @property int $default
 * @property string $agency_number
 * @property string|null $agency_vd
 * @property string $account_number
 * @property string $account_vd
 * @property string $account_type
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string|null $deleted_at
 * @method static \Illuminate\Database\Eloquent\Builder|BankAccount newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|BankAccount newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|BankAccount query()
 * @method static \Illuminate\Database\Eloquent\Builder|BankAccount whereAccountNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BankAccount whereAccountType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BankAccount whereAccountVd($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BankAccount whereAgencyNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BankAccount whereAgencyVd($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BankAccount whereBankId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BankAccount whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BankAccount whereDefault($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BankAccount whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BankAccount whereEnabled($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BankAccount whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BankAccount whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BankAccount whereUserId($value)
 * @mixin \Eloquent
 */
class BankAccount extends Model
{
    use HasFactory;
}
