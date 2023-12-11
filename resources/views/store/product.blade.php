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
      <div class="modal fade" id="search_bar" role="dialog">
         <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
               <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal"><i class="fa fa-close"></i></button>
               </div>
               <div class="modal-body">
                  <div class="row">
                     <div class="col-lg-8 col-md-8 col-sm-8 offset-lg-2 offset-md-2 offset-sm-2 col-xs-10 col-xs-offset-1">
                        <div class="navbar-search">
                           <form action="#" method="get" id="search-global-form" class="search-global">
                              <input type="text" placeholder="Type to search" autocomplete="off" name="s" id="search" value="" class="search-global__input">
                              <button class="search-global__btn"><i class="fa fa-search"></i></button>
                              <div class="search-global__note">Begin typing your search above and press return to search.</div>
                           </form>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <!-- End Model search bar -->
@endsection
