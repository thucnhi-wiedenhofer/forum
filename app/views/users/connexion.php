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
                            <a href="#">CONNEXION</a> 
                        </div>
                    </div>
                </div>


                <div class="container">
                    <div class="row">
                        <div class="col-lg-8 col-md-8">

                            <!-- POST -->
                            <div class="post">
                                <form class="form newtopic" action="<?php echo URLROOT; ?>/users/connexion" method ="POST">
                                    <div class="postinfotop">
                                        <h2>Se connecter </h2>
                                    </div>

                                    <!-- acc section -->
                                    <div class="accsection">
                                        <div class="acccap">
                                            <div class="userinfo pull-left">&nbsp;</div>
                                            <div class="posttext pull-left"><h3>Champs requis</h3></div>
                                            <div class="clearfix"></div>
                                        </div>
                                        <div class="topwrap">
                                        <div class="userinfo pull-left">&nbsp;</div>
                                            <div class="posttext pull-left">
                                                <div class="row">
                                                    <div class="col-lg-6 col-md-6">
                                                        <input type="text" placeholder="Login" name="login" class="form-control" required />
                                                        <span class="invalidFeedback">
                                                        <?php echo $data['loginError']; ?>
                                                        </span>
                                                    </div>
                                                    <div class="col-lg-6 col-md-6">
                                                        <input type="password" placeholder="Password" class="form-control"  name="password" required/>
                                                    </div>
                                                </div>                                                
                                               
                                            </div>
                                            <div class="clearfix"></div>
                                        </div>  
                                    </div><!-- acc section END -->
                                    
                                                                                                                                     

                                    <div class="postinfobot">
                                                                           
                                        <div class="pull-right postreply">
                                            
                                            <div class="pull-left"><input type="submit" class="btn btn-primary" name="submit" value="se connecter"></div>
                                            <div class="clearfix"></div>
                                        </div>


                                        <div class="clearfix"></div>
                                    </div>
                                </form>
                            </div><!-- POST -->
                        

                        </div>
                  
                        <div class="col-lg-4 col-md-4">

                            
                            <!-- -->
                            <div class="sidebarblock">
                            <img src="<?php echo URLROOT; ?>/public/images/cyberpunk.jpg" alt="cyber">
                            </div>


                        </div>
                    </div>
                </div>



                

            </section>

            <?php
            require APPROOT . '/views/includes/footer.php';
            ?>