<?php

namespace App\Controllers;

use App\Models\MakananModel;
use CodeIgniter\Exceptions\PageNotFoundException;

class MakananController extends BaseController
{
    protected $makananModel;

    public function __construct()
    {
        $this->makananModel = new MakananModel();
        helper(['form', 'url', 'text']);
    }

    /**
     * Menampilkan katalog menu Se'i Sapi dengan fitur pencarian & sorting form
     */
    public function index()
    {
        $search    = $this->request->getGet('search');
        $kategori  = $this->request->getGet('kategori');
        $sortBy    = $this->request->getGet('sort_by') ?? 'terjual';
        $sortOrder = strtolower($this->request->getGet('sort_order') ?? 'desc');

        // Whitelist kolom sorting untuk keamanan
        $allowedSortColumns = [
            'harga'         => 'harga',
            'rating'        => 'rating',
            'terjual'       => 'terjual',
            'tingkat_pedas' => 'tingkat_pedas',
            'nama'          => 'nama',
            'created_at'    => 'created_at',
            'berat'         => 'berat',
        ];

        if (!array_key_exists($sortBy, $allowedSortColumns)) {
            $sortBy = 'terjual';
        }

        if (!in_array($sortOrder, ['asc', 'desc'])) {
            $sortOrder = 'desc';
        }

        $builder = $this->makananModel;

        if (!empty($search)) {
            $builder = $builder->groupStart()
                ->like('nama', $search)
                ->orLike('deskripsi', $search)
                ->orLike('kategori', $search)
            ->groupEnd();
        }

        if (!empty($kategori)) {
            $builder = $builder->where('kategori', $kategori);
        }

        $makananList = $builder->orderBy($sortBy, $sortOrder)->findAll();

        // Statistik ringkas untuk banner modern
        $all = $this->makananModel->findAll();
        $totalMenu   = count($all);
        $totalTerjual = array_sum(array_column($all, 'terjual'));
        $avgRating   = $totalMenu > 0 ? round(array_sum(array_column($all, 'rating')) / $totalMenu, 1) : 0;
        $kategoriList = array_unique(array_filter(array_column($all, 'kategori')));

        $data = [
            'title'        => "Katalog Se'i Sapi NTT - prakoso",
            'makanan'      => $makananList,
            'search'       => $search,
            'kategori'     => $kategori,
            'sort_by'      => $sortBy,
            'sort_order'   => $sortOrder,
            'total_menu'   => $totalMenu,
            'total_terjual'=> $totalTerjual,
            'avg_rating'   => $avgRating,
            'kategori_list'=> $kategoriList,
        ];

        return view('makanan/index', $data);
    }

    /**
     * Form Tambah Menu Se'i Sapi
     */
    public function create()
    {
        $data = [
            'title'      => "Tambah Menu Se'i Sapi Baru - prakoso",
            'validation' => \Config\Services::validation(),
        ];

        return view('makanan/create', $data);
    }

