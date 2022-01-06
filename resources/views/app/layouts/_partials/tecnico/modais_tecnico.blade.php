@foreach ($dados_chamado as $key => $dados_chamado)
    <!-- Modal VISUALIZAÇÃO -->
    <div class="modal fade" id="visualizar-chamado{{ $dados_chamado->id }}" data-bs-backdrop="static"
        data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-fullscreen">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Vizualizar Chamado -
                        {{ $dados_chamado->titulo }}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-12 col-sm-6">
                            <h5>Título</h5>
                            <input type="text" class="form-control mb-4" value="{{ $dados_chamado->titulo }}" disabled>

                            <div class="row">
                                <div class="col-12 col-sm-6">
                                    <h5>Nome do Técnico</h5>
                                    <input type="text" class="form-control mb-4" value="" disabled>
                                </div>
                                <div class="col-12 col-sm-6">
                                    <h5>Nome do Solicitante</h5>
                                    <input type="text" class="form-control mb-4" value="" disabled>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-6 col-sm-6">
                                    <h5>Status</h5>
                                    <select id="status-disabled" class="form-select mb-4" disabled>
                                        <option>@php
                                            if ($dados_chamado->status == '1') {
                                                echo $dados = 'Aberto';
                                            } elseif ($dados_chamado->status == '2') {
                                                echo $dados = 'Concluido';
                                            } elseif ($dados_chamado->status == '3') {
                                                echo $dados = 'Não-Atribuido';
                                            }
                                        @endphp</option>
                                    </select>
                                </div>
                                <div class="col-6 col-sm-6">
                                    <h5>Prioridade</h5>
                                    <select id="prioridade-disabled" class="form-select mb-4" disabled>
                                        <option>@php
                                            if ($dados_chamado->prioridade == '1') {
                                                echo $dados = 'Baixa';
                                            } elseif ($dados_chamado->prioridade == '2') {
                                                echo $dados = 'Normal';
                                            } elseif ($dados_chamado->prioridade == '3') {
                                                echo $dados = 'Alta';
                                            }
                                        @endphp</option>
                                    </select>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-6 col-sm-6">
                                    <h5>Categoria</h5>
                                    <select id="categoria-disabled" class="form-select mb-4" disabled>
                                        <option>@php
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
                                        @endphp</option>
                                    </select>
                                </div>
                                <div class="col-6 col-sm-6">
                                    <h5>Setor</h5>
                                    <select id="categoria-disabled" class="form-select mb-4" disabled>
                                        <option></option>
                                    </select>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-12 col-sm-4 mb-4">
                                    <h5>Visualizar Anexo</h5>
                                    <a data-fancybox="gallery1" href="/images/anexos/{{ $dados_chamado->anexo }}"><img
                                            src="/images/anexos/{{ $dados_chamado->anexo }}" style="width: 50%;"></a>
                                </div>
                                <div class="col-6 col-sm-4">
                                    <h5>Data de Abertura</h5>
                                    <input type="text" class="form-control mb-4" value="@php echo $data_abertura = implode('/', array_reverse(explode('-', $dados_chamado->data_abertura))); @endphp" disabled>
                                </div>
                                <div class="col-6 col-sm-4">
                                    <h5>Data de Alteração</h5>
                                    <input type="text" class="form-control mb-4" value="@php echo $data_alteracao = implode('/', array_reverse(explode('-', $dados_chamado->data_alteracao))); @endphp" disabled>
                                </div>
                            </div>

                        </div>
                        <div class="col-12 col-sm-6">
                            <h5>Descrição</h5>
                            <textarea class="form-control" id="textarea-disabled" rows="17"
                                disabled>{{ $dados_chamado->descricao }}</textarea>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Fechar</button>
                </div>
            </div>
        </div>
    </div>'
    <!--FIM MODAL VISUALIZAÇÃO-->

    <!--MODAL ATRIBUIR-->
    <div class="modal fade" id="atribuir-chamado{{ $dados_chamado->id }}" data-bs-backdrop="static" tabindex="-1"
        aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="{{ route('chamado.tecnico.atribuir', ['idchamado' => $dados_chamado->id]) }}"
                    method="POST">
                    @csrf
                    @method('PUT')
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Atribuição de Chamado -
                            {{ $dados_chamado->titulo }}</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="col">
                            <div class="row">
                                <div class="col">
                                    <h6>Selecione o Técnico</h6>
                                    <select class="form-select" name="tecnico_atribuido">
                                        <option selected>Selecione</option>
                                        <option value="1">Isaque Matos Conceição</option>
                                        <option value="2">João Victor dos Santos Oliveira</option>
                                        <option value="3">Matheus Andrade</option>
                                    </select>
                                </div>
                                <div class="col">
                                    <h6>Selecione a Prioridade</h6>
                                    <select class="form-select" name="prioridade">
                                        <option selected>Selecione</option>
                                        <option value="1">Baixa</option>
                                        <option value="2" selected>Normal</option>
                                        <option value="3">Alta</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Fechar</button>
                        <button type="submit" class="btn btn-success">Salvar Alterações</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!--FIM MODAL ATRIBUIR-->

    <!--MODAL ALTERAR STATUS-->
    <div class="modal fade" id="alterar-status{{ $dados_chamado->id }}" data-bs-backdrop="static" tabindex="-1"
        aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="{{ route('chamado.tecnico.status', ['idchamado' => $dados_chamado->id]) }}"
                    method="POST">
                    @csrf
                    @method('PUT')
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Atualização de Status do Chamado - {{ $dados_chamado->titulo }}</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="col">
                            <h6>Selecione o Status do Chamado</h6>
                            <select class="form-select mb-4" name="status">
                                <option value="1" selected>Aberto</option>
                                <option value="2">Concluido</option>
                                <option value="3">Não-Atribuido</option>
                            </select>

                            <h6>Informe a Descrição da Atualização</h6>
                            <textarea class="form-control" name="resposta">{{ $dados_chamado->resposta }}</textarea>

                            <input type="text" value="@php echo $data_alteracao = date('d/m/Y')  @endphp" name="data_alteracao" hidden>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Fechar</button>
                        <button type="submit" class="btn btn-success">Salvar Alterações</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!--FIM MODAL ALTERAR STATUS-->
@endforeach
