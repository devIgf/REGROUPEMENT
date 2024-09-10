<style>
    @import url('https://fonts.googleapis.com/css?family=Poppins:400,500,600,700&display=swap');
*{
 margin: 0;
 padding: 0;
 box-sizing: border-box;
 font-family: 'Poppins', sans-serif;
}
html,body{
 display: grid;
 height: 100%;
 width: 100%;
 place-items: center;
 background: -webkit-linear-gradient(left, #003366,#004080,#0059b3, #0073e6);
}
::selection{
 background: #1a75ff;
 color: #fff;
}
.wrapper{
 overflow: hidden;
 max-width: 390px;
 background: #fff;
 padding: 30px;
 border-radius: 15px;
 box-shadow: 0px 15px 20px rgba(0,0,0,0.1);
}
.wrapper .title{
 font-size: 35px;
 font-weight: 600;
 text-align: center;
 margin-bottom: 30px;
}
.form-container .form-inner{
 width: 100%;
}
.form-inner form .field{
 height: 50px;
 width: 100%;
 margin-top: 20px;
}
.form-inner form .field input{
 height: 100%;
 width: 100%;
 outline: none;
 padding-left: 15px;
 border-radius: 15px;
 border: 1px solid lightgrey;
 border-bottom-width: 2px;
 font-size: 17px;
 transition: all 0.3s ease;
}
.form-inner form .field input:focus{
 border-color: #1a75ff;
}
.form-inner form .field input::placeholder{
 color: #999;
 transition: all 0.3s ease;
}
form .field input:focus::placeholder{
 color: #1a75ff;
}
form .btn{
 height: 50px;
 width: 100%;
 border-radius: 15px;
 position: relative;
 overflow: hidden;
 margin-top: 30px;
}
form .btn .btn-layer{
 height: 100%;
 width: 300%;
 position: absolute;
 left: -100%;
 background: -webkit-linear-gradient(right,#003366,#004080,#0059b3, #0073e6);
 border-radius: 15px;
 transition: all 0.4s ease;
}
form .btn:hover .btn-layer{
 left: 0;
}
form .btn input[type="submit"]{
 height: 100%;
 width: 100%;
 z-index: 1;
 position: relative;
 background: none;
 border: none;
 color: #fff;
 padding-left: 0;
 border-radius: 15px;
 font-size: 20px;
 font-weight: 500;
 cursor: pointer;
}
</style>

<div class="wrapper">
    <div class="title">Nouveau</div>
    <div class="form-container">
      <div class="form-inner">
        <form action="{{ route('register') }}" method="POST" class="signup">
          @csrf
          <div class="field">
            <input type="text" placeholder="Name" name="name" id="name" required>
          </div>
          <div class="field">
            <input type="email" placeholder="Email Address" id="email" name="email" required>
          </div>
          <div class="field">
            <input type="password" placeholder="Password" id="password" name="password" required>
          </div>
          <div class="field">
            <input type="password" placeholder="Confirm password" name="password_confirmation" required>
          </div>
          <div class="field btn">
            <div class="btn-layer"></div>
            <input type="submit" value="Signup">
          </div>
        </form>
      </div>
    </div>
  </div>


<script>
     const loginText = document.querySelector(".title-text .login");
      const loginForm = document.querySelector("form.login");
      const loginBtn = document.querySelector("label.login");
      const signupBtn = document.querySelector("label.signup");
      const signupLink = document.querySelector("form .signup-link a");
      signupBtn.onclick = (()=>{
        loginForm.style.marginLeft = "-50%";
        loginText.style.marginLeft = "-50%";
      });
      loginBtn.onclick = (()=>{
        loginForm.style.marginLeft = "0%";
        loginText.style.marginLeft = "0%";
      });
      signupLink.onclick = (()=>{
        signupBtn.click();
        return false;
      });

</script>
