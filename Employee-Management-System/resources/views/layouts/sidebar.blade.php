 <!-- Left side column. contains the logo and sidebar -->
 <aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

      <!-- Sidebar user panel (optional) -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="{{ asset("/bower_components/AdminLTE/dist/img/user2-160x160.jpg") }}" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p>{{ Auth::user()->name }}</p>
          <!-- Status -->
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>



      <!-- Sidebar Menu -->
      <ul class="sidebar-menu">
        <!-- Optionally, you can add icons to the links -->
        <li class="active"><a href="/home"><i class="fa fa-dashboard fa-lg"></i> <span>Dashboard</span></a></li>
        <li><a href="{{ url('employees') }}"> <span> Add Employees </span></a></li>

          </a>
          <ul class="treeview-menu">
            <li><a href="{{ url('/departments') }}">Department</a></li>
            <li><a href="{{ url('/divisions') }}">Division</a></li>
            <li><a href="{{ url('/countries') }}">Country</a></li>
            <li><a href="{{ url('/cities') }}">City</a></li>
          </ul>
        </li>
        <li><a href="{{ url('/users') }}"><span> Add User </span></a></li>
        <li><a href="{{ url('/report') }}"><span> Generate Reports </span></a></li>

      </ul>
      <!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
  </aside>
