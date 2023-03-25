@extends('frontend.master')
@section('title')
    {{ $product->product_name_en }}
@endsection
@section('content')
<style>
	.checked {
  color: orange;
}
</style>
<div class="breadcrumb">
	<div class="container">
		<div class="breadcrumb-inner">
			<ul class="list-inline list-unstyled">
				<li><a href="#">Home</a></li>
				<li><a href="#">Clothing</a></li>
				<li class='active'>Floral Print Buttoned</li>
			</ul>
		</div><!-- /.breadcrumb-inner -->
	</div><!-- /.container -->
</div><!-- /.breadcrumb -->
<div class="body-content outer-top-xs">
	<div class='container'>
		<div class='row single-product'>
			<div class='col-md-3 sidebar'>
				<div class="sidebar-module-container">
				<div class="home-banner outer-top-n">
<img src="{{ asset('frontend/assets/images/banners/LHS-banner.jpg') }}" alt="Image">
</div>		
  
    
    
    	<!-- ============================================== HOT DEALS ============================================== -->
		@include('frontend.common.hot_deel')
<!-- ============================================== HOT DEALS: END ============================================== -->					

<!-- ============================================== NEWSLETTER ============================================== -->
<div class="sidebar-widget newsletter wow fadeInUp outer-bottom-small outer-top-vs">
	<h3 class="section-title">Newsletters</h3>
	<div class="sidebar-widget-body outer-top-xs">
		<p>Sign Up for Our Newsletter!</p>
        <form>
        	 <div class="form-group">
			    <label class="sr-only" for="exampleInputEmail1">Email address</label>
			    <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Subscribe to our newsletter">
			  </div>
			<button class="btn btn-primary">Subscribe</button>
		</form>
	</div><!-- /.sidebar-widget-body -->
</div><!-- /.sidebar-widget -->
<!-- ============================================== NEWSLETTER: END ============================================== -->

<!-- ============================================== Testimonials============================================== -->

<!-- ============================================== Testimonials: END ============================================== -->

 

				</div>
			</div><!-- /.sidebar -->
			<div class='col-md-9'>
            <div class="detail-block">
				<div class="row  wow fadeInUp">
                
					     <div class="col-xs-12 col-sm-6 col-md-5 gallery-holder">
    <div class="product-item-holder size-big single-product-gallery small-gallery">

        <div id="owl-single-product">
            @foreach ($Images as $image)
                
            
            <div class="single-product-gallery-item" id="slide{{$image->id}}">
                <a data-lightbox="image-1" data-title="Gallery" href="{{ asset('upload/multi_image/'.$image->image_name) }}">
                    <img class="img-responsive" alt="" src="{{ asset('upload/multi_image/'.$image->image_name) }}" data-echo="{{ asset('upload/multi_image/'.$image->image_name) }}" />
                </a>
            </div><!-- /.single-product-gallery-item -->
            @endforeach




        </div><!-- /.single-product-slider -->


        <div class="single-product-gallery-thumbs gallery-thumbs">

            <div id="owl-single-product-thumbnails">

                @foreach ($Images as $image)
                <div class="item">
                    <a class="horizontal-thumb active" data-target="#owl-single-product" data-slide="1" href="#slide{{$image->id}}">
                        <img class="img-responsive" width="85" alt="" src="{{ asset('upload/multi_image/'.$image->image_name) }}" data-echo="{{ asset('upload/multi_image/'.$image->image_name) }}" />
                    </a>
                </div>
                @endforeach

                
                
             
            </div><!-- /#owl-single-product-thumbnails -->

            

        </div><!-- /.gallery-thumbs -->

    </div><!-- /.single-product-gallery -->
