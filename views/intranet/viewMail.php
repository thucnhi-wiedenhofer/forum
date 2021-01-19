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
                            <a href="<?php echo  WWW_ROOT.'intranets/listMail/'.$_SESSION['id'] ;?>">INTRANET></a>
                            <a href="#"> VOIR MAIL</a> 
                        </div>
                    </div>
                </div>


                <div class="container">
                        <div class="row">
                            <div class="col-lg-8 col-md-8">

                                <!-- POST -->
                                <div class="post">
                                
                                    <div class="postinfotop">
                                       
                                        <div class="row">
                                            <div class="col-lg-4 col-md-6">
                                                <ul class="cats">
                                                <h5>Le mail de <?= $data['mail']->login ?></h5>
                                                <br />
                                                    <li>Id : <?= $data['mail']->id_mail ?></li>
                                                    <br />
                                                    <li>Objet : <?= $data['mail']->objet ?></li>
                                                    <br />
                                                    <li>Date d'envoi : <?= $data['mail']->envoi ?></li>
                                                   
                                                </ul>
                                            </div>
                                            <div class="col-lg-8 col-md-6">
                                                <ul class="cats">
                                                <li><h5>Role: <?= $data['mail']->role ?></h5></li>
                                                <li>Texte : <?= $data['mail']->texte ?></li>
                                                <br />
                                                <li><?php if($data['mail']->signalement == 1){echo 'Signalement: Oui';}?></li>
                                                    
                                                    
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