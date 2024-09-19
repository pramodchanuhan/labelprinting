<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Form_Model extends CI_Model{


    public function insertRow($data_arr,$tbl){

        $this->db->insert($tbl,$data_arr);

        return $this->db->insert_id();

    }

    public function updateRow($data_arr,$tbl,$row_id){
        $result = $this->db->where('id', $row_id)->update($tbl, $data_arr);
          if(!empty($result)) {
              return $result;
          }
          else {return 0;}
  
      }



    public function updateRow2($data_arr,$tbl,$row_id){
        $result = $this->db->where('form_reg_id', $row_id)->update($tbl, $data_arr);
          if(!empty($result)) {
              return $result;
          }
          else {return 0;}
  
      }  




      public function updateRow3($data_arr,$tbl,$row_id){
        $result = $this->db->where('id', $row_id)->update($tbl, $data_arr);
          if(!empty($result)) {
              return $result;
          }
          else {return 0;}
  
      }  




      public function fetrecord($id) {

     $this->db->where('id' ,$id);
$q = $this->db->get("form_registration");
if($q->num_rows() > 0)
  {
     return $q->result();
   }
 return array();
  



}




 public function fetrecord2($id) {

     $this->db->where('form_reg_id' ,$id);
$q = $this->db->get("sabhasad");
if($q->num_rows() > 0)
  {
     return $q->result();
   }
 return array();
  



}



public function fetrecord3($id) {

     $this->db->where('form_reg_id' ,$id);
$q = $this->db->get("sachiv");
if($q->num_rows() > 0)
  {
     return $q->result();
   }
 return array();
  



}




public function fetrecord4($id) {

     $this->db->where('id' ,$id);
$q = $this->db->get("form_registration");
if($q->num_rows() > 0)
  {
     return $q->result();
   }
 return array();
  



}


public function fetrecord5($id) {

     $this->db->where('form_reg_id' ,$id);
$q = $this->db->get("form_registration2");
if($q->num_rows() > 0)
  {
     return $q->result();
   }
 return array();
  



}



public function fetrecord6($id) {

     $this->db->where('form_reg_id' ,$id);
$q = $this->db->get("form_registration3");
if($q->num_rows() > 0)
  {
     return $q->result();
   }
 return array();
  



}


public function fetrecord7($id) {

     $this->db->where('form_reg_id' ,$id);
$q = $this->db->get("documents");
if($q->num_rows() > 0)
  {
     return $q->result();
   }
 return array();
  



}




public function checkcemail($email){
$data=array(
'sansthechaemail'=>$email

);
$query=$this->db->where($data);
$login=$this->db->get('form_registration');
 if($login!=NULL){
return $login->row();
 }  
}



public function checkmobile($phone){
$data=array(
'durdhwanikramanka'=>$phone

);
$query=$this->db->where($data);
$login=$this->db->get('form_registration');
 if($login!=NULL){
return $login->row();
 }  
}






  
}