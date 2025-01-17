<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Klien extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
       
    }

    public function index()
    {
      
        $this->load->view('templates/header');
        $this->load->view('templates/klien_sidebar');
        $this->load->view('klien/dashboard');
        $this->load->view('templates/footer');
    }

    public function add_temp()
    {
        
        //jika ada gambar
        $photo = $_FILES['file']['name'];

        if ($photo) {
            $config['allowed_types'] = 'xlsx|docx|pdf|jpeg|png';
            $config['max_size'] = '2048';
            $config['upload_path'] = './assets/files/';

            $this->load->library('upload', $config);
            $this->upload->initialize($config);

            if ($this->upload->do_upload('file')) {

                $photo = $this->upload->data('file_name');
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible">' . $this->upload->display_errors() . '</div>');
                $referred_from = $this->session->userdata('referred_from');
                redirect($referred_from, 'refresh');
            }
        }
        $data          = [
            'no_tiket' => $this->input->post('no_tiket'),
            'perihal'  => $this->input->post('perihal'),
            'file'     => $photo,
            'user_id'  => $this->input->post('user_id'),
            'nama'     => $this->input->post('nama'),
            'kategori' => $this->input->post('kategori')

        ];
        $this->db->insert('tiket_temp', $data);
        $this->session->set_flashdata('pesan', 'Pelaporan Added!');

        redirect('klien/pengajuan');
    }

    public function fungsi_delete_temp($id)
    {
        $this->load->model('Temp_model', 'temp_model');
        $this->temp_model->hapus_temp($id);
        $this->session->set_flashdata('pesan', 'Data Deleted!');
        Redirect(Base_url('klien/pengajuan'));
    }

    public function fungsi_pengajuan()
    {
        $this->pelaporan_model->add_pelaporan();
        $this->session->set_flashdata('pesan', 'Pelaporan Success!');
        $this->pelaporan_model->delete_pelaporan();
        Redirect(Base_url('klien/datapelaporan'));
    }


    public function tiket_temp()
    {
        $this->load->model('Temp_model', 'temp_model');
        $data['nama_kateogori'] = $this->db->get('tiket_temp')->result_array();
        $data['tiket_temp'] = $this->temp_model->getTiketTemp();

        $this->load->view('templates/header');
        $this->load->view('templates/klien_sidebar');
        $this->load->view('klien/pengajuan', $data);
        $this->load->view('templates/footer');
    }

    public function pengajuan()
    {
        $data['noTiket'] = $this->client_model->getkodeticket();
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $this->load->model('Category_model', 'category_model');
        $data['nama_kategori'] = $this->db->get('category')->result_array();
        $this->load->model('Temp_model', 'temp_model');
        $data['nama_kategori'] = $this->db->get('tiket_temp')->result_array();
        $data['category'] = $this->category_model->getCategory();
        $data['tiket_temp'] = $this->temp_model->getTiketTemp1();

        $this->load->view('templates/header');
        $this->load->view('templates/klien_sidebar');
        $this->load->view('klien/pengajuan', $data);
        $this->load->view('templates/footer');
    }

    #data pelaporan
    public function datapelaporan()
    {
        $this->load->model('Klienpelaporan_model', 'klienpelaporan_model');
        // $data['nama_kategori'] = $this->db->get('pelaporan')->result_array();
        $data['datapelaporan'] = $this->klienpelaporan_model->getKlienPelaporanTemp();
        
        $this->load->view('templates/header');
        $this->load->view('templates/klien_sidebar');
        $this->load->view('klien/data_pelaporan', $data);
        $this->load->view('templates/footer');
    }

}