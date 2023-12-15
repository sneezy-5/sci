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
                                @foreach($blogs as $blog)
                                
                                <li>
                                    <p class="post_head"><a href="#">{{$blog->title}}</a></p>
                                    <p class="post_date"><i class="fa fa-calendar" aria-hidden="true"></i>  {{ $blog->created_at->format('M d, Y') }}</p>
                                </li>
                                @endforeach
                            
                           </ul>
                        </div>
                     </div>
                     <div class="side_bar_blog">
                        <h4>CATEGORIES</h4>
                        <div class="categary">
                           <ul>
                           @foreach($categories as $category)
                              <li><a href="#"><i class="fa fa-caret-right"></i>{{$category->name}}</a></li>
                            @endforeach
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
                                 <li><i class="fa fa-user" aria-hidden="true"></i> {{$blog->categories}}</li>
                                 <li><i class="fa fa-calendar" aria-hidden="true"></i>  {{ $blog->created_at->format('M d, Y') }}</li>
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


                  </div>
               </div>
            </div>
         </div>
          <!-- Ajouter la pagination -->
          <div class="d-flex justify-content-center">
                        {!! $blogs->links() !!}
                    </div>
      </div>
      <!-- end section -->
      @include('components.serach')
@endsection
