@extends('template')
@section('form_edit')
<div class="row">
	<!-- start row -->

	<div class="col-sm-12 col-md-2">
		<!-- start col -->

		<div class="list-group">
			<a href="{{url('/user')}}" class="list-group-item list-group-item-action">Buat User</a>
			<a href="{{url('logout')}}" class="list-group-item list-group-item-action">Keluar</a>
		</div>

		<!-- end col -->
	</div>
	<div class="col-sm-12 col-md-9">
		<!-- start col -->

		@foreach($errors->all() as $message)
		<div class="alert alert-warning">
			{{$message}}
		</div>
		@endforeach

		<!-- Notification update -->
		@if (session('notification_error_update'))
			<div class="alert alert-danger">
				{{ session('notification_error_update') }}
			</div>
		@endif
		<ul class="nav nav-tabs" id="myTab" role="tablist">
			<li class="nav-item"><a class="nav-link active" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Detail User [{{ $user->name }}]</a></li>
		</ul>
		<div class="tab-content" id="myTabContent">
			<!-- start tab-content -->

			<div class="row">
				<!-- start row -->

				<div class="col-sm-12 col-md-7 offset-md-3">
					<!-- start col -->

					<form class="pt-3" action="{{url("user/".$user->id)}}" method="post">
						{{csrf_field()}}
						{{method_field('PUT')}}
						<div class="form-group row">
							<button type="submit" class="btn btn-primary btn-md">SIMPAN</button>
						</div>
						<div class="form-group row">
							<label for="name" class="col-sm-3 col-form-label">Nama Lengkap</label>
							<div class="col-sm-5">
								<input type="text" name="name" class="form-control" id="name" placeholder="Masukkan Nama Lengkap" value="{{old('name', $user->name)}}" />
							</div>
						</div>
						<div class="form-group row">
							<label for="username" class="col-sm-3 col-form-label">Nama Pengguna</label>
							<div class="col-sm-4">
								<input type="text" name="username" class="form-control" id="username" placeholder="Masukkan Nama Pengguna" value="{{old('username', $user->username)}}" />
							</div>
						</div>
						   <div class="form-group row">
							<label for="email" class="col-sm-3 col-form-label">Email</label>
							<div class="col-sm-4">
								<input type="email" name="email" class="form-control" id="email" placeholder="Masukkan Email" value="{{old('email', $user->email)}}" />
							</div>
						</div>
						<div class="form-group row">
							<label for="password" class="col-sm-3 col-form-label">Kata Sandi</label>
							<div class="col-sm-4">
								<input type="password" name="password" class="form-control" id="password" autocomplete="off" />
							</div>
						</div>
						<div class="form-group row">
							<label for="password_confirmation" class="col-sm-3 col-form-label">Konfirmasi Kata Sandi</label>
							<div class="col-sm-4">
								<input type="password" name="password_confirmation" class="form-control" id="password_confirmation" autocomplete="off" />
							</div>
						</div>
					</form>

					<!-- end col -->
				</div>

				<!-- end row -->
			</div>

			<!-- end tab-content -->
		</div>

		<!-- end col -->
	</div>

	<!-- end row -->
</div>
@endsection
