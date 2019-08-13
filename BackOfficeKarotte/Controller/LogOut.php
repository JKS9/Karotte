<?php
/** Page de déconnexion **/
session_start();
session_destroy();
header('location: Karotte/BackOfficeKarotte/');
?>