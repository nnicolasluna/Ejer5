<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Login</title>
        <link href="css/styles.css" rel="stylesheet" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script>
    </head>
    <body class="bg-primary">
        <form method="POST">
        <div id="layoutAuthentication">
            <div id="layoutAuthentication_content">
                <main>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-5">
                                <div class="card shadow-lg border-0 rounded-lg mt-5">
                                    <div class="card-header"><h3 class="text-center font-weight-light my-4">Login</h3></div>
                                    <div class="card-body">
                                        <form>
                                            <div class="form-floating mb-3">
                                                <input class="form-control" id="inputEmail" type="text" name="user" placeholder="name@example.com" />
                                                <label for="inputEmail">Usuario</label>
                                            </div>
                                            <div class="form-floating mb-3">
                                                <input class="form-control" id="inputPassword" type="password" name="contra" placeholder="Password" />
                                                <label for="inputPassword">Contraseña</label>
                                            </div>
                                            <div class="form-check mb-3">
                                                <input class="form-check-input" id="inputRememberPassword" type="checkbox" value="" />
                                                <label class="form-check-label" for="inputRememberPassword">Recordar Contraseña</label>
                                            </div>
                                            <div class="d-flex align-items-center justify-content-between mt-4 mb-0">
                                                <a class="small" href="password.html"></a>
                                                <input class="btn btn-primary" type="submit" name="ingreso" value="Login">
                                            </div>
                                        </form>
                                    </div>
                                    <?php 
                                        session_start();
                                        if(isset($_SESSION['nombreuser'])){
                                        header("location: login.php");
                                        }
                                        if(isset($_POST['ingreso'])){
                                        $dbhost="localhost";
                                        $dbuser="root";
                                        $dbpass="";
                                        $dbname="joelluna";
                                        $conex=mysqli_connect($dbhost,$dbuser,$dbpass,$dbname);
                                        if(!$conex){
                                            die("No hay conexion".mysqli_connect_error());
                                        }
                                        $usuario=$_POST['user'];
                                        $contra=$_POST['contra'];
                                        $query=mysqli_query($conex,"SELECT * FROM acceso where usuario='".$usuario."' and password='".$contra."'");
                                        $fila=mysqli_fetch_row($query);
                                        $nr=mysqli_num_rows($query);
                                        if(!isset($_SESSION['nombreuser'])){
                                        if($nr==1){
                                            $_SESSION['nombreuser']=$usuario;
                                            $_SESSION['ci']=$fila[0];
                                            $x=mysqli_fetch_row(mysqli_query(mysqli_connect("localhost","root","","joelluna"),"SELECT rol FROM `acceso` WHERE usuario='".$usuario."' and password='".$contra."' ")); 
                                            if($x[0]=='est'){
                                                $_SESSION['nombreuser']=$usuario;
                                                $_SESSION['ci']=$fila[0];
                                              header("location: ds.php");
                                            }
                                            if($x[0]=='dir'){
                                                $_SESSION['nombreuser']=$usuario;
                                                $_SESSION['ci']=$fila[0];
                                                header("location: promedio.php");    
                                            }
                                            
                                        }else if($nr==0){
                                            ?> <h2 class="text-center my-4 bad">¡Datos Incorrectos! </h2> <?php
                                            echo "<script>alert('Usuario no Existe');window.location='login.php</script>'";
                                        }
                                        }
                                        }
                                        
                                    ?>
                                    <div class="card-footer text-center py-3">
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
            <!---->
            <div id="layoutAuthentication_footer">
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid px-4">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Facultad de Ciencias Puras y Naturales</div>
                           
                        </div>
                    </div>
                </footer>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        </form>
        <script src="js/scripts.js"></script>
    </body>
</html>
