<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class Upload extends CI_Controller {

    
    public function __construct()
    {
        parent::__construct();
        $this->load->model('upload_model');
    }
    
    public function index()
    {
        $data['title'] = 'Single Upload';
        $data['images'] = $this->upload_model->getDataImage();
        $this->load->view('singleupload/index', $data, FALSE);
        
    }

    public function file(){
        // untuk mengetest data sesuai namenya atau tidak
        // $upload = $_FILES['image']['name'];
        // var_dump($upload);
        // die;

        $upload = $_FILES['image']['name'];
        if($upload){
            // lakukan upload
            $config['allowed_types'] = 'gif|jpg|png|jpeg';
            $config['max_size'] = '2048';
            $config['upload_path'] = './uploads/image/';
            $this->load->library('upload',$config);

            if($this->upload->do_upload('image')){
                // file berhasil di upload

                // ------------- Program untuk mengambil name file
                // $imageName = $this->upload->data('file_name');
                // var_dump($imageName);
                
                $imageName = $this->upload->data('file_name');
                $data = [
                    'image' => $imageName,
                    'title' => $imageName,
                    'date_created' => time()
                ];

                if($this->upload_model->upload($data)>0){
                    $this->session->set_flashdata('status','Data berhasil disimpan');                    
                    redirect('upload','refresh');                   
                }else{
                    // Jika tidak insert data ke database
                    $this->session->set_flashdata('status', 'Server gangguan, Silahkan ulangi kembali');
                    redirect('upload','refresh');                   
                };


            }else{
                // file gagal di upload
                $this->session->set_flashdata('status', $this->upload->display_errors());
                redirect('upload','refresh');
            }
        }else{
            $this->session->set_flashdata('status', 'tidak ada gambar yang di upload');
            redirect('upload','refresh');
            
            
        }
    }

}

/* End of file Upload.php */

?>