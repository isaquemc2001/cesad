@extends('app.layouts.basico')

@section('titulo', $titulo)

@section('conteudo')
<script>
    $(document).ready(function() {
        $('#table-chamado').DataTable({
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
                    "first": "Primaira",
                    "last": "Última",
                    "next": "Próxima",
                    "previous": "Anterior"
                }
            }
        });
    });
</script>

@include('app.layouts._partials.topo_solicitante')

<!-- Modal CADASTRAR CHAMADO -->
<form action="{{ route('app.solicitante')}}" method="POST">
    @csrf
    <div class="modal fade" id="cadastrar-chamado" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Cadastrar Chamado</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col">
                            <h5>Título</h5>
                            <input type="text" class="form-control mb-4" name="Titulo">

                            <h5>Tipo de Erro</h5>
                            <select id="" class="form-select mb-4" name="tipoErro">
                                <option value="1">Dificuldade de acesso</option>
                                <!--1-->
                                <option value="2">Cadastro de dados</option>
                                <!--2-->
                            </select>

                            <h5>Anexo</h5>
                            <input class="form-control" id="formFileSm" type="number" name="Anexo">

                        </div>
                        <div class="col">
                            <h5>Descrição</h5>
                            <textarea class="form-control" id="textarea-disabled" rows="14"
                                name="Descricao"></textarea>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                    <button type="submit" class="btn btn-success">Cadastrar</button>
                </div>
            </div>
        </div>
    </div>
</form>
<!--FIM MODAL CADASTRAR -->


<!--INICIO GRID DOS CHAMADOS-->
<div class="container">
    <div class="row">
        <div class="col-6 col-xxl-10">
            <h1 class="titulos-pag">Chamados</h1>
        </div>
        <div class="col-6 col-xxl-2 d-flex justify-content-end" style="height: 50%;">
            <div class="btn-add btn btn-success" title="Novo Chamado" data-bs-toggle="modal"
                data-bs-target="#cadastrar-chamado">Novo Chamado</div>
        </div>
    </div>

    <div class="row">
        <div class="col">

            <!-- RESPONSIVE TABLE -->
            <table class="table table-responsive table-hover" id="table-chamado">

                <thead>
                    <tr>
                        <th>Nome</th>
                        <th>Título</th>
                        <th>Data</th>
                        <th>Categoria</th>
                        <th>Responsável</th>
                        <th>Ações</th>
                    </tr>
                </thead>

                <tbody>
                    <tr>
                        <td>Isaque Matos</td>
                        <td>Não consigo acessar o AVA</td>
                        <td>02/11/2021</td>
                        <td>Dificuldade de Acesso</td>
                        <td>João Victor</td>
                        <td>
                            <div class="btn-table btn badge bg-primary" data-bs-toggle="modal"
                                data-bs-target="#visualizar-chamado">Visualizar</div>
                            <div class="btn-table btn badge bg-warning ml-2" data-bs-toggle="modal"
                                data-bs-target="#editar-chamado">Editar</div>
                        </td>
                    </tr>
                    <tr>
                        <td>Camilla Menezes</td>
                        <td>Não consigo acessar o AVA</td>
                        <td>02/11/2021</td>
                        <td>Dificuldade de Acesso</td>
                        <td>João Victor</td>
                        <td>
                            <div class="btn-table btn badge bg-primary" data-bs-toggle="modal"
                                data-bs-target="#visualizar-chamado">Visualizar</div>
                            <div class="btn-table btn badge bg-warning ml-2" data-bs-toggle="modal"
                                data-bs-target="#editar-chamado">Editar</div>
                        </td>
                    </tr>
                    <tr>
                        <td>Isaque Matos</td>
                        <td>Não consigo acessar o AVA</td>
                        <td>02/11/2021</td>
                        <td>Dificuldade de Acesso</td>
                        <td>João Victor</td>
                        <td>
                            <div class="btn-table btn badge bg-primary" data-bs-toggle="modal"
                                data-bs-target="#visualizar-chamado">Visualizar</div>
                            <div class="btn-table btn badge bg-warning ml-2" data-bs-toggle="modal"
                                data-bs-target="#editar-chamado">Editar</div>
                        </td>
                    </tr>
                    <tr>
                        <td>Ingrid Lúcia</td>
                        <td>Não consigo acessar o AVA</td>
                        <td>02/11/2021</td>
                        <td>Dificuldade de Acesso</td>
                        <td>João Victor</td>
                        <td>
                            <div class="btn-table btn badge bg-primary" data-bs-toggle="modal"
                                data-bs-target="#visualizar-chamado">Visualizar</div>
                            <div class="btn-table btn badge bg-warning ml-2" data-bs-toggle="modal"
                                data-bs-target="#editar-chamado">Editar </div>
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
<!--FIM MODAL VIZUALIZAÇÃO-->

<!-- Modal EDITAR CHAMADO -->
<div class="modal fade" id="editar-chamado" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Editar Chamado</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-12 col-sm-6">
                        <h5>Título</h5>
                        <input type="text" class="form-control mb-4" value="Cadastro de Professor no AVA">

                        <h5>Tipo de Erro</h5>
                        <select id="categoria" class="form-select mb-4">
                            <option>CADASTRO</option>
                        </select>

                        <h5>Anexo</h5>
                        <input class="form-control mb-4" id="formFileSm" type="file">

                    </div>
                    <div class="col-12 col-sm-6">
                        <h5>Descrição</h5>
                        <textarea class="form-control" id="textarea-disabled" rows="14"></textarea>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Understood</button>
            </div>
        </div>
    </div>
</div>
<!--FIM EDITAR CADASTRAR -->
@endsection
