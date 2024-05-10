<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use stdClass;

class UserController extends Controller
{

    public function index(Request $request)
    {
        return view('index');
    }

    public function callSession(Request $request)
    {
        return redirect()->back()->with('status', 'Berhasil memanggil sesi');
    }



    public function getAdmin(User $user)
    {
        $products = Product::where('user_id', $user->id)->get();
        return view('admin_page', ['products' => $products, 'user' => $user]);
    }

    public function editProduct(Request $request, User $user, Product $product)
    {
        return view('edit_product', ['product' => $product, 'user' => $user]);
    }

    public function updateProduct(Request $request, User $user, Product $product)
    {
        if (!$request->filled('image')) {
            return redirect()->back()->with('error', 'Error. Field Gambar wajib diisi.');
        } else if (!$request->filled('nama')) {
            return redirect()->back()->with('error', 'Error. Field Nama wajib diisi.');
        } else if (!$request->filled('berat')) {
            return redirect()->back()->with('error', 'Error. Field Berat wajib diisi.');
        } else if (!$request->filled('harga')) {
            return redirect()->back()->with('error', 'Error. Field Harga wajib diisi.');
        } else if (!$request->filled('stok')) {
            return redirect()->back()->with('error', 'Error. Field Stok wajib diisi.');
        } else if ($request->kondisi === 0) {
            return redirect()->back()->with('error', 'Error. Field Kondisi wajib diisi.');
        } else if (!$request->filled('deskripsi')) {
            return redirect()->back()->with('error', 'Error. Field Deskripsi wajib diisi.');
        }

        if ($product->user_id === $user->id) {
            $product->name = $request->nama;
            $product->stock = $request->stok;
            $product->weight = $request->berat;
            $product->price = $request->harga;
            $product->description = $request->deskripsi;
            $product->condition = $request->kondisi;
            $product->image = $request->image;
            $product->save();
        }

        return redirect()->route('admin_page', ['user' => $user->id])->with('message', 'Berhasil update data');
    }

    public function deleteProduct(Request $request, User $user, Product $product)
    {
        if ($product->user_id === $user->id) {
            $product->delete();
        }
        return redirect()->back()->with('status', 'Berhasil menghapus data');
    }





    public function show(Request $request)
    {
        $varInsert = "Halo ini adalah variable yang disisipkan";
        $varOther = "Variable ini merupakan variable lain yang disisipkan";
        return view('show', compact('varInsert', 'varOther'));
    }











    public function getFormRequest()
    {
        return view('form_request');
    }

    public function sendRequest(Request $request)
    {
        dd($request->gender);
    }


    public function cafe(Request $request)
    {
        $list = [
            [
                'menu' => 'Espresso',
                'price' => 18000,
                'description' => 'Espresso adalah minuman kopi khas Italia yang disajikan dalam cangkir kecil. Ini dibuat dengan mengekstrak kopi yang sangat pekat dari bubuk kopi halus menggunakan mesin espresso yang menerapkan tekanan tinggi. Espresso memiliki rasa kopi yang kaya dan intens, dengan lapisan crema berminyak di atasnya. ',
                'image' => 'https://www.acouplecooks.com/wp-content/uploads/2020/09/Latte-Art-066s.jpg'
            ],
            [
                'menu' => 'Macchiato',
                'price' => 20000,
                'description' => 'Macchiato adalah minuman kopi yang berasal dari Italia yang terdiri dari espresso yang dicampur dengan sedikit susu atau busa susu. Nama "macchiato" berasal dari bahasa Italia yang berarti "bercak" atau "menandai", yang mengacu pada tambahan susu yang hanya sedikit dan memberikan tanda pada espresso yang kuat.',
                'image' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQMvyNxUJj8bEHdD-3gc0ktbaYkXZO9qfbnhoZ2GA23cw&s'
            ],
            [
                'menu' => 'Latte',
                'price' => 25000,
                'description' => 'Latte adalah minuman kopi yang populer yang terdiri dari espresso dicampur dengan susu panas dan ditutupi dengan lapisan busa susu. Rasio kopi dengan susu biasanya adalah satu shot espresso untuk sebagian besar susu panas, dan lapisan busa susu di atasnya memberikan tekstur yang lembut dan kaya.',
                'image' => 'https://www.allrecipes.com/thmb/Wh0Qnynwdxok4oN0NZ1Lz-wl0A8=/1500x0/filters:no_upscale():max_bytes(150000):strip_icc()/9428203-9d140a4ed1424824a7ddd358e6161473.jpg'
            ],
            [
                'menu' => 'Capuccino',
                'price' => 19000,
                'description' => 'Cappuccino adalah minuman kopi yang terdiri dari espresso, susu panas, dan busa susu. Minuman ini memiliki rasio kopi dengan susu yang seimbang, yaitu satu shot espresso dengan jumlah susu yang sama dengan busa susu di atasnya.',
                'image' => 'https://insanelygoodrecipes.com/wp-content/uploads/2023/06/Cup-of-Cappuccino-1024x1024.jpg'
            ],
        ];
        return view('cafe', ['list' => $list]);
    }

    public function handleRequest(Request $request, User $user)
    {
        return view('handle_request', ['user' => $user]);
    }

    public function postRequest(Request $request, User $user)
    {
        if (!$request->filled('image')) {
            return redirect()->back()->with('error', 'Error. Field Gambar wajib diisi.');
        } else if (!$request->filled('nama')) {
            return redirect()->back()->with('error', 'Error. Field Nama wajib diisi.');
        } else if (!$request->filled('berat')) {
            return redirect()->back()->with('error', 'Error. Field Berat wajib diisi.');
        } else if (!$request->filled('harga')) {
            return redirect()->back()->with('error', 'Error. Field Harga wajib diisi.');
        } else if (!$request->filled('stok')) {
            return redirect()->back()->with('error', 'Error. Field Stok wajib diisi.');
        } else if ($request->kondisi === 0) {
            return redirect()->back()->with('error', 'Error. Field Kondisi wajib diisi.');
        } else if (!$request->filled('deskripsi')) {
            return redirect()->back()->with('error', 'Error. Field Deskripsi wajib diisi.');
        }

        Product::create([
            'user_id' => $user->id,
            'image' => $request->image,
            'name' => $request->nama,
            'weight' => $request->berat,
            'price' => $request->harga,
            'condition' => $request->kondisi,
            'stock' => $request->stok,
            'description' => $request->deskripsi,
        ]);

        // return redirect()->route('get_product');
        return redirect()->route('admin_page', ['user' => $user->id]);
    }

    public function getProduct()
    {
        $data = Product::all();
        // $user = User::find(2);
        // $data = $user->products;
        // return view('list_product')->with('products', $data);
        return view('products')->with('products', $data);
    }


    public function getProfile(Request $request, User $user)
    {
        $user = User::with('summarize')->find($user->id);
        // dd($user);
        return view('profile', ['user' => $user]);
    }
}
