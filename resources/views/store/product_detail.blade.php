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
                           <h1 class="page-title">Shop Detail</h1>
                           <ol class="breadcrumb">
                              <li><a href="/">Home</a></li>
                              <li class="active">Shop Detail</li>
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
      <div class="section padding_layout_1 product_detail">
         <div class="container">
         @if(Session::has('success')) 
								<div class="alert alert-success">
									{{ Session::get('success') }}
								</div>
								@endif
            <div class="row">
               <div class="col-md-12">
                  <div class="row">
                     <div class="col-lg-6 col-md-12">
                        <div class="product_detail_feature_img hizoom hi2">
                           <div class="hizoom hi2"><img src="{{asset('storage/image/'.$product->picture)}}" alt="#" /></div>
                        </div>
                     </div>
                     <div class="col-lg-6 col-md-12 product_detail_side detail_style1">
                        <div class="product-heading">
                           <h2>{{$product->title}}</h2>
                        </div>
                        <div class="product-detail-side"> <span><del>{{$product->price}}</del></span><span class="new-price">{{$product->price}}</span> <span class="rating"> <i class="fa fa-star" aria-hidden="true"></i> <i class="fa fa-star" aria-hidden="true"></i> <i class="fa fa-star" aria-hidden="true"></i> <i class="fa fa-star" aria-hidden="true"></i> <i class="fa fa-star-o" aria-hidden="true"></i> </span> <span class="review">(5 customer review)</span> </div>
                        <div class="detail-contant">
                           <p>
                            {{$product->description}}
                              <span class="stock"> {{$product->stock}} in stock</span> 
                           </p>
                           <form class="cart" method="post" action="{{route('add.cart')}}">
                            @csrf
                            <input type="hidden" name="cmd" value="_cart" />
								<input type="hidden" name="product_id" value="{{$product->id}}" />
					
                              <div class="quantity">
                                 <input step="1" min="1" max="5" name="product-quatity" value="1" title="Qty" class="input-text qty text" size="4" type="number">
                              </div>
                              <button type="submit" class="btn sqaure_bt">Add to cart</button>
                           </form>
                        </div>
                        <div class="share-post">
                           <a href="#" class="share-text">Share</a>
                           <ul class="social_icons">
                              <li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                              <li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                              <li><a href="#"><i class="fa fa-google-plus" aria-hidden="true"></i></a></li>
                              <li><a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
                              <li><a href="#"><i class="fa fa-linkedin" aria-hidden="true"></i></a></li>
                           </ul>
                        </div>
                     </div>
                  </div>
                  <div class="row">
                     <div class="col-md-12">
                        <div class="full">
                           <div class="tab_bar_section">
                              <ul class="nav nav-tabs" role="tablist">
                                 <li class="nav-item"> <a class="nav-link active" data-toggle="tab" href="#description">Description</a> </li>
                                 <!-- <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#reviews">Reviews (2)</a> </li> -->
                              </ul>
                              <!-- Tab panes -->
                              <div class="tab-content">
                                 <div id="description" class="tab-pane active">
                                    <div class="product_desc">
                                       <p>
                                       {{$product->description}}
                                       </p>
                                    </div>
                                 </div>
                                 <div id="reviews" class="tab-pane fade">
                                    <div class="product_review">
                                       <h3>Reviews (2)</h3>
                                       <div class="commant-text row">
                                          <div class="col-lg-2 col-md-2 col-sm-4">
                                             <div class="profile"> <img class="img-responsive" src="images/layout_img/client1.png" alt="#"> </div>
                                          </div>
                                          <div class="col-lg-10 col-md-10 col-sm-8">
                                             <h5>Lara jack</h5>
                                             <p><span class="c_date">March 2, 2018</span> | <span><a rel="nofollow" class="comment-reply-link" href="#">Reply</a></span></p>
                                             <span class="rating"> <i class="fa fa-star" aria-hidden="true"></i> <i class="fa fa-star" aria-hidden="true"></i> <i class="fa fa-star" aria-hidden="true"></i> <i class="fa fa-star" aria-hidden="true"></i> <i class="fa fa-star-o" aria-hidden="true"></i> </span>
                                             <p class="msg">ThisThis book is a treatise on the theory of ethics, very popular during the Renaissance. 
                                                The first line of Lorem Ipsum, “Lorem ipsum dolor sit amet.. 
                                             </p>
                                          </div>
                                       </div>
                                       <div class="commant-text row">
                                          <div class="col-lg-2 col-md-2 col-sm-4">
                                             <div class="profile"> <img class="img-responsive" src="images/layout_img/client2.png" alt="#"> </div>
                                          </div>
                                          <div class="col-lg-10 col-md-10 col-sm-8">
                                             <h5>Liana hussy</h5>
                                             <p><span class="c_date">March 2, 2018</span> | <span><a rel="nofollow" class="comment-reply-link" href="#">Reply</a></span></p>
                                             <span class="rating"> <i class="fa fa-star" aria-hidden="true"></i> <i class="fa fa-star" aria-hidden="true"></i> <i class="fa fa-star" aria-hidden="true"></i> <i class="fa fa-star" aria-hidden="true"></i> <i class="fa fa-star-o" aria-hidden="true"></i> </span>
                                             <p class="msg">Nunc augue purus, posuere in accumsan sodales ac, euismod at est. Nunc faccumsan ermentum consectetur metus placerat mattis. Praesent mollis justo felis, accumsan faucibus mi maximus et. Nam hendrerit mauris id scelerisque placerat. Nam vitae imperdiet turpis</p>
                                          </div>
                                       </div>
                                       <div class="row">
                                          <div class="col-sm-12">
                                             <div class="full review_bt_section">
                                                <div class="float-right"> <a class="btn sqaure_bt" data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">Leave a Review</a> </div>
                                             </div>
                                             <div class="full">
                                                <div id="collapseExample" class="full collapse commant_box">
                                                   <form accept-charset="UTF-8" action="" method="post">
                                                      <input id="ratings-hidden" name="rating" type="hidden">
                                                      <textarea class="form-control animated" cols="50" id="new-review" name="comment" placeholder="Enter your review here..." required=""></textarea>
                                                      <div class="full_bt center">
                                                         <button class="btn sqaure_bt" type="submit">Save</button>
                                                      </div>
                                                   </form>
                                                </div>
                                             </div>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
                
                  <div class="row">
                  @foreach ($last_products as $product )
                     <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12 margin_bottom_30_all">
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
