<?php

namespace App\Http\Controllers;

use App\Http\Resources\SexResource;
use App\Models\Sex;
use Illuminate\Http\Request;

class SexController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return SexResource::collection(Sex::all());
    }
}
