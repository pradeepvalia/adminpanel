@include('admin.header')
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

    @include('admin.slider')
  <div class="content-wrapper">
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0"></h1>
          </div>
          <div class="col-sm-6">
          </div>

        </div>
      </div>
    </div>
    <section class="content">
      <div class="container-fluid">
        @yield('maincontent')
      </div>
    </section>
  </div>

@include('admin.footer')
