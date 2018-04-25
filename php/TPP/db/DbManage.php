<?php

class DbManage{
    private $conn;

    /**
     * @param $sqlTxts
     */
    public function executeSqlTxts($sqlTxts){
    $this->conn = mysqli_connect("127.0.0.1","root","","tpp")or die("失败" .mysqli_error());
        $this->conn->autocommit(false);
        for ($i = 0;$i < count($sqlTxts); $i++){
            $result = mysqli_query($this->conn,$sqlTxts[$i]);
        }
        $result = $this->conn->commit();
        if($result == false){
            $this->conn->rollback();
        }

        return $result;

    }

    public function executeSqlTxt($sqlTxts){
        $this->conn = mysqli_connect("127.0.0.1","root","","tpp")or die("失败".mysqli_error());
        $result = mysqli_query($this->conn, $sqlTxts);

        return $result;

    }

    public function closeConnection($result){
        mysqli_free_result($result);
        mysqli_close($this->conn);
    }
}