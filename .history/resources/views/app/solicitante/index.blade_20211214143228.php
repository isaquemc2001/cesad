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
                            <input class="form-control" id="formFileSm" type="file" name="Anexo">

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
<div class="modal fade" id="visualizar-chamado" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-fullscreen">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Vizualizar Chamado - "Titulo"</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-12 col-sm-6">
                        <h5>Título</h5>
                        <input type="text" class="form-control mb-4" value="Cadastro de Professor no AVA" disabled>

                        <div class="row">
                            <div class="col-12 col-sm-6">
                                <h5>Nome do Técnico</h5>
                                <input type="text" class="form-control mb-4" value="ISAQUE MATOS CONCEICAO" disabled>
                            </div>
                            <div class="col-12 col-sm-6">
                                <h5>Nome do Solicitante</h5>
                                <input type="text" class="form-control mb-4" value="JOSE MARIO ALELUIA" disabled>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-6 col-sm-6">
                                <h5>Status</h5>
                                <select id="status-disabled" class="form-select mb-4" disabled>
                                    <option>Em Aberto</option>
                                </select>
                            </div>
                            <div class="col-6 col-sm-6">
                                <h5>Categoria</h5>
                                <select id="categoria-disabled" class="form-select mb-4" disabled>
                                    <option>GD AVA</option>
                                </select>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-4 col-sm-4">
                                <h5>Visualizar Anexo</h5>
                                <a data-fancybox="gallery1" href="/prototipo2/images/bg.jpg"><img
                                        src="/prototipo2/images/bg.jpg" style="width: 50%;"></a>
                            </div>
                            <div class="col-4 col-sm-4">
                                <h5>Data de Abertura</h5>
                                <input type="text" class="form-control mb-4" value="10/03/2001" disabled>
                            </div>
                            <div class="col-4 col-sm-4">
                                <h5>Data de Alteração</h5>
                                <input type="text" class="form-control mb-4" value="10/03/2001" disabled>
                            </div>
                        </div>

                    </div>
                    <div class="col-12 col-sm-6">
                        <h5>Descrição</h5>
                        <textarea class="form-control mb-4" id="textarea-disabled" rows="7"
                            disabled>What is Lorem Ipsum?
                                Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.

                                Why do we use it?
                                It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for 'lorem ipsum' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</textarea>

                        <div class="row">
                            <div class="col-8">
                                <h5>Atualização</h5>
                            </div>
                            <div class="col-4">
                                <button type="button" class="btn-table btn badge bg-primary ml-4"
                                    data-bs-dismiss="modal">Histórico de Atualização</button>
                            </div>
                        </div>
                        <textarea class="form-control" id="textarea-disabled" rows="7"
                            disabled>What is Lorem Ipsum?
                                Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.

                                Why do we use it?
                                It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for 'lorem ipsum' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</textarea>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Fechar</button>
            </div>
        </div>
    </div>
</div>
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
