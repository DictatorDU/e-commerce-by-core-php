<div class="grid_2">
    <div class="box sidemenu">
        <div class="block" id="section-menu">
            <ul class="section menu">
              <?php
              $path = $_SERVER['SCRIPT_FILENAME'];
              $c_page = basename($path,".php");
              ?>
              <style media="screen">
              #active_sidebar {
                background: #315CB4;
                color: #fff;
              }
              </style>
               <li><a
                 <?php if($c_page == "titleslogan"){
                   echo "id='active_sidebar'";
                 }elseif($c_page == "social"){
                   echo "id='active_sidebar'";
                 }elseif($c_page == "copyright"){
                   echo "id='active_sidebar'";}
                 ?>
                 class="menuitem">Site Option</a>
                    <ul class="submenu">
                        <li><a href="titleslogan.php">Title & Slogan</a></li>
                        <li><a href="social.php">Social Media</a></li>
                        <li><a href="copyright.php">Copyright</a></li>

                    </ul>
                </li>

                 <li><a
                   <?php if($c_page == "about"){
                     echo "id='active_sidebar'";
                   }elseif($c_page == "contact"){
                     echo "id='active_sidebar'";
                   }
                   ?>
                   class="menuitem">Update Pages</a>
                    <ul class="submenu">
                        <li><a href="about.php">About Us</a></li>
                        <li><a href="contact.php">Contact Us</a></li>
                    </ul>
                </li>
				<li><a
          <?php if($c_page == "addslider"){
            echo "id='active_sidebar'";
          }elseif($c_page == "sliderlist"){
            echo "id='active_sidebar'";
          }
          ?>
          class="menuitem">Slider Option</a>
                    <ul class="submenu">
                        <li><a href="addslider.php">Add Slider</a> </li>
                        <li><a href="sliderlist.php">Slider List</a> </li>
                    </ul>
                </li>
                <li><a
                  <?php if($c_page == "catagory-add"){
                    echo "id='active_sidebar'";
                  }elseif($c_page == "catagory-list"){
                    echo "id='active_sidebar'";
                  }
                  ?>
                  class="menuitem">Category Option</a>
                    <ul class="submenu">
                        <li><a href="catagory-add.php">Add Category</a> </li>
                        <li><a href="catagory-list.php">Category List</a> </li>
                    </ul>
                </li>
                <li><a
                  <?php if($c_page == "brand-add"){
                    echo "id='active_sidebar'";
                  }elseif($c_page == "brand-list"){
                    echo "id='active_sidebar'";
                  }
                  ?>
                   class="menuitem">Brand Option</a>
                    <ul class="submenu">
                        <li><a href="brand-add.php">Add Brand</a> </li>
                        <li><a href="brand-list.php">Brand List</a> </li>
                    </ul>
                </li>
                <li><a
                  <?php if($c_page == "product-add"){
                    echo "id='active_sidebar'";
                  }elseif($c_page == "product-list"){
                    echo "id='active_sidebar'";
                  }
                  ?>
                  class="menuitem">Product Option</a>
                    <ul class="submenu">
                        <li><a href="product-add.php">Add Product</a> </li>
                        <li><a href="product-list.php">Product List</a> </li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</div>
