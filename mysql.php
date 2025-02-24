<?php

class mySQL

{
    protected $db_name = "bluesaf";
    protected $db_user = "root";
    protected $db_pass = "chanaka";
    protected $db_host = "localhost";

    public function execute($sql) {
        $con = new mysqli( $this->db_host, $this->db_user, $this->db_pass, $this->db_name );
        mysqli_set_charset($con,"utf8");
        if ( mysqli_connect_errno() ) {
            printf("Connection failed: %s\ ", mysqli_connect_error());
            exit();
        }
        $result=mysqli_query($con,$sql);
        return $result;
    }
}