<?php
   require ROOT . '/views/includes/head.php';
?>
 <body>

        <div class="container-fluid">

        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12">
            <?php
       require ROOT . '/views/includes/navigation.php';
    ?>
            <div class="tp-banner-container">
                <p class="h1">Scy~Fy</p> 
                <p class="h5">Le forum de la culture pop</p>
            </div>
            </div>
        </div>
            
    
		<section class="content">                
            <div class="container">
            <br />
                <h2>Règles et guide du forum </h2>
                <div class="row">
                           
                    <div class="col-lg-8 col-md-8">                        
                    <div class="blocktxt">
                            <h5>Pour passer des moments amicaux et conviviaux sur le forum,
                             chacun se doit de respecter les règles de bonne conduite que 
                             vous trouverez ici.</h5>
                        </div>         
                        <div class="post-rules">
                            <p>Ce qu'on attend de vous:</p>

                            <ul>
                                <li>Politesse et savoir vivre.</li>
                                <li>Respecter le droit d’auteur, le droit à l’image et la vie privée .</li> 
                                <li>Ne jamais communiquer vos données personnelles.</li>
                                <li>Ne pas demander une réponse en privé.</li>
                                <li>Ne pas vous énerver, ne pas abuser de l’écriture en majuscule.</li>
                            </ul>

                            <p>Ce qui est interdit sur le forum : </p>
                            <ul>
                                <li>Avoir plusieurs comptes avec une même adresse email. </li>
                                <li>Les propos déplacés, le bullying.</li>
                                <li>La publicité, les spams, les contenus illicites.</li>
                                <li>Les messages de type invitation /rencontre. </li>
                            </ul>


                            <p>Le rôle des modérateurs</p>
                            <p>Le modérateur a pour rôle que tout soit conforme aux lois en vigueur, donc il est là pour faire respecter les règles précédentes.</p>
                            
                            <p>Il va donc :</p>
                            <p>Supprimer les messages qui ne respectent pas les règles de bonne conduite énoncées précédemment.</p> 

                            <p>Lorsque l'un de vos messages est supprimé, vous recevez un message privé pour vous expliquer la raison de la suppression.</p>
                            <p> Si plusieurs de vos messages sont supprimés pour la même raison, nous serons dans l'obligation de bloquer votre compte.</p>

                            <p>Bannir les profils qui nuisent au bon fonctionnement du forum.</p>

                            <p>Répondre à vos signalements et toutes demandes particulières.</p>
                        </div>
                    </div>
                        
                    <div class="col-lg-4 col-md-4">

                            <!-- -->
                            <div class="sidebarblock">
                            <img src="<?php echo WWW_ROOT; ?>public/images/blackmirror.jpg" alt="black">
                            </div>


                        </div>

        </section>
<?php
require ROOT . '/views/includes/footer.php';
?>