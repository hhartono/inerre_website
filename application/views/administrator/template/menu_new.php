 <!-- **********************************************************************************************************************************************************
      MAIN SIDEBAR MENU
      *********************************************************************************************************************************************************** -->
      <!--sidebar start-->
      <aside>
          <div id="sidebar"  class="nav-collapse ">
              <!-- sidebar menu start-->
            <ul class="sidebar-menu" id="nav-accordion">
              
              	  <p class="centered"><a href="#"><img src="/assets_admin/img/logo_inerre_admin.jpg" class="img-circle" width="60"></a></p>
              	  <h5 class="centered"><?php echo ucwords($username);?></h5>
              	  	
                <li class="mt">
                    <a class="<?php echo (isset($dashboardactive))? 'active' : '';?>" href="/administrator">
                        <i class="fa fa-dashboard"></i>
                        <span>Dashboard</span>
                    </a>
                </li>

                <li class="sub-menu">
                    <a class="<?php echo (isset($productactive)||isset($productaddactive))? 'active':'';?>" href="javascript:;" >
                        <i class="fa fa-th"></i>
                        <span>Product</span>
                    </a>
                    <ul class="sub">
                        <li><a class="" href="/administrator/product">All Products</a></li>
                        <li><a class="" href="/administrator/productadd">Add Product</a></li>
                        <li><a class="" href="/administrator/categoryadd">Add Category</a></li>
                    </ul>
                </li>
                <li class="sub-menu">
                    <a class="<?php echo (isset($messageactive))? 'active' : '';?>" href="/administrator/messagecenter" >
                        <i class="fa fa-envelope"></i>
                        <span>Message Center</span>
                    </a>
                </li>

                <li class="sub-menu">
                    <a class="<?php echo (isset($portfolioactive) || isset($portfolioaddactive))? 'active' : '';?>" href="javascript:;">
                        <i class="fa fa-th"></i>
                        <span>Portfolio</span>
                    </a>
                    <ul class="sub">
                        <li><a href="/administrator/portfolio" class="">All Portfolios</a></li>
                        <li><a href="/administrator/portfolioadd" class="">Add Portfolio</a></li>
                    </ul>
                </li>
                  <!-- 
                  <li class="sub-menu">
                      <a href="javascript:;" >
                          <i class="fa fa-book"></i>
                          <span>Extra Pages</span>
                      </a>
                      <ul class="sub">
                          <li><a  href="blank.html">Blank Page</a></li>
                          <li><a  href="login.html">Login</a></li>
                          <li><a  href="lock_screen.html">Lock Screen</a></li>
                      </ul>
                  </li>
                  <li class="sub-menu">
                      <a href="javascript:;" >
                          <i class="fa fa-tasks"></i>
                          <span>Forms</span>
                      </a>
                      <ul class="sub">
                          <li><a  href="form_component.html">Form Components</a></li>
                      </ul>
                  </li>
                  <li class="sub-menu">
                      <a href="javascript:;" >
                          <i class="fa fa-th"></i>
                          <span>Data Tables</span>
                      </a>
                      <ul class="sub">
                          <li><a  href="basic_table.html">Basic Table</a></li>
                          <li><a  href="responsive_table.html">Responsive Table</a></li>
                      </ul>
                  </li>
                  <li class="sub-menu">
                      <a href="javascript:;" >
                          <i class=" fa fa-bar-chart-o"></i>
                          <span>Charts</span>
                      </a>
                      <ul class="sub">
                          <li><a  href="morris.html">Morris</a></li>
                          <li><a  href="chartjs.html">Chartjs</a></li>
                      </ul>
                  </li> -->

              </ul>
              <!-- sidebar menu end-->
          </div>
      </aside>
      <!--sidebar end-->