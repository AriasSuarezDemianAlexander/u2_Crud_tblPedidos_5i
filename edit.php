<?php
include("./config.php");

// cek apa tombol daftar udah di klik blom
if (isset($_POST['edit_data'])) {
    // ambil data dari form
    $id = $_POST['edit_id'];
    $idcliente = $_POST['edit_idcliente'];
    $idempleado = $_POST['edit_idempleado'];
    $fechap = $_POST['edit_fechap'];
    $fechaE = $_POST['edit_fechaEn'];
    $estadop = $_POST['edit_estadoP'];
    $totalpe = $_POST['edit_totalP'];
    $metodop = $_POST['edit_metodoP'];
    $paque = $_POST['edit_paque'];



    // query
    $sql = "UPDATE pedidos SET id_cliente='$idcliente', id_empleado='$idempleado', fechadepedido='$fechap', fechadeentrega='$fechaE', estadodelpedido='$estadop', totaldelpedido='$totalpe', metododepago='$metodop', paqueteria='$paque' WHERE id = '$id'";
    $query = mysqli_query($db, $sql);

    // cek apa query berhasil disimpan?
    if ($query)
        header('Location: ./index.php?update=sukses');
    else
        header('Location: ./index.php?update=gagal');
} else
    die("Akses dilarang...");
