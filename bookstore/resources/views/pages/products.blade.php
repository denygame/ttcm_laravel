@php
  use App\Http\Controllers\CateController;
@endphp

@extends('master')
@section('title')
{{ $title }}
@endsection

@section('content')
<!-- PAGE ADDRESS  -->
<section id="page-address">
  <div class="row page-address-wrap">
    <div class="small-12 medium-12 large-6 columns page-name">
      <span class="float-left c-sexy medium">{{ mb_convert_case($title,MB_CASE_UPPER,'utf-8') }}</span>
    </div>
    <div class="small-12 medium-12 large-6 columns page-add">
      <span class="float-right medium"><a href="{{ route('home') }}" class="c-light">Trang chủ</a>
        {{-- hàm changeTitle() là thư viện tự thêm vào, xem public/guide/libary.txt --}}
        <a class="c-light">{{ $title }}</a></span>
      </div>
    </div>
  </section>
  <!-- END PAGE ADDRESS -->

  <!-- MAIN PRODUCT PAGE -->
  <main>
    <div class="row main-page-wrap">
      <div class="show-for-large large-3 columns left-nav">
        <span class="left-nav-title bold c-dark fluid-width">DANH MỤC</span>
        <div class="left-nav-ul-wrap">
          <ul>

            @foreach ($ls_cates as $ca)
            <li><a href="{{ route('category',$ca->alias) }}">{{ $ca->name }}</a></li>
            @endforeach

          </ul>
        </div>
        <div class="left-nav-recent-wrap row">
          <span class="left-nav-title bold c-dark fluid-width">CÓ THỂ BẠN SẼ THÍCH</span>

          @foreach ($random_book as $rand)
          <div class="ln-recent-item">
            <div class="ln-recent-img">
              <a href="{{ route('detail', ['title' => CateController::getAlias($rand->cate_id), 'str_book' => get_strBook($rand->id,$rand->alias) ]) }}"><img src="upload/products/{{$rand->image_before}}" ></a>
            </div>
            <div class="ln-recent-infor">
              <a href="{{ route('detail', ['title' => CateController::getAlias($rand->cate_id), 'str_book' => get_strBook($rand->id,$rand->alias) ]) }}" class="medium c-dark">{{$rand->name}}</a>
              
              @if ($rand->discount==0)
              <a href="{{ route('detail', ['title' => CateController::getAlias($rand->cate_id), 'str_book' => get_strBook($rand->id,$rand->alias) ]) }}" class="light product-price" style="font-size:13px">{{ number_format($rand->price) }}đ</a>
              @else
              <a href="{{ route('detail', ['title' => CateController::getAlias($rand->cate_id), 'str_book' => get_strBook($rand->id,$rand->alias) ]) }}" class="light product-price" style="font-size:13px"><span class="old-price">{{ number_format($rand->price) }}đ</span>{{ number_format($rand->price * (1 - $rand->discount/100)) }}đ</a>
              @endif

            </div>
          </div>
          @endforeach
          
        </div>
      </div>


      <!-- MAIN CONTENT -->
      <div class="small-12 medium-12 large-9 columns content-wrap">
        <div class="row content-wrap-head">
          <span class="content-wrap-title float-left">Duyệt thấy {{$total_books}} sản phẩm</span>
          <select>
            <option>Default sorting</option>
            <option>Sort by popularity</option>
            <option>Sort by newness</option>
          </select>
        </div>
        <div class="row large-up-4 medium-up-3 small-up-2 products">

          @foreach ($ls_books as $book)
          <div class="columns">
            <div class="product-item relative" id="{{ $book->image_before }}">
              <div class="product-img-wrap">
                <a href="{{ route('detail', ['title' => changeTitle($title), 'str_book' => get_strBook($book->id,$book->alias) ]) }}"><img src="upload/products/{{$book->image_before}}" class="centered my-img"></a>
              </div>
              <div class="product-infor-wrap center-content c-dark">
                <a href="{{ route('detail', ['title' => changeTitle($title), 'str_book' => get_strBook($book->id,$book->alias) ]) }}" class="text-cap medium" style="font-size:16px">{{$book->name}}</a>

                @if ($book->discount==0)
                <a href="{{ route('detail', ['title' => changeTitle($title), 'str_book' => get_strBook($book->id,$book->alias) ]) }}" class="light product-price" style="font-size:13px">{{ number_format($book->price) }}đ</a>
                @else
                <a href="{{ route('detail', ['title' => changeTitle($title), 'str_book' => get_strBook($book->id,$book->alias) ]) }}" class="light product-price" style="font-size:13px"><span class="old-price">{{ number_format($book->price) }}đ</span>{{ number_format($book->price * (1 - $book->discount/100)) }}đ</a>
                @endif

              </div>
              <div class="product-hover absolute" id="{{ $book->id }}">
                <a><i class="fa fa-shopping-cart" style="padding-right:5px"></i>ADD TO CART</a>
              </div>
            </div>
          </div>
          @endforeach


        </div>

        <!--Phân trang-->
        <div>

          @include('pages.pagination.page',['total_books'=>$total_books,'ls_books'=>$ls_books])

        </div>
        <!--End phân trang-->

      </div>
    </div>
  </main>
  <!-- END MAIN PRODUCT PAGE -->
  @endsection