<?php
$connect=mysqli_connect("localhost","root","","nimh");
$output="";
if(isset($_POST['export_excel']))
{
    $sql="select * from registration";
    $result=mysqli_query($connect,$sql);
    if(mysqli_num_rows($result)>0)
    {
        $output .= '
            <table class="table" bordered="1">
                <tr>
                    <th>Registration No</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>profile picture</th>
                    <th>age</th>
                    <th>sex</th>
                    <th>address</th>
                    <th>village</th>
                    <th>district</th>
                    <th>state</th>
                    <th>Gaurdian\'s Name</th>
                    <th>Phone</th>
                    <th>Family Income</th>
                    <th>Disability Level</th>
                    <th>Aadhar Number</th>
                    <th>Caste</th>
                    <th>Escort Name</th>
                    <th>Escort\'s Picture</th>
                    <th>Aadhar Proof</th>
                    <th>Disability Proof</th>
                    <th>Income Level Proof</th>
                </tr>
            ';
            while($row=mysqli_fetch_array($result))
            {
                $output.= '
                    <tr>
                        <td>'.$row['registration_number'].'</td>
                        <td>'.$row['fname'].'</td>
                        <td>'.$row['lname'].'</td>
                        <td>'.$row['picture'].'</td>
                        <td>'.$row['age'].'</td>
                        <td>'.$row['sex'].'</td>
                        <td>'.$row['address'].'</td>
                        <td>'.$row['village'].'</td>
                        <td>'.$row['district'].'</td>
                        <td>'.$row['state'].'</td>
                        <td>'.$row['gname'].'</td>
                        <td>'.$row['phone'].'</td>
                        <td>'.$row['fincome'].'</td>
                        <td>'.$row['level'].'</td>
                        <td>'.$row['aadhar'].'</td>
                        <td>'.$row['caste'].'</td>
                        <td>'.$row['escort'].'</td>
                        <td>'.$row['esc_pic'].'</td>
                        <td>'.$row['a_proof'].'</td>
                        <td>'.$row['d_proof'].'</td>
                        <td>'.$row['i_proof'].'</td>
                    </tr>
                ';
            }
            $output.='</table>';
            header("Content-Type: application/xls");
            header("Content-Disposition:attachment; filename:registered.xls");
            echo $output;   
    }
}


?>