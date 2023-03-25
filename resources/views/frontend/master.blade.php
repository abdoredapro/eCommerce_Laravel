<!DOCTYPE html>
<html lang="en">
<head>
<!-- Meta -->
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
<meta name="description" content="">
<meta name="csrf-token" content="{{ csrf_token() }}">
<meta name="author" content="">
<meta name="keywords" content="MediaCenter, Template, eCommerce">
<meta name="robots" content="all">
<script src="https://js.stripe.com/v3/"></script>
<title>@yield('title','Elnemr Shop')</title>

<!-- Bootstrap Core CSS -->
<link rel="stylesheet" href="{{asset('frontend/assets/css/bootstrap.min.css')}}">

<!-- Customizable CSS -->
<link rel="stylesheet" href="{{asset('frontend/assets/css/main.css')}}">
<link rel="stylesheet" href="{{asset('frontend/assets/css/blue.css')}}">
<link rel="stylesheet" href="{{asset('frontend/assets/css/owl.carousel.css')}}">
<link rel="stylesheet" href="{{asset('frontend/assets/css/owl.transitions.css')}}">
<link rel="stylesheet" href="{{asset('frontend/assets/css/animate.min.css')}}">
<link rel="stylesheet" href="{{asset('frontend/assets/css/rateit.css')}}">
<link rel="stylesheet" href="{{asset('frontend/assets/css/bootstrap-select.min.css')}}">

<!-- Icons/Glyphs -->
<link rel="stylesheet" href="{{asset('frontend/assets/css/font-awesome.css')}}">
<style>
    
    .parent-load {
    height: 100%;
    display: flex;
    justify-content: center;
    align-items: center;
    
    }
    .not-found {
        text-align: center
    }
    .not-found h2{
        font-size: 20px;
        margin: 0;
        padding: 12px 0;
    }
    .page {
  display: block;
  position: absolute;
  top: 0;
  left: 0;
  z-index: 999;
  width: 100%;
  height: 100%;

  background-color: #ffffff7a;
}
.lds-ring {
  display: inline-block;
  position: relative;
  width: 80px;
  height: 80px;
}
.lds-ring div {

    box-sizing: border-box;
    display: block;
    position: absolute;
    width: 64px;
    height: 64px;
    margin: 8px;
    border: 5px solid #fff;
    border-radius: 50%;
    animation: lds-ring 1.2s cubic-bezier(0.5, 0, 0.5, 1) infinite;
    border-color: #1086ff transparent transparent transparent;

}
.lds-ring div:nth-child(1) {
  animation-delay: -0.45s;
}
.lds-ring div:nth-child(2) {
  animation-delay: -0.3s;
}
.lds-ring div:nth-child(3) {
  animation-delay: -0.15s;
}
@keyframes lds-ring {
  0% {
    transform: rotate(0deg);
  }
  100% {
    transform: rotate(360deg);
  }
}
</style>
<!-- Fonts -->
<link href='http://fonts.googleapis.com/css?family=Roboto:300,400,500,700' rel='stylesheet' type='text/css'>
<link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,400italic,600,600italic,700,700italic,800' rel='stylesheet' type='text/css'>
<link href='https://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
</head>
<body class="cnt-home" style="overflow: hidden">
    
    <div class="page">
        <div class="parent-load">
            <div class="lds-ring"><div></div><div></div><div></div><div></div></div>
        </div>
      </div>
<!-- ============================================== HEADER ============================================== -->
@include('frontend.extends.header')

<!-- ============================================== HEADER : END ============================================== -->
@yield('content')
<!-- /#top-banner-and-menu --> 

<!-- ============================================================= FOOTER ============================================================= -->
@extends('frontend.extends.footer')
<!-- ============================================================= FOOTER : END============================================================= --> 

<!-- For demo purposes – can be removed on production --> 

<!-- For demo purposes – can be removed on production : End --> 

<!-- JavaScripts placed at the end of the document so the pages load faster --> 


