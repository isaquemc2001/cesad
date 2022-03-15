<h5>Nome do Responsável</h5>
@foreach ($tecnico as $key => $tecnico)
@php
if ($dados_chamado->tecnico_id == $tecnico->idusuario) {
    $tecnico_atribuido = $tecnico->nome;
    break;
} else {
    $tecnico_atribuido = 'Pendente';
}
@endphp
@endforeach
<input type="text" class="form-control mb-4" value="{{ $tecnico_atribuido }}" disabled>
