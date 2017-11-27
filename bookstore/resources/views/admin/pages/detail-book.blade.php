@extends('admin.admin')

@section('title')
Chi tiết sách
@endsection

@section('content-header')
<div id="breadcrumb"> 
	<a href="{{ route('managebook') }}" class="tip-bottom"> Quản lý sách</a> 
	<a class="current">Chi tiết sách</a> 
</div>
<h1>Chi tiết sách</h1>
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

		@if ($book!=null)
		<div class="widget-box">
			<div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
				<h5>Thông tin</h5>
			</div>
			<div class="widget-content nopadding">

				<form action="{{ route('updatebook') }}" method="post" class="form-horizontal" enctype="multipart/form-data">

					<input type="hidden" name="_token" value="{{ csrf_token() }}">
					<input type="hidden" name="idbook" value="{{ $book->id }}">

					<div class="control-group">
						<label class="control-label">Mã sách : </label>
						<div class="controls">
							<input type="text" value="{{ $book->id }}" class="span11" disabled />
						</div>
					</div>
					<div class="control-group">
						<label class="control-label">Tên sách : </label>
						<div class="controls">
							<input type="text" name="name" value="{{ $book->name }}" class="span11" />
						</div>
					</div>
					<div class="control-group">
						<label class="control-label">Thể loại : </label>
						<div class="controls">
							<select name="slcate" id="slcate">
								@foreach ($lscate as $item)
								@if ($item->id==$book->cate_id)
								<option selected="selected" value="{{ $item->id }}">{{ $item->name }}</option>
								@else
								<option value="{{ $item->id }}">{{ $item->name }}</option>
								@endif

								@endforeach
							</select>
						</div>
					</div>
					<div class="control-group">
						<label class="control-label">Giá bán : </label>
						<div class="controls">
							<input type="number" name="price" value="{{ $book->price }}" class="span11" />
						</div>
					</div>
					<div class="control-group">
						<label class="control-label">Khuyến mãi : </label>
						<div class="controls">
							<input type="number" name="discount" value="{{ $book->discount }}" class="span11" />
						</div>
					</div>
					<div class="control-group">
						<label class="control-label">Tác giả : </label>
						<div class="controls">
							<input type="text" name="author" value="{{ $book->author }}" class="span11" />
						</div>
					</div>
					<div class="control-group">
						<label class="control-label">Ngày xuất bản : </label>
						<div class="controls">
							<input type="text" name="date_publish" value="{{ $book->date_publish }}" class="span11" />
						</div>
					</div>
					<div class="control-group">
						<label class="control-label">Nhà xuất bản : </label>
						<div class="controls">
							<input type="text" name="com_publish" value="{{ $book->com_publish }}" class="span11" />
						</div>
					</div>

					<div class="control-group">
						<label class="control-label">Mô tả : </label>
						<div class="controls">
							<textarea class="textarea_editor span11" name="description" rows="6" placeholder="Enter text ...">{{ $book->description }}</textarea>
						</div>
					</div>


					<div class="control-group">
						<label class="control-label">Hình trước :</label>
						<div class="controls">
							<div>
								<img id="img_before_detail" src="upload/products/{{ $book->image_before }}" width="200px" alt=""> 
								<input type="file" name="fileImgBefore"  class="span11"  onchange="changeImgUrl(this,'#img_before_detail')"/>
							</div>
						</div>
					</div>
					<div class="control-group">
						<label class="control-label">Hình sau:</label>
						<div class="controls">
							<div>
								<img id="img_after_detail" src="upload/products/{{ $book->image_after }}" width="200px" alt=""> 
								<input type="file" name="fileImgAfter" class="span11" onchange="changeImgUrl(this,'#img_after_detail')" />
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

	@else

	@endif
</div>
@endsection