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
                            <a href="#">MODIFIER CE PROFIL</a> 
                        </div>
                    </div>
                </div>


                <div class="container">
                    <div class="row">
                        <div class="col-lg-8 col-md-8">

                            <!-- POST -->
                            <div class="post">
                                <form class="form newtopic" action="<?php echo URLROOT; ?>/admins/updateProfil" method ="POST">
                                    <div class="postinfotop">
                                        <h2>Modifier le profil</h2>
                                    </div>

                                    <!-- acc section -->
                                    <div class="accsection">
                                        <div class="acccap">
                                        <div class="userinfo pull-left">&nbsp;</div>
                                            <div class="posttext pull-left"><h3>Role et Blocage</h3></div>
                                            <div class="clearfix"></div>
                                        </div>
                                        <div class="topwrap">
                                        <div class="userinfo pull-left">&nbsp;</div>
                                            <div class="posttext pull-left">
                                                <div class="row">
                                                    <div class="col-lg-6 col-md-6">

                                                    <label for="role">Rôle:</label>
                                                        <select name="role" id="role">
                                                            <option value="<?php echo $data['user']->role; ?>" selected><?php echo $data['user']->role; ?></option>
                                                            <option value="membre">membre</option>
                                                            <option value="moderateur">moderateur</option>
                                                        </select>                                                                                                                                                                  
                                                    </div>
                                                    <div class="col-lg-6 col-md-6">
                                                    <label for="blocage">Compte bloqué:</label>
                                                        <input type="text" id="blocage" value="<?php echo $data['user']->blocage; ?>" name="blocage" class="form-control" />
                                                       
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-lg-6 col-md-6">
                                                        <label for="deblocage">Date de déblocage:</label>
                                                        <input type="date" id="deblocage" value="<?php echo $data['user']->periode_blocage; ?>" name="periode_blocage" class="form-control" />
                                                        
                                                    </div>
                                                    
                                                </div>
                                                
                        

                                            </div>
                                            <div class="clearfix"></div>
                                        </div>  
                                    </div><!-- acc section END -->


 


                                   
                                    <div class="postinfobot"></br>
                                       <input type="hidden" value="<?php echo $data['user']->id; ?>" name="id" />
                                        <div class="pull-right postreply">
                                            <div class="pull-left smile"><a href="#"><i class="fa fa-smile-o"></i></a></div>
                                            <div class="pull-left"><input type="submit" class="btn btn-primary" name="update" value="Modifier"></div>
                                            <div class="clearfix"></div>
                                        </div>

                                        <div class="clearfix"></div>
                                    </div>
                                </form>
                            </div><!-- POST -->


                        </div>
                  
                        <div class="col-lg-4 col-md-4">

                            <div class="sidebarblock">
                            <img src="<?php echo URLROOT; ?>/public/images/blackmirror.jpg" alt="black mirror">
                            </div>


                        </div>
                    </div>
                </div>



                

            </section>

            <?php
            require APPROOT . '/views/includes/footer.php';
            ?>