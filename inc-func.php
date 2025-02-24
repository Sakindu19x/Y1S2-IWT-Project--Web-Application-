<?php
function mysql_escape_cust($inp) {
    if(is_array($inp))
        return array_map(__METHOD__, $inp);

    if(!empty($inp) && is_string($inp)) {
        return str_replace(array('\\', "\0", "\n", "\r", "'", '"', "\x1a"), array('\\\\', '\\0', '\\n', '\\r', "\\'", '\\"', '\\Z'), $inp);
    }
    return $inp;
}

function user_level($usr_lev){
    if ($usr_lev=='0'){
        return "User";
    }
    if ($usr_lev=='1'){
        return "Admin";
    }
}


function combo_read($table,$selected_id,$key_field,$key_name) {
    $db = new mySQL();
    $sql = "SELECT $table.* FROM ".$table;
    $result=$db->execute($sql);

    while ($row = mysqli_fetch_array($result)) {
        if ($selected_id == $row[$key_field])
            echo '<option value="' . $row[$key_field] . '" selected>' . $row[$key_name] . '</option>';
        else
            echo '<option value="' . $row[$key_field] . '" >' . $row[$key_name] . '</option>';
    }
    unset($result);
    unset($db);
}

function get_field_value($field_name, $table_name, $key_field, $key_value)
{
    $db = new mySQL();

    $sql = "SELECT $field_name FROM $table_name WHERE $key_field = '$key_value'";
    //echo $sql.'<br/>';
    $result=$db->execute($sql);

    if (mysqli_num_rows($result) > 0){
        $row_count = mysqli_fetch_assoc($result);
        $ret_val = $row_count[$field_name];
    }else
        $ret_val = "";

    unset($result);
    unset($db);
    //die($ret_val);
    return $ret_val;
}

function getUserIpAddr(){
    if(!empty($_SERVER['HTTP_CLIENT_IP'])){
        //ip from share internet
        $ip = $_SERVER['HTTP_CLIENT_IP'];
    }elseif(!empty($_SERVER['HTTP_X_FORWARDED_FOR'])){
        //ip pass from proxy
        $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
    }else{
        $ip = $_SERVER['REMOTE_ADDR'];
    }
    return $ip;
}