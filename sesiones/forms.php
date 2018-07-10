<form action="" method="POST">
    <input type="text" name="nombre[nombres]">
    <input type="text" name="nombre[apellidos]">
    <input type="submit">
</form>

// Resultado de $_POST (PHP):
// array(
//     'nombre' => array(
//         'nombres' => ''
//         'apellidos' => ''
//     )
// )


<form action="" method="POST">
    <input type="checkbox" name="tipo[]" value="1" id="administrador">
    <label for="administrador">Admin</label>

    <input type="checkbox" name="tipo[]" value="2" id="editor">
    <label for="editor">Publisher</label>

    <input type="submit">
</form>

// Resultado de $_POST (si todos son checados):
// array(
//     'tipo' => array(1, 2)
// )