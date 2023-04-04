<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class Upload_model extends CI_Model {

    public function upload($data,$type){
        if($type == 'add'){
            $this->db->insert('upload_image',$data);
        }else{
            // var_dump($data); die; //untuk mengecek apakah gambar berhasil dimasukkan
            $this->db->update('upload_image',$data,['id' => $data['id']]);
        }
        return $this->db->affected_rows();
    }

    public function getDataImage(){
        return $this->db->get('upload_image')->result_array();
    }

    public function getDataById($id){
        return $this->db->get_where('upload_image',['id' => $id])->row_array();
    } 

}

/* End of file Upload_model.php */

?>