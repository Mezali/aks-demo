<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

use App\Enums\{
    ProfileTypeEnum,
    RolesEnum,
    UserTypeEnum
};
use App\Models\{
    Profile,
    User
};

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users_array = [
            [
                'id' => 1,
                'name' => 'Administrador',
                'email' =>  'Administrador@example.com',
                'document_number' => '63018304071',
                'customer_id' => '',
                'password' => Hash::make('padrao@123')
            ],
            [
                'id' => 2,
                'name' => 'ClientePF',
                'email' =>  'ClientePF@example.com',
                'document_number' => '34405712034',
                'customer_id' => '',
                'password' => Hash::make('padrao@123')
            ],
            [
                'id' => 3,
                'name' => 'ClientePJ',
                'email' =>  'ClientePJ@example.com',
                'document_number' => '61164302000190',
                'customer_id' => 'cus_000006089545',
                'password' => Hash::make('padrao@123')
            ],
            [
                'id' => 4,
                'name' => 'EmpgradoCLientePJ',
                'email' =>  'EmpgradoCLientePJ@example.com',
                'document_number' => '74956821085',
                'customer_id' => '',
                'password' => Hash::make('padrao@123')
            ],
            [
                'id' => 5,
                'name' => 'ProvedorPF',
                'email' =>  'ProvedorPF@example.com',
                'document_number' => '92395332062',
                'customer_id' => '',
                'password' => Hash::make('padrao@123')
            ],
            [
                'id' => 6,
                'name' => 'ProvedorPJ',
                'email' =>  'ProvedorPJ@example.com',
                'document_number' => '95374753000173',
                'customer_id' => '',
                'password' => Hash::make('padrao@123')
            ],
            [
                'id' => 7,
                'name' => 'EmpregadoProvedorPJ',
                'email' =>  'EmpregadoProvedorPJ@example.com',
                'document_number' => '84740748002',
                'customer_id' => '',
                'password' => Hash::make('padrao@123')
            ],
            [
                'id' => 8,
                'name' => 'MotoristaProvedorPJ',
                'email' =>  'MotoristaProvedorPJ@example.com',
                'document_number' => '33383620050',
                'customer_id' => '',
                'password' => Hash::make('padrao@123')
            ],
            [
                'id' => 9,
                'name' => 'DestinadorFinal',
                'email' =>  'DestinadorFinal@example.com',
                'document_number' => '76435290000168',
                'customer_id' => '',
                'password' => Hash::make('padrao@123')
            ],

        ];

        $array_profiles = [
            [
                'user_id' => 1,
                'type' => ProfileTypeEnum::ADMIN(),
            ],
            [
                'user_id' => 2,
                'type' => ProfileTypeEnum::CUSTOMER(),
            ],
            [
                'user_id' => 3,
                'type' => ProfileTypeEnum::LEGAL_CUSTOMER(),
            ],
            [
                'user_id' => 5,
                'type' => ProfileTypeEnum::SELLER(),
            ],
            [
                'user_id' => 6,
                'type' => ProfileTypeEnum::LEGAL_SELLER(),
            ],

            [
                'user_id' => 9,
                'type' => ProfileTypeEnum::FINAL_DESTINATION(),
            ],
        ];



        User::insert($users_array);
        Profile::insert($array_profiles);
        Profile::insert([
            [
                'user_id' => 7,
                'type' => ProfileTypeEnum::SELLER_EMPLOYEE(),
                'company_id' => 6,
            ],
            [
                'user_id' => 8,
                'type' => ProfileTypeEnum::SELLER_DRIVER(),
                'company_id' => 6,
            ],
            [
                'user_id' => 4,
                'type' => ProfileTypeEnum::CUSTOMER_EMPLOYEE(),
                'company_id' => 3,
            ],
        ]);
    }
}
