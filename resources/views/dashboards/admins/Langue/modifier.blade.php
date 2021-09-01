@extends('layouts.admin')

@section('content')   

<div class="container-fluid">            

    <div class="row clearfix">
        <div class="col-lg-12">
            <div class="card">
                <div class="header">
                    <h2><strong>  Modifier </strong> Langues </h2>
                </div>
                <div class="body">
                    <form action="{{url('admin/langue/'.$lang->id)}}"  method="POST">
                        @csrf
                        @method('put')
                        <div class="form-group">
                            <label>Nom Langue</label>
                            <input type="text" class="form-control" value="{{$lang->nomLangue}}" name="nomLangue" required>
                            @error('nomLangue')
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
