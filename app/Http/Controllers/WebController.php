<?php

namespace App\Http\Controllers;

use App\Helper\GlobalHelper;
use App\Mail\ContactMail;
use App\Mail\QuoteMail;
use App\Models\Category;
use App\Models\Contact;
use App\Models\Content;
use App\Models\CustomerReview;
use App\Models\Flight;
use App\Models\Newsletter;
use App\Models\Package;
use App\Models\Facility;
use App\Models\Service;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\DataTables;

class WebController extends Controller
{

    public function index()
    {
        $packages = Package::where('active', 1)->get();
        $categories = Category::where('status', 1)->get();
        $subcategories = SubCategory::where('active', 1)
            ->whereHas('category', function ($query) {
                $query->where('status', 1); // Ensure the category status is 1
            })
            ->get();

        $customerreviews = CustomerReview::where('status', 1)->get();
        return view('index', compact('packages','categories','subcategories','customerreviews'));
    }

    public function packageDetails($name)
    {
        $name = str_replace('-', ' ', $name);
        $package = Package::where('name', $name)->firstOrFail();
        $customerreviews = CustomerReview::where('status', 1)->get();
        $packages = Package::where('active', 1)->where('id', '!=', $package->id)->get();

        return view('detail', compact('package','packages','customerreviews'));
    }

    public function subcategoryDetails($slug)
    {
        $contents= Content::get();
        $subcategory = SubCategory::where('slug', $slug)->firstOrFail();
        $customerreviews = CustomerReview::where('status', 1)->get();
        $packages = Package::where('active', 1)->get();

        return view('subcategory', compact('subcategory','packages','customerreviews','contents'));
    }

    public function flightDetails()
    {
        $contents= Content::get();

        $flight = Flight::first();
        $customerreviews = CustomerReview::where('status', 1)->get();
        $packages = Package::where('active', 1)->get();

        return view('flight', compact('contents','flight','packages','customerreviews'));
    }

    public function hajjDetails()
    {
        $contents= Content::get();
        $customerreviews = CustomerReview::where('status', 1)->get();

        return view('Hajj', compact('contents','customerreviews'));
    }

    public function contactForm(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'first_name' => 'required|string',
            'email' => 'required|email',
            'phone_number' => 'required|string',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        $data = Contact::create($request->all());


        // Check if the 'adults' field is present in the request
        if ($request->has('adults')) {
            // Send QuoteMail if 'adults' is present
            Mail::to('Syedtahseenjaved@gmail.com')->send(new QuoteMail($data));
        } else {
            // Send ContactMail if 'adults' is not present
            Mail::to('Syedtahseenjaved@gmail.com')->send(new ContactMail($data));
        }


        return redirect()->back()->with('success', 'Contact message submitted successfully');
    }

    public function newsletterForm(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        $data = Newsletter::create($request->all());

        $data = [
            'data' => $data,
        ];
        return redirect()->back()->with('success', 'Subscribe  successfully');
    }


}
