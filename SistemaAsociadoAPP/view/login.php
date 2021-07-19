<!DOCTYPE html>
<html lang="es">
    
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login</title>
    
    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<style>
body {
  background-image: url('view/assest/img/fondo.jpg');
}
</style>
</head>
<body class="login">
    <div class="row ">
        <div class="card border border-dark" style=" width:35%;margin: auto auto;margin-top:20%" >
            <div class="card-body">
                <div class="login">
                    <div class="account-login bg">
                    <h1 class="pb-4 border-bottom text-center" >Login</h1>
                    <form method="" id="formulario">
                        <div class="form-group">
                            <input type="text" id="user" name="user" placeholder="Usuario" class="form-control">
                        </div>
                        <div class="form-group">
                            <input type="password" id="password" name="password" placeholder="Password"  class="form-control">
                        </div>
                        <button id="btnEnviar" class="btn btn-primary btn-lg btn-block">Login</button>
                    
                    
                    </div>
                    </form>
                    
                </div>
            </div>
            <div id="alertyes" class=" m-2 alert alert-success  " role="alert">
            Haz Iniciado Correctamente
            </div>
            <div id="alertno" class=" m-2 alert alert-danger  " role="alert">
            Error al iniciar session
            </div>
    </div>
    
</div>

<script>

    $(document).ready(function(){
        $('#alertyes').hide();
        $('#alertno').hide();
        $('#btnEnviar').click(function (){
            event.preventDefault();
            var user = $('#user').val();
            var password = $('#password').val();

            
            
            if(user != '' && password != ''){
                $.ajax({
                    url:"controller/loginController.php",
                    method:"POST",
                    data: $("#formulario").serialize(),
                    
                    success:function(response){
                        console.log(response);
                       if(response == 'entro'){
                        let url = "view/content/home.php"

                        setTimeout(function() {
                            $("#alertyes").fadeTo(2000, 500).slideUp(500, function() {
                            
                            
                           });                            
                        },3000);

                        $(location).attr('href',url);
                            
                       }else{
                        $("#alertno").fadeTo(2000, 500).slideUp(500, function() {
                           });
                       }
                        

                    }
                })
            }else{

            }
        });

    });

</script>

    
</body>
</html>
