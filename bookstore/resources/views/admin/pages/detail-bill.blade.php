@extends('admin.admin')

@section('title')
Chi tiết hóa đơn
@endsection

@section('content-header')
@if ($type=='bill')		

<div id="breadcrumb"> 
	<a href="{{ route('managebill') }}" class="">Quản lý hóa đơn</a>
	<a class="current">Chi tiết hóa đơn</a>
</div>
<h1>Chi tiết hóa đơn <span>MAHD</span></h1>

@else

<div id="breadcrumb"> 
	<a href="{{ route('manageacc') }}" class="tip-bottom">Quản lý tài khoản khách hàng</a>  
	<a href="{{ route('detailaccount') }}">Chi tiết tài khoản khách hàng</a>
	<a class="current">Chi tiết hóa đơn</a> 
</div>
<h1>Chi tiết hóa đơn <span>MAHD</span></h1>

@endif

@endsection

@section('menu')
<ul>
	<li><a href="{{ route('managegeneral') }}"><i class="icon icon-cog"></i> <span>Quản lý chung</span></a></li>
	<li><a href="{{ route('managebook') }}"><i class="icon icon-book"></i> <span>Quản lý sách</span></a> </li>
	<li><a href="{{ route('managecate') }}"><i class="icon icon-list"></i> <span>Quản lý danh mục</span></a> </li>
	<li <?php if($type=='account') echo 'class="active"'; ?>><a href="{{ route('manageacc') }}"><i class="icon icon-user"></i> <span>Quản lý tài khoản</span></a></li>
	<li <?php if($type=='bill') echo 'class="active"'; ?>><a href="{{ route('managebill') }}"><i class="icon icon-money"></i> <span>Quản lý hóa đơn</span></a></li>
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
							<th width="5%">Mã HĐ</th>
							<th width="5%">Mã sách</th>
							<th width="20%">Tên sách</th>
							<th width="10%">Thể loại</th>
							<th width="10%">Số lượng</th>
							<th width="10%">Giá</th>
						</tr>
					</thead>
					<tbody>
						<tr class="gradeX">
							<td>1</td>
							<td>2</td>
							<td></td>
							<td> </td>
							<td class="center">4</td>
							<td class="center">4</td>
							<td class="center">4</td>
						</tr>

					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>
@endsection