<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\m_barang;
use CodeIgniter\HTTP\Request;

class c_barang extends BaseController
{

    public function __construct()
    {
        $this->barangModel = new m_barang();
        session()->set('number', 1);
        session()->set('chart', []);
    }

    public function index()
    {
        $db = \Config\Database::connect();

        // variable
        $barang = $db->query('select * from barang')->getResultArray();
        $list_id = $db->query('select id from barang')->getResultArray();
        $chart = [];

        // get session data
        foreach ($list_id as $key => $value) {
            $val = $value['id'];
            array_push($chart, session()->get("barang[$val]"));
        }

        return view('v_index', compact('barang', 'chart'));
    }

    public function details($id)
    {

        // dd(session()->get());

        $data['barang'] = $this->barangModel->find($id);
        $data['number'] = 1;

        $db = \Config\Database::connect();
        $list_id = $db->query('select id from barang')->getResultArray();

        $data['chart'] = [];
        foreach ($list_id as $key => $value) {
            $val = $value['id'];
            array_push($data['chart'], session()->get("barang[$val]"));
        }

        return view('v_details', $data);
    }

    // TAMBAH CHART
    public function addToChart($id)
    {
        // dd($id);
        // DEFINE CONST
        define('index', $id);
        define('arraybarang', 'barang[' . index . ']');

        // session()->number += 1;
        $data['barang'] = $this->barangModel->find($id);

        array_push($data['barang'], $this->request->getVar('quant[1]'));
        array_push($data['barang'], $this->request->getVar('total_harga'));
        // dd($data['barang']);

        session()->set(arraybarang, $data['barang']);
        // dd(session()->get());

        $db = \Config\Database::connect();
        $data['barang'] = $this->barangModel->findAll();
        $data['chart'] = session()->get();

        $list_id = $db->query('select id from barang')->getResultArray();
        $data['chart'] = [];
        foreach ($list_id as $key => $value) {
            $val = $value['id'];
            array_push($data['chart'], session()->get("barang[$val]"));
        }
        session()->set('sessionchart', $data['chart']);

        return redirect()->to("/details/$id");
    }

    public function add_chart($id)
    {
        $db = \Config\Database::connect();

        // $result = $db->table('order')->insert([
        //     'jumlah' => $this->request->getVar('count[1]'),
        //     'harga' => $this->request->getVar('total_harga'),
        //     'barang_id' => $id
        // ]);

        dd($this->request->getPost());

        // return redirect()->to("/details/$id");
    }

    public function deleteChart($id)
    {
        $index = "barang[$id]";
        session()->remove($index);
        return redirect()->back();
    }

    public function checkout()
    {
        $db = \Config\Database::connect();
        $data['barang'] = $this->barangModel->findAll();
        $data['chart'] = session()->get();

        $list_id = $db->query('select id from barang')->getResultArray();
        $data['chart'] = [];
        foreach ($list_id as $key => $value) {
            $val = $value['id'];
            array_push($data['chart'], session()->get("barang[$val]"));
        }
        return view('v_checkout', $data);
    }

    public function checkout_store()
    {
        $db = \Config\Database::connect();

        $chart = [];
        $total_transaksi = 0;
        $barang = $db->query('select * from barang')->getResultArray();

        // get data barang pada chart
        foreach (session()->get('sessionchart') as $key => $value) {
            if ($value != null) {
                array_push($chart, $value);
            }
        }

        // update data barang pada chart
        foreach ($chart as $key => $value) {
            // isi total transaksi
            $total_transaksi += $value[1];

            // update stok barang
            $id_barang = $value['id'];
            $stok = $barang[$id_barang - 1]['stok'] - $value[0];
            $db->query("update barang set stok = $stok where id = $id_barang ");
        }

        // transaksi baru
        $transaksi_baru = $this->request->getPost();
        $transaksi_baru['total_transaksi'] = $total_transaksi;
        $transaksi_baru['tanggal'] = date("Y-m-d");
        unset($transaksi_baru["csrf_test_name"]);
        $db->table('transaksi')->insert($transaksi_baru);

        // get transaksi baru
        $transaksi = $db->query('SELECT * FROM transaksi order by created_at desc LIMIT 1')->getRowArray();

        // insert order
        foreach ($chart as $key => $value) {
            $db->table('order')->insert([
                'jumlah' => $value[0],
                'harga' => $value[1],
                'transaksi_id' => $transaksi['id'],
                'barang_id' => $value['id']
            ]);
        }

        // hapus chart
        $list_id = $db->query('select id from barang')->getResultArray();

        $data['chart'] = [];
        foreach ($list_id as $key => $value) {
            $val = $value['id'];
            session()->remove("barang[$val]");
        }

        // back to home
        return redirect()->to('/');
    }

    public function checkout_success()
    {
        $db = \Config\Database::connect();
        $transaksi = $db->query('SELECT * FROM transaksi ORDER BY created_at DESC LIMIT 1')->getRowArray();
        $id = $transaksi['id'];
        $order = $db->query("SELECT * FROM order WHERE transaksi_id = $id")->getResultArray();
    }

    public function nilai()
    {
        $db = \Config\Database::connect();
        $data['nama'] = $this->request->getVar('nama');
        $data['title'] = "Mahasiswa";
        $data['content_view'] = "v_nilai";
        if ($this->request->getFile('fileexcel') !== null) {
            $file_excel = $this->request->getFile('fileexcel');
            $ext = $file_excel->getClientExtension();
            if ($ext == 'xls') {
                $render = new \PhpOffice\PhpSpreadsheet\Reader\Xls();
            } else {
                $render = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
            }
        } else {
            $path = FCPATH . "/assets/excel/nilaimhs.xlsx";
            $file_excel = new \CodeIgniter\Files\File($path);
            $render = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
        }
        $data['excel_file'] = $this->request->getFile('fileexcel');
        // dd($data['excel_file']);

        $spreadsheet = $render->load($file_excel);

        $data['mahasiswa'] = $spreadsheet->getActiveSheet()->toArray();
        session()->set('arrayExcel', $data['mahasiswa']);
        // dd($data['mahasiswa'][1][2]);

        $db = \Config\Database::connect();
        $list_id = $db->query('select id from barang')->getResultArray();

        $data['chart'] = [];
        foreach ($list_id as $key => $value) {
            $val = $value['id'];
            array_push($data['chart'], session()->get("barang[$val]"));
        }

        echo view('v_nilai', $data);
    }

    public function prodi()
    {
        $db = \Config\Database::connect();
        $mahasiswa = $db->query('SELECT * FROM mahasiswa INNER JOIN prodi ON mahasiswa.prodi_id=prodi.id')->getResultArray();
        $list_id = $db->query('select id from barang')->getResultArray();
        $chart = [];
        foreach ($list_id as $key => $value) {
            $val = $value['id'];
            array_push($chart, session()->get("barang[$val]"));
        }

        // dd($mahasiswa);
        return view('v_mahasiswa', compact('mahasiswa', 'chart'));
    }
}
