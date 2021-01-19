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
                            <a href="#">MODIFIER SON PROFIL ADMINISTRATEUR</a> 
                        </div>
                    </div>
                </div>


                <div class="container">
                    <div class="row">
                        <div class="col-lg-8 col-md-8">

                            <!-- POST -->
                            <div class="post">
                                <form class="form newtopic" action="<?php echo WWW_ROOT; ?>admins/profil" method ="POST">
                                    <div class="postinfotop">
                                        <h2>Modifier votre profil</h2>
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
                                                    
                                                        <input type="text" value="<?php if(!empty($_SESSION['id'])){echo $_SESSION['login'];} ?>" name="login" class="form-control" disabled/>
                                                        
                                                    </div>
                                                    <div class="col-lg-6 col-md-6">
                                                        <input type="email"  value="<?php if(!empty($_SESSION['id'])){echo $_SESSION['email'];} ?>" name="email" class="form-control" />
                                                        <span class="invalidFeedback">
                                                        <?php echo $data['emailError']; ?>
                                                        </span>
                                                    </div>
                                                </div>
                                                
                                                <div class="row">
                                                    <div class="col-lg-6 col-md-6">
                                                        <input type="password" placeholder="Password" class="form-control"  name="password" required/>
                                                    </div>
                                                    <div class="col-lg-6 col-md-6">
                                                        <input type="password" placeholder="Confirmer Password" class="form-control"  name="confirmPassword" required/>
                                                        <span class="invalidFeedback">
                                                        <?php echo $data['confirmPasswordError']; ?>
                                                        </span>
                                                    </div>
                                                </div>

                                            </div>
                                            <div class="clearfix"></div>
                                        </div>  
                                    </div><!-- acc section END -->
                                                                
                                                     
                                    <div class="postinfobot"></br>
                                       
                                        <div class="pull-right postreply">
                                            <div class="pull-left smile"><a href="#"><i class="fa fa-smile-o"></i></a></div>
                                            <div class="pull-left"><input type="submit" class="btn btn-primary" name="modifier" value="Modifier"></div>
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
                            <img src="<?php echo WWW_ROOT; ?>public/images/sandiego.jpg" alt="comic-con">
                            </div>


                        </div>
                    </div>
                </div>
              

            </section>

            <?php
            require ROOT . '/views/includes/footer.php';
            ?>