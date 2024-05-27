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
                    <a class="list-group-item list-group-item-action list-group-item-light p-3" href="login.php">Login</a>
                    <a class="list-group-item list-group-item-action list-group-item-light p-3" href="upload.php">Upload</a>
                    <a class="list-group-item list-group-item-action list-group-item-light p-3" href="imag.php">Vezi imagine</a>
                    <a class="list-group-item list-group-item-action list-group-item-light p-3" href="deleteimag.php">Sterge imaginea ta</a>
                    <a class="list-group-item list-group-item-action list-group-item-light p-3" href="xsd.php">x</a>
                    <a class="list-group-item list-group-item-action list-group-item-light p-3" href="matematica.php">Trigonometrie</a>
                    <a class="list-group-item list-group-item-action list-group-item-light p-3" href="toateimaginile.php">Toate imaginile</a>
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
			<h1 class="mt-4">Devino membru!</h1>
            <?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if(isset($_POST['nume']) && isset($_POST['prenume']) && isset($_POST['domiciliu']) && isset($_POST['parola'])) {

        $nume = $_POST['nume'];
        $prenume = $_POST['prenume'];
        $domiciliu = $_POST['domiciliu'];
        $parola = $_POST['parola'];

        $xml = simplexml_load_file('data.xml');

        $infadepti = $xml->infadepti;

        $adept = $infadepti->addChild('adept');
        $adept->addChild('nume', $nume);
        $adept->addChild('prenume', $prenume);
        $adept->addChild('domiciliu', $domiciliu);
        $adept->addChild('parola', $parola);
        $adept->addChild('image', "null");

        $xml->asXML('data.xml');
    } else {
        echo "Toate câmpurile sunt obligatorii!";
    }
}
?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adăugare utilizator</title>
</head>
<body>
    <h2>Adăugare utilizator</h2>
    <form method="post">
        <label for="nume">Nume:</label>
        <input type="text" id="nume" name="nume" required><br><br>
        
        <label for="prenume">Prenume:</label>
        <input type="text" id="prenume" name="prenume" required><br><br>
        
        <label for="domiciliu">Domiciliu:</label>
        <input type="text" id="domiciliu" name="domiciliu" required><br><br>
        
        <label for="parola">Parolă:</label>
        <input type="password" id="parola" name="parola" required><br><br>
        
        <input type="submit" value="Adăugare">
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