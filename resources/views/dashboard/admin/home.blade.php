@extends('layouts.dashboard.app-admin')
@section('title', 'لوحة التحكم')

@section('style')
	<style>
		.tx-40 {color: #FFF;}
	</style>
@endsection

@section('content')
	
	<div class="row">

		<div class="col-lg-6 col-xl-3 col-md-6 col-12">
			<div class="card bg-purple-gradient text-white ">
				<a href="{{ url('admin/users') }}">
					<div class="card-body">
						<div class="row">
							<div class="col-6">
								<div class="icon1 mt-2 text-center">
									<i class="fas fa-users tx-40"></i>
								</div>
							</div>
							<div class="col-6">
								<div class="mt-0 text-center">
									<span class="text-white">عدد المشاركين</span>
									<h2 class="text-white mb-0">{{ $Users }}</h2>
								</div>
							</div>
						</div>
					</div>
				</a>
			</div>
		</div>

		<div class="col-lg-6 col-xl-3 col-md-6 col-12">
			<div class="card bg-info-gradient text-white ">
				<a href="{{ url('admin/governors') }}">
					<div class="card-body">
						<div class="row">
							<div class="col-6">
								<div class="icon1 mt-2 text-center">
									<i class="fas fa-balance-scale tx-40"></i>
								</div>
							</div>
							<div class="col-6">
								<div class="mt-0 text-center">
									<span class="text-white">عدد المحكمين</span>
									<h2 class="text-white mb-0">{{ $Governor }}</h2>
								</div>
							</div>
						</div>
					</div>
				</a>
			</div>
		</div>

		<div class="col-lg-6 col-xl-3 col-md-6 col-12">
			<div class="card bg-secondary-gradient text-white ">
				<a href="#">
					<div class="card-body">
						<div class="row">
							<div class="col-6">
								<div class="icon1 mt-2 text-center">
									<i class="fa fa-cog tx-40"></i>
								</div>
							</div>
							<div class="col-6">
								<div class="mt-0 text-center">
									<span class="text-white">إدارة الموقع</span>
									<h2 class="text-white mb-0">{{ $Admins }}</h2>
								</div>
							</div>
						</div>
					</div>
				</a>
			</div>
		</div>
		<div class="col-lg-6 col-xl-3 col-md-6 col-12">
			<div class="card bg-teal-gradient text-white ">
				<a href="{{ url('/dashboard/contact') }}">
					<div class="card-body">
						<div class="row">
							<div class="col-6">
								<div class="icon1 mt-2 text-center">
									<i class="fa fa-envelope tx-40"></i>
								</div>
							</div>
							<div class="col-6">
								<div class="mt-0 text-center">
									<span class="text-white">الرسائل</span>
									<h2 class="text-white mb-0">{{ $contact }}</h2>
								</div>
							</div>
						</div>
					</div>
				</a>
			</div>
		</div>
		
	</div> {{-- End Row --}}

@endsection