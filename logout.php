<?php 

session_start();

session_destroy();
?>
<script>
    sessionStorage.setItem('pesan', 'logout')
    window.location.href = "http://localhost:8080/swalayanproject"
</script>