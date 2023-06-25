<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Jobs\ProductExcelProcess;
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
        $products = Product::paginate(15);
        return view('home', ['products' => $products]);
    }

    // public function show()
    // {
    //     $products = Product::paginate(15);
    //     return view('show', ['products' => $products]);
    // }

    public function store(Request $request)
    {
        // $products = [];
        $request->validate([
            'excel_file' => 'required|mimes:xlsx'
        ]);

        $products = (new FastExcel)->import($request->file('excel_file'), function ($row) {
            return $row;
        });


        $chunks = ($products->chunk(1000))->toArray();
        foreach ($chunks as $chunk) {
            ProductExcelProcess::dispatch($chunk);
        }
        return redirect('home')->with('success', 'Data imported successfully');
    }
}
