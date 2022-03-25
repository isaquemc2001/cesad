<!--INICIO GRID DOS CHAMADOS-->
<div class="container">
    <div class="row">
        <!--AVISO DE CADASTRO-->
        <div class="alert alert-success mt-3" <?php if ($cadastrado == '1') {
} else {
    echo 'hidden';
} ?> role="alert">
            Chamado Cadastrado com Sucesso!
        </div>
        <div class="alert alert-danger mt-3" <?php if ($cadastrado == '2') {
} else {
    echo 'hidden';
} ?> role="alert">
            Chamado não Cadastrado!
        </div>

        <!--AVISO DE CADASTRO-->
        <div class="alert alert-success mt-3" <?php if ($editado == '1') {
} else {
    echo 'hidden';
} ?> role="alert">
            Chamado Alterado com Sucesso!
        </div>
        <div class="alert alert-danger mt-3" <?php if ($editado == '2') {
} else {
    echo 'hidden';
} ?> role="alert">
            Chamado não Alterado!
        </div>

        <!--AVISO DE EXCLUSÃO-->
        <div class="alert alert-success mt-3" <?php if ($excluido == '1') {
} else {
    echo 'hidden';
} ?> role="alert">
            Chamado Excluido com Sucesso!
        </div>
        <div class="alert alert-danger mt-3" <?php if ($excluido == '2') {
} else {
    echo 'hidden';
} ?> role="alert">
            Chamado não Excluido!
        </div>

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
                        <th class="th-categoria">Demanda</th>
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
                                <?php $valor = $dados_chamado->tipo_erro; ?>
                                @include('app.layouts._partials.solicitante.tipo_erro_exibicao')
                                
                            </td>
                            <td>
                                <?php
                                if ($dados_chamado->status == '1') {
                                    echo $dados = 'Aberto';
                                } elseif ($dados_chamado->status == '2') {
                                    echo $dados = 'Concluido';
                                } elseif ($dados_chamado->status == '3') {
                                    echo $dados = 'Não-Atribuido';
                                }
                                ?>
                            </td>
                            <td style="white-space: normal">{{ $dados_chamado->descricao }}</td>
                            <td>
                                <div class="btn-table btn badge bg-primary" data-bs-toggle="modal"
                                    data-bs-target="#visualizar-chamado{{ $dados_chamado->id }}">Visualizar</div>
                                <div class="btn-table btn badge bg-warning ml-2" data-bs-toggle="modal"
                                    data-bs-target="#editar-chamado{{ $dados_chamado->id }}"
                                    @if ($dados_chamado->status == '2') { hidden } @endif>
                                    Editar</div>

                                <form class="d-inline-block"
                                    action="{{ route('chamado.solicitante.destroy', ['idchamado' => $dados_chamado->id]) }}"
                                    method="POST">
                                    @method('DELETE')
                                    @csrf
                                    <button type="submit" class="btn-table btn badge bg-danger">Excluir</button>
                                </form>
                            </td>
                            <td hidden>{{ $dados_chamado->created_at }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <!-- END RESPONSIVE TABLE -->
        </div>
    </div>

</div>
