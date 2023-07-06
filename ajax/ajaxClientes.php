<?php
require_once "../controladores/ctrlClientes.php";
require_once "../modelos/mdlClientes.php";

class ajaxCliente{
    public $idClientes;

    public function cargarDatos(){
        $tabla = "cliente";
        $parametro = "cliente";
        $id = $this->idClientes;
        $datos = ControladorClientes::ctrlCargarClientes($tabla, $parametro, $id);
        echo json_encode($datos);
    }
}
if(isset($_POST['idClientes'])){
    $obtAjaxClientes = new ajaxCliente();
    $obtAjaxClientes->idClientes = $_POST['idClientes'];
    if($_POST['edit'] == 'edit'){
        $obtAjaxClientes->cargarDatos();
    }else{
        #$obtAjaxClientes->eliminarDatos()
    }
}