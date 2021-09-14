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
                    <h2><strong>  Ajouter </strong> Reseau </h2>
                </div>
                <div class="body">
                    <form  action="{{route('reseau.store')}}" method="post">
                        @csrf
                        <div class="mb-3">
                            <p>Reseau </p>
                            <select class="form-control show-tick ms select2" id="Reseau"  data-placeholder="Select" name="reseausoc_id"   data-placeholder="Select">
                                @foreach ($langs as $tech)
                                <option value="{{$tech->id}}">{{$tech->nomReseau}}</option>

                                @endforeach
                              
                            </select>
                            @error('langue')
                                <strong>{{ $message }}</strong>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Nom d'utilisateur , ID , Email , Numero  </label>
                            <input type="text" class="form-control" name="username" required>
                            @error('username')
                                <strong>{{ $message }}</strong>
                            @enderror

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
<script src="{{ asset('assets/vendor/select2/select2.min.js')}}"></script>
<script src="{{ asset('assets/js/pages/advanced-form.js')}}"></script>
<script src="{{ asset('assets/js/theme.js')}}"></script>
@endsection