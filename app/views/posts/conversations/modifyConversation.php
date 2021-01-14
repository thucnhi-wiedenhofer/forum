<?php
   require APPROOT . '/views/includes/head.php';
?>
 <body>

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
            <?php var_dump($data['topic']);?>
                <div class="row">
                    <div class="col-lg-8 breadcrumbf">
                        <?php if($_SESSION['role']=='admin'){echo'<a href="'.URLROOT.'/admins/crud">CRUD ></a>';}
                        else{echo '<a href="'.URLROOT.'/posts/home">HOME ></a>';}?>
                            <a href="#">TOPIC: <?= $data['topic']->titre ?></a> 
                       
                        <a href="#"> MODIFIER CONVERSATION</a> 
                    </div>
                </div>
                </div>                
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 col-md-8">
                     <!-- POST --><div class="post">
                     <form action="<?php echo URLROOT; ?>/conversations/modifyConversation" class="form newtopic" method="post">
                                    <div class="postinfotop">
                                        <h2>Modifier conversation </h2>
                                    </div>

                                    <!-- acc section -->
                                    <div class="accsection">
                                        
                                        <div class="topwrap">
                                        <div class="userinfo pull-left">&nbsp;</div>
                                            <div class="posttext pull-left">
                                                <div class="row">
                                                    <div class="col-lg-6 col-md-6">
                                                        <input type="text" placeholder="Titre de la conversation" value ="<?php echo $data['conversation']->titre; ?>" name="titre" class="form-control" />
                                                    </div>
                                                    <div class="col-lg-6 col-md-6">
                                                    <p>droits: <?php echo $data['topic']->droits; ?> </p> 
                                                        
                                                        <input type="hidden" name="id" value="<?php echo $data['conversation']->id; ?>" />
                                                        <input type="hidden"  name="id_utilisateur" value="<?php echo $data['conversation']->id_utilisateur; ?>" />
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
                            <h3>Conversations</h3>
                            <div class="divline"></div>
                            <div class="blocktxt">
                                <ul class="cats"> 
                                          
                                <?php foreach($data['conversations'] as $conversations){
                                        if($_SESSION['role']=="admin"){echo '<li><a href="#">'.$conversations->titre.'<span class="badge pull-right">20</span></a></li>';}
                                        elseif($topics->droits != 'administrateur' && $_SESSION['role'] == 'moderateur'){echo '<li><a href="#">'.$conversations->titre.'<span class="badge pull-right">20</span></a></li>';}
                                                                          
                                    } ?>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
<?php
require APPROOT . '/views/includes/footer.php';
?>