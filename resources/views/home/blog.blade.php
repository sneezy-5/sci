@extends('theme.theme')
@section('body')
<body id="default_theme" class="blog">

      <!-- inner page banner -->
      <div id="inner_banner" class="section inner_banner_section">
         <div class="container">
            <div class="row">
               <div class="col-md-12">
                  <div class="full">
                     <div class="title-holder">
                        <div class="title-holder-cell text-left">
                           <h1 class="page-title">Blog</h1>
                           <ol class="breadcrumb">
                              <li><a href="/">Home</a></li>
                              <li class="active">Blog</li>
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
      <div class="section padding_layout_1 blog_list">
         <div class="container">
            <div class="row">
               <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 pull-left">
                  <div class="side_bar">
                     <div class="side_bar_blog">
                        <h4>SEARCH</h4>
                        <div class="side_bar_search">
                           <div class="input-group stylish-input-group">
                              <input class="form-control" placeholder="Search" type="text">
                              <span class="input-group-addon">
                              <button type="submit"><i class="fa fa-search" aria-hidden="true"></i></button>
                              </span> 
                           </div>
                        </div>
                     </div>
                     <!-- <div class="side_bar_blog">
                        <h4>ABOUT AUTHOR</h4>
                        <p>Consectetur, assumenda provident lorem ipsum dolor sit amet, consectetur adipisicing elit. Quae laboriosam sunt hic perspiciatis<br><br> 
                           asperiores mollitia excepturi voluptatibus sequi nostrum ipsam veniam omnis nihil! A ea maiores corporis. Lorem ipsum dolor sit amet
                           consectetur adipisicing elit
                        </p>
                     </div> -->
                     <div class="side_bar_blog">
                        <h4>RECENT POST</h4>
                        <div class="recent_post">
                           <ul>
                              <li>
                                 <p class="post_head"><a href="#">Blog image post</a></p>
                                 <p class="post_date"><i class="fa fa-calendar" aria-hidden="true"></i> June 7, 2018</p>
                              </li>
                              <li>
                                 <p class="post_head"><a href="#">How To Look Up</a></p>
                                 <p class="post_date"><i class="fa fa-calendar" aria-hidden="true"></i> June 7, 2018</p>
                              </li>
                              <li>
                                 <p class="post_head"><a href="#">Treat That Oral Thrush Now</a></p>
                                 <p class="post_date"><i class="fa fa-calendar" aria-hidden="true"></i> June 7, 2018</p>
                              </li>
                           </ul>
                        </div>
                     </div>
                     <div class="side_bar_blog">
                        <h4>CATEGORIES</h4>
                        <div class="categary">
                           <ul>
                              <li><a href="#"><i class="fa fa-caret-right"></i> Creative (8)</a></li>
                              <li><a href="#"><i class="fa fa-caret-right"></i> Fashion (5)</a></li>
                              <li><a href="#"><i class="fa fa-caret-right"></i> Image (4)</a></li>
                              <li><a href="#"><i class="fa fa-caret-right"></i> Travel (8)</a></li>
                              <li><a href="#"><i class="fa fa-caret-right"></i> Videos (1) </a></li>
                           </ul>
                        </div>
                     </div>
                    
                    
                  </div>
               </div>
               <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12 pull-right">
                  <div class="full">
                  
                     @foreach ($blogs as $blog )
                         
                  
                     <div class="blog_section">
                        <div class="blog_feature_img"> <img class="img-responsive" src="{{asset('storage/image/'.$blog->picture)}}" alt="#"> </div>
                        <div class="blog_feature_cantant">
                           <p class="blog_head">{{$blog->title}}</p>
                           <div class="post_info">
                              <ul>
                                 <li><i class="fa fa-user" aria-hidden="true"></i> Marketing</li>
                                 <li><i class="fa fa-comment" aria-hidden="true"></i> 5</li>
                                 <li><i class="fa fa-calendar" aria-hidden="true"></i> 12 Aug 2017</li>
                              </ul>
                           </div>
                           <p>
                           {{$blog->description}}
                           </p>
                           <div class="bottom_info">
                              <div class="pull-left"><a class="btn sqaure_bt" href="{{route('blog_detail',['id'=>$blog->id])}}">Read More<i class="fa fa-angle-right"></i></a></div>
                              <div class="pull-right">
                                 <div class="shr">Share: </div>
                                 <div class="social_icon">
                                    <ul>
                                       <li class="fb"><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                                       <li class="twi"><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                                       <li class="gp"><a href="#"><i class="fa fa-google-plus" aria-hidden="true"></i></a></li>
                                       <li class="pint"><a href="#"><i class="fa fa-pinterest" aria-hidden="true"></i></a></li>
                                    </ul>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                        @endforeach
                    <!-- Ajouter la pagination -->
                    <div class="d-flex justify-content-center">
                        {!! $blogs->links() !!}
                    </div>
                     
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
