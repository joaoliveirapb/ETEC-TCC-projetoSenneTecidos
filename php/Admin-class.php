<?php
    class Admin {
        public function login($email, $senha) {
            global $pdo;

            $sql = "SELECT * FROM tb_admin WHERE email = :email AND senha = :senha";
            $sql = $pdo->prepare($sql);
            $sql->bindValue("email", $email);
            $sql->bindValue("senha", md5($senha));
            $sql->execute();

            if($sql->rowCount() > 0) {
                $dado = $sql->fetch();

                $_SESSION['idAdmin'] = $dado['id_admin'];

                return true;
            } else {
                return false;
            }
        }

        public function logged($id) {
            global $pdo;

            $array = array();

            $sql = "SELECT email FROM tb_admin WHERE id_admin = :id_admin";
            $sql = $pdo->prepare($sql);
            $sql->bindValue("id_admin", $id);
            $sql->execute();

            if($sql->rowCount() > 0) {
                $array = $sql->fetch();
            }

            return $array;
        }

        public function buscarDados() {
            $res = array();
            $cmd->this->pdo->query("SELECT * FROM tb_produtos ORDER BY nome");
            $res = $cmd->fetchAll(PDO::FETCH_ASSOC);
            return $res;
        }

        public function excluir($id) {
            $cmd->this->pdo->prepare("DELETE FROM tb_produtos WHERE id_produtos= :id");
            $cmd->bindValue(":id", $id);
            $cmd->execute();
        }
    }
?>