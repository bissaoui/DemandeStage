
    var date1=document.getElementById('date1');
    var date2=document.getElementById('date2');

    var text=document.getElementById('text');
    var text1=document.getElementById('text1');

    function setTime(){
        date2.setAttribute('min', date1.value) ;
        myFunction();
    }

    function myFunction(){

        var date11=new Date(date1.value);
        var date22=new Date(date2.value);
        if(date11.getTime()>date22.getTime()){
            date2.value=date1.value;
        }

    }