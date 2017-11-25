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
<div class="row-fluid">
	<div class="span12">
		<div class="widget-box">
			<div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
				<h5>Thông tin</h5>
			</div>
			<div class="widget-content nopadding">
				<form action="#" method="get" class="form-horizontal">
					<div class="control-group">
						<label class="control-label">Tên cửa hàng : </label>
						<div class="controls">
							<input type="text" value="T2HD books" class="span11" />
						</div>
					</div>
					<div class="control-group">
						<label class="control-label">Email : </label>
						<div class="controls">
							<input type="text" class="span11" value="123@gmail.com"/>
						</div>
					</div>
					<div class="control-group">
						<label class="control-label">Số điện thoại :</label>
						<div class="controls">
							<input type="text" class="span11" value="0123456879" />
						</div>
					</div>
					<div class="control-group">
						<label class="control-label">Logo :</label>
						<div class="controls">
							<div><img src="img/logo.png" width="200px" alt=""> <input type="file"  class="span11"  /></div>

						</div>
					</div>

					<div class="control-group">
						<label class="control-label">Các ảnh slider:</label>
						<div class="controls">
							<div><img src="img/logo.png" width="200px" alt=""> <input type="file"  class="span11"  /></div>
							<br>
							<div><img src="img/logo.png" width="200px" alt=""> <input type="file"  class="span11"  /></div>
							<br>
							<div><img src="img/logo.png" width="200px" alt=""> <input type="file"  class="span11"  /></div>
							<br>
							<div><img src="img/logo.png" width="200px" alt=""> <input type="file"  class="span11"  /></div>
							<br>
							<div><img src="img/logo.png" width="200px" alt=""> <input type="file"  class="span11"  /></div>

						</div>
					</div>
					<div class="control-group">
						<label class="control-label">Ảnh banner : </label>
						<div class="controls">
							<div><img src="img/logo.png" width="200px" alt=""> <input type="file"  class="span11"  /></div>
							<br>
							<div><img src="img/logo.png" width="200px" alt=""> <input type="file"  class="span11"  /></div>
							<br>
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