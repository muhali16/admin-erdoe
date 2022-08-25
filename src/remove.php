<?php 
session_start();
if(!isset($_SESSION["login"])){
  header("Location: index.php");
  exit;
}
require 'functions.php';

    $id = $_GET["id"];



    if(removeds($id)>0){

        echo "

        <script>

            alert('Data berhasil dihapus!');

            document.location.href = '../dashboard.php';

        </script>"  ;

    } else {

        echo "

        <script>

            alert('Data gagal dihapus!');

            document.location.href = '../dashboard.php';

        </script> ";

    }

?>