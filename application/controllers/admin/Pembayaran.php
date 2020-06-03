<?php

class Pembayaran extends CI_Controller{

    public $title = "Admin: Pembayaran";
    public $kredit = "Kredit";
    public $tunai = "Tunai";

    public function __construct()
    {
        parent::__construct();
        $this->load->model('admin/pembayaranmodel');
    }

    public function kredit(){
        $filter = $this->pembayaranmodel->filter();
        $metode_pembayaran = $this->pembayaranmodel->metode_pembayaran();
        $kategori = $this->pembayaranmodel->kategori();

        return view('admin/pembayaran/bayar_kredit', ['title' => $this->title, 'filter' => $filter, 'metode_pembayaran' => $metode_pembayaran, 'kategori' => $kategori, 'c_filter' => $this->kredit]);
    }

    public function transaksi(){
        $filter = $this->pembayaranmodel->filter();

        $id_konsumen = $this->input->post('konsumen');
        $kode_item = $this->input->post('kode_item');
        $metode_pembayaran = $this->input->post('metode');
        $kategori = $this->input->post('kategori');
        $aktif = 1;
        
        $this->pembayaranmodel->insert_transaksi($id_konsumen, $kode_item, $metode_pembayaran, $kategori, $aktif);

        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data transaksi  berhasil disimpan!</div>');
        
        redirect('admin/pembayaran/kredit');
    }

    public function kredit_awal(){
        $id_konsumen = $this->input->post('konsumen');
        $kode_item = $this->input->post('kode_item');
        $lama_angsuran = $this->input->post('lama_angsuran');
        $periode = $this->input->post('periode');
        $uang_muka = $this->input->post('uang_muka');

        $lama_angsuran2 = $lama_angsuran . ' ' . $periode;

        $result = $this->pembayaranmodel->harga($id_konsumen, $kode_item);
        $harga = $result['harga'];
        $id_transaksi = $result['id'];
        $sisa_harga = $harga - $uang_muka;

        if($periode == 'bulan'){
            $nominal_pembayaran = round($sisa_harga / $lama_angsuran);
            $jumlah_angsuran = $lama_angsuran;
        }else{
            $lama_angsuran3 = $lama_angsuran * 12;
            $nominal_pembayaran = round($sisa_harga / $lama_angsuran3);
            $jumlah_angsuran = $lama_angsuran3;
        }

        $this->pembayaranmodel->insert_kredit_awal($id_transaksi, $harga, $sisa_harga, $lama_angsuran2, $uang_muka, $jumlah_angsuran, $nominal_pembayaran);

        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data kredit awal berhasil disimpan!</div>');
        
        redirect('admin/pembayaran/kredit');
    }

    public function angsuran(){
        $filter = $this->pembayaranmodel->filter();
        $id_konsumen = $this->input->post('konsumen');
        $kode_item = $this->input->post('kode_item');
        $uang = $this->input->post('uang');

        $kredit = $this->pembayaranmodel->cari_id_kredit($id_konsumen, $kode_item);
        $id_kredit = $kredit['id_kredit'];
        $angsuran_ke = $kredit['angsuran_ke'] + 1;

        $this->pembayaranmodel->transaksi_kredit($id_kredit, $angsuran_ke);
        $bukti_pembayaran = $this->pembayaranmodel->bukti_pembayaran($id_kredit, $angsuran_ke);
        $kode_bukti = $bukti_pembayaran['kode_bukti_pembayaran'];

        $this->pembayaranmodel->pembayaran($kode_bukti, $uang);
        $this->pembayaranmodel->update_kredit($angsuran_ke, $uang, $id_kredit);

        $konsumen = $this->pembayaranmodel->konsumen($id_konsumen); 
        $nama_konsumen = $konsumen['nama_konsumen'];

        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Angsuran Berhasil disimpan</div>');
        
        $this->session->set_flashdata('id', $id_konsumen);
        $this->session->set_flashdata('nama_konsumen', $nama_konsumen);
        $this->session->set_flashdata('kode_item', $kode_item);
        $this->session->set_flashdata('kode_bukti', $kode_bukti);
        $this->session->set_flashdata('angsuran_ke', $angsuran_ke);
        $this->session->set_flashdata('uang', $uang);
        $this->session->set_flashdata('c_filter', $this->kredit);
        $this->session->set_flashdata('filter', $filter);
        $this->session->set_flashdata('title', $this->title);

        redirect('admin/pembayaran/kredit');

        // return view('admin/pembayaran/bayar_kredit', ['id' => $id_konsumen, 'nama_konsumen' => $nama_konsumen, 'kode_item' => $kode_item, 'kode_bukti' => $kode_bukti, 'angsuran_ke' => $angsuran_ke, 'uang' => $uang,  'c_filter' => $this->kredit, 'filter' => $filter, 'title' => $this->title]);

    }

    public function tunai(){
        $filter = $this->pembayaranmodel->filter();
        $kategori = $this->pembayaranmodel->kategori();

        return view('admin/pembayaran/bayar_tunai', ['title' => $this->title, 'filter' => $filter, 'c_filter' => $this->kredit, 'kategori' => $kategori]);
    }

    public function bayar_tunai(){
        $filter = $this->pembayaranmodel->filter();
        $id_konsumen = $this->input->post('konsumen');
        $kode_item = $this->input->post('kode_item');
        $uang = $this->input->post('uang');

        $transaksi = $this->pembayaranmodel->transaksi($id_konsumen, $kode_item);
        $id_transaksi = $transaksi['id'];

        $this->pembayaranmodel->bayar_tunai($id_transaksi, $uang);
        $bukti_pembayaran = $this->pembayaranmodel->bukti_pembayaran_tunai($id_transaksi);
        $kode_bukti = $bukti_pembayaran['kode_bukti_pembayaran'];

        $this->pembayaranmodel->pembayaran($kode_bukti, $uang);

        $konsumen = $this->pembayaranmodel->konsumen($id_konsumen); 
        $nama_konsumen = $konsumen['nama_konsumen'];

        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Transaksi Tunai berhasil disimpan!</div>');
        
        $this->session->set_flashdata('id', $id_konsumen);
        $this->session->set_flashdata('nama_konsumen', $nama_konsumen);
        $this->session->set_flashdata('kode_item', $kode_item);
        $this->session->set_flashdata('kode_bukti', $kode_bukti);
        $this->session->set_flashdata('uang', $uang);
        $this->session->set_flashdata('c_filter', $this->kredit);
        $this->session->set_flashdata('filter', $filter);
        $this->session->set_flashdata('title', $this->title);

        redirect('admin/pembayaran/tunai');

    }

}

?>