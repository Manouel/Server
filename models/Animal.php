<?php
  class Animal {
    private $idAnimal;
    private $type;
    private $name;
    private $breed;
    private $age;
    private $gender;
    private $catsFriend;
    private $dogsFriend;
    private $childrenFriend;
    private $description;
    private $state;

    public static $STATE_ADOPTED = 2;
    public static $STATE_ADOPTION = 1;

    private static $SUBJECT_TYPE_ID = 2;

    public function __construct($idAnimal) {
      $db = DbManager::getPDO();
      $query = "SELECT * FROM Animal WHERE idAnimal = ".$idAnimal."";
      $res = $db->query($query)->fetch();
      $this->idAnimal = $res['idAnimal'];
      $this->type = $res['idType'];
      $this->name = $res['name'];
      $this->breed = $res['breed'];
      $this->age = $res['age'];
      $this->gender = $res['gender'];
      $this->catsFriend = $res['catsFriend'];
      $this->dogsFriend = $res['dogsFriend'];
      $this->childrenFriend = $res['childrenFriend'];
      $this->description = $res['description'];
      $this->state = $res['idState'];
    }

    public function getName() {
      return $this->name;
    }

    /**
     * @return true si l'animal est présent dans la BDD, false sinon.
     */
    public static function isAnimalExistInDataBase($idAnimal) {
      $db = DbManager::getPDO();
      $query = "SELECT idAnimal FROM Animal WHERE idAnimal='".$idAnimal."';";
      $res = $db->query($query)->fetch();
      return $res['idAnimal'] === $idAnimal;
    }

    /**
     * @action met à jour le statut de l'animal
     * @return true/false suivant le resultat de la requete,
     *        "Unknown animal" si l'animal n'est pas présent dans la BDD
     */
    public function updateStatus($newStatus) {
      $db = DbManager::getPDO();
      $query = "UPDATE Animal SET idState = ".$newStatus." WHERE idAnimal = ".$this->idAnimal.";";
      return ($db->exec($query)>=0);
    }

    public static function getPhoto($idAnimal) {
      $db = DbManager::getPDO();
      $query = "SELECT name FROM Photo WHERE idSubjectType = " . self::$SUBJECT_TYPE_ID . " AND idSubject = " . $idAnimal . " LIMIT 1";
      $res = $db->query($query)->fetch();

      return $res['name'];
    }

    /**
     * @return transforme le résultat du fetch d'un animal en un tableau contenant
     *         les informations de l'animal pour ensuite le transmettre au client
     */
    public static function getAnimalArrayFromFetch($animal) {
      $animalArray["idAnimal"] = intval($animal["idAnimal"]);
      $animalArray["idType"] = intval($animal["idType"]);
      $animalArray["name"] = $animal["name"];
      $animalArray["breed"] = $animal["breed"];
      $animalArray["age"] = $animal["age"];
      $animalArray["gender"] = $animal["gender"];
      $animalArray["catsFriend"] = $animal["catsFriend"];
      $animalArray["dogsFriend"] = $animal["dogsFriend"];
      $animalArray["childrenFriend"] = $animal["childrenFriend"];
      $animalArray["description"] = $animal["description"];
      $animalArray["idState"] = intval($animal["idState"]);
      $animalArray["photo"] = Animal::getPhoto($animal["idAnimal"]);
      return $animalArray;
    }

    /**
     * @return la liste des animaux à l'adoption
     */
    public static function getHomelessAnimals() {
      $db = DbManager::getPDO();
      $query = "SELECT * FROM Animal WHERE idState='".self::$STATE_ADOPTION."';";
      $res = $db->query($query)->fetchAll();

      for ($i=0; $i<count($res); $i++) {
        $animal = Animal::getAnimalArrayFromFetch($res[$i]);
        $listAnimals[$animal['idAnimal']] = $animal;
      }

      return $listAnimals;
    }

    public function getInformations() {
      $animalArray["idAnimal"] = intval($this->idAnimal);
      $animalArray["idType"] = intval($this->idType);
      $animalArray["name"] = $this->name;
      $animalArray["breed"] = $this->breed;
      $animalArray["age"] = $this->age;
      $animalArray["gender"] = $this->gender;
      $animalArray["catsFriend"] = $this->catsFriend;
      $animalArray["dogsFriend"] = $this->dogsFriend;
      $animalArray["childrenFriend"] = $this->childrenFriend;
      $animalArray["description"] = $this->description;
      $animalArray["idState"] = intval($this->idState);
      $animalArray["photo"] = getPhoto($this->idAnimal);
      return $animalArray;
    }

    public function addPhoto($name, $description) {
      return Photo::addPhotoInDataBase($name, $description, $this->idAnimal, self::$SUBJECT_TYPE_ID);
    }
  }

 ?>
