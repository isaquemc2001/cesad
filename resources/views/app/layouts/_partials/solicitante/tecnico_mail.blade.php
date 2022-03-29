@foreach ($tecnico as $key => $tecnico)
@php
$tecnico_atribuido = "";
if ($dados_chamado->tecnico_id == $tecnico->idusuario) {
    $tecnico_atribuido = $tecnico->nome;
    break;
} else {
    $tecnico_atribuido = 'Pendente';
}
@endphp
@endforeach
<input type="text" class="form-control mb-4" name="nome_tecnico" value="{{ $tecnico_atribuido }}" hidden>
