<!DOCTYPE html>
<html>
<head>
    <title>Administration des Bijoux</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f1f1f1;
        }

        .admin-container {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
            background-color: #ffffff;
            border-radius: 5px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .admin-container h2 {
            text-align: center;
        }

        .admin-container p {
            text-align: center;
        }

        .admin-container a {
            color: #4CAF50;
        }

        .admin-container a:hover {
            text-decoration: underline;
        }

        .admin-container .logout-btn {
            display: block;
            margin: 20px auto;
            width: 100px;
            padding: 10px;
            background-color: #ff0000;
            border: none;
            color: #ffffff;
            font-size: 14px;
            text-align: center;
            text-decoration: none;
            cursor: pointer;
        }

        .admin-container .logout-btn:hover {
            background-color: #cc0000;
        }
    </style>
</head>
<body>
    <?php
    // Inclure le fichier de configuration de la base de données
    require_once 'config.php';

    session_start();

    // Vérifier si l'utilisateur est connecté en tant qu'administrateur
    if (!isset($_SESSION['admin'])) {
        header("Location: admin_login.php");
        exit;
    }

    // Traitement de la déconnexion
    if (isset($_GET['logout'])) {
        session_destroy();
        header("Location: admin_login.php");
        exit;
    }
    ?>

    <div class="admin-container">
        <h2>Page d'Administration</h2>
        <p>Bienvenue, administrateur !</p>
        <a href="admin_login.php?logout=1" class="logout-btn">Se déconnecter</a>
    </div>
</body>
</html>