<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\Admin\CategoryModel;
use App\Models\Admin\ProductModel;

class Category extends BaseController
{
    protected $CategoryModel;

    public function __construct()
    {
        $this->ProductModel = new ProductModel();
        $this->CategoryModel = new CategoryModel();
        helper(['form', 'url']);
    }

    public function index()
    {
        $Categorys = $this->CategoryModel->findAll();

        return view('admin/category_list', [
            'category' => $Categorys
        ]);
    }

    // public function add()
    // {
    //     if ($_POST) {

    //         $data = [
    //             'category_name' => $this->request->getPost('category_name'),
    //             'created_on'   => date('Y-m-d H:i:s')
    //         ];

           
    //         $this->CategoryModel->insert($data);

    //         return redirect()->to('admin/category')
    //                          ->with('success', 'Category added successfully');
    //     }

    //     return view('admin/category');
    // }

    public function add()
    {
        if ($_POST) {
            
            $data = [
                'category_name' => $this->request->getPost('category_name'),
                'created_on'    => date('Y-m-d H:i:s')
            ];

            // 1. Handle the Image Upload
            $img = $this->request->getFile('category_primary_image');

            if ($img->isValid() && ! $img->hasMoved()) {
                
                // 2. Define and Create the Path
                $path = FCPATH . 'uploads/products/category_primary_image/';
                
                if (!is_dir($path)) {
                    mkdir($path, 0777, true); // true allows creating nested folders
                }

                // 3. Generate a random name to avoid overwriting files with the same name
                $newName = $img->getRandomName();
                
                // 4. Move the file to the target directory
                $img->move($path, $newName);

                // 5. Save the filename to the database array
                $data['category_primary_image'] = $newName;
            }

            // Insert into Database
            $this->CategoryModel->insert($data);

            return redirect()->to('admin/category')
                            ->with('success', 'Category added successfully');
        }

        return view('admin/category'); // Make sure this path is correct
    }

    // public function edit($id)
    // {
    //     if ($_POST) {

    //         $this->CategoryModel->update($id, [
    //             'category_name' => $this->request->getPost('category_name'),
    //             'updated_on'   => date('Y-m-d H:i:s')
    //         ]);

    //         return redirect()->to('admin/category');
    //     }

    //     $data['category'] = $this->CategoryModel->find($id);

    //     return view('admin/category', $data);
    // }

    public function edit($id)
    {

        // Fetch the existing record first so we have the old image name
        $oldCategory = $this->CategoryModel->find($id);

        if ($_POST) {
            
            $data = [
                'category_name' => $this->request->getPost('category_name'),
                'updated_on'    => date('Y-m-d H:i:s')
            ];

            // 1. Handle the Image Upload
            $img = $this->request->getFile('category_primary_image');

            // Check if the user actually selected a new file
            if ($img->isValid() && ! $img->hasMoved()) {
                
                $path = FCPATH . 'uploads/products/category_primary_image/';

                // 2. Delete the OLD image from the folder if it exists
                if (!empty($oldCategory['category_primary_image'])) {
                    $oldFilePath = $path . $oldCategory['category_primary_image'];
                    if (file_exists($oldFilePath)) {
                        unlink($oldFilePath); // This removes the old physical file
                    }
                }

                // 3. Prepare the path and save the NEW image
                if (!is_dir($path)) {
                    mkdir($path, 0777, true);
                }

                $newName = $img->getRandomName();
                $img->move($path, $newName);

                // 4. Update the data array with the new filename
                $data['category_primary_image'] = $newName;
            }

            // 5. Perform the update
            $this->CategoryModel->update($id, $data);

            return redirect()->to('admin/category')->with('success', 'Category updated successfully');
        }

        $data['category'] = $oldCategory;
        
        
        // Make sure this view matches your folder structure!
        // If your file is app/Views/admin/category.php, use 'admin/category'
        return view('admin/category', $data); 
    }

    public function delete($id)
    {
        // 1. Fetch the category to delete its primary image
        $category = $this->CategoryModel->find($id);
        if (!$category) {
            return redirect()->back()->with('error', 'Category not found!');
        }

        // Define Paths
        $basePath = FCPATH . 'uploads/products/';
        $catPath     = $basePath . 'category_primary_image/';
        $primaryPath = $basePath . 'primary_images/';
        $galleryPath = $basePath . 'gallery_images/';

        /* ---------- STEP 1: DELETE CATEGORY IMAGE ---------- */
        if (!empty($category['category_primary_image'])) {
            $catFile = $catPath . $category['category_primary_image'];
            if (file_exists($catFile)) {
                unlink($catFile);
            }
        }

        /* ---------- STEP 2: DELETE ASSOCIATED PRODUCTS & IMAGES ---------- */
        // Find all products belonging to this category
        $products = $this->ProductModel->where('category_id', $id)->findAll();

        foreach ($products as $product) {
            // A. Delete Product Primary Image
            if (!empty($product['primary_image'])) {
                $pImg = $primaryPath . $product['primary_image'];
                if (file_exists($pImg)) {
                    unlink($pImg);
                }
            }

            // B. Delete Product Gallery Images (Handling your JSON format)
            if (!empty($product['gallery_images'])) {
                // Decode the ["image1.jpg", "image2.jpg"] string into a PHP Array
                $galleryArray = json_decode($product['gallery_images'], true);
                
                if (is_array($galleryArray)) {
                    foreach ($galleryArray as $fileName) {
                        $fullGPath = $galleryPath . $fileName;
                        if (file_exists($fullGPath)) {
                            unlink($fullGPath);
                        }
                    }
                }
            }
        }

        /* ---------- STEP 3: DATABASE CLEANUP ---------- */
        // Start a transaction to ensure both deletes happen or none do
        $db = \Config\Database::connect();
        $db->transStart();

        // Delete products first (child records)
        $this->ProductModel->where('category_id', $id)->delete();
        
        // Delete the category (parent record)
        $this->CategoryModel->delete($id);

        $db->transComplete();

        if ($db->transStatus() === false) {
            return redirect()->to('admin/category')->with('error', 'Something went wrong during deletion.');
        }

        return redirect()->to('admin/category')->with('success', 'Category and all related products/images have been purged.');
    }
}
