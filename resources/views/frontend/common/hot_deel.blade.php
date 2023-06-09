@php
    $hotProducts = DB::table('products')->where('status',1)->where('hot_deals',1)->
        where('discount_price','!=',null)->orderBy('id','DESC')->limit(6)->get();
@endphp

<div class="sidebar-widget hot-deals wow fadeInUp outer-bottom-xs">
    <h3 class="section-title">hot deals</h3>
    <div class="owl-carousel sidebar-carousel custom-carousel owl-theme outer-top-ss">
      @foreach ($hotProducts as $item)

      <div class="item">
        <div class="products">
          <div class="hot-deal-wrapper">
            <div class="image"> <img src="{{ asset('upload/product/'.$item->product_thambnail) }}" alt=""> </div>
            <div class="sale-offer-tag"><span>
              @php

                $discount = $item ->selling_price - $item ->discount_price;
                $percentage  = ($discount /$item ->selling_price ) * 100;

                @endphp
                @if ($item->discount_price !==null)
                    {{ round($percentage) }}%
                @else
                    new
                @endif

              <br>
              off</span></div>
            <div class="timing-wrapper">
              <div class="box-wrapper">
                <div class="date box"> <span class="key">120</span> <span class="value">DAYS</span> </div>
              </div>
              <div class="box-wrapper">
                <div class="hour box"> <span class="key">20</span> <span class="value">HRS</span> </div>
              </div>
              <div class="box-wrapper">
                <div class="minutes box"> <span class="key">36</span> <span class="value">MINS</span> </div>
              </div>
              <div class="box-wrapper hidden-md">
                <div class="seconds box"> <span class="key">60</span> <span class="value">SEC</span> </div>
              </div>
            </div>
          </div>
          <!-- /.hot-deal-wrapper -->
          
          <div class="product-info text-left m-t-20">
            <h3 class="name"><a href="{{route('product.detail',['id'=>$item->id,'slug'=>$item->product_slug_en])}}">{{ $item->product_name_en }}</a></h3>
            <div class="rating rateit-small"></div>

                @if ($item->discount_price !== null) 
            <div class="product-price"> 
              <span class="price"> ${{ $item->discount_price }} </span> 
              <span class="price-before-discount">$ {{ $item->selling_price }}</span> 
            </div>
            @else
              <span class="price"> ${{ $item->selling_price }} </span> 
            @endif
           
            
            <!-- /.product-price --> 
            
          </div>
          <!-- /.product-info -->

        
          
          <div class="cart clearfix animate-effect">
            <div class="action">
              <div class="add-cart-button btn-group">
                <button id='{{$item->id}}'data-toggle="modal" data-target="#exampleModal" onclick="getProduct(this.id)" class="btn btn-primary icon" data-toggle="dropdown" type="button"> <i class="fa fa-shopping-cart"></i> </button>
                <button id='{{$item->id}}'data-toggle="modal" data-target="#exampleModal" onclick="getProduct(this.id)" class="btn btn-primary cart-btn" type="button">Add to cart</button>
              </div>
            </div>
            <!-- /.action --> 
          </div>
          <!-- /.cart --> 
        </div>
      </div>

      @endforeach
    </div>
    <!-- /.sidebar-widget --> 
  </div>