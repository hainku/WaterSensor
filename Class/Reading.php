<?php
date_default_timezone_set("Asia/Manila");
require_once'Database.php';
Class Reading extends Database{
    public function save($level){
        $time=date("Y-m-d H:i:s");
        $sql="insert into tblreadings values(NULL,?,?)";
        $stmt=$this->conn->prepare($sql);
        $stmt->bind_param('ss',$level,$time);
        $res=$stmt->execute();
        $error=$stmt->error;
        return $res ? ['success'=>true,'message'=>'success']:['success'=>false,'message'=>$error];
    }
    public function showhistory($d1,$d2){
        $sql="SELECT 
            DATE(ReadingTime) AS reading_date,
            MIN(Reading) AS lowest_reading,
            MAX(Reading) AS highest_reading
            FROM tblreadings
            WHERE ReadingTime BETWEEN ? AND ?
            GROUP BY DATE(ReadingTime)
            ORDER BY reading_date ASC";

        $stmt=$this->conn->prepare($sql);
        $stmt->bind_param('ss',$d1,$d2);
        $stmt->execute();
        $data=$stmt->get_result();
        return $data;
    }
}
?>