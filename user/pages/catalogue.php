<?php

$mg = new catalogueManager($db);
$tab = $mg->getcata();

$nbr = count($tab);


if(isset($_GET['choix'])){ 
    $mg2 = new catalogueManager($db);
    $atouts = $mg2->getcata($_GET['choix']);    
    $nbr_at=count($atouts);
    ?><pre><?php //print_r($atouts); ?></pre><?php
}

?>
<form action="<?php print $_SERVER['PHP_SELF'];?>" method="get">
    <table id="cata" border="1">
        <tr class="tab_titre">
            <td>Nom</td>
            <td>Description</td>
            <td>Prix</td>
        </tr>
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
                            <?php print $tab[$i]->prix; print ' €' ?> 
                        </option>
                    <?php
                    }
                    ?>
    </table>
</form>

      
        <a class="pdf" href="index.php?page=printCatalogue">Version PDF de notre catalogue</a>
        <br>
        <a href="https://get.adobe.com/fr/reader/"><img  class="pdf_logo" src="../admin/images/pdflogo.png" alt="PDF"/> </a>


