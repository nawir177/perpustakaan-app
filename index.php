<?php
session_start();

if (isset($_SESSION['LOGIN']) && $_SESSION['LOGIN'] !== true) {
   header("Location:admin/dashboard");
}else{
   header("Location:home/");
}
