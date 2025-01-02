<?php

namespace App\Http\Controllers;

class HomeController extends Controller
{
    function index(){

        $servicios = [
            [
                'img' => 'service-1.jpg',
                'title' => 'Quality Maintain',
                'description' => 'Dolor nonumy sed eos sed lorem diam amet eos magna. Dolor kasd lorem duo stet kasd justo.'
            ],
            [
                'img' => 'service-2.jpg',
                'title' => 'Individual Approach',
                'description' => 'Dolor nonumy sed eos sed lorem diam amet eos magna. Dolor kasd lorem duo stet kasd justo.'
            ],
            [
                'img' => 'service-3.jpg',
                'title' => 'Celebration Ice Cream',
                'description' => 'Dolor nonumy sed eos sed lorem diam amet eos magna. Dolor kasd lorem duo stet kasd justo.'
            ],
            [
                'img' => 'service-4.jpg',
                'title' => 'Delivery To Any Point',
                'description' => 'Dolor nonumy sed eos sed lorem diam amet eos magna. Dolor kasd lorem duo stet kasd justo.'
            ]
        ];



        return view('home',['servicios'=> $servicios]);
    }

}
