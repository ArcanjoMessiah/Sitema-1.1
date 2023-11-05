<?php
if (!isset($_SESSION["usuario"])) {
    echo "<script>";
    echo "window.location.href = '../index.php';";
    echo "</script> ";
}
?>
