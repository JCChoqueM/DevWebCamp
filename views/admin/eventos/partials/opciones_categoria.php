<?php foreach ($categorias as $categoria) {
    $seleccionado = ($evento->categoria_id === $categoria->id) ? 'selected' : '';
?>
    <option
        <?php echo $seleccionado; ?>
        value="<?php echo $categoria->id; ?>"
    ><?php echo htmlspecialchars($categoria->nombre); ?></option>
<?php } ?>