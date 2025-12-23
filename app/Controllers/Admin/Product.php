<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\Admin\ProductModel;
use App\Models\Admin\CategoryModel;

class Product extends BaseController
{
    protected $ProductModel;
    protected $CategoryModel;

    public function __construct()
    {
       
        $this->ProductModel = new ProductModel();
        $this->CategoryModel = new CategoryModel();
     
    }

    public function index()
    {
        $products = $this->ProductModel->findAll();
        $categories = $this->CategoryModel->findAll();

      
        return view('admin/product_list', [
            'product'    => $products,
            'categories' => $categories
        ]);
    }


    public function add()
    {
        $data = [];

        if($_POST){
        // print_r($_POST);die;
        }
        if ($_POST) {

            // Base upload directory
            $baseUploadDir = FCPATH . 'uploads/products/';

            // Create base products folder if it doesn't exist
            if (!is_dir($baseUploadDir)) {
                mkdir($baseUploadDir, 0777, true);
            }

            /* ---------- PRIMARY IMAGE ---------- */
            $primaryDir = $baseUploadDir . 'primary_images/';
            if (!is_dir($primaryDir)) {
                mkdir($primaryDir, 0777, true);
            }

            $primaryImageName = null;
            $primaryFile = $this->request->getFile('primary_image');
            if ($primaryFile && $primaryFile->isValid() && !$primaryFile->hasMoved()) {
                $primaryImageName = $primaryFile->getRandomName();
                $primaryFile->move($primaryDir, $primaryImageName);
            }

            /* ---------- GALLERY IMAGES ---------- */
            $galleryDir = $baseUploadDir . 'gallery_images/';
            if (!is_dir($galleryDir)) {
                mkdir($galleryDir, 0777, true);
            }

            $galleryImageNames = [];
            $galleryFiles = $this->request->getFiles();

            if (isset($galleryFiles['gallery_images'])) {
                foreach ($galleryFiles['gallery_images'] as $img) {
                    if ($img->isValid() && !$img->hasMoved()) {
                        $name = $img->getRandomName();
                        $img->move($galleryDir, $name);
                        $galleryImageNames[] = $name;
                    }
                }
            }

            /* ---------- INSERT DATA ---------- */
            
            $productData = [
                'product_name'   => $this->request->getPost('product_name'),
                'product_description'   => $this->request->getPost('product_description'),
                'category_id'   => $this->request->getPost('category_id'),
                'product_title'   => $this->request->getPost('product_title'),
                'amazon_links'   => $this->request->getPost('amazon_links'),
                'flipkart_links'   => $this->request->getPost('flipkart_links'),
                'primary_image'  => $primaryImageName,
                'gallery_images' => json_encode($galleryImageNames),
                'created_on'     => date('Y-m-d H:i:s')
            ];

            $this->ProductModel->insert($productData);

            return redirect()->to(base_url('admin/product'))
                ->with('success', 'Product added successfully');
        }

        $data['categories'] = $this->CategoryModel->findAll();
        return view('admin/product', $data);
    }


    public function edit($id)
    {
        $product = $this->ProductModel->find($id);

        if (!$product) {
            return redirect()->to(base_url('admin/product'))
                ->with('error', 'Product not found!');
        }

        if ($_POST) {

            $data = [
                'product_name'  => $this->request->getPost('product_name'),
                'product_description'   => $this->request->getPost('product_description'),
                'category_id'   => $this->request->getPost('category_id'),
                'product_title' => $this->request->getPost('product_title'),
                'amazon_links'   => $this->request->getPost('amazon_links'),
                'flipkart_links'   => $this->request->getPost('flipkart_links'),
                'updated_on'    => date('Y-m-d H:i:s')
            ];

            // Base upload directories
            $baseUploadDir = FCPATH . 'uploads/products/';
            $primaryDir    = $baseUploadDir . 'primary_images/';
            $galleryDir    = $baseUploadDir . 'gallery_images/';

            // Create directories if they don't exist
            if (!is_dir($primaryDir)) mkdir($primaryDir, 0777, true);
            if (!is_dir($galleryDir)) mkdir($galleryDir, 0777, true);

            /* ---------- PRIMARY IMAGE UPDATE ---------- */
            $primaryFile = $this->request->getFile('primary_image');
            if ($primaryFile && $primaryFile->isValid() && !$primaryFile->hasMoved()) {

                // Delete old primary image
                if (!empty($product['primary_image']) && file_exists($primaryDir . $product['primary_image'])) {
                    unlink($primaryDir . $product['primary_image']);
                }

                // Move new primary image
                $primaryImageName = $primaryFile->getRandomName();
                $primaryFile->move($primaryDir, $primaryImageName);
                $data['primary_image'] = $primaryImageName;
            }

            /* ---------- GALLERY IMAGE UPDATE (APPEND) ---------- */
            $existingGallery = json_decode($product['gallery_images'], true) ?? [];

            $galleryFiles = $this->request->getFiles();
            if (isset($galleryFiles['gallery_images']) && !empty($galleryFiles['gallery_images'][0]->getName())) {
                foreach ($galleryFiles['gallery_images'] as $img) {
                    if ($img->isValid() && !$img->hasMoved()) {
                        $name = $img->getRandomName();
                        $img->move($galleryDir, $name);
                        $existingGallery[] = $name;
                    }
                }
                $data['gallery_images'] = json_encode($existingGallery);
            }

            $this->ProductModel->update($id, $data);

            return redirect()->to(base_url('admin/product'))
                ->with('success', 'Product updated successfully');
        }

        $categories = $this->CategoryModel->findAll();
        return view('admin/product', [
            'product' => $product,
            'categories' => $categories
        ]);
    }


