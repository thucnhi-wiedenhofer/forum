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
                        <div class="col-lg-8 breadcrumbf">
                            <a href="<?php echo  WWW_ROOT.'posts/home';?>">HOME></a>
                            <a href="#"> VOIR PROFIL MEMBRE</a> 
                        </div>
                    </div>
                </div>


                <div class="container">
                        <div class="row">
                            <div class="col-lg-8 col-md-8">

                                <!-- POST -->
                                <div class="post">
                                
                                    <div class="postinfotop">
                                        
                                        
                                        <h2>Le profil de <?= $data['user']->login ?></h2>
                                        <h3>Role: <?= $data['user']->role ?></h3>
                                            
                                      
                                        <div class="row">
                                            <div class="col-lg-6 col-md-6">
                                                <ul class="cats">
                                                    <br />
                                                    <li>Login : <?= $data['user']->login ?></li>
                                                    <br />
                                                    <li>Intranet : <?= $data['user']->intranet ?></li>
                                                    <br />
                                                    <li>Image avatar : <img src="<?php echo WWW_ROOT; ?>public/images/avatars/<?= $data['user']->avatar?>.png" alt="avatar"></li>
                                                    <br />
                                                    <li>Compte bloqué ?  <?php if($data['user']->blocage == 0){echo ' NON';}else{echo ' OUI';} ?></li>
                                                    <br />
                                                    <br />
                                                    <li><a class="btn btn-success"  href="<?php echo  WWW_ROOT.'intranets/mail/'.$data['user']->id; ?>">Message Intranet</a></li>
                                                </ul>
                                            </div>
                                            <div class="col-lg-6 col-md-6">
                                                <ul class="cats">
                                                <br />
                                                    <li>Date création compte: <?php $date=$data['user']->creation; $date_fr = implode('-',array_reverse  (explode('-',$date)));  echo $date_fr; ?></li>
                                                    <br />
                                                    <li>Age : <?php $dateNaissance= $data['user']->naissance; $aujourdhui=date('Y-m-d'); $age=date_diff(date_create($dateNaissance), date_create($aujourdhui)); echo $age->format('%y'); ?> ans</li>
                                                    <br />
                                                    <li>Sexe: <?= $data['user']->genre ?></li>
                                                    <br />
                                                    <li>Date déblocage  : <?php $date= $data['user']->periode_blocage; $date_fr = implode('-',array_reverse  (explode('-',$date)));  echo $date_fr; ?></li>
                                                    <br />
                                                    <br />
                                                    
                                                </ul>  
                                            </div>
                                        </div>
                                    </div>

                                    <!-- acc section -->
                                   
                                </div>
                            </div> 
                 
                        <div class="col-lg-4 col-md-4">

                            <div class="sidebarblock">
                            <img src="<?php echo WWW_ROOT; ?>public/images/cyberpunk.jpg" alt="comic-con">
                            </div>


                        </div>
                    </div>
                </div>



                

            </section>

            <?php
            require ROOT . '/views/includes/footer.php';
            ?>