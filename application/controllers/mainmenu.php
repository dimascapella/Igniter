<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Mainmenu extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('tb_user');
        $this->load->helper('url');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data['user'] = $this->tb_user->ambil_data()->result();
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
        $nama = $this->input->post('nama');
        $email = $this->input->post('email');
        $password = $this->input->post('password');

        $data = array(
            'nama' => $nama,
            'email' => $email,
            'password' => $password
        );
        $this->tb_user->tambah_data('user', $data);
        redirect('mainmenu/index');
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
        redirect('mainmenu/index');
    }

    public function delete($id)
    {
        $where = array('id' => $id);
        $this->tb_user->delete_data('user', $where);
        redirect('mainmenu/index');
    }
}
