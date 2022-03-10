<?php
function genID($lastid,$tableName,$columnName,$prefix){
    global $mysqli;
    $generated_id = $prefix . $lastid . date("d") . date("m") . date("y");
    $IDExist_result=mysqli_query($mysqli, "select * from ".$tableName." where ".$columnName."='$generated_id'");
    if (mysqli_num_rows($IDExist_result)==0){
    mysqli_query($mysqli, "update ".$tableName." set ".$columnName."='$generated_id' where ".$tableName.".id='$lastid'");
    }else{
         genID($lastid,$tableName,$columnName,$prefix);
    }
}


function alert($message)
{
    echo "<script>alert('$message')</script>";
}

// function get_user_Name($id){
//     try {
//     global $mysqli;
//     $get_user_Name= mysqli_fetch_assoc(mysqli_query($mysqli,"SELECT * FROM `users` WHERE user_id='$id'"));
//     return $get_user_Name['username'];
// } 
//     catch (\Throwable $th) {
//        return " ";
//     }
// }
function get_Added_Name($id){
    if ($id!="") {
        global $mysqli;
        $get_Added_Name= mysqli_fetch_assoc(mysqli_query($mysqli,"SELECT * FROM `users` WHERE user_id='$id'"));  
        if (isset($get_Added_Name['username'])) {
            # code...
            return $get_Added_Name['username'];
        }  else{
            return " ";
        }

    }else{
        return " ";

    }

}
