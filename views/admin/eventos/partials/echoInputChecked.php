<input
    type="radio"
    id="<?= strtolower($dia->nombre) ?>"
    name="dia"
    value="<?= $dia->id ?>"
    <?php echo $evento->dia_id === $dia->id ? 'checked' : ''; ?>
>