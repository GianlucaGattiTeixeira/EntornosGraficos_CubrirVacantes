<?php
namespace Servicios;
use Entidades\Usuario as Usuario;
use Data_Access\RepositorioEmpleado as Re;

class ServicioEmpleaedo
{
    protected $Re;
    function __construct()
    {
        $Re = new RepositorioEmpleado();
    }

    function GetUserByDni($dni)
    {
        return $Re->GetUserByDni($dni);
    }
}

?>