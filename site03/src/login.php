<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $xml = simplexml_load_file('data.xml');

    $userFound = false;
    foreach ($xml->infadepti->adept as $adept) {
        if ($adept->nume == $username && $adept->parola == $password) {
            $_SESSION['user'] = $username;
            $userFound = true;
            setcookie("user", $username, time() + 3000, "/"); 
            header("Location: index.php");
            exit();
        } 
    }

    if (!$userFound) {
        $error = "Nume de utilizator sau parolă incorecte!";
    }
}
?>



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
			<h1 class="mt-4">Login</h1>
            <form method="post" action="login.php">
                <label for="username">Nume:</label>
                <input type="text" id="username" name="username" required><br><br>
                
                <label for="password">Parola:</label>
                <input type="password" id="password" name="password" required><br><br>
                
                <input type="submit" value="Login">
            </form>
            <?php
            if (isset($error)) {
                echo "<p style='color:red;'>$error</p>";
            }
            ?>
        </div>
    </div>
</div>
<!-- Bootstrap core JS-->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
<!-- Core theme JS-->
<script src="js/scripts.js"></script>
</body>
</html>
