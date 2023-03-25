@php
    $categories = DB::table('categories')->orderBy('category_name_en')->get();
@endphp

<!-- ================================== TOP NAVIGATION ================================== -->
<div class="side-menu animate-dropdown outer-bottom-xs">
    <div class="head"><i class="icon fa fa-align-justify fa-fw"></i> Categories</div>
    <nav class="yamm megamenu-horizontal">
      <ul class="nav">
        
        {{-- start foreach for category  --}}
        
        @foreach ($categories as $category)
            
        

        <li class="dropdown menu-item"> <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon {{ $category->category_icon }}" aria-hidden="true"></i>{{ $category->category_name_en }}</a>
          <ul class="dropdown-menu mega-menu">
            <li class="yamm-content">
              <div class="row">
                @php

                $subCategory = DB::table('sub_categories')->where('category_id',$category->id)->orderBy('subCategory_name_en','ASC')->get();

                  @endphp
                @foreach ($subCategory as $sub)
                    
                
                <div class="col-sm-12 col-md-3">
                  <a href="{{ route('show.product.subCategory',['id'=>$sub->id, 'sub_slug'=>$sub->subCategory_slug_en]) }}"
                    style="padding:0">
                  <h2 class="title">{{$sub->subCategory_name_en}}</h2>
                  </a>

                  @php
                  $subsub = DB::table('sub_sub_categories')->where('SubCategory_id',$sub->id)->orderBy('SubSubCategory_name_en','ASC')->get();
                  @endphp

                  @foreach ($subsub as $item)
                  <ul class="links list-unstyled">
                    <li><a href="{{ route('show.product.subsub',['id'=>$item->id, 'sub_slug'=>$item->SubSubCategory_slug_en]) }}">{{ $item->SubSubCategory_name_en }}</a></li>
                  </ul>

                  @endforeach


                </div>

                @endforeach

                <!-- /.col -->
                
              </div>
              <!-- /.row --> 
            </li>
            <!-- /.yamm-content -->
          </ul>
          <!-- /.dropdown-menu --> </li>
        <!-- /.menu-item -->
        @endforeach
        {{-- end foreach for category  --}}
        
        
        
        
        
          <!-- /.dropdown-menu --> </li>
        <!-- /.menu-item -->
        
        
          <!-- ================================== MEGAMENU VERTICAL ================================== --> 
          <!-- /.dropdown-menu --> 
          <!-- ================================== MEGAMENU VERTICAL ================================== --> </li>
        <!-- /.menu-item -->
        
       
          <!-- /.dropdown-menu --> </li>
        <!-- /.menu-item -->
        
      </ul>
      <!-- /.nav --> 
    </nav>
    <!-- /.megamenu-horizontal --> 
  </div>
  <!-- /.side-menu --> 
  <!-- ================================== TOP NAVIGATION : END ================================== --> 