<?php require_once('header.php') ?>

<?php
//do login
if(isset($_POST['username']) && isset($_POST['password'])){
    $username = $_POST['username'];
    $password = $_POST['password'];

    //check if user exists
    $query = $bdd->prepare('SELECT * FROM admin WHERE username = ?');
    $query->execute(array($username));
    $user = $query->fetch();

    if($user){
        //check if password is correct
        if(password_verify($password, $user['password'])){
            //set session
            $_SESSION['user'] = $user;
            header('Location: index.php');
            exit();
        }else{
            echo 'Mot de passe incorrect';
        }
    }else{
        echo 'Utilisateur inexistant';
    }
}
?>

<!-- login form -->
<div class="login">
    <h1>Connexion</h1>
    <form action="login.php" method="post">
        <input type="text" name="username" placeholder="Nom d'utilisateur">
        <input type="password" name="password" placeholder="Mot de passe">
        <input type="submit" value="Se connecter">
    </form>
</div>