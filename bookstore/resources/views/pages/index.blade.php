
@extends('master')
@section('title')
Trang Chủ
@endsection

@section('content')
<!-- SLIDER WRAP -->
<section id="slider">
  <div class="row slider-wrap">
    <div class="orbit banner-slider" role="region" data-orbit>
      <ul class="orbit-container">

        <button class="orbit-previous"><span class="show-for-sr">Previous Slide</span>&#9664;&#xFE0E;</button>
        <button class="orbit-next"><span class="show-for-sr">Next Slide</span>&#9654;&#xFE0E;</button>


        @foreach ($slider as $i)
        <li class="orbit-slide is-active slide">
          <img src="source/img/slider/{{ $i->img }}" class="orbit-image">
          <div class="orbit-caption back-none fullwidth vertical-center">
            <div class="slide-content center-content">
              <h4 class="light text-cap">Thực tập chuyên môn</h4>
              <h2 class="bold text-upp">T2HD Bookstore</h2>
              <h5 class="text-upp medium">Huy Tùng Tuấn Danh</h5>
              <div class="slider-link-wrap">
                <a href="{{ route('category',changeTitle('sản phẩm nổi bật')) }}" class="my-button bold text-upp back-none">Mua Sắm</a>
                <a href="{{ route('homeadmin') }}" class="my-button bold text-upp back-none">Trang Admin</a>
              </div>                
            </div>
          </div>
        </li>
        @endforeach


      </ul>

      <nav class="orbit-bullets slider-dot">
        <button class="is-active" data-slide="0"><span class="show-for-sr">First slide details.</span><span class="show-for-sr">Current Slide</span></button>
        <button data-slide="1"><span class="show-for-sr">Second slide details.</span></button>
        <button data-slide="2"><span class="show-for-sr">Third slide details.</span></button>
      </nav>
    </div>
  </div>
</section>
<!-- END SLIDER -->


<!-- BANNER -->
<section id="top-banner">
  <div class="row banner-wrap">
    <div class="relative top-banner-item banner-hover">
      <div class="hover-border"></div>
      <img src="source/img/banner/{{ $banner[0]->img }}" class="banner-img">
    </div>
    <div class="relative top-banner-item top-center-banner" style="margin:0 3.1%">
      <div class="relative top-center-banner-item banner-hover" style="margin-top: 1%;margin-bottom: 6%;">
        <div class="hover-border"></div>
        <img src="source/img/banner/{{ $banner[1]->img }}" class="banner-img">
      </div>
      <div class="relative top-center-banner-item banner-hover">
        <div class="hover-border"></div>
        <img src="source/img/banner/{{ $banner[2]->img }}" class="banner-img">
      </div>
    </div>
    <div class="relative top-banner-item banner-hover">
      <div class="hover-border"></div>
      <img src="source/img/banner/{{ $banner[3]->img }}" class="banner-img">
    </div>
  </div>
</section>
<!-- END BANNER -->


<!-- SẢN PHẨM MỚI -->
<section class="my-list">
  <div class="row section-title medium text-upp">
    <span>SẢN PHẨM MỚI</span>
    <a href="{{ route('category',changeTitle('sản phẩm mới')) }}" style="text-align: right; float: right; font-family: 'Times New Roman'; margin-right: 15px;">xem tất cả</a>
  </div>
  <div class="row large-up-5 medium-up-3 small-up-2 arrival-wrap">

    @foreach ($new_books as $new)
    <div class="columns">
      <div class="product-item relative" id="{{ $new->image_before }}">

        @if ($new->discount != 0)
        <div class="star-6-red "><span>{{ $new->discount }}%</span></div>
        @endif

        <div class="product-img-wrap">
          <a href="{{ route('detail', ['title' => changeTitle('sản phẩm mới'), 'str_book' => get_strBook($new->id,$new->alias) ]) }}"><img src="upload/products/{{ $new->image_before }}" class="centered my-img"></a>
        </div>
        <div class="product-infor-wrap center-content c-dark">
          <a href="{{ route('detail', ['title' => changeTitle('sản phẩm mới'), 'str_book' => get_strBook($new->id,$new->alias) ]) }}" class="text-cap medium" style="font-size:16px">{{ $new->name }}</a>

          @if ($new->discount==0)
          <a href="{{ route('detail', ['title' => changeTitle('sản phẩm mới'), 'str_book' => get_strBook($new->id,$new->alias) ]) }}" class="light product-price" style="font-size:13px">{{ number_format($new->price) }}đ</a>
          @else
          <a href="{{ route('detail', ['title' => changeTitle('sản phẩm mới'), 'str_book' => get_strBook($new->id,$new->alias) ]) }}" class="light product-price" style="font-size:13px"><span class="old-price">{{ number_format($new->price) }}đ</span>{{ number_format($new->price * (1 - $new->discount/100)) }}đ</a>
          @endif

        </div>

        <div class="product-hover absolute" id="{{ $new->id }}">
          <a><i class="fa fa-shopping-cart" style="padding-right:5px"></i>ADD TO CART</a>
        </div>

      </div>
    </div>
    @endforeach

  </div>
