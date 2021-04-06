console.log ('clickOpen')


async function clickName(click){
    var i
    console.log(click)
    console.log(i++)
    var url='writeClickReport.php';
   const response = await fetch(url,
        {
        method:"POST",
        mode: 'cors',
        mode: "same-origin",
        credentials: "same-origin",
        headers: {
          "Content-Type": "application/json"
        },
        body: JSON.stringify(data)
    }).then(data=>console.log("post",data))
    
    
    console.log('*******************')
    fetch('url').then(data=>console.log("get",data))
    
  
}