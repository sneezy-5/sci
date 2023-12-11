@extends('layouts.admin')

@section('content')


<div class="pd-20 card-box mb-30">
					<div class="clearfix mb-20">
						<div class="pull-left">
							<h4 class="text-blue h4">Bookings</h4>
						
						</div>
					
					</div>
					<table class="table">
						<thead>
							<tr>
								<th scope="col">#</th>
                <th>Livrer</th>
                  <th>Nom</th>
                  <th>email</th>
                  <th>Adresse</th>
                  <th>Phone</th>
                  <th>Produits</th>
                  <th>Montant</th>
                  <th>Action</th>
							</tr>
						</thead>
						<tbody>

                    @foreach($bookings as $product)
							<tr>
								<th scope="row">{{$product->id}}</th>
                <td>@if($product->delivered==1)Oui @else Non @endif</td>
                      <td>{{$product->fullname}}</td>
                      <td>{{$product->email}}</td>
                      <td>{{$product->adresse}}</td>
                      <td>{{$product['phone']}} </td>
                      <td>
                      @if (is_array($data = unserialize($product->products)))
                              @foreach ($data as $item)
                                  {{ $item[0] }} 
                                
                                  <p> <strong>quantité</strong>{{ $item[2] }}  </p>

                              @endforeach
                          @endif  
                   
                      </td> 
                      <td>{{$product->amount}}</td>
                        <td>
                            <p>

                            <form action="{{route('bookings.destroy',['booking'=>$product->id])}}" method="post">
                              @method('delete')
                              @csrf
                              <button type="submit"  class="btn btn-danger"><i class="fa fa-trash" ></i></button>
                            </form>
                         
                            
                            </p>
                
                      
                          </td>
							</tr>
                            @endforeach
						</tbody>
					</table>
				</div>

                <!-- Ajouter la pagination -->
                <div class="d-flex justify-content-center">
        {!! $bookings->links() !!}
    </div>

@endsection