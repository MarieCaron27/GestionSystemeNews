<!DOCTYPE html>
<html>
    <head>
        <meta charset=utf-8 />
        <title>Vue_ajout_news</title>
        <link href="../style/style.css" rel="stylesheet" type="text/css"/>
    </head>

    <body>
        <main>
            <section class="modifierNews">
                <article id="modifierNews">
                <form method="POST" id="form4" action="../Controleur/Traitement_modification_news.php?PK=<?php echo urlencode($_GET['PK']); ?>">
                        <h3>Modifier ma news</h3>

                        <div class="form_modif_news">
                            <input type="text" name ="titreNews" id="titreNews" placeholder="Entrez son nouveau titre" <?php if(!empty($titre)){echo 'value= "' . $titre . '"';}?>>
                            <div class="erreur">
                                <?php 
                                    if(!empty($erreur['titreNews']))
                                    {
                                        echo $erreur['titreNews'];
                                    } 
                                ?>
                            </div>                    
                        </div>
                        
                        <div class="form_modif_news">
                            <input type="text" name ="corpsNews" id="corpsNews" placeholder="Entrez le nouveau corps de la news" <?php if(!empty($corps)){echo 'value= "' . $corps . '"';}?>>
                            <div class="erreur">
                                <?php 
                                    if(!empty($erreur['corpsNews']))
                                    {
                                        echo $erreur['corpsNews'];
                                    } 
                                ?>
                            </div>                    
                        </div>
            
                        <div class="form_modif_news">
                            <label for="dateExpiration">Entrez sa nouvelle éventuelle date d'expiration</label>
                            <input type="date"  name ="dateExpiration" id="dateExpiration" class="form_controls" <?php if(!empty($dateExpiration)){echo 'value= "' . $dateExpiration . '"';}?>>
                            <div class="erreur">
                                <?php 
                                    if(!empty($erreur['dateExpiration']))
                                    {
                                        echo $erreur['dateExpiration'];
                                    } 
                                ?>
                            </div>
                        </div>

                        <div class="form_modif_news">     
                            <input type="text" list="categorieNews" name="categorieNews" placeholder="Entrez sa categorie" <?php if(!empty($categorie)){echo 'value= "' . $categorie . '"';}?>>
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
                                if(!empty($erreur['modifNews']))
                                {
                                    echo $erreur['modifNews'];
                                } 
                            ?>
                        </div>

                        <div class="form_modif_news">
                            <button type = "submit" name="modifUneNews" class="form_controls" id="modifUneNews">Modifier ma news</button>
                        </div>
                    </form>
                </article>
            </section>
        </main>
    </body>
</html>
