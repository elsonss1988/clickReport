
var datas=[]
var materiais=[]


var url_string =window.location.href
var url = new URL(url_string);
var getUrl= url.searchParams.get("name");
var noSpaceUrl = getUrl.replace(" ", "-"); // "Hello World"
var paramUrl = noSpaceUrl.replace(/[^A-Za-z0-9\-]/g, "_");
console.log(paramUrl)

setInterval(()=>{
fetch('./controllsClick/clickReadJson.php?name='+paramUrl,{
    method:"GET",
    mode: 'cors',
    headers: {
      'Content-Type': 'application/json'
      // 'Content-Type': 'application/x-www-form-urlencoded',
    },
})
//?name='+paramUrl,{method:"GET",mode: 'cors',})
    .then(responsestream=>{
        responsestream.json().then(data=>{
            console.log('data',data)
            console.log(data.length)
                var container = document.getElementById("tbodyClick");
                container.innerHTML='';
                //console.log('datas.length',data.length)
                var m=0
                for(var i=1;i<data.length;i++){ 

                    if(materiais.includes(data[i]["material"])){
                        m++
                    }else{
                        materiais.push(data[i]["material"])
                        m++
                    }
                    
                    container.innerHTML+=
               
                    `<tr>
                        <td>${i}</td>
                        <td>${data[i]["id"]}</td>
                        <td>${data[i]["name"]}</td>
                        <td>${data[i]["email"]}</td>
                        <td>${data[i]["material"]}</td>
                        <td>${data[i]["time"]}</td>
                    </tr>`
                               
                                               
                    }
                    container.innerHTML+=`
                    <tfoot>
                        <tr>
                         <th>Quant</th>
                         <th>ID</th>
                         <th>Nome</th>
                         <th>E-mail</th>
                         <th>Material</th>
                         <th>Tempo (min)</th>
                        </tr>
                    </tfoot> `           
            //      }
            //      else{
            //         var result_style = document.getElementById('result_tr');
            //         result_style.remove()
            //         var container = document.getElementById("tbody");
            //         container.innerHTML= ''
            //     }
            //}
            
            
            console.log('materiais',materiais)
            console.log(m)
            // var dadosDevice = iPhone+', '+Android+', '+iPad+', '+computer+', '+Mac;
            // document.getElementById('myPieChart').setAttribute("data-pie", dadosDevice);
            //graphPie()
            
        });    
    });
    
//     var dados = sessionStorage.getItem('datas');
//     objLives=JSON.parse(dados)  
 
// const livesName= sessionStorage.getItem('livesName')
// console.log(livesName)

},5000)


    // Set new default font family and font color to mimic Bootstrap's default styling
Chart.defaults.global.defaultFontFamily = 'Nunito', '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
Chart.defaults.global.defaultFontColor = '#858796';



function graphPie(){
    // Pie Chart Example
    var ctx = document.getElementById("myPieChart");

    var dados = ctx.dataset.pie;

    var dados_tratados = dados.split(',').map(function(item) {
    return parseInt(item, 10);
    });

    var myPieChart = new Chart(ctx, {
    type: 'doughnut',
    data: {
        labels: ["iPhone", "Android", "iPad", "Windows", "Mac"],
        datasets: [{
        data: dados_tratados,
        backgroundColor: ['#6D7BA2', '#1cc88a', '#e74a3b', '#5a5c69', '#f6c23e'],
        hoverBackgroundColor: ['#2e59d9', '#17a673', '#be2617', '#373840', '#dda20a'],
        hoverBorderColor: "rgba(234, 236, 244, 1)",
        }],
    },
    options: {
        maintainAspectRatio: false,
        tooltips: {
        backgroundColor: "rgb(255,255,255)",
        bodyFontColor: "#858796",
        borderColor: '#dddfeb',
        borderWidth: 1,
        xPadding: 15,
        yPadding: 15,
        displayColors: false,
        caretPadding: 10,
        },
        legend: {
        display: false
        },
        cutoutPercentage: 80,
    },
    });
}