@extends('layouts.admin')

@section('content')
<div class="pd-20 card-box mb-30">
    <div class="clearfix mb-20">
        <div class="pull-left">
            <h4 class="text-blue h4">Messages</h4>
        </div>
    </div>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Nom complet</th>
                <th scope="col">Adresse mail</th>
                <th scope="col">Phone</th>
                <th scope="col">Sujet</th>
                <th scope="col">Message</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($contacts as $contact)
            <tr>
                <th scope="row">{{$contact->id}}</th>
                <td>{{$contact->nom_complet}}</td>
                <td>{{$contact->address_mail}}</td>
                <td>{{$contact->phone}}</td>
                <td>{{$contact->sujet}}</td>
                <td>{{$contact->message}}</td>
                <td>
                    <p>
                        <form action="{{route('services.destroy',['service'=>$contact->id])}}" method="post">
                            @method('delete')
                            @csrf
                            <button type="submit" class="btn btn-danger"><i class="fa fa-trash"></i></button>
                        </form>
                    </p>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <!-- Ajouter la pagination -->
    <div class="d-flex justify-content-center">
        {!! $contacts->links() !!}
    </div>
</div>
@endsection
