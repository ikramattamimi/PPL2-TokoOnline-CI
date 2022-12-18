<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Database\Migrations\Barang;
use App\Models\Barang_model as ModelsBarang;
use CodeIgniter\HTTP\Request;

class BarangController extends BaseController
{

    public function __construct()
    {
        $this->barangModel = new ModelsBarang();
        $this->session = \Config\Services::session();
        $this->session->set('number', 1);
    }

    public function index()
    {
        $db = \Config\Database::connect();
        $data['barang'] = $this->barangModel->findAll();
        $data['chart'] = $this->session->get();
        
        $list_id = $db->query('select id from barang')->getResultArray();
        $data['chart'] = [];
        foreach ($list_id as $key => $value) {
            $val = $value['id'];
            array_push($data['chart'], $this->session->get("barang[$val]"));
        }

        // dd($this->session->get());
        
        return view('index', $data);
    }

    public function checkout()
    {
        $db = \Config\Database::connect();
        $data['barang'] = $this->barangModel->findAll();
        $data['chart'] = $this->session->get();
        
        $list_id = $db->query('select id from barang')->getResultArray();
        $data['chart'] = [];
        foreach ($list_id as $key => $value) {
            $val = $value['id'];
            array_push($data['chart'], $this->session->get("barang[$val]"));
        }
        return view('checkout', $data);
    }

    public function checkout_store()
    {
        $db = \Config\Database::connect();

        $chart = [];
        $total_transaksi = 0;

        foreach ($this->session->get('sessionchart') as $key => $value) {
            if ($value != null) {
                array_push($chart, $value);
            }
        }

        foreach ($chart as $key => $value) {
            $total_transaksi += $value[1];            
        }
        
        $transaksi_baru = $this->request->getPost();
        $transaksi_baru['total_transaksi'] = $total_transaksi;
        $transaksi_baru['tanggal'] = date("Y-m-d") ;

        // dd($transaksi_baru);
        
        unset($transaksi_baru["csrf_test_name"]);

        

        $db->table('transaksi')->insert($transaksi_baru);

        $transaksi = $db->query('SELECT * FROM transaksi order by created_at desc LIMIT 1')->getRowArray();
        
        foreach ($chart as $key => $value) {
            $db->table('order')->insert([
                'jumlah' => $value[0],
                'harga' => $value[1],
                'transaksi_id' => $transaksi['id'],
                'barang_id' => $value['id']
            ]);
        }

        $this->session->destroy();

        return redirect()->to('/');
        // return redirect()->to('/checkout/success');

    }

    public function checkout_success(){
        $db = \Config\Database::connect();
        $transaksi = $db->query('SELECT * FROM transaksi ORDER BY created_at DESC LIMIT 1')->getRowArray();
        $id = $transaksi['id'];
        $order = $db->query("SELECT * FROM order WHERE transaksi_id = $id")->getResultArray();



    }

    public function details($id)
    {
        $data['barang'] = $this->barangModel->find($id);
        $data['number'] = 1;
        // dd($data['barang']);

        $db = \Config\Database::connect();
        $list_id = $db->query('select id from barang')->getResultArray();

        $data['chart'] = [];
        foreach ($list_id as $key => $value) {
            $val = $value['id'];
            array_push($data['chart'], $this->session->get("barang[$val]"));
        }

        // dd();
        return view('details', $data);
    }

    public function addToChart($id)
    {
        // DEFINE CONST
        define('index', $id);
        define('arraybarang', 'barang[' . index . ']');

        $this->session->number += 1;
        $data['barang'] = $this->barangModel->find($id);

        array_push($data['barang'], $this->request->getVar('quant[1]'));
        array_push($data['barang'], $this->request->getVar('total_harga'));
        // dd($data['barang']);

        $this->session->set(arraybarang, $data['barang']);
        // dd($this->session->get());

        $db = \Config\Database::connect();
        $data['barang'] = $this->barangModel->findAll();
        $data['chart'] = $this->session->get();
        
        $list_id = $db->query('select id from barang')->getResultArray();
        $data['chart'] = [];
        foreach ($list_id as $key => $value) {
            $val = $value['id'];
            array_push($data['chart'], $this->session->get("barang[$val]"));
        }
        $this->session->set('sessionchart', $data['chart']);

        return redirect()->to("/details/$id");
    }

    public function deleteChart($id)
    {
        $index = "barang[$id]";
        $this->session->remove($index);
        // dd($this->session->get($index));
        return redirect()->back();
    }
}
