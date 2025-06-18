
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Syne:wght@400..800&display=swap" rel="stylesheet">
    <title>Event Booking Signup </title> 
    
<style>
@import url('https://fonts.googleapis.com/css?family=Poppins:400,500,600,700&display=swap');
*{
  margin: 0;
  padding: 0;
  box-sizing: border-box;
  font-family: 'Poppins', sans-serif;
}
body{
  min-height: 100vh;
  display: flex;
  align-items: center;
  justify-content: center;
  background: lightgray;
}
.wrapper{
  margin-top:2px;
  margin-bottom:2px;
  position: relative;
  max-width: 620px;
  width: 100%;
  background: #fff;
  padding:34px;
  padding-top:5px;
  border-radius: 6px;
  box-shadow: 0 5px 10px rgba(0,0,0,0.2);
}


form h3{
  color: #707070;
  font-size: 14px;
  font-weight: 500;
  margin-left: 10px;
}

form .text h3{
 color: #333;
 width: 100%;
 text-align: center;
}
form .text h3 a{
  color: #4070f4;
  text-decoration: none;
}
form .text h3 a:hover{
  text-decoration: underline;
}

.tbd-form-control{
    width:100%; 
    height:50px; 
    background-color:#d5d5d5; 
    margin-top:7px;
    margin-bottom:7px;
    padding-top:2px;
    padding-bottom:2px;
    border:1px solid #d5d5d5;
}

.tbd-form-label{
   width:40%;  
   height:50px;
   float:left;
   padding:10px; 
}

.tbd-form-input{
 width:60%;  
 height:50px; 
 float:left;   
}

.tbd-input-form-field{
 width:100%; 
 padding-left:10px; 
 height:95%;   
 border:1px solid black;
 border-radius:5px;
   border-bottom-width:2.5px;
}

.tbd-input-form-field:focus{
    background-color:#fff;
    color:black;
    border-bottom-width:3.5px;
}

.tbd-btn-submit{
  width:100%; 
  height:100%; 
  border-radius:5px;
  color:#fff;
  background-color:#243463;
  border:2px solid #243463; 
  font-size:18px;
  font-weight:600px;
}

.tbd-btn-submit:hover, .tbd-btn-submit:focus{
  background-color:#E31E24;
  border:2px solid #E31E24;
}
.tbd-form-control-submit{
   width:100%;
   height:50px;
}
.tbd-form-control-cap{
    width:100%;
}
.tbd-form-control-checked{
    width:100%;
    height:40px;
    padding-left:10px; 
    padding-top:7px;
    background-color:#d5d5d5;
    border:2px solid #d5d5d5;
    margin-bottom:7px;
    margin-top:7px;
}
.tbd-form-h{
    color:#243463;
    margin-top:10px;
    margin-bottom:15px;
    padding-top:5px;
    padding-bottom:5px;
    height:70px;
   
}

.tbd-form-img{
    height:100%;  
    float:left;
}

@media screen and (max-width: 600px) {
  body {
    background-color: #d5d5d5;
    font-size:12px;
    font-family:syne;
  }
  .wrapper{
      width:380px; 
     
  }
  
}
</style>
   </head>
<body>
    
  <div class="wrapper">
      <div class="tbd-form-h"><center><h1 >SignUp Here</h1></center></div>
      <?= form_open('front/register_user', ['name' => 'signupform',  'id' => 'signupform',    'enctype' => 'multipart/form-data']) ?>
 
        <div class="tbd-form-control">
        <div class="tbd-form-label"><label>Name</label>  </div>
        
        <div class="tbd-form-input">
        <input type="text" class="tbd-input-form-field" name="name" autocomplete="off"  placeholder="Enter your Username" required>
        </div>
        </div>
    
        <div class="tbd-form-control">
        <div class="tbd-form-label"><label>Email</label>    </div>
        
        <div class="tbd-form-input">
        <input type="text"  class="tbd-input-form-field" id="myusername" name="email" autocomplete="off"  placeholder="Enter Email (Example - abc@gmail.com)" required>
        </div>
        </div>
      
        <div class="tbd-form-control">
        <div class="tbd-form-label"> <label>Mobile</label>  </div>
        
        <div class="tbd-form-input">
        <input type="text" class="tbd-input-form-field"  id="mobile_no" name="mobile_no" autocomplete="off"  placeholder="Enter your Mobile">
        </div>
        </div>
       
        <div class="tbd-form-control">
        <div class="tbd-form-label">  <label>Password</label>   </div>
        
        <div class="tbd-form-input">
          <input type="password" class="tbd-input-form-field" id="password" name="password" autocomplete="off"  placeholder="Enter your Password" required>
        </div>
        </div>
      
        <div class="tbd-form-control-submit">
        <input type="Submit" class="tbd-btn-submit" value="Register Now">
        </div>    
      
  
      <div class="text">
      <h3 >Already have an account? <a href="<?= base_url() ?>login">SignIn</a></h3>
      </div>
      <?= form_close() ?>
      </div>
</body>
</html>
