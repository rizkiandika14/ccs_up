
<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Klienpelaporan_model extends CI_Model
{
    public function getKlienPelaporanTemp()
    {

        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $user_id = $this->session->userdata('id_user');
        $query = "SELECT   pelaporan.status, pelaporan.waktu_pelaporan, pelaporan.perihal, pelaporan.user_id, pelaporan.status_ccs, pelaporan.file, pelaporan.priority, pelaporan.maxday, pelaporan.kategori
        FROM pelaporan 
        where user_id = $user_id ORDER BY waktu_pelaporan DESC";
        return $this->db->query($query)->result_array();
    }

    public function getKlienPelaporan2()
    {

        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $user_id = $this->session->userdata('id_user');
        $query = "SELECT   category.nama_kategori, pelaporan.status, pelaporan.waktu_pelaporan, pelaporan.deskripsi_masalah, pelaporan.user_id, pelaporan.status_ccs, pelaporan.file, pelaporan.priority
        FROM pelaporan 
        LEFT JOIN category ON pelaporan.category_id=category.id
        LEFT JOIN user ON pelaporan.user_id = user.id
        where user_id = $user_id";
        return $this->db->query($query)->result_array();
    }

    public function getKlienPelaporan()
    {
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $user_id = $this->session->userdata('id_user');
        $query = "SELECT distinct(nama), id_pelaporan,user_id, kategori, perihal, waktu_pelaporan, status_ccs, file, status, no_tiket, priority, handle_by  FROM pelaporan ORDER BY waktu_pelaporan DESC";
        return $this->db->query($query)->result_array();
    }

    public function getKlienPelaporanAdd()
    {
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $user_id = $this->session->userdata('id_user');
        $query = "SELECT distinct(nama), id_pelaporan,user_id, kategori, perihal, waktu_pelaporan, status_ccs, file, status, no_tiket, priority, maxday  FROM pelaporan WHERE status_ccs='ADDED' ORDER BY waktu_pelaporan DESC";
        return $this->db->query($query)->result_array();
    }

    public function getKlienPelaporanOP()
    {
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $user_id = $this->session->userdata('id_user');
        $query = "SELECT distinct(nama), id_pelaporan,user_id, kategori, perihal, waktu_pelaporan, status_ccs, file, status, no_tiket, priority,maxday  FROM pelaporan WHERE status_ccs='HANDLE' ORDER BY waktu_pelaporan DESC";
        return $this->db->query($query)->result_array();
    }

    public function getKlienPelaporanClose()
    {
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $user_id = $this->session->userdata('id_user');
        $query = "SELECT distinct(nama), id_pelaporan,user_id, kategori, perihal, waktu_pelaporan, status_ccs, file, status, no_tiket, priority, maxday, handle_by, keterangan  FROM pelaporan WHERE status_ccs='CLOSE' ORDER BY waktu_pelaporan DESC";
        return $this->db->query($query)->result_array();
    }

    public function getKlienPelaporanFinish()
    {
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $user_id = $this->session->userdata('id_user');
        $query = "SELECT distinct(nama), id_pelaporan,user_id, kategori, perihal, waktu_pelaporan, status_ccs, file, status, no_tiket, priority, handle_by, maxday, waktu_approve  FROM pelaporan WHERE status_ccs='FINISH' ORDER BY waktu_pelaporan DESC";
        return $this->db->query($query)->result_array();
    }

    //data per helpdesk
    public function getKlienPelaporanHD()
    {
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $user_id = $this->session->userdata('id_user');
        $query = "SELECT distinct(nama), id_pelaporan,user_id, kategori, perihal, waktu_pelaporan, status_ccs, file, status, no_tiket, priority, handle_by, keterangan  FROM pelaporan WHERE status_ccs='HANDLE' AND status='Forward To Helpdesk 1' ORDER BY waktu_pelaporan DESC";
        return $this->db->query($query)->result_array();
    }

    public function getKlienPelaporanHD2()
    {
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $user_id = $this->session->userdata('id_user');
        $query = "SELECT distinct(nama), id_pelaporan,user_id, kategori, perihal, waktu_pelaporan, status_ccs, file, status, no_tiket, priority, handle_by, keterangan  FROM pelaporan WHERE status_ccs='HANDLE' AND status='Forward To Helpdesk 2' ORDER BY waktu_pelaporan DESC";
        return $this->db->query($query)->result_array();
    }

    public function getKlienPelaporanHD3()
    {
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $user_id = $this->session->userdata('id_user');
        $query = "SELECT distinct(nama), id_pelaporan,user_id, kategori, perihal, waktu_pelaporan, status_ccs, file, status, no_tiket, priority, handle_by, keterangan  FROM pelaporan WHERE status_ccs='HANDLE' AND status='Forward To Helpdesk 3' ORDER BY waktu_pelaporan DESC";
        return $this->db->query($query)->result_array();
    }

    public function getKlienPelaporanHD4()
    {
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $user_id = $this->session->userdata('id_user');
        $query = "SELECT distinct(nama), id_pelaporan,user_id, kategori, perihal, waktu_pelaporan, status_ccs, file, status, no_tiket, priority, handle_by, keterangan  FROM pelaporan WHERE status_ccs='HANDLE' AND status='Forward To Helpdesk 4' ORDER BY waktu_pelaporan DESC";
        return $this->db->query($query)->result_array();
    }

    //VIEW FORWARD IMPLEMENTATOR
    public function getKlienPelaporanImplementator()
    {
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $user_id = $this->session->userdata('id_user');
        $query = "SELECT distinct(nama), id_pelaporan,user_id, kategori, perihal, waktu_pelaporan, status_ccs, file, status, no_tiket, priority, handle_by, keterangan  FROM pelaporan WHERE status_ccs='HANDLE' AND status='Forward From Helpdesk 1'  ORDER BY waktu_pelaporan DESC";
        return $this->db->query($query)->result_array();
    }

    public function getKlienPelaporanImplementatorHD2()
    {
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $user_id = $this->session->userdata('id_user');
        $query = "SELECT distinct(nama), id_pelaporan,user_id, kategori, perihal, waktu_pelaporan, status_ccs, file, status, no_tiket, priority, handle_by, keterangan  FROM pelaporan WHERE status_ccs='HANDLE' AND status='Forward From Helpdesk 2'  ORDER BY waktu_pelaporan DESC";
        return $this->db->query($query)->result_array();
    }

    public function getKlienPelaporanImplementatorHD3()
    {
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $user_id = $this->session->userdata('id_user');
        $query = "SELECT distinct(nama), id_pelaporan,user_id, kategori, perihal, waktu_pelaporan, status_ccs, file, status, no_tiket, priority, handle_by, keterangan  FROM pelaporan WHERE status_ccs='HANDLE' AND status='Forward From Helpdesk 3'  ORDER BY waktu_pelaporan DESC";
        return $this->db->query($query)->result_array();
    }

    public function getKlienPelaporanImplementatorHD4()
    {
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $user_id = $this->session->userdata('id_user');
        $query = "SELECT distinct(nama), id_pelaporan,user_id, kategori, perihal, waktu_pelaporan, status_ccs, file, status, no_tiket, priority, handle_by, keterangan  FROM pelaporan WHERE status_ccs='HANDLE' AND status='Forward From Helpdesk 4'  ORDER BY waktu_pelaporan DESC";
        return $this->db->query($query)->result_array();
    }



    //DATA PELAPORAN
    public function getDataPelaporanHD()
    {
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        // $data['handle_by'] = $this->db->get_where('user', ['handle_by' => $this->sessions->userdata['handle_by']])->row_array();
        $user_id = $this->session->userdata('id_user');
        $query = "SELECT distinct(nama), id_pelaporan,user_id, kategori, perihal, waktu_pelaporan, status_ccs, file, status, no_tiket, priority, handle_by, keterangan  FROM pelaporan WHERE status_ccs='CLOSE' OR status='Solved by HD1' ORDER BY waktu_pelaporan DESC";
        return $this->db->query($query)->result_array();
    }

    public function getDataPelaporanHD2()
    {
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $user_id = $this->session->userdata('id_user');
        $query = "SELECT distinct(nama), id_pelaporan,user_id, kategori, perihal, waktu_pelaporan, status_ccs, file, status, no_tiket, priority, handle_by, keterangan  FROM pelaporan WHERE status_ccs='CLOSE' OR status='Solved by HD2' ORDER BY waktu_pelaporan DESC";
        return $this->db->query($query)->result_array();
    }

    public function getDataPelaporanHD3()
    {
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $user_id = $this->session->userdata('id_user');
        $query = "SELECT distinct(nama), id_pelaporan,user_id, kategori, perihal, waktu_pelaporan, status_ccs, file, status, no_tiket, priority, handle_by, keterangan  FROM pelaporan WHERE status_ccs='CLOSE' OR status='Solved by HD3' ORDER BY waktu_pelaporan DESC";
        return $this->db->query($query)->result_array();
    }

    public function getDataPelaporanHD4()
    {
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        // $data['handle_by'] = $this->db->get_where('pelaporan', ['handle_by' => $this->session->userdata('handle_by')])->row_array();
        $user_id = $this->session->userdata('id_user');
        $query = "SELECT distinct(nama), id_pelaporan,user_id, kategori, perihal, waktu_pelaporan, status_ccs, file, status, no_tiket, priority, handle_by, keterangan  FROM pelaporan WHERE status_ccs='CLOSE'  OR  status='Solved by HD4'  ORDER BY waktu_pelaporan DESC";
        return $this->db->query($query)->result_array();
    }

    public function ambil_id_pelaporan($id)
    { 
        $query = "SELECT  id_pelaporan, no_tiket, waktu_pelaporan, perihal, nama, status, status_ccs, kategori, priority, maxday  FROM pelaporan WHERE id_pelaporan='$id'";
        return $this->db->query($query)->result_array();
    }


}




    