</section>
<!-- END SẢN PHẨM MỚI -->


<!--SẢN PHẨM NỔI BẬT-->
<section class="my-list">
 <div class="row section-title medium text-upp">
   <span>SẢN PHẨM NỔI BẬT</span>
   <a href="{{ route('category',changeTitle('sản phẩm nổi bật')) }}" style="text-align: right; float: right; font-family: 'Times New Roman'; margin-right: 15px;">xem tất cả</a>
 </div>
 <div class="row large-up-5 medium-up-3 small-up-2 arrival-wrap">

  @foreach ($hl_books as $hl)
  <div class="columns">
    <div class="product-item relative" id="{{ $hl->image_before }}">

      @if ($hl->discount != 0)
      <div class="star-6-red "><span>{{ $hl->discount }}%</span></div>
      @endif

      <div class="product-img-wrap">
        <a href="{{ route('detail', ['title' => changeTitle('sản phẩm nổi bật'), 'str_book' => get_strBook($hl->id,$hl->alias) ]) }}"><img src="upload/products/{{ $hl->image_before }}" class="centered my-img"></a>
      </div>
      <div class="product-infor-wrap center-content c-dark">
        <a href="{{ route('detail', ['title' => changeTitle('sản phẩm nổi bật'), 'str_book' => get_strBook($hl->id,$hl->alias) ]) }}" class="text-cap medium" style="font-size:16px">{{ $hl->name }}</a>

        @if ($hl->discount==0)
        <a href="{{ route('detail', ['title' => changeTitle('sản phẩm nổi bật'), 'str_book' => get_strBook($hl->id,$hl->alias) ]) }}" class="light product-price" style="font-size:13px">{{ number_format($hl->price) }}đ</a>
        @else
        <a href="{{ route('detail', ['title' => changeTitle('sản phẩm nổi bật'), 'str_book' => get_strBook($hl->id,$hl->alias) ]) }}" class="light product-price" style="font-size:13px"><span class="old-price">{{ number_format($hl->price) }}đ</span>{{ number_format($hl->price * (1 - $hl->discount/100)) }}đ</a>
        @endif

      </div>

      <div class="product-hover absolute" id="{{ $hl->id }}">
        <a><i class="fa fa-shopping-cart" style="padding-right:5px"></i>ADD TO CART</a>
      </div>

    </div>
  </div>
  @endforeach

</div>
</section>
<!--END SẢN PHẨM NỔI BẬC-->

<!--SẢN PHẨM BÁN CHẠY-->
<section class="my-list">
 <div class="row section-title medium text-upp">
   <span>SẢN PHẨM BÁN CHẠY</span>
   <a href="{{ route('category',changeTitle('sản phẩm bán chạy')) }}" style="text-align: right; float: right; font-family: 'Times New Roman'; margin-right: 15px;">xem tất cả</a>
 </div>
 <div class="row large-up-5 medium-up-3 small-up-2 arrival-wrap">

  @foreach ($sold_books as $sold)
  <div class="columns">
   <div class="product-item relative" id="{{ $sold->image_before }}">

     @if ($sold->discount != 0)
     <div class="star-6-red "><span>{{ $sold->discount }}%</span></div>
     @endif

     <div class="product-img-wrap">
       <a href="{{ route('detail', ['title' => changeTitle('sản phẩm bán chạy'), 'str_book' => get_strBook($sold->id,$sold->alias) ]) }}"><img src="upload/products/{{ $sold->image_before }}" class="centered my-img"></a>
     </div>
     <div class="product-infor-wrap center-content c-dark">
       <a href="{{ route('detail', ['title' => changeTitle('sản phẩm bán chạy'), 'str_book' => get_strBook($sold->id,$sold->alias) ]) }}" class="text-cap medium" style="font-size:16px">{{ $sold->name }}</a>

       @if ($sold->discount==0)
       <a href="{{ route('detail', ['title' => changeTitle('sản phẩm bán chạy'), 'str_book' => get_strBook($sold->id,$sold->alias) ]) }}" class="light product-price" style="font-size:13px">{{ number_format($sold->price) }}đ</a>
       @else
       <a href="{{ route('detail', ['title' => changeTitle('sản phẩm bán chạy'), 'str_book' => get_strBook($sold->id,$sold->alias) ]) }}" class="light product-price" style="font-size:13px"><span class="old-price">{{ number_format($sold->price) }}đ</span>{{ number_format($sold->price * (1 - $sold->discount/100)) }}đ</a>
       @endif

     </div>

     <div class="product-hover absolute" id="{{ $sold->id }}">
       <a><i class="fa fa-shopping-cart" style="padding-right:5px"></i>ADD TO CART</a>
     </div>
     
   </div>
 </div>
 @endforeach

</div>
</section>
<!--END SẢN PHẨM BÁN CHẠY-->

@endsection