</div><!-- /.gallery-holder -->        			
					<div class='col-sm-6 col-md-7 product-info-block'>
						<div class="product-info">
							<h1 class="name">{{ $product->product_name_en }}</h1>
							
							<div class="rating-reviews m-t-20">
								{{-- <div class="row">
									<div class="col-sm-3">
									@php
										$rev = DB::table('reviews')->where('product_id', $product->id)->Where('status', 1)->avg('star');
									@endphp
								
										@for ($i = 1; $i <= 5; $i++)
										@if ($rev >= $i)
										<span class="fa fa-star checked"></span>
										@else
										<span class="fa fa-star"></span>
										@endif
										@endfor
												
									</div>
									<div class="col-sm-8">
										<div class="reviews">
											<a href="#" class="lnk">({{ count($review) }} Reviews)</a>
										</div>
									</div>
								</div><!-- /.row -->		 --}}
							</div><!-- /.rating-reviews -->

							<div class="stock-container info-container m-t-10">
								<div class="row">
									<div class="col-sm-2">
										<div class="stock-box">
											<span class="label">Availability :</span>
										</div>	
									</div>
									<div class="col-sm-9">
										<div class="stock-box">
											<span class="value">In Stock</span>
										</div>	
									</div>
								</div><!-- /.row -->	
							</div><!-- /.stock-container -->

							<div class="description-container m-t-20">
								{{ $product->short_des_en }}
							</div><!-- /.description-container -->

							<div class="price-container info-container m-t-20">
								<div class="row">
									

									<div class="col-sm-6">
										<div class="price-box">
											@if ($product->discount_price !== null)
                                            <span class="price">${{$product->discount_price}}</span>
											<span class="price-strike">${{$product->selling_price}}</span>

                                            @else
                                                
                                            <span class="price">${{$product->selling_price}}</span>
                                            @endif
										</div>
									</div>

									<div class="col-sm-6">
										<div class="favorite-button m-t-10">
											<a class="btn btn-primary" data-toggle="tooltip" data-placement="right" title="Wishlist" href="#">
											    <i class="fa fa-heart"></i>
											</a>
											<a class="btn btn-primary" data-toggle="tooltip" data-placement="right" title="Add to Compare" href="#">
											   <i class="fa fa-signal"></i>
											</a>
											<a class="btn btn-primary" data-toggle="tooltip" data-placement="right" title="E-mail" href="#">
											    <i class="fa fa-envelope"></i>
											</a>
										</div>
									</div>

								</div><!-- /.row -->
								
								<div class="row">
									@if (!empty($color)) 
									<div class="col-sm-6">

										<div class="form-group">
											<label class="info-title control-label">Choose Color <span>*</span></label>
											<select id="color_val" class="form-control unicase-form-control selectpicker" style="display: none;">
												<option value="" selected disabled>--Select Color--</option>
												
												@foreach ($color as $value)
												<option value="{{$value}}">{{$value}}</option>
												@endforeach
												
							
											</select>
										</div>

									</div>
									@endif
									@if (!empty($color)) 
									<div class="col-sm-6">
										<div class="form-group">
											<label class="info-title control-label">Choose size <span>*</span></label>
											<select id='size_val' class="form-control unicase-form-control selectpicker" style="display: none;">
												<option value="" selected disabled>--Select size--</option>
												@foreach ($size as $value)
												<option value="{{$value}}">{{$value}}</option>
												@endforeach
											</select>
										</div>
									</div>
									@endif
								</div>


							</div><!-- /.price-container -->

							<div class="quantity-container info-container">
								<div class="row">
									
									<div class="col-sm-2">
										<span class="label">Qty :</span>
									</div>
									
									<div class="col-sm-2">
										<div class="cart-quantity">
											<div class="quant-input">
								                <div class="arrows">
								                  <div class="arrow plus gradient"><span class="ir"><i class="icon fa fa-sort-asc"></i></span></div>
								                  <div class="arrow minus gradient"><span class="ir"><i class="icon fa fa-sort-desc"></i></span></div>
								                </div>
								                <input type="text" value="1" class="amount">
							              </div>
							            </div>
									</div>
									<input type="hidden"  id='pro_id' value="{{$product->id}}">
									<div class="col-sm-7">
										<button type="submit" onclick="addTocart()" class="btn btn-primary"><i class="fa fa-shopping-cart inner-right-vs"></i> ADD TO CART</button>
									</div>

									
								</div><!-- /.row -->
							</div><!-- /.quantity-container -->

							

							

							
						</div><!-- /.product-info -->
					</div><!-- /.col-sm-7 -->
				</div><!-- /.row -->
                </div>
				
				<div class="product-tabs inner-bottom-xs  wow fadeInUp">
					<div class="row">
						<div class="col-sm-3">
							<ul id="product-tabs" class="nav nav-tabs nav-tab-cell">
								<li class="active"><a data-toggle="tab" href="#description">DESCRIPTION</a></li>
								<li><a data-toggle="tab" href="#review">REVIEW</a></li>
								<li><a data-toggle="tab" href="#tags">TAGS</a></li>
							</ul><!-- /.nav-tabs #product-tabs -->
						</div>
						<div class="col-sm-9">

							<div class="tab-content">
								
								<div id="description" class="tab-pane in active">
									<div class="product-tab">
										<p class="text">{!! $product->long_des_en !!}</p>
									</div>	
								</div><!-- /.tab-pane -->

								<div id="review" class="tab-pane">
									<div class="product-tab">
																				
										 <div class="product-reviews">
											<h4 class="title">Customer Reviews</h4>
											@php
												$reviews = DB::table('reviews')->where('status', 1)->where('product_id',$product->id)->get();
												
											@endphp
											@foreach ($reviews as $review)
											@php
												$user = DB::table('users')->where('id',$review->user_id)->first();
											@endphp
											<div class="reviews">
												
												<div class="review">
													
													<div class="img">

														<img src="{{ (!empty($user ->profile_photo_path)) ? 
															asset('upload/user_images/'.$user ->profile_photo_path) : 
															   asset('upload/user_images/no-image.png')
															   }}" style="width:60px;border-radius:50%; margin-bottom:5px"
														
															   >
															   
													</div>
													<div class="name" style="font-weight: bold">{{ $user->name }}</div>

													{{-- get star   --}}
													 @for ($i = 1; $i <= 5; $i++)
													@if ($review->star >= $i)
													<span class="fa fa-star checked"></span>
													@else
													<span class="fa fa-star"></span>
													@endif
													@endfor
											
													

													
													
													<div class="review-title"><span class="date"><i class="fa fa-calendar"></i><span>{{ Carbon\Carbon::parse($review->created_at)->diffForHumans() }}</span></span></div>
													<div class="text">{{ $review->comment }}</div>
																										</div>
											
											</div><!-- /.reviews -->
											@endforeach
										</div><!-- /.product-reviews -->  
										

										
										<div class="product-add-review">
											<h4 class="title">Write your own review</h4>
											@auth
											<form action="{{ route('review.store',$product) }}" method="POST" class="cnt-form">
											<div class="review-table">
												<div class="table-responsive">
													<table class="table">	
														<thead>
															<tr>
																<th class="cell-label">&nbsp;</th>
																<th>1 star</th>
																<th>2 stars</th>
																<th>3 stars</th>
																<th>4 stars</th>
																<th>5 stars</th>
															</tr>
														</thead>	
														<tbody>
															<tr>
																<td class="cell-label">Quality</td>
																<td><input type="radio" name="quality" class="radio" value="1"></td>
																<td><input type="radio" name="quality" class="radio" value="2"></td>
																<td><input type="radio" name="quality" class="radio" value="3"></td>
																<td><input type="radio" name="quality" class="radio" value="4"></td>
																<td><input type="radio" name="quality" class="radio" value="5"></td>
															</tr>
														
														</tbody>
													</table><!-- /.table .table-bordered -->
												</div><!-- /.table-responsive -->
											</div><!-- /.review-table -->
											
			
			<div class="review-form">
				<div class="form-container">
					
							@csrf

						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<label for="exampleInputReview">Review <span class="astk">*</span></label>
									<textarea name="comment" class="form-control txt txt-review" id="exampleInputReview" rows="4" placeholder=""></textarea>
								</div><!-- /.form-group -->
								@error('comment')
									<span class="text-danger">{{ $message }}</span>
								@enderror
							</div>


						</div><!-- /.row -->
						
						<div class="action text-right">
							<button type="submit" class="btn btn-primary btn-upper">SUBMIT REVIEW</button>
						</div><!-- /.action -->

					</form><!-- /.cnt-form -->
				</div><!-- /.form-container -->
			</div><!-- /.review-form -->
			@else
			<h5>You must login in first <a href="{{route('login')}}">Login</a></h5>
			@endauth

										</div><!-- /.product-add-review -->										
										
							        </div><!-- /.product-tab -->
								</div><!-- /.tab-pane -->

								<div id="tags" class="tab-pane">
									<div class="product-tag">
										
										<h4 class="title">Product Tags</h4>
										<form role="form" class="form-inline form-cnt">
											<div class="form-container">
									
												<div class="form-group">
													<label for="exampleInputTag">Add Your Tags: </label>
													<input type="email" id="exampleInputTag" class="form-control txt">
													

												</div>

												<button class="btn btn-upper btn-primary" type="submit">ADD TAGS</button>
											</div><!-- /.form-container -->
										</form><!-- /.form-cnt -->

										<form role="form" class="form-inline form-cnt">
											<div class="form-group">
												<label>&nbsp;</label>
												<span class="text col-md-offset-3">Use spaces to separate tags. Use single quotes (') for phrases.</span>
											</div>
										</form><!-- /.form-cnt -->

									</div><!-- /.product-tab -->
								</div><!-- /.tab-pane -->

							</div><!-- /.tab-content -->
						</div><!-- /.col -->
					</div><!-- /.row -->
				</div><!-- /.product-tabs -->
			
				<!-- ============================================== UPSELL PRODUCTS ============================================== -->
				<section class="section featured-product wow fadeInUp">
					<h3 class="section-title">upsell products</h3>
					<div class="owl-carousel home-owl-carousel custom-carousel owl-theme outer-top-xs">
		
					  @foreach ($relatedProduct as $item)
						  
					 
					  <div class="item item-carousel">
						<div class="products">
						  <div class="product">
							<div class="product-image">
							  <div class="image"> <a href="{{route('product.detail',['id'=>$item->id,'slug'=>$item->product_slug_en])}}"><img  src="{{ asset('upload/product/'.$item->product_thambnail) }}" alt=""></a> </div>
		
							  <!-- /.image -->
							  
							  <div class="tag sale"><span>sale</span></div>
							</div>
							<!-- /.product-image -->
							
							<div class="product-info text-left">
							  <h3 class="name"><a href="{{route('product.detail',['id'=>$item->id,'slug'=>$item->product_slug_en])}}">{{ $item->product_name_en }}</a></h3>
							  <div class="rating rateit-small"></div>
							  <div class="description"></div>
		
							  @if ($item->selling_price !== null) 
							  <div class="product-price"> <span class="price"> ${{ $item->selling_price }} </span> <span class="price-before-discount">$ 800</span> </div>
							 
							  @endif
							 
							  <!-- /.product-price --> 
							  
							</div>
							<!-- /.product-info -->
							<div class="cart clearfix animate-effect">
							  <div class="action">
								<ul class="list-unstyled">
								  <li class="add-cart-button btn-group">
									<button class="btn btn-primary icon" data-toggle="dropdown" type="button"> <i class="fa fa-shopping-cart"></i> </button>
									<button class="btn btn-primary cart-btn" type="button">Add to cart</button>
								  </li>
								  <li class="lnk wishlist"> <a class="add-to-cart" href="detail.html" title="Wishlist"> <i class="icon fa fa-heart"></i> </a> </li>
								  <li class="lnk"> <a class="add-to-cart" href="detail.html" title="Compare"> <i class="fa fa-signal" aria-hidden="true"></i> </a> </li>
								</ul>
							  </div>
							  <!-- /.action --> 
							</div>
							<!-- /.cart --> 
						  </div>
						  <!-- /.product --> 
						  
						</div>
						<!-- /.products --> 
					  </div>
					  @endforeach
					  <!-- /.item -->
					  
					  
					
					</div>
					<!-- /.home-owl-carousel --> 
				  </section>
<!-- ============================================== UPSELL PRODUCTS : END ============================================== -->
			
			</div><!-- /.col -->
			<div class="clearfix"></div>
		</div><!-- /.row -->

























		<!-- ==== ================== BRANDS CAROUSEL ============================================== -->
<div id="brands-carousel" class="logo-slider wow fadeInUp">

		<div class="logo-slider-inner">	
			<div id="brand-slider" class="owl-carousel brand-slider custom-carousel owl-theme">
				<div class="item m-t-15">
					<a href="#" class="image">
						<img data-echo="assets/images/brands/brand1.png" src="assets/images/blank.gif" alt="">
					</a>	
				</div><!--/.item-->

				<div class="item m-t-10">
					<a href="#" class="image">
						<img data-echo="assets/images/brands/brand2.png" src="assets/images/blank.gif" alt="">
					</a>	
				</div><!--/.item-->

				<div class="item">
					<a href="#" class="image">
						<img data-echo="assets/images/brands/brand3.png" src="assets/images/blank.gif" alt="">
					</a>	
				</div><!--/.item-->

				<div class="item">
					<a href="#" class="image">
						<img data-echo="assets/images/brands/brand4.png" src="assets/images/blank.gif" alt="">
					</a>	
				</div><!--/.item-->

				<div class="item">
					<a href="#" class="image">
						<img data-echo="assets/images/brands/brand5.png" src="assets/images/blank.gif" alt="">
					</a>	
				</div><!--/.item-->

				<div class="item">
					<a href="#" class="image">
						<img data-echo="assets/images/brands/brand6.png" src="assets/images/blank.gif" alt="">
					</a>	
				</div><!--/.item-->

				<div class="item">
					<a href="#" class="image">
						<img data-echo="assets/images/brands/brand2.png" src="assets/images/blank.gif" alt="">
					</a>	
				</div><!--/.item-->

				<div class="item">
					<a href="#" class="image">
						<img data-echo="assets/images/brands/brand4.png" src="assets/images/blank.gif" alt="">
					</a>	
				</div><!--/.item-->

				<div class="item">
					<a href="#" class="image">
						<img data-echo="assets/images/brands/brand1.png" src="assets/images/blank.gif" alt="">
					</a>	
				</div><!--/.item-->

				<div class="item">
					<a href="#" class="image">
						<img data-echo="assets/images/brands/brand5.png" src="assets/images/blank.gif" alt="">
					</a>	
				</div><!--/.item-->
		    </div><!-- /.owl-carousel #logo-slider -->
		</div><!-- /.logo-slider-inner -->
	
</div><!-- /.logo-slider -->
<!-- == = BRANDS CAROUSEL : END = -->	</div><!-- /.container -->
</div><!-- /.body-content -->

@endsection