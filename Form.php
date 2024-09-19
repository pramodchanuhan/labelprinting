<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Form extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('Form_Model');
    }

    public function index()
    {
        $this->load->view('Addhotelform');
    }


public function login()
    {
        $this->load->view('vw_login');
    }


 public function logout() {

$this->session->unset_userdata('insertedid', '');
$this->session->unset_userdata('formstatus', '');
$this->session->unset_userdata('adminstatus', '');
redirect(base_url() . 'form/login');
}

 public function LoginAction() {
            
                $email=$this->input->post('email');
                $this->load->model('Bussiness_Model');
                $validate=$this->Bussiness_Model->madminlogin($email);
                
               
                if($validate){

                $formstatus=$validate->status;   
                $adminstatus=$validate->adminstatus;   

              

                 $this->session->set_userdata('insertedid', $validate->id);    
                 $this->session->set_userdata('fname',$validate->email);
                 $this->session->set_userdata('formstatus',$formstatus);
                 $this->session->set_userdata('adminstatus',$adminstatus);

                if($adminstatus=="approved"){ redirect(base_url() . 'form/Dashboard7');}
                
                else{

                    redirect(base_url() . 'form/Dashboard2');
                }
                
            
                } 

                else{


                 $data = array('sansthechaemail' => $email);
                 $check_email = $this->db->get_where('form_registration', $data)->row();

        if ($check_email) {
          
            $this->session->set_flashdata('error', 'Incorrect password. Please try again.');
        } else {
           
            $this->session->set_flashdata('error', 'Incorrect email. Please try again.');
        }
                redirect(base_url() . 'form/login');
                }

    }


