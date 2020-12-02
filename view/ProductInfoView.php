<h1>Consulter un produit</h1>

<div id="productInfo"> 

  <div class="row">
    <label for="exampleInputEmail1">Id</label>
    <div > <?php echo $productInfo->id() ?>  </div>
  </div>
  <div class="row">
    <label>Nom</label>
    <div> <?php echo $productInfo->name() ?> </div>
  </div>
  <div class="row">
    <label>Description</label>
    <div><?php echo $productInfo->description() ?> </div>
  </div>

  <a href="product"><button style="width:100%" type="submit" name="updateProduct" class="btn btn-primary">Retour à la liste</button> </a>

