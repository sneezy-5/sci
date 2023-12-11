@extends('theme.theme')
@section('body')
@if (Session::has('success'))
    <div class="alert alert-success">
        {{ Session::get('success') }}
    </div>
@endif
<body id="default_theme" class="home_1">

    <!-- inner page banner -->
    <div id="inner_banner" class="section inner_banner_section">
         <div class="container">
            <div class="row">
               <div class="col-md-12">
                  <div class="full">
                     <div class="title-holder">
                        <div class="title-holder-cell text-left">
                           <h1 class="page-title">Contact</h1>
                           <ol class="breadcrumb">
                              <li><a href="/">Home</a></li>
                              <li class="active">Contact</li>
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
            <div class="row">
               <div class="col-md-12">
                  <div class="full">
                     <div class="main_heading text_align_center">
                        <h2><span>Contact</span></h2>
                     </div>
                  </div>
               </div>
               <div class="col-xl-2 col-lg-2 col-md-12 col-sm-12 col-xs-12"></div>
               <div class="col-xl-8 col-lg-8 col-md-12 col-sm-12 col-xs-12">
                  <div class="row">
                     <div class="full">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 contant_form">
                           <div class="form_section">
                              <form class="form_contant" method="POST" action="{{route('sendMessage')}}">
                                @csrf
                                 <fieldset>
                                    <div class="row">
                                       <div class="field col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                          <input class="field_custom" placeholder="Your Name" type="text" name="nom_complet" required />
                                            @error('nom_complet')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                       </div>
                                       <div class="field col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                          <input class="field_custom" placeholder="Email adress" type="email"  name="address_mail" required />
                                          @error('address_mail')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                       </div>
                                       <div class="field col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                          <input class="field_custom" placeholder="Subject" type="text"  name="sujet" required />
                                          @error('sujet')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                       </div>
                                       <div class="field col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                          <input class="field_custom" placeholder="Phone number" type="text"  name="phone" required />
                                          @error('phone')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                       </div>
                                       <div class="field col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                          <textarea class="field_custom" placeholder="Messager"  name="message"></textarea>
                                          @error('message')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                       </div>
                                       <div class="center"><input type="submit" value="SUBMIT NOW" class="btn main_bt" href="#"></div>
                                    </div>
                                 </fieldset>
                              </form>
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
      <!-- map -->
      <div class="map_section">
         <div id="map"></div>
      </div>
      <!-- end map -->
@endsection
