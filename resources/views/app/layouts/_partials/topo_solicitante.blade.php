
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
                                class="nav-link @if($titulo == "Principal Solicitante"){ active }  @endif py-3 border-bottom" aria-current="page" title="Página Inicial"
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

        <input type="text" value="{{ $errors }}">

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
