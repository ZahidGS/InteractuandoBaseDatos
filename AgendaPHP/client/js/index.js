$(function(){
  var l = new Login();
})


class Login {
  constructor() {
    this.submitEvent()
  }

  submitEvent(){
    $('form').submit((event)=>{
      event.preventDefault()
      this.sendForm()
    })
  }

  sendForm(){
    let form_data = new FormData();
    form_data.append('username', $('#user').val());
    form_data.append('password', $('#password').val());

/*     let cadena = "username=" + $('#user').val() +
    "&password=" + $('#password').val();
 */

     $.ajax({
      url: '../server/check_login.php',
      dataType: "JSON",
      cache: false,
      processData: false,
      contentType: false,
      data: form_data,
      type: 'POST',
      success: function(response){
        if (response.msg == "OK") {
          window.location.href = 'main.html';
        }else {
          alert(response.msg);
        }
      },
      error: function(){
        alert("error con la conexion al servidor");
      }
    });
  }
}
