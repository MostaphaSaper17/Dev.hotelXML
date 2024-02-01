@extends('layouts.admin')
@section('content')
<div class="col-12 p-3">
		<!-- breadcrumb -->
		<x-bread-crumb :breads="[
			['url' => url('/admin') , 'title' => 'Dashboard' , 'isactive' => false],
			['url' => route('admin.users.index') , 'title' => 'Users' , 'isactive' => false],
			['url' => '#' , 'title' =>  'Add User', 'isactive' => true],
		]">
		</x-bread-crumb>
	<!-- /breadcrumb -->
	<div class="col-12 col-lg-12 p-0 ">


		<form id="validate-form" class="row" enctype="multipart/form-data" method="POST" action="{{route('admin.users.store')}}">
		@csrf

		<div class="col-12 col-lg-8 p-0 main-box">
			<div class="col-12 px-0">
				<div class="col-12 px-3 py-3">
				 	<span class="fas fa-info-circle"></span>	Add New
				</div>
				<div class="col-12 divider" style="min-height: 2px;"></div>
			</div>
			<div class="col-12 p-3 row">


			<div class="col-12 col-lg-6 p-2">
				<div class="col-12">
					Name
				</div>
				<div class="col-12 pt-3">
					<input type="text" name="name" required minlength="3"  maxlength="190" class="form-control" value="{{old('name')}}" >
				</div>
			</div>

			<div class="col-12 col-lg-6 p-2">
				<div class="col-12">
					Email
				</div>
				<div class="col-12 pt-3">
					<input type="email" name="email"  class="form-control"  value="{{old('email')}}" >
				</div>
			</div>
			<div class="col-12 col-lg-6 p-2">
				<div class="col-12">
					Password
				</div>
				<div class="col-12 pt-3">
					<input type="password" name="password"  class="form-control" required minlength="8" >
				</div>
			</div>

			<div class="col-12 col-lg-6 p-2">
				<div class="col-12">
					Profile Photo
				</div>
				<div class="col-12 pt-3">
					<input type="file" name="avatar"  class="form-control"  accept="image/*" >
				</div>
				<div class="col-12 p-0">

				</div>
			</div>

			<div class="col-12 col-lg-6 p-2">
				<div class="col-12">
					Phone
				</div>
				<div class="col-12 pt-3">
					<input type="text" name="phone"   maxlength="190" class="form-control"  value="{{old('phone')}}" >
				</div>
			</div>
			@if(auth()->user()->can('user-roles-update'))
			<div class="col-12 col-lg-6 p-2">
				<div class="col-12">
					Role
				</div>
				<div class="col-12 pt-3">
					<select class="form-control select2-select" name="roles[]" multiple required>
						@foreach($roles as $role)
							<option value="{{$role->id}}">{{$role->display_name}}</option>
						@endforeach
					</select>
				</div>
			</div>
			@endif
			<div class="col-12 col-lg-6 p-2">
				<div class="col-12">
					About
				</div>
				<div class="col-12 pt-3">
					<textarea  name="bio" maxlength="5000" class="form-control" style="min-height:150px">{{old('bio')}}</textarea>
				</div>
			</div>
			<div class="col-12 col-lg-6 p-2">
				<div class="col-12">
					Blocked
				</div>
				<div class="col-12 pt-3">
					<select class="form-control" name="blocked">
						<option @if(old('blocked')=="0") selected @endif value="0">No</option>
						<option @if(old('blocked')=="1") selected @endif value="1">Yes</option>
					</select>
				</div>
			</div>
			</div>

		</div>

		<div class="col-12 p-3">
			<button class="btn btn-success" id="submitEvaluation">Save</button>
		</div>
		</form>
	</div>
</div>
@endsection
