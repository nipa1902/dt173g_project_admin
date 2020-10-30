<?php
// Quick auth check: if session is NOT set, bounce to login page, else do nothing
if(!isset($_SESSION['name'])) {
    header("location: http://studenter.miun.se/~nipa1902/writeable/dt173g/projekt/admin/config/login.php?message=För att se sidan krävs att du är inloggad.");
}
?>