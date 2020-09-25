<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function index()
    {
    return view('search');
    }
    
    public function search(Request $request)
        {
        if($request->ajax())
        {
        $output="";
        $products=DB::table('products')->where('email','LIKE','%'.$request->search."%")->get();
        if($products)
        {
        foreach ($products as $key => $product) {
        $output.='<tr>'.
        
        
        '<td>'.$product->title.'</td>'.
        '<td>'.$product->description.'</td>'.
        '<td>'.$product->price.'</td>'.
        '</tr>';
        }
        return Response($output);
    }
}
        }
}
