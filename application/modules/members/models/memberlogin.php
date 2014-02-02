<?php
class memberlogin extends CI_Model
{

    function __construct()
    {
       parent:: __construct();

    }

    function verifylogin($email,$password,$verified)
    {
        $query = $this->db->query("select * from bf_members where email='$email' and pswd='" . $password . "' and verified=".$verified);
        return $query->row(0);
    }
    function verifytoken($email,$token)
    {
        //$query = $this->db->query("select * from bf_members where email='$email' and token='$token'");
        $query = $this->db->query("select * from bf_members where token='$token'");
        return $query->row(0);
    }

    
}