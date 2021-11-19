var v=0;
function show(){
    if(!v){
        document.getElementById("read").setAttribute("type", "text");
        v=1;
    }
    else{
        document.getElementById("read").setAttribute("type", "password");
        v=0;
    }
}