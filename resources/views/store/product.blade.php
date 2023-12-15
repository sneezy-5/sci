@extends('theme.theme')
@section('body')

  <!-- inner page banner -->
  <div id="inner_banner" class="section inner_banner_section">
         <div class="container">
            <div class="row">
               <div class="col-md-12">
                  <div class="full">
                     <div class="title-holder">
                        <div class="title-holder-cell text-left">
                           <h1 class="page-title">Shop Page</h1>
                           <ol class="breadcrumb">
                              <li><a href="/">Home</a></li>
                              <li class="active">Shop</li>
                           </ol>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <!-- end inner page banner -->
      <!-- section -->
      <div class="section padding_layout_1 product_list_main">
         <div class="container">
            <div class="row">
               <div class="col-md-12">
                  <div class="row">
                    @foreach ($products as $product )
                        
                    
                     <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12 margin_bottom_30_all">
                        <div class="product_list">
                           <div class="product_img"> <img class="img-responsive" src="{{asset('storage/image/'.$product->picture)}}" alt=""> </div>
                           <div class="product_detail_btm">
                              <div class="center">
                                 <h4><a href="{{route('product.detail',['slug'=>$product->slug])}}">{{$product->title}}</a></h4>
                              </div>
                              <div class="starratin">
                                 <div class="center"> <i class="fa fa-star" aria-hidden="true"></i> <i class="fa fa-star" aria-hidden="true"></i> <i class="fa fa-star" aria-hidden="true"></i> <i class="fa fa-star" aria-hidden="true"></i> <i class="fa fa-star-o" aria-hidden="true"></i> </div>
                              </div>
                              <div class="product_price">
                                 <p><span class="old_price">{{$product->price}}</span> <span class="new_price">{{$product->price}}</span></p>
                              </div>
                           </div>
                        </div>
                     </div>
                     @endforeach
                  </div>
               </div>
            </div>
         </div>
                                <!-- Ajouter la pagination -->
    <div class="d-flex justify-content-center">
        {!! $products->links() !!}
    </div>
      </div>

      <!-- end section -->
      <!-- Modal -->
      @include('components.serach')
      <!-- End Model search bar -->
@endsection
