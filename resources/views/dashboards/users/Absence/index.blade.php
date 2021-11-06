@extends('layouts.stagiaire')


@section('content')
<div class="header">
    <h2>Absence</h2>
</div>
<div class="body">

        <div class="container">
             <h2 style="background-color:#adb5bd ;color:black;font-family: inherit;
    font-weight: 600;font-size: 20px">
             nbr abs: {{$abs[0]->nbr_abs}}</h2>
            <div class="row">
                <div class="col"></div>
                <div class="col-lg-10">
                    <div id="calendar"></div>
                </div>
                <div class="col"></div>
               
               
            </div>
        </div>                     
    
</div>
@endsection


@section('styles')
<!-- <link rel="stylesheet" href="{{asset('assets/vendor/fullcalendar/fullcalendar.min.css')}}">
<link rel="stylesheet" href="{{asset('assets/fullcalendarcss/bootstrap_main.min.css')}}"> -->
<link rel="stylesheet" href="{{asset('assets/fullcalendarcss/core_main.min.css')}}">
<link rel="stylesheet" href="{{asset('assets/fullcalendarcss/daygrid.min.css')}}">
<link rel="stylesheet" href="{{asset('assets/vendor/fullcalendar/fullcalendar.min.css')}}">

@endsection

@section('scripts')

  
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
     events : '/user/mesabsences',

     eventClick : function(info){
         
        
     },
     
   
        });
   
    calendar.setOption('locale','fr');
    calendar.render();
    document.querySelector('.fc-dayGridMonth-button').innerHTML = "Mois";
    document.querySelector('.fc-dayGridWeek-button').innerHTML = "Semaine";
    document.querySelector('.fc-dayGridDay-button').innerHTML = "Jours";
  });

</script>
 <!-- <script src="{{asset('assets/bundles/fullcalendarscripts.bundle.js')}}"></script>  
<script src="{{asset('assets/js/pages/calendar.js')}}"></script> -->


@endsection
