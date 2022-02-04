@extends('app.layouts.basico')

@section('titulo', $titulo)

@section('conteudo')
    <script type="text/javascript" language="javascript">
        $(document).ready(function() {
            $('#listar-chamados').DataTable({
                "language": {
                    "lengthMenu": "Chamados por pagina _MENU_",
                    "zeroRecords": "Valor não encontrado",
                    "info": "Mostrando página _PAGE_ de _PAGES_",
                    "infoEmpty": "Nenhum registro disponível",
                    "infoFiltered": "(Filtrado de _MAX_ registros totais)",
                    "emptyTable": "Sem dados disponíveis na tabela",
                    "info": "Mostrando _START_ para _END_ de _TOTAL_ entradas",
                    "infoEmpty": "Mostrando 0 para 0 de 0 entradas",
                    "infoFiltered": "(Filtrado do total de _MAX_ entradas)",
                    "infoPostFix": "",
                    "thousands": ",",
                    "lengthMenu": "Mostrar entradas de _MENU_",
                    "loadingRecords": "Carregando...",
                    "processing": "Processando...",
                    "search": "Pesquisar:",
                    "zeroRecords": "Nenhum registro correspondente encontrado",
                    "paginate": {
                        "first": "Primeira",
                        "last": "Última",
                        "next": "Próxima",
                        "previous": "Anterior"
                    }
                },
                "order": [
                    [5, "desc"]
                ]
            });
        });
    </script>

    @include('app.layouts._partials.tecnico.topo_tecnico')

    @include('app.layouts._partials.tecnico.modais_tecnico')

    <!--INICIO GRID DOS CHAMADOS-->
    <div class="container">
        <div class="row">
            <div class="col-6 col-xxl-10">
                <h1 class="titulos-pag">Chamados</h1>
            </div>
        </div>

        <div class="row">
            <div class="col">

                <!-- RESPONSIVE TABLE -->
                <table class="table table-responsive table-hover" id="listar-chamados">

                    <thead>
                        <tr>
                            <th class="th-titulo">Título</th>
                            <th class="th-categoria">Categoria</th>
                            <th class="th-status">Status</th>
                            <th class="th-descricao">Descrição</th>
                            <th class="th-acoes">Ações</th>
                            <th hidden>data-abertura</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($dados_chamado as $key => $dados_chamado)
                            <tr>
                                <td>{{ $dados_chamado->titulo }}</td>
                                <td>
                                    @php
                                        if ($dados_chamado->tipo_erro == '1') {
                                            echo $dados = 'AVA';
                                        } elseif ($dados_chamado->tipo_erro == '2') {
                                            echo $dados = 'AVA/GD';
                                        } elseif ($dados_chamado->tipo_erro == '3') {
                                            echo $dados = 'AVA/NFC';
                                        } elseif ($dados_chamado->tipo_erro == '4') {
                                            echo $dados = 'Cadastro';
                                        } elseif ($dados_chamado->tipo_erro == '5') {
                                            echo $dados = 'Configurações';
                                        } elseif ($dados_chamado->tipo_erro == '6') {
                                            echo $dados = 'Dificuldade de acesso';
                                        } elseif ($dados_chamado->tipo_erro == '7') {
                                            echo $dados = 'Dificuldade de usuário';
                                        } elseif ($dados_chamado->tipo_erro == '8') {
                                            echo $dados = 'Erro de sistema';
                                        } elseif ($dados_chamado->tipo_erro == '9') {
                                            echo $dados = 'ORBI';
                                        }
                                    @endphp
                                </td>
                                <td>
                                    @if ($dados_chamado->status == '1')
                                        Em aberto
                                    @else
                                        Concluido
                                    @endif
                                </td>
                                <td>{{ $dados_chamado->descricao }}</td>
                                <td>
                                    <div class="btn-table btn badge bg-primary" data-bs-toggle="modal"
                                        data-bs-target="#visualizar-chamado{{ $dados_chamado->id }}">Visualizar</div>
                                    <div class="btn-table btn badge bg-warning ml-2" data-bs-toggle="modal"
                                        data-bs-target="#atribuir-chamado{{ $dados_chamado->id }}">Atribuir</div>
                                    <div class="btn-table btn badge bg-success ml-2" data-bs-toggle="modal"
                                        data-bs-target="#alterar-status{{ $dados_chamado->id }}">Alterar Status</div>
                                </td>
                                <td hidden>{{ $dados_chamado->data_abertura }}</td>
                            </tr>
                        @endforeach
                    </tbody>

                </table>
                <!-- END RESPONSIVE TABLE -->
            </div>
        </div>

    </div>
    <!--FIM GRID DOS CHAMADOS-->
    </div>
@endsection
