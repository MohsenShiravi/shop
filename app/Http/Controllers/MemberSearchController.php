<?php
namespace App\Http\Controllers;
use App\Models\Product;
use Spatie\Searchable\Search;
use Illuminate\Http\Request;
class MemberSearchController extends Controller
{
    public function index(Request $request)
    {
        $results = (new Search())
            ->registerModel(Product::class, ['name', 'description'])
            ->search($request->input('name'));

        return response()->json($results);
    }
}