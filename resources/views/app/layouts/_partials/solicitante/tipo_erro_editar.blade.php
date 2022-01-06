@foreach ($tipo_erro as $key => $tipo_erro)
    <option value="{{ $tipo_erro->id }}" {{ ($dados ?? $tipo_erro->tipo_erro) == $tipo_erro->tipo_erro ? 'selected' : '' }}>
        {{ $tipo_erro->tipo_erro }}</option>
@endforeach
