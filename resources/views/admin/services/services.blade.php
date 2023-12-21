


@extends('layouts.admin')

@section('content')

<div class="card-box mb-30">
					<div class="clearfix mb-20">
						<div class="pull-left">
							<h4 class="text-blue h4">Services</h4>

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
                    @include('admin.services.form')
					<table class="data-table table stripe hover nowrap">
						<thead>
							<tr>
								<th >#</th>
								<th class="table-plus datatable-nosort">Nom de services</th>
								<th >Description</th>
								<th >Image</th>
								<th class="datatable-nosort">Action</th>
							</tr>
						</thead>
						<tbody>
                            @foreach($services as $service)
							<tr>
								<th scope="row">{{$service->id}}</th>
								<td class="table-plus">{{$service->name}}</td>
								<td>{{$service->description}}</td>
								<td><img src="{{asset('storage/image/'.$service->image)}}" alt="" width="100" height="100"></td>
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
                                                    onclick="openModalForEdit({{ $service->id }})"
														><i class="dw dw-edit2"></i> Edit</a
													>

                                                    <form action="{{route('services.destroy',['service'=>$service->id])}}" method="post">
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
        {!! $services->links() !!}
    </div>
@endsection
