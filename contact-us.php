<?php include('include/header.php'); ?>

       <div class="jumbotron">
           <h1 class="text-center mt-5">Contact us</h1>
       </div>
       
        <div class="container mt-3">
          <div class="row">
            <div class="col-md-6">
              <h3>Our Office</h3>
              <hr>
              <p>Banglore,India</p>
            </div>
            <div class="col-md-6">
                  <form method="post" class="mt-5 p-3">
                    
                    <?php 
                      if(isset($_POST['sigin'])){
                          
                          $fullname = $_POST['fullname'];
                          $des_name = $_POST['designername'];
                          $email = $_POST['email'];
                          $msg = $_POST['message'];
                          $cartt = "SELECT * FROM interior_designer WHERE d_first_name='$des_name'";
        $run  = mysqli_query($con,$cartt);
        if(mysqli_num_rows($run) > 0){
          while($row = mysqli_fetch_array($run) ){
            $db_pro_id  = $row['designer_id'];
          }
        }
                          if(!empty($fullname) or !empty($email) or !empty($des_name) or !empty($msg)) {
 $cust_query="INSERT INTO contact_us(desi_id,`cus_name`,`cust_email`,`desi_name`,`msg`) VALUES($db_pro_id,'$fullname','$email','$des_name','$msg')";

                              if(mysqli_query($con,$cust_query)){
                                 $message="send Successfully!";
                           }
                          }
                      if(isset($error)){
                      
                        echo "<div class='alert bg-danger' role='alert'>
                                <span class='text-white text-center'> $error</span>
                              </div>";
                    
                        }
                      else if(isset($message)){
                      
                        echo "<div class='alert bg-success' role='alert'>
                                <span class='text-white text-center'> $message</span>
                              </div>";
                    
                        }
                      }
                     
                     /*  $pr_query  ="select * from interior_designer where d_first_name=$des_name"; "SELECT * FROM furniture_product WHERE pid=$db_pro_id";
          $pr_run    = mysqli_query($con,$pr_query);
          if(mysqli_num_rows($pr_run) > 0){
            while($pr_row = mysqli_fetch_array($pr_run)){*/
                 
                       /*$query ="select designer_id,d_first_name from interior_designer where d_first_name='$des_name'";
                        $run   = mysqli_query($con,$query);
                        while($row = mysqli_fetch_array($run))
                        $cust_query="INSERT INTO contact_us ('desi_id')values($row['designer_id'];)";
                                    if(mysqli_query($con,$cust_query)){
                                  $message="send Successfully!";
                           }*/
                         
                      
 
             ?>
                    <div class="form-group">
                      <input type="text" name="fullname" placeholder="Full Name" class="form-control" required>
                     </div>
  <div class="form-group">
                      <input type="text" name="designername" placeholder="Designer name" class="form-control">
                     </div>
                     
                     
                     <div class="form-group">
                      <input type="text" name="email" placeholder="Email" class="form-control" required>
                     </div>
                     
                     <div class="form-group">
                      <textarea class="form-control" name= message  rows="5" cols="20" placeholder="Message" required></textarea>
                    </div>

                      <div class="form-group text-center mt-4">
                        <input type="submit" name="sigin" class="btn btn-primary" value="Send">
                      </div>

                  </form>
                </div>
         </div>
          
         
         
       </div>
         
       <?php include('include/footer.php');?>