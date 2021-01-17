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
                        <div class="col-lg-8 breadcrumbf">
                            <a href="<?php echo  URLROOT.'/admins/crud';?>">CRUD ></a>
                            <a href="#"> VOIR PROFIL</a> 
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
                                                    <li>Image avatar : <img src="<?php echo URLROOT; ?>/public/images/avatars/<?= $data['user']->avatar?>.png" alt="avatar"></li>
                                                    <br />
                                                    <li>Compte bloqué ?  <?php if($data['user']->blocage == 0){echo ' NON';}else{echo ' OUI';} ?></li>
                                                    <br />
                                                    <br />
                                                    <li><a class="btn btn-success"  href="<?php echo  URLROOT.'/intranets/mail'; ?>">Message Intranet</a></li>
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
                                                    <li><?php
                                                    if($_SESSION['role'] == 'admin'){ echo '<a class="btn btn-warning"  href="'.URLROOT.'/admins/update/'.$data['user']->id.'">Modifier le profil</a>';}
                                                    
                                                     ?></li>
                                                </ul>  
                                            </div>
                                        </div>
                                    </div>

                                    <!-- acc section -->
                                   
                                </div>
                            </div> 
                 
                        <div class="col-lg-4 col-md-4">

                            <div class="sidebarblock">
                            <img src="<?php echo URLROOT; ?>/public/images/cyberpunk.jpg" alt="comic-con">
                            </div>


                        </div>
                    </div>
                </div>



                

            </section>

            <?php
            require APPROOT . '/views/includes/footer.php';
            ?>