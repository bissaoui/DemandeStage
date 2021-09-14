@extends('layouts.stagiaire')
<link rel="stylesheet" href="{{asset('assets/vendor/select2/select2.css')}}" />

<style>
/*  
 *  Pure CSS star rating that works without reversing order
 *  of inputs
 *  -------------------------------------------------------
 *  NOTE: For the styling to work, there needs to be a radio
 *        input selected by default. There also needs to be a
 *        radio input before the first star, regardless of
 *        whether you offer a 'no rating' or 0 stars option
 *  
 *  This codepen uses FontAwesome icons
 */
 #full-stars-example {
  /* use display:inline-flex to prevent whitespace issues. alternatively, you can put all the children of .rating-group on a single line */
  /* make hover effect work properly in IE */
  /* hide radio inputs */
  /* set icon padding and size */
  /* set default star color */
  /* set color of none icon when unchecked */
  /* if none icon is checked, make it red */
  /* if any input is checked, make its following siblings grey */
  /* make all stars orange on rating group hover */
  /* make hovered input's following siblings grey on hover */
  /* make none icon grey on rating group hover */
  /* make none icon red on hover */
}
#full-stars-example .rating-group {
  display: inline-flex;
}
#full-stars-example .rating__icon {
  pointer-events: none;
}
#full-stars-example .rating__input {
  position: absolute !important;
  left: -9999px !important;
}
#full-stars-example .rating__label {
  cursor: pointer;
  padding: 0 0.1em;
  font-size: 2rem;
}
#full-stars-example .rating__icon--star {
  color: orange;
}
#full-stars-example .rating__icon--none {
  color: #eee;
}
#full-stars-example .rating__input--none:checked + .rating__label .rating__icon--none {
  color: red;
}
#full-stars-example .rating__input:checked ~ .rating__label .rating__icon--star {
  color: #ddd;
}
#full-stars-example .rating-group:hover .rating__label .rating__icon--star {
  color: orange;
}
#full-stars-example .rating__input:hover ~ .rating__label .rating__icon--star {
  color: #ddd;
}
#full-stars-example .rating-group:hover .rating__input--none:not(:hover) + .rating__label .rating__icon--none {
  color: #eee;
}
#full-stars-example .rating__input--none:hover + .rating__label .rating__icon--none {
  color: red;
}

#half-stars-example {
  /* use display:inline-flex to prevent whitespace issues. alternatively, you can put all the children of .rating-group on a single line */
  /* make hover effect work properly in IE */
  /* hide radio inputs */
  /* set icon padding and size */
  /* add padding and positioning to half star labels */
  /* set default star color */
  /* set color of none icon when unchecked */
  /* if none icon is checked, make it red */
  /* if any input is checked, make its following siblings grey */
  /* make all stars orange on rating group hover */
  /* make hovered input's following siblings grey on hover */
  /* make none icon grey on rating group hover */
  /* make none icon red on hover */
}
#half-stars-example .rating-group {
  display: inline-flex;
}
#half-stars-example .rating__icon {
  pointer-events: none;
}
#half-stars-example .rating__input {
  position: absolute !important;
  left: -9999px !important;
}
#half-stars-example .rating__label {
  cursor: pointer;
  /* if you change the left/right padding, update the margin-right property of .rating__label--half as well. */
  padding: 0 0.1em;
  font-size: 2rem;
}
#half-stars-example .rating__label--half {
  padding-right: 0;
  margin-right: -0.6em;
  z-index: 2;
}
#half-stars-example .rating__icon--star {
  color: orange;
}
#half-stars-example .rating__icon--none {
  color: #eee;
}
#half-stars-example .rating__input--none:checked + .rating__label .rating__icon--none {
  color: red;
}
#half-stars-example .rating__input:checked ~ .rating__label .rating__icon--star {
  color: #ddd;
}
#half-stars-example .rating-group:hover .rating__label .rating__icon--star,
#half-stars-example .rating-group:hover .rating__label--half .rating__icon--star {
  color: orange;
}
#half-stars-example .rating__input:hover ~ .rating__label .rating__icon--star,
#half-stars-example .rating__input:hover ~ .rating__label--half .rating__icon--star {
  color: #ddd;
}
#half-stars-example .rating-group:hover .rating__input--none:not(:hover) + .rating__label .rating__icon--none {
  color: #eee;
}
#half-stars-example .rating__input--none:hover + .rating__label .rating__icon--none {
  color: red;
}

