<nav class="navbar">
            <a href="./home.php" id="logoLink">
                <p id="logoText">Food Blog</p>
            </a>
            <a href="./index.php" class="navLink">Sweet</a>
            <a href="#" class="navLink" data-bs-toggle="tooltip" data-bs-title="Coming soon!">Savory</a>
            <a href="./file-recipe.php" class="navLink">Recipe of the Month</a>
            <div class="d-flex">
                <?php
                    if (isset($_SESSION['adm'])) {
                        echo "<a href='../logout.php?logout' class='user mx-2'>Log Out</a>
                            <a href='../dashboard.php' class='navLink mx-2'><i class='bi bi-person-circle'></i></a>";
                            
                    } elseif (isset($_SESSION['user'])) {
                            echo "<a href='../logout.php?logout' class='user mx-2'>Log Out</a>
                                <a href='../home.php' class='navLink mx-2'><i class='bi bi-person-circle'></i></a>";
                    } else {
                        echo "<a href='../index.php' class='user mx-2'>Log in</a>";
                    }
                ?>
            </div>
</nav>
<script>
var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
  return new bootstrap.Tooltip(tooltipTriggerEl)
})
</script>
