<?php

$mg = new catalogueManager($db);

$tab = $mg->getcata();
$mg1 = new catalogueManager($db);
//$tab1=$mg1->upCata($_GET);
$nbr = count($tab);




?> 
    
   

         
<form action="<?php print $_SERVER['PHP_SELF'];?>" method="get">
    <table id="cata_a" border="1">
        <tr class="tab_titre">
            <td>identifiant</td>
            <td>Nom</td>
            <td>Description</td>
            <td>Prix</td>
        </tr>
        <tr>
       
                 
                    
        </tr>
        <tr>
            
            
         <td id="choix_liste_deroulante">
                    
                    <?php

                    for($i=0;$i<$nbr;$i++){
                        ?>
                        <option value="<?php print $tab[$i]->id_prod; ?>">
                            <?php print $tab[$i]->idprod; ?>
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
    </td>
    </tr>
         

    </table>
    
    <table> 
    <form action="<?php print $_SERVER['PHP_SELF'];?>" method="get">
        <tr>      
             <td>   
               <?php if(isset($_SESSION['form']['id'])) { ?>
                        <input type="text" name="id" id="id" value="<?php print $_SESSION['form']['id'];?>"/>
                    <?php
                    }
                    else {
                        ?>
                        <input type="text" name="id" id="id" placeholder="Votre ID" required/>
                        <?php
                    }
                    ?>
                        
             </td>
             
                <td>   
               <?php if(isset($_SESSION['form']['prix'])) { ?>
                        <input type="text" name="prix" id="prix" value="<?php print $_SESSION['form']['prix'];?>"/>
                    <?php
                    }
                    else {
                        ?>
                        <input type="text" name="prix" id="prix" placeholder="Votre prix" required/> €
                        <?php
                    }
                    ?>
                        
             </td>
             
             <td>
                <input type="submit" name="submit_ccompte" id="submit_ccompte" value="Modifier" />
                &nbsp;&nbsp;&nbsp;
                <input type="reset" id="reset" value="Reset" />
             </td>
       </tr>  
    </form>
   </table> 
    
     <?php
        if(isset($_GET['submit_ccompte'])) {$mg = new catalogueManager($db); $tab = $mg->upCata($_GET);}
        ?>
    
  
</form>
   


