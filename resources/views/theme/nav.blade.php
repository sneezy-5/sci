

@if(Session::has('success'))
								<div class="alert alert-success">
									{{ Session::get('success') }}
								</div>
								@endif
      <!-- loader -->
      <div class="bg_load"> <img class="loader_animation" src="{{asset('images/loaders/loader_1.png')}}" alt="#" /> </div>
      <!-- end loader -->
      <!-- header -->
      <header id="default_header" class="header_style_1">
         <!-- header top -->
         <div class="header_top">
            <div class="container">
               <div class="row">
                  <div class="col-md-9 col-lg-9">
                     <div class="full">
                        <div class="topbar-left">
                           <ul class="list-inline">
                              <li> <span class="topbar-label"><i class="fa  fa-home"></i></span> <span class="topbar-hightlight">540 Lorem Ipsum New York, AB 90218</span> </li>
                              <li> <span class="topbar-label"><i class="fa fa-envelope-o"></i></span> <span class="topbar-hightlight"><a href="https://html.design/cdn-cgi/l/email-protection#21484f474e61584e5453454e4c40484f0f424e4c"><span class="__cf_email__" data-cfemail="660f080009261f09131402090b070f084805090b">[email&#160;protected]</span></a></span> </li>
                           </ul>
                        </div>
                     </div>
                  </div>
                  <div class="col-md-3 col-lg-3 right_section_header_top">
                     <div class="float-right">
                        <div class="social_icon">
                           <ul class="list-inline">
                              <li><a class="fa fa-facebook" href="https://www.facebook.com/" title="Facebook" target="_blank"></a></li>
                              <li><a class="fa fa-google-plus" href="https://plus.google.com/" title="Google+" target="_blank"></a></li>
                              <li><a class="fa fa-twitter" href="https://twitter.com/" title="Twitter" target="_blank"></a></li>
                              <li><a class="fa fa-linkedin" href="https://www.linkedin.com/" title="LinkedIn" target="_blank"></a></li>
                              <li><a class="fa fa-instagram" href="https://www.instagram.com/" title="Instagram" target="_blank"></a></li>
                           </ul>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <!-- end header top -->
         <!-- header bottom -->
         <div class="header_bottom">
            <div class="container">
               <div class="row">
                  <div class="col-lg-3 col-md-12 col-sm-12 col-xs-12">
                     <!-- logo start -->
                     <div class="logo"><a href="/"><img src="{{asset('images/logos/logo.png')}}" alt="logo" /></a></div>
                     <!-- logo end -->
                  </div>
                  <div class="col-lg-9 col-md-12 col-sm-12 col-xs-12">
                     <!-- menu start -->
                     <div class="menu_side">
                        <div id="navbar_menu">
                           <ul class="first-ul">
                              <li>
                                 <a class="{{ request()->is('/') ? 'active' : '' }}" href="{{route('homePage')}}">Accueil</a>
                              </li>
                              <li><a class="{{ Route::currentRouteName() == 'about' ? 'active' : '' }}" href="{{route('about')}}">A propos</a></li>
                              <li><a class="{{ Route::currentRouteName() == 'services' ? 'active' : '' }}" href="{{route('services')}}">Services</a></li>
                              <li><a class="{{ Route::currentRouteName() == 'blog' ? 'active' : '' }}" href="{{route('blog')}}">Blog</a></li>
                              <li class="has-sub"><span class="submenu-button"></span>
                                 <a class="{{ Route::currentRouteName() == 'home.products' ? 'active' : '' }}" href="{{route('home.products')}}">Shop</a>
                                 <ul>
                                    <li><a href="{{route('home.products')}}">Shop List</a></li>
                                    <li><a href="{{route('cart')}}">Shopping Cart</a></li>
                                 </ul>
                              </li>
                              <li><a class="{{ Route::currentRouteName() == 'contact' ? 'active' : '' }}" href="{{route('contact')}}">Contact</a></li>
                           </ul>
                        </div>
                        <div class="search_icon">
                           <ul>
                              <li><a href="#" data-toggle="modal" data-target="#search_bar"><i class="fa fa-search" aria-hidden="true"></i></a></li>
                           </ul>
                        </div>
                     </div>
                     <!-- menu end -->
                  </div>
               </div>
            </div>
         </div>
         <!-- header bottom end -->
      </header>
      <!-- end header -->
