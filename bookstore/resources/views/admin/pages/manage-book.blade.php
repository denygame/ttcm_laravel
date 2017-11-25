@php
  use App\Http\Controllers\CateController;
@endphp

@extends('admin.admin')

@section('title')
Quản lý sách
@endsection

@section('content-header')
<div id="breadcrumb"> 
	<a class="current">Quản lý sách</a> 
</div>
<h1>Quản lý sách</h1>
@endsection

@section('menu')
<ul>
	<li><a href="{{ route('managegeneral') }}"><i class="icon icon-cog"></i> <span>Quản lý chung</span></a></li>
	<li class="active"><a href="{{ route('managebook') }}"><i class="icon icon-book"></i> <span>Quản lý sách</span></a> </li>
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
			<div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
				<h5>Danh sách</h5>
				<h5 style="float: right"><a href="{{ route('addbook') }}"><i class="icon-plus"></i> Thêm sách</a></h5>
			</div>
			<div class="widget-content nopadding">
				<table class="table table-bordered data-table">
					<thead>
						<tr>
							<th width="5%">STT </th>
							<th width="5%">Mã</th>
							<th width="10%">Hình trước</th>
							<th width="10%">Hình sau</th>
							<th width="15%">Tên sách</th>
							<th width="15%">Thể loại</th>
							<th width="15%">Giá</th>
							<th width="10%">Khuyến mãi</th>
							<th width="10%">Chi tiết</th>
						</tr>
					</thead>
					<tbody>
						<?php $i=1; ?>
						@foreach ($listbook as $book)
						<tr class="gradeX">
							<td>{{ $i }}</td>
							<?php $i++; ?>
							<td>{{ $book->id }}</td>
							<td><img src="upload/products/{{ $book->image_before }}" alt="" class="img-rounded"></td>
							<td><img src="upload/products/{{ $book->image_after }}" alt="" class="img-rounded"> </td>
							<td class="center">{{ $book->name }}</td>
							<td class="center">{{ CateController::getName($book->cate_id) }}</td>
							<td class="center">{{ number_format($book->price) }} đ</td>
							<td class="center">{{ $book->discount }}%</td>
							<td class="center"><a href="{{ route('detailbookadmin',$book->id) }}"><i class="icon-edit"></i> Chi tiết</a></td>
						</tr>
						@endforeach


						
						
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>
@endsection