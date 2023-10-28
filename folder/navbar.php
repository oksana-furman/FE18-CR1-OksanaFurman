<nav class="navbar">
            <a href="../components/index.php" id="logoLink">
                <p id="logoText">Food Blog</p>
            </a>
            <a href="../components/index.php" class="navLink">Sweet</a>
            <a href="#" class="navLink">Savory</a>
            <a href="../components/file-recipe.php" class="navLink">Recipe of the Month</a>
            <div class="d-flex">
                <?php
                    if (isset($_SESSION['adm'])) {
                        echo "<a href='../logout.php' class='navLink'>Log Out</a>
                            <a href='../dashboard.php' class='adm  mt-3 mx-2'><i class='bi bi-person-circle'></i></a>";
                            
                    } elseif (isset($_SESSION['user'])) {
                            echo "<a href='../logout.php?logout' class='navLink' >Log Out</a>
                                <a href='../home.php' class='user mt-3 mx-2'><i class='bi bi-person-circle'></i></a>";
                    } else {
                        echo "<a href='../index.php'  class='navLink'>Log in</a>";
                    }
                ?>
            </div>
</nav>
<!-- <script>
var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
  return new bootstrap.Tooltip(tooltipTriggerEl)
})
</script> -->