    /**
     * Menyimpan data menu Se'i Sapi baru
     */
    public function store()
    {
        $rules = [
            'nama' => [
                'rules'  => 'required|min_length[3]|max_length[150]',
                'errors' => [
                    'required'   => 'Nama menu wajib diisi.',
                    'min_length' => 'Nama menu minimal 3 karakter.',
                    'max_length' => 'Nama menu maksimal 150 karakter.',
                ],
            ],
            'harga' => [
                'rules'  => 'required|numeric|greater_than_equal_to[0]',
                'errors' => [
                    'required'               => 'Harga menu wajib diisi.',
                    'numeric'                => 'Harga harus berupa angka.',
                    'greater_than_equal_to' => 'Harga tidak boleh negatif.',
                ],
            ],
            'kategori' => [
                'rules'  => 'required',
                'errors' => ['required' => 'Kategori menu wajib dipilih/diisi.'],
            ],
            'tingkat_pedas' => [
                'rules'  => 'permit_empty|integer|greater_than_equal_to[1]|less_than_equal_to[5]',
                'errors' => [
                    'integer' => 'Tingkat kepedasan harus bilangan bulat 1-5.',
                ],
            ],
            'berat' => [
                'rules'  => 'permit_empty|integer|greater_than[0]',
                'errors' => ['integer' => 'Berat harus berupa angka dalam gram.'],
            ],
            'gambar_file' => [
                'rules'  => 'permit_empty|is_image[gambar_file]|mime_in[gambar_file,image/jpg,image/jpeg,image/png,image/webp]|max_size[gambar_file,3072]',
                'errors' => [
                    'is_image' => 'File yang diupload harus berupa gambar.',
                    'mime_in'  => 'Format gambar harus jpg, jpeg, png, atau webp.',
                    'max_size' => 'Ukuran gambar maksimal 3MB.',
                ],
            ],
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $nama = $this->request->getPost('nama');
        $slug = url_title($nama, '-', true);

        // Handle upload gambar
        $gambarName = null;
        $fileGambar = $this->request->getFile('gambar_file');
        if ($fileGambar && $fileGambar->isValid() && !$fileGambar->hasMoved()) {
            $gambarName = $fileGambar->getRandomName();
            $fileGambar->move(ROOTPATH . 'public/uploads/makanan', $gambarName);
        } elseif ($this->request->getPost('gambar_url')) {
            $gambarName = trim($this->request->getPost('gambar_url'));
        }

        $insertData = [
            'nama'          => $nama,
            'slug'          => $slug,
            'kategori'      => $this->request->getPost('kategori'),
            'deskripsi'     => $this->request->getPost('deskripsi'),
            'harga'         => $this->request->getPost('harga'),
            'berat'         => $this->request->getPost('berat') ?: 200,
            'tingkat_pedas' => $this->request->getPost('tingkat_pedas') ?: 1,
            'rating'        => $this->request->getPost('rating') ?: 5.0,
            'terjual'       => $this->request->getPost('terjual') ?: 0,
            'gambar'        => $gambarName,
            'status'        => $this->request->getPost('status') ?: 'tersedia',
        ];

        $this->makananModel->insert($insertData);

        return redirect()->to(base_url('makanan'))->with('success', "Menu Se'i Sapi '{$nama}' berhasil ditambahkan!");
    }

    /**
     * Menampilkan detail menu Se'i Sapi
     */
    public function show($id)
    {
        $item = $this->makananModel->find($id);

        if (!$item) {
            throw PageNotFoundException::forPageNotFound("Menu Se'i Sapi tidak ditemukan.");
        }

        $related = $this->makananModel->where('id !=', $id)->orderBy('rating', 'DESC')->findAll(4);

        $data = [
            'title'   => "Detail {$item['nama']} - prakoso",
            'item'    => $item,
            'related' => $related,
        ];

        return view('makanan/show', $data);
    }

    /**
     * Form Edit Menu Se'i Sapi
     */
    public function edit($id)
    {
        $item = $this->makananModel->find($id);

        if (!$item) {
            throw PageNotFoundException::forPageNotFound("Menu Se'i Sapi tidak ditemukan.");
        }

        $data = [
            'title'      => "Edit {$item['nama']} - prakoso",
            'item'       => $item,
            'validation' => \Config\Services::validation(),
        ];

        return view('makanan/edit', $data);
    }

    /**
     * Memperbarui data menu Se'i Sapi
     */
    public function update($id)
    {
        $item = $this->makananModel->find($id);
        if (!$item) {
            throw PageNotFoundException::forPageNotFound("Menu Se'i Sapi tidak ditemukan.");
        }

        $rules = [
            'nama' => [
                'rules'  => 'required|min_length[3]|max_length[150]',
                'errors' => [
                    'required'   => 'Nama menu wajib diisi.',
                    'min_length' => 'Nama menu minimal 3 karakter.',
                    'max_length' => 'Nama menu maksimal 150 karakter.',
                ],
            ],
            'harga' => [
                'rules'  => 'required|numeric|greater_than_equal_to[0]',
                'errors' => [
                    'required'               => 'Harga menu wajib diisi.',
                    'numeric'                => 'Harga harus berupa angka.',
                    'greater_than_equal_to' => 'Harga tidak boleh negatif.',
                ],
            ],
            'kategori' => [
                'rules'  => 'required',
                'errors' => ['required' => 'Kategori menu wajib dipilih/diisi.'],
            ],
            'tingkat_pedas' => [
                'rules'  => 'permit_empty|integer|greater_than_equal_to[1]|less_than_equal_to[5]',
            ],
            'berat' => [
                'rules'  => 'permit_empty|integer|greater_than[0]',
            ],
            'gambar_file' => [
                'rules'  => 'permit_empty|is_image[gambar_file]|mime_in[gambar_file,image/jpg,image/jpeg,image/png,image/webp]|max_size[gambar_file,3072]',
            ],
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $nama = $this->request->getPost('nama');
        $slug = url_title($nama, '-', true);

        $gambarName = $item['gambar'];
        $fileGambar = $this->request->getFile('gambar_file');
        if ($fileGambar && $fileGambar->isValid() && !$fileGambar->hasMoved()) {
            // Hapus gambar lama jika file fisik ada di uploads/makanan
            if (!empty($item['gambar']) && file_exists(ROOTPATH . 'public/uploads/makanan/' . $item['gambar'])) {
                @unlink(ROOTPATH . 'public/uploads/makanan/' . $item['gambar']);
            }
            $gambarName = $fileGambar->getRandomName();
            $fileGambar->move(ROOTPATH . 'public/uploads/makanan', $gambarName);
        } elseif ($this->request->getPost('gambar_url')) {
            $gambarName = trim($this->request->getPost('gambar_url'));
        }

        $updateData = [
            'nama'          => $nama,
            'slug'          => $slug,
            'kategori'      => $this->request->getPost('kategori'),
            'deskripsi'     => $this->request->getPost('deskripsi'),
            'harga'         => $this->request->getPost('harga'),
            'berat'         => $this->request->getPost('berat') ?: 200,
            'tingkat_pedas' => $this->request->getPost('tingkat_pedas') ?: 1,
            'rating'        => $this->request->getPost('rating') ?: 5.0,
            'terjual'       => $this->request->getPost('terjual') ?: 0,
            'gambar'        => $gambarName,
            'status'        => $this->request->getPost('status') ?: 'tersedia',
        ];

        $this->makananModel->update($id, $updateData);

        return redirect()->to(base_url('makanan'))->with('success', "Menu Se'i Sapi '{$nama}' berhasil diperbarui!");
    }

    /**
     * Menghapus menu Se'i Sapi
     */
    public function delete($id)
    {
        $item = $this->makananModel->find($id);

        if ($item) {
            // Hapus file fisik gambar jika tersimpan di folder uploads
            if (!empty($item['gambar']) && file_exists(ROOTPATH . 'public/uploads/makanan/' . $item['gambar'])) {
                @unlink(ROOTPATH . 'public/uploads/makanan/' . $item['gambar']);
            }
            $this->makananModel->delete($id);
            return redirect()->to(base_url('makanan'))->with('success', "Menu '{$item['nama']}' berhasil dihapus.");
        }

        return redirect()->to(base_url('makanan'))->with('error', "Menu tidak ditemukan.");
    }
}
