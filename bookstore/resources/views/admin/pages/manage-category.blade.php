@extends('admin.admin')

@section('title')
Quản lý danh mục sách
@endsection

@section('content-header')
<div id="breadcrumb">
	<a href="#" class="current">Quản lý danh mục sách</a> 
</div>
<h1>Quản lý danh mục sách</h1>
@endsection

@section('menu')
<ul>
	<li><a href="{{ route('managegeneral') }}"><i class="icon icon-cog"></i> <span>Quản lý chung</span></a></li>
	<li><a href="{{ route('managebook') }}"><i class="icon icon-book"></i> <span>Quản lý sách</span></a> </li>
	<li class="active"><a href="{{ route('managecate') }}"><i class="icon icon-list"></i> <span>Quản lý danh mục</span></a> </li>
	<li ><a href="{{ route('manageacc') }}"><i class="icon icon-user"></i> <span>Quản lý tài khoản</span></a></li>
	<li><a href="{{ route('managebill') }}"><i class="icon icon-money"></i> <span>Quản lý hóa đơn</span></a></li>
</ul>
@endsection

@section('content')
<hr>
<div class="row-fluid">
	<div class="span12">
		<div class="widget-box">
			<div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
				<h5>Danh sách</h5>
				<h5 style="float: right"><a href="" data-toggle="modal" data-target="#modal"><i class="icon-plus-sign"></i> Thêm danh mục</a></h5>
			</div>
			<div class="widget-content nopadding">
				<table class="table table-bordered data-table">
					<thead>
						<tr>
							<th width="5%">STT </th>
							<th width="5%">Mã</th>
							<th>Tên danh mục</th>
							<th width="10%">Cập nhật</th>
							<th width="5%">Xóa</th>
						</tr>
					</thead>
					<tbody>
						<tr class="gradeX">
							<td>1</td>
							<td>2</td>
							<td class="center">4</td>
							<td class="center"><a href="" data-target="#modal" data-toggle="modal"><i class="icon-edit"></i> Cập nhật</a></td>
							<td class=" text-center large"><a href=""><i class="icon-remove-sign"></i> Xóa</a></td>
						</tr>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>




{{-- modal add edit category --}}
<div class="modal fade" id="modal" role="dialog">
	<div class="modal-form modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title">Thông tin danh mục</h4>
			</div>
			<div class="modal-body" >
				<div class="container" style="width: 100%">
					<form class="form-horizontal" >
						<div class="control-group">
							<label class="control-label">Tên danh mục</label>
							<div class="controls">
								<input type="text" style="margin: 0 auto; width: 60%" value=""   >
							</div>
						</div>
					</form>
				</div>

			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Cập nhật</button>
				<button type="button" class="btn btn-default" data-dismiss="modal">Đóng</button>
			</div>
		</div>
	</div>
</div>
@endsection