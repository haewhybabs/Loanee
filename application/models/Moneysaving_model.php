<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Moneysaving_model extends CI_Model {

    public function register($data){

      return $this->db->insert('users',$data);
    }
    public function login($password,$email){
      $query=$this->db->where(['email'=>$email,'password'=>$password])
                  ->get('users');

        if ($query->num_rows()>0){

         return $query->row();

         }
    }
    public function confirm_email($email){
      $query=$this->db->where('email',$email)
                ->get('users');
          if ($query->num_rows()>0){
             return $query->row();
          }
    }
      public function select_password($password,$username){
      $query=$this->db->where(['username'=>$username,'password'=>$password])
                  ->get('users');

        if ($query->num_rows()>0){

         return $query->row();

         }
    }

    public function update_password($new_pass,$id){
      $this->db->set('password',$new_pass);
     $this->db->where('id',$id);
     $this->db->update('users');


    }
    public function loanrequest($data){

      return $this->db->insert('loan_table',$data);
    }

    public function saving_money($data){

    	return $this->db->insert('saving_table',$data);

    }
     public function sum_amount($id){

      $this->db->select_sum('amount');
      $this->db->where('user_id', $id);
      $this->db->where('status', '2');
      $this->db->where('amount_type','1');
      $result = $this->db->get('saving_table')->row();
       return @ $result->amount;


    }
    public function sum_Ramount($id){

     $this->db->select_sum('amount');
     $this->db->where('user_id', $id);
     $this->db->where('status', '2');
     $this->db->where('amount_type','1');
     $result = $this->db->get('real_saving')->row();
      return @ $result->amount;


   }

    public function get_withdraw($id){
      $this->db->select_sum('amount');
      $this->db->where('user_id',$id);
      $this->db->where('amount_type','2');
      $this->db->where('status', '2');
      $result= $this->db->get('saving_table')->row();
      return @ $result->amount;
    }
    public function get_Rwithdraw($id){
      $this->db->select_sum('amount');
      $this->db->where('user_id',$id);
      $this->db->where('amount_type','2');
      $this->db->where('status', '2');
      $result= $this->db->get('real_saving')->row();
      return @ $result->amount;
    }
    public function get_profile_user($id){
      $this->db->select('*');
      $this->db->where('user_id',$id);
       $this->db->order_by('id', 'DESC');
        $this->db->limit('1');
        $this->db->distinct();
      return @ $this->db->get('profile_table')->result();

    }
    public function get_date($id){
      $this->db->select('*');
      $this->db->where('user_id', $id);
      $this->db->where('status', '2');
      $this->db->or_where('status','3');
      $this->db->distinct();
      return @ $this->db->get('saving_table')->row('date');


    }
    public function get_user_data($id){
      $this->db->select('*');
      $this->db->where('id',$id);
      $this->db->from('users');
      $this->db->distinct();
      $query=$this->db->get();
      if ($query->num_rows()>0){
              foreach ($query->result() as $row){
                $data[]=$row;

              }
              return $data;

           }

           return false;
    }

      public function get_users($id){
      $this->db->select('*');
      $this->db->where('id',$id);
      $this->db->from('users');
      $this->db->distinct();
      $query=$this->db->get();
      if ($query->num_rows()>0){
              foreach ($query->result() as $row){
                $data[]=$row;

              }
              return $data;

           }

           return false;
    }
    public function fetch_bank($id){

       $this->db->select('*');
       $this->db->where('user_id',$id);
       $this->db->limit('1');
       $this->db->order_by('id','DESC');
       $query=$this->db->get('bank_details');
         if ($query->num_rows()>0){
              foreach ($query->result() as $row){
                $data[]=$row;

              }
              return $data;

           }

           return false;
    }

       public function cleareach($id){
    	$this->db->set('is_delete', '1');
        $this->db->where('id', $id);
    	$this->db->update('loan_table');

    }
    public function savedata($data,$id){
      $this->db->insert('bank_details', $data);
    }

    public function update_image($image,$id){

      $this->db->set('image', $image);
      $this->db->where('id',$id);
      $this->db->update('users');
    }
    public function profile_upload($data){
      $this->db->insert('profile_table', $data);
    }
       public function check_status($id){
       $this->db->select('*');
       $this->db->where('user_id', $id);
       $this->db->where('loan_type','1');
       $this->db->or_where('loan_type','2');
       $this->db->order_by('id','DESC');
       $query=$this->db->get('loan_table')->result();
       return $query;



    }

    public function get_total_info($data){
    	$query= $this->db->insert('earning_table',$data);

    }
    public function input_loan_payment($data){
    	return $this->db->insert('loan_payment',$data);

    }
    public function check_save_payment($id){
    	$this->db->select('*');
    	$this->db->where('user_id',$id);
    	$this->db->where('amount_type','1');
    	$this->db->or_where('amount_type','2');
      $this->db->order_by('id','DESC');
    	return $this->db->get('saving_table')->result();



    }

    public function check_Rsave_payment($id){
      $this->db->select('*');
      $this->db->where('user_id',$id);
      $this->db->where('amount_type','1');
      $this->db->or_where('amount_type','2');
      $this->db->order_by('id','DESC');
      return $this->db->get('real_saving')->result();



    }

     public function cleareach2($id){
    	$this->db->set('is_delete', '1');
      $this->db->where('id', $id);
    	$this->db->update('saving_table');

    }
    public function clearSave($id){
     $this->db->set('user_delete', '1');
     $this->db->where('id', $id);
     $this->db->update('real_saving');

   }
    public function get_loan_confirmed($id){
    	$this->db->select_sum('amount');
    	$this->db->where('user_id', $id);
    	$this->db->where('status','2');
    	$this->db->where('loan_type','2');
      $result= $this->db->get('loan_table')->row();
    	return @$result->amount;
    }
    public function get_loanpay($id){
    	$this->db->select_sum('amount');
    	$this->db->where('user_id',$id);
    	$this->db->where('status','2');
    	$this->db->where('loan_type','1');
    	$result= $this->db->get('loan_table')->row();
    	return @$result->amount;
    }
  public function Rsaving_money($data){
     return $this->db->insert('real_saving',$data);
  }
}
