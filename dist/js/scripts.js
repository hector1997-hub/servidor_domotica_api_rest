$(document).ready(function(){
    
      $('#register-form').submit(e=>{
        e.preventDefault();       
        const postData={
            inputFirstName:$('#inputFirstName').val(),
            inputLastName:$('#inputLastName').val(),
            inputUser:$('#inputUser').val(),
            inputEmailAddress:$('#inputEmailAddress').val(),
            inputPassword:$('#inputPassword').val(),
            inputConfirmPassword:$('#inputConfirmPassword').val()            
        };
        const url= '../DataBase/fregistro.php';
        
        $.post(url,postData,(Response) => {
           console.log (Response);           
           let res=Response;
           swal.fire(res);
           if (res=="Ha sido registrado con exito"){
            Swal.fire({
                title:res,
                timer:3000,
                timerProgressBar:true,
                onBeforeOpen:()=>{
                    timerInterval=setInterval(() => {
                        const content = Swal.getContent()
                        if (content){
                            const b=content.querySelector('b')
                            if (b){
                                b.textContent=Swal.getTimerLeft()
                            }
                        }
                    },100)
                },
                onClose:()=> {
                    clearInterval(timerInterval)
                    window.location.href='../dist/login.php';
                }
            }).then((result) =>{
                if(result.dismiss === Swal.DismissReason.timer){
                    console.log('close by the timer')                
                }
            });
            
            }else{
                swal.fire(res);
            }
        });       
        e.preventDefault(); 
    });

  
  //obtener dodos los datos de la tabla de dispositivos
    $.ajax({
            url:'../DataBase/flistar.php',
            type:'GET',            
            success:function(Response){                
                //console.log(Response);
                let lista =JSON.parse(Response);
                let template ='';
                lista.forEach(lista=>{
                    template += `
                        <tr>
                            <td hidden="true">${lista.id}</td>
                            <td>${lista.sensor}</td>
                            <td>${lista.medida}</td>
                            <td>${lista.fecha}</td>
                            <td>${lista.hora}</td>
                        </tr>
                    `
                });
                $('#infoTable').html(template);
            }
    });
    
    

///////////////////////
    graphbySensor('uno');
    document.getElementById("grafica").hidden=true;
    document.getElementById("s1").addEventListener("click",graphs1);
    document.getElementById("s2").addEventListener("click",graphs2);
/////////////////////////////
    function graphs1(){        
        document.getElementById("grafica").hidden=false;        
        listbySensor('uno');
        graphbySensor('uno');
    }
    function graphs2(){
        document.getElementById("grafica").hidden=false;        
        listbySensor('dos');
        graphbySensor('dos');
    }

    function listbySensor(sensor){
        $.ajax({
            url:'../DataBase/flistbySensor.php',
            data:{sen:sensor},
            type:'POST' 
        }).done(function(Response){                
               
                let lista =JSON.parse(Response);
                let template ='';
                lista.forEach(lista=>{
                    template += `
                        <tr>
                            <td  hidden="true">${lista.id}</td>
                            <td>${lista.sensor}</td>
                            <td>${lista.medida}</td>
                            <td>${lista.fecha}</td>
                            <td>${lista.hora}</td>
                        </tr>
                    `
                });
                $('#infoTable').html(template);
            });   
    }



    function graphbySensor(sensor){
        var lista 
        var medidas=[];
        var fechahora=[];
        var fecha=""; 
        $.ajax({
            url:'../DataBase/flistbySensor.php',
            data:{sen:sensor},
            type:'POST' 
            }).done(function(Response){            
                lista = JSON.parse(Response);                 
                for (var i=0;i< lista.length;i++){  
                    medidas.push(lista[i].medida);
                    fecha=lista[i].fecha.concat(" ");
                    fechahora.push(fecha.concat(lista[i].hora) );
                }     
                var data={
                    labels:fechahora,
                    datasets:[{
                        data:medidas,
                        fill:false,
                        label:"Sensor ".concat(lista[1].sensor)
                    }]
                };               
                                
                var ctx = document.getElementById('myAreaChart').getContext('2d');               
                var myChart = new Chart(ctx, {
                    type:'line',
                    data:data,
                    options:{
                        scales:{
                            yAxes:[{
                                ticks:{
                                    beginAtZero:true
                                }
                            }]
                        }
                    }
                })
                
            });          
    }
    
    
   

  
});
