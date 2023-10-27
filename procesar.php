<?php
include("./config.php");

if (isset($_POST['enviar'])) {
    $idcliente = $_POST['idcliente'];
    $idempleado = $_POST['idempleado'];
    $fechap = $_POST['fechadelpedido'];
    $fechaE = $_POST['fechadeentrega'];
    $estadodelpedido = $_POST['estadodelpedido'];
    $totaldelpedido = $_POST['totaldelpedido'];
    $metododepago = $_POST['metododepago'];
    $paqueteria = $_POST['paqueteria'];

    $sql = "INSERT INTO pedidos(id_cliente, id_empleado, fechadepedido, fechadeentrega, estadodelpedido, totaldelpedido, metododepago, paqueteria)
    VALUES('$idcliente', '$idempleado', '$fechap', '$fechaE', '$estadodelpedido', '$totaldelpedido','$metododepago','$paqueteria')";
    $query = mysqli_query($db, $sql);

    if ($query)
        header('Location: ./index.php?status=sukses');
    else
        header('Location: ./index.php?status=gagal');
} else
    die("Akses dilarang...");
