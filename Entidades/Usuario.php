<?php
    namespace Entidades;
    include('./Entidades/Usuario.php');
    use Data_Access\RepositorioEmpleado;
    class Usuario {
        
        protected $RepositorioEmpleado;
        public $Usuario;
        public $Contrasena;
        public $Mail;
        public $Nombre;
        public $Apellido;
        public $Direccion; 
        public $Ciudad;
        public $Admin;

        function __construct() 
        {
            $RepositorioEmpleado = new RepositorioEmpleado(); 
        }
    
        function GetByDni() 
        {

        }
    }
?> 