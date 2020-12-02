
<div id="product" class="contenutab">
    <h3>Les produits</h3>
    <table class ="display" id="tableCommande">
        <thead>
            <th>Id </th> <th>Nom </th>  <th>Decsription</th> <th>Action</th>
        </thead>
        <?php
            foreach ($productList as $product){ ?>
        <tr> 
            <td> <?= $product->id; ?> </td> 
            <td> <?= $product->name; ?> </td> 
            <td> <?= $product->description; ?> </td> 
            <td> 
                <form action="" method="POST" class="form-inline"> 
                    <button class="form-control btn-info" type="button" name="consult" value="<?= $product->id; ?>"><a href="../../product/<?= $product->id; ?>"> <i class="fa fa-eye"></i> </a> </button> 
                    <button class="form-control btn-primary" type="button" name="update" value="<?= $product->id; ?>"><i class="fa fa-pencil"></i></button> 
                    <button class="form-control btn-danger" type="submit" name="delete" value="<?= $product->id; ?>"><i class="fa fa-trash"></i></button> 
                </form> 
             
            </td> 
        </tr>
      

    <?php } ?>

    </table>
</div>


<script>    

//Implémentation de DataTable
$(document).ready(function(){
      $('#tableCommande').DataTable({
         dom:'ftpl',
         order: [[ 0, "asc" ]], //Order des dates en premier
         language:{
               url:"public/Datatable/french.json" //
         }
      })
   });
</script>