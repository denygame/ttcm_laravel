@php
  use App\Http\Controllers\CateController;
@endphp

@extends('master')
@section('title')
Chi tiết sách: {{$book->name}}
@endsection

@section('content')
<!-- PAGE ADDRESS  -->
<section id="page-address">
  <div class="row page-address-wrap">
    <div class="small-12 medium-12 large-6 columns page-name">
      <span class="float-left c-sexy medium">CHI TIẾT SẢN PHẨM</span>
    </div>
    <div class="small-12 medium-12 large-6 columns page-add">
      <span class="float-right medium">
        <a href="{{ route('home') }}" class="c-light">Trang chủ</a>
        <a href="{{ route('category',changeTitle($type)) }}" class="c-light">{{$type}}</a>
        <a class="c-light">{{$book->name}}</a></span>
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

        

          @foreach ($random_2book as $rand)
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
      <!-- CONTENT MAIN -->
      <div class="small-12 medium-12 large-9 columns content-wrap">
        <div class="row detail-wrap">
          <div class="small-12 medium-12 large-6 columns detail-img">
            <div class="fluid-width detail-main-img">
              <div d-main-img-wrap>
                <img src="upload/products/{{$book->image_before}}" class="img-before">
                <img src="upload/products/{{$book->image_after}}" style="display: none" class="img-after">
              </div>
            </div>
            <div class="fluid-width detail-sub-img">
              <div class="row">
                <div class="small-3 medium-3 large-3 columns  d-sub-img-wrap before">
                  <img src="upload/products/{{$book->image_before}}">
                </div>
                <div class="small-3 medium-3 large-3  columns d-sub-img-wrap after">
                  <img src="upload/products/{{$book->image_after}}">
                </div>
                <div class="small-3 medium-3 large-3 columns  ">
                </div>
                <div class="small-3 medium-3 large-3 columns  ">
                </div>
              </div>
            </div>
          </div>
          <div class="small-12 medium-12 large-6 columns detail-text">
            <span class="c-sad text-upp detail-product-name">{{$book->name}}</span>

            @if ($book->discount==0)
            <span class="medium product-price">{{ number_format($book->price) }}đ</span>
            @else
            <span class="medium product-price"><span class="old-price">{{ number_format($book->price) }}đ</span>{{ number_format($book->price * (1 - $book->discount/100)) }}đ</span>
            @endif


            <div class="detail-text-main">
              <span class="detail-product-avai"><b class="text-cap">Tình trạng:</b> {{$book->status}}</span>
              <span class="text-upp detail-product-sku"><b class="text-cap">Tác giả:</b> {{ $book->author }}</span>
              <span class="text-upp detail-product-sku"><b class="text-cap">Nhà xuất bản:</b> {{ $book->com_publish }}</span>
              <span class="text-upp detail-product-sku"><b class="text-cap">Ngày xuất bản:</b> {{ $book->date_publish }}</span>
              <p>{{substr($book->description, 0, 300)}}...</p>
            </div>
            <div class="detail-option-wrap">
              <input type="number" name="" min="1" value="1" class="input-qty-book-detail">
              <button type="submit" class="cart-button" onclick="addToCartDetail({{ $book->id }})"><i class="fa fa-shopping-cart"></i>ADD TO CART</button>
            </div>
            <span style="display: block; padding-bottom: 5px;" class="tag">Tag:<a href="{{ route('category', changeTitle($type)) }}" class="bold c-sad"> {{ changeTitle($type) }}</a></span>
            {{-- <span style="display: block; padding-bottom: 5px;" class="tag">Category:<a href="" class="bold c-sad">  valentine</a></span> --}}
          </div>
        </div>

        <div class="row description-area">
          <ul class="tabs" data-tabs id="description-tabs">
            <li class="tabs-title is-active"><a href="#panel1" aria-selected="true">NỘI DUNG</a></li>
            <li class="tabs-title"><a href="#panel2">ĐÁNH GIÁ</a></li>
          </ul>
          <div class="tabs-content" data-tabs-content="description-tabs">
            <div class="tabs-panel is-active" id="panel1">

              <p>{{$book->description}}</p>
              
            </div>
            <div class="tabs-panel" id="panel2">

            </div>
          </div>
        </div>

        <div class="row relate-title" style="margin-top: 50px;">
          <span class="bold">SẢN PHẨM CÙNG DANH MỤC</span> <a href="{{ route('category',changeTitle($type)) }}" style="float: right">xem tất cả</a>
        </div>
        <div class="row large-up-4 medium-up-3 small-up-2">


          @foreach ($random_4book as $book)
          <div class="columns">
            <div class="product-item relative" id="{{ $book->image_before }}">

              @if ($book->discount != 0)
              <div class="star-6-red "><span>{{ $book->discount }}%</span></div>
              @endif

              <div class="product-img-wrap">
                <a href="{{ route('detail', ['title' => changeTitle($type), 'str_book' => get_strBook($book->id,$book->alias) ]) }}"><img src="upload/products/{{$book->image_before}}"class="centered my-img"></a>
              </div>

              <div class="product-infor-wrap center-content c-dark">
                <a href="{{ route('detail', ['title' => changeTitle($type), 'str_book' => get_strBook($book->id,$book->alias) ]) }}" class="text-cap medium"style="font-size:16px">{{ $book->name }}</a>

                @if ($book->discount==0)
                <a href="{{ route('detail', ['title' => changeTitle($type), 'str_book' => get_strBook($book->id,$book->alias) ]) }}" class="light product-price" style="font-size:13px">{{ number_format($book->price) }}đ</a>
                @else
                <a href="{{ route('detail', ['title' => changeTitle($type), 'str_book' => get_strBook($book->id,$book->alias) ]) }}" class="light product-price" style="font-size:13px"><span class="old-price">{{ number_format($book->price) }}đ</span>{{ number_format($book->price * (1 - $book->discount/100)) }}đ</a>
                @endif

              </div>

              <div class="product-hover absolute" id="{{ $book->id }}">
                <a><i class="fa fa-shopping-cart"style="padding-right:5px"></i>ADD TO CART</a>
              </div>
            </div>
          </div>
          @endforeach
          

        </div>
      </div>
    </div>
  </main>
  <!-- END MAIN PRODUCT PAGE -->
  @endsection