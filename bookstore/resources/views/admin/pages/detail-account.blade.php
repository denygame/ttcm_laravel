@extends('admin.admin')

@section('title')
Chi tiết tài khoản
@endsection

@section('content-header')
<div id="breadcrumb"> 
	<a href="{{ route('manageacc') }}" class="tip-bottom">Quản lý tài khoản khách hàng</a>  
	<a class="current">Chi tiết tài khoản khách hàng 
		@php 
		echo ($customer!=null)?$customer->name:'';
		@endphp
	</a> 
</div>
<h1>Chi tiết tài khoản khách hàng @php 
echo ($customer!=null)?$customer->name:'';
@endphp</h1>
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

	@if ($customer!=null)
	<div class="span6">
		<div class="widget-box">
			<div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
				<h5>Thông tin tài khoản</h5>
			</div>
			<div class="widget-content nopadding">
				<form action="#" method="get" class="form-horizontal">
					<div class="control-group">
						<label class="control-label">Mã khách hàng</label>
						<div class="controls">
							<input type="text" value="{{ $customer->id }}" disabled class=" input-big span11">
						</div>
					</div>
					<div class="control-group">
						<label class="control-label">Tên khách hàng</label>
						<div class="controls">
							<input type="text" value="{{ $customer->name }}" placeholder="" class=" input-big span11">
						</div>
					</div>
					<div class="control-group">
						<label class="control-label">Giới tính</label>
						<div class="controls">
							<select name="gender-customer" id="gender-customer">
								<option value="">--- Chọn Giới Tính ---</option>
								<option value="men" <?php if($customer->gender=='Nam') echo 'selected'; ?> >Nam</option>
								<option value="women" <?php if($customer->gender=='Nữ') echo 'selected'; ?> >Nữ</option>
							</select>
						</div>
					</div>
					<div class="control-group">
						<label class="control-label">Ngày sinh</label>
						<div class="controls">
							<div  data-date="12-02-2012" class="input-append date datepicker">
								<input type="date" value="{{ $customer->birthday }}"   >
							</div>
						</div>
					</div>
					<div class="control-group">
						<label class="control-label">Email</label>
						<div class="controls">
							<input type="text" value="{{ $customer->email }}" placeholder="" class=" input-big span11" disabled>
						</div>
					</div>
					<div class="control-group">
						<label class="control-label">Số điện thoại</label>
						<div class="controls">
							<input type="text" value="{{ $customer->phone_number }}" placeholder="" class=" input-big span11">
						</div>
					</div>
					<div class="control-group">
						<label class="control-label">Địa chỉ</label>
						<div class="controls">
							<input type="text" value="{{ $customer->address }}" placeholder="" class=" input-big span11">
						</div>
					</div>
					<div class="control-group">
						<label class="control-label">Tỉnh/Thành phố</label>
						<div class="controls" >
							<select name="city-select" id="city-select">
								<option value="">--- Chọn Tỉnh/Thành Phố ---</option>

								@foreach ($list_city as $item)
								@if ($customer->id_city==$item->id)
								<option value="{{ $item->id }}" selected="selected">{{ $item->name }}</option>
								@else
								<option value="{{ $item->id }}">{{ $item->name }}</option>
								@endif
								@endforeach

							</select>
						</div>
					</div>
					<div class="control-group">
						<label class="control-label">Quận huyện</label>
						<div class="controls" >
							<select name="district-select" id="district-select">
								<option value="">--- Chọn Quận/Huyện ---</option>

								@if ($list_district!=null)
								@foreach ($list_district as $item)
								@if ($customer->id_district==$item->id)
								<option value="{{ $item->id }}" selected="selected">{{ $item->name }}</option>
								@else
								<option value="{{ $item->id }}">{{ $item->name }}</option>
								@endif
								@endforeach
								@endif

							</select>
						</div>
					</div>
					<div class="control-group">
						<label class="control-label">Phường/Xã</label>
						<div class="controls" >
							<select name="ward-select" id="ward-select">
								<option value="">--- Chọn Phường/Xã ---</option>

								@if ($list_ward!=null)
								@foreach ($list_ward as $item)
								@if ($customer->id_ward==$item->id)
								<option value="{{ $item->id }}" selected="selected">{{ $item->name }}</option>
								@else
								<option value="{{ $item->id }}">{{ $item->name }}</option>
								@endif
								@endforeach
								@endif

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
						<?php $i=1; ?>
						@foreach ($billcus as $bill)
						<tr class="gradeX">
							<td>{{ $i }}</td>
							<?php $i++; ?>
							<td>{{ $bill['id'] }}</td>
							<td>{{ $bill['date_bill'] }}</td>
							<td>{{ number_format($bill['total_price']) }} VNĐ</td>
							<td class=" text-center large"><a href="{{ route('detailbill',['type'=>'account','idbill'=>$bill->id,'idcustomer'=>$customer->id]) }}"><i class="icon-edit"></i> Chi tiết</a></td>
						</tr>
						@endforeach


						
					</tbody>
				</table>
			</div>
		</div>
	</div>


	@else

	<div class="span12">

	</div>

	@endif

</div>

@endsection