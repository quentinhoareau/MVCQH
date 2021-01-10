
<div id="product" class="contenutab container" style="max-width: 800px">

    <form action="" method="POST">
    <table class="display table" id="tableProduct">
        <thead class="thead-dark">
            <tr>
            <?php if(isset($Product)){ ?>
                <th colspan="2"> <h5>Produit <?= "#".$Product->id; ?> </h3>  </th>
            <?php } else{ ?>
                <th colspan="2"> <h5>Ajouter un nouveau produit </h3>  </th>
            <?php } ?>
            </tr>
        </thead>
        
            <?php if(isset($Product)){ ?>
                <tr>
                    <td> <label for=""> Id </label>   </td> 
                    <td> <input type="text" disabled value="<?= $Product->id; ?>"> <span> L'identifiant n'est pas modifiable.</span>  </td> 
                </tr>
            <?php } ?>
            
            <tr>
                <td> <label for="fname"> Nom </label> </td> 
                <td> <input name="name" id="fname" required type="text" <?php if(isset($Product)){ echo "value='$Product->name'"; } ?> required>  </td> 
            </tr>

            <tr>
                <td> <label for="fdescription"> Description </label> </td> 
                <td> <textarea  name="description" id="fdescription" required cols="30" rows="10"><?php if(isset($Product)){ echo $Product->description; } ?></textarea>   </td> 
            </tr>



            <tr>
                <td> <label for="fcateg_code"> Catégorie </label> </td> 
                <td> 
                    <select  class="selectpicker" data-live-search="true" id="fcateg_code" name="categ_code">
                        <?php foreach ($CategoryList as $categ) { ?>
                            <option data-subtext="<?= '#'.$categ->code ?>" value="<?= $categ->code ?>" > <?= $categ->label ?></option>
                        <?php } ?>
                    </select>
                </td> 

                <script>
                    <?php if(isset($Product)){ ?>
                        $('#fcateg_code').selectpicker('val', '<?= $Product->categ_code ?>');
                    <?php } ?>
                </script>
                
            </tr>

            <tr>
            <td>Action</td>

            <td class="form-inline">
                <?php if(isset($Product)){ ?>
                    <button class="form-control btn-info" type="button" name="consult" value="<?= $Product->id; ?>"><a href="../../product/<?= $Product->id; ?>"> <i class="fa fa-eye"></i> </a> </button> 
                    <button class="form-control btn-primary" type="submit" name="updateProduct" value="<?= $Product->id; ?>"><i class="fa fa-save"></i></button> 
                    <form action="" method="POST"> <button onclick="return confirm('Voulez-vous vraiment supprimer ce produit ?')" class="form-control btn-danger" type="submit" name="deleteProduct" value="<?= $Product->id; ?>"><i class="fa fa-trash"></i></button> </form>  
                <?php } else{ ?> 
                    <button class="form-control btn-success" type="submit" name="addProduct" ><i class="fa fa-globe"></i> Ajouter le produit </button>       
                <?php } ?>
           </td>

                
            
            </tr>

    </table>
    </form>

</div>

<script>

    
   
</script>

