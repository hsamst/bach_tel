<?php
    require_once('mdlPlan.php');
    //$sistema -> validarRol('Administrador');
    $id_plan = NULL;
    $accion = NULL;
    if(isset($_GET['accion'])){
        $id_plan = isset($_GET['id_plan']) ? $_GET['id_plan'] : NULL;
        $accion = $_GET['accion'];
    }

    require_once('../../../componentes/header.php');

    switch($accion){
        
         //////////////////////////////////////// Caso read One ////////////////////////////////////////
        case 'readOne':
            $datosPlan = $plan->readOne($id_plan);
            if(is_array($datosPlan)){
                require_once('views/plan_datos/vistaPlan.php');
            } else{
                $modelo->message(0,"Ocurrio un error, el Plan de datos no exixte");
                require_once('formPlan.php');
            }
        break;


        //////////////////////////////////////// Caso New ////////////////////////////////////////
        case 'new':
            require_once('formPlan.php');
        break;

        //////////////////////////////////////// Caso add ////////////////////////////////////////
        case 'add':
            $datosPlan = $_POST;
            $resultado = $plan->create($datosPlan);
            //$Plan->message($resultado, ($resultado)?"El Plan se agrego correctamente": "Ocurrio un error al agregar el Plan");
            $datosPlans = $plan->read();
            require_once('vistaPlan.php');
        break;
        
        //////////////////////////////////////// Caso modify ////////////////////////////////////////
        case 'modify':
            $datosPlan = $plan->readOne($id_plan);
            //$datoModelos = $modelo->read();
            if(is_array($datosPlan)){
                require_once('formPlan.php');
            } else{
                //$modelo->message(0,"Ocurrio un error, el modelo no exixte");
                $datosPlans = $plan->read();
                require_once('vistaPlan.php');
            }
        break;

        //////////////////////////////////////// Caso update ////////////////////////////////////////
        case 'update':
            $datosPlan=$_POST;
            $resultado=$plan->update($datosPlan,$id_plan);
            //$modelo->message($resultado, ($resultado)?"El modelo se modifco correctamente": "Ocurrio un error al modificar el modelo");
            $datosPlans = $plan->read();
            require_once('vistaPlan.php');
        break;

        //////////////////////////////////////// Caso delete ////////////////////////////////////////
        case 'delete':
            $resultado = $plan->delete($id_plan);
            //$modelo->message($resultado, ($resultado)?"El modelo se elimino correctamente": "Ocurrio un error al eliminar el modelo");
        
        //////////////////////////////////////// Caso default ////////////////////////////////////////
        default:
            $datosPlans = $plan->read();
            require_once('vistaPlan.php');
    }


    require_once('../../../componentes/footer.php');


?>