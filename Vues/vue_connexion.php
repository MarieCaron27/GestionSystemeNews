<!DOCTYPE html>
<html>
    <head>
        <meta charset=utf-8 />
        <title>Vue_inscription</title>
        <link href="../style/style.css" rel="stylesheet" type="text/css"/>
    </head>

    <body>
        <?php 
            require '../Annexes/header.php';
        ?>
        <main>
            <section class="connexion">
                <article id="connexion">
                    <form  method = "POST" id="form2" action="../Controleur/Traitement_form_connexion.php" class="connexion">
                        <h3>M'inscrire</h3>
                        
                        <div class="form_login">
                            <input type="text" name ="pseudo" id="pseudo" placeholder="Entrez votre pseudo" <?php if(isset($_POST['seconnecter']) && !empty($_POST['pseudo'])){echo 'value= "' . $_POST['pseudo'] . '"';}?>>
                            <div class="erreur">
                                <?php 
                                    if(!empty($erreur['pseudo']))
                                    {
                                        echo $erreur['pseudo'];
                                    } 
                                ?>
                            </div>                    
                        </div>
            
                        <div class="form_login">
                            <input type="password"  name ="motdepasse" id="motdepasse" class="form_controls" placeholder="Entrez un mot de passe" <?php if(isset($_POST['seconnecter']) && !empty($_POST['motdepasse'])){echo 'value= "' . $_POST['motdepasse'] . '"';}?>>
                            <div class="erreur">
                                <?php 
                                    if(!empty($erreur['motdepasse']))
                                    {
                                        echo $erreur['motdepasse'];
                                    } 
                                ?>
                            </div>
                        </div>

                        <div class="erreur">
                                <?php 
                                    if(!empty($erreur['connexionutilisateur']))
                                    {
                                        echo $erreur['connexionutilisateur'];
                                    } 
                                ?>
                            </div>

                        <div class="form_login">
                            <button type = "submit" name="seconnecter" class="form_controls" id="seconnecter">Me connecter</button>
                        </div>
                    </form>
                </article>
            </section>
        </main>
            
        <?php 
            require '../Annexes/footer.php';
        ?>

    </body>
</html>
