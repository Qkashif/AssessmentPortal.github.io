
    const form = document.querySelector('#mymsg'),
    class_id = form.querySelector("#class_id").value,
    message = form.querySelector("#message"),
    submit_msg = form.querySelector('.icon_comment');

    chatbox = document.querySelector(".chatBox");

    


   form.onsubmit = (e)=>{
       e.preventDefault();
    }
    submit_msg.onclick = () => {
      

      // create xhr object 
      

      let xhr = new XMLHttpRequest();

      // initialize 
      
      xhr.open("POST", "send_msg.php", true);


      xhr.onload = () => {
        if (xhr.readyState === XMLHttpRequest.DONE) {
          if (xhr.status === 200) {
            
            console.log(xhr.responseText);
            document.getElementById('mymsg').reset();



          }
        }
      }


      let formdata = new FormData(form);

      xhr.send(formdata);
    }



    setInterval(() =>{
    let xhr = new XMLHttpRequest();
    xhr.open("POST", "get_chat.php", true);
    xhr.onload = ()=>{
      if(xhr.readyState === XMLHttpRequest.DONE){
          if(xhr.status === 200){

            let data = xhr.response;
            chatbox.innerHTML = data;
          
          }
      }
    }
    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhr.send("class_id="+class_id);
}, 500);
