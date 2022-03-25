<h5>Demanda</h5>
<select id="tipoerro" class="form-select mb-4" name="tipo_erro" required>

    @foreach ($tipo_erro as $key => $tipo_erro)
        <option value="{{ $tipo_erro->id }}" {{ old('tipo_erro') == $tipo_erro ? 'selected' : '' }}>
            {{ $tipo_erro->tipo_erro }}</option>
    @endforeach
</select>
