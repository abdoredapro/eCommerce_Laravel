<div id="brands-carousel" class="logo-slider wow fadeInUp">
    <div class="logo-slider-inner">
      <div id="brand-slider" class="owl-carousel brand-slider custom-carousel owl-theme">
        @php
            $brands = DB::table('brands')->get();
        @endphp
        @foreach ($brands as $item)
        <div class="item"> <a href="#" class="image"> <img data-echo="{{ asset('/upload/brand_image/'.$item->brand_image) }}" src="{{ asset('/upload/brand_image/'.$item->brand_image) }}" style="width: 90px"> </a> </div>
        @endforeach
        <!--/.item--> 
      </div>
      <!-- /.owl-carousel #logo-slider --> 
    </div>
    <!-- /.logo-slider-inner --> 
    
  </div>