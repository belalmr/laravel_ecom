@include('admin.layout.header')
@include('admin.layout.navbar')


  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Dashboard
        <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard</li>
      </ol>
    </section>

    <section class="content">
      
		  @include('admin.layout.message')
		  @yield('content')

    </section>
</div>

@include('admin.layout.footer')