<!DOCTYPE html>
<html>
    <head>
        <meta charset=utf-8 />
        <title>Vue_inscription</title>
        <link href="../style/style.css" rel="stylesheet" type="text/css"/>
    </head>

    <body>
        <?php 
            require '../Annexes/header_quand_connecter.php';
        ?>
        <main>
            <section class="ajoutNews">
                <article id="ajoutNews">
                    <form  method = "POST" id="form3" action="../Controleur/Traitement_ajout_news.php" class="ajoutNews">
                        <h3>Ajouter une news</h3>

                        <div class="form_ajout_news">
                            <input type="text" name ="titreNews" id="titreNews" placeholder="Entrez son titre" <?php if(isset($_POST['ajouterUneNews']) && !empty($_POST['titreNews'])){echo 'value= "' . $_POST['titreNews'] . '"';}?>>
                            <div class="erreur">
                                <?php 
                                    if(!empty($erreur['titreNews']))
                                    {
                                        echo $erreur['titreNews'];
                                    } 
                                ?>
                            </div>                    
                        </div>
                        
                        <div class="form_ajout_news">
                            <input type="text" name ="corpsNews" id="corpsNews" placeholder="Entrez le corps de la news" <?php if(isset($_POST['ajouterUneNews']) && !empty($_POST['corpsNews'])){echo 'value= "' . $_POST['corpsNews'] . '"';}?>>
                            <div class="erreur">
                                <?php 
                                    if(!empty($erreur['corpsNews']))
                                    {
                                        echo $erreur['corpsNews'];
                                    } 
                                ?>
                            </div>                    
                        </div>
            
                        <div class="form_ajout_news">
                            <label for="dateExpiration">Entrez son éventuelle date d'expiration</label>
                            <input type="date"  name ="dateExpiration" id="dateExpiration" class="form_controls" <?php if(isset($_POST['ajouterUneNews']) && !empty($_POST['dateExpiration'])){echo 'value= "' . $_POST['dateExpiration'] . '"';}?>>
                            <div class="erreur">
                                <?php 
                                    if(!empty($erreur['dateExpiration']))
                                    {
                                        echo $erreur['dateExpiration'];
                                    } 
                                ?>
                            </div>
                        </div>

                        <div class="form_ajout_news">     
                            <input type="text" list="categorieNews" name="categorieNews" placeholder="Entrez sa categorie" <?php if(isset($_POST['ajouterUneNews']) && !empty($_POST['categorieNews'])){echo 'value= "' . $_POST['categorieNews'] . '"';}?>>
                                <datalist id="categorieNews">
                                    <option value="1">Enfant</option>
                                    <option value="2">Adulte</option>
                                    <option value="4">Sénior</option>
                                    <option value="6">Adolescent</option>
                                </datalist>                            
                            </input>
                            <div class="erreur">
                                <?php 
                                    if(!empty($erreur['categorieNews']))
                                    {
                                        echo $erreur['categorieNews'];
                                    } 
                                ?>
                            </div>
                        </div>

                        <div class="erreur">
                                <?php 
                                    if(!empty($erreur['ajouteUneNews']))
                                    {
                                        echo $erreur['ajouteUneNews'];
                                    } 
                                ?>
                            </div>

                        <div class="form_ajout_news">
                            <button type = "submit" name="ajouterUneNews" class="form_controls" id="ajouterUneNews">Ajouter ma news</button>
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
