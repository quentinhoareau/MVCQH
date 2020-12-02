<?php 


class ProductManager extends Database{

    //Obtenir une liste d'objets products
    public function getProductList(){
        $this->getDB(); 
        $query = "SELECT * FROM product";
        return $this->getModel("Product", $query) ;
    }

    //Obtenir un objet product
    public function getProduct($id){
        $this->getDB(); 
        $query = "SELECT * FROM product WHERE id=?";
        return @$this->getModel("Product", $query, [$id])[0] ;
    }

    //Supression d'un product
    public function deleteProduct($id){
        $this->getDB(); 
        $query = "DELETE FROM product WHERE id = ?";
        $this->execQuery($query, [$id]);
    }

    //Mie à jours d'un product
    public function updateProduct($id, $name, $email, $phone){
        $this->getDB(); 
        $query = "UPDATE product SET name=?, email=?, phone=? WHERE id=?";
        $this->execQuery($query,[$name, $email, $phone, $id]);
    }

    //Insertion d'un product
    public function insertProduct($name, $email, $phone){
        $this->getDB(); 
        $query = "INSERT INTO product(name, email, phone) VALUES (?, ?, ?)";
        $this->execQuery($query, [$name, $email, $phone]);
    }


}



?>