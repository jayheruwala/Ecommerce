
function printErr(Id,msg){

    document.getElementById(Id).innerHTML=msg;
}

function validateCategory(){

  const name=document.getElementById("name").value;
  const image=document.getElementById("iamge").value;

nameErr = true;


if(name == ""){
    printErr("nameErr","plese enter name");
}
else{
    printErr("nameErr","");
    nameErr=false;
}


if(image == ""){
    printErr("imageErr","plese enter name");
}
else{
    printErr("imageErr","");
    imageErr=false;
}

if((nameErr && imageErr) == true){
    return true;
}else{
    return false;
}

}

function removeName(){
    printErr("nameErr","");
}

function removeImage(){
    printErr("imageErr","");
}