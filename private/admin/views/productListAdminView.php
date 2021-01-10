
<div id="product" class="contenutab">
    <h3>Les produits</h3>
    <table class ="display" id="tableProduct">
        <thead>
            <th>Id </th> <th>Nom </th>  <th>Decsription</th> <th>Catégorie</th> <th>Action</th>
        </thead>
        <?php
            foreach ($ProductList as $Product){ ?>
        <tr> 
            <td> <?= $Product->id; ?> </td> 
            <td> <?= $Product->name; ?> </td>
            <td> <?= $Product->description; ?> </td> 
            <td> <?= $Product->get()->label; ?> </td> 
            <td> 
                <form action="" method="POST" class="form-inline"> 
                    <a href="../../product/<?= $Product->id; ?>"> <button class="form-control btn-info" type="button" name="consult" value="<?= $Product->id; ?>"> <i class="fa fa-eye"></i>  </button> </a>
                    <a href="product/update/<?= $Product->id; ?>">  <button class="form-control btn-primary" type="button" name="update" value="<?= $Product->id; ?>"><i class="fa fa-pencil"></i></button> </a>
                    <button class="form-control btn-danger" type="submit" name="delete" value="<?= $Product->id; ?>"><i class="fa fa-trash"></i></button> 
                </form> 
            </td> 
        </tr>
    <?php } ?>

    </table>
</div>


<script>    

//Implémentation de DataTable
$(document).ready(function(){
      $('#tableProduct').DataTable({
         dom:'ftpl',
         order: [[ 0, "asc" ]], //Order des dates en premier
         language:{
               url:"assets/Datatable/french.json" //
         }
      })
   });
</script>