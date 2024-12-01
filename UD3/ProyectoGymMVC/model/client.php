<?php

class Client {
    private string $nombre;
    private string $actividadPrincipal;
    private string $subactividades;
    private string $fecha;

    public function __construct(string $nombre, string $actividadPrincipal, string $fecha) {
        $this->nombre = $nombre;
        $this->actividadPrincipal = $actividadPrincipal;
        $this->fecha = $fecha;
    }
    

   

    /**
     * Get the value of nombre
     */ 
    public function getNombre()
    {
        return $this->nombre;
    }

    /**
     * Set the value of nombre
     *
     * @return  self
     */ 
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;

        return $this;
    }

    /**
     * Get the value of actividadPrincipal
     */ 
    public function getActividadPrincipal()
    {
        return $this->actividadPrincipal;
    }

    /**
     * Set the value of actividadPrincipal
     *
     * @return  self
     */ 
    public function setActividadPrincipal($actividadPrincipal)
    {
        $this->actividadPrincipal = $actividadPrincipal;

        return $this;
    }

    /**
     * Get the value of fecha
     */ 
    public function getFecha()
    {
        return $this->fecha;
    }

    /**
     * Set the value of fecha
     *
     * @return  self
     */ 
    public function setFecha($fecha)
    {
        $this->fecha = $fecha;

        return $this;
    }

    /**
     * Get the value of subactividades
     */ 
    public function getSubactividades()
    {
        return $this->subactividades;
    }

    /**
     * Set the value of subactividades
     *
     * @return  self
     */ 
    public function setSubactividades($subactividades)
    {
        $this->subactividades = $subactividades;

        return $this;
    }
}
?>