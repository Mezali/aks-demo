<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <title>Manifesto de Transporte de Resíduos e Rejeitos</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            font-size: 12px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th,
        td {
            border: 1px solid black;
            padding: 8px;
            text-align: left;
        }

        .header {
            text-align: center;
            margin-bottom: 20px;
        }

        .section-title {
            background-color: #f2f2f2;
            font-weight: bold;
        }
    </style>
</head>

<body>
    <div class="header">
        <h1>Prefeitura</h1>
        <h2>MANIFESTO DE TRANSPORTE DE RESÍDUOS E REJEITOS - (PROVISÓRIO)</h2>
    </div>
    <table>
        <tr class="section-title">
            <td colspan="6">Identificador do Gerador</td>
        </tr>
        <tr>
            <td>Razão Social:</td>
            <td colspan="5">{{ $gerador_razao_social }}</td>
        </tr>
        <tr>
            <td>CPF/CNPJ:</td>
            <td>{{ $gerador_cpf_cnpj }}</td>
            <td>Data da emissão:</td>
            <td colspan="3">{{ $data_emissao }}</td>
        </tr>
        <tr>
            <td>Endereço:</td>
            <td colspan="5">{{ $gerador_endereco }}</td>
        </tr>
        <tr>
            <td>Telefone:</td>
            <td>{{ $gerador_telefone }}</td>
            <td>Município:</td>
            <td>{{ $gerador_municipio }}</td>
            <td>Estado:</td>
            <td>{{ $gerador_estado }}</td>
        </tr>
        <tr>
            <td>Nome do Responsável pela Emissão:</td>
            <td colspan="5">{{ $gerador_responsavel }}</td>
        </tr>

        <tr class="section-title">
            <td colspan="6">Identificador do Transportador</td>
        </tr>
        <tr>
            <td>Razão Social:</td>
            <td colspan="5">{{ $transportador_razao_social }}</td>
        </tr>
        <tr>
            <td>CPF/CNPJ:</td>
            <td>{{ $transportador_cpf_cnpj }}</td>
            <td>Data do transporte:</td>
            <td colspan="3">{{ $data_transporte }}</td>
        </tr>
        <tr>
            <td>Endereço:</td>
            <td colspan="5">{{ $transportador_endereco }}</td>
        </tr>
        <tr>
            <td>Telefone:</td>
            <td>{{ $transportador_telefone }}</td>
            <td>Município:</td>
            <td>{{ $transportador_municipio }}</td>
            <td>Estado:</td>
            <td>{{ $transportador_estado }}</td>
        </tr>
        <tr>
            <td>Nome do Motorista:</td>
            <td colspan="3">{{ $motorista_nome }}</td>
            <td>Placa do Veículo:</td>
            <td>{{ $veiculo_placa }}</td>
        </tr>
        <tr>
            <td>Nome e Assinatura do Responsável:</td>
            <td colspan="5">{{ $transportador_responsavel }}</td>
        </tr>

        <tr class="section-title">
            <td colspan="6">Identificador do Destinador</td>
        </tr>
        <tr>
            <td>Razão Social:</td>
            <td colspan="5">{{ $destinador_razao_social }}</td>
        </tr>
        <tr>
            <td>CPF/CNPJ:</td>
            <td>{{ $destinador_cpf_cnpj }}</td>
            <td>Data do recebimento:</td>
            <td colspan="3">{{ $data_recebimento }}</td>
        </tr>
        <tr>
            <td>Endereço:</td>
            <td colspan="5">{{ $destinador_endereco }}</td>
        </tr>
        <tr>
            <td>Telefone:</td>
            <td>{{ $destinador_telefone }}</td>
            <td>Município:</td>
            <td>{{ $destinador_municipio }}</td>
            <td>Estado:</td>
            <td>{{ $destinador_estado }}</td>
        </tr>
        <tr>
            <td>Nome do Responsável pelo Recebimento:</td>
            <td colspan="5">{{ $destinador_responsavel }}</td>
        </tr>

        <tr class="section-title">
            <td colspan="6">Identificador dos Resíduos</td>
        </tr>
        <tr>
            <td>Resíduo</td>
            <td>Quantidade</td>
            <td>Unidade</td>
            <td>Acondicionamento</td>
            <td>Classe</td>
        </tr>
        @foreach($residuos as $residuo)
        <tr>
            <td>{{ $residuo['tipo'] }}</td>
            <td>{{ $residuo['quantidade'] }}</td>
            <td>{{ $residuo['unidade'] }}</td>
            <td>{{ $residuo['acondicionamento'] }}</td>
            <td>{{ $residuo['classe'] }}</td>
        </tr>
        @endforeach

        <tr class="section-title">
            <td colspan="6">Identificador do Transportador - AT para o Destinador</td>
        </tr>
        <tr>
            <td>Razão Social:</td>
            <td colspan="5">{{ $transportador_at_razao_social }}</td>
        </tr>
        <tr>
            <td>CNPJ:</td>
            <td>{{ $transportador_at_cnpj }}</td>
            <td>Endereço:</td>
            <td colspan="3">{{ $transportador_at_endereco }}</td>
        </tr>
        <tr>
            <td>Telefone:</td>
            <td>{{ $transportador_at_telefone }}</td>
            <td>Município:</td>
            <td>{{ $transportador_at_municipio }}</td>
            <td>Estado:</td>
            <td>{{ $transportador_at_estado }}</td>
        </tr>
        <tr>
            <td>Nome do Motorista:</td>
            <td colspan="3">{{ $transportador_at_motorista }}</td>
            <td>Placa do Veículo:</td>
            <td>{{ $transportador_at_veiculo }}</td>
        </tr>

        <tr class="section-title">
            <td colspan="6">Observações do Armazenador</td>
        </tr>
        <tr>
            <td colspan="6">{{ $observacoes_armazenador }}</td>
        </tr>

        <tr class="section-title">
            <td colspan="6">Observações do Gerador</td>
        </tr>
        <tr>
            <td colspan="6">{{ $observacoes_gerador }}</td>
        </tr>
    </table>
</body>

</html>