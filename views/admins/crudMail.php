<?php
   require ROOT . '/views/includes/head.php';
?>
 <body class="newaccountpage">

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
                    <div class="row">
                        <div class="col-lg-12 breadcrumbf">
                            <a href="#">CRUD MAIL</a> 
                        </div>
                    </div>
                </div>


                <div class="container">
                    <div class="row">
                        <div class="col-lg-2 col-md-2">
                            <div class="post">
                                <div class="postinfotop">
                                    <h3>Fonctions</h3>
                                    <ul class="cats">
                                    <li><a class="btn btn-secondary"  href="<?php echo  WWW_ROOT.'admins/blocked'; ?>">Blocked</a></li>
                                    <br />
                                    <li><a class="btn btn-warning" href="<?php echo WWW_ROOT.'topics/create'; ?>">Ajout topic</a></li>
                                    <br />
                                    <li><a class="btn btn-info" href="<?php echo WWW_ROOT.'topics/listTopics'; ?>">Topic</a></li>
                                    <br />
                                    <li><a class="btn btn-success" href="<?php echo WWW_ROOT.'intranets/crudMail'; ?>">Intranet</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-10 col-md-10">
                               <h5>INTRANET</h5>
                            <!-- POST -->
                            <div class="post">

                <table class="table table-hover">
                    <thead>
                        <tr class="table-active">
                        <th scope="col">ID</th>
                        <th scope="col">Objet</th>
                        <th scope="col">Texte</th>
                        <th scope="col">Expediteur</th>
                         <th scope="col">Destinataire</th>
                        <th scope="col">Envoi</th>
                        <th scope="col">Signalement</th>
                        <th scope="col">Contacter Exp</th>

                        
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                        
                    foreach($data['crud'] as $mail){
                       
                            echo "<tr>";//affiche en boucle les données de la table
                            echo "<td>".$mail->id_mail."</td>";
                            echo "<td>".$mail->objet."</td>";
                            echo "<td>".$mail->texte."</td>";
                            echo "<td>".$mail->id_expediteur."</td>";
                            echo "<td>".$mail->id_destinataire."</td>";
                            echo "<td>".$mail->envoi."</td>";
                            echo "<td>".$mail->signalement."</td>";
                           
                            echo '<td><a  href="'.WWW_ROOT .'admins/vueProfil/'.$mail->id_expediteur.'">
                             Contacter</a></td>';
                             echo "</tr>";
                            }   
                           
                       
                    
                    ?>  
                    </tbody>
                    </table>


                            </div><!-- POST -->
                        </div>
                    </div>
                </div>



                

            </section>

            <?php
            require ROOT . '/views/includes/footer.php';
            ?>