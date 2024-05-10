<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
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
}
