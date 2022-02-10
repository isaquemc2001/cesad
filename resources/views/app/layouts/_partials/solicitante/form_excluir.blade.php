<form action="{{ route('chamado.solicitante.destroy', ['idchamado' => $dados_chamado->id]) }}" method="POST">
    @method('DELETE')
    @csrf
</form>