public function introduction() 
{
   
   


   

    $title = "Admin Dashboard";
    $data['title'] = $title;
  
   $this->load->view('introduction', $data);
  
   
}


    public function Dashboard2() 
{
   
    $id=$this->session->userdata('insertedid'); 


   

    $title = "Admin Dashboard";
    $data['title'] = $title;

   $this->load->model('Form_Model');
     $data['recordss']=$this->Form_Model->fetrecord($id);
     $data['sabhasads']=$this->Form_Model->fetrecord2($id);
     $data['sachivs']=$this->Form_Model->fetrecord3($id);
     $data['recordsss']=$this->Form_Model->fetrecord4($id);
     $data['recordssss']=$this->Form_Model->fetrecord5($id);
     $data['recordsssss']=$this->Form_Model->fetrecord6($id);
     $data['documents']=$this->Form_Model->fetrecord7($id);
  
   $this->load->view('form1', $data);
  
   
}

    public function addform()
    {  


    $rowid=$this->input->post('id');


   

    if($rowid==''){



    $email=$this->input->post('sansthechaemail');
    $phone=$this->input->post('durdhwanikramanka');
   

    $this->load->model("Form_Model");
    $validateemail=$this->Form_Model->checkcemail($email);
    $validatemobile=$this->Form_Model->checkmobile($phone);
    
    if($validateemail){
       
       

  $this->session->set_flashdata('success', 'Email already exists, please try again with a new email');

    // Include Bootstrap CSS link
    echo '<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">';

    echo '<div class="modal" tabindex="-1" role="dialog" id="customAlert">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Alert</h5>
                        
                    </div>
                    <div class="modal-body">
                        <p>Continue Registration बटणावर क्लिक करा कारण तुमचा ईमेल आयडी अस्तित्वात आहे</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary" onclick="window.location.href=\''.base_url().'Form/Login\';">Continue Registration</button>
                    </div>
                </div>
            </div>
        </div>';

    // Include jQuery and Bootstrap JS links
    echo '<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>';
    echo '<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>';
    echo '<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>';

    echo '<script>$("#customAlert").modal("show");</script>';
    exit();

    }

    // elseif($validatemobile) {
      

    //     echo '<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">';

    // echo '<div class="modal" tabindex="-1" role="dialog" id="customAlert">
    //         <div class="modal-dialog" role="document">
    //             <div class="modal-content">
    //                 <div class="modal-header">
    //                     <h5 class="modal-title">Alert</h5>
                        
    //                 </div>
    //                 <div class="modal-body">
    //                     <p>Continue Registration बटणावर क्लिक करा कारण तुमचा Mobile Number अस्तित्वात आहे</p>
    //                 </div>
    //                 <div class="modal-footer">
    //                     <button type="button" class="btn btn-primary" onclick="window.location.href=\''.base_url().'Form/Login\';">Continue Registration</button>
    //                 </div>
    //             </div>
    //         </div>
    //     </div>';

    // // Include jQuery and Bootstrap JS links
    // echo '<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>';
    // echo '<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>';
    // echo '<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>';

    // echo '<script>$("#customAlert").modal("show");</script>';
    // exit();
    // }




    else {



        $config['upload_path'] = 'documents';
        $config['allowed_types'] = '*';
        $config['max_size'] = 800000000;
        $config['max_width'] = 102400000;
        $config['max_height'] = 768000000;
        $this->load->library('upload');
        $this->upload->initialize($config);
        $this->upload->do_upload('document15');
        $file_extension = pathinfo($_FILES['document15']['name'], PATHINFO_EXTENSION);
        $random_filename = uniqid() . '.' . $file_extension;

        // Move the uploaded 'document15' file with the new filename
        $new_path = $config['upload_path'] . '/' . $random_filename;
        move_uploaded_file($_FILES['document15']['tmp_name'], $new_path);

        $file_name15 = base_url() . $new_path;



        $config['upload_path'] = 'documents';
        $config['allowed_types'] = '*';
        $config['max_size'] = 800000000;
        $config['max_width'] = 102400000;
        $config['max_height'] = 768000000;
        $this->load->library('upload');
        $this->upload->initialize($config);
        $this->upload->do_upload('document4');
        $file_extension = pathinfo($_FILES['document4']['name'], PATHINFO_EXTENSION);
        $random_filename = uniqid() . '.' . $file_extension;

        // Move the uploaded 'document4' file with the new filename
        $new_path = $config['upload_path'] . '/' . $random_filename;
        move_uploaded_file($_FILES['document4']['tmp_name'], $new_path);

        $file_name4 = base_url() . $new_path;


        $config['upload_path'] = 'documents';
        $config['allowed_types'] = '*';
        $config['max_size'] = 800000000;
        $config['max_width'] = 102400000;
        $config['max_height'] = 768000000;
        $this->load->library('upload');
        $this->upload->initialize($config);
        $this->upload->do_upload('document5');
         $file_extension = pathinfo($_FILES['document5']['name'], PATHINFO_EXTENSION);
        $random_filename = uniqid() . '.' . $file_extension;

      
        $new_path = $config['upload_path'] . '/' . $random_filename;
        move_uploaded_file($_FILES['document5']['tmp_name'], $new_path);

        $file_name5 = base_url() . $new_path;


        // $config['upload_path'] = 'documents';
        // $config['allowed_types'] = '*';
        // $config['max_size'] = 800000000;
        // $config['max_width'] = 102400000;
        // $config['max_height'] = 768000000;
        // $this->load->library('upload');
        // $this->upload->initialize($config);
        // $this->upload->do_upload('document7');
        // $file_extension = pathinfo($_FILES['document7']['name'], PATHINFO_EXTENSION);
        // $random_filename = uniqid() . '.' . $file_extension;

       
        // $new_path = $config['upload_path'] . '/' . $random_filename;
        // move_uploaded_file($_FILES['document7']['tmp_name'], $new_path);

        // $file_name7 = base_url() . $new_path;



         $config['upload_path'] = 'documents';
        $config['allowed_types'] = '*';
        $config['max_size'] = 800000000;
        $config['max_width'] = 102400000;
        $config['max_height'] = 768000000;
        $this->load->library('upload');
        $this->upload->initialize($config);
        $this->upload->do_upload('document3');
        //$file_name3 = base_url().$config['upload_path'].'/'.$_FILES['document3']['name'];

         $file_extension3 = pathinfo($_FILES['document3']['name'], PATHINFO_EXTENSION);

        $random_filename3 = uniqid() . '.' . $file_extension3;

       
        $new_path = $config['upload_path'] . '/' . $random_filename3;
        move_uploaded_file($_FILES['document3']['tmp_name'], $new_path);

        $file_name3 = base_url() . $new_path;




         if (!empty($_FILES['sansthanondanionefile']['name'])) {
    $config['upload_path'] = 'documents';
    $config['allowed_types'] = '*';
    $config['max_size'] = 800000000;
    $config['max_width'] = 102400000;
    $config['max_height'] = 768000000;
    $this->load->library('upload');
    $this->upload->initialize($config);

    if ($this->upload->do_upload('sansthanondanionefile')) {
        // Generate a unique filename for 'sansthanondanionefile'
        $file_extension31111 = pathinfo($_FILES['sansthanondanionefile']['name'], PATHINFO_EXTENSION);
        $random_filename31111 = uniqid() . '.' . $file_extension31111;

        // Move the uploaded 'sansthanondanionefile' file with the new filename
        $new_path = $config['upload_path'] . '/' . $random_filename31111;
        move_uploaded_file($_FILES['sansthanondanionefile']['tmp_name'], $new_path);

        $sansthanondanionefile = base_url() . $new_path;
    }
} else {
    // $previousData = $this->db->where('id', $rowid)->get('form_registration')->row();
    $sansthanondanionefile = "";
}




if (!empty($_FILES['sansthanondanitwofile']['name'])) {
    $config['upload_path'] = 'documents';
    $config['allowed_types'] = '*';
    $config['max_size'] = 800000000;
    $config['max_width'] = 102400000;
    $config['max_height'] = 768000000;
    $this->load->library('upload');
    $this->upload->initialize($config);

    if ($this->upload->do_upload('sansthanondanitwofile')) {
        // Generate a unique filename for 'sansthanondanitwofile'
        $file_extension31112 = pathinfo($_FILES['sansthanondanitwofile']['name'], PATHINFO_EXTENSION);
        $random_filename31112 = uniqid() . '.' . $file_extension31112;

        // Move the uploaded 'sansthanondanitwofile' file with the new filename
        $new_path = $config['upload_path'] . '/' . $random_filename31112;
        move_uploaded_file($_FILES['sansthanondanitwofile']['tmp_name'], $new_path);

        $sansthanondanitwofile = base_url() . $new_path;
    }
} else {
    // $previousData = $this->db->where('id', $rowid)->get('form_registration')->row();
    $sansthanondanitwofile = "";
}




if (!empty($_FILES['sansthanondanithreefile']['name'])) {
    $config['upload_path'] = 'documents';
    $config['allowed_types'] = '*';
    $config['max_size'] = 800000000;
    $config['max_width'] = 102400000;
    $config['max_height'] = 768000000;
    $this->load->library('upload');
    $this->upload->initialize($config);

    if ($this->upload->do_upload('sansthanondanithreefile')) {
        // Generate a unique filename for 'sansthanondanithreefile'
        $file_extension31113 = pathinfo($_FILES['sansthanondanithreefile']['name'], PATHINFO_EXTENSION);
        $random_filename31113 = uniqid() . '.' . $file_extension31112;

        // Move the uploaded 'sansthanondanithreefile' file with the new filename
        $new_path = $config['upload_path'] . '/' . $random_filename31113;
        move_uploaded_file($_FILES['sansthanondanithreefile']['tmp_name'], $new_path);

        $sansthanondanithreefile = base_url() . $new_path;
    }
} else {
    // $previousData = $this->db->where('id', $rowid)->get('form_registration')->row();
    $sansthanondanithreefile = "";
}



if (!empty($_FILES['sansthanondanifourfile']['name'])) {
    $config['upload_path'] = 'documents';
    $config['allowed_types'] = '*';
    $config['max_size'] = 800000000;
    $config['max_width'] = 102400000;
    $config['max_height'] = 768000000;
    $this->load->library('upload');
    $this->upload->initialize($config);

    if ($this->upload->do_upload('sansthanondanifourfile')) {
        // Generate a unique filename for 'sansthanondanifourfile'
        $file_extension31114 = pathinfo($_FILES['sansthanondanifourfile']['name'], PATHINFO_EXTENSION);
        $random_filename31114 = uniqid() . '.' . $file_extension31114;

        // Move the uploaded 'sansthanondanifourfile' file with the new filename
        $new_path = $config['upload_path'] . '/' . $random_filename31114;
        move_uploaded_file($_FILES['sansthanondanifourfile']['tmp_name'], $new_path);

        $sansthanondanifourfile = base_url() . $new_path;
    }
} else {
    // $previousData = $this->db->where('id', $rowid)->get('form_registration')->row();
    $sansthanondanifourfile = "";
}



if (!empty($_FILES['sansthanondanifivefile']['name'])) {
    $config['upload_path'] = 'documents';
    $config['allowed_types'] = '*';
    $config['max_size'] = 800000000;
    $config['max_width'] = 102400000;
    $config['max_height'] = 768000000;
    $this->load->library('upload');
    $this->upload->initialize($config);

    if ($this->upload->do_upload('sansthanondanifivefile')) {
        // Generate a unique filename for 'sansthanondanifivefile'
        $file_extension31115 = pathinfo($_FILES['sansthanondanifivefile']['name'], PATHINFO_EXTENSION);
        $random_filename31115 = uniqid() . '.' . $file_extension31115;

        // Move the uploaded 'sansthanondanifivefile' file with the new filename
        $new_path = $config['upload_path'] . '/' . $random_filename31115;
        move_uploaded_file($_FILES['sansthanondanifivefile']['tmp_name'], $new_path);

        $sansthanondanifivefile = base_url() . $new_path;
    }
} else {
    //$previousData = $this->db->where('id', $rowid)->get('form_registration')->row();
    $sansthanondanifivefile = "";
}












    


        $data = array(
            
            
            'goshalechenav' => $this->input->post('goshalechenav'),

            'patta'=>$this->input->post('patta'),

            'taluka' => $this->input->post('taluka'),

            'zillha'=>$this->input->post('zillha'),

            'durdhwanikramanka' => $this->input->post('durdhwanikramanka'),

            'sansthechaemail' => $this->input->post('sansthechaemail'),

            'dateofestablishment' => $this->input->post('dateofestablishment'),

            'objective1' => $this->input->post('objective1'),

            'organisationrelatedto' => $this->input->post('organisationrelatedto'),

            'organisationrelatedto2' => $this->input->post('organisationrelatedto2'),

            'organisationrelatedto3' => $this->input->post('organisationrelatedto3'),

            'organisationrelatedto4' => $this->input->post('organisationrelatedto4'),

            'organisationrelatedto5' => $this->input->post('organisationrelatedto5'),

            'organisationrelatedto6' => $this->input->post('organisationrelatedto6'),

            'organisationrelatedto7' => $this->input->post('organisationrelatedto7'),

            'gst' => $this->input->post('gst'),

            'pan' => $this->input->post('pan'),

            'grampanchayatnondanikramanka' => $this->input->post('grampanchayatnondanikramanka'),

            'jivjantukramanka' => $this->input->post('jivjantukramanka'),

             'nityiayog' => $this->input->post('nityiayog'),

            'incometax' => $this->input->post('incometax'),

            'bankaccountname' => $this->input->post('bankaccountname'),

            'bankaccountnumber' => $this->input->post('bankaccountnumber'),

            'bank' => $this->input->post('bank'),

            'branch' => $this->input->post('branch'),

            'ifsc' => $this->input->post('ifsc'),

            'form6' => $this->input->post('form6'),

            'form7' => $this->input->post('form7'),

            'form8' => $this->input->post('form8'),

            'form9' => $this->input->post('form9'),

            'form10' => $this->input->post('form10'),

            'form11' => $this->input->post('form11'),

            'form12' => $this->input->post('form12'),

            'form13' => $this->input->post('form13'),

            'form14' => $this->input->post('form14'),

            'form15' => $this->input->post('form15'),

            'document15'=>$file_name15,

            'document4'=>$file_name4,

            'document5'=>$file_name5,

            // 'document7'=>$file_name7,

            'document3'=>$file_name3,

            'password' => $this->input->post('password'),

            'sansthanondanionefile' => $sansthanondanionefile,

            'sansthanondanitwofile' => $sansthanondanitwofile,

           'sansthanondanithreefile' => $sansthanondanithreefile,

           'sansthanondanifourfile'  => $sansthanondanifourfile,

           'sansthanondanifivefile'=> $sansthanondanifivefile,

           'sansthanondani1' => $this->input->post('sansthanondani1'),

           'sansthanondani2' => $this->input->post('sansthanondani2'),

           'sansthanondani3' => $this->input->post('sansthanondani3'),

           'sansthanondani4' => $this->input->post('sansthanondani4'),

           'sansthanondani5' => $this->input->post('sansthanondani5'),

           'sansthanondanionetext' => $this->input->post('sansthanondanionetext'),

           'sansthanondanitwotext' => $this->input->post('sansthanondanitwotext'),

           'sansthanondanithreetext' => $this->input->post('sansthanondanithreetext'),

           'sansthanondanifourtext' => $this->input->post('sansthanondanifourtext'),

            'sansthanondanifivetext' => $this->input->post('sansthanondanifivetext'),





                                
        );


         $this->db->insert('form_registration', $data);

         $insertid=$this->db->insert_id() ;

         $data = array(
            
            
            'form_reg_id' => $insertid,

        );

        $this->db->insert('form_registration2', $data); 


        $data = array(
            
            
            'form_reg_id' => $insertid,

        );

        $this->db->insert('form_registration3', $data); 


        $data = array(
            
            
            'form_reg_id' => $insertid,

        );

        $this->db->insert('documents', $data); 

        $data = array(
            
            
            'form_reg_id' => $insertid,

        );

        $this->db->insert('sachiv', $data); 

        


         $sabhasadachenave=$this->input->post('sabhasadachenav');

         $samparkakramanka=$this->input->post('samparkakramanka');

         $sansthetilpad=$this->input->post('sansthetilpad');
        


         for($i = 0; $i < count($sabhasadachenave); $i++ ) {

        $sabhasad_data = array(

            'form_reg_id' => $insertid,

            'sabhasadachenav' => $sabhasadachenave[$i],

            'samparkakramanka' => $samparkakramanka[$i], 

            'sansthetilpad' => $sansthetilpad[$i],


        );

        $this->db->insert('sabhasad', $sabhasad_data);
     }

         $this->session->set_userdata('insertedid', $insertid);


         $toemail=$this->input->post('sansthechaemail');

         $this->session->set_userdata('toemail', $toemail);

         $whatsappno=$this->input->post('durdhwanikramanka');

         $this->session->set_userdata('wupmob',$whatsappno);

         $pancardstatus=$this->input->post('form7');

         $this->session->set_userdata('pancardstatus', $pancardstatus);

                  $jivjantu=$this->input->post('form9');

         $this->session->set_userdata('jivjantu', $jivjantu);

                           $nitiayogstatus=$this->input->post('form10');

         $this->session->set_userdata('nitiayogstatus', $nitiayogstatus);


          $bankstatus=$this->input->post('form12');

         $this->session->set_userdata('bankstatus', $bankstatus);




         $this->session->set_flashdata('success','माहिती यशस्वीरीत्या प्राप्त झाली आहे कृपया प्रस्तुत अर्ज भरावा ..!');
         redirect(base_url() . 'form/Dashboard3');

     }
     


     }else{ 



        if (!empty($_FILES['document15']['name'])) {
    $config['upload_path'] = 'documents';
    $config['allowed_types'] = '*';
    $config['max_size'] = 800000000;
    $config['max_width'] = 102400000;
    $config['max_height'] = 768000000;
    $this->load->library('upload');
    $this->upload->initialize($config);

    if ($this->upload->do_upload('document15')) {
        // Generate a unique filename for 'document15'
        $file_extension = pathinfo($_FILES['document15']['name'], PATHINFO_EXTENSION);
        $random_filename = uniqid() . '.' . $file_extension;

        // Move the uploaded 'document15' file with the new filename
        $new_path = $config['upload_path'] . '/' . $random_filename;
        move_uploaded_file($_FILES['document15']['tmp_name'], $new_path);

        $file_name15 = base_url() . $new_path;
    }
} else {
    $previousData = $this->db->where('id', $rowid)->get('form_registration')->row();
    $file_name15 = $previousData->document15;
}







 if (!empty($_FILES['document4']['name'])) {
    $config['upload_path'] = 'documents';
    $config['allowed_types'] = '*';
    $config['max_size'] = 800000000;
    $config['max_width'] = 102400000;
    $config['max_height'] = 768000000;
    $this->load->library('upload');
    $this->upload->initialize($config);

    if ($this->upload->do_upload('document4')) {
        // Generate a unique filename for 'document4'
        $file_extension = pathinfo($_FILES['document4']['name'], PATHINFO_EXTENSION);
        $random_filename = uniqid() . '.' . $file_extension;

        // Move the uploaded 'document4' file with the new filename
        $new_path = $config['upload_path'] . '/' . $random_filename;
        move_uploaded_file($_FILES['document4']['tmp_name'], $new_path);

        $file_name4 = base_url() . $new_path;
    }
} else {
    $previousData = $this->db->where('id', $rowid)->get('form_registration')->row();
    $file_name4 = $previousData->document4;
}




if (!empty($_FILES['document5']['name'])) {
    $config['upload_path'] = 'documents';
    $config['allowed_types'] = '*';
    $config['max_size'] = 800000000;
    $config['max_width'] = 102400000;
    $config['max_height'] = 768000000;
    $this->load->library('upload');
    $this->upload->initialize($config);

    if ($this->upload->do_upload('document5')) {
        // Generate a unique filename for 'document5'
        $file_extension = pathinfo($_FILES['document5']['name'], PATHINFO_EXTENSION);
        $random_filename = uniqid() . '.' . $file_extension;

        // Move the uploaded 'document5' file with the new filename
        $new_path = $config['upload_path'] . '/' . $random_filename;
        move_uploaded_file($_FILES['document5']['tmp_name'], $new_path);

        $file_name5 = base_url() . $new_path;
    }
} else {
    $previousData = $this->db->where('id', $rowid)->get('form_registration')->row();
    $file_name5 = $previousData->document5;
}



// if (!empty($_FILES['document7']['name'])) {
//     $config['upload_path'] = 'documents';
//     $config['allowed_types'] = '*';
//     $config['max_size'] = 800000000;
//     $config['max_width'] = 102400000;
//     $config['max_height'] = 768000000;
//     $this->load->library('upload');
//     $this->upload->initialize($config);

//     if ($this->upload->do_upload('document7')) {
       
//         $file_extension = pathinfo($_FILES['document7']['name'], PATHINFO_EXTENSION);
//         $random_filename = uniqid() . '.' . $file_extension;

       
//         $new_path = $config['upload_path'] . '/' . $random_filename;
//         move_uploaded_file($_FILES['document7']['tmp_name'], $new_path);

//         $file_name7 = base_url() . $new_path;
//     }
// } else {
//     $previousData = $this->db->where('id', $rowid)->get('form_registration')->row();
//     $file_name7 = $previousData->document7;
// }


if (!empty($_FILES['document3']['name'])) {
    $config['upload_path'] = 'documents';
    $config['allowed_types'] = '*';
    $config['max_size'] = 800000000;
    $config['max_width'] = 102400000;
    $config['max_height'] = 768000000;
    $this->load->library('upload');
    $this->upload->initialize($config);

    if ($this->upload->do_upload('document3')) {
        // Generate a unique filename for 'document3'
        $file_extension3 = pathinfo($_FILES['document3']['name'], PATHINFO_EXTENSION);
        $random_filename3 = uniqid() . '.' . $file_extension3;

        // Move the uploaded 'document3' file with the new filename
        $new_path3 = $config['upload_path'] . '/' . $random_filename3;
        move_uploaded_file($_FILES['document3']['tmp_name'], $new_path3);

        $file_name3 = base_url() . $new_path;
    }
} else {
    $previousData = $this->db->where('id', $rowid)->get('form_registration')->row();
    $file_name3 = $previousData->document3;
}





if (!empty($_FILES['sansthanondanionefile']['name'])) {
    $config['upload_path'] = 'documents';
    $config['allowed_types'] = '*';
    $config['max_size'] = 800000000;
    $config['max_width'] = 102400000;
    $config['max_height'] = 768000000;
    $this->load->library('upload');
    $this->upload->initialize($config);

    if ($this->upload->do_upload('sansthanondanionefile')) {
        // Generate a unique filename for 'sansthanondanionefile'
        $file_extension31111 = pathinfo($_FILES['sansthanondanionefile']['name'], PATHINFO_EXTENSION);
        $random_filename31111 = uniqid() . '.' . $file_extension31111;

        // Move the uploaded 'sansthanondanionefile' file with the new filename
        $new_path = $config['upload_path'] . '/' . $random_filename31111;
        move_uploaded_file($_FILES['sansthanondanionefile']['tmp_name'], $new_path);

        $sansthanondanionefile = base_url() . $new_path;
    }
} else {
    $previousData = $this->db->where('id', $rowid)->get('form_registration')->row();
    $sansthanondanionefile = $previousData->sansthanondanionefile;
}




if (!empty($_FILES['sansthanondanitwofile']['name'])) {
    $config['upload_path'] = 'documents';
    $config['allowed_types'] = '*';
    $config['max_size'] = 800000000;
    $config['max_width'] = 102400000;
    $config['max_height'] = 768000000;
    $this->load->library('upload');
    $this->upload->initialize($config);

    if ($this->upload->do_upload('sansthanondanitwofile')) {
        // Generate a unique filename for 'sansthanondanitwofile'
        $file_extension31112 = pathinfo($_FILES['sansthanondanitwofile']['name'], PATHINFO_EXTENSION);
        $random_filename31112 = uniqid() . '.' . $file_extension31112;

        // Move the uploaded 'sansthanondanitwofile' file with the new filename
        $new_path = $config['upload_path'] . '/' . $random_filename31112;
        move_uploaded_file($_FILES['sansthanondanitwofile']['tmp_name'], $new_path);

        $sansthanondanitwofile = base_url() . $new_path;
    }
} else {
    $previousData = $this->db->where('id', $rowid)->get('form_registration')->row();
    $sansthanondanitwofile = $previousData->sansthanondanitwofile;
}




if (!empty($_FILES['sansthanondanithreefile']['name'])) {
    $config['upload_path'] = 'documents';
    $config['allowed_types'] = '*';
    $config['max_size'] = 800000000;
    $config['max_width'] = 102400000;
    $config['max_height'] = 768000000;
    $this->load->library('upload');
    $this->upload->initialize($config);

    if ($this->upload->do_upload('sansthanondanithreefile')) {
        // Generate a unique filename for 'sansthanondanithreefile'
        $file_extension31113 = pathinfo($_FILES['sansthanondanithreefile']['name'], PATHINFO_EXTENSION);
        $random_filename31113 = uniqid() . '.' . $file_extension31112;

        // Move the uploaded 'sansthanondanithreefile' file with the new filename
        $new_path = $config['upload_path'] . '/' . $random_filename31113;
        move_uploaded_file($_FILES['sansthanondanithreefile']['tmp_name'], $new_path);

        $sansthanondanithreefile = base_url() . $new_path;
    }
} else {
    $previousData = $this->db->where('id', $rowid)->get('form_registration')->row();
    $sansthanondanithreefile = $previousData->sansthanondanithreefile;
}



if (!empty($_FILES['sansthanondanifourfile']['name'])) {
    $config['upload_path'] = 'documents';
    $config['allowed_types'] = '*';
    $config['max_size'] = 800000000;
    $config['max_width'] = 102400000;
    $config['max_height'] = 768000000;
    $this->load->library('upload');
    $this->upload->initialize($config);

    if ($this->upload->do_upload('sansthanondanifourfile')) {
        // Generate a unique filename for 'sansthanondanifourfile'
        $file_extension31114 = pathinfo($_FILES['sansthanondanifourfile']['name'], PATHINFO_EXTENSION);
        $random_filename31114 = uniqid() . '.' . $file_extension31114;

        // Move the uploaded 'sansthanondanifourfile' file with the new filename
        $new_path = $config['upload_path'] . '/' . $random_filename31114;
        move_uploaded_file($_FILES['sansthanondanifourfile']['tmp_name'], $new_path);

        $sansthanondanifourfile = base_url() . $new_path;
    }
} else {
    $previousData = $this->db->where('id', $rowid)->get('form_registration')->row();
    $sansthanondanifourfile = $previousData->sansthanondanifourfile;
}



if (!empty($_FILES['sansthanondanifivefile']['name'])) {
    $config['upload_path'] = 'documents';
    $config['allowed_types'] = '*';
    $config['max_size'] = 800000000;
    $config['max_width'] = 102400000;
    $config['max_height'] = 768000000;
    $this->load->library('upload');
    $this->upload->initialize($config);

    if ($this->upload->do_upload('sansthanondanifivefile')) {
        // Generate a unique filename for 'sansthanondanifivefile'
        $file_extension31115 = pathinfo($_FILES['sansthanondanifivefile']['name'], PATHINFO_EXTENSION);
        $random_filename31115 = uniqid() . '.' . $file_extension31115;

        // Move the uploaded 'sansthanondanifivefile' file with the new filename
        $new_path = $config['upload_path'] . '/' . $random_filename31115;
        move_uploaded_file($_FILES['sansthanondanifivefile']['tmp_name'], $new_path);

        $sansthanondanifivefile = base_url() . $new_path;
    }
} else {
    $previousData = $this->db->where('id', $rowid)->get('form_registration')->row();
    $sansthanondanifivefile = $previousData->sansthanondanifivefile;
}


$this->load->model('Bussiness_Model');

$id=$rowid;

$work_details = $this->Bussiness_Model->getdetails($id);

if (!empty($work_details)) {

    
     $adminstatus = $work_details['adminstatus'];
    

    
 }

 if($adminstatus=='rejected'){

 $data2 = array(
       
        'adminstatus'=>"notapproved",

        'rejectstatus'=>"resubmitted",
    );  

 $this->Form_Model->updateRow($data2, 'form_registration', $rowid);

}else{  

}





 if (!empty($this->input->post('sansthanondanionetext'))) {
    
 
         $sansthanondanionetext = $this->input->post('sansthanondanionetext');
    }
else {


     $previousData = $this->db->where('id', $rowid)->get('form_registration')->row();
     $sansthanondanionetext = $previousData->sansthanondanionetext;
}



 if (!empty($this->input->post('sansthanondanitwotext'))) {
    
 
         $sansthanondanitwotext = $this->input->post('sansthanondanitwotext');
    }
else {


     $previousData = $this->db->where('id', $rowid)->get('form_registration')->row();
     $sansthanondanitwotext = $previousData->sansthanondanitwotext;
}




if (!empty($this->input->post('sansthanondanithreetext'))) {
    
 
         $sansthanondanithreetext = $this->input->post('sansthanondanithreetext');
    }
else {


     $previousData = $this->db->where('id', $rowid)->get('form_registration')->row();
     $sansthanondanithreetext = $previousData->sansthanondanithreetext;
}





if (!empty($this->input->post('sansthanondanifourtext'))) {
    
 
         $sansthanondanifourtext = $this->input->post('sansthanondanifourtext');
    }
else {


     $previousData = $this->db->where('id', $rowid)->get('form_registration')->row();
     $sansthanondanifourtext = $previousData->sansthanondanifourtext;
}





if (!empty($this->input->post('sansthanondanifivetext'))) {
    
 
         $sansthanondanifivetext = $this->input->post('sansthanondanifivetext');
    }
else {


     $previousData = $this->db->where('id', $rowid)->get('form_registration')->row();
     $sansthanondanifivetext = $previousData->sansthanondanifivetext;
}

             $data = array(
            
            
            'goshalechenav' => $this->input->post('goshalechenav'),

            'patta'=>$this->input->post('patta'),

            'taluka' => $this->input->post('taluka'),

            'zillha'=>$this->input->post('zillha'),

            'durdhwanikramanka' => $this->input->post('durdhwanikramanka'),

            'sansthechaemail' => $this->input->post('sansthechaemail'),

            'dateofestablishment' => $this->input->post('dateofestablishment'),

            'objective1' => $this->input->post('objective1'),

            'organisationrelatedto' => $this->input->post('organisationrelatedto'),

            'organisationrelatedto2' => $this->input->post('organisationrelatedto2'),

            'organisationrelatedto3' => $this->input->post('organisationrelatedto3'),

            'organisationrelatedto4' => $this->input->post('organisationrelatedto4'),

            'organisationrelatedto5' => $this->input->post('organisationrelatedto5'),

            'organisationrelatedto6' => $this->input->post('organisationrelatedto6'),

            'organisationrelatedto7' => $this->input->post('organisationrelatedto7'),

            'gst' => $this->input->post('gst'),

            'pan' => $this->input->post('pan'),

            'grampanchayatnondanikramanka' => $this->input->post('grampanchayatnondanikramanka'),

            'jivjantukramanka' => $this->input->post('jivjantukramanka'),

             'nityiayog' => $this->input->post('nityiayog'),

            'incometax' => $this->input->post('incometax'),

            'bankaccountname' => $this->input->post('bankaccountname'),

            'bank' => $this->input->post('bank'),

            'branch' => $this->input->post('branch'),

            'bankaccountnumber' => $this->input->post('bankaccountnumber'),

            'ifsc' => $this->input->post('ifsc'),

            'form6' => $this->input->post('form6'),

            'form7' => $this->input->post('form7'),

            'form8' => $this->input->post('form8'),

            'form9' => $this->input->post('form9'),

            'form10' => $this->input->post('form10'),

            'form11' => $this->input->post('form11'),

            'form12' => $this->input->post('form12'),

            'form13' => $this->input->post('form13'),

            'form14' => $this->input->post('form14'),

            'form15' => $this->input->post('form15'),

            'document15'=>$file_name15,

            'document4'=>$file_name4,

            'document5'=>$file_name5,

            // 'document7'=>$file_name7,

            'document3'=>$file_name3,

            'password' => $this->input->post('password'),

             'sansthanondanionefile' => $sansthanondanionefile,

            'sansthanondanitwofile' => $sansthanondanitwofile,

           'sansthanondanithreefile' => $sansthanondanithreefile,

           'sansthanondanifourfile'  => $sansthanondanifourfile,

           'sansthanondanifivefile'=> $sansthanondanifivefile,

           'sansthanondani1' => $this->input->post('sansthanondani1'),

           'sansthanondani2' => $this->input->post('sansthanondani2'),

           'sansthanondani3' => $this->input->post('sansthanondani3'),

           'sansthanondani4' => $this->input->post('sansthanondani4'),

             'sansthanondani5' => $this->input->post('sansthanondani5'),

           'sansthanondanionetext' => $sansthanondanionetext,

           'sansthanondanitwotext' => $sansthanondanitwotext,

           'sansthanondanithreetext' => $sansthanondanithreetext,

           'sansthanondanifourtext' => $sansthanondanifourtext,

            'sansthanondanifivetext' => $sansthanondanifivetext,

                                
        );




          $this->Form_Model->updateRow($data, 'form_registration', $rowid);

         

       

        


         $sabhasadachenave=$this->input->post('sabhasadachenav');

         $samparkakramanka=$this->input->post('samparkakramanka');

         $sansthetilpad=$this->input->post('sansthetilpad');
        
    $this->db->where('form_reg_id', $rowid);
    $this->db->delete('sabhasad');
    
        for ($i = 0; $i < count($sabhasadachenave); $i++) {
    $sabhasad_data = array(
        'form_reg_id'=>$rowid,
        'sabhasadachenav' => $sabhasadachenave[$i],
        'samparkakramanka' => $samparkakramanka[$i],
        'sansthetilpad' => $sansthetilpad[$i],
    );

  

    $this->db->insert('sabhasad', $sabhasad_data);
}


         $toemail=$this->input->post('sansthechaemail');

         $this->session->set_userdata('toemail', $toemail);


         $whatsappno=$this->input->post('durdhwanikramanka');

         $this->session->set_userdata('wupmob',$whatsappno);

        
         $this->session->set_flashdata('success','माहिती यशस्वीरीत्या प्राप्त झाली आहे कृपया प्रस्तुत अर्ज भरावा ..!');
         redirect(base_url() . 'form/Dashboard3');



     


    }

}

    public function Dashboard3() 
    {

       

         if ($this->session->userdata('insertedid') && $this->session->userdata('adminstatus') !== "approved"){

       $title = "Admin Dashboard";
       $data['title'] = $title;
       $id=$this->session->userdata('insertedid'); 

   

    $title = "Admin Dashboard";
    $data['title'] = $title;

   $this->load->model('Form_Model');
     $data['recordss']=$this->Form_Model->fetrecord($id);
     $data['sabhasads']=$this->Form_Model->fetrecord2($id);
     $data['sachivs']=$this->Form_Model->fetrecord3($id);
     $data['recordsss']=$this->Form_Model->fetrecord4($id);
     $data['recordssss']=$this->Form_Model->fetrecord5($id);
     $data['recordsssss']=$this->Form_Model->fetrecord6($id);
     $data['documents']=$this->Form_Model->fetrecord7($id);
      
       $this->load->view('form2', $data);

}else redirect(base_url() . 'form/login');

        
      
       
    }

    public function addform2 ()
{

   

   $rowid = $this->input->post('id');


   if (!empty($_FILES['document6']['name'])) {
    $config['upload_path'] = 'documents';
    $config['allowed_types'] = '*';
    $config['max_size'] = 800000000;
    $config['max_width'] = 102400000;
    $config['max_height'] = 768000000;
    $this->load->library('upload');
    $this->upload->initialize($config);

    if ($this->upload->do_upload('document6')) {
       
        $file_extension = pathinfo($_FILES['document6']['name'], PATHINFO_EXTENSION);
        $random_filename = uniqid() . '.' . $file_extension;

       
        $new_path = $config['upload_path'] . '/' . $random_filename;
        move_uploaded_file($_FILES['document6']['tmp_name'], $new_path);

        $file_name6 = base_url() . $new_path;
    }
} else {
    $previousData = $this->db->where('id', $rowid)->get('form_registration')->row();
    $file_name6 = $previousData->document6;
}


   $data = array(
            
            
            'runby' => $this->input->post('runby'),

            'awardedby'=>$this->input->post('awardedby'),

            'sansthaarea' => $this->input->post('sansthaarea'),

            'sansthaareaonrent'=>$this->input->post('sansthaareaonrent'),

            'charanirmitikshetra' => $this->input->post('charanirmitikshetra'),

            'charanirmitikshetraforinhouse' => $this->input->post('charanirmitikshetraforinhouse'),

            'snasthapadikshetra' => $this->input->post('snasthapadikshetra'),

            'watersource1' => $this->input->post('watersource1'),

            'watersource2' => $this->input->post('watersource2'),

            'watersource3' => $this->input->post('watersource3'),

            'watersource4' => $this->input->post('watersource4'),

            'watersource5' => $this->input->post('watersource5'),

            'watersource6' => $this->input->post('watersource6'),

            'watersource7' => $this->input->post('watersource7'),

            'watersource8' => $this->input->post('watersource8'),

            'watersource9' => $this->input->post('watersource9'),

            'waterstorage1' => $this->input->post('waterstorage1'),

            'waterstorage2' => $this->input->post('waterstorage2'),

            'waterstorage3' => $this->input->post('waterstorage3'),

            'waterstorage4' => $this->input->post('waterstorage4'),

            'wateravailibilityinsummer1' => $this->input->post('wateravailibilityinsummer1'),

            'wateravailibilityinsummer2' => $this->input->post('wateravailibilityinsummer2'),

            'wateravailibilityinsummer3' => $this->input->post('wateravailibilityinsummer3'),

            'wateravailibilityinsummer4' => $this->input->post('wateravailibilityinsummer4'),

             'wateravailibilityforchara1' => $this->input->post('wateravailibilityforchara1'),

            'wateravailibilityforchara2' => $this->input->post('wateravailibilityforchara2'),

            'wateravailibilityforchara3' => $this->input->post('wateravailibilityforchara3'),

            'wateravailibilityforchara4' => $this->input->post('wateravailibilityforchara4'),

            'waterstoragecapacity1' => $this->input->post('sathavanukkshamata1'),

            'waterstoragecapacity2' => $this->input->post('sathavanukkshamata2'),

            'waterstoragecapacity3' => $this->input->post('sathavanukkshamata3'),

            'waterstoragecapacity4' => $this->input->post('sathavanukkshamata4'),

            'waterstoragecapacity5' => $this->input->post('sathavanukkshamata5'),

            'stoppedwaterstorage' => $this->input->post('stoppedwaterstorage'),

            'form1' => $this->input->post('form1'),

            'form2' => $this->input->post('form2'),

            'form3' => $this->input->post('form3'),

            'form4' => $this->input->post('form4'),

            'form5' => $this->input->post('form5'),

            'snasthapadikshetraunit' => $this->input->post('snasthapadikshetraunit'),

            'charanirmitikshetraforinhouseunit' => $this->input->post('charanirmitikshetraforinhouseunit'),

             'charanirmitikshetraunit' => $this->input->post('charanirmitikshetraunit'),

             'sansthaareaunit' => $this->input->post('sansthaareaunit'),

             'sansthaareaonrentunit' => $this->input->post('sansthaareaonrentunit'),

             'document6'=>$file_name6,



             

                

            




                                
        );




        $this->Form_Model->updateRow($data, 'form_registration', $rowid);



         $sachivname=$this->input->post('sachivname');

         $sachivaddress=$this->input->post('sachivaddress');

         $sachivcontact=$this->input->post('sachivcontact');

         $sachivemail=$this->input->post('sachivemail');


         $this->db->where('form_reg_id', $rowid);
    $this->db->delete('sachiv');

        


         for($i = 0; $i < count($sachivname); $i++ ) {

        $sabhasad_data = array(

            'form_reg_id'=>$rowid,

            'sachivname' => $sachivname[$i],

            'sachivaddress' => $sachivaddress[$i], 

            'sachivcontact' => $sachivcontact[$i],

            'sachivemail' => $sachivemail[$i],


        );

       
        
        $this->db->insert('sachiv', $sabhasad_data);

     }



         $rentdeed=$this->input->post('form2');

         $this->session->set_userdata('rentdeed', $rentdeed);


        $satbara=$this->input->post('form1');

         $this->session->set_userdata('satbara', $satbara);

  
        $this->session->set_flashdata('success','माहिती यशस्वीरीत्या प्राप्त झाली आहे कृपया प्रस्तुत अर्ज भरावा ..!');
        redirect(base_url() . 'form/Dashboard4');

      

        
}

