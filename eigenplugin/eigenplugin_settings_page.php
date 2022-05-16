<?php
// Als er op bewaar wordt geklikt, bewaar het in de WP option.
if(isset($_POST['wphw_submit'])){
    $footertext = trim($_POST['footertextname']);
    $headertext = trim($_POST['headertextname']);
     update_option('footer_text', $footertext);
     update_option('header_text', $headertext);
}
?>
<div class="wrap">
 <h2>Beheer tekst</h2>
 <?php if(isset($_POST['wphw_submit'])): ?>
 <div id="message" class="updated below-h2">
   <p>Opgeslagen!</p>
 </div>
 <?php endif; ?>
 <div class="metabox-holder">
   <div class="postbox">
     <h3>Wijzig teksten</h3>
     <form action="" method="post">
       <table class="form-table">
         <tr>
           <td scope="row">Footer tekst</td>
           <td><input type="text" name="footertextname" value="<?php echo get_option('footer_text');?>"></td>
         </tr>
         <tr>
           <td scope="row">Header tekst</td>
           <td><input type="text" name="headertextname" value="<?php echo get_option('header_text');?>"></td>
         </tr>
         <tr>
           <td scope="row">&nbsp;</td>
           <td><input type="submit" name="wphw_submit" value="Opslaan" class="button-primary"></td>
         </tr>
       </table>
     </form>
   </div>
 </div>
</div>