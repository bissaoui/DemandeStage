@extends('layouts.admin')

<link rel="stylesheet" href="{{asset('assets/vendor/select2/select2.css')}}" />

@section('content')
<div class="container-fluid">
    <div class="row clearfix">
        <div class="col-lg-12 col-md-12">
            <div class="card planned_task">
<div class="header">
    <h2>Absence</h2>
</div>
<div class="body">
        <div class="container">
            <div class="row">
                <div class="col-8">
                    <div id="calendar"></div>
                </div>
                <div class="col-4 " style="border: 2px solid;">
                    <div class="header mt-4">
                        <h2 style="margin-bottom:30px;">Ajouter une Absence</h2>
                    </div>

                    <form action="{{route('admin.absence.store')}}" method="post">
                     @csrf()
                        <div class="form-group">
                               <label for="nom">Nom de stagaire</label>
                               <select name="user_id" class="select2-container form-control show-tick ms select2" data-placeholder="Select">
            
                
                                       @foreach($users as $user)
                                        <option value="{{$user->user_id}}" > {{$user->name}} {{$user->prenom}}</option>

                                       @endforeach 
                                    </select>
                        </div>
                        <div class="form-group">
                               <label for="nom">Date</label>
                               <input type="date" name="date_abs" id="nom" value="{{ $date->format('Y-m-d') }}" disabled class="form-control" >
                        </div>
                        <div class="form-group">
                                        <label></label>
                                        <br />
                                        <div class="custom-control custom-radio inline-cr">
                                            <input type="radio" name="statut" class="custom-control-input" id="ref" checked value="1">
                                            <label class="custom-control-label" for="ref">AbsJ</label>
                                        </div>
                                        <div class="custom-control custom-radio inline-cr">
                                            <input type="radio" name="statut" class="custom-control-input" id="att" value="0">
                                            <label class="custom-control-label" for="att">AbsNj</label>
                                        </div>
                                        <p id="error-radio"></p>
                                    </div>
         
                        <div class="form-group">
                            <button  class="btn btn-outline-success">Enregistrer</button>
                        </div>
                       
                    </form>

                </div>
               
            </div>
        </div>                     
</div>
</div>
            </div>
        </div>
</div>
@endsection


@section('style')
{{-- <!-- <link rel="stylesheet" href="{{asset('assets/vendor/fullcalendar/fullcalendar.min.css')}}">
<link rel="stylesheet" href="{{asset('assets/fullcalendarcss/bootstrap_main.min.css')}}"> --> --}}
<link rel="stylesheet" href="{{asset('assets/fullcalendarcss/core_main.min.css')}}">
<link rel="stylesheet" href="{{asset('assets/fullcalendarcss/datgrid.min.css')}}">
<link rel="stylesheet" href="{{asset('assets/vendor/fullcalendar/fullcalendar.min.css')}}">

<style>
    .fc td, .fc th {
    border-style: solid;
    border-width: 1px;
    padding: 0;
    color: white;
    vertical-align: top;
}
</style>
@endsection

@section('footer-scripts')

  
<script src="{{ asset('assets/vendor/select2/select2.min.js')}}"></script>
<script src="{{ asset('assets/js/pages/advanced-form.js')}}"></script>
<script src="{{ asset('assets/js/theme.js')}}"></script>
<script src="{{asset('assets/fullcalendarjs/core_main.min.js')}}"></script>
<script src="{{asset('assets/fullcalendarjs/daygrid_main.min.js')}}"></script>
<script src="{{asset('assets/fullcalendarjs/interaction_main.min.js')}}"></script>
<script src="{{asset('assets/fullcalendarjs/sweetalert.min.js')}}"></script>
<script>

document.addEventListener('DOMContentLoaded', function() {
    const calendarEl = document.getElementById('calendar');
    const calendar = new FullCalendar.Calendar(calendarEl, {
     plugins: ['dayGrid','interaction'],
     header : {
               left :'title' ,
               
               right : 'prevYear,prev,next,nextYear dayGridMonth,dayGridWeek,dayGridDay'
     },

     defaultDate : "{{date('Y-m-d')}}",
     navLinks : true, //can edit
     editable : true,
     selectable : false,
     eventLimit : true,
     events : '/admin/events',

     eventClick : function(info){
         
        let formatted_start_date = info.event.start.getFullYear()+ '-' + (info.event.start.getMonth()+1) + '-'+ info.event.start.getDate();
         //alert(info.event.title);
        // alert('Voir plus de details?');
         location.href='/admin/absence/'+formatted_start_date;
         
     },
     
    //  select : function(selectionInfo){
    //          let title = prompt("entrer le titre hhh");  
    //          let formatted_start_date = selectionInfo.start.getFullYear()+ '-' + (selectionInfo.start.getMonth()+1) + '-'+ selectionInfo.start.getDate() + " " +selectionInfo.start.getHours() +':'+selectionInfo.start.getMinutes() +':'+selectionInfo.start.getSeconds() ;
    //          let formatted_end_date = selectionInfo.end.getFullYear()+ '-' + (selectionInfo.end.getMonth()+1) + '-'+ selectionInfo.end.getDate() + " " +selectionInfo.end.getHours() +':'+selectionInfo.end.getMinutes() +':'+selectionInfo.end.getSeconds() ;
    //        $.ajaxSetup({
    //            headers:{
    //                'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content')
    //            }
    //        });
    //        $.ajax({
    //             type : 'POST',
    //             url : '/admin/events',
    //             data: {
    //                    title: title,
    //                    start : formatted_start_date,
    //                    end : formatted_end_date
    //             },
    //             success : function(){
    //                 swal.fire({
    //                     position : 'center',
    //                     icon : 'success',
    //                     title : 'Evenement ajoute',
    //                     showConfirmationButton: false,
    //                     timer: 1500
    //                 });
    //                 location.reload();
    //             }
            
               
         //  });
           
                    //}
        });
   
    calendar.setOption('locale','fr');
    calendar.render();
    document.querySelector('.fc-dayGridMonth-button').innerHTML = "Mois";
    document.querySelector('.fc-dayGridWeek-button').innerHTML = "Semaine";
    document.querySelector('.fc-dayGridDay-button').innerHTML = "Jours";
  });

</script>
@endsection