public function Dashboard4() 
    {


        if ($this->session->userdata('insertedid') &&  $this->session->userdata('adminstatus') !== "approved"){
        $title = "Admin Dashboard";
        $data['title'] = $title;

   $rowid = $this->input->post('id');
   $id=$this->session->userdata('insertedid');



     $this->load->model('Form_Model');
     $data['recordss']=$this->Form_Model->fetrecord($id);
     $data['sabhasads']=$this->Form_Model->fetrecord2($id);
     $data['sachivs']=$this->Form_Model->fetrecord3($id);
     $data['recordsss']=$this->Form_Model->fetrecord4($id);
     $data['recordssss']=$this->Form_Model->fetrecord5($id);
     $data['recordsssss']=$this->Form_Model->fetrecord6($id);
     $data['documents']=$this->Form_Model->fetrecord7($id);

       
        $this->load->view('form3', $data);

        }else redirect(base_url() . 'form/login');
      
       
    }

    // public function addform3() 
    // {
    //     die('prince'); die();
      
      
       
    // }



    public function guide() 
    {
        $title = "Guide";
        $data['title'] = $title;
       
        $this->load->view('guide', $data);
      
       
    }
    
public function addform_3()
{
    
    $rowid = $this->input->post('id');
    
    if (!empty($_FILES['document11']['name'])) {
    $config['upload_path'] = 'documents';
    $config['allowed_types'] = '*';
    $config['max_size'] = 800000000;
    $config['max_width'] = 102400000;
    $config['max_height'] = 768000000;
    $this->load->library('upload');
    $this->upload->initialize($config);

    if ($this->upload->do_upload('document11')) {
       
        $file_extension = pathinfo($_FILES['document11']['name'], PATHINFO_EXTENSION);
        $random_filename = uniqid() . '.' . $file_extension;

       
        $new_path = $config['upload_path'] . '/' . $random_filename;
        move_uploaded_file($_FILES['document11']['tmp_name'], $new_path);

        $file_name11 = base_url() . $new_path;
    }
} else {

    $previousData = $this->db->where('form_reg_id', $rowid)->get('form_registration2')->row();
    $file_name11 = $previousData->document11;
}

    $data = array(

            'form_reg_id' => $this->input->post('id'),

            'totalgoansh' => $this->input->post('totalgoansh'),

            'cows'=>$this->input->post('cows'),

            'paidasivalu' => $this->input->post('paidasivalu'),

            'bail'=>$this->input->post('bail'),

            'navvasare' => $this->input->post('navvasare'),

            'kalwadi' => $this->input->post('kalwadi'),

            'gorhe' => $this->input->post('gorhe'),

            'tarunkalwad' => $this->input->post('tarunkalwad'),

            'ekundudharugaiee' => $this->input->post('ekundudharugaiee'),

            'ekunbhakadgaie' => $this->input->post('ekunbhakadgaie'),

            'ashaktgoansh' => $this->input->post('ashaktgoansh'),

            'vrudhaajarigoansh' => $this->input->post('vrudhaajarigoansh'),

            'shudhagoansh' => $this->input->post('shudhagoansh'),

            'vanshnihaygoansh' => $this->input->post('vanshnihaygoansh'),

            'gorakshaknyayalayyannidilelisankhya' => $this->input->post('gorakshaknyayalayyannidilelisankhya'),

            'goanshnumberbypolice' => $this->input->post('goanshnumberbypolice'),

            'goanshnumberbyfarmer' => $this->input->post('goanshnumberbyfarmer'),

            'goanshforfarmer' => $this->input->post('goanshforfarmer'),

            'karyalaikshetrafal' => $this->input->post('karyalaikshetrafal'),

            'goanshchatakhalilkshetrafal' => $this->input->post('goanshchatakhalilkshetrafal'),

            'bandistmuktsancharkheshtrafal' => $this->input->post('bandistmuktsancharkheshtrafal'),

            'foodstorage' => $this->input->post('foodstorage'),

            'charakuttiyantrakshetrafal' => $this->input->post('charakuttiyantrakshetrafal'),

             'vahantalkshetrafal' => $this->input->post('vahantalkshetrafal'),

            'macinarystorage' => $this->input->post('macinarystorage'),

            'dudhsankalan' => $this->input->post('dudhsankalan'),

            'prashikshangruh' => $this->input->post('prashikshangruh'),

            'goutpdangruh' => $this->input->post('goutpdangruh'),

            'krmacharinivas' => $this->input->post('krmacharinivas'),

            'murghasnirmitisankul' => $this->input->post('murghasnirmitisankul'),

            'goupsharkendra' => $this->input->post('goupsharkendra'),

            'police1' => $this->input->post('police1'),

            'police2' => $this->input->post('police2'),

            'police3' => $this->input->post('police3'),

            'police4' => $this->input->post('police4'),

            'police5' => $this->input->post('police5'),

            'police6' => $this->input->post('police6'),

            'police7' => $this->input->post('police7'),

            'police8' => $this->input->post('police8'),

            'police9' => $this->input->post('police9'),

            'police10' => $this->input->post('police10'),

            'police11' => $this->input->post('police11'),

            'police12' => $this->input->post('police12'),

            'police13' => $this->input->post('police13'),

            'police14' => $this->input->post('police14'),

            'police15' => $this->input->post('police15'),

            'police29' => $this->input->post('police29'),

            'document11'=>$file_name11,

            'imaratichatapshil'=> $this->input->post('imaratichatapshil'),

            'imaratichatapshilunit' =>$this->input->post('imaratichatapshilunit'),

             'goupsharkendraunit' =>$this->input->post('goupsharkendraunit'),

             'murghasnirmitisankulunit' =>$this->input->post('murghasnirmitisankulunit'),

             'krmacharinivasunit' =>$this->input->post('krmacharinivasunit'),

             'goutpdangruhunit' =>$this->input->post('goutpdangruhunit'),

             'prashikshangruhunit' =>$this->input->post('prashikshangruhunit'),

             'dudhsankalanunit' =>$this->input->post('dudhsankalanunit'),

             'macinarystorageunit' =>$this->input->post('macinarystorageunit'),

             'vahantalkshetrafalunit' =>$this->input->post('vahantalkshetrafalunit'),

             'charakuttiyantrakshetrafalunit' =>$this->input->post('charakuttiyantrakshetrafalunit'),

             'foodstorageunit' =>$this->input->post('foodstorageunit'),

             'bandistmuktsancharkheshtrafalunit' =>$this->input->post('bandistmuktsancharkheshtrafalunit'),
               
             'goanshchatakhalilkshetrafalunit' =>$this->input->post('goanshchatakhalilkshetrafalunit'),

             'karyalaikshetrafalunit' =>$this->input->post('karyalaikshetrafalunit'),


                                
        );
  
        


     $this->Form_Model->updateRow2($data, 'form_registration2', $rowid);


         $policestatus=$this->input->post('police1');

         $this->session->set_userdata('policestatus', $policestatus);


            $this->session->set_flashdata('success','माहिती यशस्वीरीत्या प्राप्त झाली आहे कृपया प्रस्तुत अर्ज भरावा ..!');
        redirect(base_url() . 'form/Dashboard5');

   

    
}


