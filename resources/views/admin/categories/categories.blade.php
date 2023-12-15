


@extends('layouts.admin')

@section('content')
<div class="pd-20 card-box mb-30">
					<div class="clearfix mb-20">
						<div class="pull-left">
							<h4 class="text-blue h4">Categorie</h4>

						</div>

					</div>
                    <!-- Button trigger modal -->
                    <div class="col d-flex justify-content-end align-items-end ">
                       <span class="col text-success success"></span>
                       <span class="col text-danger error"></span>
                    </div>
                    <div class="col d-flex justify-content-end align-items-end ">
                        <button type="button" class="btn btn-primary mb-4" data-toggle="modal" data-target="#exampleModal">
                            Ajouter
                        </button>
                    </div>
                    @include('admin.categories.form')

                    <!-- <div class="col d-flex justify-content-end align-items-end ">
                        <a class="btn btn-primary mb-4" href="{{route('blogs.create')}}">Ajouter</a>
                    </div> -->

					<table class="table">
						<thead>
							<tr>
								<th scope="col">#</th>
								<th scope="col">Nom</th>
								<th scope="col">Action</th>
							</tr>
						</thead>
						<tbody>
                            @foreach($categories as $category)
							<tr>
								<th scope="row">{{$category->id}}</th>
								<td>{{$category->name}}</td>
                                <td>
                            <div class="row ">
                            <button onclick="openModalForEdit({{ $category->id }}, '{{ $category->name }}')" class="btn btn-warning mr-2"><i class="fa fa-edit"></i></button>
                            <form action="{{route('categories.destroy',['category'=>$category->id])}}" method="post">
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
        {!! $categories->links() !!}
    </div>



@endsection
