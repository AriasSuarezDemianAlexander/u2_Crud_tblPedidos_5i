<?php include("./config.php"); ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Belajar Dasar CRUD dengan PHP dan MySQL">
    <title>Data Mahasiswa</title>

    <!-- bootstrap cdn -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">

    <!-- material icon -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">

    <!-- font awesome -->
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />

    <link rel="stylesheet" href="./css/style.css">
</head>

<body class="bg-light">
    <!-- navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-white border-bottom" style="position: sticky !important;
    top: 0 !important; z-index : 99999 !important;">
        <div class="container-fluid container">
            <a class="navbar-brand" href="#">Carpinteria</a>
            <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto ">
                    <li class="nav-item">
                        <a class="nav-link active text-sm-start text-center" aria-current="page" href="#">Inicio</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link btn btn-primary ms-md-4 text-white" href="#">Iniciar Sesion</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>


    <div class="container mt-5">
        <!-- form tambah mahasiswa -->
        <div class="card mb-5">
            <!-- <div class="card-header">
                Latihan CRUD PHP & MySQL
            </div> -->
            <!-- tambah data -->
            <div class="card-body">
                <h3 class="card-title">Demian Alexander Arias Suarez</h3>
                <p class="card-text">Ingresar los detalles del Pedido.</p>

                <!-- tampilkan pesan sukses ditambah -->
                <?php if (isset($_GET['status'])) : ?>
                    <?php
                    if ($_GET['status'] == 'sukses')
                        echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
                        <strong>Bien!</strong> Datos agregados exitosamente!
                        <button type='button' class='btn-close' onclick='clicking()' data-bs-dismiss='alert' aria-label='Close'></button>
                      </div>";
                    else
                        echo "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
                        <strong>Ups!</strong> Los datos fallaron en agregarse!
                        <button type='button' class='btn-close' onclick='clicking()' data-bs-dismiss='alert' aria-label='Close'></button>
                      </div>";
                    ?>
                <?php endif; ?>


                <form class="row g-3" action="procesar.php" method="POST">

                    <div class="col-12">
                        <label for="nama" class="form-label">Id_Cliente</label>
                        <input type="text" name="idcliente" class="form-control" placeholder="1" required>
                    </div>
                    <div class="col-md-4">
                        <label for="NIM" class="form-label">Id_Empleado</label>
                        <input type="text" name="idempleado" class="form-control" placeholder="10" required>
                    </div>
                    <div class="col-md-4">
                        <label for="NIM" class="form-label">Fecha del Pedido</label>
                        <input type="text" name="fechadelpedido" class="form-control" placeholder="dd/mm/yy" required>
                    </div>
                    <div class="col-md-4">
                        <label for="NIM" class="form-label">Fecha de Entrega</label>
                        <input type="text" name="fechadeentrega" class="form-control" placeholder="dd/mm/yy" required>
                    </div>
                    <div class="col-md-4">
                        <label for="NIM" class="form-label">Estado del Pedido</label>
                        <input type="text" name="estadodelpedido" class="form-control" placeholder="En Proceso/Entregado" required>
                    </div>
                    <div class="col-md-4">
                        <label for="NIM" class="form-label">Total Del Pedido</label>
                        <input type="text" name="totaldelpedido" class="form-control" placeholder="100$" required>
                    </div>
                    <div class="col-md-4">
                        <label for="NIM" class="form-label">Metodo de Pago</label>
                        <input type="text" name="metododepago" class="form-control" placeholder="Deposito/Tranferencia" required>
                    </div>
                    <div class="col-md-4">
                        <label for="NIM" class="form-label">Paqueteria</label>
                        <input type="text" name="paqueteria" class="form-control" placeholder="Fedex/Mercado Libre/DHL" required>
                    </div>

                    <div class="col-12">
                        <button type="submit" class="btn btn-primary" value="daftar" name="enviar"><i class="fa fa-plus"></i><span class="ms-2">Enviar Datos</span></button>
                    </div>
                </form>
            </div>
        </div>


        <!-- judul tabel -->
        <h5 class="mb-3">Lista</h5>

        <div class="row my-3">
            <div class="col-md-2 mb-3">
                <select class="form-select" aria-label="Default select example">
                    <option selected>Entradas</option>
                    <option value="10">10</option>
                    <option value="25">25</option>
                    <option value="50">50</option>
                    <option value="100">100</option>
                </select>
            </div>
            <div class="col-md-3 ms-auto">
                <div class="input-group mb-3 ms-auto">
                    <input type="text" class="form-control" placeholder="Buscar..." aria-label="cari" aria-describedby="button-addon2">
                    <button class="btn btn-primary" type="button" id="button-addon2"><i class="fa fa-search"></i></button>
                </div>
            </div>
        </div>


        <!-- tampilkan pesan sukses dihapus -->
        <?php if (isset($_GET['hapus'])) : ?>
            <?php
            if ($_GET['hapus'] == 'sukses')
                echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
                        <strong>Sukses!</strong> Data berhasil dihapus!
                        <button type='button' class='btn-close' onclick='clicking()' data-bs-dismiss='alert' aria-label='Close'></button>
                      </div>";
            else
                echo "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
                        <strong>Ups!</strong> Data gagal dihapus!
                        <button type='button' class='btn-close' onclick='clicking()' data-bs-dismiss='alert' aria-label='Close'></button>
                      </div>";
            ?>
        <?php endif; ?>

        <!-- tampilkan pesan sukses di edit -->
        <?php if (isset($_GET['update'])) : ?>
            <?php
            if ($_GET['update'] == 'sukses')
                echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
                        <strong>Logrado!</strong> Los datos han sido editados!
                        <button type='button' class='btn-close' onclick='clicking()' data-bs-dismiss='alert' aria-label='Close'></button>
                      </div>";
            else
                echo "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
                        <strong>Ups!</strong> Hubo un error al editar!
                        <button type='button' class='btn-close' onclick='clicking()' data-bs-dismiss='alert' aria-label='Close'></button>
                      </div>";
            ?>
        <?php endif; ?>

        <!-- tabel -->
        <div class="table-responsive mb-5 card">
            <?php
            echo "<div class='card-body'>";

            echo "<table class='table table-hover align-middle bg-white'>";
            echo "<thead>";
            echo "<tr>";
            echo "<th scope='col' class='text-center'>ID_Pedido</th>";
            echo "<th scope='col'>Id_Cliente</th>";
            echo "<th scope='col'>Id_Empleado</th>";
            echo "<th scope='col'>Fecha del Pedido</th>";
            echo "<th scope='col'>Fecha De entrega</th>";
            echo "<th scope='col'>Estado del Pedido</th>";
            echo "<th scope='col'>Total Del Pedido</th>";
            echo "<th scope='col'>Metodo De Pago</th>";
            echo "<th scope='col'>Paqueteria</th>";
            echo "<th scope='col' class='text-center'>Accion</th>";
            echo "</tr>";
            echo "</thead>";
            echo "<tbody>";



            $batas = 10;
            $halaman = isset($_GET['halaman']) ? (int)$_GET['halaman'] : 1;
            $halaman_awal = ($halaman > 1) ? ($halaman * $batas) - $batas : 0;

            $previous = $halaman - 1;
            $next = $halaman + 1;

            $data = mysqli_query($db, "SELECT * FROM pedidos");
            $jumlah_data = mysqli_num_rows($data);
            $total_halaman = ceil($jumlah_data / $batas);

            $data_mhs = mysqli_query($db, "SELECT * FROM pedidos LIMIT $halaman_awal, $batas");
            $no = $halaman_awal + 1;

            // $sql = "SELECT * FROM mahasiswa";
            // $query = mysqli_query($db, $sql);




            while ($mahasiswa = mysqli_fetch_array($data_mhs)) {
                echo "<tr>";
                echo "<td style='display:none'>" . $mahasiswa['id'] . "</td>";
                echo "<td class='text-center'>" . $no++ . "</td>";
                echo "<td>" . $mahasiswa['id_cliente'] . "</td>";
                echo "<td>" . $mahasiswa['id_empleado'] . "</td>";
                echo "<td>" . $mahasiswa['fechadepedido'] . "</td>";
                echo "<td>" . $mahasiswa['fechadeentrega'] . "</td>";
                echo "<td>" . $mahasiswa['estadodelpedido'] . "</td>";
                echo "<td>" . $mahasiswa['totaldelpedido'] . "</td>";
                echo "<td>" . $mahasiswa['metododepago'] . "</td>";
                echo "<td>" . $mahasiswa['paqueteria'] . "</td>";


                echo "<td class='text-center'>";

                echo "<button type='button' class='btn btn-primary editButton pad m-1'><span class='material-icons align-middle'>edit</span></button>";

                // tombol hapus
                echo "
                            <!-- Button trigger modal -->
                            <button type='button' class='btn btn-danger deleteButton pad m-1'><span class='material-icons align-middle'>delete</span></button>";
                echo "</td>";

                echo "</tr>";
            }

            echo "</tbody>";
            echo "</table>";
            if ($jumlah_data == 0) {
                echo "<p class='text-center'>No hay datos ingresados.</p>";
            } else {
                echo "<p>Total $jumlah_data registros.</p>";
            }

            echo "</div>";
            ?>
        </div>

        <!-- pagination -->
        <nav class="mt-5 mb-5">
            <ul class="pagination justify-content-center">
                <li class="page-item">
                    <a class="page-link" <?php echo ($halaman > 1) ? "href='?halaman=$previous'" : "" ?>><i class="fa fa-chevron-left"></i></a>
                </li>
                <?php
                for ($x = 1; $x <= $total_halaman; $x++) {
                ?>
                    <li class="page-item"><a class="page-link" href="?halaman=<?php echo $x ?>"><?php echo $x; ?></a></li>
                <?php
                }
                ?>
                <li class="page-item">
                    <a class="page-link" <?php echo ($halaman < $total_halaman) ? "href='?halaman=$next'" : "" ?>><i class="fa fa-chevron-right"></i></a>
                </li>
            </ul>
        </nav>

        <!-- Modal Edit-->
        <div class='modal fade' style="top:58px !important;" id='editModal' tabindex='-1' aria-labelledby='exampleModalLabel' aria-hidden='true'>
            <div class='modal-dialog' style="margin-bottom:100px !important;">
                <div class='modal-content'>
                    <div class='modal-header'>
                        <h5 class='modal-title' id='exampleModalLabel'>Editar datos</h5>
                        <button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>
                    </div>

                    <?php
                    $sql = "SELECT * FROM pedidos";
                    $query = mysqli_query($db, $sql);
                    $mahasiswa = mysqli_fetch_array($query);
                    ?>

                    <form action='edit.php' method='POST'>
                        <div class='modal-body text-start'>
                            <input type='hidden' name='edit_id' id='edit_id'>

                            <div class="col-12 mb-3">
                                <label for="edit_nama" class="form-label">Id_Cliente</label>
                                <input type="text" name="edit_idcliente" id="edit_idcliente" class="form-control" placeholder="Steve Jobs" required>
                            </div>

                            <div class="col-12 mb-3">
                                <label for="edit_nama" class="form-label">Id_Empleado</label>
                                <input type="text" name="edit_idempleado" id="edit_idempleado" class="form-control" placeholder="Steve Jobs" required>
                            </div>

                            <div class="col-12 mb-3">
                                <label for="edit_nama" class="form-label">Fecha del Pedido</label>
                                <input type="text" name="edit_fechap" id="edit_fechap" class="form-control" placeholder="Steve Jobs" required>
                            </div>

                            <div class="col-12 mb-3">
                                <label for="edit_nama" class="form-label">Fecha De Entrega</label>
                                <input type="text" name="edit_fechaEn" id="edit_fechaEn" class="form-control" placeholder="Steve Jobs" required>
                            </div>

                            <div class="col-12 mb-3">
                                <label for="edit_nama" class="form-label">Estado del Pedido</label>
                                <input type="text" name="edit_estadoP" id="edit_estadoP" class="form-control" placeholder="Steve Jobs" required>
                            </div>

                            <div class="col-12 mb-3">
                                <label for="edit_nama" class="form-label">Total del Pedido</label>
                                <input type="text" name="edit_totalP" id="edit_totalP" class="form-control" placeholder="Steve Jobs" required>
                            </div>

                            <div class="col-12 mb-3">
                                <label for="edit_nama" class="form-label">Metodo de Pago</label>
                                <input type="text" name="edit_metodoP" id="edit_metodoP" class="form-control" placeholder="Steve Jobs" required>
                            </div>

                            <div class="col-12 mb-3">
                                <label for="edit_nama" class="form-label">Paqueteria</label>
                                <input type="text" name="edit_paque" id="edit_paque" class="form-control" placeholder="Steve Jobs" required>
                            </div>


                        </div>

                        <div class='modal-footer'>
                            <button type='submit' name='edit_data' class='btn btn-primary'>Editar</button>
                        </div>

                    </form>


                </div>
            </div>
        </div>


        <!-- Modal Delete-->
        <div class='modal fade' style="top:58px !important;" id='deleteModal' tabindex='-1' aria-labelledby='exampleModalLabel' aria-hidden='true'>
            <div class='modal-dialog'>
                <div class='modal-content'>
                    <div class='modal-header'>
                        <h5 class='modal-title' id='exampleModalLabel'>Confirmacion</h5>
                        <button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>
                    </div>


                    <form action='hapus.php' method='POST'>

                        <div class='modal-body text-start'>
                            <input type='hidden' name='delete_id' id='delete_id'>
                            <p>Desea borrar los datos?</p>
                        </div>

                        <div class='modal-footer'>
                            <button type='submit' name='deletedata' class='btn btn-primary'>Borrar</button>
                        </div>

                    </form>


                </div>
            </div>
        </div>


        <!-- tutup container -->
    </div>


    <!-- Jquery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <!-- Javascript bule with popper bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>

    <!-- sweet alert -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

    <!-- edit function -->
    <script>
        $(document).ready(function() {
            $('.editButton').on('click', function() {
                $('#editModal').modal('show');

                $tr = $(this).closest('tr');

                var data = $tr.children("td").map(function() {
                    return $(this).text();
                }).get();

                console.log(data);
                $('#edit_id').val(data[0]);
                // gak dipake, karena cuma increment number
                // $('#no').val(data[1]);
                $('#edit_idcliente').val(data[2]);
                $('#edit_idempleado').val(data[3]);
                $('#edit_fechap').val(data[4]);
                $('#edit_fechaEn').val(data[5]);
                $('#edit_estadoP').val(data[6]);
                $('#edit_totalP').val(data[7]);
                $('edit_metodoP').val(data[8]);
                $('edit_paque').val(data[9]);
            });
        });
    </script>

    <!-- delete function -->
    <script>
        $(document).ready(function() {
            $('.deleteButton').on('click', function() {
                $('#deleteModal').modal('show');

                $tr = $(this).closest('tr');

                var data = $tr.children("td").map(function() {
                    return $(this).text();
                }).get();

                console.log(data);
                $('#delete_id').val(data[0]);
            });
        });
    </script>

    <script>
        function clicking() {
            window.location.href = './index.php';
        }
    </script>
</body>

</html>