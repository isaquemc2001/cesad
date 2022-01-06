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
                }
            });
        });
    </script>

    @include('app.layouts._partials.solicitante.topo_solicitante')

    @include('app.layouts._partials.solicitante.modais_solicitante')

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
                                <textarea class="form-control" id="textarea-disabled" rows="14"
                                    name="Descricao">@if (old('Descricao') != ''){{ old('Descricao') }}@endif</textarea>
                            </div>

                            <input type="text" value="@php echo $data_abertura = date('d/m/Y')  @endphp" name="dataAbertura" hidden>
                            <input type="text" value="@php echo $data_alteracao = date('d/m/Y')  @endphp" name="dataAlteracao" hidden>
                            <input type="text" value="@php echo $status = "3";  @endphp" name="Status" hidden>
                            <input type="text" value="@php echo $prioridade = "2";  @endphp" name="Prioridade" hidden>
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

    @include('app.solicitante.listar')
    <!--FIM GRID DOS CHAMADOS-->
    </div>

@endsection
