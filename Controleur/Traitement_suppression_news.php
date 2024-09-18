<?php
    session_start();
    include '../Modele/fonctions.php';
    
    $id=$_GET['id'];

    $erreur = [            
        'suppression'=>''
    ];

    if(!array_filter($erreur))
    {
        $supprnews=DeleteNews($id);

        if($supprnews===false)
        {
            $erreur['suppression']='<p>Nous n\'arrivons pas à supprimer votre news.</p>';
        }
        else
        {                
            header("location: ../Controleur/Traitement_affiche_news.php?error=suppressionOk");
        }
    }

    include '../Vues/index.php';