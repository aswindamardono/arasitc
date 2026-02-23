<?php
// Reuse the login view which now contains the combined auth page
// We simulate the 'mode=register' to show the register form by default
$this->render_view("index/login.php");
?>
<script>
    // Force switch to register tab (Sliding Overlay: add 'active' class to container)
    document.addEventListener('DOMContentLoaded', function() {
        const container = document.getElementById('container');
        if(container){
             container.classList.add('active');
        }
    });
</script>