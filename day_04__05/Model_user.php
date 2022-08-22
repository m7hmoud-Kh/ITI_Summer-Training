<?php
require_once './db.php';
require_once './Interface_Model.php';
class User implements Model
{

    private $con;
    
    public function __construct()
    {
        $this->con = DbConnection::connect();
    }

    public function store($data){
        $stmt = $this->con->prepare('INSERT INTO users (`name`,email,job_title,city,country) VALUES (?,?,?,?,?)');
        $stmt->execute(array(
            $data['name'],
            $data['email'],
            $data['job_title'],
            $data['city'],
            $data['country']
        ));
        return $stmt->rowCount();
    }
    public function retrive(){
        $stmt = $this->con->prepare('SELECT * FROM users');
        $stmt->execute(array());
        return $stmt->fetchAll();
    }
    public function update($data){
        $stmt = $this->con->prepare('UPDATE users SET `name` =  ? , email = ? , job_title = ? , country = ? , city = ? WHERE id = ?');
        $stmt->execute(array(
            $data['name'],
            $data['email'],
            $data['job_title'],
            $data['country'],
            $data['city'],
            $data['id'],
        ));
        return $stmt->rowCount();
    }
    public function delete($id){
        $stmt = $this->con->prepare('DELETE FROM users WHERE id = ?');
        $stmt->execute(array($id));
        return $stmt->rowCount();
    }


    function get_contact_by_id($id){
        $stmt = $this->con->prepare('SELECT * FROM users WHERE id = ?');
        $stmt->execute(array($id));
        return $stmt->fetch();
    }
}































// function add_contact($data){
//     global $con;
//     $stmt = $con->prepare('INSERT INTO users (`name`,email,job_title,city,country) VALUES (?,?,?,?,?)');
//     $stmt->execute(array(
//         $data['name'],
//         $data['email'],
//         $data['job_title'],
//         $data['city'],
//         $data['country']
//     ));
//     return $stmt->rowCount();
// }

// function get_all_contact(){
//     global $con;
//     $stmt = $con->prepare('SELECT * FROM users');
//     $stmt->execute(array());
//     return $stmt->fetchAll();
// }

// function get_contact_by_id($id){
//     global $con;
//     $stmt = $con->prepare('SELECT * FROM users WHERE id = ?');
//     $stmt->execute(array($id));
//     return $stmt->fetch();
// }

// function update_contact($data){
//     global $con;
//     $stmt = $con->prepare('UPDATE users SET `name` =  ? , email = ? , job_title = ? , country = ? , city = ? WHERE id = ?');
//     $stmt->execute(array(
//         $data['name'],
//         $data['email'],
//         $data['job_title'],
//         $data['country'],
//         $data['city'],
//         $data['id'],
//     ));
//     return $stmt->rowCount();

// }

// function delete_contact($id){
//     global $con;
//     $stmt = $con->prepare('DELETE FROM users WHERE id = ?');
//     $stmt->execute(array($id));
//     return $stmt->rowCount();
// }