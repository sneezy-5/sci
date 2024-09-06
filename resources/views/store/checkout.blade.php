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
                           <h1 class="page-title">Commande</h1>
                           <ol class="breadcrumb">
                              <li><a href="index-2.html">Accueil</a></li>
                              <li class="active">Commande</li>
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
                                    <label>Nom et prenom <span class="red">*</span></label>
                                    <input name="fname" type="text" >
                                    @error('fname')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                 </div>
                              </div>


                              <div class="col-md-12">
                                 <div class="form-field">
                                    <label>Adresse <span class="red">*</span></label>
                                    <textarea name="add"></textarea>
                                    @error('add')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                 </div>
                              </div>
                              <div class="col-md-12">
                                 <div class="form-field">
                                    <label>Ville/Commune <span class="red">*</span></label>
                                    <input name="city" type="text">
                                    @error('city')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                 </div>
                              </div>


                              <div class="col-md-6">
                                 <div class="form-field">
                                    <label>Telephone <span class="red">*</span></label>
                                    <input name="phone" type="text">
                                    @error('phone')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                 </div>
                              </div>
                              <div class="col-md-6">
                                 <div class="form-field">
                                    <label>Email <span class="red">*</span></label>
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
                                 <h5>Total du panier</h5>
                              </td>
                              <td class="text-right"></td>
                           </tr>
                           <tr>
                              <td>
                                 <h4>Sous total</h4>
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
                                 <h4><?=Cart::subtotal();?></h4>
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
      @include('components.serach')
      <!-- End Model search bar -->
      @endsection
