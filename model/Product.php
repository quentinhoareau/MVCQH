<?php 
class Product{
    //Attributs
    private $id;
    private $name;
    private $description;

    //Constructeur
    public function __construct(array $data){
        $this->hydratation($data) ;
    }

    //Hydratation
    public function hydratation(array $data){
        foreach($data as $key => $attribut){
           $setter = 'set'.ucfirst($key);
           if(method_exists($this, $setter)){
              $this->$setter(htmlspecialchars($attribut)); //Appel au setter concerné en sécurisant l'injection de scripts
           }
        }
     }

    //Getter
      public function    id(){    return $this->id; }
      public function    name(){  return $this->name; }
      public function    description(){ return $this->description; }

    //Setter
      public function    setId($value){     $this->id = $value; }
      public function    setName($value){   $this->name = $value; }
      public function    setDescription($value){  $this->description = $value; }
}
 