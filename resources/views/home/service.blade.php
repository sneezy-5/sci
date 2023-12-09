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