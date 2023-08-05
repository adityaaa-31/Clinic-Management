<?php

    session_start();

    $_SESSION['login']=="";

    session_unset();
    session_destroy();

    header("location: ../index.html");
?>

<!-- <script language="javascript">
document.location="../../index.html"; -->

</script>
