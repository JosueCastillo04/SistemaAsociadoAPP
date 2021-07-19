<?php
    header('Content-Type: text/html; charset=UTF-8');
    //Iniciar una nueva sesión o reanudar la existente.
    session_start();
    //Si existe la sesión "cliente"..., la guardamos en una variable.
    if (isset($_SESSION['user'])){
        $cliente = $_SESSION['user'];
    }else{
        header('Location: /SistemaAsociadoAPP/');//Aqui lo redireccionas al lugar que quieras.
     die() ;

    }
?>


<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema-Asociado-Home</title>
    <?php
    require "../moduls/head.php";
    ?>
</head>
<body>

    
    <!--------------------------------Barra del Navegador------------------------------------------------>
    <nav class="navbar navbar-expand-lg navbar navbar-dark bg-primary border-top border-bottom">
        <a class="navbar-brand" href="#">Sistema de Control de Asociados</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
            <li class="nav-item active">
            <button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#myModal">Crear Asociado</button>
            </li>
            
            <!--
            <li class="nav-item">
                <a class="nav-link" href="#">Crear Asociado</a>
            </li>
            -->
            <li class="nav-item">
            <button type="button" id="btnSalir" class="btn btn-secondary mr-1 ml-1" >Cerrar Session</button>
            </li>
            <li class="nav-item">
            
            <form class="form-inline my-2 my-lg-0">
                <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-white my-2 my-sm-0" type="submit">Buscar</button>
            </form>
            </li>
            </ul>
        </div>
    </nav>
    <!---------------------------------------------------------------------------------------------------------->
    <div class="row d-flex justify-content-center pt-2 ">
      <div class="col-md-10">
        <table class="table" id="cuerpo">
            <thead class="thead-dark">
            <tr>
                <th scope="col">id</th>
                <th scope="col">nombres</th>
                <th scope="col">apellidos</th>
                <th scope="col">FechaNacimiento</th>
                <th scope="col">telefono</th>
                <th scope="col">dui</th>
                <th scope="col">acciones</th>
                

            </tr>
            <tr>
            <td>1</td>
            <td>Aaron</td> 
            <td>castillo</td>
            <td>2021-07-14</td>
            <td>1111111</td>
            <td>111111111</td>
            <td>
                <button type="button" rel="tooltip" class="btn btn-warning btn-sm" >
                <i class="material-icons">edit</i>
                </button>
                <button type="button" rel="tooltip" class="btn btn-danger btn-sm" >
                <i class="material-icons">delete</i>
                </button>
                </td>
            </tr>
            </thead>
            <tbody>
            </tbody >
         </table>
      </div>
    </div>
    <!------------------------Modal Insertar Asociado-------------------------------------------------------->
    <div class="modal" id="myModal" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="" id="formulario">
                        <div class="form-group">
                            <input type="text" id="nombre"  name="nombre" maxlength="25"  placeholder="Nombres" class="form-control" >
                        </div>
                        <div class="form-group">
                            <input type="text" id="apellido" maxlength="25" name="apellido"  placeholder="Apellidos"  class="form-control" >
                        </div>
                        <div class="form-group">
                            <input type="date" id="fecha_nac"   name="fecha_nac" placeholder="Fecha Nacimiento"  class="form-control" >
                        </div>
                        <div class="form-group">
                            <input type="number" id="telefono" maxlength="8" name="telefono"  placeholder="Telefono"  class="form-control" >
                        </div>
                        <div class="form-group">
                            <input type="number" id="dui" maxlength="10"  name="dui" placeholder="Numero de Dui(sin guiones)"  class="form-control" >
                        </div>
                    
                    </div>
                </form>
                <div class="modal-footer">
                    <button type="button" id="btncreate" class="btn btn-primary">Crear Asosciado</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
                <div id="noData" class=" m-2 alert alert-danger  " role="alert">
                     Llena los campos del formulario
                </div>
                <div id="siData" class=" m-2 alert alert-success  " role="alert">
                     Registro Completado Exitosamente!
                </div>
            </div>
           
            </div>
        </div>
    </div>
        <div id="sessionFin" class=" m-2 alert alert-info  " role="alert">
            Session Finalizada
            </div>
   
<!------------------------Modal Insertar Asociado-------------------------------------------------------->

    
    


    <script type="text/javascript">
         $( document ).ready(function() {
            /*let getAll;

            $.ajax({
                method: "GET",
                url: "/SistemaAsociadoAPP/controller/asociadoController.php",
                    success:function(response){
                    var getAll = response;
                    
                    
                    
                    
                    console.log(getAll);
                    console.log(lenght);
                    $("#cuerpo").html("");
                    for(var i=0; i<length(getAll); i++){
                        
                        var tr = `<tr>'+
                        '<th scope="col">id</th>'+
                        '<th scope="col">nombres</th>'+
                        '<th scope="col">apellidos</th>'+
                        '<th scope="col">FechaNacimiento</th>'+
                        '<th scope="col">telefono</th>'+
                        '<th scope="col">dui</th>'+
                        '</tr>'
                        <td>`+getAll[i].nombres+`</td>
                        <td>`+getAll[i].apellidos+`</td>
                        <td>`+getAll[i].fecha_nac+`</td>
                        <td>`+getAll[i].telefono+`</td>
                        <td>`+getAll[i].dui+`</td>
                        <td>`+getAll[i].estado+`</td>
                        </tr>`;
                        $("#cuerpo").append(tr)
                    }
                    }
                })*/
                

           
               
            $('#noData').hide();
            $('#sessionFin').hide();
            
            $('#siData').hide();
            /*var session = "<?php echo $_SESSION['user']; ?>";
            if(session == null){
                let url = "/SistemaAsociadoAPP/"
                $(location).attr('href',url);

                
                
            }else{
                console.log("hola");

                
                   
   
                
            }*/

            



            //metodo para cerrar session
            $("#btnSalir").click(function() {
                $.ajax({
                    url:"/SistemaAsociadoAPP/controller/loginController.php",
                    method:"GET",
                    
                    success:function(response){
                        if(response == "listo"){
                            console.log(response);
                            
                            let url = "/SistemaAsociadoAPP/"
                            $(location).attr('href',url);
                            
                        }
                       
                    }
                })

                
                
            });
            
            //metodo para crear un asosiado           
            $("#btncreate").click(function(){
                
                
                var nombre = $('#nombre').val();
                var apellido = $('#apellido').val();
                var fecha_nac = $('#fecha_nac').val();
                var telefono = $('#telefono').val();
                var dui = $('#dui').val();
                
                $.ajax({
                    url:"/SistemaAsociadoAPP/controller/asociadoController.php",
                    method:"POST",
                    data: $("#formulario").serialize(),
                    success:function(response){
                        console.log(response);
                        let result = response;
                        console.log(result);

                        switch (result) {
                        case "No ha creado el nuevo registro!Llenar":
                            $("#noData").fadeTo(1000, 500).slideUp(500, function() {
                           });
                            break;
                        case "Se ha creado el nuevo registro!entro":
                            console.log("si hay reg");
                            $("#siData").fadeTo(1000, 500).slideUp(500, function() {
                                location.reload();
                           });
                            
                            break;
                        }
                       
                    }
                })
                
            
            });
            
            
            
        });
        
    </script>
</body>
</html>