@extends('layouts.admin')

@section('content')   

<div class="container-fluid">            

    <div class="row clearfix">
        <div class="col-lg-12">
            <div class="card">
                <div class="header">
                    <h2><strong>  Ajouter </strong> Langue </h2>
                </div>
                <div class="body">
                    <form action="{{route('langue.store')}}" method="post">
                        @csrf
                        <div class="form-group">
                            <label>Nom Langue</label>
                            <input type="text" class="form-control" name="nomLangue" required>
                            @error('nomLangue')
                                <strong>{{ $message }}</strong>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-warning">Ajouter</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
