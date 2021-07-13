<?php

namespace Source\Models;

use Source\Database\Connect;

abstract class Model{
    //Cadastrar cliente
    public function insert() {
        
        if(!empty($_POST['name']) && !empty($_POST['email']) && !empty($_POST['password'])) {

            $name = $_POST['name'];
            $email = $_POST['email'];
            $password = $_POST['password'];

            $query = "INSERT INTO tb_client(nm_client, cd_email, cd_password) VALUES ('$name', '$email', '$password')";

            if(!(Connect::getInstance()->exec($query))){
                echo "
                    <div class='alert alert-danger'>
                        Não foi possível cadastrar!
                    </div>
                ";
            }
        }
    }

    //Buscar cliente
    public function fetch(){
        $data = null;
        $stmt = Connect::getInstance()->prepare("SELECT * FROM tb_client");

        $stmt->execute();
        $data = $stmt->fetchAll();

        return $data;
    }
}

?>