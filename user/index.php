<!doctype html>
<?php
include ('./lib/php/Pliste_include.php');
$db = Connexion::getInstance($dsn,$user,$pass);
session_start();

$scripts=array(); 
$i=0;
foreach(glob('../admin/lib/js/jquery/*.js') as $js) {
    $fichierJs[$i]=$js;
    $i++;
    
}
?>

<html>
<head>
<title>FunGames</title>

    <link rel="stylesheet" type="text/css" href="./lib/css/style_jquery.css"/>
    <link rel="stylesheet" type="text/css" href="../admin/lib/css/style_pc.css"/>
    <link rel="stylesheet" type="text/css" href="../admin/lib/css/mediaqueries.css"/>
   <?php
    foreach($fichierJs as $js) {
       ?><script type="text/javascript" src="<?php print $js;?>"></script>
    <?php            
    }
    ?>
    <script type="text/javascript" src="../admin/lib/js/jquery/jquery-validation-1.13.1/dist/jquery.validate.js"></script>   
    <script type="text/javascript" src="../admin/lib/js/fonctionsJquery.js"></script>     
    <!--[if lt IE 9]>
	<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
    <meta charset='UTF-8'/>
</head>

<body>
    <div id="page">
        <header>		
            <img src="../admin/images/ban_site.jpg" alt="Banniere"/>			
	</header>
	<section id="colGauche">
            <nav>
                <ul id="menu"> 
                <?php
                    if(file_exists('./lib/php/Pmenu.php')){
                        include ('./lib/php/Pmenu.php');
                    }
                ?>
                </ul>
            </nav>
        </section>
	<section id="contenu">
       
             
            
          
        </section>
    </div>
    <footer>//</footer>
</body>
</html>