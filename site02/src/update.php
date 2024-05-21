<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Adeziune secta</title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="css/styles.css" rel="stylesheet" />
    </head>
    <body>
        <div class="d-flex" id="wrapper">
            <!-- Sidebar-->
            <div class="border-end bg-white" id="sidebar-wrapper">
                <div class="sidebar-heading border-bottom bg-light">Start Bootstrap</div>
                <div class="list-group list-group-flush">
                <a class="list-group-item list-group-item-action list-group-item-light p-3" href="index.php">Pagina principala</a>
                    <a class="list-group-item list-group-item-action list-group-item-light p-3" href="lista.php">Vezi membri</a>
                    <a class="list-group-item list-group-item-action list-group-item-light p-3" href="insert.php">Alatura-te</a>
                    <a class="list-group-item list-group-item-action list-group-item-light p-3" href="update.php">Schimbare date</a>
                    <a class="list-group-item list-group-item-action list-group-item-light p-3" href="delete.php">Sterge membri, dar te rog sa nu</a>
                    <a class="list-group-item list-group-item-action list-group-item-light p-3" href="login.php">Login</a>
                    <a class="list-group-item list-group-item-action list-group-item-light p-3" href="upload.php">Upload</a>
                    <a class="list-group-item list-group-item-action list-group-item-light p-3" href="imag.php">Vezi imagine</a>
                </div>
            </div>
            <!-- Page content wrapper-->
            <div id="page-content-wrapper">
                <!-- Top navigation-->
                <nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom">
                    <div class="container-fluid">
                        <button class="btn btn-primary" id="sidebarToggle">Toggle Menu</button>
                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                            <ul class="navbar-nav ms-auto mt-2 mt-lg-0">
                                <li class="nav-item active"><a class="nav-link" href="#!">Home</a></li>
                                <li class="nav-item"><a class="nav-link" href="#!">Link</a></li>
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Dropdown</a>
                                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                        <a class="dropdown-item" href="#!">Action</a>
                                        <a class="dropdown-item" href="#!">Another action</a>
                                        <div class="dropdown-divider"></div>
                                        <a class="dropdown-item" href="#!">Something else here</a>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </nav>
                <!-- Page content-->
                <div class="container-fluid">
			<h1 class="mt-4">Actualizare date</h1>
                   <?php
require_once 'connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $numeNou = $_POST['nume'];
    $prenumeNou = $_POST['prenume'];
    $domiciliuNou = $_POST['domiciliu'];
    $parolaNoua = $_POST['parola_noua'];

    $numeUtilizator = $_POST['nume_utilizator'];
    $prenumeUtilizator = $_POST['prenume_utilizator'];
    $parolaUtilizator = $_POST['parola_utilizator'];

    $filter = [
        'nume' => $numeUtilizator,
        'prenume' => $prenumeUtilizator,
        'parola' => $parolaUtilizator
    ];

    $update = ['$set' => [
        'nume' => $numeNou,
        'prenume' => $prenumeNou,
        'domiciliu' => $domiciliuNou,
        'parola' => $parolaNoua
    ]];

    $bulk = new MongoDB\Driver\BulkWrite;
    $bulk->update($filter, $update);

    $client->executeBulkWrite('adepti.infadepti', $bulk);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Actualizare utilizator</title>
</head>
<body>
    <h2>Actualizare utilizator</h2>
    <form method="post" action="update.php">
        <label for="nume_utilizator">Nume utilizator:</label>
        <input type="text" id="nume_utilizator" name="nume_utilizator" required><br><br>

        <label for="prenume_utilizator">Prenume utilizator:</label>
        <input type="text" id="prenume_utilizator" name="prenume_utilizator" required><br><br>

        <label for="parola_utilizator">Parola utilizator:</label>
        <input type="password" id="parola_utilizator" name="parola_utilizator" required><br><br>

        <label for="nume">Nume nou:</label>
        <input type="text" id="nume" name="nume" required><br><br>

        <label for="prenume">Prenume nou:</label>
        <input type="text" id="prenume" name="prenume" required><br><br>

        <label for="domiciliu">Domiciliu nou:</label>
        <input type="text" id="domiciliu" name="domiciliu" required><br><br>

        <label for="parola_noua">Parola nouă:</label>
        <input type="password" id="parola_noua" name="parola_noua" required><br><br>

        <input type="submit" value="Actualizare">
    </form>
</body>
                </div>
            </div>
        </div>
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="js/scripts.js"></script>
    </body>
</html>



