<h1>fornecedor</h1>

{{--comentario no interpretador blade--}}

@php



@endphp


@dd($fornecedores)

@if(count($fornecedores) > 0 && count($fornecedores) < 10)
    <h3>Existem alguns fornecedores cadastrados</h3>
@elseif (count($fornecedores) > 10)
    <h3>Existem vários fornecedores cadastrados</h3>
@else
    <h3>Ainda não existem fornecedores cadastrados<h3>
@endif

@unless ($fornecedores == 1)
    <h3>Não existem fornecedores</h3>
@endunless
