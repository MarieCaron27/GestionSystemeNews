<?php

    session_start();
    include '../Modele/fonctions.php';

    if(isset($_POST['ajouterUneNews']))
    {
        $erreur=[
            
            'titreNews'=>'',
            'corpsNews'=>'',
            'dateExpiration'=>'',
            'categorieNews'=>'',
            'ajouteUneNews'=>''
        ];

        date_default_timezone_set('Europe/Paris');
        $titre=Securite($_POST['titreNews']);
        $corps=Securite($_POST['corpsNews']);
        $datepublication=Securite(date('Y-m-d'));
        $dateExpiration=Securite($_POST['dateExpiration']);
        $categorie=Securite($_POST['categorieNews']);
        $pseudo=Securite($_SESSION['pseudo']);
        
        if(empty($titre))
        {
            $erreur['titreNews']='<p>Le titre est un champ obligatoire.</p>';
        }
        else
        {
            $TitreExiste=TitreNewsexistant($titre);

            if($TitreExiste!==false)
            {
                $erreur['titreNews']='<p>Le titre entré existe déjà.</p>';
            }
        }

        if(empty($corps))
        {
            $erreur['corpsNews']='<p>Le corps de la news est un champ obligatoire.</p>';
        }

        if(!empty($dateExpiration))
        {
            $ValidationDate=ExpirationApresPublication($datepublication,$dateExpiration);
            
            if($ValidationDate===false)
            {
                $erreur['dateExpiration']='<p>La date d\'expiration est antérieure à celle de la publication.</p>';
            }
        }

        if(empty($categorie))
        {
            $erreur['categorieNews']='<p>La catégorie est un champ obligatoire.</p>';
        }

        if(!array_filter($erreur))
        {
            $AjoutNews=CreateNews($pseudo,$titre,$corps,$datepublication,$dateExpiration,$categorie);
            
            if($AjoutNews===false)
            {
                $erreur['ajouteUneNews']='<p>Impossible d\'ajouter votre news.';
            }
            else
            {
                header("location: ../Controleur/Traitement_affiche_news.php?error=ajoutOk");
            }

        }
    }

    include '../Vues/vue_ajout_news.php';

