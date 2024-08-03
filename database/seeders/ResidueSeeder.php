<?php

namespace Database\Seeders;

use App\Models\Residue;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ResidueSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        Residue::insert([
            [
                'name' => 'Classe A1',
                'description' => 'Resíduos reutilizáveis ou recicláveis como agregados de construção, demolição, reformas e reparos de pavimentação e de outras obras de infra-estrutura, inclusive solos provenientes de terraplanagem;',
                'created_at' => '2024-07-01 19:22:41',
                'updated_at' => '2024-07-02 13:13:36',
                'deleted_at' => null,
            ],
            [
                'name' => 'Classe A2',
                'description' => 'Resíduos reutilizáveis ou recicláveis como agregados de construção, demolição, reformas e reparos de edificações: componentes cerâmicos (tijolos, blocos, telhas, placas de revestimento etc.), argamassa e concreto;',
                'created_at' => '2024-07-01 19:22:41',
                'updated_at' => '2024-07-02 13:13:36',
                'deleted_at' => null,
            ],
            [
                'name' => 'Classe A3',
                'description' => 'Resíduos reutilizáveis ou recicláveis como agregados de processo de fabricação e/ou demolição de peças pré-moldadas em concreto (blocos, tubos, meios-fios etc.) produzidas nos canteiros de obras;',
                'created_at' => '2024-07-01 19:22:41',
                'updated_at' => '2024-07-02 13:13:36',
                'deleted_at' => null,
            ],
            [
                'name' => 'Classe B',
                'description' => 'Resíduos recicláveis para outras destinações, tais como: plásticos, papel/papelão, metais, vidros, madeiras e outros;',
                'created_at' => '2024-07-01 19:23:01',
                'updated_at' => '2024-07-01 19:23:01',
                'deleted_at' => null,
            ],
            [
                'name' => 'Classe C',
                'description' => 'Resíduos para os quais não foram desenvolvidas tecnologias ou aplicações economicamente viáveis que permitam a sua reciclagem/recuperação, tais como: os produtos oriundos do gesso;',
                'created_at' => '2024-07-01 19:23:25',
                'updated_at' => '2024-07-01 19:23:25',
                'deleted_at' => null,
            ],
            [
                'name' => 'Classe D',
                'description' => 'Resíduos perigosos oriundos do processo de construção, tais como: tintas (com solventes), solventes, óleos e outros, ou aqueles contaminados oriundos de demolições, reformas e reparos de clínicas radioçógicas, instalações industriais e outros',
                'created_at' => '2024-07-01 19:23:57',
                'updated_at' => '2024-07-01 19:23:57',
                'deleted_at' => null,
            ]
        ]);
    }
}
