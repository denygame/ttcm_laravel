@php
use App\Http\Controllers\GeneralController;
$general=GeneralController::getGeneral();
@endphp

@extends('admin.admin')

@section('title')
Quản lý chung
@endsection

@section('content-header')
<div id="breadcrumb"> 
	<a class="current">Quản lý chung</a> 
</div>
<h1>Quản lý chung</h1>
@endsection


@section('menu')
<ul>
	<li class="active"><a href="{{ route('managegeneral') }}"><i class="icon icon-cog"></i> <span>Quản lý chung</span></a></li>
	<li><a href="{{ route('managebook') }}"><i class="icon icon-book"></i> <span>Quản lý sách</span></a> </li>
	<li><a href="{{ route('managecate') }}"><i class="icon icon-list"></i> <span>Quản lý danh mục</span></a> </li>
	<li ><a href="{{ route('manageacc') }}"><i class="icon icon-user"></i> <span>Quản lý tài khoản</span></a></li>
	<li><a href="{{ route('managebill') }}"><i class="icon icon-money"></i> <span>Quản lý hóa đơn</span></a></li>
</ul>
@endsection



@section('content')
<hr>

@if (Session::has('success'))
<div class="alert alert-success success-manage-book">
	{{ Session::get('success') }}
</div>
@endif

@if (count($errors)>0)
<div class="alert alert-danger">
	<ul>
		@foreach ($errors->all() as $err)
		<li>{{ $err }}</li>
		@endforeach
	</ul>
</div>
@endif

<div class="row-fluid">
	<div class="span12">
		<div class="widget-box">
			<div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
				<h5>Thông tin</h5>
			</div>
			<div class="widget-content nopadding">


				<form action="{{ route('postgeneral') }}" method="post" class="form-horizontal" enctype="multipart/form-data">
					
					<input type="hidden" name="_token" value="{{ csrf_token() }}">

					<div class="control-group">
						<label class="control-label">Tên cửa hàng : </label>
						<div class="controls">
							<input type="text" name="name" value="{{ $general->name }}" class="span11" />
						</div>
					</div>
					<div class="control-group">
						<label class="control-label">Email : </label>
						<div class="controls">
							<input type="text" name="email" class="span11" value="{{ $general->email }}"/>
						</div>
					</div>
					<div class="control-group">
						<label class="control-label">Số điện thoại :</label>
						<div class="controls">
							<input type="text" name="tel" class="span11" value="{{ $general->tel }}" />
						</div>
					</div>
					<div class="control-group">
						<label class="control-label">Logo :</label>
						<div class="controls">
							<div><img id="logo-gen" src="source/img/logo/{{ $logo->img }}" width="200px" alt=""> <input type="file" name="logo" class="span11" onchange="changeImgUrl(this,'#logo-gen')" /></div>
						</div>
						<br>
					</div>

					<div class="control-group">
						<label class="control-label">Các ảnh slider (1280 x 600px):</label>
						<div class="controls">
							<div>
								<img id="slider1-gen" src="source/img/slider/{{ $slider[0]->img }}" width="200px" alt=""> 
								<input name="slider1"  type="file"  class="span11" onchange="changeImgUrl(this,'#slider1-gen')" />
							</div>
							<br>
							<div>
								<img id="slider2-gen" src="source/img/slider/{{ $slider[1]->img }}" width="200px" alt=""> 
								<input name="slider2"  type="file"  class="span11"  onchange="changeImgUrl(this,'#slider2-gen')"/>
							</div>
							<br>
							<div>
								<img id="slider3-gen" src="source/img/slider/{{ $slider[2]->img }}" width="200px" alt=""> 
								<input name="slider3" type="file"  class="span11"  onchange="changeImgUrl(this,'#slider3-gen')"/>
							</div>
							<br>
						</div>
					</div>
					<div class="control-group">
						<label class="control-label">Ảnh banner : </label>
						<div class="controls">
							<div>
								<img id="ban1-gen" src="source/img/banner/{{ $banner[0]->img }}" width="200px" alt=""> 
								<input name="banner1" type="file"  class="span11"  onchange="changeImgUrl(this,'#ban1-gen')"/>
								<p style="color: red; margin-left: 3.5%">Khuyến cáo 500 x 647px</p>
							</div>							
							<br>
							<div>
								<img id="ban2-gen" src="source/img/banner/{{ $banner[1]->img }}" width="200px" alt=""> 
								<input name="banner2" type="file"  class="span11" onchange="changeImgUrl(this,'#ban2-gen')" />
								<p style="color: red; margin-left: 3.5%">Khuyến cáo 380 x 230px</p>
							</div>
							<br>
							<div>
								<img id="ban3-gen" src="source/img/banner/{{ $banner[2]->img }}" width="200px" alt=""> 
								<input name="banner3" type="file"  class="span11" onchange="changeImgUrl(this,'#ban3-gen')" />
								<p style="color: red; margin-left: 3.5%">Khuyến cáo 380 x 230px</p>
							</div>
							<br>
							<div>
								<img id="ban4-gen" src="source/img/banner/{{ $banner[3]->img }}" width="200px" alt=""> 
								<input name="banner4" type="file"  class="span11" onchange="changeImgUrl(this,'#ban4-gen')" />
								<p style="color: red; margin-left: 3.5%">Khuyến cáo 500 x 647px</p>
							</div>
						</div>
					</div>
					<div class="form-actions">
						<button type="submit" class="btn btn-success">Câp nhật</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
@endsection