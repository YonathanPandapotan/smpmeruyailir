@extends('maindashboard')

@section('kontentadmin')
<h1>Dashboard <small>Statistik Website</small></h1>

<ol class="breadcrumb" style="font-size: 15px">
  <li>
    <a href="#"><span class="fa fa-home"></span> Home</a>
  </li>
</ol>

<div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
   <div class="tile-stats">
     <div class="icon" style="padding-top:15px"><i class="fa fa-newspaper-o"></i></div>
     <div class="count"><?php echo $data['berita']; ?></div>
     <h3>Berita</h3>
     <p><a href="/admin/berita">View Details</a></p> 
   </div>
</div>

<div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
   <div class="tile-stats">
     <div class="icon" style="padding-top:15px"><i class="fa fa-users"></i></div>
     <div class="count"><?php echo $data['siswa']; ?></div>
     <h3>Siswa</h3>
     <p><a href="/admin/siswa">View Details</a></p> 
   </div>
</div>

<div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
   <div class="tile-stats">
     <div class="icon" style="padding-top:15px"><i class="fa fa-users"></i></div>
     <div class="count"><?php echo $data['guru']; ?></div>
     <h3>Guru</h3>
     <p><a href="/admin/guru">View Details</a></p> 
   </div>
</div>

<div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
   <div class="tile-stats">
     <div class="icon" style="padding-top:15px"><i class="fa fa-users"></i></div>
     <div class="count"><?php echo $data['alumni']; ?></div>
     <h3>Alumni</h3>
     <p><a href="/admin/alumni">View Details</a></p> 
   </div>
</div>

<div class="col-md-12 col-sm-12 col-xs-12">
  <div class="x_panel">
     <div class="x_title">
      <h2><i class="fa fa-bar-chart-o"></i> Info User</h2>
      <ul class="nav navbar-right panel_toolbox">
         <li><a class="close-link"><i class="fa fa-close"></i></a>
         </li>
       </ul>
      <div class="clearfix"></div>
     </div>
     <div class="x_content">
        <div class="col-md-6">
          <table class="table"  style="font-weight: bold;">
            <tbody>
              <tr>
                <th>Username</th>
                <th>:</th>
                <th>{{Session::get('username')}}</th>
              </tr>

              <tr>
                <th>Email</th>
                <th>:</th>
                <th>{{Session::get('email')}}</th>
              </tr>

            </tbody>
          </table>
        </div>
  
     </div>
  </div>
</div>
@endsection