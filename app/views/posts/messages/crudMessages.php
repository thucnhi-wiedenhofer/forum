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
                    <?php if($_SESSION['role']=='admin'){echo'<a href="'.URLROOT.'/admins/crud">CRUD ></a> <a href="'.URLROOT.'/topics/listTopics">TOPICS ></a>'; }?> 
                        <a href="#">CONVERSATIONS</a> 
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
                                <li><a class="btn btn-secondary"  href="<?php echo  URLROOT.'/admins/blocked'; ?>">Blocked</a></li>
                                </br>
                                <li><a class="btn btn-warning" href="<?php echo URLROOT.'/topics/create'; ?>">Ajout topic</a></li>
                                </br>
                                <li><a class="btn btn-primary" href="<?php echo URLROOT.'/topics/listTopics'; ?>">Crud topic</a></li>
                                </br>
                                <li><p class="h6">Messages: click sur le titre de la conversation</p></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-10 col-md-10">
                        <h5>Messages Administration</h5>
                            <!-- POST -->
                        <div class="post">

                            <table class="table table-hover">
                                <thead>
                                    <tr class="table-active">
                                    <th scope="col">ID</th>                                   
                                    <th scope="col">Login</th>
                                    <th scope="col">Texte</th>
                                    <th scope="col">Date</th>
                                    <th scope="col">Likes</th>
                                    <th scope="col">Dislikes</th>
                                    <th scope="col">visible</th>
                                    <th scope="col">Signalement</th>
                                    <th scope="col">Modifier</th>
                                    
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                
                                    foreach($data['messages'] as $message){
                                    if($message->role =='administrateur'){
                                    echo "<tr>";//affiche en boucle les données de la table
                                    echo "<td>".$message->id."</td>";                                   
                                    echo "<td>".$message->login."</td>";
                                    echo "<td>".$message->texte."</td>";
                                    echo "<td>".$message->publication."</td>";
                                    echo "<td>".$message->liked."</td>";
                                    echo "<td>".$message->disliked."</td>";
                                    echo "<td>".$message->visible."</td>";
                                    echo "<td>".$message->signalement."</td>";    
                                
                                    echo '<td><a  href="'.URLROOT .'/messages/modify/'.$message->id.'">
                                    Modifier</a></td>';
                                    echo "</tr>";
                                    }   
                                
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                        </br>

                        <h5>Messages Modérateurs</h5>
                        <!-- POST -->
                        <div class="post">

                            <table class="table table-hover">
                                <thead>
                                    <tr class="table-active">
                                    <th scope="col">ID</th>                                   
                                    <th scope="col">Login</th>
                                    <th scope="col">Texte</th>
                                    <th scope="col">Date</th>
                                    <th scope="col">Likes</th>
                                    <th scope="col">Dislikes</th>
                                    <th scope="col">visible</th>
                                    <th scope="col">Signalement</th>
                                    <th scope="col">Modifier</th>
                                    
                                    </tr>
                                </thead>
                                <tbody>
                                <?php
                                foreach($data['messages'] as $message){
                                if($message->role =='moderateur'){
                                    echo "<tr>";//affiche en boucle les données de la table
                                    echo "<td>".$message->id."</td>";                                   
                                    echo "<td>".$message->login."</td>";
                                    echo "<td>".$message->texte."</td>";
                                    echo "<td>".$message->publication."</td>";
                                    echo "<td>".$message->liked."</td>";
                                    echo "<td>".$message->disliked."</td>";
                                    echo "<td>".$message->visible."</td>";
                                    echo "<td>".$message->signalement."</td>";                               
                                    echo '<td><a  href="'.URLROOT .'/messages/modify/'.$message->id.'">
                                    Modifier</a></td>';
                                    echo "</tr>";
                                    }   
                                
                                }
                                ?>  
                                </tbody>
                            </table>
                        </div>
                        </br>

                        <h5>Messages Membres</h5>
                        <!-- POST -->
                        <div class="post">

                            <table class="table table-hover">
                                <thead>
                                    <tr class="table-active">
                                    <th scope="col">ID</th>                                   
                                    <th scope="col">Login</th>
                                    <th scope="col">Texte</th>
                                    <th scope="col">Date</th>
                                    <th scope="col">Likes</th>
                                    <th scope="col">Dislikes</th>
                                    <th scope="col">visible</th>
                                    <th scope="col">Signalement</th>
                                    <th scope="col">Modifier</th>
                                    
                                    </tr>
                                </thead>
                                <tbody>
                                <?php
                                foreach($data['messages'] as $message){
                                if($message->role =='membre'){
                                    echo "<tr>";//affiche en boucle les données de la table
                                    echo "<td>".$message->id."</td>";                                   
                                    echo "<td>".$message->login."</td>";
                                    echo "<td>".$message->texte."</td>";
                                    echo "<td>".$message->publication."</td>";
                                    echo "<td>".$message->liked."</td>";
                                    echo "<td>".$message->disliked."</td>";
                                    echo "<td>".$message->visible."</td>";
                                    echo "<td>".$message->signalement."</td>";    
                                
                                    echo '<td><a  href="'.URLROOT .'/messages/modify/'.$message->id.'">
                                    Modifier</a></td>';
                                    echo "</tr>";
                                    }   
                                
                                }
                                ?>  
                                </tbody>
                            </table>
                        </div>
                        </br>



                            
                    </div>
                </div>
            </div>
        </section>

            <?php
            require APPROOT . '/views/includes/footer.php';
            ?>