<header class="header-style-1"> 
  
    <!-- ============================================== TOP MENU ============================================== -->
    <div class="top-bar animate-dropdown">
      <div class="container">
        <div class="header-top-inner">
          <div class="cnt-account">
            <ul class="list-unstyled">
              


              <li><a href="{{ route('profile') }}"><i class="icon fa fa-user"></i>{{ __('auth.my-account') }}</a></li>
              <li><a href="{{route('wishlist')}}"><i class="icon fa fa-heart"></i>{{ __('auth.wishlist') }}</a></li>
              <li><a href="{{route('my-cart')}}"><i class="icon fa fa-shopping-cart"></i>{{ __('auth.cart') }}</a></li>
              <li><a href="{{ route('checkout') }}"><i class="icon fa fa-check"></i>{{ __('auth.checkout') }}</a></li>
              <li>
                @auth
                <a href="{{ route('profile') }}"><i class="icon fa fa-user"></i>{{ __('auth.User-Profile') }}</a>
                @else
                <a href="{{ route('login') }}"><i class="icon fa fa-lock"></i>{{ __('auth.login') }}</a>
                @endauth
              </li>
            </ul>
          </div>
          <!-- /.cnt-account -->
          
          <div class="cnt-block">
            <ul class="list-unstyled list-inline">
              
              <li class="dropdown dropdown-small"> <a href="#" class="dropdown-toggle" data-hover="dropdown" data-toggle="dropdown"><span class="value">{{ __('auth.language') }}</span><b class="caret"></b></a>
                <ul class="dropdown-menu">
                  
                    @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                        <li>
                            <a rel="alternate" hreflang="{{ $localeCode }}" href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">
                                {{ $properties['native'] }}
                            </a>
                        </li>
                    @endforeach
                
                </ul>
              </li>
            </ul>
            <!-- /.list-unstyled --> 
          </div>
          <!-- /.cnt-cart -->
          <div class="clearfix"></div>
        </div>
        <!-- /.header-top-inner --> 
      </div>
      <!-- /.container --> 
    </div>
    <!-- /.header-top --> 
    <!-- ============================================== TOP MENU : END ============================================== -->
    <div class="main-header">
      <div class="container">
        <div class="row">
          <div class="col-xs-12 col-sm-12 col-md-3 logo-holder"> 
            @php
                $site = DB::table('site_settings')->find(1);
            @endphp
            <!-- ============================================================= LOGO ============================================================= -->
            <div class="logo"> <a href="/"> <img src="{{ asset('upload/logo/'.$site->logo) }}" alt="logo"> </a> </div>
            <!-- /.logo --> 
            <!-- ============================================================= LOGO : END ============================================================= --> </div>
          <!-- /.logo-holder -->
          
          <div class="col-xs-12 col-sm-12 col-md-7 top-search-holder"> 
            <!-- /.contact-row --> 
            <!-- ============================================================= SEARCH AREA ============================================================= -->
            <div class="search-area">
              <form action="{{ route('search.result') }}" method="POST">
                @csrf
                <div class="control-group">
                  <ul class="categories-filter animate-dropdown">
                    <li class="dropdown"> <a class="dropdown-toggle"  data-toggle="dropdown" href="category.html">Categories <b class="caret"></b></a>
                      <ul class="dropdown-menu" role="menu" >
                        @php
                            $category = DB::table('categories')->select('id', 'category_name_'.LaravelLocalization::getCurrentLocale().' as name')->first();
                            $sub = DB::table('sub_categories')->where('category_id',$category->id)->get();
                        @endphp
                        <li class="menu-header">{{ $category->name}}</li>

                        @foreach ($sub as $item)
                        <li role="presentation"><a role="menuitem" tabindex="-1" href="">- {{ $item->subCategory_name_en }}</a></li>
                        @endforeach

                      </ul>
                    </li>
                  </ul>
                  <input class="search-field" id="search" onfocus="search_show()" onblur="search_hide()" name="search" placeholder="Search here..." />
                  <button type="submit" class="search-button"  ></button> </div>
                  
              </form>
              <div class="search-result">
              
              </div>
            </div>
            
            <!-- /.search-area --> 
            
            <!-- ============================================================= SEARCH AREA : END ============================================================= --> </div>
          <!-- /.top-search-holder -->
          
          <div class="col-xs-12 col-sm-12 col-md-2 animate-dropdown top-cart-row"> 
            <!-- ============================================================= SHOPPING CART DROPDOWN ============================================================= -->
            
            <div class="dropdown dropdown-cart"> <a href="#" class="dropdown-toggle lnk-cart" data-toggle="dropdown">
              <div class="items-cart-inner">
                <div class="basket"> <i class="glyphicon glyphicon-shopping-cart"></i> </div>
                <div class="basket-item-count"><span class="count cartCount"></span></div>
                <div class="total-price-basket"> <span class="lbl">cart -</span> <span class="total-price"><span class="value" id="total"></span> </span> </div>
              </div>
              </a>
              <ul class="dropdown-menu list-item-cart">
                <li>
                  <div class="my-item">
                    
                  </div>
                  <div class="clearfix cart-total">
                    <div class="pull-right"> <span class="text">Sub Total :</span><span class='price' id="total"></span> </div>
                    <div class="clearfix"></div>
                    <a href="{{ route('checkout') }}" class="btn btn-upper btn-primary btn-block m-t-20">Checkout</a> </div>
                  <!-- /.cart-total--> 
                  
                </li>
                
              </ul>
              <!-- /.dropdown-menu--> 
            </div>
            <!-- /.dropdown-cart --> 
            
            <!-- ============================================================= SHOPPING CART DROPDOWN : END============================================================= --> </div>
          <!-- /.top-cart-row --> 
        </div>
        <!-- /.row --> 
        
      </div>
      <!-- /.container --> 
      
    </div>
    <!-- /.main-header --> 
    
    <!-- ============================================== NAVBAR ============================================== -->
    <div class="header-nav animate-dropdown">
      <div class="container">
        <div class="yamm navbar navbar-default" role="navigation">
          <div class="navbar-header">
         <button data-target="#mc-horizontal-menu-collapse" data-toggle="collapse" class="navbar-toggle collapsed" type="button"> 
         <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
          </div>
          <div class="nav-bg-class">
            <div class="navbar-collapse collapse" id="mc-horizontal-menu-collapse">
              <div class="nav-outer">
                <ul class="nav navbar-nav">
                  <li class="active dropdown yamm-fw"> <a href="/" data-hover="dropdown" class="dropdown-toggle" data-toggle="dropdown">{{ __('auth.home') }}</a> </li>

                  @php
                      $categories = DB::table('categories')->select('*', 'category_name_'.LaravelLocalization::getCurrentLocale().' as name')->orderBy('category_name_en','ASC')->get();

                  @endphp

                @foreach ($categories as $category)
                    
                

                  <li class="dropdown yamm mega-menu"> <a href="" data-hover="dropdown" class="dropdown-toggle" data-toggle="dropdown">{{$category ->name}}</a>
                    <ul class="dropdown-menu container">
                      <li>
                        <div class="yamm-content ">
                          <div class="row">
                            @php

                              $subCategory = DB::table('sub_categories')->where('category_id',$category->id)->orderBy('subCategory_name_en','ASC')->get();

                            @endphp
                            @foreach ($subCategory as $sub)
                                
                           
                            <div class="col-xs-12 col-sm-6 col-md-2 col-menu">
                              <a href="{{ route('show.product.subCategory',['id'=>$sub->id, 'sub_slug'=>$sub->subCategory_slug_en]) }}"
                                style="padding:0">
                              <h2 class="title">{{$sub->subCategory_name_en}}</h2>
                            </a>
                              @php
                                   $subsub = DB::table('sub_sub_categories')->where('SubCategory_id',$sub->id)->orderBy('SubSubCategory_name_en','ASC')->get();
                              @endphp
                              @foreach ($subsub as $item)
                                  
                              
                              <ul class="links">
                                <li><a href="{{ route('show.product.subsub',['id'=>$item->id, 'sub_slug'=>$item->SubSubCategory_slug_en]) }}">{{ $item->SubSubCategory_name_en }}</a></li>
                              </ul>
                              @endforeach
                            </div>
                            @endforeach
                            <!-- /.col -->
                            
                            
                            
                            <div class="col-xs-12 col-sm-6 col-md-4 col-menu banner-image"> <img class="img-responsive" src="{{ asset('frontend/assets/images/banners/top-menu-banner.jpg') }}" alt=""> </div>
                            <!-- /.yamm-content --> 
                          </div>
                        </div>
                      </li>
                    </ul>
                  </li>

                  @endforeach
                  
                  <li class="dropdown  navbar-right special-menu"> <a href="#">{{ __('auth.today_offer') }}</a> </li>
                </ul>
                <!-- /.navbar-nav -->
                <div class="clearfix"></div>
              </div>
              <!-- /.nav-outer --> 
            </div>
            <!-- /.navbar-collapse --> 
            
          </div>
          <!-- /.nav-bg-class --> 
        </div>
        <!-- /.navbar-default --> 
      </div>
      <!-- /.container-class --> 
      
    </div>
    <!-- /.header-nav --> 
    <!-- ============================================== NAVBAR : END ============================================== --> 
    
  </header>

  <style>
    .search-area {
      position: relative
    }
    .search-result {
      position: absolute;
      background-color: #FFF;
      top: 100%;
      left: 0;
      width: 100%;
      z-index: 10000;
      
    }
   
  </style>
  <script>
    function search_show() {
        $('.search-result').slideDown('slow');
        }
        function search_hide() {
      
            $('.search-result').slideUp('slow');
          
        }
        
  </script>