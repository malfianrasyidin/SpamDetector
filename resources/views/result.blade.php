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
				<li style="margin-left:20px;">Jumlah data: {{count($data)}}</li>
				<?php
					$spam = 0;
					foreach($data as $item){
						if ($item['spam_flag']==1){
							$spam++;
						}
					}
				?>
				<li style="margin-left:20px;">Jumlah spam: {{$spam}}</li>
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
						<?php $i = 0 ?>
						@foreach($data as $item)
							@if($item['spam_flag']==1)
								<tr class="table-danger">
							@else
								<tr class="table-success">
							@endif
							<th scope="row">{{$i+1}}</th>
								<td>{{$item['username']}}</td>
								<td>{{$item['message']}}</td>
								<td>{{$item['created_at']}}</td>
							</tr>
							<?php $i++ ?>
						@endforeach
					</tbody>
				</table>
			</div> 
		</div>
	</div> 
@endsection