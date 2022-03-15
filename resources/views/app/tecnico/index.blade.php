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
        <!--AVISO DE ATRIBUIÇÃO-->
        <div class="alert alert-success mt-3" <?php if($atribuicao == '1'){ }else {echo 'hidden';} ?> role="alert">
            Chamado Atribuido com Sucesso!
        </div>
        <div class="alert alert-danger mt-3" <?php if($atribuicao == '2'){ }else {echo 'hidden';} ?> role="alert">
            Chamado não Atribuido!
        </div>


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
                            <th class="th-titulo-tec">Título</th>
                            <th class="th-categoria-tec">Categoria</th>
                            <th class="th-status-tec">Status</th>
                            <th class="th-descricao-tec">Descrição</th>
                            <th class="th-acoes-tec">Ações</th>
                            <th hidden>data-abertura</th>
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
                                <td>{{ $dados_chamado->descricao }}</td>
                                <td>
                                    <div class="btn-table btn badge bg-primary" data-bs-toggle="modal"
                                        data-bs-target="#visualizar-chamado{{ $dados_chamado->id }}">Visualizar</div>
                                    <div class="btn-table btn badge bg-warning ml-2" data-bs-toggle="modal"
                                        data-bs-target="#atribuir-chamado{{ $dados_chamado->id }}">Atribuir</div>
                                    <div class="btn-table btn badge bg-success ml-2" data-bs-toggle="modal"
                                        data-bs-target="#alterar-status{{ $dados_chamado->id }}" @if ($dados_chamado->status == '3'){ hidden }  @endif>Alterar Status</div>
                                </td>

                                <td hidden>{{ $dados_chamado->created_at }}</td>
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