#full-stars-example-two {
  /* use display:inline-flex to prevent whitespace issues. alternatively, you can put all the children of .rating-group on a single line */
  /* make hover effect work properly in IE */
  /* hide radio inputs */
  /* hide 'none' input from screenreaders */
  /* set icon padding and size */
  /* set default star color */
  /* if any input is checked, make its following siblings grey */
  /* make all stars orange on rating group hover */
  /* make hovered input's following siblings grey on hover */
}
#full-stars-example-two .rating-group {
  display: inline-flex;
}
#full-stars-example-two .rating__icon {
  pointer-events: none;
}
#full-stars-example-two .rating__input {
  position: absolute !important;
  left: -9999px !important;
}
#full-stars-example-two .rating__input--none {
  display: none;
}
#full-stars-example-two .rating__label {
  cursor: pointer;
  padding: 0 0.1em;
  font-size: 2rem;
}
#full-stars-example-two .rating__icon--star {
  color: orange;
}
#full-stars-example-two .rating__input:checked ~ .rating__label .rating__icon--star {
  color: #ddd;
}
#full-stars-example-two .rating-group:hover .rating__label .rating__icon--star {
  color: orange;
}
#full-stars-example-two .rating__input:hover ~ .rating__label .rating__icon--star {
  color: #ddd;
}

</style>
@section('content')   

<div class="container-fluid">            

    <div class="row clearfix">
        <div class="col-lg-12">
            <div class="card">
                <div class="header">
                    <h2><strong>  Ajouter </strong> Language </h2>
                </div>
                <div class="body">
                    <form  action="{{route('reseau.store')}}" method="post">
                        @csrf
                        <div class="mb-3">
                            <p>Langue </p>
                            <select class="form-control show-tick ms select2" data-placeholder="Select" name="langue"   data-placeholder="Select">
                                @foreach ($langs as $tech)
                                <option value="{{$tech->id}}">{{$tech->nomLangue}}</option>

                                @endforeach
                              
                            </select>
                            @error('langue')
                                <strong>{{ $message }}</strong>
                            @enderror
                        </div>
                        <p>Niveau </p>

                            <div id="full-stars-example">
                                <div class="rating-group">
                                    <div id="full-stars-example-two">
                                        <div class="rating-group">
                                            <input disabled checked class="rating__input rating__input--none" name="rating3" id="rating3-none" value="0" type="radio">
                                            <label aria-label="1 star" class="rating__label" for="rating3-1"><i class="rating__icon rating__icon--star fa fa-star"></i></label>
                                            <input class="rating__input" name="rating3" id="rating3-1" value="1" type="radio">
                                            <label aria-label="2 stars" class="rating__label" for="rating3-2"><i class="rating__icon rating__icon--star fa fa-star"></i></label>
                                            <input class="rating__input" name="rating3" id="rating3-2" value="2" type="radio">
                                            <label aria-label="3 stars" class="rating__label" for="rating3-3"><i class="rating__icon rating__icon--star fa fa-star"></i></label>
                                            <input class="rating__input" name="rating3" id="rating3-3" value="3" type="radio">
                                            <label aria-label="4 stars" class="rating__label" for="rating3-4"><i class="rating__icon rating__icon--star fa fa-star"></i></label>
                                            <input class="rating__input" name="rating3" id="rating3-4" value="4" type="radio">
                                            <label aria-label="5 stars" class="rating__label" for="rating3-5"><i class="rating__icon rating__icon--star fa fa-star"></i></label>
                                            <input class="rating__input" name="rating3" id="rating3-5" value="5" type="radio">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <button type="submit" class="btn btn-warning float-right">Ajouter</button>
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
<script src="{{ asset('assets/vendor/select2/select2.min.js')}}"></script>
<script src="{{ asset('assets/js/pages/advanced-form.js')}}"></script>
<script src="{{ asset('assets/js/theme.js')}}"></script>

@endsection