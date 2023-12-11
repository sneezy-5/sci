@extends('theme.theme')
@section('body')
<body id="default_theme" class="checkout_page">

      <!-- inner page banner -->
      <div id="inner_banner" class="section inner_banner_section">
         <div class="container">
            <div class="row">
               <div class="col-md-12">
                  <div class="full">
                     <div class="title-holder">
                        <div class="title-holder-cell text-left">
                           <h1 class="page-title">Checkout</h1>
                           <ol class="breadcrumb">
                              <li><a href="index-2.html">Home</a></li>
                              <li class="active">Checkout</li>
                           </ol>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <!-- end inner page banner -->
      <div class="section padding_layout_1 checkout_section">
         <div class="container">
            <div class="row">
               <div class="col-sm-12">
                  <div class="full">
                     <!-- <div class="tab-info login-section">
                        <p>Returning customer? <a href="#login" class="" data-toggle="collapse">Click here to login</a></p>
                     </div> -->
                     <!-- <div id="login" class="collapse">
                        <div class="login-form-checkout">
                           <p>If you have shopped with us before, please enter your details in the boxes below. If you are a new customer, please proceed to the Billing &amp; Shipping section.</p>
                           <form action="#">
                              <fieldset>
                                 <div class="row">
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                       <label for="username">Username or email <span class="required">*</span></label>
                                       <input class="input-text" name="username" id="username" required="" type="text">
                                    </div>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                       <label for="password">Password <span class="required">*</span></label>
                                       <input class="input-text" name="password" id="password" required="" type="password">
                                    </div>
                                    <div class="col-md-12 col-sm-12 col-xs-12 btn-login">
                                       <button class="bt_main">Login</button>
                                       <span class="remeber">
                                       <input type="checkbox">Remember me</span> 
                                    </div>
                                 </div>
                              </fieldset>
                           </form>
                        </div>
                     </div> -->
                     <!-- <div class="tab-info coupon-section">
                        <p>Have a coupon? <a href="#cupon" class="" data-toggle="collapse">Click here to enter your code</a></p>
                     </div> -->
                   
                  </div>
               </div>
            </div>
            <div class="row">
               <div class="col-md-8">
                  <div class="checkout-form">
                     <form action="{{route('checkout.store')}}" method="POST">
                        @csrf
                        <fieldset>
                           <div class="row">
                              <div class="col-md-6">
                                 <div class="form-field">
                                    <label>First name <span class="red">*</span></label>
                                    <input name="fname" type="text" >
                                    @error('fname')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                 </div>
                              </div>
                              
                             
                              <div class="col-md-12">
                                 <div class="form-field">
                                    <label>Address <span class="red">*</span></label>
                                    <textarea name="add"></textarea>
                                    @error('add')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                 </div>
                              </div>
                              <div class="col-md-12">
                                 <div class="form-field">
                                    <label>Town / City <span class="red">*</span></label>
                                    <input name="city" type="text">
                                    @error('city')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                 </div>
                              </div>
                              
                           
                              <div class="col-md-6">
                                 <div class="form-field">
                                    <label>Phone <span class="red">*</span></label>
                                    <input name="phone" type="text">
                                    @error('phone')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                 </div>
                              </div>
                              <div class="col-md-6">
                                 <div class="form-field">
                                    <label>Email address <span class="red">*</span></label>
                                    <input name="email" type="email">
                                    @error('email')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                 </div>
                              </div>
                           
                           </div>
                        </fieldset>
                        <div class="row">
                                    <div class="col-md-12 payment-bt">
                                       <div class="center">
                                          <button class="btn sqaure_bt">Commander</button>
                                       </div>
                                    </div>
                                 </div>
                     </form>
                  </div>
               </div>
               <div class="col-md-4">
                  <div class="shopping-cart-cart">
                     <table>
                        <tbody>
                           <tr class="head-table">
                              <td>
                                 <h5>Cart Totals</h5>
                              </td>
                              <td class="text-right"></td>
                           </tr>
                           <tr>
                              <td>
                                 <h4>Subtotal</h4>
                              </td>
                              <td class="text-right">
                                 <h4><?=Cart::subtotal();?></h4>
                              </td>
                           </tr>
                           
                           <tr>
                              <td>
                                 <h3>Total</h3>
                              </td>
                              <td class="text-right">
                                 <h4><?=Cart::total();?></h4>
                              </td>
                           </tr>
                        </tbody>
                     </table>
                  </div>
               </div>
             
            </div>
         </div>
      </div>
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
