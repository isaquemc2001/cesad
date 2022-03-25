<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{$titulo}}</title>
</head>

<style>
    .titulos-pag{
        text-align: center;
        text-transform: uppercase;
        background-color: #c2c2c2;
    }

    .table{
        width: 100%;
    }
</style>

<body>
    <div class="row">
        <div class="col-6 col-xxl-10">
            <h4 class="titulos-pag">Relatório de Chamados Concluidos</h4>
        </div>
    </div>
    
    

    <div class="row">
        <div class="col">
    
            <!-- RESPONSIVE TABLE -->
            <table class="table table-responsive table-bordered" id="listar-chamados">
    
                <thead>
                    <tr>
                        <th>Título</th>
                        <th>Demanda</th>
                        <th>Status</th>
                        <th>Descrição</th>
                        <th>Resposta</th>
                        <th>Data Abertura</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($dados_chamado as $key => $dados_chamado)
                        <tr>
                            <td>{{ $dados_chamado->titulo }}</td>
                            <td>
                                <?php $valor = $dados_chamado->tipo_erro; ?>
                                @include('app.layouts._partials.tecnico.tipo_erro_exibicao')
                            </td>
                            <td>
                                @if ($dados_chamado->status == '1')
                                    Em aberto
                                @else
                                    Concluido
                                @endif
                            </td>
                            <td class="mb-4">{{ $dados_chamado->descricao }}</td>
                            <td class="mb-4">{{ $dados_chamado->resposta }}</td>
                            
                            <td hidden>{{ $dados_chamado->created_at }}</td>
                        </tr>
                    @endforeach
                </tbody>
    
            </table>
            <!-- END RESPONSIVE TABLE -->
        </div>
    </div>
</body>
</html>