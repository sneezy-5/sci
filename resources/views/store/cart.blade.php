@extends('theme.theme')
@section('body')
<body id="default_theme" class="shopping-cart">

   <!-- inner page banner -->
   <div id="inner_banner" class="section inner_banner_section">
   @if(Session::has('error'))
				<div class="alert alert-success">
					{{ Session::get('error') }}
				</div>
				@endif
         <div class="container">
            <div class="row">
               <div class="col-md-12">
                  <div class="full">
                     <div class="title-holder">
                        <div class="title-holder-cell text-left">
                           <h1 class="page-title">Panier</h1>
                           <ol class="breadcrumb">
                              <li><a href="/">Accueil</a></li>
                              <li class="active">Panier</li>
                           </ol>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <!-- end inner page banner -->
      <div class="section padding_layout_1 Shopping_cart_section">
         <div class="container">
            <div class="row">
               <div class="col-sm-12 col-md-12">
                  <div class="product-table">
                     <table class="table">
                        <thead>
                           <tr>
                              <th>Produit</th>
                              <th>Quantite</th>
                              <th class="text-center">Prix</th>
                              <th class="text-center">Total</th>
                              <th> </th>
                           </tr>
                        </thead>
                        <tbody>
                        @foreach($carts as $row)
                           <tr>
                              <td class="col-sm-8 col-md-6">
                                 <div class="media">
                                    <a class="thumbnail pull-left" href="#"> <img class="media-object" src="{{asset('storage/image/'.$row->model->picture)}}" alt="#"></a>
                                    <div class="media-body">
                                       <h4 class="media-heading"><a href="#">{{$row->name}}</a></h4>
                                       <span>Status: </span><span class="text-success">En Stock</span>
                                    </div>
                                 </div>
                              </td>
                              <td class="col-sm-1 col-md-1" style="text-align: center"><input class="form-control q_{{$row->rowId}}" value="{{$row->qty}}" type="email" onclick="changeQuantity('{{$row->rowId}}')">
                              </td>
                              <td class="col-sm-1 col-md-1 text-center">
                                 <p class="price_table">{{$row->price}}</p>
                              </td>
                              <td class="col-sm-1 col-md-1 text-center">
                                 <p class="price_table  p_{{$row->rowId}}">{{$row->price}}</p>
                              </td>
                              <td class="col-sm-1 col-md-1"><a href="{{route('destroy.cart',['id'=>$row->rowId])}}" class="bt_main"><i class="fa fa-trash"></i> Supprimer</a></td>
                           </tr>


							@endforeach
                        </tbody>
                     </table>

                  </div>
                  <div class="shopping-cart-cart">
                     <table>
                        <tbody>
                           <tr class="head-table">
                              <td>
                                 <h5>Totals</h5>
                              </td>
                              <td class="text-right"></td>
                           </tr>
                           <tr>
                              <td>
                                 <h4>Sous total</h4>
                              </td>
                              <td class="text-right">
                                 <h4 class="total_r"><?=Cart::subtotal();?> frcfa</h4>
                              </td>
                           </tr>
                           <!-- <tr>
                              <td>
                                 <h5>Estimated shipping</h5>
                              </td>
                              <td class="text-right">
                                 <h4>$50.00</h4>
                              </td>
                           </tr> -->
                           <tr>
                              <td>
                                 <h3>Total</h3>
                              </td>
                              <td class="text-right">
                                 <h4 class="totals"><?=Cart::total();?></h4>
                              </td>
                           </tr>
                           <tr>
                              <td><button type="button" class="button"><a href="{{route('home.products')}}" style="color: white;">Continuer les achats</a></button></td>
                              <td><button class="button"><a href="{{route('checkout.cart')}}" style="color: white;">Commander</a></button></td>
                           </tr>
                        </tbody>
                     </table>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <!-- end section -->
      <!-- Modal -->
      @include('components.serach')
      <!-- End Model search bar -->
      <script>



    function changeQuantity(id){
                var q = ".q_"+id;
                var quantity =document.querySelector(q).value;
                payload = {
                    "row_id":id,
                    "product-quantity": quantity,
                }
                $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': '<?php echo csrf_token(); ?>'
        }
    });

                $.ajax({
                    type: 'POST',
                    dataType: "json",
                    url: "{{ route('update.cart') }}", // production
                    data: payload,
                    timeout: 5000,
                    success: function(data) {
                        console.log("SUCCESS", data.response,data.q, data.subtotal);
                        if(data.error){
                            document.querySelector('.gratuit').innerHTML="vous ne pouvez commander  plus de 100 produits";

                        }else{
                            var qr = ".p_"+data.response

                        document.querySelector(qr).textContent=data.q;
                        document.querySelector(q).textContent=data.qty;
                        document.querySelector('.total_r').innerHTML='<strong>'+data.subtotal+' Frcfa' +'</strong>';
                        document.querySelector('.totals').innerHTML='<strong>'+data.totals+' Frcfa' +'</strong>';


                    if(data.total>=100000){
                            var str = 'Livraison gratuite'
                            document.querySelector('.gratuit').innerHTML=str;
                        }else{
                            document.querySelector('.gratuit').innerHTML='1000';
                        }
                        }


                    },
                    error: function(data) {
                        console.error("ERROR...", data)

                    },
                });
                }



            </script>
@endsection
