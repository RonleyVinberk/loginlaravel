@extends('template')
@section('user_blade')
<div class="row">
	<!-- start row -->

	<div class="col-sm-12 col-md-2">
		<!-- start col -->

		<div class="list-group">
			<a href="" class="list-group-item list-group-item-action">Buat User</a>
			<a href="{{url("logout")}}" class="list-group-item list-group-item-action">Keluar</a>
		</div>

		<!-- end col -->
	</div>
	<div class="col-sm-12 col-md-10">
		<!-- start col -->

		@foreach($errors->all() as $message)
		<div class="alert alert-warning">
			{{$message}}
		</div>
		@endforeach

		<!-- Notification store -->
		@if (session('notification_error_store'))
			<div class="alert alert-danger">
				{{ session('notification_error_store') }}
			</div>
		@endif
		@if (session('notification_success_store'))
			<div class="alert alert-success">
				{{ session('notification_success_store') }}
			</div>
		@endif

		<!-- Notification update -->
		@if (session('notification_success_update'))
			<div class="alert alert-success">
				{{ session('notification_success_update') }}
			</div>
		@endif

		<!-- Notification destroy -->
		@if (session('notification_success_destroy'))
			<div class="alert alert-success">
				{{ session('notification_success_destroy') }}
			</div>
		@endif
		@if (session('notification_error_destroy'))
			<div class="alert alert-danger">
				{{ session('notification_error_destroy') }}
			</div>
		@endif
		<ul class="nav nav-tabs" id="myTab" role="tablist">
		<li class="nav-item">
			<a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Home</a>
		</li>
		@if(Auth::user()->usertype == 1)
		<li class="nav-item">
			<a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Profile</a>
		</li>
		@elseif(Auth::user()->usertype != 1)

		@endif
		</ul>
		<div class="tab-content" id="myTabContent">
			<!-- start tab-content -->

			<div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
				<!-- start tab-pane -->

				<div class="table-responsive pt-3">
					<!-- start table-responsive -->

					<table class="table table-striped" id="tableusers">
						<thead>
							<th>No</th>
							<th>Nama Lengkap</th>
							<th>Email</th>
							<th>Username</th>
							<th>Aksi</th>
						</thead>
						<tbody>
							@foreach($users as $key => $value)
								<tr>
									<td>{{$loop->iteration}}</td>
									<td>{{$value->name}}</td>
									<td>{{$value->email}}</td>
									<td>{{$value->username}}</td>
									<td>
										<form class="button" action="{{url("user/" . $value->id)}}" method="post">
											{{ csrf_field() }}
											{{ method_field('DELETE') }}
											<button type="submit" class="btn btn-danger btn-sm">HAPUS</button>
										</form>
										@if(Auth::user()->usertype == 1)
											<a href="{{url("user/" . $value->id . "/edit")}}" role="button" class="btn btn-info btn-sm button">GANTI</a>
										@elseif(Auth::user()->usertype == 2)
											N/A
										@endif
									</td>
								</tr>
							@endforeach
						</tbody>
					</table>

					<!-- end table-responsive -->
				</div>

				<!-- end tab-pane -->
			</div>
			<div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
				<!-- start tab-pane -->

				<div class="row">
					<!-- start row -->

					<div class="col-sm-12 col-md-7 offset-md-3">
						<!-- start col -->

						<form class="pt-3" action="{{url("user")}}" method="post">
							{{csrf_field()}}
							<div class="form-group row">
								<button type="submit" class="btn btn-success btn-md">SIMPAN</button>
							</div>
							<div class="form-group row">
								<label for="name" class="col-sm-3 col-form-label">Nama Lengkap</label>
								<div class="col-sm-5">
									<input type="text" name="name" class="form-control" id="name" placeholder="Masukkan Nama Lengkap" value="{{old('name')}}" />
								</div>
							</div>
							<div class="form-group row">
								<label for="username" class="col-sm-3 col-form-label">Username</label>
								<div class="col-sm-4">
									<input type="text" name="username" class="form-control" id="username" placeholder="Masukkan Username" value="{{old('username')}}" />
								</div>
							</div>
							<div class="form-group row">
								<label for="email" class="col-sm-3 col-form-label">Email</label>
								<div class="col-sm-4">
									<input type="text" name="email" class="form-control" id="email" placeholder="Masukkan Email" value="{{old('email')}}" />
								</div>
							</div>
							<div class="form-group row">
								<label for="password" class="col-sm-3 col-form-label">Password</label>
								<div class="col-sm-4">
									<input type="password" name="password" class="form-control" id="password" autocomplete="off" value="{{old('password')}}" />
								</div>
							</div>
						</form>

						<!-- end col -->
					</div>

					<!-- end row -->
				</div>

				<!-- end tab-pane -->
			</div>

			<!-- end tab-content -->
		</div>

		<!-- end col -->
	</div>

	<!-- end row -->
</div>
@endsection
