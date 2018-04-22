@extends('master')
@section('content')
    <div class="page-content d-flex align-items-stretch">  
		<div class="row mt-2" id="card-prof">
			<div class="col-md-3">
				<div class="card hovercard">
					<div class="cardheader"></div>
					<div class="info">
						<div class="title">
							<a target="_blank" href="#">R P M</a>
						</div>
						<div class="desc">Tugas Besar III <br> IF2121 - Strategi Algoritma</div>
						<div class="desc2">
							Pengembang: <br>
							13516005 RIZKI ALIF SALMAN ALFARISY <br>
							13516089 PRIAGUNG SATYAGAMA	<br>
							13516104 MUHAMMAD ALFIAN RASYIDIN <br>
						</div>
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
									<p>Selamat datang! Spam Detector merupakan sebuah program dikembangkan dengan perkakas PHP dengan menggunakan <i>framework</i> Laravel, Python, dan juga dengan menggunakan API Twitter. Program ini dapat melakukan pencarian terhadap <i>keyword</i> yang diduga merupakan spam terhadap <i>tweet</i> yang melakukan <i>mention</i> terhadap Anda. Berikut beberapa algoritma yang dapat Anda pilih untuk melakukan menyelesaikan masalah tersebut: </p>
									<div class="row" id="report4">
										<div class="col-md-4">
											<div class="card text-center social-bottom sb-fb">
												<p>Algoritma Boyer-Moore</p>
											</div>
										</div>
										<div class="col-md-4">
											<div class="card text-center social-bottom sb-tw">
												<p>Algoritma KMP</p>
											</div>
										</div>
										<div class="col-md-4">
											<div class="card text-center social-bottom sb-gp">
												<p>Algoritma Regex</p>
											</div>
										</div> 
									</div>
								</div>
								<div role="tabpanel" class="tab-pane fade" id="profile">
									<p>Isilah formulir berikut ini jika ingin menggunakan akun Twitter pribadi Anda. Informasi ini dapat diperoleh melalui https://apps.twitter.com . Jika Anda ingin menggunakan <i>default</i>, silahkan kosongkan.</p>
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
												<input type="access_secret" class="form-control" name="access_secret" placeholder="Biarkan kosong untuk menggunakan default" value="{{old('access_secret')}}">
											</div>  
										</div>
									</div>
									<a class="nav-link btn btn-general btn-blue" href="#setting" role="tab" data-toggle="tab" onclick="changeSetting()">Selanjutnya</a>
								</div>
								<div role="tabpanel" class="tab-pane fade" id="setting">
									<p>Isilah informasi berikut ini untuk memulai. <i>Keyword</i> dapat dipisahkan dengan koma, sedangkan jumlah <i>tweet</i> merupakan banyaknya X <i>tweet</i> terbaru yang ada di beranda <i>mention</i> Anda. </p>
									<div class="row">
										<div class="col-md-12">
											<div class="form-group">
												<label for="spam_keyword">Kata Kunci *</label>
												<input type="text" class="form-control" name="spam_keyword" placeholder="Masukkan kata kunci spam" value="{{old('keyword')}}" required>
											</div>
										</div>
										<div class="col-md-6">
											<div class="form-group">
												<label for="total">Jumlah Tweets*</label>
												<input class="form-control" name="total" value="{{old('total')}}" required>
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