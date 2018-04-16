@extends('master')
@section('style')
    <style>
        th {
            text-align: center;
        }
    </style>
@endsection
@section('content')
     <div class="page-content d-flex align-items-stretch">
        <!--***** SIDE NAVBAR *****-->
        <nav class="side-navbar">
            <div class="sidebar-header d-flex align-items-center">
                <div class="title">
                    <h1 class="h4"><i class="fa fa-search"></i> Hasil Pencarian</h1>
                </div>
            </div>
            <hr>
            <!-- Sidebar Navidation Menus-->
            <ul class="list-unstyled">
                <li style="margin-left:20px;">RINGKASAN</li>
                <li style="margin-left:20px;">Jumlah data: </li>
                <li style="margin-left:20px;">Jumlah spam: </li>
                <li> <a href="{{url('/')}}"><i class="icon-home"></i>Kembali ke Beranda</a></li>
        </nav>
        <div class="content-inner chart-cont">
            <!--***** CONTENT *****-->     
            <div class="row">
                <table class="table table-hover">
                  <thead>
                    <tr class="bg-info text-white">
                      <th>#</th>
                      <th>Nama Pengguna</th>
                      <th>Isi Pesan</th>
                      <th>Tanggal Dibuat</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr class="table-success">
                      <th scope="row">1</th>
                      <td>@malfianrasyidin</td>
                      <td>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras nec urna aliquam, ornare eros vel, malesuada lorem. Nullam faucibus lorem at eros consectetur lobortis. Maecenas nec nibh congue, placerat sem id, rutrum velit.</td>
                      <td>20 April 2018 20:00:00</td>
                    </tr>
                    <tr class="table-danger">
                      <th scope="row">2</th>
                      <td>@malfianrasyidin</td>
                      <td>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras nec urna aliquam, ornare eros vel, malesuada lorem. Nullam faucibus lorem at eros consectetur lobortis. Maecenas nec nibh congue, placerat sem id, rutrum velit.</td>
                      <td>20 April 2018 20:00:00</td>
                    </tr>
                  </tbody>
                </table>
            </div> 
        </div>
    </div> 
@endsection