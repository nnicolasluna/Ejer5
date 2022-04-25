<?php
     $conexion = mysqli_connect('localhost','root','','bdverifica'); 
     $conex = mysqli_connect('localhost','root',''); 
     $conectado = mysqli_connect("localhost","root","","example"); 


//SELECT * from bdverifica.axes, example.prueba where extract(month from bdverifica.axes.fecha)=extract(month from example.prueba.fecha) and bdverifica.axes.tecn=example.prueba.tecn GROUP BY bdverifica.axes.TECN

     //$q=mysqli_num_rows(mysqli_query($conex,"SELECT * from bdverifica.axes, example.prueba where extract(month from bdverifica.axes.fecha)=extract(month from example.prueba.fecha) and bdverifica.axes.tecn=example.prueba.tecn GROUP BY bdverifica.axes.TECN"));
     //print_r($q);
     
     //  SELECT bdverifica.axes.fecha,example.prueba.fecha from bdverifica.axes, example.prueba where extract(month from bdverifica.axes.fecha)=extract(month from example.prueba.fecha) and bdverifica.axes.tecn=example.prueba.tecn and bdverifica.axes.operador=example.prueba.operador GROUP BY bdverifica.axes.TECN   
     
     //SELECT * FROM mediciones m1, (SELECT tec FROM mediciones2 where operador='entel' and Extract(month from fecha)='10' GROUP BY operador) m2 WHERE m1.operador='entel'and Extract(month from m1.fecha)='10' and m1.tec=m2.tec GROUP BY m1.tec


     //SELECT bdverifica.axes.fecha,example.prueba.fecha from bdverifica.axes, example.prueba where extract(month from bdverifica.axes.fecha)=extract(month from example.prueba.fecha) and bdverifica.axes.tecn=example.prueba.tecn and bdverifica.axes.operador=example.prueba.operador



// ultimo SELECT bdverifica.axes.fecha,example.prueba.fecha from bdverifica.axes, example.prueba where extract(month from bdverifica.axes.fecha)=extract(month from example.prueba.fecha) and bdverifica.axes.tecn=example.prueba.tecn and bdverifica.axes.operador=example.prueba.operador and extract(year from bdverifica.axes.fecha)=extract(year from example.prueba.fecha)
?>