public function Dashboard5() 
{

    if ($this->session->userdata('insertedid') &&  $this->session->userdata('adminstatus') !== "approved"){
   $title = "Admin Dashboard";
   $data['title'] = $title;
   $rowid = $this->input->post('id');
   $id=$this->session->userdata('insertedid'); 



     $this->load->model('Form_Model');
     $data['recordss']=$this->Form_Model->fetrecord($id);
     $data['sabhasads']=$this->Form_Model->fetrecord2($id);
     $data['sachivs']=$this->Form_Model->fetrecord3($id);
     $data['recordsss']=$this->Form_Model->fetrecord4($id);
     $data['recordssss']=$this->Form_Model->fetrecord5($id);
     $data['recordsssss']=$this->Form_Model->fetrecord6($id);
     $data['documents']=$this->Form_Model->fetrecord7($id);
  
   $this->load->view('form4', $data);

   }else redirect(base_url() . 'form/login');
  
   
}

public function addform_4()
{

        $config['upload_path'] = 'documents';
        $config['allowed_types'] = '*';
        $config['max_size'] = 800000000;
        $config['max_width'] = 102400000;
        $config['max_height'] = 768000000;
        $this->load->library('upload');
        $this->upload->initialize($config);
        $this->upload->do_upload('document1');
        //$file_name1 = base_url().$config['upload_path'].'/'.$_FILES['document1']['name'];


         $file_extension = pathinfo($_FILES['document1']['name'], PATHINFO_EXTENSION);
        $random_filename = uniqid() . '.' . $file_extension;

       
        $new_path = $config['upload_path'] . '/' . $random_filename;
        move_uploaded_file($_FILES['document1']['tmp_name'], $new_path);

        $file_name1 = base_url() . $new_path;

        






       //  $config['upload_path'] = 'documents';
       //  $config['allowed_types'] = '*';
       //  $config['max_size'] = 800000000;
       //  $config['max_width'] = 102400000;
       //  $config['max_height'] = 768000000;
       //  $this->load->library('upload');
       //  $this->upload->initialize($config);
       //  $this->upload->do_upload('document2');
       // // $file_name2 = base_url().$config['upload_path'].'/'.$_FILES['document2']['name'];

       //  $file_extension = pathinfo($_FILES['document2']['name'], PATHINFO_EXTENSION);
       //  $random_filename2 = uniqid() . '.' . $file_extension;

       
       //  $new_path = $config['upload_path'] . '/' . $random_filename2;
       //  move_uploaded_file($_FILES['document2']['tmp_name'], $new_path);

       //  $file_name2 = base_url() . $new_path;





        $config['upload_path'] = 'documents';
        $config['allowed_types'] = '*';
        $config['max_size'] = 800000000;
        $config['max_width'] = 102400000;
        $config['max_height'] = 768000000;
        $this->load->library('upload');
        $this->upload->initialize($config);
        $this->upload->do_upload('document3');
        //$file_name3 = base_url().$config['upload_path'].'/'.$_FILES['document3']['name'];
         $file_extension = pathinfo($_FILES['document3']['name'], PATHINFO_EXTENSION);
        $random_filename3 = uniqid() . '.' . $file_extension;

       
        $new_path = $config['upload_path'] . '/' . $random_filename3;
        move_uploaded_file($_FILES['document3']['tmp_name'], $new_path);

        $file_name3 = base_url() . $new_path;


        $config['upload_path'] = 'documents';
        $config['allowed_types'] = '*';
        $config['max_size'] = 800000000;
        $config['max_width'] = 102400000;
        $config['max_height'] = 768000000;
        $this->load->library('upload');
        $this->upload->initialize($config);
        $this->upload->do_upload('document4');
        //$file_name4 = base_url().$config['upload_path'].'/'.$_FILES['document4']['name'];
        $file_extension = pathinfo($_FILES['document4']['name'], PATHINFO_EXTENSION);

        $random_filename4 = uniqid() . '.' . $file_extension;

       
        $new_path = $config['upload_path'] . '/' . $random_filename4;
        move_uploaded_file($_FILES['document4']['tmp_name'], $new_path);

        $file_name4 = base_url() . $new_path;




        $config['upload_path'] = 'documents';
        $config['allowed_types'] = '*';
        $config['max_size'] = 800000000;
        $config['max_width'] = 102400000;
        $config['max_height'] = 768000000;
        $this->load->library('upload');
        $this->upload->initialize($config);
        $this->upload->do_upload('document5');
         $file_extension = pathinfo($_FILES['document5']['name'], PATHINFO_EXTENSION);

        $random_filename5 = uniqid() . '.' . $file_extension;

       
        $new_path = $config['upload_path'] . '/' . $random_filename5;
        move_uploaded_file($_FILES['document5']['tmp_name'], $new_path);

        $file_name5 = base_url() . $new_path;

         $data = array(
        
        'document1' => $file_name1,
        // 'document2' => $file_name2,
        'document3' => $file_name3,
        'document4' => $file_name4,
        'document5' =>$file_name5,
      
    );




 $post_data = $this->input->post();
$data = array_merge($data, $post_data);
$rowid = $this->input->post('form_reg_id');





 $this->Form_Model->updateRow2($data, 'form_registration3', $rowid);

 $this->session->set_flashdata('success','माहिती यशस्वीरीत्या प्राप्त झाली आहे कृपया प्रस्तुत अर्ज भरावा ..!');
        redirect(base_url() . 'form/Dashboard6');
     
        
}

