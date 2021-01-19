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
                            <a href="<?php echo  WWW_ROOT.'intranets/listMail/'.$_SESSION['id'];?>">LISTE MAILS ></a>
                            <a href="#">CREER MAIL</a> 
                        </div>
                    </div>
                </div>

                <div class="container">
                    <div class="row">
                        <div class="col-lg-6 col-md-6">
                            <!-- POST -->
                            <div class="post">
                                <form class="form newtopic" action="<?php echo WWW_ROOT; ?>intranets/create" method ="POST">
                                    <div class="postinfotop">
                                        <h2>Ecrire un mail</h2>
                                    </div>

                                    <!-- acc section -->
                                    <div class="accsection">
                                            <div class="acccap">                                        
                                            
                                                <div class="userinfo pull-left">&nbsp;</div>
                                                <div class="posttext pull-left">
                                                        
                                                    <div class="col-lg-6 col-md-6">
                                                        <label for="objet">Objet:</label>
                                                        <input type="text" id="objet"  name="objet" class="form-control" />                                                                                                                                                                   
                                                    
                                                        <label for="text">Texte:</label>
                                                        <textarea id="texte" name="texte" rows="3" cols="33"></textarea>                                                                                                               
                                                    </div>
                                                        

                                                        
                                                    <div class="col-lg-6 col-md-6">
                                                        <label for="destinataire">Destinataire: <?php echo $data['destinataire']->login; ?></label>
                                                        <input type="hidden" id="destinataire" value="<?php echo $data['destinataire']->id; ?>" name="id_destinataire" class="form-control" />                                                                
                                                    </div>                                        
                                                     

                                                </div>
                                                    <div class="clearfix"></div>
                                             
                                            </div><!-- acc section END -->
                                   
                                            <div class="postinfobot"></br>   
                                                <div class="pull-right postreply">                                         
                                                    <div class="pull-left"><input type="submit" class="btn btn-primary" name="envoyer"></div>
                                                    <div class="clearfix"></div>
                                                </div>
                                                <div class="clearfix"></div>
                                            </div>
                                        
                                    </div>
                                </form>
                            </div>
                        </div>
                    
                           

                       
                  
                        <div class="col-lg-4 col-md-4">
                           <div class="sidebarblock">
                            <img class="img-resp" src="<?php echo WWW_ROOT; ?>public/images/blackmirror.jpg" alt="black mirror">
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <?php
            require ROOT . '/views/includes/footer.php';
            ?>