    public function delete($id)
    {
        $product = $this->ProductModel->find($id);

        if (!$product) {
            return redirect()->back()
                ->with('error', 'Product not found!');
        }

        /* ---------- DELETE PRIMARY IMAGE ---------- */
        if (!empty($product['primary_image'])) {
            $primaryPath = FCPATH . 'uploads/products/primary_images/' . $product['primary_image'];
            if (file_exists($primaryPath)) {
                unlink($primaryPath);
            }
        }

        /* ---------- DELETE GALLERY IMAGES ---------- */
        if (!empty($product['gallery_images'])) {
            $galleryImages = json_decode($product['gallery_images'], true);

            if (is_array($galleryImages)) {
                foreach ($galleryImages as $img) {
                    $galleryPath = FCPATH . 'uploads/products/gallery_images/' . $img;
                    if (file_exists($galleryPath)) {
                        unlink($galleryPath);
                    }
                }
            }
        }

        /* ---------- DELETE PRODUCT ROW ---------- */
        $this->ProductModel->delete($id);

        return redirect()->to(base_url('admin/product'))
            ->with('success', 'Product and images deleted successfully!');
    }


    public function delete_gallery_img()
    {
        // Only allow POST
        if (!$this->request->getMethod() === 'post') {
            return redirect()->back()->with('error', 'Invalid request!');
        }

        $productId  = $this->request->getPost('product_id');
        $imageName  = $this->request->getPost('image_name');

        if (!$productId || !$imageName) {
            return redirect()->back()->with('error', 'Invalid parameters!');
        }

        $product = $this->ProductModel->find($productId);
        if (!$product) {
            return redirect()->back()->with('error', 'Product not found!');
        }

        // Decode gallery images
        $galleryImages = json_decode($product['gallery_images'], true) ?? [];

        // Check if image exists in DB array
        if (!in_array($imageName, $galleryImages)) {
            return redirect()->back()->with('error', 'Image not found!');
        }

        // File path
        $filePath = FCPATH . 'uploads/products/gallery_images/' . $imageName;

        // Delete file from folder
        if (file_exists($filePath)) {
            unlink($filePath);
        }

        // Remove image from array
        $galleryImages = array_values(
            array_diff($galleryImages, [$imageName])
        );

        // Update DB
        $this->ProductModel->update($productId, [
            'gallery_images' => json_encode($galleryImages)
        ]);

        return redirect()->back()->with('success', 'Gallery image deleted successfully!');
    }

    public function delete_primary_img()
    {
        $productId = $this->request->getPost('product_id');

        if (!$productId) {
            return redirect()->back()->with('error', 'Invalid product!');
        }

        $product = $this->ProductModel->find($productId);
        if (!$product) {
            return redirect()->back()->with('error', 'Product not found!');
        }

        // If no primary image, nothing to delete
        if (empty($product['primary_image'])) {
            return redirect()->back()->with('error', 'No primary image found!');
        }

        // File path
        $filePath = FCPATH . 'uploads/products/primary_images/' . $product['primary_image'];

        // Delete file
        if (file_exists($filePath)) {
            unlink($filePath);
        }

        // ✅ UPDATE WITH DATA (IMPORTANT)
        $this->ProductModel->update($productId, [
            'primary_image' => null
        ]);

        return redirect()->back()->with('success', 'Primary image deleted successfully!');
    }


}
