


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
                                <td>{!! $blog->content !!}</td>
								<td><img src="{{asset('storage/image/'.$blog->picture)}}" alt=""  width="100" height="100"></td>
                                <td>

                                <div class="row ">
                                <div class="dropdown">
												<a
													class="btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle"
													href="#"
													role="button"
													data-toggle="dropdown"
												>
													<i class="dw dw-more"></i>
												</a>
												<div
													class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list"
												>

													<a class="dropdown-item" href="#"
                                                    onclick="openModalForEdit({{ $blog->id }})"
														><i class="dw dw-edit2"></i> Edit</a
													>

                                                    <form action="{{route('blogs.destroy',['blog'=>$blog->id])}}" method="post">
                              @method('delete')
                              @csrf
                              <button class="dropdown-item btn btn-danger" type="submit">
                                <i class="dw dw-delete-3"></i> Delete</button>
                            </form>
												</div>
											</div>


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
