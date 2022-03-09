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

?>