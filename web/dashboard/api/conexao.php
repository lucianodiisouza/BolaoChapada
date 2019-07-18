<?php
    abstract class Conexao{
        protected function conectaDB(){
            try{
                $con=new PDO("mysql:host=localhost;dbname=bolaochapada","root", "");
                return $con;
            }catch(PDOException $erro){
                return $erro->getMessage();
            }
        }
    }
?>