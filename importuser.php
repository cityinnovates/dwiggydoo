<?php
$dblink = new mysqli("localhost","cityeduh_dwiggydoo","BVc@ir31eO^m","cityeduh_dwiggydoo");
$fileName = $_FILES["file"]["tmp_name"];

if ($_FILES["file"]["size"] > 0) {

    $file = fopen($fileName, "r");
    $p = 0;
    while (($column = fgetcsv($file, 10000, ",")) !== FALSE) {
        // echo "<pre>";
        // print_r($column);
        // die('hii');
        if ($p > 0 && $column[0] != '') {
           // echo $column[6];
            //State
            $cat_que = mysqli_query($dblink, "select id from city where name like'%" . strtoupper(trim($column[6])) . "%'");
            // echo mysqli_num_rows($cat_que);
            if (mysqli_num_rows($cat_que) == 0) {
                  mysqli_query($dblink, "insert into city(name) values ('".strtoupper(trim($column[6]))."')");
                $state_id = mysqli_insert_id($dblink);
            } else {
                $cat_res = mysqli_fetch_array($cat_que);
               $state_id = $cat_res['id'];
            }

          
        
  $cat_queu = mysqli_query($dblink, "select id from users where email like'%" . strtoupper(trim($column[3])) . "%'");
  $cat_resu = mysqli_fetch_array($cat_queu);
                $user_id = $cat_resu['id'];



  $cat_queue = mysqli_query($dblink, "select id from users where phone like'%" . strtoupper(trim($column[2])) . "%'");
  $cat_resue = mysqli_fetch_array($cat_queue);
                $user_ide = $cat_resue['id'];       

            $time=time();



            if(trim($column[4])=='Male')
            {
             $gen=0;
            }
            else
            {
                 $gen=1;
            }



    if($user_id==''&&$user_ide=='')
        {
            // die('hi');
           
            mysqli_query($dblink,"Insert into users(name,phone,email,gender,address,city,email_verified_at,password) values('".trim($column[1])."','".trim($column[2])."','".trim($column[3])."','$gen','".trim($column[5])."','$state_id','2022-04-06 12:04:05','$2y$10$tgeLTSc7OsFHL2nLrUX9DeWQRLnI9Ccgx67ia22NU/KfgH2Q9EJ7m')");

            $last_id = mysqli_insert_id($dblink);

            mysqli_query($dblink,"Insert into customers(user_id) values('$last_id')");
        }
        else
        {

        }
        }
        $p++;
    }
}
header("Location: https://cilearningschool.com/dwiggydoo/admin/products/all?msg=Csv Uploade success");