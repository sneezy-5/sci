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
                           <h1 class="page-title">Services</h1>
                           <ol class="breadcrumb">
                              <li><a href="/">Home</a></li>
                              <li class="active">Services</li>
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
        @include('components.service-list')
      <!-- end section -->
      <!-- section -->
      <div class="section padding_layout_1 light_silver">
         <div class="container">
            <div class="row">
               <div class="col-md-12">
                  <div class="full">
                     <div class="main_heading text_align_center">
                        <h2>Services Steps</h2>
                        <p class="large">Easy and effective way to get your furniture repaired.</p>
                     </div>
                  </div>
               </div>
            </div>
            <div class="row">
               <div class="col-md-12">
                  <div class="row">
                     <div class="col-md-4">
                        <div class="full">
                           <div class="Services_blog_inner">
                              <div class="icon text_align_center"><img src="images/layout_img/si1.png" alt="#"></div>
                              <h4 class="Services-heading">Fast Services</h4>
                              <p>Exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo.</p>
                           </div>
                        </div>
                     </div>
                     <div class="col-md-4">
                        <div class="full">
                           <div class="Services_blog_inner">
                              <div class="icon text_align_center"><img src="images/layout_img/si2.png" alt="#"></div>
                              <h4 class="Services-heading">Secure payments</h4>
                              <p>Exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo.</p>
                           </div>
                        </div>
                     </div>
                     <div class="col-md-4">
                        <div class="full">
                           <div class="Services_blog_inner">
                              <div class="icon text_align_center"><img src="images/layout_img/si3.png" alt="#"></div>
                              <h4 class="Services-heading">Expert team</h4>
                              <p>Exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo.</p>
                           </div>
                        </div>
                     </div>
                     <div class="col-md-4">
                        <div class="full">
                           <div class="Services_blog_inner">
                              <div class="icon text_align_center"><img src="images/layout_img/si4.png" alt="#"></div>
                              <h4 class="Services-heading">Affordable Services</h4>
                              <p>Exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo.</p>
                           </div>
                        </div>
                     </div>
                     <div class="col-md-4">
                        <div class="full">
                           <div class="Services_blog_inner">
                              <div class="icon text_align_center"><img src="images/layout_img/si5.png" alt="#"></div>
                              <h4 class="Services-heading">90 Days warranty</h4>
                              <p>Exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo.</p>
                           </div>
                        </div>
                     </div>
                     <div class="col-md-4">
                        <div class="full">
                           <div class="Services_blog_inner">
                              <div class="icon text_align_center"><img src="images/layout_img/si6.png" alt="#"></div>
                              <h4 class="Services-heading">Award winning</h4>
                              <p>Exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo.</p>
                           </div>
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
