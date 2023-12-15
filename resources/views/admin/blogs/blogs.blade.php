


@extends('layouts.admin')

@section('content')
<div class="pd-20 card-box mb-30">
					<div class="clearfix mb-20">
						<div class="pull-left">
							<h4 class="text-blue h4">Posts</h4>

						</div>

					</div>
                    <div class="col d-flex justify-content-end align-items-end ">
                       <span class="col text-success success"></span>
                       <span class="col text-danger error"></span>
                    </div>
                    <div class="col d-flex justify-content-end align-items-end ">
                        <button type="button" class="btn btn-primary mb-4" data-toggle="modal" data-target="#exampleModal">
                            Ajouter
                        </button>
                    </div>
                    @include('admin.blogs.form')

					<table class="table">
						<thead>
							<tr>
								<th scope="col">#</th>
								<th scope="col">Nom</th>
								<th scope="col">Categorie</th>
                                <th scope="col">Contenu</th>
                                <th scope="col">Mot clé</th>
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
								<td>{{$blog->categories}}</td>
                                <td>{{$blog->content}}</td>
                                <td>{{$blog->keyword}}</td>
                                <td>{{$blog->description}}</td>
								<td><img src="{{asset('storage/image/'.$blog->picture)}}" alt=""></td>
                                <td>
                                <div class="row ">
                            <button onclick="openModalForEdit({{ $blog->id }})" class="btn btn-warning mr-2"><i class="fa fa-edit"></i></button>
                            <form action="{{route('blogs.destroy',['blog'=>$blog->id])}}" method="post">
                              @method('delete')
                              @csrf
                              <button type="submit"  class="btn btn-danger"><i class="fa fa-trash" ></i></button>
                            </form>


                                </div>


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
