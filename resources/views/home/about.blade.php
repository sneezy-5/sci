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
                           <h1 class="page-title">About Us</h1>
                           <ol class="breadcrumb">
                              <li><a href="/">Home</a></li>
                              <li class="active">About Us</li>
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
      <!-- section -->
      <div class="section padding_layout_1 light_silver gross_layout">
         <div class="container">
            <div class="row">
               <div class="col-md-12">
                  <div class="full">
                     <div class="main_heading text_align_left">
                        <h2>Who we are</h2>
                        <p class="large">Sed ut perspiciatis unde omnis iste natus error sit..</p>
                     </div>
                  </div>
               </div>
            </div>
            <div class="row">
               <div class="col-md-12 col-lg-8 text-align_left">
                  <div class="full large_cont_p">
                     <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore
                        veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit<br><br>sed
                        quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet consectetur,
                        adip isci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis
                        nostr um exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea
                        volupt ate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur?<br>beginning of sentences are capitalized
                     </p>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <!-- end section -->
      <!-- end section -->
      <!-- section -->
      @include('components.why-shoose')
      <!-- end section -->
      <!-- section -->
      <div class="section padding_layout_1 section_information">
         <div class="container">
            <div class="row">
               <div class="col-md-6">
                  <div class="full">
                     <h4>Let us make the differences<br>Interior Design</h4>
                  </div>
                  <div class="full">
                     <a class="read-btn" href="{{route('services')}}">Discover Now</a>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <!-- end section -->
      <!-- section -->
      @include('components.service-list')
      <!-- end section -->
      <!-- Modal -->
      @include('components.serach')
      <!-- End Model search bar -->
@endsection
