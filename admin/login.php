<!DOCTYPE html>
<html>
<head>
    <title>Connexion Administrateur</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f1f1f1;
        }

        .login-container {
            max-width: 400px;
            margin: 0 auto;
            padding: 20px;
            background-color: #ffffff;
            border-radius: 5px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .login-container h2 {
            text-align: center;
        }

        .login-container .form-group {
            margin-bottom: 15px;
        }

        .login-container label {
            display: block;
            font-weight: bold;
            margin-bottom: 5px;
        }

        .login-container input[type="text"],
        .login-container input[type="password"] {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 3px;
            font-size: 14px;
        }

        .login-container input[type="submit"] {
            width: 100%;
            padding: 10px;
            background-color: #4CAF50;
            border: none;
            color: #ffffff;
            font-size: 16px;
            cursor: pointer;
        }

        .login-container input[type="submit"]:hover {
            background-color: #45a049;
        }

        .login-container .error-message {
            color: #ff0000;
            margin-top: 10px;
        }
    </style>
</head>
<body>
    <?php
    // Inclure le fichier de configuration de la base de données
    require_once 'config.php';

    session_start();

    // Vérifier si l'utilisateur est déjà connecté
    if (isset($_SESSION['admin'])) {
        header("Location: index.php");
        exit;
    }

    // Vérifier si le formulaire de connexion a été soumis
    if (isset($_POST['login'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];

        // Vérifier les informations d'identification dans la base de données
        $stmt = $pdo->prepare("SELECT * FROM admins WHERE username = :username");
        $stmt->bindParam(':username', $username);
        $stmt->execute();
        $admin = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($admin && password_verify($password, $admin['password'])) {
            // Authentification réussie, définir la session admin
            $_SESSION['admin'] = true;
            header("Location: admin.php");
            exit;
        } else {
            $errorMessage = "Identifiant ou mot de passe incorrect";
        }
    }
    ?>

    <div class="login-container">
        <h2>Connexion Administrateur</h2>
        <form method="POST" action="">
            <div class="form-group">
                <label for="username">Identifiant:</label>
                <input type="text" id="username" name="username" required>
            </div>
            <div class="form-group">
                <label for="password">Mot de passe:</label>
                <input type="password" id="password" name="password" required>
            </div>
            <input type="submit" name="login" value="Se connecter">
            <?php if (isset($errorMessage)) { ?>
                <p class="error-message"><?php echo $errorMessage; ?></p>
            <?php } ?>
        </form>
    </div>
</body>
</html>