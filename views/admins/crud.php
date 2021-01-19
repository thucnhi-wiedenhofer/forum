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
                            <a href="#">CRUD ADMINISTRATION</a> 
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
                               <h5>ADMINISTRATION ET MODERATION</h5>
                            <!-- POST -->
                            <div class="post">

                <table class="table table-hover">
                    <thead>
                        <tr class="table-active">
                        <th scope="col">ID</th>
                        <th scope="col">Login</th>
                        <th scope="col">Email</th>
                        <th scope="col">Role</th>
                         <th scope="col">Intranet</th>
                        <th scope="col">Voir profil</th>
                        
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                        
                    foreach($data['users'] as $user){
                        if($user->role =='admin'){
                            echo "<tr>";//affiche en boucle les données de la table
                            echo "<td>".$user->id."</td>";
                            echo "<td>".$user->login."</td>";
                            echo "<td>".$user->email."</td>";
                            echo "<td>".$user->role."</td>";
                              echo "<td>".$user->intranet."</td>";
                           
                            echo '<td><a  href="'.WWW_ROOT .'admins/vueProfil/'.$user->id.'">
                             Voir</a></td>';
                             echo "</tr>";
                            }   
                           
                        }
                        foreach($data['users'] as $user){
                        if($user->role =='moderateur'){
                            echo "<tr>";//affiche en boucle les données de la table
                            echo "<td>".$user->id."</td>";
                            echo "<td>".$user->login."</td>";
                            echo "<td>".$user->email."</td>";
                            echo "<td>".$user->role."</td>";
                              echo "<td>".$user->intranet."</td>";
                           
                            echo '<td><a  href="'.WWW_ROOT .'admins/vueProfil/'.$user->id.'">
                             Voir</a></td>';
                             echo "</tr>";
                            }   
                           
                        }
                         ?>  
                        </tbody>
                        </table>
                        </div>
                        </br>
                         <h5>MEMBRES</h5>
                         <div class="post">
                         <table class="table table-hover">
                        <thead>
                        <tr class="table-active">
                        <th scope="col">ID</th>
                        <th scope="col">Login</th>
                        <th scope="col">Email</th>
                        <th scope="col">Role</th>
                         <th scope="col">Intranet</th>
                        <th scope="col">Blocage</th>
                        <th scope="col">Voir profil</th>
                        
                        
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                         foreach($data['users'] as $user){
                        if($user->role =='membre'){
                            echo "<tr>";//affiche en boucle les données de la table
                            echo "<td>".$user->id."</td>";
                            echo "<td>".$user->login."</td>";
                            echo "<td>".$user->email."</td>";
                            echo "<td>".$user->role."</td>";
                              echo "<td>".$user->intranet."</td>";
                             echo "<td>";
                             if($user->blocage==0){echo 'NON';}else{echo 'OUI';}
                             echo "</td>";

                           
                            echo '<td><a class="btn orange" href="'.WWW_ROOT .'admins/vueProfil/'.$user->id.'">
                             Voir</a></td>';
                             echo "</tr>";
                            }   
                           
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