<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $titulo }}</title>
</head>

<style>
    .titulos-pag {
        text-align: center;
        text-transform: uppercase;
        background-color: #c2c2c2;
    }

    span {
        font-size: 18px;
        font-weight: bold;
    }

    .page-break {
        page-break-after: always;
    }

</style>

<body>
    @foreach ($dados_chamado as $key => $dados_chamado)
        <div class="row page-break">
            <div class="col">
                <h4 class="titulos-pag">Relatório de Chamados Concluidos</h4>

                <span>Titulo</span>
                <div>{{ $dados_chamado->titulo }}</div>
                <br>

                <span>Solicitante</span>
                <div>{{ $dados_chamado->usuario->nome }}</div>
                <br>

                <span>Responsável</span>
                <div>
                    @include(
                        'app.layouts._partials.tecnico.tecnico_atribuido'
                    )
                </div>
                <br>

                <span>Demanda</span>
                <?php $valor = $dados_chamado->tipo_erro; ?>
                <div>@include(
                    'app.layouts._partials.tecnico.tipo_erro_exibicao'
                )</div>
                <br>

                <span>Status</span>
                <div>
                    <?php
                    if ($dados_chamado->status == '1') {
                        echo $dados = 'Aberto';
                    } elseif ($dados_chamado->status == '2') {
                        echo $dados = 'Concluido';
                    } elseif ($dados_chamado->status == '3') {
                        echo $dados = 'Não-Atribuido';
                    }
                    ?>
                </div>
                <br>

                <span>Titulo</span>
                <div>{{ $dados_chamado->data_abertura }}</div>
                <br>

                <span>Descrição</span>
                <div>{{ $dados_chamado->descricao }}</div>
                <br>

                <span>Resposta</span>
                <?php
                if ($dados_chamado->resposta == null) {
                    $resposta = 'Pendente';
                } else {
                    $resposta = $dados_chamado->resposta;
                }
                ?>
                <div>{{ $resposta }}</div>

            </div>
        </div>
    @endforeach
</body>

</html>
