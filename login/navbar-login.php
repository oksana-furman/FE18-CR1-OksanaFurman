<nav class="navbar navbar-expand-lg">
  <div class="container-fluid">
    <a class="navbar-brand" id="logoLink" href="../components/home.php">Food Blog</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <!-- <li class="nav-item">
          <a class="nav-link" aria-current="page" href="#">Home</a>
        </li> -->
        
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" role="button" data-bs-toggle="dropdown" aria-expanded="false">Sweet</a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="../components/index.php">All Sweet</a></li>
            <li><a class="dropdown-item" href="../components/bake.php">Bake</a></li>
            <li><a class="dropdown-item" href="../components/no_bake.php">No Bake</a></li>
          </ul>
        </li>
        <li class="nav-item">
          <a class="nav-link disabled" aria-disabled="true" data-bs-toggle="tooltip" data-bs-placement='bottom' data-bs-title="Coming soon!">Savory</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="../components/file-recipe.php">Recipe of the Month</a>
        </li>
        <?php 
          if (isset($_SESSION['adm'])) {
            echo "<li class='nav-item'>
            <a class='nav-link' href='../actions/create.php'>Add a new recipe</a>
          </li>
          <li class='nav-item'>
            <a class='nav-link' href='./dashboard.php'><i class='bi bi-person-circle'></i></a>
          </li>
          <li class='nav-item'>
            <a class='nav-link' href='./logout.php?logout'>Log Out</a>
          </li>";
          } elseif (isset($_SESSION['user'])) {
              echo "<li class='nav-item'>
              <a class='nav-link' href='./home.php'><i class='bi bi-person-circle'></i></a>
            </li>
            <li class='nav-item'>
              <a class='nav-link' href='./logout.php?logout'>Log Out</a>
            </li>";
          } else {
              echo "<li class='nav-item'>
              <a class='nav-link' href='./index.php'>Log In</a>
            </li>";
          }
          
        ?>
        
      </ul>
      <!-- <form class="d-flex" role="search">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success" type="submit">Search</button>
      </form> -->
    </div>
  </div>
</nav>


<script>
var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
  return new bootstrap.Tooltip(tooltipTriggerEl)
})
</script>