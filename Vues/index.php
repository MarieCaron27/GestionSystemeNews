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

            if(isset($_GET["error"]))
            {
                if($_GET["error"] == "deconnexionok")
                {
                    echo '<div class="toutvabien"><p>Au revoir et à très bientôt!</p></div>';
                }
            }
        ?>
        <main>
            <section class="inscription">
                <article id="inscription">
                    <form  method = "POST" id="form1" action="../Controleur/Traitement_form_inscription.php" class="inscription">
                        <h3>M'inscrire</h3>
                        
                        <div class="form_sign_up">
                            <input type="text" name ="pseudo" id="pseudo" placeholder="Entrez votre pseudo" <?php if(isset($_POST['inscrire']) && !empty($_POST['pseudo'])){echo 'value= "' . $_POST['pseudo'] . '"';}?>>
                            <div class="erreur">
                                <?php 
                                    if(!empty($erreur['pseudo']))
                                    {
                                        echo $erreur['pseudo'];
                                    } 
                                ?>
                            </div>                    
                        </div>
            
                        <div class="form_sign_up">
                            <input type="password"  name ="motdepasse" id="motdepasse" class="form_controls" placeholder="Entrez un mot de passe" <?php if(isset($_POST['inscrire']) && !empty($_POST['motdepasse'])){echo 'value= "' . $_POST['motdepasse'] . '"';}?>>
                            <div class="erreur">
                                <?php 
                                    if(!empty($erreur['motdepasse']))
                                    {
                                        echo $erreur['motdepasse'];
                                    } 
                                ?>
                            </div>
                        </div>
                            
                        <div class="form_sign_up">
                            <input type="password"  name ="motdepasseconfirme" id="motdepasseconfirme" placeholder="Confirmez le mot de passe" <?php if(isset($_POST['inscrire']) && !empty($_POST['motdepasseconfirme'])){echo 'value= "' . $_POST['motdepasseconfirme'] . '"';}?>>
                            <div class="erreur">
                                <?php 
                                    if(!empty($erreur['motdepasseconfirme']))
                                    {
                                        echo $erreur['motdepasseconfirme'];
                                    } 
                                ?>
                            </div>
                        </div>

                        <div class="erreur">
                                <?php 
                                    if(!empty($erreur['ajoututilisateur']))
                                    {
                                        echo $erreur['ajoututilisateur'];
                                    } 
                                ?>
                            </div>

                        <div class="form_sign_up">
                            <button type = "submit" name="inscrire" class="form_controls" id="inscrire">Enregistrer mes données</button>
                        </div>

                        <div class="form_sign_up">
                            <p class="link">Vous avez déjà un compte? <a href="../Controleur/Traitement_formulaire_connexion.php">Me connecter</a></p>
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
