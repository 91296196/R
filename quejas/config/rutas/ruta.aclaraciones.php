<?php


    include '../conexion.php';

    switch ($_SERVER['REQUEST_METHOD']) {
      case 'POST'://se ejecuta cuando llega informacion por el metodo post

  
        // SE ASIGNAN A UNAS VARIABLES LOS VALORES CORRSPONDIENTES QUE LLEGAN POR EL METODO "POST"
        $folio_de_aclaracion = $_POST["numero_de_folio"];
        $numero_de_cliente =$_POST["numero_de_cliente"];
        $descripcion =$_POST["descripcion"];
        $factura = $_POST["factura"];
        $area = $_POST["area"];
        $tienda = $_POST["tienda"];
        $fecha_de_compra = $_POST["fecha_de_compra"];
        $importe = $_POST["importe"];
        $observacion = $_POST["observacion"];
        

        try {
  
          $sentencia = "INSERT INTO aclaraciones (folio_de_aclaracion, numero_de_cliente, descripcion, factura, area, tienda, fecha_de_compra, importe,observacion) VALUES ('$folio_de_aclaracion', '$numero_de_cliente', '$descripcion', '$factura', '$area','$tienda', '$fecha_de_compra',$importe,'$observacion') ";
          $resultado = mysqli_query($conexion, $sentencia) or die(mysqli_error($conexion));

          if ($resultado ) {
            $respuesta = array('error' => false , 'mensaje'=> 'Los datos se han guardado correctamente' );
            echo json_encode($respuesta);
          } 
        } catch (\Throwable $th) {
          //throw $th;
        $mensaje = "Ha ocurrido un error:". mysqli_error($conexion);
        $respuesta = array('error' => true,'mensaje'=> $mensaje );
        echo json_encode($respuesta);
        }  
        break;
      // case 'GET':
      //   # code...
      //   if(isset($_GET['id'])){
 

      //   }else{
      //      try {
      //       $sentencia = "SELECT * FROM aclaraciones ORDER BY descripcion";
      //       $resultado = mysqli_query($conexion,$sentencia);

      //       if ($resultado ) {
      //         $datos_arr = [];
      //         while ($data = mysqli_fetch_array($resultado)) {
      //           # code...
      //           $factura = array(
      //             'numero_de_factura' =>$data['numero_de_factura'] ,
      //             'numero_de_cliente' =>$data['numero_de_cliente'] ,
      //             'fecha' =>$data['fecha'],
      //             'descripcion' =>$data['descripcion'],
      //             'tienda' =>$data['tienda'],
      //             'tipo_de_movimiento' =>$data['tipo_de_movimiento'],
      //             'cargo' =>$data['cargo'],
      //             'abono' =>$data['abono'],
      //             'saldo' =>$data['saldo'],
      //           );
      //           $datos_arr[]=$factura;
      //         }
      //         // $respuesta = array('datos'=> $datos_arr  );
      //         echo json_encode($datos_arr);
      //       } 
      //     } catch (\Throwable $th) {
      //       $mensaje = "Ha ocurrido un error:". mysqli_error($conexion);
      //       $respuesta = array('error' => true,'mensaje'=> $mensaje );
      //       echo json_encode($respuesta);
      //     }
      //   }
        
      //   break;
      // case 'DELETE':
      //   if(isset($_GET['id'])){
          
      //   }
      //   break;
      // case 'PUT':
        
      //   break;
      default:
        # code...
        $respuesta = array('mensaje' => 'metodo no valido' );
        echo json_encode($respuesta);
        break;
    }
   mysqli_close($conexion);


   

     
?>