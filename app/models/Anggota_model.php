<?php
class Anggota_model
{
    private $table = 'anggota';
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function getAllagota()
    {
        $this->db->query('SELECT * FROM ' . $this->table);
        return $this->db->resultSet();
    }
    public function getagotaByID($id)
    {
        $this->db->query('SELECT * FROM ' . $this->table . ' WHERE id=:id');
        $this->db->bind('id', $id);
        return $this->db->single();
    }
    public function tambahDataAnggota($data)
    {
        $query = "INSERT INTO anggota VALUES
				('', :nama, :ktp, :email, :alamat, '')";
        $this->db->query($query);
        $this->db->bind('nama', $data['nama']);
        $this->db->bind('ktp', $data['ktp']);
        $this->db->bind('email', $data['email']);
        $this->db->bind('alamat', $data['alamat']);
        $this->db->execute();

        return $this->db->rowCount();
    }
    public function hapusDataAnggota($id)
    {
        $query = "DELETE FROM anggota WHERE id=:id";
        $this->db->query($query);
        $this->db->bind('id', $id);
        $this->db->execute();
        return $this->db->rowCount();
    }
    public function ubahDataagota($data)
    {
        $query = "UPDATE anggota SET
			nama=:nama,
			ktp=:ktp,
			email=:email,
			alamat=:alamat
			WHERE id=:id";
        $this->db->query($query);
        $this->db->bind('id', $data['id']);
        $this->db->bind('nama', $data['nama']);
        $this->db->bind('ktp', $data['ktp']);
        $this->db->bind('email', $data['email']);
        $this->db->bind('alamat', $data['alamat']);
        $this->db->execute();
        return $this->db->rowCount();
    }

    public function cariDataagota()
    {
        $keyword = $_POST['keyword'];
        $query = "SELECT * FROM anggota WHERE nama LIKE :keyword";
        $this->db->query($query);
        $this->db->bind('keyword', "%$keyword%");
        $this->db->execute();
        return $this->db->resultSet();
    }
}
