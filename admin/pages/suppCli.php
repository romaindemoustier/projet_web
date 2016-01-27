<?php

$mg = new clientReadManager($db);
$tab = $mg->getcli();

$nbr = count($tab);


if(isset($_GET['choix'])){ 
    $mg2 = new clientReadManager($db);
    $atouts = $mg2->getcli($_GET['choix']);    
    $nbr_at=count($atouts);
    ?><pre><?php //print_r($atouts); ?></pre><?php
}

?>
    <form action="<?php print $_SERVER['PHP_SELF'];?>" method="get">
   
        
      
<form action="<?php print $_SERVER['PHP_SELF'];?>" method="get">
    <table id="cata_a" border="1">
        
        
   
        <tr class="tab_titre">
            <td>Identifiant</td>
            <td>Nom</td>
            <td>Prénom</td>
        </tr>
        
   
        
        <tr>
            <td id="choix_liste_deroulante">
                    
                    <?php

                    for($i=0;$i<$nbr;$i++){
                        ?>
                        <option value="<?php print $tab[$i]->idcli; ?>">
                            <?php print $tab[$i]->idcli; ?>
                        </option>
                    <?php
                    }
                    ?>

                
            </td>  
            
             <td id="choix_liste_deroulante">
                    
                    <?php

                    for($i=0;$i<$nbr;$i++){
                        ?>
                        <option value="<?php print $tab[$i]->idcli; ?>">
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
                        <option value="<?php print $tab[$i]->idcli; ?>">
                            <?php print $tab[$i]->prenom; ?> 
                        </option>
                    <?php
                    }
                    ?>

              
         

    </table>
    
    <br>
         <table id="cata_a">
              <tr>
         <td>Choisissez l'idendifiant correspondant à la personne à supprimer </td>
                <td><select name="id_cli" id="id_cli">                
                <option value="">Choix</option>
                <?php
                for($i=0;$i<$nbr;$i++) {
                    ?>
                <option value="<?php print $tab[$i]->idcli;?>">
                    <?php print $tab[$i]->idcli; ?>
                </option>
                    <?php
                }
                ?>
                </select>
                </td>
                <td>
                 <input type="submit" name="suppression" id="suppression" value="Supprimer" />
                </td>
        </tr>
        </table>
        
        <?php
        if(isset($_GET['suppression'])) 
            {
            $mg = new clientReadManager($db); $tab = $mg->supprimCli($_GET);}
        ?>
</form>

</table>

