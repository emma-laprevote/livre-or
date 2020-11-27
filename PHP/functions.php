<?php

function insertInscription () {

    $bdd = new PDO('mysql:dbname=livreor;host=localhost', 'root', '');
    $msg = "";

    if($_POST['password'] == $_POST['confirm_password']) {

        $login = $_POST['login'];
        $pass = $_POST['password'];
        $confpass = $_POST['confirm_password'];

        $login = htmlspecialchars(trim($login));
        $pass = htmlspecialchars(trim($pass));
        $confpass = htmlspecialchars(trim($confpass));

        $count = $bdd->prepare("SELECT COUNT(*) AS nbr FROM utilisateurs WHERE login =?");
        $count->execute(array($login));
        $req  = $count->fetch(PDO::FETCH_ASSOC);

        if($req['nbr'] == 0 && !empty($login) && !empty($pass) && !empty($confpass)) {

            $cryptedpass = password_hash($pass, PASSWORD_BCRYPT);//Cryptage du mot de passe 
        
            //requete afin d'insérer les valeurs du formulaire dans ma base donnée, utilisatiin de bindvalue + sécurité
            $request = $bdd->prepare('INSERT INTO utilisateurs (login, password) VALUES(:login, :password)');
            $request->bindValue(':login', $login, PDO::PARAM_STR);
            $request->bindValue(':password', $cryptedpass, PDO::PARAM_STR);
            $request->execute()or die(print_r($request->errorInfo()));

            header('Location: ../pages/connexion.php');
        }
    
        elseif ($req['nbr'] == 1) {

            $msg = "* Ce nom d'utilisateur est déjà utilisé";
        } 

    } else {

            $msg = "* Les mots de passe sont différents";
        }

    return($msg);
}


function connectLogin () {

    $bdd = new PDO('mysql:dbname=livreor;host=localhost', 'root', '');
    $msg = "";

    $login = $_POST['login']; 
    $pass = $_POST['password'];

        $login = htmlspecialchars(trim($login));
        $pass = htmlspecialchars(trim($pass));

        $count = $bdd->prepare("SELECT COUNT(*) AS nbr FROM utilisateurs WHERE login =?");
        $count->execute(array($login));
        $req  = $count->fetch(PDO::FETCH_ASSOC);  

        if($req['nbr'] == 1) {

            $validPass = $bdd->prepare("SELECT password FROM utilisateurs WHERE login='$login'");
            $validPass->execute();
            $result = $validPass->fetch(PDO::FETCH_OBJ);

            $cryptedpass = $result->password;

            $checkPass = password_verify($pass, $cryptedpass);

            if($checkPass == true ) {

                $validPass = $bdd->prepare("SELECT id, login FROM utilisateurs WHERE login='$login'");
                $validPass->execute();
                $get = $validPass->fetch(PDO::FETCH_OBJ);

                $_SESSION['login'] = $get->login;
                $_SESSION['id'] = $get->id;

              header('Location: ../index.php');
            }
            else
            {
                $msg = "* Le nom d'utilisateur ou le mot de passe est incorrect";
            }
        } else {

            $msg = " * Nom d'utilisateur ou mot de passe incorrecte";
        }

        return($msg);
}

                        
function changeUser () {

    $bdd = new PDO('mysql:dbname=livreor;host=localhost', 'root', '');
    $msg = "";

        if($_POST['password'] == $_POST['confirm_password']) {

            $login = $_POST['login'];
            $pass = $_POST['password'];
            $confpass = $_POST['confirm_password'];
    
            $login = htmlspecialchars(trim($login));
            $pass = htmlspecialchars(trim($pass));
            $confpass = htmlspecialchars(trim($confpass));
    
            $count = $bdd->prepare("SELECT COUNT(*) AS nbr FROM utilisateurs WHERE login =?");
            $count->execute(array($login));
            $req  = $count->fetch(PDO::FETCH_ASSOC);
    
            if($req['nbr'] == 0 && !empty($login) && !empty($pass) && !empty($confpass)) {
    
                $cryptedpass = password_hash($pass, PASSWORD_BCRYPT);//Cryptage du mot de passe 
            
                //requete afin d'insérer les valeurs du formulaire dans ma base donnée, utilisatiin de bindvalue + sécurité
                $sth = $bdd->prepare('UPDATE utilisateurs SET login= :login, password= :password WHERE login = "'.$_SESSION['login'].'" ');
                $sth->bindValue(':login', $login, PDO::PARAM_STR);
                $sth->bindValue(':password', $cryptedpass, PDO::PARAM_STR);
                $sth->execute()or die(print_r($sth->errorInfo()));;
               
                header('Location: ../pages/connexion.php');
            }
        
            elseif ($req['nbr'] == 1) {
    
                $msg = "* Ce nom d'utilisateur est déjà utilisé";
            } 
    
        } else {
    
                $msg = "* Les mots de passe sont différents";
            }
    
        return($msg);

}

function addComment () {

    $bdd = new PDO('mysql:dbname=livreor;host=localhost', 'root', '');
    $msg = "";
    $id = $_SESSION['id'];

    if (!empty($_POST['comment'])) {

    $date = date('Y/m/d H:i:s');
    $comment = htmlspecialchars($_POST['comment']);

    $addComment = $bdd->prepare('INSERT INTO commentaires (commentaire, id_utilisateur, date) VALUES(:commentaire, :id_utilisateur, :date)');
    $addComment->bindValue(':commentaire', $comment, PDO::PARAM_STR);
    $addComment->bindValue(':id_utilisateur', $id, PDO::PARAM_STR);
    $addComment->bindValue(':date', $date, PDO::PARAM_STR);
    $addComment->execute()or die(print_r($addComment->errorInfo()));

    header('Location: ../pages/livre-or.php');
    $msg = "Votre message a bien été enregistré.";

    } 
    
    return $msg;
}


