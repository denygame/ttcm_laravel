@php
use App\Http\Controllers\CustomerController;
@endphp

@extends('admin.admin')

@section('title')
Quản lý hóa đơn
@endsection

@section('content-header')
<div id="breadcrumb"> 
	<a class="current">Quản lý hóa đơn</a> 
</div>
<h1>Quản lý hóa đơn</h1>
@endsection

@section('menu')
<ul>
	<li><a href="{{ route('managegeneral') }}"><i class="icon icon-cog"></i> <span>Quản lý chung</span></a></li>
	<li><a href="{{ route('managebook') }}"><i class="icon icon-book"></i> <span>Quản lý sách</span></a> </li>
	<li><a href="{{ route('managecate') }}"><i class="icon icon-list"></i> <span>Quản lý danh mục</span></a> </li>
	<li ><a href="{{ route('manageacc') }}"><i class="icon icon-user"></i> <span>Quản lý tài khoản</span></a></li>
	<li class="active"><a href="{{ route('managebill') }}"><i class="icon icon-money"></i> <span>Quản lý hóa đơn</span></a></li>
</ul>
@endsection

@section('content')
<hr>
<div class="row-fluid">
	<div class="span12">
		<div class="widget-box">
			<div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
				<h5>Danh sách</h5>
			</div>
			<div class="widget-content nopadding">
				<table class="table table-bordered data-table">
					<thead>
						<tr>
							<th width="5%">STT </th>
							<th width="5%">Mã</th>
							<th width="20%">Tên khách hàng</th>
							<th width="10%">Thời gian</th>
							<th width="10%">Tổng tiền</th>
							<th width="10%">Trạng thái</th>
							<th width="5%">Chi tiết</th>
						</tr>
					</thead>
					<tbody>
						<?php $i=1; ?>
						@foreach ($lsbill as $bill)
						<tr class="gradeX">
							<td>{{ $i }}</td>
							<?php $i++; ?>
							<td>{{ $bill->id }}</td>
							<td>{{ CustomerController::getName($bill->id_customer)['name'] }}</td>
							<td class="center">{{ $bill->date_bill }}</td>
							<td class="center">{{ number_format($bill->total_price) }} VNĐ</td>
							<td>{{ $bill->status }}</td>
							<td class="center"><a href="{{ route('detailbill',['type'=>'bill','idbill'=>$bill->id]) }}"><i class="icon-edit"></i> Chi tiết</a></td>
						</tr>
						@endforeach


						

					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>
@endsection