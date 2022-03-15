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
                },
                "order": [
                    [5, "desc"]
                ]
            });
        });
    </script>

    @include('app.layouts._partials.solicitante.topo_solicitante')
    @include('app.layouts._partials.solicitante.modais_solicitante')

    <!--INICIO GRID DOS CHAMADOS-->
    <div class="container">
        <div class="row">
            <div class="col-6 col-xxl-10">
                <h1 class="titulos-pag">Chamados Concluidos</h1>
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
                                    <?php $valor = $dados_chamado->tipo_erro; ?>
                                    @include('app.layouts._partials.solicitante.tipo_erro_exibicao')
                                </td>
                                <td>
                                    @if ($dados_chamado->status == '1')
                                        Em aberto
                                    @else
                                        Concluido
                                    @endif
                                </td>
                                <td>{{ $dados_chamado->descricao }}</td>
                                <td>
                                    <div class="btn-table btn badge bg-primary" data-bs-toggle="modal"
                                        data-bs-target="#visualizar-chamado{{ $dados_chamado->id }}">Visualizar</div>
                                    <div class="btn-table btn badge bg-warning ml-2" data-bs-toggle="modal"
                                        data-bs-target="#editar-chamado{{ $dados_chamado->id }}"
                                        @if ($dados_chamado->status == '2') { hidden } @endif>Editar</div>

                                    <form class="d-inline-block"
                                        action="{{ route('chamado.solicitante.destroy', ['idchamado' => $dados_chamado->id]) }}"
                                        method="POST">
                                        @method('DELETE')
                                        @csrf
                                        <button type="submit" class="btn-table btn badge bg-danger ml-2">Excluir</button>
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

    <!-- Modal CADASTRAR CHAMADO -->
    <form action="{{ route('chamado.solicitante') }}" method="POST" enctype="multipart/form-data">
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
                                <input type="text" class="form-control mb-4" name="Titulo" value={{ old('Titulo') }}>

                                @include('app.layouts._partials.solicitante.tipo_erro')

                                <h5>Anexo</h5>
                                <input class="form-control" id="" type="file" name="Anexo" value={{ old('Anexo') }}>

                            </div>
                            <div class="col">
                                <h5>Descrição</h5>
                                <textarea class="form-control" id="textarea-disabled" rows="14" name="Descricao">@if (old('Descricao') != '')
    {{ old('Descricao') }}
    @endif</textarea>
                            </div>

                            <input type="text" value="@php echo $data_abertura = date('d/m/Y')  @endphp" name="dataAbertura" hidden>
                            <input type="text" value="@php echo $data_alteracao = date('d/m/Y')  @endphp" name="dataAlteracao" hidden>
                            <input type="text" value="@php echo $status = "3";  @endphp" name="Status" hidden>
                            <input type="text" value="@php echo $prioridade = "2";  @endphp" name="Prioridade" hidden>
                            <input type="text" value="@php echo $_SESSION['idusuario'];  @endphp" name="Idusuario" hidden>
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
@endsection
