<h1>Liste des produits</h1>

<div class="card-group">
    <?php foreach ($productList as $Product) { ?>
      <div class="col-sm-4">
        <div class="card" style="width: 18rem;">
          <img class="card-img-top" src="assets/img/catalog/default.jpg" alt="product<?= $Product->id ?>">
          <div class="card-body">
            <h5 class="card-title"><?= $Product->name ?></h5>
            <a href="product/<?= $Product->id ?>">  <button class='btn-primary form-control' type="button"> Voir le produit</button> </a> <!-- Voir un product -->
          </div>
        </div>
      </div>



    <?php  } ?>
</div>

<script>
  $(document).ready( function () {
      $('#listProduct').DataTable({
          dom: "ptlf",
          language: {
              url: "assets/DataTables/french.json"
          }
      });
  });
</script>



