@foreach ($tecnico as $key => $tecnico)
@php
$tecnico_atribuido = "";
if ($dados_chamado->solicitante_id == $tecnico->idusuario) {
    $pessoa_solicitante = $tecnico->nome;
    break;
} else {
    $pessoa_solicitante = 'Pendente';
}
@endphp
@endforeach
<input type="text" class="form-control mb-4" name="nome_solicitante" value="{{ $pessoa_solicitante }}" hidden>