<script src="{{ asset('frontend/assets/js/jquery-1.11.1.min.js') }}"></script> 
<script src="{{asset('frontend/assets/js/bootstrap.min.js')}}"></script> 
<script src="{{asset('frontend/assets/js/bootstrap-hover-dropdown.min.js')}}"></script> 
<script src="{{ asset('frontend/assets/js/owl.carousel.min.js') }}"></script> 
<script src="{{asset('frontend/assets/js/echo.min.js')}}"></script> 
<script src="{{ asset('frontend/assets/js/jquery.easing-1.3.min.js') }}"></script> 
<script src="{{asset('frontend/assets/js/bootstrap-slider.min.js')}}"></script> 
<script src="{{asset('frontend/assets/js/jquery.rateit.min.js')}}"></script> 
<script type="text/javascript" src="{{asset('frontend/assets/js/lightbox.min.js')}}"></script> 
<script src="{{ asset('frontend/assets/js/bootstrap-select.min.js') }}"></script> 
<script src="{{ asset('frontend/assets/js/wow.min.js') }}"></script> 
<script src="{{asset('frontend/assets/js/scripts.js')}}"></script>

<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>


{{-- start model add to cart  --}}
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel"><span class="title"></span></h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <div class="row">

                <div class="col-md-4">
                    <div class="form-group">
                        <div class="card">
                            <img src=""  style="max-width: 100%" class="img-fluid pro-img">
                            <div class="card-body">
                                
                            </div>
                        </div>
                    </div>
                </div>


                <div class="col-md-4">
                    <ul class="list-group">
                        <li class="list-group-item">Product Price:
                            <strong class=" price" ></strong> 
                        </li>
                        <li class="list-group-item">Product Code: 
                            <strong class=" code"></strong>
                        </li>
                        <li class="list-group-item">Category: 
                            <strong class=" category"></strong>
                        </li>
                        <li class="list-group-item">Brand: 
                            <strong class="brand"></strong>
                        </li>
                        <li class="list-group-item">stock: 
                            <span class="stock-statue"></span>
                        </li>
                    </ul>
                </div>
                <div class="col-md-4">
                    {{-- select color  --}}
                    <div class="form-group" id='colorarea'>
                        <label for="exampleFormControlSelect1">Select Color</label>
                        <select class="form-control" name='color' id="color_val">
                        </select>
                      </div>
                       {{-- select color  --}}

                       {{-- select size  --}}
                    <div class="form-group" id='sizearea'>
                        <label for="exampleFormControlSelect1">Select Size</label>
                        <select class="form-control" name='size' id='size_val'>

                        </select>
                      </div>
                       {{-- select size  --}}

                       <div class="form-group">
                           <label for="test">amount:</label>
                           <input type="number" value="1" min="1"  class="form-control amount">
                       </div>

                </div>
            </div>
        </div>
        <input type="hidden" name='pro_id' id='pro_id' value="">
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary mb-2" onclick="addTocart()">Add to cart</button>
        </div>
      </div>
    </div>
  </div>
{{-- end model add to cart  --}}
<script type="text/javascript">
let load = document.querySelector('.page');
let wrapper = document.querySelector('.wrapper');
let body = document.querySelector('body');



