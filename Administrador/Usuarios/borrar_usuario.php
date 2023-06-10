<?php
require("../../misc/conn.php");
$id = $_GET["id"];

$sql = "DELETE FROM usuarios WHERE id =".$id."";

$conn->query($sql);
if ($conn->query($sql) === TRUE) {
       echo "<script> location.href='BajaUsuarios.php'; </script>";
    }
