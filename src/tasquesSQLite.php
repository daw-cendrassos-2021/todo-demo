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
class TasquesSQLite
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

    private $sql;
    private $db = "tasques.sqlite";

    /**
      * __construct:  Crear el model tasques
      *
      * recupera la informació desada a la cookie tasques si existeix
      *
    **/
    public function __construct()
    {
        $this->sql = new \SQLite3( $this->db );
        if ( ! file_exists( $this->db ) )
            die( "No s'ha pogut obrir la base de dades" );

        $q = $this->sql->query("SELECT name FROM sqlite_master WHERE type='table' AND name='tasques';");
        if ( $q->fetchArray() === false ) {
            $this->sql->query( "CREATE TABLE tasques ( id INTEGER PRIMARY KEY, tasca CHAR(255), borrat INTEGER );" );
            $q = $this->sql->query( "insert into tasques (tasca,borrat) values ('Primera tasca', 0);" );
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
        $query = $this->sql->prepare('insert into tasques (tasca,borrat) values (:tasca, 0);');
        $query->bindValue(':tasca', $tasca, SQLITE3_TEXT);
        $result = $query->execute();
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
        $query = $this->sql->prepare('update tasques set borrat=1 where id=:id;');
        $query->bindValue(':id', $id, SQLITE3_INTEGER);
        $result = $query->execute();
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
        $query = $this->sql->prepare('update tasques set borrat=0 where id=:id;');
        $query->bindValue(':id', $id, SQLITE3_INTEGER);
        $result = $query->execute();
    }

    /**
      * guardar:  guarda les tasques codificades en format json a la cookie tasques
      *
    **/
    public function guardar()
    {
        //setcookie("tasques", json_encode($this->tasques));
    }

    /**
      * llistat:  retorna el llistat de tasques
      *
      * @return array retorna una array de strings amb les tasques pendents de fer.
    **/
    public function llistat()
    {
        $result = $this->sql->query("select id, tasca from tasques where borrat=0;");
        $tasques = array();
        while($tasca = $result->fetchArray(SQLITE3_ASSOC)){
            //print_r($tasca);
            $tasques[$tasca["id"]] = $tasca["tasca"];
        }
        return $tasques;

    }
  
    /**
      * llistatFetes:  retorna el llistat de tasques fetes.
      *
      * @return array retorna una array de strings amb les tasques fetes.
    **/
    public function llistatFetes()
    {
        $result = $this->sql->query("select id, tasca from tasques where borrat=1;");
        $tasques = array();
        while($tasca = $result->fetchArray(SQLITE3_ASSOC)){
            $tasques[$tasca["id"]] = $tasca["tasca"];
        }
        return $tasques;
    }
}
