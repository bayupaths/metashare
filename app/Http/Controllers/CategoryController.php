<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Ramsey\Uuid\Uuid;

class CategoryController extends Controller
{
    public function index()
    {
        return UUid::uuid4()->toString();
    }

    public function detail()
    {
        //
    }
}
