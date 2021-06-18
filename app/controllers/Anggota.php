<?php

class Anggota extends Controller
{
    public function index()
    {
        $data['judul'] = 'Daftar Anggota';
        $data['agt'] = $this->model('Anggota_model')->getAllagota();
        $this->view('templates/header', $data);
        $this->view('anggota/index', $data);
        $this->view('templates/foother');
    }
    public function detail()
    {
        echo json_encode($this->model('Anggota_model')->getagotaByID($_POST['id']));
    }

    public function tambah()
    {
        if ($this->model('Anggota_model')->tambahDataAnggota($_POST) > 0) {
            Flasher::setFlash('Data Anggota Berhasil Ditambahkan', 'Sukses', 'fas fa-check-circle', 'success');
            header('Location: ' . BASEURL . '/anggota');
            exit;
        } else {
            Flasher::setFlash('Data Anggota Gagal Ditambahkan', 'Gagal', 'fas fa-times-circle', 'danger');
            header('Location: ' . BASEURL . '/anggota');
            exit;
        }
    }

    public function delete($id = -99)
    {
        if ($this->model('Anggota_model')->hapusDataAnggota($id) > 0) {
            Flasher::setFlash('Data Anggota Berhasil Dihapus', 'Sukses', 'fas fa-check-circle', 'warning');
            header('Location: ' . BASEURL . '/anggota');
            exit;
        } else if ($this->model('Anggota_model')->hapusDataAnggota($id) == 0) {
            Flasher::setFlash('Tidak Ada Data Anggota Tersebut', 'Gagal', 'fas fa-times-circle', 'danger');
            header('Location: ' . BASEURL . '/anggota');
            exit;
        } else if ($id < 0) {
            Flasher::setFlash('Tidak Ada Data Anggota Tersebut', 'Gagal', 'fas fa-times-circle', 'danger');
            header('Location: ' . BASEURL . '/anggota');
            exit;
        } else {
            Flasher::setFlash('Data Anggota Gagal Dihapus', 'Gagal', 'fas fa-times-circle', 'danger');
            header('Location: ' . BASEURL . '/anggota');
            exit;
        }
    }

    public function ubah()
    {
        if ($this->model('Anggota_model')->ubahDataagota($_POST) > 0) {
            Flasher::setFlash('Data Anggota Berhasil Diubah', 'Sukses', 'fas fa-check-circle', 'success');
            header('Location: ' . BASEURL . '/anggota');
            exit;
        } else {
            Flasher::setFlash('Data Anggota Gagal Diubah', 'Gagal', 'fas fa-times-circle', 'danger');
            header('Location: ' . BASEURL . '/anggota');
            exit;
        }
    }

    public function cari()
    {
        $data['judul'] = 'Daftar Anggota';
        $data['agt'] = $this->model('Anggota_model')->cariDataagota();
        $this->view('templates/header', $data);
        $this->view('anggota/index', $data);
        $this->view('templates/foother');
    }
}
