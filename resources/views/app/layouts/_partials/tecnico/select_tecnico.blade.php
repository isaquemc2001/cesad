<h6>Selecione o Técnico</h6>
<select class="form-select" name="tecnico_id">
    <option value=1 selected>Selecione</option>
    @foreach ($tecnico as $key => $tecnico)
    <?php if ($tecnico->idusuariotipo == "4") { ?>
        <option value="<?php echo $tecnico->idusuario; ?>"><?php echo $tecnico->nome; ?></option>
        <?php
        }
    ?>
    @endforeach
</select>
