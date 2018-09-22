
</style>
  <div class="col-md-7" style="height: 400px;" >

  
    <div style="float:left;margin-left: 150px ;width: 50%;border: 1px solid #ddd;padding:0px;box-shadow: 10px 10px 10px green;background:green;margin-top: 70px;height: 80%;">

        <div style="width: 100%;background-color:  #55d67c;font-family: Georgia;color: white; ">
            <center>
                <br>
                SISTEM INFORMASI PENGADUAN ONLINE<BR>
                KEJAKSAAN TINGGI PROVINSI BENGKULU 
                <br>   
            </center> 
        </div>       
        <div style="width: 100%;background-color:#238e59;font-family: Georgia;color: white;height: 78%; margin-top:1px; ">
          <form method="post" action="<?php echo base_url();?>welcome/direction">
            <div style="width: 100%; margin-top: 1px;margin-left: 30px;">
                      
                      <br>
                      <p>Username <br></p>
                      <input style="width: 80%" type="text" name=""><br>
                      <p>Password <br></p>
                      <input style="width: 80%" type="password" name="">
              </div>
              <div class="col-md-12" style="padding-right: 10%;">
                    <div class="col-md-4">
                        <button style="width: 80%;font-size: 15px;padding: 0px; font-family: times new roman; background-color: #78e08f" type="submit" class="button" name="login"><center><span>Login</span></button>
                    </div>
                    <div class="col-md-4">
                        <button style="width: 80%;font-size: 10px;padding: 0px; font-family: times new roman; background-color:#b8e994; " type="submit" class="button" name="lupa_password"><span>Lupa Password</span></button>
                    </div>
                    <div class="col-md-4">
                             <button style="width: 80%;font-size: 15px;padding: 0px;font-family: times new roman;  background-color: #78e08f" type="submit"  class="button" name="register" value="true"><span>Register</span></button>
                    </div>
              </div>
             
          </form>
               
        </div>                                         
    
    </div>
  </div>
  <div>
    <img src="<?php echo base_url('/asset/home/image/background-homepage.png'); ?>"  class="img-responsive">
  </div>
       