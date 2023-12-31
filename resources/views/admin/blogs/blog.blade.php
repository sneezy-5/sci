@extends('layouts.admin')

@section('content')

<div class="pd-20 card-box mb-30">
@if ($errors->any())
			<div class="alert alert-danger">
				<ul class="list-unstyled">
					@foreach ($errors->all() as $error)
					<li>{{ $error }}</li>
					@endforeach
				</ul>
			</div>
			@endif
					<form method="POST" action="{{route('blogs.store')}}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group {{ $errors->has('category_id') ? 'has-error' : ''}}">
                            <label for="category_id" class="control-label">{{ 'Category' }}</label>
                            <select name="category_id" id="category_id" class="form-control">
                                @foreach($categories as $category)
                                    <option value="{{$category->id}}"
                                            @if(!empty($post) && $category->id == $post->category_id) selected @endif>
                                        {{$category->name}}
                                    </option>
                                @endforeach
                            </select>
                            {{--            <input class="form-control" name="category_id" type="number" id="category_id" value="{{ isset($post->category_id) ? $post->category_id : ''}}" >--}}
                            {!! $errors->first('category_id', '<p class="help-block">:message</p>') !!}
                        </div>
						<div class="form-group row">
							<label class="col-sm-12 col-md-2 col-form-label">Titre</label>
							<div class="col-sm-12 col-md-10">
								<input class="form-control" type="text" placeholder="nom du product" name="title">
							</div>
						</div>

						<div class="form-group">
                            <label>Description </label>
                            <textarea class="form-control" name="description"></textarea>
                        </div>
						<div class="form-group row">
							<label class="col-sm-12 col-md-2 col-form-label">Image</label>
							<div class="col-sm-12 col-md-10">
								<input class="form-control"type="file" name="picture" >
							</div>
						</div>
                        <button type="submit" class="btn btn-primary me-2">Envoyer</button>
                    <button class="btn btn-light"><a href="{{route('blogs.index')}}">Annuler</a></button>
					</form>

				</div>


@endsection




