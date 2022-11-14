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
        
        return view('index', $data);
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
        // dd($this->request->getPost());
        // dd($id);
        define('index', $id);
        define('arraybarang', 'barang[' . index . ']');

        $this->session->number += 1;
        $data['barang'] = $this->barangModel->find($id);

        array_push($data['barang'], $this->request->getVar('quant[1]'));
        array_push($data['barang'], $this->request->getVar('total_harga'));
        // dd($data['barang']);

        $this->session->set(arraybarang, $data['barang']);
        // dd($this->session->get());

        return redirect()->to("/details/$id");
    }

    public function deleteChart($id)
    {
        $index = "barang[$id]";
        $this->session->set($index, null);
        // dd($this->session->get($index));
        return redirect()->back();
    }
}
