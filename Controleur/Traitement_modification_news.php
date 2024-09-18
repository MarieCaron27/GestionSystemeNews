<?php
    session_start();
    include '../Modele/fonctions.php';

    $erreur=[
        'titreNews'=>'',
        'corpsNews'=>'',
        'dateExpiration'=>'',
        'categorieNews'=>'',
        'modifNews'=>''
    ];

    if(!isset($_POST['modifUneNews']))
    {
        $maNews=RechercheNews($_GET['PK']);
                    
        $id=$_GET['PK'];
        $titre=Securite($maNews['titre']);
        $corps=Securite($maNews['texte']);
        $datepublication=Securite($maNews['publication']);
        $dateExpiration=Securite($maNews['expiration']);
        $categorie=Securite($maNews['categorie']);
        $pseudo=Securite($maNews['pseudo']);
    }
    else
    {
        if(isset($_POST['modifUneNews']))
        {
            date_default_timezone_set('Europe/Paris');
            $id=$_GET['PK'];
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
                $ModifNews=EditNews($id,$pseudo,$titre,$corps,$datepublication,$dateExpiration,$categorie);

                if($ModifNews===false)
                {
                    $erreur['modifNews']='<p>Nous n\'arrivons pas à modifier votre news.</p>';
                }
                else
                {
                    header("location: ../Controleur/Traitement_affiche_news.php?error=editOk");
                }
            }
        }
    }

    include '../Vues/vue_modif_news.php';