public function Dashboard6() 
{

    if ($this->session->userdata('insertedid') &&  $this->session->userdata('adminstatus') !== "approved"){

   $title = "Admin Dashboard";
   $data['title'] = $title;
   $rowid = $this->input->post('id');
   $id=$this->session->userdata('insertedid'); 



     $this->load->model('Form_Model');
     $data['recordss']=$this->Form_Model->fetrecord($id);
     $data['sabhasads']=$this->Form_Model->fetrecord2($id);
     $data['sachivs']=$this->Form_Model->fetrecord3($id);
     $data['recordsss']=$this->Form_Model->fetrecord4($id);
     $data['recordssss']=$this->Form_Model->fetrecord5($id);
     $data['recordsssss']=$this->Form_Model->fetrecord6($id);
     $data['documents']=$this->Form_Model->fetrecord7($id);
  
   $this->load->view('form5', $data);
  }else redirect(base_url() . 'form/login');
   
}

public function addform_5()
{

     $rowid = $this->input->post('form_reg_id');


     if (!empty($_FILES['document1']['name'])) {
    $config['upload_path'] = 'documents';
    $config['allowed_types'] = '*';
    $config['max_size'] = 800000000;
    $config['max_width'] = 102400000;
    $config['max_height'] = 768000000;
    $this->load->library('upload');
    $this->upload->initialize($config);

    if ($this->upload->do_upload('document1')) {
       
        $file_extension = pathinfo($_FILES['document1']['name'], PATHINFO_EXTENSION);
        $random_filename = uniqid() . '.' . $file_extension;

       
        $new_path = $config['upload_path'] . '/' . $random_filename;
        move_uploaded_file($_FILES['document1']['tmp_name'], $new_path);

        $file_name1 = base_url() . $new_path;
    }
} else {
    $previousData = $this->db->where('form_reg_id', $rowid)->get('documents')->row();
    $file_name1 = $previousData->document1;
}




        





        if (!empty($_FILES['document2']['name'])) {
    $config['upload_path'] = 'documents';
    $config['allowed_types'] = '*';
    $config['max_size'] = 800000000;
    $config['max_width'] = 102400000;
    $config['max_height'] = 768000000;
    $this->load->library('upload');
    $this->upload->initialize($config);

    if ($this->upload->do_upload('document2')) {
       
        $file_extension = pathinfo($_FILES['document2']['name'], PATHINFO_EXTENSION);
        $random_filename = uniqid() . '.' . $file_extension;

       
        $new_path = $config['upload_path'] . '/' . $random_filename;
        move_uploaded_file($_FILES['document2']['tmp_name'], $new_path);

        $file_name2 = base_url() . $new_path;
    }
} else {
    $previousData = $this->db->where('form_reg_id', $rowid)->get('documents')->row();
    $file_name2 = $previousData->document2;
}






        


        // $config['upload_path'] = 'documents';
        // $config['allowed_types'] = '*';
        // $config['max_size'] = 800000000;
        // $config['max_width'] = 102400000;
        // $config['max_height'] = 768000000;
        // $this->load->library('upload');
        // $this->upload->initialize($config);
        // $this->upload->do_upload('document4');
        // $file_name4 = base_url().$config['upload_path'].'/'.$_FILES['document4']['name'];




        // $config['upload_path'] = 'documents';
        // $config['allowed_types'] = '*';
        // $config['max_size'] = 800000000;
        // $config['max_width'] = 102400000;
        // $config['max_height'] = 768000000;
        // $this->load->library('upload');
        // $this->upload->initialize($config);
        // $this->upload->do_upload('document5');
        // $file_name5 = base_url().$config['upload_path'].'/'.$_FILES['document5']['name'];




        //  $config['upload_path'] = 'documents';
        // $config['allowed_types'] = '*';
        // $config['max_size'] = 800000000;
        // $config['max_width'] = 102400000;
        // $config['max_height'] = 768000000;
        // $this->load->library('upload');
        // $this->upload->initialize($config);
        // $this->upload->do_upload('document6');
        // $file_name6 = base_url().$config['upload_path'].'/'.$_FILES['document6']['name'];



        //  $config['upload_path'] = 'documents';
        // $config['allowed_types'] = '*';
        // $config['max_size'] = 800000000;
        // $config['max_width'] = 102400000;
        // $config['max_height'] = 768000000;
        // $this->load->library('upload');
        // $this->upload->initialize($config);
        // $this->upload->do_upload('document7');
        // $file_name7 = base_url().$config['upload_path'].'/'.$_FILES['document7']['name'];


if (!empty($_FILES['document8']['name'])) {
    $config['upload_path'] = 'documents';
    $config['allowed_types'] = '*';
    $config['max_size'] = 800000000;
    $config['max_width'] = 102400000;
    $config['max_height'] = 768000000;
    $this->load->library('upload');
    $this->upload->initialize($config);

    if ($this->upload->do_upload('document8')) {
       
        $file_extension = pathinfo($_FILES['document8']['name'], PATHINFO_EXTENSION);
        $random_filename = uniqid() . '.' . $file_extension;

       
        $new_path = $config['upload_path'] . '/' . $random_filename;
        move_uploaded_file($_FILES['document8']['tmp_name'], $new_path);

        $file_name8 = base_url() . $new_path;
    }
} else {
    $previousData = $this->db->where('form_reg_id', $rowid)->get('documents')->row();
    $file_name8 = $previousData->document8;
}



       if (!empty($_FILES['document9']['name'])) {
    $config['upload_path'] = 'documents';
    $config['allowed_types'] = '*';
    $config['max_size'] = 800000000;
    $config['max_width'] = 102400000;
    $config['max_height'] = 768000000;
    $this->load->library('upload');
    $this->upload->initialize($config);

    if ($this->upload->do_upload('document9')) {
       
        $file_extension = pathinfo($_FILES['document9']['name'], PATHINFO_EXTENSION);
        $random_filename = uniqid() . '.' . $file_extension;

       
        $new_path = $config['upload_path'] . '/' . $random_filename;
        move_uploaded_file($_FILES['document9']['tmp_name'], $new_path);

        $file_name9 = base_url() . $new_path;
    }
} else {
    $previousData = $this->db->where('form_reg_id', $rowid)->get('documents')->row();
    $file_name9 = $previousData->document9;
}





        if (!empty($_FILES['document10']['name'])) {
    $config['upload_path'] = 'documents';
    $config['allowed_types'] = '*';
    $config['max_size'] = 800000000;
    $config['max_width'] = 102400000;
    $config['max_height'] = 768000000;
    $this->load->library('upload');
    $this->upload->initialize($config);

    if ($this->upload->do_upload('document10')) {
       
        $file_extension = pathinfo($_FILES['document10']['name'], PATHINFO_EXTENSION);
        $random_filename = uniqid() . '.' . $file_extension;

       
        $new_path = $config['upload_path'] . '/' . $random_filename;
        move_uploaded_file($_FILES['document10']['tmp_name'], $new_path);

        $file_name10 = base_url() . $new_path;
    }
} else {
    $previousData = $this->db->where('form_reg_id', $rowid)->get('documents')->row();
    $file_name10 = $previousData->document10;
}





        //  $config['upload_path'] = 'documents';
        // $config['allowed_types'] = '*';
        // $config['max_size'] = 800000000;
        // $config['max_width'] = 102400000;
        // $config['max_height'] = 768000000;
        // $this->load->library('upload');
        // $this->upload->initialize($config);
        // $this->upload->do_upload('document11');
        // $file_name11 = base_url().$config['upload_path'].'/'.$_FILES['document11']['name'];



        if (!empty($_FILES['document12']['name'])) {
    $config['upload_path'] = 'documents';
    $config['allowed_types'] = '*';
    $config['max_size'] = 800000000;
    $config['max_width'] = 102400000;
    $config['max_height'] = 768000000;
    $this->load->library('upload');
    $this->upload->initialize($config);

    if ($this->upload->do_upload('document12')) {
       
        $file_extension = pathinfo($_FILES['document12']['name'], PATHINFO_EXTENSION);
        $random_filename = uniqid() . '.' . $file_extension;

       
        $new_path = $config['upload_path'] . '/' . $random_filename;
        move_uploaded_file($_FILES['document12']['tmp_name'], $new_path);

        $file_name12 = base_url() . $new_path;
    }
} else {
    $previousData = $this->db->where('form_reg_id', $rowid)->get('documents')->row();
    $file_name12 = $previousData->document12;
}


       if (!empty($_FILES['document13']['name'])) {
    $config['upload_path'] = 'documents';
    $config['allowed_types'] = '*';
    $config['max_size'] = 800000000;
    $config['max_width'] = 102400000;
    $config['max_height'] = 768000000;
    $this->load->library('upload');
    $this->upload->initialize($config);

    if ($this->upload->do_upload('document13')) {
       
        $file_extension = pathinfo($_FILES['document13']['name'], PATHINFO_EXTENSION);
        $random_filename = uniqid() . '.' . $file_extension;

       
        $new_path = $config['upload_path'] . '/' . $random_filename;
        move_uploaded_file($_FILES['document13']['tmp_name'], $new_path);

        $file_name13 = base_url() . $new_path;
    }
} else {
    $previousData = $this->db->where('form_reg_id', $rowid)->get('documents')->row();
    $file_name13 = $previousData->document13;
}




         if (!empty($_FILES['document14']['name'])) {
    $config['upload_path'] = 'documents';
    $config['allowed_types'] = '*';
    $config['max_size'] = 800000000;
    $config['max_width'] = 102400000;
    $config['max_height'] = 768000000;
    $this->load->library('upload');
    $this->upload->initialize($config);

    if ($this->upload->do_upload('document14')) {
       
        $file_extension = pathinfo($_FILES['document14']['name'], PATHINFO_EXTENSION);
        $random_filename = uniqid() . '.' . $file_extension;

       
        $new_path = $config['upload_path'] . '/' . $random_filename;
        move_uploaded_file($_FILES['document14']['tmp_name'], $new_path);

        $file_name14 = base_url() . $new_path;
    }
} else {
    $previousData = $this->db->where('form_reg_id', $rowid)->get('documents')->row();
    $file_name14 = $previousData->document14;
}




        // $config['upload_path'] = 'documents';
        // $config['allowed_types'] = '*';
        // $config['max_size'] = 800000000;
        // $config['max_width'] = 102400000;
        // $config['max_height'] = 768000000;
        // $this->load->library('upload');
        // $this->upload->initialize($config);
        // $this->upload->do_upload('document15');
        // $file_name15 = base_url().$config['upload_path'].'/'.$_FILES['document15']['name'];









    
    $rowid = $this->input->post('form_reg_id');
    $document15_status = $this->input->post('document15_status');
    $document1_status = $this->input->post('document1_status');


    $data = array(
        'form_reg_id' => $rowid,
        'document1' => $file_name1,
        'document2' => $file_name2,

        'document8' => $file_name8,
        'document9' => $file_name9,
        'document10' => $file_name10,
       
        'document12'=>$file_name12,
        'document13'=>$file_name13,
        'document14'=>$file_name14,
        'document15_status'=>$document15_status,
        'document1_status'=>$document1_status,
    );

   
  



  $this->Form_Model->updateRow2($data, 'documents', $rowid);
  
  
     $this->session->set_flashdata('success','माहिती यशस्वीरीत्या प्राप्त झाली आहे कृपया हा मसुदा तपासा ...!');
        redirect(base_url() . 'form/Dashboard7');


 
}


