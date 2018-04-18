@extends('master')
@section('content')
    <div class="page-content d-flex align-items-stretch">  
		<div class="row mt-2" id="card-prof">
			<div class="col-md-3">
				<div class="card hovercard">
					<div class="cardheader"></div>
					<div class="info">
						<div class="title">
							<a target="_blank" href="#">Nama Kelompok</a>
						</div>
						<div class="desc">Tugas Besar III <br> IF2121 - Strategi Algoritma</div> 
						<hr>
					</div>
				</div>
			</div>
			<div class="col-md-9">
				<div class="card hovercard">
					<div class="tab" role="tabpanel"> 
						<ul class="nav nav-tabs" role="tablist">
							<li class="nav-item ">
								<a class="nav-link active" href="#home" role="tab" data-toggle="tab"><span><i class="fa fa-home"></i></span> Halaman Depan</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" href="#profile" role="tab" data-toggle="tab"><span><i class="fa fa-user"></i></span> Informasi Akun</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" href="#setting" role="tab" data-toggle="tab"><span><i class="fa fa-cog"></i></span> Pengaturan</a>
							</li>
						</ul>
						<!-- Tab panes -->
						<form method="POST" action="{{url('/hasil')}}" id="formId">
							<div class="tab-content tabs">
								<div role="tabpanel" class="tab-pane fade show active" id="home">
									<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras nec urna aliquam, ornare eros vel, malesuada lorem. Nullam faucibus lorem at eros consectetur lobortis. Maecenas nec nibh congue, placerat sem id, rutrum velit. </p>
									<div class="row" id="report4">
										<div class="col-md-4">
											<div class="card text-center social-bottom sb-fb">
												{{-- <i class="fa fa-code"></i> --}}
												<p>Algoritma Boyer-Moore</p>
											</div>
										</div>
										<div class="col-md-4">
											<div class="card text-center social-bottom sb-tw">
												{{-- <i class="fa fa-twitter"></i> --}}
												<p>Algoritma KMP</p>
											</div>
										</div>
										<div class="col-md-4">
											<div class="card text-center social-bottom sb-gp">
												{{-- <i class="fa fa-google-plus"></i> --}}
												<p>Algoritma Regex</p>
											</div>
										</div> 
									</div>
								</div>
								<div role="tabpanel" class="tab-pane fade" id="profile">
									<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras nec urna aliquam, ornare eros vel, malesuada lorem. Nullam faucibus lorem at eros consectetur lobortis. Maecenas nec nibh congue, placerat sem id, rutrum velit. </p>
									<div class="row">
										<div class="col-md-6">
											<div class="form-group">
												<label for="consumer_key">Consumer Key</label>
												<input type="text" class="form-control" name="consumer_key" placeholder="Biarkan kosong untuk menggunakan default" value="{{old('consumer_key')}}">
											</div>
											<div class="form-group">
												<label for="consumer_secret">Consumer Secret</label>
												<input type="consumer_secret" class="form-control" name="consumer_secret" placeholder="Biarkan kosong untuk menggunakan default" value="{{old('consumer_secret')}}">
											</div>
										</div>
										<div class="col-md-6"> 
											<div class="form-group">
												<label for="access_token">Access Token</label>
												<input type="text" class="form-control" name="access_token" placeholder="Biarkan kosong untuk menggunakan default" value="{{old('access_token')}}">
											</div> 
											<div class="form-group">
												<label for="access_secret">Access Secret</label>
												<input type="access_secret" class="form-control" name="access_secret" placeholder="Biarkan kosong untuk menggunakan default" value="{{old('access_secret')}}" required>
											</div>  
										</div>
									</div>
									<a class="nav-link btn btn-general btn-blue" href="#setting" role="tab" data-toggle="tab" onclick="changeSetting()">Selanjutnya</a>
								</div>
								<div role="tabpanel" class="tab-pane fade" id="setting">
									<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras nec urna aliquam, ornare eros vel, malesuada lorem. Nullam faucibus lorem at eros consectetur lobortis. Maecenas nec nibh congue, placerat sem id, rutrum velit. </p>
									<div class="row">
										<div class="col-md-6">
											<div class="form-group">
												<label for="spam_keyword">Kata Kunci *</label>
												<input type="text" class="form-control" name="spam_keyword" placeholder="Masukkan kata kunci spam" value="{{old('keyword')}}" required>
											</div>
											<div class="form-group">
												<label for="start_datetime">Tanggal Mulai Pencarian *</label>
												<input class="form-control" type="datetime-local" value="2018-04-20T13:45:00" name="start_datetime" value="{{old('start_datetime')}}" required>
											</div> 
										</div>
										<div class="col-md-6"> 
											<div class="form-group">
												<label for="algorithm">Algoritma *</label>
												<select class="form-control" name="algorithm" required>
													<option selected disabled>Pilih algoritma</option>
													<option value="1">Boyer-Moore</option>
													<option value="2">KMP</option>
													<option value="3">Regex</option>
												</select>
											</div>
											<div class="form-group">
												<label for="end_datetime">Tanggal Akhir Pencarian *</label>
												<input class="form-control" type="datetime-local" value="2018-04-20T13:45:00" name="end_datetime" value="{{old('end_datetime')}}" required>
											</div> 
										</div>
									</div>
									{{(method_field('put'))}}
									<input type="hidden" name="_token" value="{{ csrf_token() }}">
									<button type="submit" class="btn btn-general btn-blue" onclick="document.getElementById('formId').submit();">Cari</button>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div> 
	</div>
@endsection
@section('script')
	<script>
		function changeSetting() {
			$('[href="#setting"]').tab('show');
		}
	</script>
@endsection