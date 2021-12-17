<h1>fornecedor</h1>

{{--comentario no interpretador blade--}}

@php

echo isset($fornecedores) ? 'Tudo okay' : 'nada okay';

@endphp

<br>

Nome: {{ $fornecedor[0]['nome'] ?? 'Inexistente'}}
