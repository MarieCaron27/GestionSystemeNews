<?php

    /* Fonction liée à la connexion à la base de données : */ 

    function ConnexionBDD() 
    {
        $connexion = mysqli_connect('localhost', 'root', '', 'mesnews');
        
        if(!$connexion)
        {
            die("Nous n'arrivons pas à vous connecter à la base de donéees :" .mysqli_connect_error());
            exit();
        }
        else
        {
            return $connexion;
        }
    }

    /* Fonction qui permet de supprimer les caractères inacceptés : */

    function Securite($donnees1)
    {
        $donnees1=trim($donnees1); //Permet de supprimer des caractères inutiles (espaces, retours à la ligne, etc.)
        $donnees1=stripcslashes($donnees1); //Permet de supprimer des caractères inutiles (guillemets, slaches, etc.)
        $donnees1=strip_tags($donnees1); //Permet d'éviter le traitement et l'affichage des caracrtères HTML

        return ($donnees1);
    }

    /* Fonctions liées à l'ajout d'un utilisateur : */

    function Invalidpseudo($pseudo)
    {
        if(!preg_match("/^[[:print:]]{8,15}$/",$pseudo))
        {
            $resultat=false;
        }
        else
        {
            $resultat=true;
        }

        return ($resultat);
    }

    function Invalidmdp($motdepasse)
    {
        if(!preg_match("/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[&é~\"#'{(-|è`_ç^à@)°+=¤}¨£^$*µù%,?;.:!§<>€]).{8,15}$/",$motdepasse))
        {
            $resultat=false;
        }
        else
        {
            $resultat=true;
        }

        return ($resultat);
    }

    function PasswordMatch($motdepasse,$motdepasseconfirme) 
    {
        if($motdepasse !== $motdepasseconfirme)
        {
            $resultat=false;
        }
        else
        {
            $resultat=true;
        }

        return ($resultat);
    }
        
    function Pseudoexistant($pseudo) 
    {
        $connexion = ConnexionBDD(); 
        $requete = "SELECT * FROM utilisateur WHERE pseudo = ?;"; 
        $statement = mysqli_stmt_init($connexion);

        if(!mysqli_stmt_prepare($statement,$requete))
        { 
            $requete=false;
            return($requete);
        }

        mysqli_stmt_bind_param($statement,"s", $pseudo);
        mysqli_stmt_execute($statement);
        $resultatDonnees=mysqli_stmt_get_result($statement);

        if($row = mysqli_fetch_assoc($resultatDonnees))
        {
            return($row);
        }
        else
        {
            $resultat=false;
            return ($resultat);
        }

        mysqli_stmt_close($statement);
    }

    function CreateUser($pseudo,$motdepasse)
    {
        $connexion = ConnexionBDD();
        $hashedpwd = password_hash($motdepasse, PASSWORD_DEFAULT);
        $requete = "INSERT INTO utilisateur(pseudo,mdp) VALUES ('$pseudo','$hashedpwd');";
        $result = mysqli_query($connexion, $requete);
        
        if(!$result)
        {
            $result=false;
        }
        else
        {
            $result=true; 
        }
        
        return($result);
        mysqli_close($connexion);
    }

    /* Fonctions liées aux news : */

    function TitreNewsexistant($titre) 
    {
        $connexion = ConnexionBDD(); 
        $requete = "SELECT * FROM news WHERE titre = ?;"; 
        $statement = mysqli_stmt_init($connexion);

        if(!mysqli_stmt_prepare($statement,$requete))
        { 
            $requete=false;
            return($requete);
        }

        mysqli_stmt_bind_param($statement,"s", $titre);
        mysqli_stmt_execute($statement);
        $resultatDonnees=mysqli_stmt_get_result($statement);

        if($row = mysqli_fetch_assoc($resultatDonnees))
        {
            return($row);
        }
        else
        {
            $resultat=false;
            return ($resultat);
        }

        mysqli_stmt_close($statement);
    }

    function ExpirationApresPublication($datepublication,$dateExpiration)
    {
        $timestamp1 = strtotime($datepublication);
        $timestamp2 = strtotime($dateExpiration);

        if ($timestamp1===false || $timestamp2===false) 
        {
            $datevalide=false;
        }
        else
        {
            if ($timestamp1 < $timestamp2) 
            {
                $datevalide=true;
            } 
            else                 
            {
                 
                $datevalide=false;
            }

        }

        return($datevalide);
    }

    function CreateNews($pseudo,$titre,$corps,$datepublication,$dateExpiration,$categorie)
    {
        $connexion = ConnexionBDD();
        $requete = "INSERT INTO news(titre,texte,pseudo,publication,expiration,categorie) VALUES ('$titre','$corps','$pseudo','$datepublication','$dateExpiration','$categorie');";
        $result = mysqli_query($connexion, $requete);
        
        if(!$result)
        {
            $result=false;
        }
        else
        {
            $result=true; 
        }
        
        return($result);
        mysqli_close($connexion);
    }

    function AfficheNews($pseudo)
    {
        $connexion=ConnexionBDD();

        $requete="SELECT news.idNews,news.titre,news.texte,news.publication,news.expiration,categorie.nom  
                  FROM news INNER JOIN utilisateur ON (news.pseudo=utilisateur.pseudo)
                  INNER JOIN categorie ON (news.categorie=categorie.id)
                  WHERE news.pseudo='$pseudo'
                  ORDER BY news.titre DESC;";

        $resultat=mysqli_query($connexion,$requete);

        $mesNews = array();
        if($resultat && mysqli_num_rows($resultat) > 0)
        {
            while($line = mysqli_fetch_assoc($resultat)) 
            {
                $mesNews[] = $line;
            }
        }

        return($mesNews);
        mysqli_close($connexion);
    }

    function EditNews($id,$pseudo,$titre,$corps,$datepublication,$dateExpiration,$categorie)
    {
        $connexion = ConnexionBDD();
        $requete = "UPDATE news SET idNews='$id',pseudo='$pseudo',titre='$titre',texte='$corps',publication='$datepublication',
        expiration='$dateExpiration',categorie='$categorie'
        WHERE idNews='$id';";
        $result = mysqli_query($connexion, $requete);
        
        if(!$result)
        {
            $result=false;
        }
        else
        {
            $result=true; 
        }
        
        return($result);
        mysqli_close($connexion);
    }

    function RechercheNews($id)
    {
        $connexion=ConnexionBDD();

        $requete="SELECT * FROM news WHERE idNews='$id';";

        $resultat=mysqli_query($connexion,$requete);

        if($resultat)
        {
            $maNews=mysqli_fetch_assoc($resultat);
        }
        else
        {
            $maNews=false;
        }

        return($maNews);
        mysqli_close($connexion);
    }

    function DeleteNews($id)
    {
        $connexion = ConnexionBDD();
        $requete = "DELETE FROM news
                    WHERE idNews='$id';";
        $result = mysqli_query($connexion, $requete);
        
        if(!$result)
        {
            $result=false;
        }
        else
        {
            $result=true; 
        }
        
        return($result);
        mysqli_close($connexion);
    }

    function AffichageNewsParCat($pseudo,$IDcategorie)
    {
        $connexion=ConnexionBDD();

        $requete="SELECT news.idNews,news.titre,news.texte,news.publication,news.expiration,categorie.nom  
                  FROM news INNER JOIN utilisateur ON (news.pseudo=utilisateur.pseudo)
                  INNER JOIN categorie ON (news.categorie=categorie.id)
                  WHERE news.pseudo='$pseudo' AND categorie.id='$IDcategorie'
                  ORDER BY news.titre DESC;";

        $resultat=mysqli_query($connexion,$requete);

        $mesNews = array();
        if($resultat && mysqli_num_rows($resultat) > 0)
        {
            while($line = mysqli_fetch_assoc($resultat)) 
            {
                $mesNews[] = $line;
            }
        }

        return($mesNews);
        mysqli_close($connexion);
    }

    function AffichageDesCategorie()
    {
        $connexion=ConnexionBDD();

        $requete="SELECT * FROM categorie;";

        $resultat=mysqli_query($connexion,$requete);

        $mesCategories = array();
        if($resultat && mysqli_num_rows($resultat) > 0)
        {
            while($line = mysqli_fetch_assoc($resultat)) 
            {
                $mesCategories[] = $line;
            }
        }

        return($mesCategories);
        mysqli_close($connexion);   
    }