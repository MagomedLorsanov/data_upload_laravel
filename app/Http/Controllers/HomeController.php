<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Rap2hpoutre\FastExcel\FastExcel;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $products = Product::paginate(1);
        return view('home', ['products' => $products]);
    }

    public function show()
    {
        $products = Product::all();
        return view('show', ['products' => $products]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'excel_file' => 'required|mimes:xlsx'
        ]);

        $products = $request->file('excel_file');
        dd($products);
        $chunks = array_chunk($products, 1000);
        $header = [];
        
        foreach ($chunks as $key => $chunk) {
            $data = $chunk;
            if($key == 0) {
                $header = $data[0];
                unset($data[0]);
            }
        }

       ProductExcelProcess::dispatch($data,$header);

        return redirect('home')->with('success','Data imported successfully');
    }
}
