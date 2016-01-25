<?php

$mg = new catalogueManager($db);
$tab = $mg->getcata();

$nbr = count($tab);


if(isset($_GET['choix'])){ //--> changer le nom de la vérification
    $mg2 = new catalogueManager($db);
    $atouts = $mg2->getcata($_GET['choix']);    
    $nbr_at=count($atouts);
    ?><pre><?php //print_r($atouts); ?></pre><?php
}

?>
<form action="<?php print $_SERVER['PHP_SELF'];?>" method="get">
    <table id="cata" border="1">
        <tr>
            <td id="choix_liste_deroulante">
                    
                    <?php

                    for($i=0;$i<$nbr;$i++){
                        ?>
                        <option value="<?php print $tab[$i]->id_prod; ?>">
                            <?php print $tab[$i]->nom; ?>
                        </option>
                    <?php
                    }
                    ?>

                
            </td>  
            
             <td id="choix_liste_deroulante">
                    
                    <?php

                    for($i=0;$i<$nbr;$i++){
                        ?>
                        <option value="<?php print $tab[$i]->id_prod; ?>">
                            <?php print $tab[$i]->description; ?>
                        </option>
                    <?php
                    }
                    ?>

                
            </td>  
               <td id="choix_liste_deroulante">
                    
                    <?php

                    for($i=0;$i<$nbr;$i++){
                        ?>
                        <option value="<?php print $tab[$i]->id_prod; ?>">
                            <?php print $tab[$i]->prix; ?>
                        </option>
                    <?php
                    }
                    ?>

              
         

    </table>
</form>
    <br />

<table>
    <?php
   
   
      if(isset($nbr_at)){
        for($i=0;$i<$nbr_at;$i++) {
         ?>
        <tr>
            <td><img src="../admin/images/<?php print $atouts[$i]->image;?>" alt="<?php print $atouts[$i]->image;?>" /></td>
            <td class="up centrer"><span class="txtBlue txtGras"><?php print $atouts[$i]->denomination;?></span><br />
                <?php
                if($atouts[$i]->type_animal!=''){ ?>
                Convient pour : <span class="txtGras"><?php print $atouts[$i]->type_animal; ?></span><?php           
                }
                if($atouts[$i]->hauteur!=-1){ ?>
                Hauteur : <?php print $atouts[$i]->hauteur." m.";            
                }
                ?>
            </td>
        </tr>
        <?php
        } //print $texte[0]->texte_accueil; 
    }//fin if isset
    ?>
        
        <a href="index.php?page=printCatalogue">Version PDF de notre catalogue</a>
</table>

