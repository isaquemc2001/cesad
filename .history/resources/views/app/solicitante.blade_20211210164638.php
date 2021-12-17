@extends('app.layouts.basico')

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

<!--INICIO NAVBAR-->
<nav class="navbar navbar-light d-flex shadow">
    <div class="container-fluid">
        <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasScrolling"
            aria-controls="offcanvasScrolling">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="offcanvas offcanvas-start" style="width: 74px;" data-bs-scroll="true" data-bs-backdrop="false"
            tabindex="-1" id="offcanvasScrolling" aria-labelledby="offcanvasScrollingLabel">
            <div class="offcanvas-body">
                <!--INICIO SIDEBAR RESPONSIVO-->
                <div class="sidebar-responsivo flex-column shadow" style="width: 4.5rem;">
                    <a href="#" class="d-block p-3 link-dark text-decoration-none bg-white" title="Icon-only"
                        data-bs-toggle="tooltip" data-bs-placement="right">
                        <img class="bi" src="{{ asset('images/chamado.png') }}" width="40" height="32">
                        <span class="visually-hidden">Icon-only</span>
                    </a>
                    <ul class="nav nav-pills nav-flush flex-column mb-auto text-center">
                        <li class="nav-item">
                            <a href="/prototipo2/modulos/solicitante/index-solicitante.phtml"
                                class="nav-link active py-3 border-bottom" aria-current="page" title="Página Inicial"
                                data-bs-toggle="tooltip" data-bs-placement="right">
                                <svg class="bi" width="24" height="24" role="img" aria-label="Home">
                                    <use xlink:href="#home" />
                                </svg>
                            </a>
                        </li>
                        <li>
                            <a class="nav-link py-3 border-bottom" title="Novo Chamado" data-bs-toggle="modal"
                                data-bs-target="#cadastrar-chamado" data-bs-placement="right">
                                <svg class="bi" width="24" height="24" role="img" aria-label="Products">
                                    <use xlink:href="#new" />
                                </svg>
                            </a>
                        </li>
                        <li>
                            <button class="navbar-toggler mt-2" type="button" data-bs-toggle="offcanvas"
                                data-bs-target="#offcanvasScrolling" aria-controls="offcanvasScrolling">
                                <span class="navbar-toggler-icon"></span>
                            </button>
                        </li>
                    </ul>
                </div>
                <!--FIM SIDEBAR RESPONSIVO-->
            </div>
        </div>

        <ul class="nav d-flex">
            <li>
                <div class="dropdown dropstart">
                    <a href="#" class="d-flex" type="button" id="dropdownMenu2" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        <img src="{{ asset('images/I.png') }}" class="btn-nav btn-perfil" href="#"
                            title="Acesso Rápido" role="button" id="dropdown" aria-expanded="false">
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="dropdownMenu2">
                        <li><button class="dropdown-item" type="button">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                    class="bi bi-person-circle" viewBox="0 0 16 16">
                                    <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z" />
                                    <path fill-rule="evenodd"
                                        d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z" />
                                </svg> Perfil
                            </button></li>
                        <li><button class="dropdown-item" type="button">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                    class="bi bi-box-arrow-right" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd"
                                        d="M10 12.5a.5.5 0 0 1-.5.5h-8a.5.5 0 0 1-.5-.5v-9a.5.5 0 0 1 .5-.5h8a.5.5 0 0 1 .5.5v2a.5.5 0 0 0 1 0v-2A1.5 1.5 0 0 0 9.5 2h-8A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h8a1.5 1.5 0 0 0 1.5-1.5v-2a.5.5 0 0 0-1 0v2z" />
                                    <path fill-rule="evenodd"
                                        d="M15.854 8.354a.5.5 0 0 0 0-.708l-3-3a.5.5 0 0 0-.708.708L14.293 7.5H5.5a.5.5 0 0 0 0 1h8.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3z" />
                                </svg> Sair
                            </button></li>
                    </ul>
                </div>
            </li>
        </ul>
    </div>
</nav>
<!--FIM NAVBAR-->

<!--INICIO SIDEBAR-->
<div class="side-bar flex-column shadow" style="width: 4.5rem;">
    <a href="#" class="d-block p-3 link-dark text-decoration-none bg-white" title="Icon-only" data-bs-toggle="tooltip"
        data-bs-placement="right">
        <img class="bi" src="{{ asset('images/chamado.png') }}" width="40" height="32">
        <span class="visually-hidden">Icon-only</span>
    </a>
    <ul class="nav nav-pills nav-flush flex-column mb-auto text-center">
        <li class="nav-item">
            <a href="/prototipo2/modulos/solicitante/index-solicitante.phtml" class="nav-link active py-3 border-bottom"
                aria-current="page" title="Página Inicial" data-bs-toggle="tooltip" data-bs-placement="right">
                <svg class="bi" width="24" height="24" role="img" aria-label="Home">
                    <use xlink:href="#home" />
                </svg>
            </a>
        </li>
        <li>
            <a class="nav-link btn py-3 border-bottom" title="Novo Chamado" data-bs-toggle="modal"
                data-bs-target="#cadastrar-chamado" data-bs-placement="right">
                <svg class="bi" width="24" height="24" role="img" aria-label="Products">
                    <use xlink:href="#new" />
                </svg>
            </a>
        </li>
    </ul>
</div>
<!--FIM SIDEBAR-->


<!-- Modal CADASTRAR CHAMADO -->
<form action="/prototipo2/modulos/controllers/cadastrar-chamado.php" method="POST">
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
