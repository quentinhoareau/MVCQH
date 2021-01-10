
<div id="category" class="contenutab">
    <h3>Les produits</h3>
    <table class ="display" id="tableCategory">
        <thead>
            <th>Code </th> <th>Nom </th> <th>Action</th>
        </thead>
        <?php
            foreach ($CategoryList as $Category){ ?>
        <tr> 
            <td> <?= $Category->code; ?> </td> 
            <td> <?= $Category->label; ?> </td>
            <td> 
                <form action="" method="POST" class="form-inline"> 
                    <a href="../../category/<?= $Category->code; ?>"> <button class="form-control btn-info" type="button" name="consult" value="<?= $Category->code; ?>"> <i class="fa fa-eye"></i> </button>  </a>
                    <a href="category/update/<?= $Category->code; ?>"> <button class="form-control btn-primary" type="button" name="update" value="<?= $Category->code; ?>"><i class="fa fa-pencil"></i></button> </a>
                    <button class="form-control btn-danger" type="submit" name="delete" value="<?= $Category->code; ?>"><i class="fa fa-trash"></i></button> 
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
               url:"assets/Datatable/french.json" //
         }
      })
   });
</script>