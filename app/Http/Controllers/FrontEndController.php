<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateContactRequest;
use App\Models\Amenity;
use App\Models\Blog;
use App\Models\Contact;
use App\Models\Developer;
use App\Models\Faq;
use App\Models\FaqCategory;
use App\Models\JobOpening;
use App\Models\PropertyType;
use App\Models\Sale;
use App\Models\Team;
use Illuminate\Support\Facades\Mail;

class FrontEndController
{

    public function index()
    {
         $agents = Team::with('media')->get();
         $amenities  = Amenity::with('media')->get();

        // Determine the chunk size
        $chunkSize = ceil($amenities->count() / 7);
        $chunks = $amenities->chunk($chunkSize);

        $amenities = $chunks->map(function ($chunk) {
             return $chunk->values()->all();
         })->toArray();
        $developers = Developer::all();

        $types = PropertyType::with('media')->withCount('propertyTypeSales')->take(10)->get();
        $properties  = Sale::with('property_types','media')->take(20)->get();
        $blogs = Blog::with('media')->where('status' ,"publish")->get();
        return view('front.index' , compact('properties' ,'types' ,'agents' ,'developers' ,'blogs' ,'amenities'));

    }

    public  function property($slug)
    {
        $featured  = Sale::with('property_types','amenities','media')->where('featured' ,1)->take(10)->get();
        $property  = Sale::with('property_types','amenities','media')->where('slug', $slug)->firstOrFail();
        return view('front.property', compact('property' ,'featured'));
    }

    public  function contact()
    {

        return view('front.contact');
    }
    public  function about()
    {
        $developers = Developer::all();
        return view('front.about' , compact('developers'));
    }
    public  function faq()
    {
        $faqs  = FaqCategory::with('categoryFaqs')->get();
        return view('front.faq' ,compact('faqs'));
    }
    public  function jobs()
    {
        $jobs  = JobOpening::all();
        return view('front.career' ,compact('jobs'));
    }

    public  function lisitng()
    {
        $types = PropertyType::with('media')->withCount('propertyTypeSales')->take(10)->get();
        $amenities  = Amenity::with('media')->get();
        $properties  = Sale::with('property_types','media')->paginate(10);
        $developer = Developer::where('name', request()->get('developer'))->first();
        return view('front.propertyListing', compact('properties' ,'developer' ,'types' ,'amenities') );
    }
    public  function blogs()
    {
        $blogs = Blog::with('media')->paginate(10);

        return view('front.blog', compact('blogs'));
    }
    public  function blogDetail($slug)
    {
        $blogs = Blog::with('media')->latest()->take(3)->get();
        $blog = Blog::with('media')->where('slug',$slug)->firstOrFail();
        return view('front.blogDetail', compact('blog' ,'blogs'));
    }

    function developers()
    {
        $developers = Developer::all();
        return view('front.developers' ,compact('developers'));
    }

    public function store(UpdateContactRequest $contactRequest)
    {

        $contact = Contact::create($contactRequest->all());
        $data = [
            'fullname' => $contact->fullname,
            'phone' => $contact->phone,
            'email' => $contact->email,
            'messageContent' => $contact->message,
        ];
        Mail::send('emails.contact', $data, function ($message) {
            $message->to('office@mprive.com', 'dubai hills estate')->
            subject('Dubai Hills Estate Contact Inquiry');
        });

        return \response()->json([
            "status" => "success",
            "message" =>"Your contact has been received you Team will get Back to you as soon as possible",
        ]);
    }
}
