



@extends('layouts.admin')

@section('content')
<div class="pd-20 card-box mb-30">
					<div class="clearfix mb-20">
						<div class="pull-left">
							<h4 class="text-blue h4">Newsletter</h4>
						
						</div>
					
					</div>
					<table class="table">
						<thead>
							<tr>
								<th scope="col">#</th>
								<th scope="col">Email</th>
								<th scope="col">Action</th>
							</tr>
						</thead>
						<tbody>
                            @foreach($neslettersSuscribers as $newsletter)
							<tr>
								<th scope="row">{{$newsletter->id}}</th>
								<td>{{$newsletter->adresse_mail}}</td>
								<td><img src="{{asset('storage/image/'.$newsletter->image)}}" alt=""></td>
                                <td>
                            <p>
                    
                       
                            
                            </p>
                
                      
                          </td>
							</tr>
                            @endforeach
						
						</tbody>
					</table>
				</div>
                 <!-- Ajouter la pagination -->
    <div class="d-flex justify-content-center">
        {!! $neslettersSuscribers->links() !!}
    </div>
@endsection