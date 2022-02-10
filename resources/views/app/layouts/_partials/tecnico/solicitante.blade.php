<div class="col-12 col-sm-6">
    <h5>Nome do Solicitante</h5>
    <input type="text" class="form-control mb-4"
    @foreach ($usuario as $key => $usuario)
    value="{{ $usuario->usuario->nome }}"
    @endforeach disabled>
</div>
