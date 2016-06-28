<div class="wrapper">
    <header class="main-header">
        <!-- Logo -->
        <a href="#" class="logo">
          <!-- mini logo for sidebar mini 50x50 pixels -->
          <span class="logo-mini"></span>
          <!-- logo for regular state and mobile devices -->
          <span class="logo-lg"><b>Kullabs</b></span>
        </a>
        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top" role="navigation">
          <!-- Sidebar toggle button-->
          <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
          </a>
          <!-- Navbar Right Menu -->
          <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
	            <li class="dropdown user user-menu">
	                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
	                {{ Html::image("img/user.png", trans("main.user_image"), array('class'=>'user-image') )}}
	                  <span class="hidden-xs">{{Session::get('user.firstName'). ' '.Session::get('user.lastName') }}</span>
	                </a>
	                <ul class="dropdown-menu">
	                  <!-- User image -->
	                  <li class="user-header">
	                  {{ Html::image("img/user.png", trans("main.user_image"), array('class'=>'img-image') )}}
	                    <p>
	                      {{Session::get('user.firstName'). ' '.Session::get('user.lastName') }} - Web Developer
	                      <small>Member since June. 2016</small>
	                    </p>
	                  </li>
	                  <!-- Menu Footer-->
	                  <li class="user-footer">
	                    <div class="pull-left">
	                      <a href="#" class="btn btn-default btn-flat">Profile</a>
	                    </div>
	                    <div class="pull-right">
	                      {{ Html::linkRoute('auth.logout', 'Sign out', array(), array('class' => 'btn btn-default btn-flat', 'title' => 'Sign out')) }} 
	                    </div>
	                  </li>
	                </ul>
	              </li>
	              <li>
                <!-- <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a> -->
              </li>
            </ul>
          </div>

        </nav>
      </header>