<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mymod extends CI_Model{

    public function cekadminlogin($user_username,$user_password){
        $res=$this->db->query("SELECT * FROM user WHERE user_username='$user_username' AND user_password=md5('$user_password')");
        return $res;
    }

    public function ViewDetail($table,$where,$data){
        $this->db->select('*');
        $this->db->where($where,$data);
        $res = $this->db->get($table);
        return $res->row_array();
    }

    public function ViewDataOrWhere($table,$where,$orwhere){
        $this->db->where($where)->or_where($orwhere);
        $res = $this->db->get($table);
        return $res->row_array();
    }

    public function ViewDataWhere($table,$where){
        $this->db->select('*');
        $res=$this->db->get_where($table,$where);
        return $res->result();
    }
    public function get($table){
        $res=$this->db->get($table);
        return $res->result();
    }
    public function get_last_row($table, $cond = '', $order_by = null)
    {
        if (is_array($cond))
            $this->db->where($cond);
        if (is_string($cond) && strlen($cond) > 3)
            $this->db->where($cond);
        if ($order_by != null)
            $this->db->order_by($order_by, 'DESC');
        $this->db->limit(1);
        $query = $this->db->get($table);

        return $query->row();
    }   

    public function data($table,$number,$offset){
        return $query = $this->db->get('produk',$number,$offset)->result_array();      
    }

    public function order_by_rand($table){
        $this->db->order_by('rand()');
        $this->db->limit(1);
        $res = $this->db->get($table);
        return $res->row_array();
    }

    public function CekDataRows($table,$where){
        $res=$this->db->get_where($table,$where);
        return $res;
    }
    public function ViewNumRows($table,$where,$data){
        $this->db->select('*');
        $this->db->where($where,$data);
        $res = $this->db->get($table);
        return $res->num_rows();
    }

    public function InsertData($table,$data){
        $res = $this->db->insert($table, $data);
        return $res;
    }

    public function UpdateData($table, $data, $where){
        $res = $this->db->update($table, $data, $where);
        return $res;
    }


    public function DeleteData($where,$table){
        $this->db->where($table);
        $res = $this->db->delete($where);
        return $res;
    }

    public function GetDataJoin($table,$where){
        $i=1;
        foreach($table as $table_name=>$table_id){ 
            ${'table'.$i}=$table_name;
            ${'t'.$i.'id'}=$table_id;
            $i++;
        }

        $this->db->select('*');
        $this->db->from(''.$table1.' t1');
        $this->db->join(''.$table2.' t2','t1.'.$t1id.'=t2.'.$t2id);
        $this->db->where($where);
        $res = $this->db->get();
        return $res;
    }

    public function GetDataJoinlimit($table,$where){
        $i=1;
        foreach($table as $table_name=>$table_id){ 
            ${'table'.$i}=$table_name;
            ${'t'.$i.'id'}=$table_id;
            $i++;
        }

        $this->db->select('*');
        $this->db->from(''.$table1.' t1');
        $this->db->join(''.$table2.' t2','t1.'.$t1id.'=t2.'.$t2id);
        $this->db->where($where);
        $this->db->limit('4');
        $res = $this->db->get();
        return $res;
    }

    public function GetDataJoinArr($table,$where){
        $i=1;
        foreach($table as $table_name=>$table_id){ 
            ${'table'.$i}=$table_name;
            ${'t'.$i.'id'}=$table_id;
            $i++;
        }

        $this->db->select('*');
        $j=1;
        foreach($table as $table_name=>$table_id){ 
            if($j==1){$this->db->from(''.$table1.' t1');} else {
                $this->db->join(''.${'table'.$j}.' t'.$j,'t1.'.${'t'.$j.'id'}.'=t'.$j.'.'.${'t'.$j.'id'});
            }
            $j++;
        }
        $this->db->where($where);
        $res = $this->db->get();
        return $res;
    }
    public function GetDataJoinNW($table,$type){
        $i=1;
        foreach($table as $table_name=>$table_id){ 
            ${'table'.$i}=$table_name;
            ${'t'.$i.'id'}=$table_id;
            $i++;
        }

        $this->db->select('*');
        $this->db->from(''.$table1.' t1');
        $this->db->join(''.$table2.' t2','t1.'.$t1id.'=t2.'.$t2id,$type);
        $res = $this->db->get();
        return $res->result();
    }


    public function get_antrian_num($tgl,$where){
        if($where == ''){
            $res = $this->db->query("SELECT * from booking where (booking_tanggal IN ('$tgl')) and (booking_status='menunggu' OR booking_status='proses')  order by booking_antrian  desc limit 1")->result();   
        } else {
            $res = $this->db->query("SELECT * from booking where (booking_tanggal IN ('$tgl')) and (booking_status='menunggu' OR booking_status='proses') and (user_id = '$where')  order by booking_antrian  desc limit 1")->result();
        }
        return $res;
    }

    public function antrian($tgl)
    {
        $res = $this->db->query("SELECT * from booking left join user on booking.user_id=user.user_id where (booking.booking_tanggal IN ('$tgl')) and (booking.booking_status='menunggu' OR booking.booking_status='proses')  order by booking.booking_antrian  asc")->result();   
        return $res;
    }

    public function antrian_last($tgl)
    {
        $res = $this->db->query("SELECT MAX(booking_antrian) as max_num FROM booking inner join pickup on booking.booking_kode=pickup.booking_kode where booking.booking_tanggal='$tgl'")->result();   
        return $res;
    }


    public function getpick()
    {
        $res = $this->db->query("SELECT * FROM `pickup` ORDER BY `pickup`.`pickup_est_selesai` DESC limit 1")->result();
        return $res;
    }
    public function recent($uid)
    {
        $res = $this->db->query("SELECT * from booking 
            LEFT JOIN transaksi ON
            booking.booking_kode=transaksi.booking_kode
            where 
            (booking.user_id IN ('$uid')) 
            and 
            (booking.booking_status='selesai' OR booking.booking_status='batal')  
            order by booking.booking_antrian  desc limit 5")->result();
        return $res;
    }
    public function history($uid)
    {
        if ($uid == '') {
            $res = $this->db->query("SELECT * from transaksi 
                right JOIN booking ON
                booking.booking_kode=transaksi.booking_kode
                where 
                (booking.booking_status='selesai' OR booking.booking_status='batal')  
                order by booking.booking_antrian  desc")->result();

            return $res;
        } else {
            $res = $this->db->query("SELECT * from transaksi 
                right JOIN booking ON
                booking.booking_kode=transaksi.booking_kode
                where 
                (booking.user_id IN ('$uid')) 
                and 
                (booking.booking_status='selesai' OR booking.booking_status='batal')  
                order by booking.booking_antrian  desc")->result();
            return $res;
        }

    }
}
