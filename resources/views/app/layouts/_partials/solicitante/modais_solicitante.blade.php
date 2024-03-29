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

                            <div class="row">
                                <div class="col-12 col-sm-6">
                                    @include(
                                        'app.layouts._partials.solicitante.nome_solicitante'
                                    )
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
                                            } elseif ($dados_chamado->status == '3') {
                                                echo $dados = 'Não-Atribuido';
                                            }
                                        @endphp</option>
                                    </select>
                                </div>
                                <div class="col-6 col-sm-6">
                                    <h5>Demanda</h5>
                                    <select id="categoria-disabled" class="form-select mb-4" disabled>
                                        <option>
                                            <?php $valor = $dados_chamado->tipo_erro; ?>
                                            @include(
                                                'app.layouts._partials.solicitante.tipo_erro_exibicao'
                                            )

                                        </option>
                                    </select>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-12 col-sm-4  mb-4">

                                    <?php
                                        $anexo = $dados_chamado->anexo;

                                        $tipo_arquivo = explode('.', $anexo);

                                        if($tipo_arquivo[0] == ''){
                                            $tipo_arquivo[1] = 'null';
                                            $tipo_arquivo[0] = 'null';
                                        }
                                    ?>

                                    <!--tipo imagem-->
                                    <?php
                                    if($tipo_arquivo[1] == 'png' || $tipo_arquivo[1] == 'jpg'){
                                    ?>

                                    <h5>Anexo</h5>

                                    <a data-fancybox="gallery1"
                                        href="{{ asset('public/images/anexos/' . $dados_chamado->anexo) }}"><img
                                            src="{{ asset('public/images/anexos/' . $dados_chamado->anexo) }}"
                                            style="width: 50%;"></a>

                                    <!--tipo excell-->
                                    <?php
                                    }else if($tipo_arquivo[1] == 'xlsx' || $tipo_arquivo[1] == 'xls' || $tipo_arquivo[1] == 'txt' || $tipo_arquivo[1] == 'csv'){
                                    ?>

                                    <img class="icone-anexo" src="{{ asset('public/images/excel.png') }}" title="{{ $dados_chamado->anexo }}">

                                    <!--tipo pdf-->
                                    <?php
                                    }else if($tipo_arquivo[1] == 'pdf'){
                                    ?>

                                    <img class="icone-anexo" src="{{ asset('public/images/pdf.png') }}" title="{{ $dados_chamado->anexo }}">

                                    <?php
                                    }else if($tipo_arquivo[1] == 'docx'){
                                    ?>

                                    <img class="icone-anexo" src="{{ asset('public/images/word.png') }}" title="{{ $dados_chamado->anexo }}">

                                    <?php } ?>

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
                                <!--tipo imagem-->
                                <?php
                                if($tipo_arquivo[1] == 'png' || $tipo_arquivo[1] == 'jpg'){
                                ?>

                                <a href={{ route('chamado.solicitante.download', ['anexo' =>  $dados_chamado->anexo ]) }}><Button
                                    class="btn btn-primary mb-4">Baixar Anexo</Button></a>

                                <!--tipo excell-->
                                <?php
                                }else if($tipo_arquivo[1] == 'xlsx' || $tipo_arquivo[1] == 'xls' || $tipo_arquivo[1] == 'txt' || $tipo_arquivo[1] == 'csv'){
                                ?>

                                <a href={{ route('chamado.solicitante.download', ['anexo' =>  $dados_chamado->anexo ]) }}><Button
                                    class="btn btn-primary mb-4">Baixar Anexo</Button></a>

                                <!--tipo pdf-->
                                <?php
                                }else if($tipo_arquivo[1] == 'pdf'){
                                ?>
                                <a href={{ route('chamado.solicitante.download', ['anexo' =>  $dados_chamado->anexo ]) }}><Button
                                    class="btn btn-primary mb-4">Baixar Anexo</Button></a>
                                <?php
                                }else if($tipo_arquivo[1] == 'docx'){
                                ?>
                                <a href={{ route('chamado.solicitante.download', ['anexo' =>  $dados_chamado->anexo ]) }}><Button
                                    class="btn btn-primary mb-4">Baixar Anexo</Button></a>
                                <?php } ?>

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
                    <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Fechar</button>
                </div>
            </div>
        </div>
    </div>
    <!--FIM MODAL VIZUALIZAÇÃO-->


    <!-- Modal EDITAR CHAMADO -->
    <div class="modal fade" id="editar-chamado{{ $dados_chamado->id }}" data-bs-backdrop="static"
        data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <form action="{{ route('chamado.solicitante.update', ['idchamado' => $dados_chamado->id]) }}"
                    method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="modal-header">
                        <h5 class="modal-title" id="staticBackdropLabel">Alterar chamado -
                            {{ $dados_chamado->titulo }}</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col">
                                <h5>Título</h5>
                                <input type="text" class="form-control mb-4" name="titulo"
                                    value="{{ $dados_chamado->titulo }}">

                                <h5>Setor Responsável</h5>
                                <select id="tipoerro" class="form-select mb-4" name="tipo_erro" required>

                                    <?php $valor = $dados_chamado->tipo_erro; ?>
                                    @include(
                                        'app.layouts._partials.solicitante.tipo_erro_exibicao'
                                    )

                                    @include(
                                        'app.layouts._partials.solicitante.tipo_erro_editar'
                                    )

                                </select>

                                <?php
                                $anexo = $dados_chamado->anexo;

                                $tipo_anexo = explode(".", $anexo);

                                if(sizeof($tipo_anexo) == 'png' || sizeof($tipo_anexo) == 'jpg'){
                                ?>

                                <h5>Anexo</h5>
                                <input class="form-control" type="file" name="anexo" value="">

                                <img src="{{ asset('/public/images/anexos/' . $dados_chamado->anexo) }}"
                                    alt="{{ $dados_chamado->anexo }}" class="imagem_alterar">
                                <?php
                                }
                                ?>

                            </div>
                            <div class="col">
                                <h5>Descrição</h5>
                                <textarea class="form-control mb-3" id="textarea-disabled" rows="6"
                                    name="descricao">{{ $dados_chamado->descricao }}</textarea>
                                <h5>Atualização</h5>
                                <textarea class="form-control" id="textarea-disabled" rows="6" name="resposta"
                                    disabled>{{ $dados_chamado->resposta }}</textarea>
                            </div>
                            @include(
                                'app.layouts._partials.solicitante.tecnico_mail'
                            )
                            <input type="text" value="{{ $dados_chamado->data_abertura }}" name="data_abertura"
                                hidden>
                            <input type="text" value="@php echo $data_alteracao = date('d/m/Y')  @endphp" name="data_alteracao" hidden>
                            <input type="text" value="{{ $dados_chamado->status }}" name="status" hidden>
                            <input type="text" value="{{ $dados_chamado->prioridade }}" name="prioridade" hidden>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                        <button type="submit" class="btn btn-success">Alterar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!--FIM EDITAR-->
@endforeach
