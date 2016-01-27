<h2 id="titre_page"> Création d'un compte client </h2>

<?php

if(isset($_GET['submit_ccompte'])) {
    extract($_GET,EXTR_OVERWRITE);
    if(trim($nom)!='' && trim($prenom)!='' && trim($adresse)!='' && trim($ville)!='' && trim($cp)!='' && trim($pays)!='' && trim($numdetel)!='') {
        $mg2 = new clientManager($db);
        $retour = $mg2->addClient($_GET);
        if($retour>=0){
            $texte="<span class='txtGras'>Votre demande a bien été enregistrée.</span>";
            
        }
   
        if(isset($_SESSION['form'])) {unset($_SESSION['form']);}                
    }
    else {
        $texte="Complétez tous les champs.";
        if(trim($nom)!='') {$_SESSION['form']['nom']=$nom;}
        if(trim($prenom)!='') {$_SESSION['form']['prenom']=$prenom;}
        if(trim($adresse)!='') {$_SESSION['form']['adresse']=$adresse;}
        if(trim($ville)!='') {$_SESSION['form']['ville']=$ville;}
        if(trim($cp)!='') {$_SESSION['form']['cp']=$cp;}
        if(trim($pays)!='') {$_SESSION['form']['pays']=$pays;}
        if(trim($numdetel)!='') {$_SESSION['form']['numdetel']=$numdetel;}
    }
}
?>
<img src="../admin/images/inscription.jpg" alt="Image de clients" />

<section id="resultat" class="txtGreen"><?php if(isset($texte)) print $texte; ?></section>
<section id="leform">
    <form id="form_ccompte" action="<?php print $_SERVER['PHP_SELF'];?>" method="get">
        <fieldset id="Client">
        <legend class="txtBlue txtGras">Renseignements personnel : </legend>
        <table>
            <tr>
                <td>Nom : </td>
                <td>
                    <?php if(isset($_SESSION['form']['nom'])) { ?>
                        <input type="text" name="nom" id="nom" value="<?php print $_SESSION['form']['nom'];?>"/>
                    <?php
                    }
                    else {
                        ?>
                        <input type="text" name="nom" id="nom" placeholder="Votre Nom" required/>
                        <?php
                    }
                    ?>
                        
                </td>
            </tr>
	    <tr>
                <td>Prénom : </td>
                <td>
                    <?php if(isset($_SESSION['form']['prenom'])) { ?>
                        <input type="text" name="prenom" id="prenom" value="<?php print $_SESSION['form']['prenom'];?>"/>
                    <?php
                    }
                    else {
                        ?>
                        <input type="text" name="prenom" id="prenom" placeholder="Votre Prenom" required/>
                        <?php
                    }
                    ?>
                       
                </td>
            </tr>
             <tr>
                <td>Adresse : </td>
                <td>
                    <?php if(isset($_SESSION['form']['adresse'])) { ?>
                        <input type="text" name="adresse" id="adresse" value="<?php print $_SESSION['form']['adresse'];?>"/>
                    <?php
                    }
                    else {
                        ?>
                        <input type="text" name="adresse" id="adresse" placeholder="Votre Adresse" required/>
                        <?php
                    }
                    ?>
                       
                </td>
            </tr>
	
                       
            <tr>
                <td>Ville : </td>
                <td>
                    <?php if(isset($_SESSION['form']['ville'])) { ?>
                        <input type="text" name="ville" id="ville" value="<?php print $_SESSION['form']['ville'];?>"/>
                    <?php
                    }
                    else {
                        ?>
                        <input type="text" name="ville" id="ville" placeholder="Votre Ville" required/>
                        <?php
                    }
                    ?>
                        
                </td>
            </tr>
            
            <tr>
                <td>CP : </td>
                <td>
                    <?php if(isset($_SESSION['form']['cp'])) { ?>
                        <input type="text" name="cp" id="cp" value="<?php print $_SESSION['form']['cp'];?>"/>
                    <?php
                    }
                    else {
                        ?>
                        <input type="text" name="cp" id="cp" placeholder="Votre CP" required/>
                        <?php
                    }
                    ?>
                       
                </td>
            </tr>
            
             <tr>
                <td>Pays : </td>
                <td>
                    <?php if(isset($_SESSION['form']['pays'])) { ?>
                        <input type="text" name="pays" id="pays" value="<?php print $_SESSION['form']['pays'];?>"/>
                    <?php
                    }
                    else {
                        ?>
                        <input type="text" name="pays" id="pays" placeholder="Votre Pays" required/>
                        <?php
                    }
                    ?>
                        
                </td>
            </tr>

             <tr>
                <td>Numéro de téléphone : </td>
                <td>
                    <?php if(isset($_SESSION['form']['numdetel'])) { ?>
                        <input type="text" name="numdetel" id="numdetel" value="<?php print $_SESSION['form']['numdetel'];?>"/>
                    <?php
                    }
                    else {
                        ?>
                        <input type="text" name="numdetel" id="numdetel" placeholder="Votre Numero" required/>
                        <?php
                    }
                    ?>
                        <div id="error"></div>
                </td>
            </tr>

            <tr>
                <td colspan="2">
                <input type="submit" name="submit_ccompte" id="submit_ccompte" value="Envoyer la demande" />
                &nbsp;&nbsp;&nbsp;
                <input type="reset" id="reset" value="R&eacute;initialiser le formulaire" />
                </td>
            </tr>
            
        </table>
        </fieldset>
    </form>
</section>