<?php

namespace App\Enums;

use Spatie\Enum\Laravel\Enum;

/**
 * @method static self CUSTOMER()
 * @method static self LEGAL_CUSTOMER()
 * @method static self CUSTOMER_EMPLOYEE()
 * @method static self SELLER()
 * @method static self LEGAL_SELLER()
 * @method static self SELLER_EMPLOYEE()
 * @method static self SELLER_DRIVER()
 * @method static self ADMIN() 
 * @method static self ADMIN_EMPLOYEE() 
 * @method static self DEVELOPER()
 * @method static self FINAL_DESTINATION() 
 * @method static self LEGAL_FINAL_DESTINATION() 
 * @method static self FINAL_DESTINATION_EMPLOYEE() 
 */
final class ProfileTypeEnum extends Enum
{
}
