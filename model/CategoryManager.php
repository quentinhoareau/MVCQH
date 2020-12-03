<?php 


class CategoryManager extends Database{

    //Obtenir une liste d'objets catégories
    public function getCategoryList(){
        $this->getDB(); 
        $query = "SELECT * FROM category";
        return $this->getModel("Category", $query) ;
    }

    //Obtenir un objet Category
    public function getCategory($code){
        $this->getDB(); 
        $query = "SELECT * FROM category WHERE code=?";
        return @$this->getModel("Category", $query, [$code])[0] ;
    }

    //Supression d'une Category
    public function deleteCategory($code){
        $this->getDB(); 
        $query = "DELETE FROM category WHERE code = ?";
        $this->execQuery($query, [$code]);
    }

    //Mie à jours d'une Category
    public function updateCategory($code, $label){
        $this->getDB(); 
        $query = "UPDATE category SET label=? WHERE code=?";
        $this->execQuery($query,[$code, $label]);
    }

    //Insertion d'une Category
    public function insertCategory($label){
        $this->getDB(); 
        $query = "INSERT INTO category(label) VALUES (?)";
        $this->execQuery($query, [$label]);
    }


}



?>