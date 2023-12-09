


@extends('layouts.admin')

@section('content')
<div class="pd-20 card-box mb-30">
					<div class="clearfix mb-20">
						<div class="pull-left">
							<h4 class="text-blue h4">Services</h4>
						
						</div>
					
					</div>
					<table class="table">
						<thead>
							<tr>
								<th scope="col">#</th>
								<th scope="col">Nom de services</th>
								<th scope="col">Description</th>
								<th scope="col">Image</th>
								<th scope="col">Action</th>
							</tr>
						</thead>
						<tbody>
                            @foreach($services as $service)
							<tr>
								<th scope="row">{{$service->id}}</th>
								<td>{{$service->name}}</td>
								<td>{{$service->description}}</td>
								<td><img src="{{asset('storage/image/'.$service->image)}}" alt=""></td>
                                <td>
                            <p>
                            <a href="{{route('services.edit',['service'=>$service->id])}}"  class="btn btn-waring"><i class="fa fa-edit"  ></i></a> 
                            <form action="{{route('services.destroy',['service'=>$service->id])}}" method="post">
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
        {!! $services->links() !!}
    </div>
@endsection