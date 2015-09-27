<?php
/**
 * Created by PhpStorm.
 * User: murtafilho
 * Date: 9/26/2015
 * Time: 11:02 AM
 */

namespace CodeCommerce\Http\Controllers;


class HomeController extends Controller
{
    public function index(){
        return view('home');
    }
}