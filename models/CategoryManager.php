<?php 


class CategoryManager extends Database{

    //Obtenir une liste d'objets catégories
    public function getList(){
        $this->getDB(); 
        $query = "SELECT * FROM category";
        return $this->getModel("Category", $query) ;
    }

    //Obtenir un objet Category
    public function get($code){
        $this->getDB(); 
        $query = "SELECT * FROM category WHERE code=?";
        return @$this->getModel("Category", $query, [$code])[0] ;
    }

    //Supression d'une Category
    public function delete($code){
        $this->getDB(); 
        $query = "DELETE FROM category WHERE code = ?";
        $this->execQuery($query, [$code]);
    }

    //Mie à jours d'une Category
    public function update($code, $label){
        $this->getDB(); 
        $query = "UPDATE category SET label=? WHERE code=?";
        $this->execQuery($query,[$label, $code]);
    }

    //Insertion d'une Category
    public function add($label){
        $this->getDB(); 
        $query = "INSERT INTO category(label) VALUES (?)";
        $this->execQuery($query, [$label]);

        //Retourne l'identifiant de l'entité créée
        $this->getDB();
        return $this->getMaxIdTable("category", "code");

    }


}



?>