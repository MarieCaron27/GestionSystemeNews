<?php

use Random\Engine\Secure;

    include '../Modele/fonctions.php';

    if(isset($_POST['inscrire']))
    {
        $erreur=[
            'pseudo'=>'',
            'motdepasse'=>'',
            'motdepasseconfirme'=>'',
            'ajoututilisateur'=>''
        ];

        $pseudo=Securite($_POST['pseudo']);
        $motdepasse=Securite($_POST['motdepasse']);
        $motdepasseconfirme=Securite($_POST['motdepasseconfirme']);

        if(empty($pseudo))
        {
            $erreur['pseudo']='<p>Le pseudo est un champ obligatoire.</p>';
        }
        else
        {
            $ValidationPseudo=Invalidpseudo($pseudo);

            if($ValidationPseudo===false)
            {
                $erreur['pseudo']='<p>Le pseudo entré est invalide.</p>';
            }
            else
            {
                $PseudoExistant=Pseudoexistant($pseudo);

                if($PseudoExistant!==false)
                {
                    $erreur['pseudo']='<p>Le pseudo entré existe déjà.</p>';
                }
            }
        }

        if(empty($motdepasse))
        {
            $erreur['motdepasse']='<p>Le mot de passe est un champ obligatoire.</p>';
        }
        else
        {
            $ValidationMDP=Invalidmdp($motdepasse);

            if($ValidationMDP===false)
            {
                $erreur['motdepasse']='<p>Le mot de passe entré est invalide.</p>';
            }
        }

        if(empty($motdepasseconfirme))
        {
            $erreur['motdepasseconfirme']='<p>La confirmation du mot de passe est un champ obligatoire.</p>';
        }
        else
        {
            $ConfirmationMDP=PasswordMatch($motdepasse,$motdepasseconfirme);

            if($ConfirmationMDP===false)
            {
                $erreur['motdepasseconfirme']='<p>La confirmation du mot de passe ne correspond pas avec le mot de passe entré.</p>';
            }
        }

        if(!array_filter($erreur))
        {
            $AjoutUtilisateur=CreateUser($pseudo,$motdepasse);

            if($AjoutUtilisateur===false)
            {
                $erreur['ajoututilisateur']='<p>Nous n\'arrivons pas à vous ajouter.</p>';
            }
            else
            {
                if(!isset($_SESSION)) 
                { 
                    session_start(); 
                } 
                
                $_SESSION['pseudo']=$pseudo;
                header("location: ../Controleur/Traitement_affiche_news.php.php?error=bienvenue");
            }
        }
    }


    include '../Vues/index.php';