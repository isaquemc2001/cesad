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
                                    @include('app.layouts._partials.tecnico.nome_tecnico')
                                </div>
                                <div class="col-12 col-sm-6">
                                    <h5>Nome do Solicitante</h5>
                                    <input type="text" class="form-control mb-4"
                                        value="{{ $dados_chamado->usuario->nome }}" disabled>
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
                                            } else {
                                                echo $dados = 'Não-atribuido';
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
                                    <h5>Demanda</h5>
                                    <select id="categoria-disabled" class="form-select mb-4" disabled>
                                        <option>
                                            <?php $valor = $dados_chamado->tipo_erro; ?>
                                            @include('app.layouts._partials.tecnico.tipo_erro_exibicao')
                                        </option>
                                    </select>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-12 col-sm-4 mb-4">

                                    <?php
                                    $anexo = $dados_chamado->anexo;
                                    echo $anexo;

                                    $tipo = explode('.', $anexo);
                                    $tipo_arquivo = substr($tipo[0], 1);
                                    print_r($tipo_arquivo);
                                    ?>

                                    <h5>Anexo</h5>
                                    <a data-fancybox="gallery1"
                                        href="{{ url('public/images/anexos/' . $dados_chamado->anexo) }}"><img
                                            src="{{ url('public/images/anexos/' . $dados_chamado->anexo) }}"
                                            style="width: 50%;"></a>
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


                            <div class="row">
                                <div class="col">
                                    <a
                                        href={{ route('chamado.solicitante.download', ['anexo' => $dados_chamado->anexo]) }}><Button
                                            class="btn btn-primary mb-4">Baixar Anexo</Button></a>
                                </div>
                            </div>

                        </div>
                        <div class="col-12 col-sm-6">
                            <h5>Descrição</h5>
                            <textarea class="form-control mb-4" id="textarea-disabled" rows="7"
                                disabled>{{ $dados_chamado->descricao }}</textarea>

                            <div class="row">
                                <div class="col">
                                    <h5>Atualização</h5>
                                </div>
                            </div>

                            @php
                                if ($dados_chamado->resposta == true) {
                                    $resposta = $dados_chamado->resposta;
                                } else {
                                    $resposta = 'Resposta pendente.';
                                }
                            @endphp

                            <textarea class="form-control" id="textarea-disabled" rows="7" disabled>@php echo $resposta; @endphp</textarea>
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
    <div class="modal fade" id="atribuir-chamado{{ $dados_chamado->id }}" data-bs-backdrop="static" tabindex="-1"
        aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="{{ route('chamado.tecnico.atribuir', ['idchamado' => $dados_chamado->id]) }}"
                    method="POST" enctype="multipart/form-data">
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
                                    @include('app.layouts._partials.tecnico.select_tecnico')
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
                                <input type="number" name="status" value="1" hidden>
                                @include('app.layouts._partials.tecnico.solicitante_mail')
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
                    method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Atualização de Status do Chamado -
                            {{ $dados_chamado->titulo }}</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="col">
                            <h6>Selecione o Status do Chamado</h6>
                            <select class="form-select mb-4" name="status">
                                <option value="1" selected>Aberto</option>
                                <option value="2">Concluido</option>
                            </select>

                            <h6>Informe a Descrição da Atualização</h6>
                            <textarea class="form-control" name="resposta">{{ $dados_chamado->resposta }}</textarea>

                            <input type="text" value="@php echo $data_alteracao = date('d/m/Y')  @endphp" name="data_alteracao" hidden>
                            @include('app.layouts._partials.tecnico.solicitante_mail')
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

<!--MODAL TIPO ERRO-->
<form action="{{ route('chamado.tipoerro') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="modal fade" id="tipoerro" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Cadastrar Categoria</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <h5>Informe a categoria</h5>
                    <input required type="text" class="form-control mb-4" title="Cadastrar categoria" name="tipo_erro"
                        value="{{ old('tipo_erro') }}">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                    <button type="submit" class="btn btn-success">Cadastrar</button>
                </div>
            </div>
        </div>
    </div>
</form>
<!--FIM MODAL TIPO ERRO-->
