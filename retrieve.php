    <?php
        $connection=mysqli_connect("localhost","root","","nimh") or die("Unable to connect to the database!");
        // <!-- makingconnection to db -->
        //mysql_connect('localhost','root','');

        //<!-- select database -->
        //mysql_select_db('nimh');
        $aadhar1=$_POST['aadhar'];
        $name1=$_POST['name'];
        $sql="SELECT * FROM registration WHERE aadhar = '$aadhar1' AND fname = '$name1' order by registration_number desc limit 1;";
        $records=mysqli_query($connection,$sql);
    
    ?>

    <html>
        <head>
            <title>Registration details</title>
            <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
        <style> 
            body {
            
                background-color: #cccccc;

                }
                
        </style>

        </head>
                <body>
                <div class="container">
            <br>
            <h2 style="text-align:center;color:white;">NIEPID TLM Registration Details</h2>
            <br>
        </div>
        <div class="container">
        <div  class="table table-striped" >
        <table style="width:100%" width="200" border="1" cellpadding="2" cellspacing="2" >
        <tr>
            <th bgcolor="b3b3cc">registration_num</th>
            <th bgcolor="b3b3cc">firstname</th> 
            <th bgcolor="b3b3cc">lastname</th>
            <th bgcolor="b3b3cc">picture</th>
        
            
            
           
           
        </tr>

        
        
        <?php

                $regis=mysqli_fetch_array($records,MYSQLI_ASSOC);

                echo "<tr>";
                echo "<td >".$regis['registration_number']."</td>";
                echo "<td>".$regis['fname']."</td>";
                echo "<td>".$regis['lname']."</td>";
                echo "<td>".$regis['picture']."</td>";
               
               
                
                echo "</tr>";
            
               
                ?>
                
           
        <tr>
            <th bgcolor="b3b3cc">age</th>
            <th bgcolor="b3b3cc">sex</th>
            <th bgcolor="b3b3cc">address</th>
            <th bgcolor="b3b3cc">village</th>
            
            
            
            
        </tr>
        

        <?php
                echo "<tr>"; 
                   
                 echo "<td>".$regis['age']."</td>";
                 echo "<td>".$regis['sex']."</td>";
                 echo "<td>".$regis['address']."</td>";
                 echo "<td>".$regis['village']."</td>";
            

                
                
               
               
               
                echo "</tr>";

             
        ?>
        
        <tr>
            <th bgcolor="b3b3cc">district</th>
            <th bgcolor="b3b3cc">state</th>   
            <th bgcolor="b3b3cc">caste</th>
            <th bgcolor="b3b3cc">escort</th>
            <th bgcolor="b3b3cc">ephone</th>
           
           

          
            
           </tr>
           
           <?php
           
                echo "<tr>";
                echo "<td >".$regis['district']."</td>"; 
                echo "<td>".$regis['state']."</td>";
                echo "<td>".$regis['caste']."</td>";
                echo "<td>".$regis['escort']."</td>";
                echo "<td>".$regis['ephone']."</td>";
               
                

               
                
                echo "</tr>"; 
        
        ?>

        <tr>
            <th bgcolor="b3b3cc">date_given</th>
            <th bgcolor="b3b3cc">esc_pic</th>
            <th bgcolor="b3b3cc">a_proof</th>
            <th bgcolor="b3b3cc">d_proof</th>
            <th bgcolor="b3b3cc">i_proof</th>   
            
            
            

                

        </tr>

        <?php      echo "<tr>";
                     echo "<td>".$regis['date_given']."</td>";
                     echo "<td>".$regis['esc_pic']."</td>";
                     echo "<td>".$regis['a_proof']."</td>";
                     echo "<td>".$regis['d_proof']."</td>";
                     echo "<td>".$regis['i_proof']."</td>";

                   
                   
                    
                    echo "</tr>";
               
        ?>
        <tr>
            
            <th bgcolor="b3b3cc">phone</th>
            <th bgcolor="b3b3cc">total_paid</th>
            <th bgcolor="b3b3cc">days_stayed</th>
            <th bgcolor="b3b3cc">gname</th>
          
            

           
            </tr>

        <?php
        echo "<tr>";
        echo "<td>".$regis['phone']."</td>";
        echo "<td>".$regis['total_paid']."</td>";
        echo "<td>".$regis['days_stayed']."</td>";
        echo "<td>".$regis['gname']."</td>";

         
       
        echo "</tr>";

                ?>

        <tr>
            <th bgcolor="b3b3cc">cost</th>
            <th bgcolor="b3b3cc">subsidy_provided</th>
            <th bgcolor="b3b3cc">outbeneficiary</th>
            <th bgcolor="b3b3cc">expenses</th>

        </tr>

                <?php
                echo "<tr>";                
                echo "<td>".$regis['cost']."</td>";
                echo "<td>".$regis['subsidy_provided']."</td>";
                echo "<td>".$regis['outbeneficiary']."</td>";
                echo "<td>".$regis['expenses']."</td>";
                echo "</tr>";
                

                    ?>
        <tr>
            <th bgcolor="b3b3cc">fincome</th>
            <th bgcolor="b3b3cc">level</th>
            <th bgcolor="b3b3cc">kit</th>
            <th bgcolor="b3b3cc">aadhar</th>
                </tr>
        <?php 

            echo "<tr>"; 
            echo "<td>".$regis['fincome']."</td>";
            echo "<td>".$regis['level']."</td>";
            echo "<td>".$regis['Recommended_Kit']."</td>";
            echo "<td>".$regis['aadhar']."</td>"; 
            echo "</tr>"; 
            ?>


        </table></div>
        </div>

                    </body>

            

    </html>






