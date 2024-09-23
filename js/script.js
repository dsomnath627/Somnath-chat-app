


//read message to database
let msgdiv=document.querySelector(".msg");
setInterval(()=>{
    fetch("readmsg.php").then(r=>{if(r.ok){
        return r.text();
    }}).then(d=>{
        msgdiv.innerHTML=d;
    })
},500);


//add message to database.
window.onkeydown=(e)=>{
    if (e.key=="Enter") {
        update()
    }

}
function update(){
    let msg=input_msg.value;
    input_msg.value="";
    fetch(`msg.php?msg=${msg}`).then(
        //response read
        r=>{
            if (r.ok) {
                return r.text();
            }
        }
    ).then(
        //recive data
        d=>{
            console.log("msg add");
            msgdiv.scrollTop=(msgdiv.scrollHeight-msgdiv.clientHeight);
        }
    )
}