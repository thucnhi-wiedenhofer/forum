<?php
   require APPROOT . '/views/includes/head.php';
?>
 <body class="newaccountpage">

    <div class="container-fluid">

        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12">
            <?php
       require APPROOT . '/views/includes/navigation.php';
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
                    
                        <a href="#">INTRANET</a> 
                    </div>
                </div>
            </div>


            <div class="container">
                
                    <div class="col-lg-12 col-md-12">
                        <h5>Messages Reçus</h5>
                            <!-- POST -->
                        <div class="post">

                            <table class="table table-hover">
                                <thead>
                                    <tr class="table-active">
                                    <th scope="col">ID</th>                                   
                                    <th scope="col">Login</th>
                                    <th scope="col">Objet</th>
                                    <th scope="col">Texte</th>
                                    <th scope="col">Date</th>
                                    <th scope="col">Signalement</th>
                                    <th scope="col">Répondre</th>
                                    <th scope="col">Delete</th>
                                    
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                
                                    foreach($data['receipt'] as $receipt){
                                   
                                    echo "<tr>";//affiche en boucle les données de la table
                                    echo "<td>".$receipt->id_mail."</td>";                                   
                                    echo "<td>".$receipt->login."</td>";
                                    echo "<td>".$receipt->objet."</td>";
                                    echo '<td><a  href="'.URLROOT .'/intranets/viewMail/'.$receipt->id_mail.'">
                                    Voir</a></td>';
                                    echo '<td>'.$receipt->envoi.'</td>';
                                    echo '<td><a  href="'.URLROOT .'/intranets/signalement/'.$receipt->id_mail.'">
                                    Signaler</a></td>';
                                    echo '<td><a  href="'.URLROOT .'/intranets/mail/'.$receipt->id_expediteur.'">
                                    Répondre</a></td>';                                  
                                    echo '<td><a  href="'.URLROOT .'/intranets/delete/'.$receipt->id_mail.'">
                                    Delete</a></td>';
                                    echo "</tr>";
                                    }   
                                
                                    
                                    ?>
                                </tbody>
                            </table>
                        </div>
                        </br>

                        <h5>Messages Envoyés</h5>
                        <!-- POST -->
                        <div class="post">

                            <table class="table table-hover">
                                <thead>
                                <tr class="table-active">
                                    <th scope="col">ID</th>                                   
                                    <th scope="col">Login</th>
                                    <th scope="col">Objet</th>
                                    <th scope="col">Texte</th>
                                    <th scope="col">Date</th>
                                    <th scope="col">Delete</th>    
                                    </tr>
                                    
                                </thead>
                                <tbody>
                                <?php
                                foreach($data['sent'] as $sent){
                             
                                    echo "<tr>";//affiche en boucle les données de la table
                                    echo "<td>".$sent->id_mail."</td>";                                   
                                    echo "<td>".$sent->login."</td>";
                                    echo "<td>".$sent->objet."</td>";
                                    echo "<td>".$sent->texte."</td>";
                                    echo "<td>".$sent->envoi."</td>";
                                    echo '<td><a  href="'.URLROOT .'/intranets/delete/'.$sent->id_mail.'">
                                    Delete</a></td>';
                                    echo "</tr>";
                                    }   
                                
                                
                                ?>  
                                </tbody>
                            </table>
                        </div>
                    <br />   
                            
                    </div>
                </div>
            
        </section>

            <?php
            require APPROOT . '/views/includes/footer.php';
            ?>