<?php

namespace App\Http\Controllers;

use App\Mail\BookingConfirmationMail;
use App\Models\Package;
use App\Models\PackageCategory;
use App\Models\Place;
use App\Models\Faq;
use App\Models\PackagePrice;
use App\Models\ClientReview;
use Illuminate\Http\Request;
use Mail;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        return view('website.home.index', [
            'request' => $request,
            'places' => Place::where('status', 1)->get(),
            'tours'  => Package::where('status', 1)->orderBy('id', 'desc')->get(),
            'reviews'=> ClientReview::where('status', 1)->orderBy('created_at', 'desc')->get(),
        ]);
    }


//    public function homeSearch(Request $request)
//    {
//        $place = $request->input('place');
//        $tour_start_date = $request->input('tour_start_date');
//        $tour_end_date = $request->input('tour_end_date');
//        $person = $request->input('person');
//        $children = $request->input('children');
//        $adult = $request->input('adult');
//
//        $searchBlogs = Package::query();
//
//        if ($tour_start_date && !$tour_end_date) {
//            // Case: Only tour_start_date provided
//            $searchBlogs->where('place_id', 'LIKE', '%' . $place . '%')
//                ->where(function ($query) use ($tour_start_date, $person, $children, $adult) {
//                    $query->where('tour_start_date', '<=', $tour_start_date . " 23:59:59")
//                        ->where('tour_end_date', '>=', $tour_start_date . " 00:00:00");
//                })
//                ->where('person', '>=', $person)
//                ->where('children', '>=', $children)
//                ->where('adult', '>=', $adult);
//        } elseif (!$tour_start_date && $tour_end_date) {
//            // Case: Only tour_end_date provided
//            $searchBlogs->where('place_id', 'LIKE', '%' . $place . '%')
//                ->where(function ($query) use ($tour_end_date, $person, $children, $adult) {
//                    $query->where('tour_start_date', '<=', $tour_end_date . " 23:59:59")
//                        ->where('tour_end_date', '>=', $tour_end_date . " 00:00:00");
//                })
//                ->where('person', '>=', $person)
//                ->where('children', '>=', $children)
//                ->where('adult', '>=', $adult);
//        } elseif ($tour_start_date && $tour_end_date) {
//            // Case: Both tour_start_date and tour_end_date provided
//            $searchBlogs->where('place_id', 'LIKE', '%' . $place . '%')
//                ->where(function ($query) use ($tour_start_date, $tour_end_date) {
//                    $query->where(function ($innerQuery) use ($tour_start_date, $tour_end_date, $person, $children, $adult) {
//                        $innerQuery->where('tour_start_date', '>=', $tour_start_date . " 00:00:00")
//                            ->where('tour_end_date', '<=', $tour_end_date . " 23:59:59");
//                    })->orWhere(function ($innerQuery) use ($tour_start_date, $tour_end_date, $person, $children, $adult) {
//                        $innerQuery->where('tour_start_date', '<=', $tour_start_date . " 00:00:00")
//                            ->where('tour_end_date', '>=', $tour_end_date . " 23:59:59");
//                    });
//                })
//                ->where('person', '>=', $person)
//                ->where('children', '>=', $children)
//                ->where('adult', '>=', $adult);
//        }else {
//            // Case: No date provided
//            $searchBlogs->where('place_id', 'LIKE', '%' . $place . '%');
//        }
//
//        $searchResults = $searchBlogs->get();
//
//        if ($searchResults->isEmpty()) {
//            return view('website.home.search', [
//                'tourTypes' => PackageCategory::where('status', 1)->get(),
//                'lowestPrices' => PackagePrice::all(),
//                'tours' => Package::all(),
//            ], compact('searchResults'))->with('message', 'No matching result found.');
//        } else {
//            return view('website.home.search', [
//                'tourTypes' => PackageCategory::where('status', 1)->get(),
//                'lowestPrices' => PackagePrice::all(),
//                'tours' => Package::all(),
//            ], compact('searchResults'));
//        }
//    }

    public function homeSearch(Request $request)
    {
        $place = $request->input('place');
        $tour_start_date = $request->input('tour_start_date');
        $tour_end_date = $request->input('tour_end_date');
        $person = $request->input('person');
        $children = $request->input('children');
        $adult = $request->input('adult');

        $searchBlogs = Package::query();

        if ($tour_start_date && !$tour_end_date) {
            // Case: Only tour_start_date provided
            $searchBlogs->where('place_id', 'LIKE', '%' . $place . '%')
                ->where(function ($query) use ($tour_start_date, $person, $children, $adult) {
                    $query->where('tour_start_date', '<=', $tour_start_date . " 23:59:59")
                        ->where('tour_end_date', '>=', $tour_start_date . " 00:00:00")
                        ->where('package_id.person', '=', $person)
                        ->where('package_id.children', '=', $children)
                        ->where('package_id.adult', '=', $adult);
                });
        } elseif (!$tour_start_date && $tour_end_date) {
            // Case: Only tour_end_date provided
            $searchBlogs->where('place_id', 'LIKE', '%' . $place . '%')
                ->where(function ($query) use ($tour_end_date, $person, $children, $adult) {
                    $query->where('tour_start_date', '<=', $tour_end_date . " 23:59:59")
                        ->where('tour_end_date', '>=', $tour_end_date . " 00:00:00")
                        ->where('package_id.person', '=', $person)
                        ->where('package_id.children', '=', $children)
                        ->where('package_id.adult', '=', $adult);
                });
        } elseif ($tour_start_date && $tour_end_date) {
            // Case: Both tour_start_date and tour_end_date provided
            $searchBlogs->where('place_id', 'LIKE', '%' . $place . '%')
                ->where(function ($query) use ($tour_start_date, $tour_end_date, $person, $children, $adult) {
                    $query->where(function ($innerQuery) use ($tour_start_date, $tour_end_date, $person, $children, $adult) {
                        $innerQuery->where('tour_start_date', '>=', $tour_start_date . " 00:00:00")
                            ->where('tour_end_date', '<=', $tour_end_date . " 23:59:59")
                            ->where('package_id.person', '=', $person)
                            ->where('package_id.children', '=', $children)
                            ->where('package_id.adult', '=', $adult);
                    })->orWhere(function ($innerQuery) use ($tour_start_date, $tour_end_date, $person, $children, $adult) {
                        $innerQuery->where('tour_start_date', '<=', $tour_start_date . " 00:00:00")
                            ->where('tour_end_date', '>=', $tour_end_date . " 23:59:59")
                            ->where('package_id.person', '=', $person)
                            ->where('package_id.children', '=', $children)
                            ->where('package_id.adult', '=', $adult);
                    });
                });
        } else {
            // Case: No date provided
            $searchBlogs->where('place_id', 'LIKE', '%' . $place . '%');
        }

        $searchResults = $searchBlogs->get();

        if ($searchResults->isEmpty()) {
            return view('website.home.search', [
                'tourTypes' => PackageCategory::where('status', 1)->get(),
                'lowestPrices' => PackagePrice::all(),
                'tours' => Package::all(),
            ], compact('searchResults'))->with('message', 'No matching result found.');
        } else {
            return view('website.home.search', [
                'tourTypes' => PackageCategory::where('status', 1)->get(),
                'lowestPrices' => PackagePrice::all(),
                'tours' => Package::all(),
            ], compact('searchResults'));
        }
    }



    public function packageSearch(Request $request)
    {
        $query = Package::where('status', 1);

        // Title and Duration Search
        if ($request->has('title') && $request->has('duration')) {
            $query->where('tour_title', 'like', '%' . $request->input('title') . '%')
                ->where(function ($query) use ($request) {
                    $duration = $request->input('duration');
                    $query->whereRaw("DATEDIFF(tour_end_date, tour_start_date) <= $duration");
                });
        }
        // Title Search
        elseif ($request->has('title')) {
            $query->where('tour_title', 'like', '%' . $request->input('title') . '%');
        }
        // Duration Search
        elseif ($request->has('duration')) {
            $query->where(function ($query) use ($request) {
                $duration = $request->input('duration');
                $query->whereRaw("DATEDIFF(tour_end_date, tour_start_date) <= $duration");
            });
        }

         // Rating Search
        if ($request->has('ratings') && is_array($request->input('ratings'))) {
            $ratings = $request->input('ratings');
            $query->whereIn('tour_rating', $ratings);
        }
        // Tour Type Search
        if ($request->has('tour_types') && is_array($request->input('tour_types'))) {
            $tourTypes = $request->input('tour_types');
            $query->whereIn('package_category_id', $tourTypes);
        }
        // Continue with other search criteria...

        // Filter based on the lowest price
        if ($request->has('lowestPrice')) {
            $price = $request->input('lowestPrice');
            $query->where('lowest_price', '<=', $price);
        }

        $lowestPrices = PackagePrice::select('package_id', DB::raw('MIN(price) as min_price'))
        ->groupBy('package_id')
        ->get();
        $tourtypes = PackageCategory::where('status', 1)->get();
        $tours = $query->orderBy('created_at', 'desc') // Assuming 'created_at' is in the 'packages' table
            ->latest()
            ->paginate(5)
            ->appends(request()->all());

        return view('website.home.packages', [
            'tours' => $tours,
            'tourTypes' => $tourtypes,
            'lowestPrices' => $lowestPrices
        ]);
    }

    public function packageDetail($id)
    {
        $lowestPrices = PackagePrice::select('package_id', DB::raw('MIN(price) as min_price'))
        ->groupBy('package_id')
        ->get();
        return view('website.package.index', [
            'package' => Package::find($id),
            'lowestPrices' => $lowestPrices,
            'packages' => Package::where('status', 1)->orderBy('id', 'desc')->get(),
            'faqs' => Faq::where('tour_id', $id)->get()
        ]);
    }

    public function contact()
    {
        return view('website.contact.index');
    }

    public function places(){

        $places = Place::where('status', 1)->orderBy('created_at', 'desc')
        ->latest()
        ->paginate(9)
        ->appends(request()->all());

        return view('website.home.places', ['places'=>$places]);
    }
    public function packages()
    {
        $lowestPrices = PackagePrice::select('package_id', DB::raw('MIN(price) as min_price'))
        ->groupBy('package_id')
        ->get();
        $tourtypes = PackageCategory::where('status', 1)->get();
        return view('website.home.packages', [

            'tours' => Package::where('status', 1)->orderBy('id', 'desc')
            ->latest()
            ->paginate(5)
            ->appends(request()->all()),
            'lowestPrices' => $lowestPrices,
            'tourTypes' => $tourtypes]);
    }
}
