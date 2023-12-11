


@extends('layouts.admin')

@section('content')
<div class="pd-20 card-box mb-30">
					<div class="clearfix mb-20">
						<div class="pull-left">
							<h4 class="text-blue h4">Prduits</h4>
						
						</div>
					
					</div>
					<table class="table">
						<thead>
							<tr>
								<th scope="col">#</th>
								<th scope="col">Nom</th>
								<th scope="col">Description</th>
								<th scope="col">Image</th>
								<th scope="col">Action</th>
							</tr>
						</thead>
						<tbody>
                            @foreach($blogs as $blog)
							<tr>
								<th scope="row">{{$blog->id}}</th>
								<td>{{$blog->title}}</td>
								<td>{{$blog->description}}</td>
								<td><img src="{{asset('storage/image/'.$blog->picture)}}" alt=""></td>
                                <td>
                            <p>
                            <a href="{{route('blogs.edit',['blog'=>$blog->id])}}"  class="btn btn-waring"><i class="fa fa-edit"  ></i></a> 
                            <form action="{{route('blogs.destroy',['blog'=>$blog->id])}}" method="post">
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
        {!! $blogs->links() !!}
    </div>
@endsection