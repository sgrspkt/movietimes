<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
<?php $value['username'];
                ?>

          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      <!-- search form -->
      <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Search...">
              <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
        </div>
      </form>
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu">
        <li class="header">MAIN NAVIGATION</li>
         <!--admin-->
        <li class="treeview">
          <a href="#">
            <i class="fa fa-dashboard"></i> <span>Admin</span> <i class="fa fa-angle-left pull-right"></i>
          </a>
          <ul class="treeview-menu">
            <?php
            require_once('model/admin.class.php');
            $admin=new Admin();
            $views = $admin->viewAdmin();
            foreach($views as $view){
              if($view['role'] == '1'){ ?>
             <li><a href="index.php?page=admin&action=add"><i class="fa fa-circle-o"></i> Add Admin</a></li>
           <?php } } ?>
            <li><a href="index.php?page=admin&action=view"><i class="fa fa-circle-o"></i> View Admin</a></li>
          </ul>
        </li>
        <!--movie-->
        <li class="treeview">
          <a href="#">
            <i class="fa fa-dashboard"></i> <span>Movies</span> <i class="fa fa-angle-left pull-right"></i>
          </a>
          <ul class="treeview-menu">
            <li class="active"><a href="index.php?page=hall&action=add"><i class="fa fa-circle-o"></i> Add Movie Hall</a></li>
            <li><a href="index.php?page=hall&action=view"><i class="fa fa-circle-o"></i> View Movie Hall</a></li>
            <li><a href="index.php?page=nowshowing&action=view"><i class="fa fa-circle-o"></i> Now Showing Movies</a></li>
            <li><a href="index.php?page=upcoming&action=view"><i class="fa fa-circle-o"></i> Upcoming Movies</a></li>
          </ul>
        </li>

        <!--about-->
        <li class="treeview">
          <a href="#">
            <i class="fa fa-dashboard"></i> <span>About</span> <i class="fa fa-angle-left pull-right"></i>
          </a>
          <ul class="treeview-menu">
            <li class="active"><a href="index.php?page=about&action=add"><i class="fa fa-circle-o"></i> Add About</a></li>
            <li><a href="index.php?page=about&action=view"><i class="fa fa-circle-o"></i> View About</a></li>
          </ul>
        </li>

      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>
