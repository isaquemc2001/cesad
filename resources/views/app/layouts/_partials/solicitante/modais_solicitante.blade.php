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

                                    @php
                                        if ($dados_chamado->tecnico_atribuido == '1') {
                                            $tecnico = "Isaque Matos Conceição";
                                        } elseif ($dados_chamado->tecnico_atribuido == '2') {
                                            $tecnico = "João Victor dos Santos Oliveira";
                                        } elseif ($dados_chamado->tecnico_atribuido == '3') {
                                            $tecnico = "Matheus Andrade";
                                        }else {
                                            $tecnico = "Pendente";
                                        }
                                    @endphp

                                    <h5>Nome do Técnico</h5>
                                    <input type="text" class="form-control mb-4"
                                        value="@php echo $tecnico @endphp" disabled>
                                </div>
                                <div class="col-12 col-sm-6">
                                    <h5>Nome do Solicitante</h5>
                                    <input type="text" class="form-control mb-4" value="{{ $dados_chamado->usuario->nome }}" disabled>
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
                            </div>

                            <div class="row">
                                <div class="col-4 col-sm-4">
                                    <h5>Visualizar Anexo</h5>
                                    <a data-fancybox="gallery1" href="/images/anexos/{{ $dados_chamado->anexo }}"><img
                                            src="/images/anexos/{{ $dados_chamado->anexo }}" style="width: 50%;"></a>
                                </div>
                                <div class="col-4 col-sm-4">
                                    <h5>Data de Abertura</h5>
                                    <input type="text" class="form-control mb-4" value="@php echo $data_abertura = implode('/', array_reverse(explode('-', $dados_chamado->data_abertura))); @endphp" disabled>
                                </div>
                                <div class="col-4 col-sm-4">
                                    <h5>Data de Alteração</h5>
                                    <input type="text" class="form-control mb-4" value="@php echo $data_alteracao = implode('/', array_reverse(explode('-', $dados_chamado->data_alteracao))); @endphp" disabled>
                                </div>
                            </div>

                        </div>
                        <div class="col-12 col-sm-6">
                            <h5>Descrição</h5>
                            <textarea class="form-control mb-4" id="textarea-disabled" rows="7"
                                disabled>{{ $dados_chamado->descricao }}</textarea>

                            <div class="row">
                                <div class="col-8">
                                    <h5>Atualização</h5>
                                </div>
                                <div class="col-4">
                                    <button type="button" class="btn-table btn badge bg-primary ml-4"
                                        data-bs-dismiss="modal">Histórico de Atualização</button>
                                </div>
                            </div>

                            @php
                                if($dados_chamado->resposta == true){
                                    $resposta = $dados_chamado->resposta;
                                }else {
                                    $resposta = "Resposta pendente.";
                                }
                            @endphp

                            <textarea class="form-control" id="textarea-disabled" rows="7"
                                disabled>@php echo $resposta; @endphp</textarea>
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

                                <h5>Tipo de Erro</h5>
                                <select id="tipoerro" class="form-select mb-4" name="tipo_erro" required>

                                    @php
                                        if ($dados_chamado->tipo_erro == '1') {
                                            $dados = 'AVA';
                                            $valor = 1;
                                        } elseif ($dados_chamado->tipo_erro == '2') {
                                            $dados = 'AVA/GD';
                                            $valor = 2;
                                        } elseif ($dados_chamado->tipo_erro == '3') {
                                            $dados = 'AVA/NFC';
                                            $valor = 3;
                                        } elseif ($dados_chamado->tipo_erro == '4') {
                                            $dados = 'Cadastro';
                                            $valor = 4;
                                        } elseif ($dados_chamado->tipo_erro == '5') {
                                            $dados = 'Configurações';
                                            $valor = 5;
                                        } elseif ($dados_chamado->tipo_erro == '6') {
                                            $dados = 'Dificuldade de acesso';
                                            $valor = 6;
                                        } elseif ($dados_chamado->tipo_erro == '7') {
                                            $dados = 'Dificuldade de usuário';
                                            $valor = 7;
                                        } elseif ($dados_chamado->tipo_erro == '8') {
                                            $dados = 'Erro de sistema';
                                            $valor = 8;
                                        } elseif ($dados_chamado->tipo_erro == '9') {
                                            $dados = 'ORBI';
                                            $valor = 9;
                                        }
                                    @endphp

                                    @include('app.layouts._partials.solicitante.tipo_erro_editar')

                                </select>

                                <h5>Anexo</h5>
                                <input class="form-control" type="file" name="anexo"
                                    value="">

                                <img src="/images/anexos/{{ $dados_chamado->anexo}}" alt="{{ $dados_chamado->anexo}}" class="imagem_alterar">

                            </div>
                            <div class="col">
                                <h5>Descrição</h5>
                                <textarea class="form-control" id="textarea-disabled" rows="14"
                                    name="descricao">{{ $dados_chamado->descricao }}</textarea>
                            </div>
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
