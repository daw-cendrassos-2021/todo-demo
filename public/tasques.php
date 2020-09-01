<?php 

class tasques
{
    public $tasques = array(
        "actives" => array(),
        "fetes" => array(),
    );

    public function __construct()
    {
        $tasquesJson = $_COOKIE["tasques"];

        if (isset($tasquesJson)) {
            $this->tasques = json_decode($tasquesJson, true);
        }
    }

    public function afegir($tasca)
    {
        $this->tasques["actives"][] = $tasca;
    }

    public function esborrar($id)
    {
        $this->tasques["fetes"][] = $this->tasques["actives"][$id];
        array_splice($this->tasques["actives"], $id, 1);
    }

    public function restaura($id)
    {
        $this->tasques["actives"][] = $this->tasques["fetes"][$id];
        array_splice($this->tasques["fetes"], $id, 1);
    }

    public function guardar()
    {
        setcookie("tasques", json_encode($this->tasques));
    }

    public function llistat()
    {
        return $this->tasques["actives"];
    }

    public function llistatFetes()
    {
        return $this->tasques["fetes"];
    }
}
