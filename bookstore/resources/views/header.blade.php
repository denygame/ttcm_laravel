  @php
  use App\Http\Controllers\CateController;
  @endphp

  @inject('cartController', 'App\Http\Controllers\CartController')

  <header>
    <section id="topbar"class="show-for-large">
      <div class="row topbar-wrap">
        <div class="large-6 columns social-link">
          <ul>
            <li>
              <a href="">
                <i class="fa fa-facebook"></i>
              </a>
            </li>
            <li>
              <a href="">
                <i class="fa fa-rss"></i>
              </a>
            </li>
            <li>
              <a href="">
                <i class="fa fa-twitter"></i>
              </a>
            </li>
            <li>
              <a href="">
                <i class="fa fa-google-plus"></i>
              </a>
            </li>
          </ul>
        </div>

        <!--Thanh top head -->
        <div class="large-6 columns signup relative">


          <div class="reveal" id="login-modal" data-reveal>
            <center><h3></h3></center>
            <div id="list-error-login"></div><br>
            <center><p>Bookstore T2HD</p></center>
            <button class="close-button" data-close aria-label="Close modal" type="button">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          

          
          @if (Auth::check())

          <a class="float-right login-link">Chào bạn <span>{{ Auth::user()->name }}</span></a>

          <!--Lúc đã đăng nhập show-->
          <div class="absolute login-popup regular" style="width: 200px;">
            <span class="login-popup-title bold c-sad">Trang cá nhân</span>
            <div >
              <a href="{{ route('profile') }}"><i class="fa fa-hand-o-right"></i> Thông tin cá nhân</a>
            </div >

            <div >
              <a href="{{ route('logout') }}"><i class="fa fa-hand-o-right"></i> Đăng xuất</a>
            </div>
          </div>

          @else

          <a href="{{ route('login') }}" class="float-right login-link">Đăng nhập</a>
          <!--Lúc chưa đăng nhập show-->
          <div class="absolute login-popup regular">
            <span class="login-popup-title bold c-sad">ĐĂNG NHẬP</span>

            <form id="login-form">
              <input type="hidden" name="_token" value="{{ csrf_token() }}">

              <span class="login-popup-lable">Email</span>
              <div class="lp-input-wrap">
                <input type="text" name="email">
              </div>
              <span class="login-popup-lable">Password</span>
              <div class="lp-input-wrap">
                <input type="password" name="password">
              </div>
              <span class="login-popup-link c-dark light"><a class="popup-login-button">Đăng nhập</a> bạn chưa có tài khoản? <a href="{{ route('register') }}" class="bold c-sexy" style="font-size: 14px">Đăng ký</a></span>
              <center><a href="{{ route('forget') }}"><span class="bold c-sexy forget-link" style="font-size: 14px">Quên mật khẩu?</span></a></center>
            </form>
          </div>

          @endif



        </div>
        <!--Kết thúc thanh top head-->
      </div>
    </section>
    <!-- END TOPBAR -->

    <!-- MOBILE TOP BAR -->
    <section id="mobile-topbar"class="hide-for-large">
      <div class="row mobile-topbar-wrap">
        <div class="small-6 medium-6 columns top-mail-wrap">
          <a href=""class="float-left"><i class="fa fa-envelope-o"></i>T2HD@gmail.com</a>
        </div>
        <div class="small-6 medium-6 columns top-phone-wrap">
          <a href=""class="float-right"><i class="fa fa-phone"></i>+84 1234 567</a>
        </div>
      </div>
    </section>
    <!-- END MOBILE TOPBAR -->

    <!-- LOGO BAR -->
    <section id="logobar">
      <div class="row logo-wrap">
        <div class="large-4 columns phone-link show-for-large">
          <a href=""class="float-left c-sexy"><i class="fa fa-phone-square c-fun"></i>(01) 123 456 789</a>
        </div>
        <div class="large-4 columns logo-img">
          <img src="source/img/logo/1.png"class="float-center">
        </div>


        <!--Giỏ hàng-->
        <div class="large-4 columns shopping-cart show-for-large relative">
          <a href="{{ route('cart') }}" class="float-right relative center-content cart-icon">
            <i class="fa fa-shopping-cart c-clear"></i>
            <span class="absolute cart-count-wrap center-content">
              <span class="cart-count">{{ $cartController->getCount() }}</span>
            </span>
          </a>

          @if ($cartController->getCount()==0)

          <div class="cart-hover empty-cart absolute medium c-sad show-for-large">
            <span>Không có sản phẩm nào trong giỏ hàng.</span>
          </div>

          @else

          <div class="cart-hover item-cart absolute medium c-sad show-for-large">

            <span>Bạn có <span class="cart-count">{{ $cartController->getCount() }}</span> sản phẩm trong giỏ hàng</span>

            <div class="my-cart-list">


              @foreach ($shopping_cart as $item)

              @php
              $id=$item->id;
              $infoRoute = $cartController->getInfoRoute($id);
              @endphp

              <div class="cart-item-wrap">

                <div class="cart-item-img">
                  <a href="{{ route('detail', ['title' => $infoRoute['title'], 'str_book' => $infoRoute['str_book'] ]) }}">
                    <img src="upload/products/{{ $item->options['img'] }}">
                  </a>
                </div>

                <div class="cart-item-text">

                  <a href="{{ route('detail', ['title' => $infoRoute['title'], 'str_book' => $infoRoute['str_book'] ]) }}">{{ $item->name }}</a>

                  @if ($item->options['discount']!=0)
                  <a href="{{ route('detail', ['title' => $infoRoute['title'], 'str_book' => $infoRoute['str_book'] ]) }}">
                    <span style="color: #ec6ã">{{ number_format($item->price) }}đ</span> <span style="text-decoration: line-through">{{ number_format($item->options['r_price']) }}đ</span>
                  </a>
                  @else
                  <a href="{{ route('detail', ['title' => $infoRoute['title'], 'str_book' => $infoRoute['str_book'] ]) }}">
                    <span style="color: #ec6ã">{{ number_format($item->price) }}đ</span>
                  </a>
                  @endif

                  <h6>{{ $item->qty }}</h6>

                </div>
              </div>

              @endforeach

            </div>

            <div class="cart-total-button-wrap">
              <span class="text-upp regular total">TỔNG TIỀN:<span>{{ $cartController->getTotal() }} đ</span></span>
              <div class="button-wrap horizontal-center">
                <a href="{{ route('cart') }}" class="cart-popup-button text-upp">GIỎ HÀNG<i class="fa fa-angle-double-right flloat-right"></i></a>
              </div>
              <div  class="button-wrap horizontal-center">
                <a href="{{ route('checkout') }}" class="cart-popup-button text-upp b-fun">THANH TOÁN<i class="fa fa-angle-double-right flloat-right"></i></a>
              </div>
            </div>
            
          </div>

          @endif
          <!--Kết thúc giỏ hàng-->

        </div>
      </div>
    </section>
    <!-- END LOGO BAR -->

    <!-- MENU BAR -->
    <nav id="menu" class="show-for-large">
      <div class="row horizontal-center menu-wrap">
        <ul class="centered">
          <li>
            <a href="{{ route('home') }}" title="">TRANG CHỦ</a>
          </li>
          <li>
            <a title="">HOT<i class="fa fa-angle-down"></i></a>
            <ul class="dropdown-menu absolute large-dropdown catogory-dropdown">
              <li>
                <ul class="catogory-title-ul">
                  <li><a href="#cat-1">SẢN PHẨM MỚI<i class="fa fa-angle-double-right"></i></a></li>
                  <li><a href="#cat-2">SIÊU GIẢM GIÁ<i class="fa fa-angle-double-right"></i></a></li>
                  <li><a href="#cat-3">BÁN CHẠY NHẤT<i class="fa fa-angle-double-right"></i></a></li>
                </ul>
              </li>
              <li>

                {{-- SẢN PHẨM MỚI --}}
                <ul class="catogory-view-ul absolute cato-active" id="cat-1">

                  @foreach ($new_book as $new)
                  <li>
                    <div class="product-item" style="position: relative" id="{{ $new->image_before }}">

                      @if ($new->discount != 0)
                      <div class="star-6-red "><span>{{ $new->discount }}%</span></div>
                      @endif

                      <div class="cato-img-wrap" style="margin-top: -20px;">
                        <a href="{{ route('detail',['title'=>changeTitle('Sản phẩm mới'),'str_book'=>get_strBook($new->id,$new->alias)]) }}"><img src="upload/products/{{ $new->image_before }}" class="my-img centered"></a>
                      </div>

                      @if (strlen($new->name) <= 27)
                      <a href="{{ route('detail',['title'=>changeTitle('Sản phẩm mới'),'str_book'=>get_strBook($new->id,$new->alias)]) }}">{{ $new->name }}</a>
                      @else
                      <a href="{{ route('detail',['title'=>changeTitle('Sản phẩm mới'),'str_book'=>get_strBook($new->id,$new->alias)]) }}">{{ substr($new->name, 0, 24) }}...</a>
                      @endif


                      @if ($new->discount==0)
                      <a><span>{{ number_format($new->price) }}đ</span></a>
                      @else
                      <a><span>{{ number_format($new->price * (1 - $new->discount/100)) }}đ</span></a>
                      @endif

                      <div class="product-hover absolute" id="{{ $new->id }}">
                        <a><i class="fa fa-shopping-cart"style="padding-right:5px"></i>ADD TO CART</a>
                      </div>
                    </div>
                  </li>
                  @endforeach

                </ul>

                {{-- SIÊU GIẢM GIÁ --}}
                <ul class="catogory-view-ul absolute" id="cat-2">

                  @foreach ($super_discount as $sd)
                  <li>
                    <div class="product-item" style="position: relative" id="{{ $sd->image_before }}">

                      @if ($sd->discount != 0)
                      <div class="star-6-red "><span>{{ $sd->discount }}%</span></div>
                      @endif

                      <div class="cato-img-wrap" style="margin-top: -20px;">
                        <a href="{{ route('detail',['title'=>CateController::getAlias($sd->cate_id),'str_book'=>get_strBook($sd->id,$sd->alias)]) }}"><img src="upload/products/{{ $sd->image_before }}" class="my-img centered"></a>
                      </div>

                      @if (strlen($sd->name) <= 27)
                      <a href="{{ route('detail',['title'=>CateController::getAlias($sd->cate_id),'str_book'=>get_strBook($sd->id,$sd->alias)]) }}">{{ $sd->name }}</a>
                      @else
                      <a href="{{ route('detail',['title'=>CateController::getAlias($sd->cate_id),'str_book'=>get_strBook($sd->id,$sd->alias)]) }}">{{ substr($sd->name, 0, 24) }}...</a>
                      @endif


                      @if ($sd->discount==0)
                      <a><span>{{ number_format($sd->price) }}đ</span></a>
                      @else
                      <a><span>{{ number_format($sd->price * (1 - $sd->discount/100)) }}đ</span></a>
                      @endif

                      <div class="product-hover absolute" id="{{ $sd->id }}">
                        <a><i class="fa fa-shopping-cart"style="padding-right:5px"></i>ADD TO CART</a>
                      </div>
                    </div>
                  </li>
                  @endforeach

                </ul>

                {{-- BÁN CHẠY NHẤT --}}
                <ul class="catogory-view-ul absolute" id="cat-3">

                  @foreach ($sold_book as $sold)
                  <li>
                    <div class="product-item" style="position: relative" id="{{ $sold->image_before }}">

                      @if ($sold->discount != 0)
                      <div class="star-6-red "><span>{{ $sold->discount }}%</span></div>
                      @endif

                      <div class="cato-img-wrap" style="margin-top: -20px;">
                        <a href="{{ route('detail',['title'=>CateController::getAlias($sold->cate_id),'str_book'=>get_strBook($sold->id,$sold->alias)]) }}"><img src="upload/products/{{ $sold->image_before }}" class="my-img centered"></a>
                      </div>

                      @if (strlen($sold->name) <= 27)
                      <a href="{{ route('detail',['title'=>CateController::getAlias($sold->cate_id),'str_book'=>get_strBook($sold->id,$sold->alias)]) }}">{{ $sold->name }}</a>
                      @else
                      <a href="{{ route('detail',['title'=>CateController::getAlias($sold->cate_id),'str_book'=>get_strBook($sold->id,$sold->alias)]) }}">{{ substr($sold->name, 0, 24) }}...</a>
                      @endif

                      @if ($sold->discount==0)
                      <a><span>{{ number_format($sold->price) }}đ</span></a>
                      @else
                      <a><span>{{ number_format($sold->price * (1 - $sold->discount/100)) }}đ</span></a>
                      @endif

                      <div class="product-hover absolute" id="{{ $sold->id }}">
                        <a><i class="fa fa-shopping-cart"style="padding-right:5px"></i>ADD TO CART</a>
                      </div>
                    </div>
                  </li>
                  @endforeach


                </ul>


              </li>
            </ul>
          </li>

          <li>
            <a title="">DANH MỤC<i class="fa fa-angle-down"></i></a>
            <ul class="dropdown-menu absolute large-dropdown group-item-dropdown">

              @foreach ($cate as $ca)
              <li><a href="{{ route('category',$ca->alias) }}">{{ $ca->name }}</a></li>
              @endforeach

            </ul>
          </li>

          <li><a href="" title="">GIỚI THIỆU</i></a></li>
          <li><a href="" title="">LIÊN HỆ</i></a></li>
          <li><i class="fa fa-search search-icon"></i></li>
        </ul>
      </div>
    </nav>
    <!-- END MENUBAR -->

    <!-- SEARCH SECTION -->
    <section id="search" class="fullwidth vertical-center relative">
      <div class="cancel-wrap absolute">
        <i class="fa fa-times"></i>
      </div>
      <div class="search-input-wrap relative">
        <div class="input-border">
          <input type="text"name=""class="search-input"placeholder="Search item here ...">
          <button type="submit"><i class="fa fa-search"></i></button>
        </div>
      </div>
    </section>
    <!-- END SEARCH SECTION -->

    <!-- LOGIN MOBILE SECTION -->

    @if (Auth::check())

    <!--Lúc đã login-->
    <section id="customer-mobile" class="login-mobile fullwidth vertical-center relative">
      <div class="cancel-wrap absolute">
        <i class="fa fa-times"></i>
      </div>
      <div class="mobile-login-popup regular">
        <span class="login-popup-title bold c-sad">Trang cá nhân</span>
        <div >
          <a href="{{ route('profile') }}"><i class="fa fa-hand-o-right"></i> Thông tin cá nhân</a>
        </div >

        <div >
          <a href="{{ route('logout') }}"><i class="fa fa-hand-o-right"></i> Đăng xuất</a>
        </div>
      </div>
    </section>

    @else

    <!--Lúc chưa login-->
    <section id="" class="login-mobile fullwidth vertical-center relative" >
      <div class="cancel-wrap absolute">
        <i class="fa fa-times"></i>
      </div>        
      <div class="mobile-login-popup regular">
        <span class="login-popup-title bold c-sad">ĐĂNG NHẬP</span>

        <form id="mobile-login-form">
          <input type="hidden" name="_token" value="{{ csrf_token() }}">
          <span class="login-popup-lable">Email</span>
          <div class="lp-input-wrap">
            <input type="text" name="email">
          </div>
          <span class="login-popup-lable">Password</span>
          <div class="lp-input-wrap">
            <input type="password" name="password">
          </div>
          <center><span class="login-popup-link c-dark light"><a class="mobile-popup-login-button">Đăng nhập</a> bạn chưa có tài khoản? <a href="{{ route('register') }}" class="bold c-sexy" style="font-size: 14px">Đăng ký</a></span>
            <a href="{{ route('forget') }}"><span class="bold c-sexy forget-link" style="font-size: 14px">Quên mật khẩu?</span></a></center>
          </form>
        </div>        
      </section>


      @endif




      <!-- END LOGIN MOBILE SECTION -->


      <!-- MOBILE MENUBAR -->
      <nav id="mobile-menu" class="hide-for-large">
        <div class="row mobile-menu-wrap">
          <ul>
            <li id="mobile-menu-btn"><a href=""><i class="fa fa-bars"></i></a></li>
            <li id="userBtn"><a><i class="fa fa-user"></i></a></li>
            <li><a><i class="fa fa-search search-icon-mobile"></i></a></li>
            <li><a href="{{ route('cart') }}"><i class="fa fa-shopping-cart"></i><span class="mobile-cart-count">{{ $cartController->getCount() }}</span></a></li>
          </ul>
        </div>
      </nav>
      <!-- END MOBILE MENUBAR -->

      <!-- MOBILE SIDE MENU-->
      <section id="mobile-side-menu" class="hide-for-large my-scroll">
        <div class="row side-menu-cancel center-content"style="padding:2px;">
          <i class="fa fa-times"style="color: #fff;font-size: 20px; cursor: pointer"></i>
        </div>
        <div class="mobile-sidemenu-wrap ">
          <ul class="centered ">
            <li class="my"><a href="{{ route('home') }}" title="">HOME</a></li>
            <li ><a title="" class="my-dropdown-cate">DANH MỤC<i class="fa fa-angle-down"></i></a>
              <ul class="my-dropdown-cate-content">
                @foreach ($cate as $ca)
                <li><a href="{{ route('category', $ca->alias) }}">{{ $ca->name }}</a></li>
                @endforeach
              </ul>
            </li>
            <li class="my"><a href=""title="">GIỚI THIỆU</a></li>
            <li class="my"><a href=""title="">LIÊN HỆ</a></li>
          </ul>
        </div>
      </section>
      <!-- END MOBILE SIDE MENU -->
    </header>
