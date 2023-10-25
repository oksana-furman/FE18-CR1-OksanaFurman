<nav class="navbar">
            <a href="../components/index.php" id="logoLink">
                <p id="logoText">Food Blog</p>
            </a>
            <a href="../components/index.php" class="navLink">Sweet</a>
            <a href="#" class="navLink">Savory</a>
            <a href="../components/file-recipe.php" class="navLink">Recipe of the Month</a>
           
           <?php
           if (isset($_SESSION['adm'])) {
            echo "<a href='../login/dashboard.php' class='adm m-4'><i class='bi bi-person-circle'></i></a>";
           } elseif (isset($_SESSION['user'])) {
                echo "<a href='../login/home.php' class='user m-4'><i class='bi bi-person-circle'></i></a>";
           } else {
             echo "<a href='../login/index.php'>Log in</a>";
           }
           ?>

</nav>
<script>
var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
  return new bootstrap.Tooltip(tooltipTriggerEl)
})
</script>
