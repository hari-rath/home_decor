<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\Admin\GallariesModel;

class Gallaries extends BaseController
{
    protected $GallariesModel;

    public function __construct()
    {
        $this->GallariesModel = new GallariesModel();
        
    }

    public function index()
    {
        $gallaries = $this->GallariesModel->findAll();

        return view('admin/gallaries', [
            'gallaries' => $gallaries
        ]);
    }

    public function add()
    {
        if ($_POST) {
            
            $data = [
                'gallaries_desc' => $this->request->getPost('gallaries_desc'),
                'created_on'    => date('Y-m-d H:i:s')
            ];

            // 1. Handle the Image Upload
            $img = $this->request->getFile('gallaries');

            if ($img->isValid() && ! $img->hasMoved()) {
                
                // 2. Define and Create the Path
                $path = FCPATH . 'uploads/gallaries/';
                
                if (!is_dir($path)) {
                    mkdir($path, 0777, true); // true allows creating nested folders
                }

                // 3. Generate a random name to avoid overwriting files with the same name
                $newName = $img->getRandomName();
                
                // 4. Move the file to the target directory
                $img->move($path, $newName);

                // 5. Save the filename to the database array
                $data['gallaries'] = $newName;
            }

            // Insert into Database
            $this->GallariesModel->insert($data);

            return redirect()->to('admin/gallaries')
                            ->with('success', 'gallaries added successfully');
        }

        return view('admin/gallaries'); // Make sure this path is correct
    }

    public function delete($id)
    {
        // 1. Fetch the record to get the image filename before deleting from DB
        $gallery = $this->GallariesModel->find($id);

        if (!$gallery) {
            return redirect()->back()->with('error', 'Gallery item not found!');
        }

        // 2. Define the path to the image file
        // Note: Ensure this matches the path used in your add/edit functions
        $filePath = FCPATH . 'uploads/gallaries/' . $gallery['gallaries'];

        // 3. Delete the physical file from the folder if it exists
        if (!empty($gallery['gallaries']) && file_exists($filePath)) {
            unlink($filePath);
        }

        // 4. Delete the record from the database
        $this->GallariesModel->delete($id);

        return redirect()->to('admin/gallaries')->with('success', 'Gallery item and image deleted successfully!');
    }
}
