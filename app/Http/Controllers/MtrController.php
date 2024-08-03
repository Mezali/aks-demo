<?php

namespace App\Http\Controllers;

use Barryvdh\DomPDF\PDF;
use Illuminate\Http\Request;
use Pdf as GlobalPdf;

class MtrController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data = [
            'gerador_razao_social' => 'Gerador SA',
            'gerador_cpf_cnpj' => '12.345.678/0001-90',
            'data_emissao' => '19/07/2024',
            'gerador_endereco' => 'Rua ABC, 123',
            'gerador_telefone' => '(11) 98765-4321',
            'gerador_municipio' => 'São Paulo',
            'gerador_estado' => 'SP',
            'gerador_responsavel' => 'Fulano de Tal',
            'transportador_razao_social' => 'Transportadora LTDA',
            'transportador_cpf_cnpj' => '98.765.432/0001-12',
            'data_transporte' => '20/07/2024',
            'transportador_endereco' => 'Avenida XYZ, 456',
            'transportador_telefone' => '(21) 12345-6789',
            'transportador_municipio' => 'Rio de Janeiro',
            'transportador_estado' => 'RJ',
            'motorista_nome' => 'Ciclano de Souza',
            'veiculo_placa' => 'ABC-1234',
            'transportador_responsavel' => 'Beltrano da Silva',
            'destinador_razao_social' => 'Destinadora ME',
            'destinador_cpf_cnpj' => '11.222.333/0001-44',
            'data_recebimento' => '21/07/2024',
            'destinador_endereco' => 'Rua DEF, 789',
            'destinador_telefone' => '(31) 54321-0987',
            'destinador_municipio' => 'Belo Horizonte',
            'destinador_estado' => 'MG',
            'destinador_responsavel' => 'Maria de Fátima',
            'residuos' => [
                ['tipo' => 'Resíduo A', 'quantidade' => '100', 'unidade' => 'kg', 'acondicionamento' => 'Sacola', 'classe' => 'I'],
                ['tipo' => 'Resíduo B', 'quantidade' => '200', 'unidade' => 'kg', 'acondicionamento' => 'Caixa', 'classe' => 'II'],
            ],
            'transportador_at_razao_social' => 'Transportadora AT LTDA',
            'transportador_at_cnpj' => '12.345.678/0001-90',
            'transportador_at_endereco' => 'Avenida LMN, 321',
            'transportador_at_telefone' => '(41) 98765-1234',
            'transportador_at_municipio' => 'Curitiba',
            'transportador_at_estado' => 'PR',
            'transportador_at_motorista' => 'José da Silva',
            'transportador_at_veiculo' => 'XYZ-9876',
            'observacoes_armazenador' => 'Armazenamento realizado com segurança.',
            'observacoes_gerador' => 'Gerado conforme normas vigentes.'
        ];

        $pdf = GlobalPdf::loadView('mtr', $data);
        return $pdf->download('manifesto_transporte_residuos.pdf');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
