@if(isset(Session::get('gurudwara')[0]['user_type']))
<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
  <!-- Brand Logo -->
  <a href="{{route('gurudwara.home')}}" class="brand-link" style="display: inline-block;">
    <img id="logo_img" src="" alt=" Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
    <span class="brand-text font-weight-light" id="name_gurdwara"></span>
  </a>

  <!-- Sidebar -->
  <div class="sidebar">
    <!-- Sidebar user panel (optional) -->

    <!-- <div class="user-panel mt-3 pb-3 mb-3 d-flex">
      <div class="image">
        <img src="{{ asset('public/admin/dist/img/user2-160x160.jpg') }}" class="img-circle elevation-2" alt="User Image">
      </div>
      <div class="info">
        <a href="#" class="d-block">Alexander Pierce</a>
      </div>
    </div> -->
   

    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <!-- Add icons to the links using the .nav-icon class
             with font-awesome or any other icon font library -->
        <li class="nav-item">
          <a href="{{route('gurudwara.home')}}" class="nav-link {{Route::currentRouteName()=='gurudwara.home'?'active':''}}">
            <i class="nav-icon fas fa-tachometer-alt"></i>
            <p> Dashboard</p>
          </a>
        </li>
       
        <li class="nav-item">
          <a href="{{route('gurudwara.upload')}}" class="nav-link {{Route::currentRouteName()=='gurudwara.upload' ?'active':''}}">
            <i class="nav-icon fas fa-table"></i>
            <p> Upload Letter Head & Logo</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="{{route('gurudwara.member')}}" class="nav-link {{Route::currentRouteName()=='gurudwara.member' || Route::currentRouteName()=='gurudwara.addmember' || Route::currentRouteName()=='gurudwara.editmember'?'active':''}}">
            <i class="nav-icon fas fa-table"></i>
            <p> Member Management</p>
          </a>
        </li>
        <!-- <li class="nav-item">
          <a href="{{route('admin.services')}}" class="nav-link {{Route::currentRouteName()=='admin.services' || Route::currentRouteName()=='admin.servicesedit'?'active':''}}">
            <i class="nav-icon fas fa-table"></i>
            <p> Services Management</p>
          </a>
        </li> -->
      </ul>
    </nav>
    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
</aside>
<script>
  $( document ).ready(function() {
    // console.log( "ready!" );
    // alert("hii");
    // gurudwara.homeAjax
    $.ajax({
      type: "POST",
      url: "{{ route('gurudwara.homeAjax') }}",
      data:{
        "_token": "{{ csrf_token() }}",
       
      },
      success: function(data){
          // alert(data);
          var obj = JSON.parse ( data );
          // var msg=obj.msg;
          var name=obj.gurudwara_name;
          var url='{{asset('public/gurudwara-image/')}}/'+obj.gurudwara_photo;
          // alert(url)
          $('#name_gurdwara').empty();
          // $('#name_gurdwara').append(name);
          
          $('#gurdwaraName').empty();
          $('#gurdwaraName').append(name);
          $('#logo_img').removeAttr('src');
          $('#logo_img').attr('src',url);

          // $("#accept").hide();
          // $("#reject").hide();
          // $('#actionTd'+id).empty();
          // $('#actionTd'+id).append('<b style="color:#28a745;">Acepted</b>');
        }
    });

  });
</script>
@else
<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
  <!-- Brand Logo -->
  <a href="{{route('admin.home')}}" class="brand-link">
    <img src="{{ asset('public/admin/dist/img/AdminLTELogo.png') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
    <span class="brand-text font-weight-light">Admin</span>
  </a>

  <!-- Sidebar -->
  <div class="sidebar">
    <!-- Sidebar user panel (optional) -->

    <!-- <div class="user-panel mt-3 pb-3 mb-3 d-flex">
      <div class="image">
        <img src="{{ asset('public/admin/dist/img/user2-160x160.jpg') }}" class="img-circle elevation-2" alt="User Image">
      </div>
      <div class="info">
        <a href="#" class="d-block">Alexander Pierce</a>
      </div>
    </div> -->
   

    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <!-- Add icons to the links using the .nav-icon class
             with font-awesome or any other icon font library -->
        <li class="nav-item">
          <a href="{{route('admin.home')}}" class="nav-link {{Route::currentRouteName()=='admin.home'?'active':''}}">
            <i class="nav-icon fas fa-tachometer-alt"></i>
            <p> Dashboard</p>
          </a>
        </li>
        
        <!-- <li class="nav-item">
          <a href="#" class="nav-link">
            <i class="nav-icon fas fa-edit"></i>
            <p>
              Forms
              <i class="fas fa-angle-left right"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="pages/forms/general.html" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>General Elements</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="pages/forms/advanced.html" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Advanced Elements</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="pages/forms/editors.html" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Editors</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="pages/forms/validation.html" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Validation</p>
              </a>
            </li>
          </ul>
        </li> -->
        <!-- <li class="nav-item">
          <a href="" class="nav-link">
            <i class="nav-icon fas fa-table"></i>
            <p> Tables</p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="pages/tables/simple.html" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Simple Tables</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="pages/tables/data.html" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>DataTables</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="pages/tables/jsgrid.html" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>jsGrid</p>
              </a>
            </li>
          </ul>
        </li> -->
        <li class="nav-item">
          <a href="{{route('admin.gurudwara')}}" class="nav-link {{Route::currentRouteName()=='admin.gurudwara' || Route::currentRouteName()=='admin.gurudwaraedit'?'active':''}}">
            <i class="nav-icon fas fa-table"></i>
            <p> Gurdwara Management</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="{{route('admin.user')}}" class="nav-link {{Route::currentRouteName()=='admin.user' || Route::currentRouteName()=='admin.useredit'?'active':''}}">
            <i class="nav-icon fas fa-table"></i>
            <p> User Management</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="{{route('admin.services')}}" class="nav-link {{Route::currentRouteName()=='admin.services' || Route::currentRouteName()=='admin.servicesedit'?'active':''}}">
            <i class="nav-icon fas fa-table"></i>
            <p> Help Management</p>
          </a>
        </li>
      </ul>
    </nav>
    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
</aside>

@endif