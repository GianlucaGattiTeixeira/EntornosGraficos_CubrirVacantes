<?php
    namespace Data_Access;
    require './Entidades/Usuario.php' ;
    use Entidades\Usuario as Usuario;
    class RepositorioEmpleado {
        function __construct()
        {
            
        }
    
        function GetByDni() {
            print 'Inside `aMemberFunc()`';
        }
    }
?>