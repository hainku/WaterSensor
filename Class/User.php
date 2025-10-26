<?php
require_once'Database.php';
Class User extends Database{
    public function login($un,$pw){
        $sql="select * from tbluser where Username='$un' and Password='$pw'";
        $data=$this->conn->query($sql);
        return $data;
    }
    public function add($ln,$fn,$mn,$hn,$street,$purok,$contact,$hh){
        $random = substr(str_shuffle("0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz"), 0, 5);
        $hnum='K-'.date("ymdHis").'-'.$purok.'-'.$random;
        try{
            $sql="select * from tblresident where LastName='$ln'and FirstName='$fn' and HouseNumber='$hn'";
            $data=$this->conn->query($sql);
            if($data->num_rows==0){
                $sql="insert into tblresident values(NULL,'$hnum','$ln','$fn','$mn','$hn','$street','$purok','$contact','$hh')";
                if($this->conn->query($sql)){
                    return[
                            'success'=>true,
                            'message'=>'Resident Information Saved!',
                            'icon'=>'success'
                        ];
                }else{
                    return $this->conn->error;
                    return[
                        'success'=>false,
                        'message'=>$this->conn->error,
                        'icon'=>'error'
                    ];
                }
            }else{
                return[
                        'success'=>false,
                        'message'=>'Resident Information Already Exist!',
                        'icon'=>'warning'
                    ];
            }
        }catch(mysqli_sql_exception $e){
            return [
                'success'=>false,
                'message'=>$e->getMessage(), 
                'icon'=>'error'
            ];
        }
        
    }
    public function adduser($ln,$fn,$mn,$contact,$address,$role){
        $random = substr(str_shuffle("0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz"), 0, 5);
        $idnum='U-'.date("ymdHis").'-'.$random;
        try{
            $sql="select * from tblinfo where LastName='$ln'and FirstName='$fn'";
            $data=$this->conn->query($sql);
            if($data->num_rows==0){
                $sql="insert into tblinfo values(NULL,'$idnum','$ln','$fn','$mn','$contact','$address','$role');";
                $sql.="insert into tbluser values(NULL,'$idnum','$idnum','$ln','$role',1)";
                if($this->conn->multi_query($sql)){
                    return[
                            'success'=>true,
                            'message'=>'User Information Saved!',
                            'icon'=>'success'
                        ];
                }else{
                    return $this->conn->error;
                    return[
                        'success'=>false,
                        'message'=>$this->conn->error,
                        'icon'=>'error'
                    ];
                }
            }else{
                return[
                        'success'=>false,
                        'message'=>'User Information Already Exist!',
                        'icon'=>'warning'
                    ];
            }
        }catch(mysqli_sql_exception $e){
            return [
                'success'=>false,
                'message'=>$e->getMessage(), 
                'icon'=>'error'
            ];
        }
        
    }
    public function updateuser($idnum,$ln,$fn,$mn,$hn,$street,$purok,$contact,$hh){
        $sql="update tblresident set LastName='$ln',FirstName='$fn',MiddleName='$mn',HouseNumber='$hn',Street='$street',Purok='$purok',ContactNo='$contact',HouseholdHead='$hh' where ResidentID='$idnum'";
        if($this->conn->query($sql)){
            return[
                    'success'=>true,
                    'message'=>'Resident Information Updated!',
                    'icon'=>'success'
                ];
        }else{
            return $this->conn->error;
            return[
                    'success'=>false,
                    'message'=>$this->conn->error,
                    'icon'=>'error'
                ];
        }
        
    }
    public function deleterecord($idnum){
        $sql="delete from tblresident where ResidentID='$idnum'";
        if($this->conn->query($sql)){
            return[
                    'success'=>true,
                    'message'=>'Resident Information Deleted!',
                    'icon'=>'success'
                ];
        }else{
            return $this->conn->error;
            return[
                    'success'=>false,
                    'message'=>$this->conn->error,
                    'icon'=>'error'
                ];
        }
    }
    public function searchresident($idnum){
        $sql="select * from tblresident where ResidentID='$idnum'";
        $data=$this->conn->query($sql);
        return $data;
    }
    public function displayresident(){
        $sql="select * from tblresident order by LastName,HouseNumber,FirstName";
        $data=$this->conn->query($sql);
        return $data;
    }
    public function displayuser(){
        $sql="select i.*,u.Status from tblinfo i inner join tbluser u on i.UserID=u.UserID order by i.LastName";
        $data=$this->conn->query($sql);
        return $data;
    }
    public function residentcount(){
        $sql="select count(*) as residentcount from tblresident";
        $data=$this->conn->query($sql);
        $row=$data->fetch_assoc();
        return $row['residentcount'];
    }
    public function householdcount(){
        $sql="select count(distinct(HouseNumber)) as householdcount from tblresident";
        $data=$this->conn->query($sql);
        $row=$data->fetch_assoc();
        return $row['householdcount'];
    }
    public function usercount(){
        $sql="select count(*) as usercount from tblinfo i inner join tbluser u on i.UserID =u.UserID where i.Role !='admin' and u.Status=1";
        $data=$this->conn->query($sql);
        $row=$data->fetch_assoc();
        return $row['usercount'];
    }
    public function displayuserbyid($userid){
        $sql="select i.*,u.Username,u.Password,u.Role from tblinfo i inner join tbluser u on u.UserID=i.UserID where i.UserID='$userid'";
        $data=$this->conn->query($sql);
        return $data;
    }
}
?>