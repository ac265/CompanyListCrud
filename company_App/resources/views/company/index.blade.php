@extends('home')

@section('main')

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-social/5.1.1/bootstrap-social.min.css" rel="stylesheet" crossorigin="anonymous">

    <div class="row">
        <div class="col-sm-12">
            @if(session()->get('success'))
                <div class="alert alert-success">
                    {{ session()->get('success') }}
                </div>
            @endif
        </div>
        <div>
            <a style="margin: 19px;" href="{{ route('company.create')}}" class="btn btn-primary">Create new company</a>


        </div>
            <h1 class="display-3">Companies</h1>
            <table class="table table-striped">
                <thead>
                <tr>
                    <td><b>Company Name</b></td>
                    <td><b>Internet Address</b></td>
                    <td colspan = 2><b>Actions</b></td>
                </tr>
                </thead>
                <tbody>
                @foreach($company as $company)
                    <tr>
                        <td><a style="text-decoration: none; color: #333;
" href="/profile2" > {{$company->company_name}}</a></td>
                        <td>{{$company->internet_address}}</td>

                        <td>
                            <a href="{{ route('company.edit',$company->id)}}" > <button class="btn btn-primary" type="submit">Edit</button></a>
                        </td>

                        <td>
                            <form action="{{ route('company.destroy', $company->id)}}" method="post">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger" type="submit">Delete</button>
                            </form>
                        </td>
                        <td>
                            <a href="/profile/{{$company->id}}" > <button class="btn btn-primary btn-info" type="submit">Show</button></a>
                        </td>

                        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
                        <script src="${contextPath}/resources/js/bootstrap.min.js"></script>

                    </tr>
                @endforeach
                </tbody>
            </table>
            </div>



@endsection
