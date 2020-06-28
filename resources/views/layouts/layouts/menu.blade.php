
    <!-- Left side column. contains the logo and sidebar -->
    <aside class="main-sidebar">
      <!-- sidebar: style can be found in sidebar.less -->
      <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
          <div class="pull-left image">
            <img src="{{ url('design/adminlte') }}/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
          </div>
          <div class="pull-left info">
            <p>{{ admin()->user()->name }}</p>
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
        <ul class="sidebar-menu" data-widget="tree">
          <li class="header">MAIN NAVIGATION</li>

          <li class="{{ active_menu('clientdeal')[0] }}">
            <a href="{{ aurl('') }}">
              <i class="fa fa-dashboard"></i> <span>Client Deals</span>
              <span class="pull-right-container"></span>
            </a>

          </li>

          <li class="{{ active_menu('github-search')[0] }}">
            <a href="/github-search">
              <i class="fa fa-github"></i> <span>Github Search</span>
              <span class="pull-right-container"></span>
            </a>

          </li>


        </ul>

      </section>
      <!-- /.sidebar -->
    </aside>