public function Dashboard7() 
{

    $id=$this->session->userdata('insertedid');    
    $title = "Admin Dashboard";
    $data['title'] = $title;

   $this->load->model('Form_Model');
   $data['recordss']=$this->Form_Model->fetrecord($id);
   $data['sabhasads']=$this->Form_Model->fetrecord2($id);
    $data['sachivs']=$this->Form_Model->fetrecord3($id);
    $data['recordsss']=$this->Form_Model->fetrecord4($id);
    $data['recordssss']=$this->Form_Model->fetrecord5($id);
     $data['recordsssss']=$this->Form_Model->fetrecord6($id);
     $data['documents']=$this->Form_Model->fetrecord7($id);

   $this->load->view('form6', $data);
  
   
}


public function Dashboard8() 
{

    $id=$this->session->userdata('insertedid');    
    $title = "Admin Dashboard";
    $data['title'] = $title;

   

   $this->load->view('form7', $data);
  
   
}



public function sendmail() 
{

 $rowid=$this->session->userdata('insertedid');  
 
 $data2 = array(
       
        'status'=>"completed",
    );  

 $this->Form_Model->updateRow($data2, 'form_registration', $rowid);



  $goshalaname="Goseva Ayog";
  $toemail=$this->session->userdata('toemail');
    $cnumber='91'.$this->session->userdata('wupmob');
   
   

  


  $msg="महाराष्ट्र शासन गोसेवा आयोगाकडे तुमच्या संस्थेच्या नोंदणीसाठी आम्हाला तुमचा अर्ज प्राप्त झाला आहे. आम्ही प्राप्त झालेली रक्कम आणि अर्जामधील तपशील तपासू आणि त्तुम्हाला रेजिस्ट्रेशन सर्टिफिकेट तुमच्या दिलेल्या ई-मेल वर पाठवू.
  ";


   $msg2="महाराष्ट्र शासन गोसेवा आयोगाकडे तुमच्या संस्थेच्या नोंदणीसाठी आम्हाला तुमचा अर्ज प्राप्त झाला आहे. आम्ही प्राप्त झालेली रक्कम आणि अर्जामधील तपशील तपासू आणि त्तुम्हाला रेजिस्ट्रेशन सर्टिफिकेट तुमच्या दिलेल्या ई-मेल वर पाठवू.
  ";
    

 
        $this->load->library('email');

        $config['protocol'] = 'smtp';
        $config['smtp_host'] = 'smtp.gmail.com';
        $config['smtp_port'] = '587';
        $config['smtp_user'] = 'goshala.noreply@gmail.com'; 
        $config['smtp_pass'] = 'ltad idmj xafd caac'; 
        $config['mailtype'] = 'html';
        $config['charset'] = 'utf-8';
        $config['newline'] = "\r\n";
        $config['smtp_crypto'] = 'tls';


        $this->email->initialize($config);

        $this->email->from('Goseva Ayog'); 
        $this->email->to($toemail); 
        $this->email->subject('Goseva form');
        $this->email->message($msg);
        // $this->email->attach($pdfFilePath, '', 'application/pdf');

        if ($this->email->send()) {
    echo 'Email sent successfully.';
} else {
    echo 'Failed to send email.';
}




    $filename="cow.png"  ;

    $url = 'https://mhgosevaayog.org/form_goshala3/images/' . $filename;
    $curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => 'http://wa.dreamztechnolgy.org/api/v1/sendBulkForDocument',
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'POST',
  CURLOPT_POSTFIELDS =>'{
    "apikeys": [
        {
            "key": "eac2c01fdd7c4686b91b516578a1c139"
        }
    ],
    "toNumbers": [
        {
            "to": "'.$cnumber.'"
        },
        {
            "to": "919284546933"
        }
    ],
    "url": "'.$url.'",
    "filename": "'.$filename.'",
    "caption" : "'.$msg2.'", 
    "isUrgent": "false",
    "isDeleteAfterSend": "false",
    "isGroupMsg": "false",
    "ExpiryTime": "00:00",
    "IsFailMessage": "false",
    "SenderId": "AB-111213",
    "ContentTemplate": "Hello.Good Morning",
    "SendingMessageType": "0"
}',
  CURLOPT_HTTPHEADER => array(
    'Content-Type: application/json'
  ),
));

