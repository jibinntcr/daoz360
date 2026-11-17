<?php

namespace App\Http\Controllers;

use Illuminate\View\View;

class PageController extends Controller
{
    /**
     * Render the DAOZ360 Home Page.
     */
    public function home(): View
    {
        return view('home');
    }

    /**
     * Render the DAOZ360 Pricing Page (/pricing).
     */
    public function pricing(): View
    {
        return view('pricing');
    }

    /**
     * Render the official Privacy Policy Page (/privacy-policy).
     */
    public function privacyPolicy(): View
    {
        return view('privacy-policy');
    }

    /**
     * Render the official Terms & Conditions Page (/terms-conditions).
     */
    public function termsConditions(): View
    {
        return view('terms-conditions');
    }

    /**
     * Render the Contact Us Portal Page (/contact).
     */
    public function contact(): View
    {
        return view('contact');
    }
}
