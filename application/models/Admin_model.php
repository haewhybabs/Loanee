<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_model extends CI_Model {

   public function get_loan_users(){
   	$this->db->select('*');
   	$this->db->order_by("id","DESC");
   	$this->db->from('loan_table');

   	 $query=$this->db->get();
          if ($query->num_rows()>0){
              foreach ($query->result() as $row){
                $data[]=$row;

              }
              return $data;

           }


   }
   public function record_count(){
   return $this->db->count_all("users");
 }

   public function get_allUsers(){
     $this->db->select('*');
     $this->db->from('users');
     return @ $this->db->get()->result();
   }
   public function get_userList($per_page,$page){
    $this->db->limit($per_page, $per_page*$page-$per_page);
     $this->db->select('*');
     $this->db->from('users');
     return @ $this->db->get()->result();
   }
   public function get_userDetails($id){
     $this->db->select('*');
     $this->db->where('id',$id);
     return @ $this->db->get('users')->result();
   }
   public function Loan_approve($userid,$id){
     $this->db->set('status','2');
     $this->db->where('user_id',$userid);
     $this->db->where('id',$id);
     $this->db->update('loan_table');

   }
   public function Loan_unapprove($userid,$id){
     $this->db->set('status','3');
     $this->db->where('user_id',$userid);
     $this->db->where('id',$id);
     $this->db->update('loan_table');

   }
   public function adminClear($id){
     $this->db->set('admin_delete','1');
     $this->db->where('id',$id);
     $this->db->update('loan_table');
   }
   public function Save_approve($userid,$id){
     $this->db->set('status','2');
     $this->db->where('user_id',$userid);
     $this->db->where('id',$id);
     $this->db->update('saving_table');

   }
   public function RSave_approve($userid,$id){
     $this->db->set('status','2');
     $this->db->where('user_id',$userid);
     $this->db->where('id',$id);
     $this->db->update('real_saving');

   }
   public function Save_unapprove($userid,$id){
     $this->db->set('status','3');
     $this->db->where('user_id',$userid);
     $this->db->where('id',$id);
     $this->db->update('saving_table');

   }
   public function RSave_unapprove($userid,$id){
     $this->db->set('status','3');
     $this->db->where('user_id',$userid);
     $this->db->where('id',$id);
     $this->db->update('real_saving');

   }
   public function adminClearSave($id){
     $this->db->set('admin_delete','1');
     $this->db->where('id',$id);
     $this->db->update('saving_table');
   }
   public function adminClearRSave($id){
     $this->db->set('admin_delete','1');
     $this->db->where('id',$id);
     $this->db->update('real_saving');
   }
   public function getSavingsWithdrawal(){
     $this->db->select('*');
     $this->db->order_by('id','DESC');
     $this->db->from('saving_table');
     $query=$this->db->get();
          if ($query->num_rows()>0){
              foreach ($query->result() as $row){
                $data[]=$row;

              }
              return $data;

           }
   }
   public function getRsavingsWithdrawal(){
     $this->db->select('*');
     $this->db->order_by('id','DESC');
     $this->db->from('real_saving');
     $query=$this->db->get();
          if ($query->num_rows()>0){
              foreach ($query->result() as $row){
                $data[]=$row;

              }
              return $data;

           }
   }
   public function saveEarning($data){
     $this->db->set($data);
     $this->db->update('earning_table');
   }
  public function getMonthPercentage(){
       $this->db->select('*');
        return @ $this->db->get('earning_table')->result();
  }
  public function getAllpayment(){
    /*
    $this->db->select('*');
    $this->db->where('status', '2');
    $this->db->where('amount_type','1');
    $this->db->order_by('id','DESC');
    $this->db->limit('1');
    return @ $this->db->get('saving_table')->result();
  }*/
//WOW//
  $this->db->select('MAX(id)')
       ->from('saving_table');
       $this->db->where('status', '2');
       $this->db->where('amount_type','1')
       ->group_by('user_id');
$subquery = $this->db->get_compiled_select();

$this->db->select('*');
  $this->db->from('saving_table');
$this->db->where("id  IN($subquery)", NULL, FALSE);

   return @ $this->db->get()->result();

}

  public function Payuser($c,$id){
    $this->db->set('is_paid', $c);
    $this->db->where('id',$id);
    $this->db->update('saving_table');
  }
  public function getIsPaid($id){
    $this->db->select('is_paid');
    $this->db->where('id',$id);
    $result=$this->db->get('saving_table')->row();
    return @ $result->is_paid;
  }
  public function login($password,$email){
    $query=$this->db->where(['email'=>$email,'password'=>$password])
                ->get('admin');

      if ($query->num_rows()>0){

       return $query->row();

       }
  }
  public function addAdmin($data){
   return $this->db->insert('admin',$data);
  }
}
