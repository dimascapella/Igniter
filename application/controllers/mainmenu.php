<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Mainmenu extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('tb_user');
    }

    public function index()
    {
        $config['base_url'] = site_url('mainmenu/index/');
        $config['total_rows'] = $this->db->count_all('user');
        $config['per_page'] = 4;
        $config["uri_segment"] = 3;
        $choice = $config["total_rows"] / $config["per_page"];
        $config["num_links"] = floor($choice);
        $config['first_link']       = 'First';
        $config['last_link']        = 'Last';
        $config['next_link']        = 'Next';
        $config['prev_link']        = 'Prev';
        $config['full_tag_open']    = '<div class="pagging text-center"><nav><ul class="pagination justify-content-center">';
        $config['full_tag_close']   = '</ul></nav></div>';
        $config['num_tag_open']     = '<li class="page-item"><span class="page-link">';
        $config['num_tag_close']    = '</span></li>';
        $config['cur_tag_open']     = '<li class="page-item active"><span class="page-link">';
        $config['cur_tag_close']    = '<span class="sr-only">(current)</span></span></li>';
        $config['next_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['next_tagl_close']  = '<span aria-hidden="true">&raquo;</span></span></li>';
        $config['prev_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['prev_tagl_close']  = '</span>Next</li>';
        $config['first_tag_open']   = '<li class="page-item"><span class="page-link">';
        $config['first_tagl_close'] = '</span></li>';
        $config['last_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['last_tagl_close']  = '</span></li>';
        $this->pagination->initialize($config);
        $data['page'] = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        $data['data'] = $this->tb_user->ambil_data($config["per_page"], $data['page']);
        $data['pagination'] = $this->pagination->create_links();
        $this->load->view('header');
        $this->load->view('main_menu', $data);
    }

    public function validation()
    {
        $this->form_validation->set_rules('nama', 'nama', 'required');
        $this->form_validation->set_rules('email', 'email', 'required');
        $this->form_validation->set_rules('password', 'password', 'required|min_length[5]');
        if ($this->form_validation->run() == false) {
            $this->index();
        } else {
            $this->tambah();
        }
    }

    public function tambah()
    {
        $config['upload_path']          = './assets/upload/';
        $config['allowed_types']        = 'gif|jpg|png';
        $config['max_size']             = 2048;
        $this->upload->initialize($config);
        $image = "";
        $nama = $this->input->post('nama');
        $email = $this->input->post('email');
        $password = $this->input->post('password');
        if (!$this->upload->do_upload('photo')) {
            $image = "";
        } else {
            $image =  $this->upload->file_name;
        }
        $data = array(
            'nama' => $nama,
            'gambar' => $image,
            'email' => $email,
            'password' => $password
        );
        $this->tb_user->tambah_data('user', $data);
        redirect('mainmenu/');
    }

    public function edit($id)
    {
        $where = array('id' => $id);
        $data['user'] = $this->tb_user->edit_data('user', $where)->result();
        $this->load->view('header');
        $this->load->view('form_edit', $data);
    }

    public function update()
    {
        $id = $this->input->post('id');
        $nama = $this->input->post('nama');
        $email = $this->input->post('email');
        $password = $this->input->post('password');

        $data = array(
            'nama' => $nama,
            'email' => $email,
            'password' => $password
        );

        $where = array(
            'id' => $id
        );
        $this->tb_user->update_data('user', $data, $where);
        redirect('mainmenu/');
    }

    public function delete($id)
    {
        $where = array('id' => $id);
        $this->tb_user->delete_data('user', $where);
        redirect('mainmenu/');
    }
}
