@extends('app.layouts.basico')

@section('titulo', $titulo)

@section('conteudo')
<script type="text/javascript" language="javascript">
    $(document).ready(function() {
        $('#listar-chamados').DataTable({

            "processing": true,
            "serverSide": true,
            "ajax": {
                "url": "consultar_chamados.php",
                "type": "POST"
            },
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
            }


        });
    });
</script>

@include('app.layouts._partials.topo_tecnico')


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
                        <th>Titulo</th>
                        <th>Descrição</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>
                            <div class="btn-table btn badge bg-primary" data-bs-toggle="modal"
                                data-bs-target="#visualizar-chamado">Visualizar</div>
                            <div class="btn-table btn badge bg-warning ml-2" data-bs-toggle="modal"
                                data-bs-target="#atribuir-chamado">Atribuir</div>
                            <div class="btn-table btn badge bg-success ml-2" data-bs-toggle="modal"
                                data-bs-target="#alterar-status">Alterar Status</div>
                        </td>
                    </tr>
                </tbody>

            </table>
            <!-- END RESPONSIVE TABLE -->
        </div>
    </div>

</div>
<!--FIM GRID DOS CHAMADOS-->
</div>

<!-- Modal VISUALIZAÇÃO -->
@component('app.layouts._components.visualizacao')

@endcomponent
<!--FIM MODAL VISUALIZAÇÃO-->

<!--MODAL ATRIBUIR-->
<div class="modal fade" id="atribuir-chamado" data-bs-backdrop="static" tabindex="-1"
    aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Atribuição de Chamado</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="col">
                    <div class="row">
                        <div class="col">
                            <h6>Selecione o Técnico</h6>
                            <select class="form-select" aria-label="Default select example">
                                <option selected>Selecione</option>
                                <option value="1">Isaque Matos Conceição</option>
                                <option value="2">João Victor dos Santos Oliveira</option>
                                <option value="3">Matheus </option>
                            </select>
                        </div>
                        <div class="col">
                            <h6>Selecione a Prioridade</h6>
                            <select class="form-select" aria-label="Default select example">
                                <option selected>Selecione</option>
                                <option value="1">Baixa</option>
                                <option value="2">Normal</option>
                                <option value="3">Alta</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Fechar</button>
                <button type="button" class="btn btn-success">Salvar Alterações</button>
            </div>
        </div>
    </div>
</div>
<!--FIM MODAL ATRIBUIR-->

<!--MODAL ALTERAR STATUS-->
<div class="modal fade" id="alterar-status" data-bs-backdrop="static" tabindex="-1"
    aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Atualização de Status do Chamado - </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="col">
                    <h6>Selecione o Status do Chamado</h6>
                    <select class="form-select mb-4" aria-label="Default select example">
                        <option selected>Aberto</option>
                        <option value="1">Concluido</option>
                        <option value="2">Não-Atribuido</option>
                    </select>

                    <h6>Informe a Descrição da Atualização</h6>
                    <textarea class="form-control"></textarea>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Fechar</button>
                <button type="button" class="btn btn-success">Salvar Alterações</button>
            </div>
        </div>
    </div>
</div>
<!--FIM MODAL ALTERAR STATUS-->
@endsection
