<?php
// Validacion para mostrar pagina solo cuando se este logueado
session_start();

if (!isset($_SERVER['HTTP_AUTHORIZATION']) || $_SERVER['HTTP_AUTHORIZATION'] != 'Bearer ' . $_SESSION['token']) {
    print_r($_SESSION['token']);
    header('Location: /BURG_SpA_API/Public/page/login');
    exit;
}
if (isset($_GET['logout'])) {
    session_destroy();
    header('Location: /BURG_SpA_API/Public/page/login');
    exit;
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</head>
<body>
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
            <a class="navbar-brand">BURG SpA</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item" id="homeNav"><a class="nav-link"  href="../page/home">Pantalla Principal</a></li>
                <li class="nav-item" id="profileNav"><a class="nav-link"  href="../page/profile">Mi perfil</a></li>
                <li class="nav-item" id="logout"><a class="nav-link"  href="?logout">Cerrar sesion</a></li>
            </ul>
            </div>
        </div>
    </nav>
    <?php echo $content ?>
    
    <script src="<?= URL_PATH ?>/Assets/js/userLogout.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
</body>
</html>