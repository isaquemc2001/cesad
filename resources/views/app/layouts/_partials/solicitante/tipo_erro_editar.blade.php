<?php foreach($tipo_erro as $key => $tipo_erro){ 
    if ($tipo_erro->id == $valor) {
        $categoria = $tipo_erro->tipo_erro;
    }
    ?>

    <option value="{{ $tipo_erro->id }}" {{ ($categoria ?? $tipo_erro->tipo_erro) == $tipo_erro->tipo_erro ? 'selected' : '' }}>
        {{ $tipo_erro->tipo_erro }}</option>

<?php } ?>
