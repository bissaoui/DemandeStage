@extends('layouts.admin')

@section('content')   

<div class="container-fluid">            

    <div class="row clearfix">
        <div class="col-lg-12">
            <div class="card">
                <div class="header">
                    <h2><strong>  Modifier </strong> Ville </h2>
                </div>
                <div class="body">
                    <form action="{{url('admin/ville/'.$vil->id)}}"  method="POST">
                        @csrf
                        @method('put')
                        <div class="form-group">
                            <label>Nom Ville</label>
                            <input type="text" class="form-control" value="{{$vil->nomVille}}" name="nomVille" required>
                            @error('nomVille')
                                <strong>{{ $message }}</strong>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-warning">Modifier</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
