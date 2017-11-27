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

				<form method="post" action="{{ route('insertbook') }}" class="form-horizontal" id="frm-add-book" enctype="multipart/form-data">
					<input type="hidden" name="_token" value="{{ csrf_token() }}">

					<div class="control-group">
						<label class="control-label">Tên sách : </label>
						<div class="controls">
							<input type="text" name="name" value="{{ old('name') }}" class="span11" />
						</div>
					</div>
					<div class="control-group">
						<label class="control-label">Thể loại : </label>
						<div class="controls">
							<select name="slcate" id="slcate">
								@foreach ($lscate as $item)
								<option value="{{ $item->id }}" <?php echo old('slcate')==$item->id ? "selected":""; ?> >{{ $item->name }}</option>
								@endforeach
							</select>
						</div>
					</div>
					<div class="control-group">
						<label class="control-label">Giá bán : </label>
						<div class="controls">
							<input type="number" name="price" value="{{ old('price') }}" class="span11" />
						</div>
					</div>
					<div class="control-group">
						<label class="control-label">Khuyến mãi : </label>
						<div class="controls">
							<input type="number" name="discount" value="{{ old('discount') }}" class="span11" />
						</div>
					</div>
					<div class="control-group">
						<label class="control-label">Tác giả : </label>
						<div class="controls">
							<input type="text" name="author" value="{{ old('author') }}" class="span11" />
						</div>
					</div>
					<div class="control-group">
						<label class="control-label">Ngày xuất bản : </label>
						<div class="controls">
							<input type="date" name="date_publish" value="{{ old('date_publish') }}" class="span11" />
						</div>
					</div>
					<div class="control-group">
						<label class="control-label">Nhà xuất bản : </label>
						<div class="controls">
							<input type="text" name="com_publish" value="{{ old('com_publish') }}" class="span11" />
						</div>
					</div>

					<div class="control-group">
						<label class="control-label">Mô tả : </label>
						<div class="controls">
							<textarea name="description" class="textarea_editor span11" rows="6" placeholder="Enter text ..."></textarea>
						</div>
					</div>

					<div class="control-group">
						<label class="control-label">Hình trước :</label>
						<div class="controls">
							<div><img id="img_before_addbook" src="" width="200px" alt=""> <input type="file" name="fileImgBefore" value="{{ old('fileImgBefore') }}" class="span11" onchange="changeImgUrl(this,'#img_before_addbook')" /></div>

						</div>
					</div>
					<div class="control-group">
						<label class="control-label">Hình sau:</label>
						<div class="controls">
							<div><img id="img_after_addbook" src="" width="200px" alt=""> <input type="file" name="fileImgAfter" value="{{ old('fileImgAfter') }}" class="span11" onchange="changeImgUrl(this,'#img_after_addbook')" /></div>

						</div>
					</div>
					<div class="form-actions">
						<button class="btn btn-success">Lưu</button>
						<a href="{{ route('managebook') }}" class="btn btn-success">Quay lại</a>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
@endsection