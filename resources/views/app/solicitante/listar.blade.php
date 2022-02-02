<!--INICIO GRID DOS CHAMADOS-->
<div class="container">
    <div class="row">
        <div class="col-6 col-xxl-10">
            <h1 class="titulos-pag">Meus Chamados</h1>
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
                        <th class="th-titulo">Título</th>
                        <th class="th-categoria">Categoria</th>
                        <th class="th-status">Status</th>
                        <th class="th-descricao">Descrição</th>
                        <th class="th-acoes">Ações</th>
                        <th hidden>data-abertura</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($dados_chamado as $key => $dados_chamado)
                        <tr>
                            <td>{{ $dados_chamado->titulo }}</td>
                            <td>
                                @php
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
                                @endphp
                            </td>
                            <td>@if ($dados_chamado->status == "1")
                                Em aberto
                            @else
                                Concluido
                            @endif</td>
                            <td style="white-space: normal">{{ $dados_chamado->descricao }}</td>
                            <td>
                                <div class="btn-table btn badge bg-primary" data-bs-toggle="modal"
                                    data-bs-target="#visualizar-chamado{{ $dados_chamado->id }}">Visualizar</div>
                                <div class="btn-table btn badge bg-warning ml-2" data-bs-toggle="modal"
                                    data-bs-target="#editar-chamado{{ $dados_chamado->id }}"@if($dados_chamado->status == '2'){ hidden }  @endif>Editar</div>
                                <div class="btn-table">
                                    <form
                                        action="{{ route('chamado.solicitante.destroy', ['idchamado' => $dados_chamado->id]) }}"
                                        method="POST">
                                        @method('DELETE')
                                        @csrf
                                        <button type="submit" class="btn-table btn badge bg-danger ml-2">Excluir</button>
                                    </form>
                                </div>
                            </td>
                            <td hidden>{{ $dados_chamado->data_abertura }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <!-- END RESPONSIVE TABLE -->
        </div>
    </div>

</div>
