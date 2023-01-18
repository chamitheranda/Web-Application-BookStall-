function validatecard(){
    username= document.forms['form1']['cname'].value;
    if(username && username.length > 4){
        document.getElementById('label5').style.color='green';
    }else{
        document.getElementById('label5').style.color='red';
    }
 }