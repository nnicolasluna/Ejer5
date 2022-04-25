<?php 
session_start();
if(isset($_SESSION['nombreuser'])){
    $ci=$_SESSION['ci'];
}
else{
    header("location: login.php");
}
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>FCPN</title>
        <link href="css/styles.css" rel="stylesheet" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script>
    </head>
    <body class="nav-fixed">
        <nav class="topnav navbar navbar-expand navbar-dark bg-dark">
            <a class="navbar-brand ps-3" href="promedio.php"><b>FCPN</b></a>
            <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">         </form>
            <!-- Navbar-->
            <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        
                        <li><a class="dropdown-item" href="logout.php">Logout</a></li>
                    </ul>
                </li>
            </ul>
        </nav>
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sidenav accordion sidenav-dark" id="sidenavAccordion">
                    <div class="sidenav-menu">
                        <div class="nav">
                            <div class="sidenav-menu-heading">SISTEMA</div>
                            


                            <?php                                      
                                   $ci=$_SESSION['ci'];
                                   $x=mysqli_fetch_row(mysqli_query(mysqli_connect("localhost","root","","joelluna"),"SELECT rol FROM `acceso` WHERE ci='$ci' ")); 
                                   if($x[0]=='est'){
                            ?>
                            <a class="nav-link" href="ds.php    ">
                                <div class="nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                NOTAS
                            </a>
                            <?php }?>
                            <a class="nav-link collapsed" href="promedio.php" data-bs-toggle="collapse" data-bs-target="#collapsePages" aria-expanded="false" aria-controls="collapsePages">
                                <div class="nav-link-icon"><i class="fas fa-book-open"></i></div>
                                PROMEDIO
                                
                            </a>
                   
                        </div>
                    </div>
                  
                </nav>
            </div>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">PROMEDIOS</h1>
                        <ol class="breadcrumb mb-4">
                        </ol>
                        <div class="card mb-4">
                            <div class="card-body">

                              <?php
                                $ci=$_SESSION['ci'];
                                $conex = mysqli_connect("localhost","root","","joelluna");
                                $sql="SELECT p.departamento,AVG(i.notafinal) FROM persona p, inscripcion i WHERE p.ci=i.ciestudiante GROUP BY p.departamento; ";
                                $pregunta=mysqli_query($conex,$sql);
                                $results = array();
                                while($row = mysqli_fetch_assoc($pregunta)) {
                                    $results[]=$row;
                                }
                                $array_final = array();
                                foreach ($results as $result){
                                $array_final[] = $result;
                                }
                                echo "<style>table, td, tr {border: 1px solid;text-align: center;}table {border-collapse:collapse;}</style>";
                                echo "<table  border=1 style=width:40%>";  
                                echo "<tr>"; 
                                echo "<td>Departamento</td>"; 
                                echo "<td>Promedio</td>";
                                echo "</tr>"; 
                                for ($i=0; $i < count($array_final); $i++) { 
                                
                                echo "<tr>"; 
                                echo "<td>"; 
                                print_r($array_final[$i]['departamento']);
                                echo "</td>"; 
                                echo "<td>"; 
                                print_r($array_final[$i]['AVG(i.notafinal)']);
                                echo "</td>"; 
                                
                                echo "</tr>"; 
                                
                                }
                                echo "</table>";  
                             
                                ?>
                            </div>
                        </div>
                    </div>
                </main>
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid px-4">
                        <div class="d-flex align-items-center justify-content-between small">
                            
                        </div>
                    </div>
                </footer>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    </body>
</html>
