@extends('theme.theme')
@section('body')
<body id="default_theme" class="home_1">

     <!-- inner page banner -->
     <div id="inner_banner" class="section inner_banner_section">
         <div class="container">
            <div class="row">
               <div class="col-md-12">
                  <div class="full">
                     <div class="title-holder">
                        <div class="title-holder-cell text-left">
                           <h1 class="page-title">Services Detail</h1>
                           <ol class="breadcrumb">
                              <li><a href="/">Accueil</a></li>
                              <li class="active">Services Detail</li>
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
      <div class="section padding_layout_1">
         <div class="container">
            <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12 pull-left">
               <div class="row">
                  <div class="col-md-12 Services_blog margin_bottom_50" style="margin-top: 0;">
                     <div class="full">
                        <div class="Services_img"> <img class="img-responsive" src="{{asset('storage/image/'.$service->image)}}" alt="#"> </div>
                        <div class="Services_cont">
                           <h3 class="Services_head"><a href="#">{{$service->description}}</a></h3>
                           <p>
                            {{$service->description}}<br>

                           </p>
                        </div>
                     </div>
                  </div>
                  @foreach ($services as $service  )
                  <div class="col-md-6 Services_blog margin_bottom_50">
                     <div class="full">
                        <div class="Services_img"> <img class="img-responsive" src="{{asset('storage/image/'.$service->image)}}" alt="#"> </div>
                        <div class="Services_cont">
                           <h3 class="Services_head"><a href="{{route('service.detail',['id'=>$service->id])}}">{{$service->name}}</a></h3>
                           <p>{{$service->description}}</p>
                           <div class="bt_cont"> <a class="btn sqaure_bt" href="{{route('service.detail',['id'=>$service->id])}}">Voir </a> </div>
                        </div>
                     </div>
                  </div>
                  @endforeach
                                  <!-- Ajouter la pagination -->
    <div class="d-flex justify-content-center">
        {!! $services->links() !!}
    </div>
               </div>
            </div>
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




               </div>
            </div>
         </div>
      </div>
      <!-- end section -->
      <!-- Modal -->
      @include('components.serach')
      <!-- End Model search bar -->

    @endsection
