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

<div>{{$tecnico_atribuido}}</div>