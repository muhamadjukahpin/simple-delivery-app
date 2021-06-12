<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Country;
use Illuminate\Http\Request;

class CountryController extends Controller
{
    public function index()
    {
        $data['title'] = 'PT.X | Countries';
        $data['titleBread'] = 'Countries';
        $data['countries'] = Country::paginate(10);
        return view('admin.country.index', $data);
    }
}
