
<?php 



?>
<nav class="col-md-2 d-none d-md-block bg-light sidebar">
          <div class="sidebar-sticky">
            <ul class="nav flex-column">
              <li class="nav-item">
                <a class=" nav-link  <?php if( $page == 'Home'){ echo "active" ;}?>" href="http://<?php  echo $_SERVER['HTTP_HOST'];?>/ecom/admin/home.php">
                  <span data-feather="home"></span>
                  Home <span class="sr-only">(current)</span>
                </a>
              </li>
              <li class="nav-item">
                <a class=" nav-link  <?php if( $page == 'Categories'){ echo "active" ;}?>" href="http://<?php echo $_SERVER['HTTP_HOST'];?>/ecom/admin/categories/liste.php">
                  <span data-feather="file"></span>
                  Categories
                </a>
              </li>
              <li class="nav-item">
                <a class=" nav-link  <?php if( $page == 'Products'){ echo "active" ;}?>" href="http://<?php echo $_SERVER['HTTP_HOST'];?>/ecom/admin/produit/liste.php">
                  <span data-feather="shopping-cart"></span>
                  Products
                </a>
              </li>
              <li class="nav-item">
                <a class=" nav-link  <?php if( $page == 'Customers'){ echo "active" ;}?>" href="http://<?php echo $_SERVER['HTTP_HOST'];?>/ecom/admin/visiteurs/liste.php">
                  <span data-feather="users"></span>
                  Customers
                </a>
              </li>
              <li class="nav-item">
                <a class=" nav-link  <?php if( $page == 'stock'){ echo "active" ;}?>" href="http://<?php echo $_SERVER['HTTP_HOST'];?>/ecom/admin/stocks/liste.php">
                  <span data-feather="bar-chart-2"></span>
                  stock
                </a>
              </li>
              <li class="nav-item">
                <a class=" nav-link  <?php if( $page == 'Paniers'){ echo "active" ;}?>" href="http://<?php  echo $_SERVER['HTTP_HOST'];?>/ecom/admin/commandes/liste.php">
                  <span data-feather="shopping-bag"></span>
                  Paniers
                </a>
              </li>
           
              <li class="nav-item"> 
                 <a class=" nav-link  <?php if( $page == 'Profile'){ echo "active" ;}?> " href="http://<?php  echo $_SERVER['HTTP_HOST'];?>/ecom/admin/profil.php"> 
                 <span data-feather="layers"></span>
                  Profile
                </a>
              </li>
            </ul>

           
          </div>
        </nav>
        
                 