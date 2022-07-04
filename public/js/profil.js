



function showPwd() {
    const input = document.querySelector('#password');
    if (input.type === "password") {
      input.type = "text";
    } else {
      input.type = "password";
    }
  }

  const butt=document.querySelector("#mostra");
  butt.addEventListener("click",showPwd);