
<div id="category" class="contenutab">
    <h3>Les produits</h3>
    <table class ="display" id="tableCategory">
        <thead>
            <th>Id </th> <th>Nom </th>  <th>Decsription</th> <th>Catégorie</th> <th>Action</th>
        </thead>
        <?php
            foreach ($categoryList as $category){ ?>
        <tr> 
        <form action="" method="POST" class="form-inline"> 
            <td> <?= $category->code; ?> </td> 
            <td> <?= $category->label; ?> </td>
       
           
            <td> 
               <button class="form-control btn-info" type="button" name="consult" value="<?= $category->code; ?>"><a href="../../category/<?= $category->id; ?>"> <i class="fa fa-eye"></i> </a> </button> 
               <button class="form-control btn-primary" type="button" name="update" value="<?= $category->code; ?>"><i class="fa fa-save"></i></button> 
               <button class="form-control btn-danger" type="submit" name="delete" value="<?= $category->code; ?>"><i class="fa fa-trash"></i></button> 
            </td> 
         </form> 
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