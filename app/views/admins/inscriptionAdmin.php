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
                            <a href="#">INSCRIPTION ADMINISTRATION</a> 
                        </div>
                    </div>
                </div>


                <div class="container">
                    <div class="row">
                        <div class="col-lg-8 col-md-8">

                            <!-- POST -->
                            <div class="post">
                                <form class="form newtopic" action="<?php echo URLROOT; ?>/admins/inscription" method ="POST">
                                    <div class="postinfotop">
                                        <h2>Inscrire un administrateur</h2>
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
                                                        <input type="email" placeholder="Email" name="email" class="form-control" required/>
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



                                    <!-- acc section -->
                                    <div class="accsection privacy">
                                    <span class="invalidFeedback">
                                    <?php echo $data['fieldsEmptyError']; ?>
                                    </span>
                                        <div class="acccap">
                                            <div class="userinfo pull-left">&nbsp;</div>
                                            <div class="posttext pull-left"><h3>Avatar</h3></div>
                                            <div class="clearfix"></div>
                                        </div>
                                        <div class="topwrap">
                                            <div class="userinfo pull-left">&nbsp;</div>
                                            <div class="posttext pull-left">

                                                <div class="row newtopcheckbox">
                                                    <div class="col-lg-12 col-md-12">
                                                        
                                                   
                                                        <div class="row">
                                                            <div class="col-lg-2 col-md-3">
                                                                <div class="checkbox">
                                                                    <label>
                                                                    <img src="<?php echo URLROOT; ?>/public/images/avatars/admin.png" alt="admin">
                                                                        <input type="radio" id="av1" name="avatar" value="admin" checked/> 
                                                                    </label>
                                                                </div>
                                                            </div>
                                                            
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="clearfix"></div>
                                        </div>  
                                    </div><!-- acc section END -->

                                 
                                    
                                    <div class="postinfobot">
                                       
                                        <input type="hidden" name="role" value="admin" />
                                                                                
                                        <div class="pull-right postreply">
                                            <div class="pull-left smile"><a href="#"><i class="fa fa-smile-o"></i></a></div>
                                            <div class="pull-left"><input type="submit" class="btn btn-primary" name="enregistrer" value="enregistrer"></div>
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
                                <h3>Categories</h3>
                                <div class="divline"></div>
                                <div class="blocktxt">
                                    <ul class="cats">
                                        <li><a href="#">Trading for Money <span class="badge pull-right">20</span></a></li>
                                        <li><a href="#">Vault Keys Giveway <span class="badge pull-right">10</span></a></li>
                                        <li><a href="#">Misc Guns Locations <span class="badge pull-right">50</span></a></li>
                                        <li><a href="#">Looking for Players <span class="badge pull-right">36</span></a></li>
                                        <li><a href="#">Stupid Bugs &amp; Solves <span class="badge pull-right">41</span></a></li>
                                        <li><a href="#">Video &amp; Audio Drivers <span class="badge pull-right">11</span></a></li>
                                        <li><a href="#">2K Official Forums <span class="badge pull-right">5</span></a></li>
                                    </ul>
                                </div>
                            </div>

                            <!-- -->
                            <div class="sidebarblock">
                               
                            </div>

                            <!-- -->
                            <div class="sidebarblock">
                            <img src="<?php echo URLROOT; ?>/public/images/sandiego.jpg" alt="comic-con">
                            </div>


                        </div>
                    </div>
                </div>



                

            </section>

            <?php
            require APPROOT . '/views/includes/footer.php';
            ?>