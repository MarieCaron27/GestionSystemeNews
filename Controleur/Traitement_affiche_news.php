<?php

    session_start();
    include '../Modele/fonctions.php';

    $pseudo=Securite($_SESSION['pseudo']);

    if(isset($_POST))
    {
        $IDcategorie=$_POST['categorie'];
        $mesNews=AffichageNewsParCat($pseudo,$IDcategorie);
    }
    else
    {
        $mesNews=AfficheNews($pseudo);
    }

    include '../Vues/vue_affiche_news.php';