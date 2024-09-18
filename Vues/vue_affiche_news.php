<!DOCTYPE html>
<html>
    <head>
        <meta charset=utf-8 />
        <title>affichage_des_news</title>
        <link href="../style/style.css" rel="stylesheet" type="text/css"/>
    </head>

    <body>
        <?php 
            require '../Annexes/header_quand_connecter.php';

            if(isset($_GET["error"]))
            {
                if($_GET["error"] == "bienvenue")
                {
                    echo '<div class="toutvabien"><p>Bienvenu(e)' . '&nbsp' . $_SESSION['pseudo'] . '!</p></div>';
                }

                if($_GET["error"] == "ajoutOk")
                {
                    echo '<div class="toutvabien"><p>Votre news a bien été ajoutée!</div>';
                }

                if($_GET["error"] == "editOk")
                {
                    echo '<div class="toutvabien"><p>Votre news a bien été modifiée!</p></div>';
                }

                if($_GET["error"] == "suppressionOk")
                {
                    echo '<div class="toutvabien"><p>Votre news a bien été supprimée!</p></div>';
                }

            }
        ?>
       <main>
            <div class="mesNews">
                <div class="news">
                    <h1>Affichage de mes news</h1>

                    <table>
                        <tr>
                            <th>Son titre</th>
                            <th>Corps de la news</th>
                            <th>Sa date de publication</th>
                            <th>Sa date d'expiration</th>
                            <th>Sa categorie</th>
                            <th>Modifier ma news</th>
                            <th>Supprimer ma news</th>
                        </tr>
                    
                        <?php
                            if(!empty($mesNews))
                            {
                                foreach ($mesNews as $tableau) 
                                { 
                        ?>
                                    
                                    <tr>
                                        <td><?php echo $tableau['titre'] ?></td>
                                        <td><?php echo $tableau['texte'] ?></td>
                                        <td><?php echo $tableau['publication'] ?></td>
                                        <td><?php echo $tableau['expiration'] ?></td>
                                        <td><?php echo $tableau['nom'] ?></td>
                                        <td><?php echo '<a href="../Controleur/Traitement_modification_news.php?PK=' . urlencode($tableau['idNews']) . '">Modification</a>';?></td>
                                        <td><?php echo '<a href="../Controleur/Traitement_suppression_news.php?id=' . urlencode($tableau['idNews']) . '">Suppression</a>';?></td>
                                    </tr>
                                    
                        <?php
                                }
                            }
                        ?>

                    </table> 
                </div>
            </div>
       </main>
        <?php 
            require '../Annexes/footer.php';
        ?> 
    </body>
</html>
