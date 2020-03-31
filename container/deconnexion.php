<?php

unset($_SESSION['administrateur']);

unset($_SESSION['utilisateur']);

// header('Location: index.php?page=6');

echo '<script> window.location="index.php?page=1"</script>';

?>