$response = curl_exec($curl);

curl_close($curl);
echo $response;






   redirect(base_url() . 'form/Dashboard7');
  
   
}




public function offlineform() 
    {
       $title = "Admin Dashboard";
       $data['title'] = $title;
       $id=$this->session->userdata('insertedid'); 

   

    $title = "Admin Dashboard";
    $data['title'] = $title;

      
       $this->load->view('offlineform', $data);
      
       
    }



    public function forgotpassword() 
{

  
  $goshalaname="Goseva Ayog";
  $toemail=$this->input->post('email');



  $this->load->model('Bussiness_Model');

   $validateemail=$this->Bussiness_Model->emailexist($toemail);
                
                


                if($validateemail){

               $password= $validateemail->password;

             $msg="महाराष्ट्र शासन गोसेवा आयोगाकडे आपण विनंती केल्याप्रमाणे आपला पासवर्ड :".$password."<br>";


  
    

 
        $this->load->library('email');

        $config['protocol'] = 'smtp';
        $config['smtp_host'] = 'smtp.gmail.com';
        $config['smtp_port'] = '587';
        $config['smtp_user'] = 'goshala.noreply@gmail.com'; 
        $config['smtp_pass'] = 'ltad idmj xafd caac'; 
        $config['mailtype'] = 'html';
        $config['charset'] = 'utf-8';
        $config['newline'] = "\r\n";
        $config['smtp_crypto'] = 'tls';


        $this->email->initialize($config);

        $this->email->from('Goseva Ayog'); 
        $this->email->to($toemail); 
        $this->email->subject('Goseva form');
        $this->email->message($msg);
        // $this->email->attach($pdfFilePath, '', 'application/pdf');

        if ($this->email->send()) {
    echo 'Email sent successfully.';
} else {
    echo 'Failed to send email.';
}   







                $this->session->set_flashdata('error','पासवर्ड आपल्या ई-मेल वर पाठवला आहे');
                redirect(base_url() . 'form/login');
            
                } 

                else{
                $this->session->set_flashdata('error','आमच्या रेकॉर्ड मध्ये आपण नमूद केलेला ई-मेल नाही कृपया ई-मेल तपासा');
                redirect(base_url() . 'form/login');
                }

   


   


  


  




   
  
   
}



  public function resubmit()
    {  

    $idform = $this->input->get('id'); 

   
    $title = "Admin Dashboard";
    $data['imporantid'] = $idform;

   

   $this->load->view('resubmit', $data);
  
   

   

}

public function certificate()
    {  

     $id = $this->input->get('id'); 

   $this->load->model('Form_Model');
   $data['recordss']=$this->Form_Model->fetrecord($id);

   

   $this->load->view('certificate', $data);
 
}


public function certificatenew()
    {  

     $id = $this->input->get('id'); 

   $this->load->model('Form_Model');
   $data['recordss']=$this->Form_Model->fetrecord($id);

   

   $this->load->view('certificatenew', $data);
 
}


