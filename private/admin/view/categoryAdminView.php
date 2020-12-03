
<div id="category" class="contenutab">
    <h3>Les produits</h3>
    <table class ="display" id="tableCategory">
        <thead>
            <th>Code </th> <th>Nom </th><th>Modifier</th> <th>Supprimer</th>
        </thead>
        <?php
            foreach ($categoryList as $category){ ?>
        <tr> 
            <form action="" method="POST"> 
            <td>  <?= $category->code; ?>  </td> 
            <td> <input type="text" name="label" value="<?= $category->label; ?>"> </td>
       
           
            <td> 
               <button class="form-control btn-primary" type="submit" name="updateCategory" value="<?= $category->code; ?>"><i class="fa fa-save"></i></button> 
            </td> 
            </form> 
            <td> 
                <form action="" method="POST">
                    <button onclick="return confirm('Voulez-vous vraiment le supprimer ?') " class="form-control btn-danger" type="submit" name="delete" value="<?= $category->code; ?>"><i class="fa fa-trash"></i></button> 
               </form>
            </td> 
    
        </tr>
      

    <?php } ?>

    </table>
</div>


<script>    

//Implémentation de DataTable
$(document).ready(function(){
      $('#tableCategory').DataTable({
         dom:'ftpl',
         order: [[ 0, "asc" ]], //Order des dates en premier
         language:{
               url:"public/Datatable/french.json" //
         }
      })
   });
</script>