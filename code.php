<?php
session_start();
require 'dbcon.php';
if(isset($_POST['delete_time'])){
   $id = mysqli_real_escape_string($con, $_POST['delete_time']);
   $query = "DELETE FROM TBTIME WHERE id='$id' ";
   $query_run = mysqli_query($con, $query);
  if($query_run) {
       $_SESSION['message'] = "Time excluido com sucesso";
       header("Location: index.php");
       exit(0);
   }   else   {
       $_SESSION['message'] = "Não foi possivel excluir o time";
       header("Location: index.php");
       exit(0);
   }
}
if(isset($_POST['update_time'])){
   $id = mysqli_real_escape_string($con, $_POST['id']);
   $time = mysqli_real_escape_string($con, $_POST['time']);
   $pais = mysqli_real_escape_string($con, $_POST['pais']);
   $numtitulo = mysqli_real_escape_string($con, $_POST['numtitulos']);
   $treinador = mysqli_real_escape_string($con, $_POST['treinador']);
   $uniforme = mysqli_real_escape_string($con, $_POST['coruniforme']);
   $query = "UPDATE tbtime SET time='$time', pais='$pais', numtitulos='$numtitulo', treinador='$treinador', coruniforme='$uniforme' WHERE id='$id' ";
   $query_run = mysqli_query($con, $query);
  if($query_run) {
       $_SESSION['message'] = "Time atualizado com sucesso";
       header("Location: index.php");
       exit(0);
   }   else   {
       $_SESSION['message'] = "Time não atualizado";
       header("Location: index.php");
       exit(0);
   }
}

 if(isset($_POST['save_time'])){
    $time = mysqli_real_escape_string($con, $_POST['time']);
    $pais = mysqli_real_escape_string($con, $_POST['pais']);
    $numtitulo = mysqli_real_escape_string($con, $_POST['numtitulos']);
    $treinador = mysqli_real_escape_string($con, $_POST['treinador']);
    $uniforme = mysqli_real_escape_string($con, $_POST['coruniforme']);
   $query = "INSERT INTO TBTIME (time,pais,numtitulos,treinador,coruniforme) VALUES ('$time','$pais','$numtitulo','$treinador','$uniforme')";
   $query_run = mysqli_query($con, $query);
   if($query_run)  {
       $_SESSION['message'] = "Time cadastrado com sucesso!";
       header("Location: time-create.php");
       exit(0);
   }  else  {
       $_SESSION['message'] = "Time não cadastrado";
       header("Location: time-create.php");
       exit(0);
   }
}
?>