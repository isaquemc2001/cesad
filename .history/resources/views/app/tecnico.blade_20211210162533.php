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
                                <a href="tecnico" class="nav-link active py-3 border-bottom" aria-current="page"
                                    title="Página Inicial" data-bs-toggle="tooltip" data-bs-placement="right">
                                    <svg class="bi" width="24" height="24" role="img" aria-label="Home">
                                        <use xlink:href="#home" />
                                    </svg>
                                </a>
                            </li>
                            <li>
                                <a href="meuschamados" class="nav-link py-3 border-bottom" title="Seus Chamados"
                                    data-bs-toggle="tooltip" data-bs-placement="right">
                                    <svg class="bi" width="24" height="24" role="img" aria-label="Chamados">
                                        <use xlink:href="#table" />
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
        <a href="#" class="d-block p-3 link-dark text-decoration-none bg-white" title="Icon-only"
            data-bs-toggle="tooltip" data-bs-placement="right">
            <img class="bi" src="{{ asset('images/chamado.png') }}" width="40" height="32">
            <span class="visually-hidden">Icon-only</span>
        </a>
        <ul class="nav nav-pills nav-flush flex-column mb-auto text-center">
            <li class="nav-item">
                <a href="tecnico" class="nav-link active py-3 border-bottom" aria-current="page" title="Página Inicial"
                    data-bs-toggle="tooltip" data-bs-placement="right">
                    <svg class="bi" width="24" height="24" role="img" aria-label="Home">
                        <use xlink:href="#home" />
                    </svg>
                </a>
            </li>
            <li>
                <a href="meuschamados" class="nav-link py-3 border-bottom" title="Seus Chamados"
                    data-bs-toggle="tooltip" data-bs-placement="right">
                    <svg class="bi" width="24" height="24" role="img" aria-label="Chamados">
                        <use xlink:href="#table" />
                    </svg>
                </a>
            </li>
        </ul>
    </div>
    <!--FIM SIDEBAR-->


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
                                    <input type="text" class="form-control mb-4" value="ISAQUE MATOS CONCEICAO"
                                        disabled>
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
                                    <h5>Prioridade</h5>
                                    <select id="prioridade-disabled" class="form-select mb-4" disabled>
                                        <option>Normal</option>
                                    </select>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-6 col-sm-6">
                                    <h5>Categoria</h5>
                                    <select id="categoria-disabled" class="form-select mb-4" disabled>
                                        <option>CADASTRO</option>
                                    </select>
                                </div>
                                <div class="col-6 col-sm-6">
                                    <h5>Setor</h5>
                                    <select id="categoria-disabled" class="form-select mb-4" disabled>
                                        <option>ADM FORMACAO CONTINUADA</option>
                                    </select>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-12 col-sm-4 mb-4">
                                    <h5>Visualizar Anexo</h5>
                                    <a data-fancybox="gallery1" href="/prototipo2/images/bg.jpg"><img
                                            src="/prototipo2/images/bg.jpg" style="width: 50%;"></a>
                                </div>
                                <div class="col-6 col-sm-4">
                                    <h5>Data de Abertura</h5>
                                    <input type="text" class="form-control mb-4" value="10/03/2001" disabled>
                                </div>
                                <div class="col-6 col-sm-4">
                                    <h5>Data de Alteração</h5>
                                    <input type="text" class="form-control mb-4" value="10/03/2001" disabled>
                                </div>
                            </div>

                        </div>
                        <div class="col-12 col-sm-6">
                            <h5>Descrição</h5>
                            <textarea class="form-control" id="textarea-disabled" rows="17"
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
