
<!-- --------- Code igniter : formulaire --------- -->

<h1>Liste des produits (Formulaire)</h1>

<?php echo form_open(); ?>

<div class="form-group">
    <label for="pro_libelle">Libellé</label>
    <input type="text" name="pro_libelle" id="pro_libelle" class="form-control">
</div> 

<div class="form-group">
    <label for="pro_ref">Référence</label>
    <input type="text" name="pro_ref" id="pro_ref" class="form-control">
    <?php echo form_error('pro_ref'); ?>
</div> 

<button type="submit" class="btn btn-dark">Ajouter</button>    
</form>