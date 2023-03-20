<?php

class Question {
  private $type;
  private $intitule;
  private $reponses;

  public function __construct($type, $intitule, $reponses) {
    $this->type = $type;
    $this->intitule = $intitule;
    $this->reponses = $reponses;
  }

  public function getType() {
    return $this->type;
  }

  public function getIntitule() {
    return $this->intitule;
  }

  public function getReponses() {
    return $this->reponses;
  }

  public function setType($type) {
    $this->type = $type;
  }

  public function setIntitule($intitule) {
    $this->intitule = $intitule;
  }

  public function setReponses($reponses) {
    $this->reponses = $reponses;
  }
}
?>