window.onload = function () {
    body.style.overflowX= 'hidden';
    body.style.overflowY= 'scroll';
    load.style.display= 'none';
    wrapper.style.display= 'block';
    
}


    function getProduct(id) {
        $.ajaxSetup({
        headers:{
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
        });
        $.ajax({
            method:'GET',
            dataType: 'json',
            url: '/get/product/'+id,
            success:  function (data) {
                $('.title').text(data.product.product_name_en);
                $('.price').text('$'+data.product.selling_price);
                $('.code').text(data.product.product_code);
                $('.category').text(data.product.category.category_name_en);
                $('.brand').text(data.product.brand.brand_name_en);
                $('#pro_id').val(data.product.id);

                $('.pro-img').attr('src','/upload/product/'+data.product.product_thambnail);


                // get product color 
                // if product has descount remove old price and put the price after discount
                if(data.product.discount_price !== null) {
                    $('.price').empty();
                    $('.price').text('$'+data.product.discount_price);
                } else {

                }
                //  end 

                $('select[name="color"]').empty();
                $.each(data.color,function (key,value) {
                    $('select[name="color"]').append(`
                    <option value='${value}'>${value}</option>
                    `)

                    if(data.color == '') {
                        $('#colorarea').hide();
                    } else {
                        $('#colorarea').show();
                    }

                });

                // get product size 

                $('select[name="size"]').empty();
                $.each(data.size,function (key,value) {
                    $('select[name="size"]').append(`
                    <option value='${value}'>${value}</option>
                    `)

                    if(data.size == '') {
                        $('#sizearea').hide();
                    } else {
                        $('#sizearea').show();
                    }

                    
                });
                $('.stock-statue').empty();
                // start stock 
                if(data.product.product_amount > 0) {

                    $('.stock-statue').empty();

                    $('.stock-statue').
                    append('<span class="label label-pill label-success">Available</span>')
                } else {
                    $('.stock-statue').empty();
                    $('.stock-statue').
                    append('<span class="label label-pill label-danger">Out off</span>')
                }
                // end stock 


            }

        })
    }

    // start add to cart 
 
    // end add to cart 




    function addTocart() {
        $.ajaxSetup({
        headers:{
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
        
        let id = $('#pro_id').val();
    
        let color = $('#color_val option:selected').val();
        let size = $('#size_val option:selected').val();
        let amount = $('.amount').val();
        
        console.log(id)
        console.log(color)
        console.log(size)
        console.log(amount)


        $.ajax({
            type:'POST',
            dataType: 'json',
            url: '/product/cart/'+id,
            data: {
                color:color,
                size:size,
                amount:amount,
            },
            success:function (data) {
                miniCart();
                $('.close').click();

                let sweet = Swal.fire({
                        toast:true,
                        position: 'top-end',
                        icon: 'success',
                        title: data.success,
                        showConfirmButton: false,
                        timer: 1500
                        });

            }
         
        })




    }



</script>
<script type="text/javascript">
    function miniCart() {
        $.ajax({   

            method:'GET',
            dataType:'json',
            url: '/mini/cart/get',
            success: function (response) {
                let mydiv = document.querySelector('.my-item');
                mydiv.innerHTML = '';
                $('.cartCount').text(response.count);

                $('span[id="total"]').text('$'+response.subtotal);


                $.each(response.content, function (key,value) {
                    // get count item  
                    

                    mydiv.innerHTML +=`
                    <div class="cart-item product-summary">
                    <div class="row">
                      <div class="col-xs-4">  
                        <div class="image"> <a href="detail.html"><img src="/upload/product/${value.options.img}" alt=""></a> </div>
                      </div>
                      <div class="col-xs-7">
                        
                        <h3 class="name"><a href="index.php?page-detail">${value.name}</a></h3>
                        <div class="price">$${value.price}</div>
                      </div>
                      <div class="col-xs-1 action"> <button type='submit' id='${value.rowId}' onclick='removeItem(this.id)'><i class="fa fa-trash"></i></button> </div>
                    </div>
                  </div>
                  <!-- /.cart-item -->
                  <div class="clearfix"></div>
                  <hr> 
                    
                    `;
                })
            }

        });
    }
    miniCart();

    function removeItem(id) {
        $.ajax({
            method:'GET',
            dataType:'json',
            url: '/remove/item/cart/'+id,
            success: function (response) {
                miniCart();
                let sweet = Swal.fire({
                        toast:true,
                        position: 'top-end',
                        icon: 'success',
                        title: response.message,
                        showConfirmButton: false,
                        timer: 1500
                });
            }
        })
    }


    // add to whish list 
    function addTOWhishlist(product_id) {
        $.ajaxSetup({
        headers:{
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
        $.ajax({
            method:'POST',
            dataType:'json',
            url: '/add-to-whishlist/'+product_id,
            success: function (data) {
                if(data.success) {
                    let sweet = Swal.fire({
                        toast:true,
                        position: 'top-end',
                        icon: 'success',
                        title: data.success,
                        showConfirmButton: false,
                        timer: 1500
                        });
                } else {
                    let sweet = Swal.fire({
                        toast:true,
                        position: 'top-end',
                        icon: 'error',
                        title: data.message,
                        showConfirmButton: false,
                        timer: 1500
                        });
                    
                }
            }
        })
    }


    // start get wishlist 
    function getWishlist() {
        $.ajaxSetup({
        headers:{
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
        });

        $.ajax({
            method:'GET',
            dataType:'json',
            url:'/user/get-wish-list',
            success:function (data) {

                if(data.length > 0) {
                    let myParent = document.querySelector('.t-body');
                    myParent.innerHTML = '';
                    $.each(data, function (key,value) {
                        
                        myParent.innerHTML += `<tr>
					<td class="col-md-2"><img src="/upload/product/${value.product.product_thambnail}" ></td>
					<td class="col-md-7">
						<div class="product-name"><a href="#">${value.product.product_name_en}</a></div>

						<div class="price">
							${
                                value.product.discount_price == null ?

                                `$${value.product.selling_price}` :
                                `$${value.product.discount_price} 
                                <span>$${value.product.selling_price}</span>`
                            }
					
						</div>
					</td>
					<td class="col-md-2">

						<button class="btn btn-primary " type="button"
                        id='${value.product.id}' data-toggle="modal" 
                        data-target="#exampleModal" onclick="getProduct(this.id)"
                        title="Add Cart"
                        >Add to cart</button>

					</td>
					<td class="col-md-1 close-btn">
						<button type='submit' id='${value.product.id}' 
                        onclick='removeItemWish(this.id)' class=""><i class="fa fa-times"></i></button>
					</td>
				</tr>`;
                    })
                }
            }
        })


    }
    getWishlist();

    function removeItemWish(product_id) {
        $.ajax({
            method:'GET',
            dataType: 'json',
            url: '/user/remove-wishlist/'+product_id,
            success:function (data) {
                getWishlist()
                if(data.message) {
                    
                    let sweet = Swal.fire({
                        toast:true,
                        position: 'top-end',
                        icon: 'success',
                        title: data.message,
                        showConfirmButton: false,
                        timer: 1500
                        });
                        getWishlist()
                } else {
                    let sweet = Swal.fire({
                        toast:true,
                        position: 'top-end',
                        icon: 'error',
                        title: data.error,
                        showConfirmButton: false,
                        timer: 1500
                        });
                }
            }
        })
    }   

    // =================================== Start Cart Page ==========================
        // get cart item function 
        function getCartPage() {
            $.ajaxSetup({
            headers:{
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
            });

        $.ajax({
            method:'GET',
            dataType:'json',
            url:'/get-cart-page',
            success:function (data) {

                if(data.content) {
                    let myParent = document.querySelector('.t-cart');
                    myParent.innerHTML = '';
                    $.each(data.content, function (key,value) {
                        
                        myParent.innerHTML += `<tr>
					<td class="col-md-2"><img src="/upload/product/${value.options.img}" 
                        style='width:70px;height:70px'
                        ></td>
					<td class="col-md-3">
						<div class="product-name"><a href="#">${value.name}</a></div>

						<div class="price">
							
                                <strong>$${value.price}</strong>
                        
						</div>
					</td>
					<td class="col-md-2">
                        ${value.options.size == null ? '...' : 
                        `<strong>${value.options.size}</strong>`
                        }
					</td>
                    <td class="col-md-2">
                        ${value.options.color == null ? '...' : 
                        `<strong>${value.options.color}</strong>`
                        }
					</td>
                    <td class="col-md-2">
                        <strong>$${value.subtotal}</strong>
					</td>
                    <td class="col-md-2">
                        <div class="controll" style='display: flex;'>
                        ${
                            value.qty == 1 ? 
                            `<button class="btn btn-danger btn-sm" id='${value.rowId}' disabled onclick='decrement(this.id)'  style='margin-right: 5px;'>-</button>` :
                            `<button class="btn btn-danger btn-sm" id='${value.rowId}' onclick='decrement(this.id)'    style='margin-right: 5px;'>-</button>`
                        }



    <input type="text" value="${value.qty}" min='0' max='100' style="width: 47px;text-align: center;margin-right: 5px;">
    ${
        value.qty > 25 ? 
        `<button class="btn btn-primary btn-sm" disabled id='${value.rowId}' onclick='increment(this.id)' 
    style='margin-right: 5px;'>+</button>` 
        :
        `<button class="btn btn-primary btn-sm" id='${value.rowId}' onclick='increment(this.id)' 
    style='margin-right: 5px;'>+</button>`
    }
    
</div>
					</td>
					<td class="col-md-1 close-btn">
						<button type='submit' id='${value.rowId}' 
                        onclick='removeFromCartPage(this.id)' class=""><i class="fa fa-times"></i></button>
					</td>
				</tr>`;
                    })
                }
            }
        })


        }
    getCartPage();

    // start remove Item From Cart Page 
    function removeFromCartPage(product_id) {
        $.ajax({
            method:'GET',
            dataType: 'json',
            url: '/remove-car-item/'+product_id,
            success:function (data) {
                getCartPage();
                miniCart()
                calcDiscount()
                if(data.message) {
                    
                    let sweet = Swal.fire({
                        toast:true,
                        position: 'top-end',
                        icon: 'success',
                        title: data.message,
                        showConfirmButton: false,
                        timer: 1500
                        });
                        
                } else {
                    let sweet = Swal.fire({
                        toast:true,
                        position: 'top-end',
                        icon: 'error',
                        title: data.error,
                        showConfirmButton: false,
                        timer: 1500
                        });
                }
            }
        })
    }   

    function decrement(rowId) {
        $.ajax({
            method:'GET',
            dataType:'json',
            url:'/cart-decrement/'+rowId,
            success:function (data) {
                getCartPage();
                miniCart();
                calcDiscount();

                
            }
        })
    }
    function increment(rowId) {
        $.ajax({
            method:'GET',
            dataType:'json',
            url:'/cart-increment/'+rowId,
            success:function (data) {
                getCartPage();
                miniCart();
                calcDiscount();

                
                console.log(data.test)
                
                
            }
        })
    }

    // apply coupon 
    function applyCoupon() {
        $.ajaxSetup({
            headers:{
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
            });
        let coupon_name = $('#coupon').val()
        $.ajax({
            type: 'POST',
        dataType: 'json',
            url:'{{ route("apply.coupon") }}',
            data: {
                coupon_name : coupon_name,
            },
            success:function (data) {
                calcDiscount()
                if(data.success) {

                    let sweet = Swal.fire({
                        toast:true,
                        position: 'top-end',
                        icon: 'success',
                        title: data.success,
                        showConfirmButton: false,
                        timer: 1500
                        });
                    console.log(data)
                } else {
                    let sweet = Swal.fire({
                        toast:true,
                        position: 'top-end',
                        icon: 'error',
                        title: data.error,
                        showConfirmButton: false,
                        timer: 1500
                        });
                }
            },

        });
    
    }

    function calcDiscount() {
        let toalArea = $('#total_area')
        $.ajax({
            method:'GET',
            dataType:'json',
            url:'{{ route("cal.coupon") }}',
            success:function (data) {
                if(data.subtotal) {
                    toalArea.html(`
                    <tr>
                        <th>
                            <div class="cart-sub-total">
                                Subtotal<span class="inner-left-md">$${ data.subtotal }</span>
                            </div>
                            <div class="cart-sub-total">
                                Coupon<span class="inner-left-md">${ data.coupon_name }</span>
                            </div>
                            <div class="cart-sub-total">
                                Discount<span class="inner-left-md">$${ data.discount_amount }</span>
                            </div>
                            <div class="cart-grand-total">
                                Grand Total<span class="inner-left-md">$${data.total_amount}</span>
                            </div>
                        </th>
                    </tr>
                    `);
                } else {
                    toalArea.html(`
                    <tr>
                        <th>
                            <div class="cart-sub-total">
                                Subtotal<span class="inner-left-md">$${ data.total }</span>
                            </div>
                            <div class="cart-grand-total">
                                Grand Total<span class="inner-left-md">$${data.total}</span>
                            </div>
                        </th>
                    </tr>
                    `);
                }
            }
        });
    }
    calcDiscount();
    // =================================== End Cart Page ============================

</script>
<link rel="stylesheet" type="text/css" 
        href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
     
       <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
<script>
    @if(Session::has('message'))
 var type = "{{ Session::get('alert-type','info') }}"
 switch(type){
    case 'info':
    toastr.info(" {{ Session::get('message') }} ");
    break;
    case 'success':
    toastr.success(" {{ Session::get('message') }} ");
    break;
    case 'warning':
    toastr.warning(" {{ Session::get('message') }} ");
    break;
    case 'error':
    toastr.error(" {{ Session::get('message') }} ");
    break; 
 }
 @endif 
  </script>


<script type='text/javascript'>
	$(document).ready(function() {
        
        $('select[name="division_id"]').on('change', function() {
            
            var division_id = $(this).val();
            if(division_id) {
                $.ajax({
                    url: "{{ url('/user/checkout/district/get') }}/" + division_id ,
                    type:'GET', 
                    dataType:'json',
                    success:function(data) {
                        // $('select[name="SubSubCategory_id"]').html('');
                        var SubElement = $('select[name="district_id"]').empty();
                        $.each(data, function(key,val) {
                            $('select[name="district_id"]').append(`<option 
                            value="${val.id}" >${val.district_name}</option>`);
                        }); 
                    },
                });
            } else {

            }
        });



        $('select[name="district_id"]').on('change', function() {
            
            var district = $(this).val();

            if(district) {
                $.ajax({
                    url: "{{ url('/user/state/get') }}/" + district ,
                    type:'GET', 
                    dataType:'json',
                    success:function(data) {
                        
                        var SubElement = $('select[name="state_id"]').empty();
                        $.each(data, function(key,val) {
                            $('select[name="state_id"]').append(`<option 
                            value="${val.id}" >${val.state_name}</option>`);
                        }); 

                    
                    },
                });
            } else {

            }
        });







    });
</script>
</body>
</html>