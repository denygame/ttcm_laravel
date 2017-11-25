@extends('admin.admin')

@section('title')
Thêm sách mới
@endsection

@section('content-header')
<div id="breadcrumb">
	<a href="{{ route('managebook') }}" class="tip-bottom"> Quản lý sách</a> 
	<a class="current">Thêm sách mới</a> 
</div>
<h1>Thêm sách mới</h1>
@endsection

@section('menu')
<ul>
	<li><a href="{{ route('managegeneral') }}"><i class="icon icon-cog"></i> <span>Quản lý chung</span></a></li>
	<li class="active"><a href="{{ route('managebook') }}"><i class="icon icon-book"></i> <span>Quản lý sách</span></a> </li>
	<li><a href="{{ route('managecate') }}"><i class="icon icon-list"></i> <span>Quản lý danh mục</span></a> </li>
	<li><a href="{{ route('manageacc') }}"><i class="icon icon-user"></i> <span>Quản lý tài khoản</span></a></li>
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
						<label class="control-label">Mã sách : </label>
						<div class="controls">
							<input type="text" value="" class="span11" />
						</div>
					</div>
					<div class="control-group">
						<label class="control-label">Tên sách : </label>
						<div class="controls">
							<input type="text" value="T2HD books" class="span11" />
						</div>
					</div>
					<div class="control-group">
						<label class="control-label">Thể loại : </label>
						<div class="controls">
							<select name="" id="">
								<option value="">1</option>
								<option value="">1</option>
								<option value="">1</option>
								<option value="">1</option>
								<option value="">1</option>
								<option value="">1</option>
								<option value="">1</option>
								<option value="">1</option>
								<option value="">1</option>
							</select>
						</div>
					</div>
					<div class="control-group">
						<label class="control-label">Giá bán : </label>
						<div class="controls">
							<input type="number" value="" class="span11" />
						</div>
					</div>
					<div class="control-group">
						<label class="control-label">Khuyến mãi : </label>
						<div class="controls">
							<input type="number" value="" class="span11" />
						</div>
					</div>
					<div class="control-group">
						<label class="control-label">Tác giả : </label>
						<div class="controls">
							<input type="text" value="" class="span11" />
						</div>
					</div>
					<div class="control-group">
						<label class="control-label">Ngày xuất bản : </label>
						<div class="controls">
							<input type="text" value="" class="span11" />
						</div>
					</div>
					<div class="control-group">
						<label class="control-label">Nhà xuất bản : </label>
						<div class="controls">
							<input type="text" value="" class="span11" />
						</div>
					</div>
					<div class="control-group">
						<label class="control-label">Hình trước :</label>
						<div class="controls">
							<div><img src="" width="200px" alt=""> <input type="file"  class="span11"  /></div>

						</div>
					</div>
					<div class="control-group">
						<label class="control-label">Hình sau:</label>
						<div class="controls">
							<div><img src="" width="200px" alt=""> <input type="file"  class="span11"  /></div>

						</div>
					</div>
					<div class="form-actions">
						<button type="submit" class="btn btn-success">Lưu</button>
						<button type="submit" class="btn btn-success">Quay lại</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
@endsection