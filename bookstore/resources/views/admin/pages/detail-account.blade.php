@extends('admin.admin')

@section('title')
Chi tiết tài khoản
@endsection

@section('content-header')
<div id="breadcrumb"> 
	<a href="{{ route('manageacc') }}" class="tip-bottom">Quản lý tài khoản khách hàng</a>  
	<a class="current">Chi tiết tài khoản khách hàng</a> 
</div>
<h1>Chi tiết tài khoản khách hàng</h1>
@endsection

@section('menu')
<ul>
	<li><a href="{{ route('managegeneral') }}"><i class="icon icon-cog"></i> <span>Quản lý chung</span></a></li>
	<li><a href="{{ route('managebook') }}"><i class="icon icon-book"></i> <span>Quản lý sách</span></a> </li>
	<li><a href="{{ route('managecate') }}"><i class="icon icon-list"></i> <span>Quản lý danh mục</span></a> </li>
	<li class="active"><a href="{{ route('manageacc') }}"><i class="icon icon-user"></i> <span>Quản lý tài khoản</span></a></li>
	<li><a href="{{ route('managebill') }}"><i class="icon icon-money"></i> <span>Quản lý hóa đơn</span></a></li>
</ul>
@endsection


@section('content')
<hr>
<div class="row-fluid">
	<div class="span6">
		<div class="widget-box">
			<div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
				<h5>Thông tin tài khoản</h5>
			</div>
			<div class="widget-content nopadding">
				<form action="#" method="get" class="form-horizontal">
					<div class="control-group">
						<label class="control-label">Mã</label>
						<div class="controls">
							<input type="text" value="" disabled class=" input-big span11">
						</div>
					</div>
					<div class="control-group">
						<label class="control-label">Tên khách hàng</label>
						<div class="controls">
							<input type="text" value="" placeholder="Nguyễn văn a" class=" input-big span11">
						</div>
					</div>
					<div class="control-group">
						<label class="control-label">Giới tính</label>
						<div class="controls">
							<label>
								<input type="radio" name="radios" />
							Nam</label>
							<label>
								<input type="radio" name="radios" />
							Nữ</label>
						</div>
					</div>
					<div class="control-group">
						<label class="control-label">Ngày sinh</label>
						<div class="controls">
							<div  data-date="12-02-2012" class="input-append date datepicker">
								<input type="date" value="12-02-2012"   >
							</div>
						</div>
					</div>
					<div class="control-group">
						<label class="control-label">Email</label>
						<div class="controls">
							<input type="text" value="" placeholder="Nguyễn văn a" class=" input-big span11">
						</div>
					</div>
					<div class="control-group">
						<label class="control-label">Số điện thoại</label>
						<div class="controls">
							<input type="text" value="" placeholder="Nguyễn văn a" class=" input-big span11">
						</div>
					</div>
					<div class="control-group">
						<label class="control-label">Địa chỉ</label>
						<div class="controls">
							<input type="text" value="" placeholder="Nguyễn văn a" class=" input-big span11">
						</div>
					</div>
					<div class="control-group">
						<label class="control-label">Tỉnh/Thành phố</label>
						<div class="controls" >
							<select class="  ">
								<option>First option</option>
								<option>Second option</option>
								<option>Third option</option>
								<option>Fourth option</option>
								<option>Fifth option</option>
								<option>Sixth option</option>
								<option>Seventh option</option>
								<option>Eighth option</option>
							</select>
						</div>
					</div>
					<div class="control-group">
						<label class="control-label">Quận huyện</label>
						<div class="controls" >
							<select class="  ">
								<option>First option</option>
								<option>Second option</option>
								<option>Third option</option>
								<option>Fourth option</option>
								<option>Fifth option</option>
								<option>Sixth option</option>
								<option>Seventh option</option>
								<option>Eighth option</option>
							</select>
						</div>
					</div>
					<div class="control-group">
						<label class="control-label">Phường/Xã</label>
						<div class="controls" >
							<select class="  ">
								<option>First option</option>
								<option>Second option</option>
								<option>Third option</option>
								<option>Fourth option</option>
								<option>Fifth option</option>
								<option>Sixth option</option>
								<option>Seventh option</option>
								<option>Eighth option</option>
							</select>
						</div>
					</div>

					<div class="form-actions">
						<button type="submit" class="btn btn-success">Cập nhật</button>
						<button type="submit" class="btn btn-success">Quay về</button>
					</div>
				</form>
			</div>
		</div>
	</div>
	<div class="span6">
		<div class="widget-box">
			<div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
				<h5>Danh sách các đơn hàng đã đặt</h5>
			</div>
			<div class="widget-content nopadding">
				<table class="table table-bordered data-table">
					<thead>
						<tr>
							<th width="5%">STT </th>
							<th width="20%">Mã</th>
							<th>Ngày đặt hàng</th>
							<th>Giá trị đơn hàng</th>
							<th width="15%">Chi tiết</th>
						</tr>
					</thead>
					<tbody>
						<tr class="gradeX">
							<td>1</td>
							<td>2</td>
							<td>1/1/2017</td>
							<td>700000đ</td>
							<td class=" text-center large"><a href="{{ route('detailbill','account') }}"><i class="icon-edit"></i> Chi tiết</a></td>
						</tr>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>
@endsection