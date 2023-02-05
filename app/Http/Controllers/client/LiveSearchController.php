<?php

<?php
namespace App\Http\Controllers;
use App\Member;
use Spatie\Searchable\Search;
use Illuminate\Http\Request;
class MemberSearchController extends Controller
{
    public function index(Request $request)
    {
        $results = (new Search())
            ->registerModel(Member::class, ['first_name', 'last_name'])
            ->search($request->input('query'));

        return response()->json($results);
    }
}