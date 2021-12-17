<h1>fornecedor</h1>

{{--comentario no interpretador blade--}}

@php



@endphp

@isset($fornecedores) ? 'Tudo okay' : 'nada okay'

@endisset

@unless ($fornecedores == true)
    <h3>Não existem fornecedores</h3>
    @else
    <h3>Existem fornecedores cadastrados</h3>
@endunless
