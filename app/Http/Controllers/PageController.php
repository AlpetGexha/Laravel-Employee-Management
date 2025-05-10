<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    /**
     * Display the home page.
     */
    public function index()
    {
        return view('index');
    }

    /**
     * Display the about page.
     */
    public function about()
    {
        return view('about');
    }

    /**
     * Display the pricing page.
     */
    public function pricing()
    {
        return view('pricing');
    }

    /**
     * Display the blog page.
     */
    public function blog()
    {
        return view('blog');
    }

    /**
     * Display a blog post.
     */
    public function blogDetail($slug)
    {
        return view('blog-details', ['slug' => $slug]);
    }

    /**
     * Display the contact page.
     */
    public function contact()
    {
        return view('contact');
    }

    /**
     * Display the documentation page.
     */
    public function dokumentacioni()
    {
        return view('Dokumentacioni');
    }

    /**
     * Display the login page.
     */
    public function login()
    {
        return view('login');
    }

    /**
     * Display the register page.
     */
    public function register()
    {
        return view('register');
    }

    /**
     * Display the features page.
     */
    public function features()
    {
        return view('features');
    }

    /**
     * Display the testimonials page.
     */
    public function testimonial()
    {
        return view('testimonial');
    }

    /**
     * Display the how it works page.
     */
    public function howItWorks()
    {
        return view('how-it-works');
    }

    /**
     * Display the privacy policy.
     */
    public function privacy()
    {
        return view('privacy');
    }

    /**
     * Display the terms of service.
     */
    public function terms()
    {
        return view('terms');
    }

    /**
     * Display the refund policy.
     */
    public function refund()
    {
        return view('refund');
    }

    /**
     * Display the support policy.
     */
    public function support()
    {
        return view('support');
    }

    /**
     * Display the XML tools page.
     */
    public function xmlTools()
    {
        return view('xml-tools');
    }
}
