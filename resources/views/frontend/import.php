<?php
error_reporting(0);
$dblink = new mysqli("localhost","cityeduh_dwiggydoo","BVc@ir31eO^m","cityeduh_dwiggydoo");
$fileName = $_FILES["file"]["tmp_name"];

if ($_FILES["file"]["size"] > 0) {

    $file = fopen($fileName, "r");
    $p = 0;
    while (($column = fgetcsv($file, 10000, ",")) !== FALSE) {
        //echo "<pre>";
        //print_r($column);
        if ($p > 0 && $column[0] != '') {
            $cat_que = mysqli_query($dblink, "select id from breed where name like'%" . strtoupper(trim($column[3])) . "%'");
            echo mysqli_num_rows($cat_que);
            if (mysqli_num_rows($cat_que) == 0) {
                  mysqli_query($dblink, "insert into breed(name) values ('".strtoupper(trim($column[3]))."')");
                $brand_id = mysqli_insert_id($dblink);
            } else {
                $cat_res = mysqli_fetch_array($cat_que);
                $brand_id = $cat_res['id'];
            }
            //State
            // $cat_que = mysqli_query($dblink, "select id from city where name like'%" . strtoupper(trim($column[7])) . "%'");
            // if (mysqli_num_rows($cat_que) == 0) {
            //       mysqli_query($dblink, "insert into city(name) values ('".strtoupper(trim($column[7]))."')");
            //     $state_id = mysqli_insert_id($dblink);
            // } else {
            //     $cat_res = mysqli_fetch_array($cat_que);
            //     $state_id = $cat_res['id'];
            // }
        
  $cat_queu = mysqli_query($dblink, "select id,city from users where email like'%" . strtoupper(trim($column[1])) . "%'");
  $cat_resu = mysqli_fetch_array($cat_queu);
                $user_id = $cat_resu['id'];
                $user_city = $cat_resu['city'];

            $time=time();

            if(trim($column[4])=='Male')
            {
             $gen=0;
            }
            else if(trim($column[4])=='Female')
            {
                 $gen=1;
            }
            if(trim($column[2]=='')
            {
                $name='Guest';
            }
            else
            {
                $name=trim($column[2];
            }

            
            mysqli_query($dblink,"Insert into products(name,brand_id,location_id,file_path,user_id,age,unit,added_by) values('$name','$brand_id','$user_city','".trim($column[8])."','$user_id','".trim($column[5])."','$gen','admin')");
        }
        $p++;
    }
}

header("Location: https://cilearningschool.com/dwiggydoo/admin/products/all?msg=Csv Uploade success");