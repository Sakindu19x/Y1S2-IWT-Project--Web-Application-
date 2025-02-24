<?php
function sec_session_start() {
    session_start();
}

function login($email, $password, $mysqli) {
    // Using prepared statements means that SQL injection is not possible. 
    if ($stmt = $mysqli->prepare("SELECT id, username, password,  level, fname, lname,country,tel FROM members WHERE email = ? LIMIT 1")) {
        $stmt->bind_param('s', $email);  // Bind "$email" to parameter.
        $stmt->execute();    // Execute the prepared query.
        $stmt->store_result();
 
        $stmt->bind_result($user_id, $username, $db_password,  $level, $fname, $lname, $country, $tel);
        $stmt->fetch();

        if ($stmt->num_rows == 1) {

           if ($db_password == $password) {

                $_SESSION['user_id'] = $user_id;
                $_SESSION['idd'] = $user_id;
                $_SESSION['username'] = $username;
                $_SESSION['level'] = $level;
                $_SESSION['name'] = $fname.' '.$lname;
                $_SESSION['fname'] = $fname;
                $_SESSION['lname'] = $lname;
                $_SESSION['email'] = $email;

                $_SESSION['login_string'] = $password;
                return true;
            }

        } else {
            // No user exists.
            return false;
        }
    }
}

function login_check($mysqli) {
    // Check if all session variables are set 
    if (isset($_SESSION['user_id'], 
                        $_SESSION['username'], 
                        $_SESSION['login_string'])) {
 
        $user_id = $_SESSION['user_id'];
        $login_string = $_SESSION['login_string'];


        if ($stmt = $mysqli->prepare("SELECT password FROM members WHERE id = ? LIMIT 1")) {

            $stmt->bind_param('i', $user_id);
            $stmt->execute();
            $stmt->store_result();
 
            if ($stmt->num_rows == 1) {
                // If the user exists get variables from result.
                $stmt->bind_result($password);
                $stmt->fetch();
                $login_check = $password;
 
                if ($login_check == $login_string) {
                    // Logged In!!!! 
                    return true;
                } else {
                    // Not logged in 
                    return false;
                }
            } else {
                // Not logged in 
                return false;
            }
        } else {
            // Not logged in 
            return false;
        }
    } else {
        // Not logged in 
        return false;
    }
}