public function reciept()
    {  

   $id = $this->input->get('id'); 

   $this->load->model('Form_Model');
   $data['recordss']=$this->Form_Model->fetrecord($id);

   

   $this->load->view('reciept', $data);
 
}





public function resubmission()
{  

//   $rowid=$this->input->post('form_reg_id');

//    $this->db->where('form_reg_id', $rowid);
//     $this->db->delete('rejected');



//    $config['upload_path'] = 'documents';
//     $config['allowed_types'] = '*';
//     $config['max_size'] = 2048; // Set the maximum file size (in kilobytes)
// $this->load->library('upload');
// $this->upload->initialize($config);

    

//     if (!empty($_FILES['document']['name'][0])) {
//         $uploaded = array();
//         $failed = array();

//         $fileCount = count($_FILES['document']['name']);

//         for ($i = 0; $i < $fileCount; $i++) {
//             $_FILES['userFile']['name'] = $_FILES['document']['name'][$i];
//             $_FILES['userFile']['type'] = $_FILES['document']['type'][$i];
//             $_FILES['userFile']['tmp_name'] = $_FILES['document']['tmp_name'][$i];
//             $_FILES['userFile']['error'] = $_FILES['document']['error'][$i];
//             $_FILES['userFile']['size'] = $_FILES['document']['size'][$i];

           
//             if ($this->upload->do_upload('userFile')) {
//                 $uploaded[] = $this->upload->data('file_name');
//             } else {
//                 $failed[] = $this->upload->display_errors();
//             }
//         }

//           $filename23= base_url().$config['upload_path'].'/';

//         if (!empty($uploaded)) {
           
//             foreach ($uploaded as $file_name) {
               
//                 $data = array(
//                     'form_reg_id' => $this->input->post('form_reg_id'), 
//                     'reason'=>$this->input->post('reason'),
//                     'resubmitdocuments' => $filename23.$file_name
//                 );

//                 $this->db->insert('rejected', $data);
//             }

//             echo "Uploaded successfully";
//         }

//         if (!empty($failed)) {
//             echo "Failed to upload: <br>";
//             foreach ($failed as $error) {
//                 echo $error . "<br>";
//             }
//         }
//     } else {
//         echo "No files were selected";
//     }
       



         if (!empty($_FILES['document14']['name'])) {
    $config['upload_path'] = 'documents';
    $config['allowed_types'] = '*';
    $config['max_size'] = 800000000;
    $config['max_width'] = 102400000;
    $config['max_height'] = 768000000;
    $this->load->library('upload');
    $this->upload->initialize($config);

    if ($this->upload->do_upload('document14')) {
       
        $file_extension = pathinfo($_FILES['document14']['name'], PATHINFO_EXTENSION);
        $random_filename = uniqid() . '.' . $file_extension;

       
        $new_path = $config['upload_path'] . '/' . $random_filename;
        move_uploaded_file($_FILES['document14']['tmp_name'], $new_path);

        $file_name14 = base_url() . $new_path;
    }
} else {
    $previousData = $this->db->where('id', $rowid)->get('documents')->row();
    $file_name14 = $previousData->document14;
}



    $rowid = $this->input->post('form_reg_id');
    


    $data = array(
       
        'document14'=>$file_name14,
       
    );

   
//   if (!empty($_FILES['sansthanondanionefile']['name'])) {
//     $config['upload_path'] = 'documents';
//     $config['allowed_types'] = '*';
//     $config['max_size'] = 800000000;
//     $config['max_width'] = 102400000;
//     $config['max_height'] = 768000000;
//     $this->load->library('upload');
//     $this->upload->initialize($config);

//     if ($this->upload->do_upload('sansthanondanionefile')) {
//         // Generate a unique filename for 'sansthanondanionefile'
//         $file_extension31111 = pathinfo($_FILES['sansthanondanionefile']['name'], PATHINFO_EXTENSION);
//         $random_filename31111 = uniqid() . '.' . $file_extension31111;

//         // Move the uploaded 'sansthanondanionefile' file with the new filename
//         $new_path = $config['upload_path'] . '/' . $random_filename31111;
//         move_uploaded_file($_FILES['sansthanondanionefile']['tmp_name'], $new_path);

//         $sansthanondanionefile = base_url() . $new_path;
//     }
// } else {
//     $previousData = $this->db->where('id', $rowid)->get('form_registration')->row();
//     $sansthanondanionefile = $previousData->sansthanondanionefile;
// }




// if (!empty($_FILES['sansthanondanitwofile']['name'])) {
//     $config['upload_path'] = 'documents';
//     $config['allowed_types'] = '*';
//     $config['max_size'] = 800000000;
//     $config['max_width'] = 102400000;
//     $config['max_height'] = 768000000;
//     $this->load->library('upload');
//     $this->upload->initialize($config);

//     if ($this->upload->do_upload('sansthanondanitwofile')) {
//         // Generate a unique filename for 'sansthanondanitwofile'
//         $file_extension31112 = pathinfo($_FILES['sansthanondanitwofile']['name'], PATHINFO_EXTENSION);
//         $random_filename31112 = uniqid() . '.' . $file_extension31112;

//         // Move the uploaded 'sansthanondanitwofile' file with the new filename
//         $new_path = $config['upload_path'] . '/' . $random_filename31112;
//         move_uploaded_file($_FILES['sansthanondanitwofile']['tmp_name'], $new_path);

//         $sansthanondanitwofile = base_url() . $new_path;
//     }
// } else {
//     $previousData = $this->db->where('id', $rowid)->get('form_registration')->row();
//     $sansthanondanitwofile = $previousData->sansthanondanitwofile;
// }




// if (!empty($_FILES['sansthanondanithreefile']['name'])) {
//     $config['upload_path'] = 'documents';
//     $config['allowed_types'] = '*';
//     $config['max_size'] = 800000000;
//     $config['max_width'] = 102400000;
//     $config['max_height'] = 768000000;
//     $this->load->library('upload');
//     $this->upload->initialize($config);

//     if ($this->upload->do_upload('sansthanondanithreefile')) {
//         // Generate a unique filename for 'sansthanondanithreefile'
//         $file_extension31113 = pathinfo($_FILES['sansthanondanithreefile']['name'], PATHINFO_EXTENSION);
//         $random_filename31113 = uniqid() . '.' . $file_extension31112;

//         // Move the uploaded 'sansthanondanithreefile' file with the new filename
//         $new_path = $config['upload_path'] . '/' . $random_filename31113;
//         move_uploaded_file($_FILES['sansthanondanithreefile']['tmp_name'], $new_path);

//         $sansthanondanithreefile = base_url() . $new_path;
//     }
// } else {
//     $previousData = $this->db->where('id', $rowid)->get('form_registration')->row();
//     $sansthanondanithreefile = $previousData->sansthanondanithreefile;
// }



// if (!empty($_FILES['sansthanondanifourfile']['name'])) {
//     $config['upload_path'] = 'documents';
//     $config['allowed_types'] = '*';
//     $config['max_size'] = 800000000;
//     $config['max_width'] = 102400000;
//     $config['max_height'] = 768000000;
//     $this->load->library('upload');
//     $this->upload->initialize($config);

//     if ($this->upload->do_upload('sansthanondanifourfile')) {
//         // Generate a unique filename for 'sansthanondanifourfile'
//         $file_extension31114 = pathinfo($_FILES['sansthanondanifourfile']['name'], PATHINFO_EXTENSION);
//         $random_filename31114 = uniqid() . '.' . $file_extension31114;

//         // Move the uploaded 'sansthanondanifourfile' file with the new filename
//         $new_path = $config['upload_path'] . '/' . $random_filename31114;
//         move_uploaded_file($_FILES['sansthanondanifourfile']['tmp_name'], $new_path);

//         $sansthanondanifourfile = base_url() . $new_path;
//     }
// } else {
//     $previousData = $this->db->where('id', $rowid)->get('form_registration')->row();
//     $sansthanondanifourfile = $previousData->sansthanondanifourfile;
// }



// if (!empty($_FILES['sansthanondanifivefile']['name'])) {
//     $config['upload_path'] = 'documents';
//     $config['allowed_types'] = '*';
//     $config['max_size'] = 800000000;
//     $config['max_width'] = 102400000;
//     $config['max_height'] = 768000000;
//     $this->load->library('upload');
//     $this->upload->initialize($config);

//     if ($this->upload->do_upload('sansthanondanifivefile')) {
//         // Generate a unique filename for 'sansthanondanifivefile'
//         $file_extension31115 = pathinfo($_FILES['sansthanondanifivefile']['name'], PATHINFO_EXTENSION);
//         $random_filename31115 = uniqid() . '.' . $file_extension31115;

//         // Move the uploaded 'sansthanondanifivefile' file with the new filename
//         $new_path = $config['upload_path'] . '/' . $random_filename31115;
//         move_uploaded_file($_FILES['sansthanondanifivefile']['tmp_name'], $new_path);

//         $sansthanondanifivefile = base_url() . $new_path;
//     }
// } else {
//     $previousData = $this->db->where('id', $rowid)->get('form_registration')->row();
//     $sansthanondanifivefile = $previousData->sansthanondanifivefile;
// }





  $this->Form_Model->updateRow2($data, 'documents', $rowid);


  $data2 = array(
       
        'adminstatus'=>"notapproved",

        'rejectstatus'=>"resubmitted",
    );  

 $this->Form_Model->updateRow($data2, 'form_registration', $rowid);
  
  
     $this->session->set_flashdata('success','माहिती यशस्वीरीत्या प्राप्त झाली आहे कृपया हा मसुदा तपासा ...!');
     redirect(base_url() . 'form/sucess');




}



 public function sucess()
    {  


   

   $this->load->view('sucess');
  
   

   

}



public function passwordreset()
    {  


   
    $title = "Admin Dashboard";
    

   

   $this->load->view('adminpasswordreset');
  
   

   

}




public function updateadminpassword()
{


        


    $password = md5($this->input->post('password'));
    $confirmpassword = md5($this->input->post('confirmpassword'));
    
if($password==$confirmpassword){

    $data = array(
       
        'password'=>$password,
       
    );

    $rowid=1;

    $this->Form_Model->updateRow3($data, 'registration', $rowid);

  
  
     $this->session->set_flashdata('error','पासवर्ड यशस्वीरीत्या चांगले झाला आहे कृपया लॉगिन करा!');
     redirect(base_url() . 'welcome/login');

}else{

    $this->session->set_flashdata('error','कृपया password आणि confirm password एक सारखे  करावे ');
     redirect(base_url() . 'form/passwordreset');
}


}

}
