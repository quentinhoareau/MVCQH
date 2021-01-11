
<div id="category" class="contenutab container" style="max-wcodeth: 800px">

    <form action="" method="POST">
    <table class="display table" id="tableCategory">
        <thead class="thead-dark">
            <tr>
            <?php if(isset($Category)){ ?>
                <th colspan="2"> <h5>Catégorie <?= "#".$Category->code; ?> </h3>  </th>
            <?php } else{ ?>
                <th colspan="2"> <h5>Ajouter une nouvelles catégorie </h3>  </th>
            <?php } ?>
            </tr>
        </thead>
        
            <?php if(isset($Category)){ ?>
                <tr>
                    <td> <label for=""> Id </label>   </td> 
                    <td> <input type="text" disabled value="<?= $Category->code; ?>"> <span> L'identifiant n'est pas modifiable.</span>  </td> 
                </tr>
            <?php } ?>
            
            <tr>
                <td> <label for="flabel"> Nom </label> </td> 
                <td> <input name="label" id="label" required type="text" <?php if(isset($Category)){ echo "value='$Category->label'"; } ?> required>  </td> 
            </tr>

            <tr>

            <td>Action</td>
            <td class="form-inline">
                <?php if(isset($Category)){ ?>
                    <button class="form-control btn-info" type="button" name="consult" value="<?= $Category->code; ?>"><a href="../../category/<?= $Category->code; ?>"> <i class="fa fa-eye"></i> </a> </button> 
                    <button class="form-control btn-primary" type="submit" name="updateCategory" value="<?= $Category->code; ?>"><i class="fa fa-save"></i></button>
                    <form action="" method="POST"> <button onclick="return confirm('Voulez-vous vraiment supprimer ce produit ?')" class="form-control btn-danger" type="submit" name="deleteCategory" value="<?= $Category->code; ?>"><i class="fa fa-trash"></i></button> </form>  
                <?php } else{ ?> 
                    <button class="form-control btn-success" type="submit" name="addCategory" ><i class="fa fa-globe"></i> Ajouter le produit </button>       
                <?php } ?>
           </td>

                
            
            </tr>

    </table>
    </form>

</div>

<script>

    
   
</script>

