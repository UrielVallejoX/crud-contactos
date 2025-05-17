<?php
/*
Archivo: tabcontactos.php
Objetivo: muestra la tabla con los contactos del usuario logueado
*/
include_once("modelo/Contacto.php");
include_once("modelo/Usuario.php");

session_start();

$sErr = "";
$oUsu = null;
$aContactos = [];

if (isset($_SESSION["usu"]) && !empty($_SESSION["usu"])) {
    $oUsu = $_SESSION["usu"];
    $oCont = new Contacto();
    try {
        $aContactos = $oCont->buscarTodos($oUsu->getClave());
    } catch (Exception $e) {
        error_log($e->getFile()." ".$e->getLine()." ".$e->getMessage(), 0);
        $sErr = "Error en base de datos, comuníquese con el administrador";
    }
} else {
    $sErr = "Falta establecer el login";
}

if ($sErr == "") {
    include_once("cabecera.html");
    include_once("menu.php");
    include_once("aside.html");
} else {
    header("Location: error.php?sError=" . urlencode($sErr));
    exit();
}
?>

<section>
    <!-- Mostrar mensaje de operación exitosa -->
    <?php
    if (isset($_GET["msg"])) {
        $mensajes = [
            "agregado" => "Contacto agregado correctamente.",
            "modificado" => "Contacto modificado correctamente.",
            "borrado" => "Contacto borrado correctamente."
        ];
        echo "<p style='color: green; font-weight: bold;'>" . $mensajes[$_GET["msg"]] . "</p>";
    }
    ?>

    <h2>Contactos</h2>
    <table border="1" class="tablaContactos">
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Dirección</th>
            <th>Teléfono</th>
            <th>Email</th>
            <th>Tipo</th>
            <th>Acciones</th>
        </tr>
        <?php foreach ($aContactos as $oCont): ?>
            <tr>
                <td><?php echo $oCont->getIdContactos(); ?></td>
                <td><?php echo $oCont->getNombre(); ?></td>
                <td><?php echo $oCont->getDireccion(); ?></td>
                <td><?php echo $oCont->getTelefono(); ?></td>
                <td><?php echo $oCont->getEmail(); ?></td>
                <td>
                    <?php
                    $tipos = ["", "Personal", "Familiar", "Trabajo"];
                    echo $tipos[$oCont->getTipoUsuario()];
                    ?>
                </td>
                <td>
                    <form method="post" action="abcContactos.php" style="display:inline;">
                        <input type="hidden" name="txtOpe" value="m">
                        <input type="hidden" name="txtClave" value="<?php echo $oCont->getIdContactos(); ?>">
                        <input type="submit" value="Modificar">
                    </form>
                    <form method="post" action="abcContactos.php" style="display:inline;">
                        <input type="hidden" name="txtOpe" value="b">
                        <input type="hidden" name="txtClave" value="<?php echo $oCont->getIdContactos(); ?>">
                        <input type="submit" value="Eliminar" onclick="return confirm('¿Estás seguro de borrar este contacto?');">
                    </form>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>

    <form method="post" action="abcContactos.php">
        <input type="hidden" name="txtOpe" value="a">
        <input type="hidden" name="txtClave" value="nuevo">
        <input type="submit" value="Agregar nuevo contacto">
    </form>
</section>

<?php include_once("pie.html"); ?>
