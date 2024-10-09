<?php

class Cliente {
    private $conexao;
    private $id;
    private $nome;
    private $telefone;
    private $email;
    private $cpf;

    public function __construct($db) {
        $this->conexao = $db;
       
    }
    public function setNome($nome){
        $this->nome = $nome;
    }

    public function setCPF($cpf){
        $this->cpf = $cpf;
    }

    public function setTelefone($telefone){
        $this->telefone = $telefone;
    }

    public function setEmail($email){
        $this->email= $email;
    }
    
    public function create() {
        $query = "INSERT INTO cliente SET nome=:nome, telefone=:telefone, email=:email, cpf=:cpf";
        $stmt = $this->conexao->prepare($query);

        $stmt->bindParam(":nome", $this->nome);
        $stmt->bindParam(":telefone", $this->telefone);
        $stmt->bindParam(":email", $this->email);
        $stmt->bindParam(":cpf", $this->cpf);

        if ($stmt->execute()) {
            return true;
        }
        return false;
    }

    public function read() {
        $query = "SELECT * FROM cliente";
        $stmt = $this->conexao->prepare($query);
        $stmt->execute();

        return $stmt;
    }

    public function delete() {
            $query = "DELETE FROM cliente WHERE id=:id";
            $stmt = $this->conexao->prepare($query);

            $stmt->bindParam(":id", $this->id);

            if ($stmt->execute()) {
                return true;
            }
            return false;
    } 


    public function update() {
        $query = "UPDATE cliente SET nome=:nome, telefone=:telefone, email=:email, cpf=:cpf WHERE id=:id";
        $stmt = $this->conexao->prepare($query);

        $stmt->bindParam(":nome", $this->nome);
        $stmt->bindParam(":telefone", $this->telefone);
        $stmt->bindParam(":email", $this->email);
        $stmt->bindParam(":cpf", $this->cpf);
        $stmt->bindParam(":id", $this->id);

        if ($stmt->execute()) {
            return true;
        }
        return false;
    }

   


    public function setId($id){
        $this->id = $id;
    }
    public function getId(){
        return $this->id;
    }
    public function getNome($nome){
       return $this->nome;
    }

    public function consultar(){
        $query = "SELECT * FROM cliente WHERE id=:id";
        $stmt = $this->conexao->prepare($query);
        $stmt->bindParam(":id", $this->id);
        $stmt->execute();
         return $stmt;
    }
}
?>
