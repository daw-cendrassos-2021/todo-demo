<?php
/**
    * Exemple per a M07 i M08.
    * @author: Dani Prados dprados@cendrassos.net
    *
    * Model que gestiona les tasques.
    *
**/

namespace Daw;

/**
    * Tasques: model que gestiona les tasques.
    * @author: Dani Prados dprados@cendrassos.net
    *
    * Per guardar, recuperar i gestionar les tasques.
    *
**/
class Tasques
{

    /**
      * $tasques:  Array asociatiu amb la informació de les tasques.
      *
      * $tasques["actives"] hi ha les tasques pendents
      *
      * $tasques["fetes"] hi ha les tasques realitzades.
      *
      *
    **/
    public $tasques = array(
        "actives" => array(),
        "fetes" => array(),
    );

    /**
      * __construct:  Crear el model tasques
      *
      * recupera la informació desada a la cookie tasques si existeix
      *
    **/
    public function __construct()
    {
        $tasquesJson = $_COOKIE["tasques"];

        if (isset($tasquesJson)) {
            $this->tasques = json_decode($tasquesJson, true);
        }
    }

    /**
      * afegir:  afegeix una tasca
      *
      * @param $tasca string amb la tasca.
      *
    **/
    public function afegir($tasca)
    {
        $this->tasques["actives"][] = $tasca;
    }

    /**
      * esborrar:  esborra la tasca amb l'id $id
      *
      * La tasca amb id $id queda marcada com a feta i passa al llistat de fetes
      *
      * @param $id integer identificador de la tasca que volem esborrar.
      *
    **/
    public function esborrar($id)
    {
        $this->tasques["fetes"][] = $this->tasques["actives"][$id];
        array_splice($this->tasques["actives"], $id, 1);
    }

    /**
      * restaura:  restaura la tasca amb id $id
      *
      * La tasca amb id $id de la llista de fetes torna a la llista de tasques.
      *
      * @param $id integer identificador de la tasca que volem esborrar.
      *
    **/
    public function restaura($id)
    {
        $this->tasques["actives"][] = $this->tasques["fetes"][$id];
        array_splice($this->tasques["fetes"], $id, 1);
    }

    /**
      * guardar:  guarda les tasques codificades en format json a la cookie tasques
      *
    **/
    public function guardar()
    {
        setcookie("tasques", json_encode($this->tasques));
    }

    /**
      * llistat:  retorna el llistat de tasques
      *
      * @return array retorna una array de strings amb les tasques pendents de fer.
    **/
    public function llistat()
    {
        return $this->tasques["actives"];
    }
  
    /**
      * llistatFetes:  retorna el llistat de tasques fetes.
      *
      * @return array retorna una array de strings amb les tasques fetes.
    **/
    public function llistatFetes()
    {
        return $this->tasques["fetes"];
    }
}
