<?php
   require ROOT . '/views/includes/head.php';
?>
 <body>

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
                        <?php if($_SESSION['role']=='admin'){echo'<a href="'.WWW_ROOT.'admins/crud">CRUD ></a>';}?> 
                       
                        <a href="#"> MODIFIER TOPIC</a> 
                    </div>
                </div>
                </div>                
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 col-md-8">
                     <!-- POST --><div class="post">
                     <form action="<?php echo WWW_ROOT; ?>topics/modifyTopic" class="form newtopic" method="post">
                                    <div class="postinfotop">
                                        <h2>Modifier topic </h2>
                                    </div>

                                    <!-- acc section -->
                                    <div class="accsection">
                                        
                                        <div class="topwrap">
                                        <div class="userinfo pull-left">&nbsp;</div>
                                            <div class="posttext pull-left">
                                                <div class="row">
                                                    <div class="col-lg-6 col-md-6">
                                                        <input type="text" placeholder="Titre du topic" value ="<?php echo $data['topic']->titre; ?>" name="titre" class="form-control" />
                                                    </div>
                                                    <div class="col-lg-6 col-md-6">
                                                    <p>Anciens droits ( à confirmer ) : <?php echo $data['topic']->droits; ?> </p> 
                                                        <label for="droits">Droits:</label>
                                                            <select name="droits" id="droits">
                                                                <option value="administrateur">administrateur</option>
                                                                <option value="moderateur">moderateur</option>
                                                                <option value="membre">membre</option>
                                                                <option value="visiteur">visiteur</option>
                                                            </select>  
                                                        <input type="hidden" name="id" value="<?php echo $data['topic']->id; ?>" />
                                                        <input type="hidden"  name="id_utilisateur" value="<?php echo $data['topic']->id_utilisateur; ?>" />
                                                    </div>
                                                </div>                                                
                                               
                                            </div>
                                            <div class="clearfix"></div>
                                        </div>  
                                    </div><!-- acc section END -->
                                    
                                                                                                                                     

                                    <div class="postinfobot">
                                                                           
                                        <div class="pull-right postreply">
                                            <div class="pull-left"><button type="submit" class="btn btn-primary">modifier</button></div>
                                            <div class="clearfix"></div>
                                        </div>

                                        <div class="clearfix"></div>
                                    </div>
                                </form>
                            </div>
                        

                    </div>
                    
                    <div class="col-lg-4 col-md-4">
                        <div class="sidebarblock">
                            <h3>Topics</h3>
                            <div class="divline"></div>
                            <div class="blocktxt">
                                <ul class="cats"> 
                                          
                                <?php foreach($data['topics'] as $topics){
                                        if($_SESSION['role']=="admin"){echo '<li><a href="#">'.$topics->titre.'<span class="badge pull-right">20</span></a></li>';}
                                        elseif($topics->droits != 'administrateur' && $_SESSION['role'] == 'moderateur'){echo '<li><a href="#">'.$topics->titre.'<span class="badge pull-right">20</span></a></li>';}
                                                                          
                                    } ?>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
<?php
require ROOT . '/views/includes/footer.php';
?>