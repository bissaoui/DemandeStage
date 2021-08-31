@extends('layouts.admin')

<style>
    #previewImg{
        width: 150px;
        height: 150px;
    }    
</style>
@section('content')   

<div class="container-fluid">            

    <div class="row clearfix">
        <div class="col-lg-12">
            <div class="card">
                <div class="header">
                    <h2><strong>  Modifier </strong> Technologie </h2>
                </div>
                <div class="body">
                    <form   enctype="multipart/form-data"  action="{{url('admin/technologie/'.$tech->id)}}"  method="post">
                        @csrf
                        @method('put')
                        <div class="form-group">
                            <label>Nom Technologie</label>
                            <input type="text" class="form-control" value="{{$tech->nomTechnologie}}" name="nomTechnologie" required>
                            @error('nomTechnologie')
                                <strong>{{ $message }}</strong>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Photo Technologie</label>
                            <div class="input-group mb-3">
                                <div class="custom-file">
                                    <input type="file" name="photoTechnologie"  m accept=".png, .jpg, .jpeg" class="custom-file-input" id="inputGroupFile02" onchange="previewFile(this);" >
                                    <label class="custom-file-label" for="inputGroupFile02">Choose file</label>
                                </div>
                            </div>
                            <div>@if (isset($tech->photoTechnologie)) 
                                <img  id="previewImg" width="75" src="{{asset('storage/Pictures/Technologie/' .$tech->photoTechnologie)}}" alt="Technologie">
                                @else
                                <img id="previewImg" width="75" src="{{asset('storage/Pictures/Technologie/technology.png')}}" alt="Technologie">
                                @endif
                            </div>

                        </div>
                        <button type="submit" class="btn btn-warning">Modifier</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@section('footer-scripts')
    <script>
    function previewFile(input){
        var file = $("input[type=file]").get(0).files[0];
 
        if(file){
            var reader = new FileReader();
 
            reader.onload = function(){
                $("#previewImg").attr("src", reader.result);
            }
 
            reader.readAsDataURL(file);
        }
    }
</script>
@endsection