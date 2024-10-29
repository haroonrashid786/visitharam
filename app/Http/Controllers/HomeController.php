<?php

namespace App\Http\Controllers;

use App\Helper\GlobalHelper;
use App\Models\Category;
use App\Models\Contact;
use App\Models\Content;
use App\Models\CustomerReview;
use App\Models\Hotel;
use App\Models\HotelFacility;
use App\Models\Newsletter;
use App\Models\Package;
use App\Models\Flight;
use App\Models\FlightData;
use App\Models\SubCategory;
use App\Models\Facility;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\DataTables;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $packages = Package::count();
        $services = Service::count();
        $facilities = Facility::count();
        return view('home', compact('packages', 'services', 'facilities'));
    }



    public function packages(Request $request)
    {
        $data = Package::all();

        if ($request->ajax()) {
            return DataTables::of($data)
                ->addColumn('status', function ($data) {
                    //                    dd($riders);
                    $status = '<span class="badge badge-pill badge-soft-danger font-size-11">InActive</span>';
                    if ($data->active == 1) {
                        $status = '<span class="badge badge-pill badge-soft-success font-size-11">Active</span>';
                    }
                    return $status;
                })
                ->addColumn('hotel', function ($data) {
                    $hotel = $data->hotel->name ?? 'N/A';
                    return $hotel;
                })
                ->addColumn('category', function ($data) {
                    $category = optional($data->category)->name ?? 'N/A';
                    return $category;
                })
                ->addColumn('subcategory', function ($data) {
                    $subcategory = optional($data->subcategory)->name ?? 'N/A';
                    return $subcategory;
                })
                ->addColumn('actions', function ($data) {

                    $actions = '<div class="btn-group-sm" role="group" aria-label="Basic example">
                    <a href="' . route('edit.package', $data->id) . '" class="btn btn-outline-primary btn-sm">Edit</a>
                    <button class="btn btn-outline-danger btn-sm delete-package" data-id="' . $data->id . '">Delete</button>

                                            </div>';
                    return $actions;
                })
                ->rawColumns(['status', 'actions','hotel','category','subcategory'])
                ->make(true);
        }
        return view('packages.index');
    }

    public function addPackage(Request $request)
    {
        $makkahhotels = Hotel::where('status', 1)->where('type',1)->orderby('id','desc')->get();
        $madinahotels = Hotel::where('status', 1)->where('type',2)->orderby('id','desc')->get();
        $categories = Category::where('status', 1)->orderby('id','desc')->get();
        $subcategories = SubCategory::where('active', 1)
            ->whereHas('category', function ($query) {
                $query->where('status', 1); // Ensure the category status is 1
            })
            ->orderBy('id', 'desc')
            ->get();


        return view('packages.edit', compact('categories','makkahhotels','madinahotels','subcategories'));
    }

    public function insertPackage(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'image' => 'image|mimes:jpeg,png,svg,jpg,gif,webp|max:5120',
            'files' => 'required|array',
            'files.*' => 'required|mimes:png,jpg,jpeg,webp,svg,webp',
            'facilities' => 'array',
            'facilities.*.name' => 'nullable|string',
            'facilities.*.image' => 'nullable|mimes:png,jpg,jpeg,svg,gif,webp',
            'services' => 'array',
            'services.*.name' => 'nullable|string',
            'services.*.image' => 'nullable|mimes:png,jpg,jpeg,svg,gif,webp',
        ], [
            'files.required' => 'Please upload at least one file.',
            'files.*.mimes' => 'Each file must be a PNG, JPG, or JPEG file.',
            'facilities.required' => 'Please add at least one facility.',
            'facilities.*.name.required' => 'Each facility must have a name.',
            'facilities.*.image.required' => 'Each facility must have an image.',
            'services.required' => 'Please add at least one service.',
            'services.*.name.required' => 'Each service must have a name.',
            'services.*.image.required' => 'Each service must have an image.',
        ]);


        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        if ($request->has('status') && $request->status == 'on') {
            $request['status'] = 1;
        } else {
            $request['status'] = 0;
        }

        $uploadedFiles = [];
        $filesUploaded = $request->file('files');
        $uploadedFiles = GlobalHelper::uploadAndSaveFile($filesUploaded, 'uploads/packages');

        $package = new Package();
        $uploadedFiles = [];
        $image = '';

        if ($request->hasFile('image')) {
            $uploadedFiles['image'] = $request->file('image');
            $uploadedFiles = GlobalHelper::uploadAndSaveFile($uploadedFiles, 'uploads/packages');

            $image = $uploadedFiles['image'] ?? null;
        } elseif (!empty($id)) {
            $image = $package->image;
        }
        $package->image = $image;
        $package->name = preg_replace('/[-]/', ' ', $request->name);
        $package->days = $request->days;
        $package->nights = $request->nights;
        $package->hotel_id = $request->hotel_id;
        $package->category_id = $request->category_id;
        $package->sub_category_id = $request->sub_category_id;
        $package->price = $request->price;
        $package->description = $request->description;
        $package->active = $request->status;
        $package->star = $request->star;
        $package->save();


        // Handle new file uploads
        if ($request->hasFile('files')) {
            $uploadedFiles = GlobalHelper::uploadAndSaveFile($request->file('files'), 'uploads/packages');
            foreach ($uploadedFiles as $filePath) {
                $filesToAssociate[] = ['file' => $filePath];
            }
            $package->media()->createMany($filesToAssociate);
        }

        $facilities = $request->facilities;
        foreach ($facilities as $facilityData) {
            if (isset($facilityData['status'])) {
                // If status is explicitly provided, use it
                $facilityStatus = $facilityData['status'];
            } else {
                // If status is not provided, use the toggle logic
                $facilityStatus = 0;
            }
            $facilityName= $facilityData['name'];

            $package->facility()->create([
                'name' => $facilityName,
                'status' => $facilityStatus,
            ]);
        }


        $services = $request->services;
        if (is_array($services) && !empty($services)) {
            foreach ($services as $service) {
                if (isset($service['image'])) {
                    $serviceImage = GlobalHelper::uploadAndSaveFile([$service['image']], 'uploads/services')[0];
                } else {
                    // Handle the case where 'image' is not provided, e.g., set a default value or skip the service
                    $serviceImage = null; // Or any default image path you want to set
                }
                $package->service()->create([
                    'name' => $service['name'],
                    'hotel_id' => $service['hotel_id'],
                    'image' => $serviceImage
                ]);
            }
        }

        return redirect()->route('packages')->with('success', 'Package Added Successfully');
    }

    public function editPackage($id)
    {
        $package = Package::with('facility')->find($id);
        $makkahhotels = Hotel::where('status', 1)->where('type',1)->orderby('id','desc')->get();
        $madinahotels = Hotel::where('status', 1)->where('type',2)->orderby('id','desc')->get();
        $categories = Category::where('status', 1)->orderby('id','desc')->get();
        $subcategories = SubCategory::where('active', 1)
            ->whereHas('category', function ($query) {
                $query->where('status', 1); // Ensure the category status is 1
            })
            ->orderBy('id', 'desc')
            ->get();


        return view('packages.edit', compact('package','makkahhotels','madinahotels','categories','subcategories'));
    }

    public function updatePackage($id, Request $request)
    {

        $validator = Validator::make($request->all(), [
            'name' => ['required'],
            'files.*' => 'mimes:png,jpg,jpeg,webp,gif,xls,xlsx,doc,docx,pdf,svg|max:5120',
            'facilities' => 'array',
            'facilities.*.name' => 'nullable|string',
            'facilities.*.image' => 'nullable|mimes:png,jpg,jpeg,webp,gif,svg|max:5120', // Not required, but if provided, must be a valid type
            'services' => 'array',
            'services.*.name' => 'nullable|string',
            'services.*.image' => 'nullable|mimes:png,jpg,jpeg,webp,gif,svg|max:5120',  // Not required, but if provided, must be a valid type
        ], [
            'files.*.mimes' => 'Each file must be a PNG, JPG, JPEG, WEBP, GIF, XLS, XLSX, DOC, DOCX, or PDF file.',
            'facilities.*.name.required' => 'Each facility must have a name.',
            'facilities.*.image.mimes' => 'Each facility image must be a PNG, JPG, JPEG, WEBP, GIF, or SVG file.',
            'services.*.name.required' => 'Each service must have a name.',
            'services.*.image.mimes' => 'Each service image must be a PNG, JPG, JPEG, WEBP, GIF, or SVG file.',
        ]);


        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        if ($request->has('status') && $request->status == 'on') {
            $request['status'] = 1;
        } else {
            $request['status'] = 0;
        }

        $package = Package::find($id);
        $uploadedFiles = [];
        $image = '';

        if ($request->hasFile('image')) {
            $uploadedFiles['image'] = $request->file('image');
            $uploadedFiles = GlobalHelper::uploadAndSaveFile($uploadedFiles, 'uploads/packages');

            $image = $uploadedFiles['image'] ?? null;
        } elseif (!empty($id)) {
            $image = $package->image;
        }
        $package->image = $image;
        $package->name = preg_replace('/[-]/', ' ', $request->name);
        $package->days = $request->days;
        $package->nights = $request->nights;
        $package->price = $request->price;
        $package->description = $request->description;
        $package->hotel_id = $request->hotel_id;
        $package->category_id = $request->category_id;
        $package->sub_category_id = $request->sub_category_id;
        $package->active = $request->status;
        $package->star = $request->star;
        $package->save();

        // Handle new file uploads
        if ($request->hasFile('files')) {
            $uploadedFiles = GlobalHelper::uploadAndSaveFile($request->file('files'), 'uploads/packages');
            foreach ($uploadedFiles as $filePath) {
                $filesToAssociate[] = ['file' => $filePath];
            }
            $package->media()->createMany($filesToAssociate);
        }

        // Handle the removed facilities
        if ($request->filled('removed_facilities')) {
            $removedFacilities = explode(',', $request->removed_facilities);
            Facility::whereIn('id', $removedFacilities)->delete();
        }

        // Handle the removed facilities
        if ($request->filled('deleted_services')) {
            $removedServices = explode(',', $request->deleted_services);
            Service::whereIn('id', $removedServices)->delete();
        }

        // Handle facilities update and creation
        if ($request->has('facilities')) {
            foreach ($request->facilities as $facilityData) {
                if (isset($facilityData['id'])) {
                    // Update existing facility
                    $facility = Facility::find($facilityData['id']);
                    if ($facility) {

                        if (isset($facilityData['status'])) {
                            // If status is explicitly provided, use it
                            $facility->status = $facilityData['status'];
                        } else {
                            // If status is not provided, use the toggle logic
                            $facility->status = 0;
                        }
                        $facility->name = $facilityData['name'];
                        $facility->save();
                    }
                } else {
                    // Create new facility
                    $newFacility = new Facility();
                    if (isset($facilityData['status'])) {
                        // If status is explicitly provided, use it
                        $newFacility->status = $facilityData['status'];
                    } else {
                        // If status is not provided, use the toggle logic
                        $newFacility->status = 0;
                    }
                    $newFacility->name = $facilityData['name'];

                    $newFacility->package_id = $package->id; // Assuming there's a relationship
                    $newFacility->save();
                }
            }
        }

        // Handle services update and creation
        if ($request->has('services')) {
            foreach ($request->services as $serviceData) {
                if (isset($serviceData['id'])) {
                    // Update existing service
                    $service = Service::find($serviceData['id']);
                    if ($service) {
                        $service->name = $serviceData['name'];
                        $service->hotel_id = $serviceData['hotel_id'];
                        if (isset($serviceData['image'])) {
                            $serviceImage = GlobalHelper::uploadAndSaveFile([$serviceData['image']], 'uploads/services')[0];
                            $service->image = $serviceImage;
                        }
                        $service->save();
                    }
                } else {
                    // Create new service
                    $newService = new Service();
                    $newService->name = $serviceData['name'];
                    $newService->hotel_id = $serviceData['hotel_id'];
                    if (isset($serviceData['image'])) {
                        $serviceImage = GlobalHelper::uploadAndSaveFile([$serviceData['image']], 'uploads/services')[0];
                        $newService->image = $serviceImage;
                    }
                    $newService->package_id = $package->id; // Assuming there's a relationship
                    $newService->save();
                }
            }
        }



        return redirect()->route('packages')->with('success', 'Package Updated Successfully');
    }

    public function deletePackage($id)
    {
        Package::find($id)->delete();
        return back()->with('success', 'Package deleted Successfully');
    }

    public function facilityIndex(Request $request)
    {
        $data = Facility::with('package')->orderBy('created_at', 'desc')->get();
        if ($request->ajax()) {
            return DataTables::of($data)
                ->addColumn('image', function ($data) {
                    $imageUrl = asset( $data->image); // Adjust the path accordingly
                    return '<img src="' . $imageUrl . '" alt="Image" class="img-thumbnail" width="50" height="50">';
                })
                ->addColumn('package', function ($data) {
                    $package = $data->package->name ?? 'N/A';
                    return $package;
                })
                ->addColumn('status', function ($data) {
                    $status = '<span class="badge badge-pill badge-soft-danger font-size-11">InActive</span>';
                    if ($data->status == 1) {
                        $status = '<span class="badge badge-pill badge-soft-success font-size-11">Active</span>';
                    }
                    return $status;
                })
                ->addColumn('actions', function ($data) {
                    $actions = '<div class=" btn-group-sm" role="group" aria-label="Basic example">
                    <a  href="' . route('edit.facility', $data->id) . '" class="btn btn-outline-primary btn-sm">Edit</a>
                                        <button class="btn btn-outline-danger btn-sm delete-facility" data-id="' . $data->id . '">Delete</button>

                    </div>';
                    return $actions;
                })
                ->rawColumns(['image','package', 'status', 'actions'])
                ->make(true);
        }
        return view('facility.index');
    }
    public function addFacility()
    {
        $packages = Package::where('active', 1)->get();
        return view('facility.edit', compact('packages'));
    }
    public function storeFacility(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'package_id' => 'required',
            'image' => 'image|mimes:jpeg,png,svg,jpg,gif|max:2048'

        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $facility = new Facility();
        $uploadedFiles = [];
        $image = '';

        if ($request->hasFile('image')) {
            $uploadedFiles['image'] = $request->file('image');
            $uploadedFiles = GlobalHelper::uploadAndSaveFile($uploadedFiles, 'facility_images');

            $image = $uploadedFiles['image'] ?? null;
        } elseif (!empty($id)) {
            $image = $facility->image;
        }
        $facility->image = $image;
        $facility->name = $request->name;
        $facility->package_id = $request->package_id;
        if (!empty($request->status) && $request->status == 'on') {
            $facility->status = 1;
        } else {
            $facility->status = 0;
        }

        $facility->save();

        return redirect()->route('facility.index')->with('success', 'Facility saved successfully.');
    }
    public function editFacility($id)
    {
        $facility = Facility::find($id);
        $packages = Package::where('active', 1)->get();
        return view('facility.edit', compact('facility', 'packages'));
    }
    public function updateFacility(Request $request, $id)
    {
        $facility = Facility::find($id);
        $uploadedFiles = [];
        $image = '';

        if ($request->hasFile('image')) {
            $uploadedFiles['image'] = $request->file('image');
            $uploadedFiles = GlobalHelper::uploadAndSaveFile($uploadedFiles, 'facility_images');

            $image = $uploadedFiles['image'] ?? null;
        } elseif (!empty($id)) {
            $image = $facility->image;
        }
        $facility->image = $image;
        $facility->name = $request->name;
        $facility->package_id = $request->package_id;
        if ($request->status == 'on') {
            $facility->status = 1;
        } else {
            $facility->status = 0;
        }
        $facility->save();

        return redirect()->route('facility.index')->with('success', 'Facility updated successfully.');
    }
    public function deleteFacility($id)
    {
        Facility::find($id)->delete();
        return back()->with('success', 'Facility deleted Successfully');
    }


    public function serviceIndex(Request $request)
    {
        $data = Service::with('package')->orderBy('created_at', 'desc')->get();
        if ($request->ajax()) {
            return DataTables::of($data)
                ->addColumn('image', function ($data) {
                    $imageUrl = asset( $data->image); // Adjust the path accordingly
                    return '<img src="' . $imageUrl . '" alt="Image" class="img-thumbnail" width="50" height="50">';
                })
                ->addColumn('package', function ($data) {
                    $package = $data->package->name ?? 'N/A';
                    return $package;
                })
                ->addColumn('status', function ($data) {
                    $status = '<span class="badge badge-pill badge-soft-danger font-size-11">InActive</span>';
                    if ($data->status == 1) {
                        $status = '<span class="badge badge-pill badge-soft-success font-size-11">Active</span>';
                    }
                    return $status;
                })
                ->addColumn('actions', function ($data) {
                    $actions = '<div class=" btn-group-sm" role="group" aria-label="Basic example">
                    <a  href="' . route('edit.service', $data->id) . '" class="btn btn-outline-primary btn-sm">Edit</a>
                                       <button class="btn btn-outline-danger btn-sm delete-service" data-id="' . $data->id . '">Delete</button>

                                            </div>';
                    return $actions;
                })
                ->rawColumns(['image','package', 'status', 'actions'])
                ->make(true);
        }
        return view('service.index');
    }

    public function addService()
    {
        $packages = Package::where('active', 1)->get();
        return view('service.edit', compact('packages'));
    }
    public function storeService(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'package_id' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048'

        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $service = new Service();
        $uploadedFiles = [];
        $image = '';

        if ($request->hasFile('image')) {
            $uploadedFiles['image'] = $request->file('image');
            $uploadedFiles = GlobalHelper::uploadAndSaveFile($uploadedFiles, 'service_images');

            $image = $uploadedFiles['image'] ?? null;
        } elseif (!empty($id)) {
            $image = $service->image;
        }
        $service->name = $request->name;
        $service->image = $image;
        $service->package_id = $request->package_id;
        if (!empty($request->status) && $request->status == 'on') {
            $service->status = 1;
        } else {
            $service->status = 0;
        }

        $service->save();

        return redirect()->route('service.index')->with('success', 'Service saved successfully.');
    }
    public function editService($id)
    {
        $service = Service::find($id);
        $packages = Package::where('active', 1)->get();
        return view('service.edit', compact('service', 'packages'));
    }
    public function updateService(Request $request, $id)
    {
        $service = Service::find($id);
        $uploadedFiles = [];
        $image = '';

        if ($request->hasFile('image')) {
            $uploadedFiles['image'] = $request->file('image');
            $uploadedFiles = GlobalHelper::uploadAndSaveFile($uploadedFiles, 'service_images');

            $image = $uploadedFiles['image'] ?? null;
        } elseif (!empty($id)) {
            $image = $service->image;
        }
        $service->image = $image;
        $service->name = $request->name;
        $service->package_id = $request->package_id;
        if ($request->status == 'on') {
            $service->status = 1;
        } else {
            $service->status = 0;
        }
        $service->save();

        return redirect()->route('service.index')->with('success', 'Service updated successfully.');
    }
    public function deleteService($id)
    {
        Service::find($id)->delete();
        return back()->with('success', 'Service deleted Successfully');
    }



    public function hotels(Request $request)
    {
        $data = Hotel::all();

        if ($request->ajax()) {
            return DataTables::of($data)
                ->addColumn('status', function ($data) {
                    //                    dd($riders);
                    $status = '<span class="badge badge-pill badge-soft-danger font-size-11">InActive</span>';
                    if ($data->status == 1) {
                        $status = '<span class="badge badge-pill badge-soft-success font-size-11">Active</span>';
                    }
                    return $status;
                })
                ->addColumn('actions', function ($data) {

                    $actions = '<div class="btn-group-sm" role="group" aria-label="Basic example">
                    <a href="' . route('edit.hotel', $data->id) . '" class="btn btn-outline-primary btn-sm">Edit</a>
                    <button class="btn btn-outline-danger btn-sm delete-hotel" data-id="' . $data->id . '">Delete</button>

                                            </div>';
                    return $actions;
                })
                ->rawColumns(['status', 'actions'])
                ->make(true);
        }
        return view('hotels.index');
    }

    public function addHotel(Request $request)
    {
        return view('hotels.edit');
    }

    public function insertHotel(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        if ($request->has('status') && $request->status == 'on') {
            $request['status'] = 1;
        } else {
            $request['status'] = 0;
        }

        $hotel = new Hotel();
        $hotel->name = $request->name;
        $hotel->description = $request->description;
        $hotel->status = $request->status;
        $hotel->type = $request->type;
        $hotel->save();

        // Handle new file uploads
        if ($request->hasFile('files')) {
            $uploadedFiles = GlobalHelper::uploadAndSaveFile($request->file('files'), 'uploads/hotels');
            foreach ($uploadedFiles as $filePath) {
                $filesToAssociate[] = ['file' => $filePath];
            }
            $hotel->media()->createMany($filesToAssociate);
        }

        return redirect()->route('hotels')->with('success', 'Hotel Added Successfully');
    }

    public function editHotel($id)
    {
        $hotel = Hotel::find($id);
        return view('hotels.edit', compact('hotel'));
    }

    public function updateHotel($id, Request $request)
    {

        $validator = Validator::make($request->all(), [
            'name' => ['required'],

        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        if ($request->has('status') && $request->status == 'on') {
            $request['status'] = 1;
        } else {
            $request['status'] = 0;
        }

        $hotel = Hotel::find($id);
        $hotel->name = $request->name;
        $hotel->description = $request->description;
        $hotel->status = $request->status;
        $hotel->type = $request->type;
        $hotel->save();

        // Handle new file uploads
        if ($request->hasFile('files')) {
            $uploadedFiles = GlobalHelper::uploadAndSaveFile($request->file('files'), 'uploads/packages');
            foreach ($uploadedFiles as $filePath) {
                $filesToAssociate[] = ['file' => $filePath];
            }
            $hotel->media()->createMany($filesToAssociate);
        }

        return redirect()->route('hotels')->with('success', 'Hotel Updated Successfully');
    }

    public function deleteHotel($id)
    {
        Hotel::find($id)->delete();
        return back()->with('success', 'Hotel deleted Successfully');
    }


    public function hotelfacilityIndex(Request $request)
    {
        $data = HotelFacility::with('hotel')->orderBy('created_at', 'desc')->get();
        if ($request->ajax()) {
            return DataTables::of($data)
                ->addColumn('image', function ($data) {
                    $imageUrl = asset( $data->image); // Adjust the path accordingly
                    return '<img src="' . $imageUrl . '" alt="Image" class="img-thumbnail" width="50" height="50">';
                })
                ->addColumn('hotel', function ($data) {
                    $hotel = $data->hotel->name ?? 'N/A';
                    return $hotel;
                })
                ->addColumn('status', function ($data) {
                    $status = '<span class="badge badge-pill badge-soft-danger font-size-11">InActive</span>';
                    if ($data->status == 1) {
                        $status = '<span class="badge badge-pill badge-soft-success font-size-11">Active</span>';
                    }
                    return $status;
                })
                ->addColumn('actions', function ($data) {
                    $actions = '<div class=" btn-group-sm" role="group" aria-label="Basic example">
                    <a  href="' . route('edit.hotelfacility', $data->id) . '" class="btn btn-outline-primary btn-sm">Edit</a>
                                        <button class="btn btn-outline-danger btn-sm delete-hotelfacility" data-id="' . $data->id . '">Delete</button>

                    </div>';
                    return $actions;
                })
                ->rawColumns(['image','hotel', 'status', 'actions'])
                ->make(true);
        }
        return view('hotelfacility.index');
    }
    public function addhotelFacility()
    {
        $hotels = Hotel::where('status', 1)->get();
        return view('hotelfacility.edit', compact('hotels'));
    }
    public function storehotelFacility(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
//            'hotel_id' => 'required',
            'image' => 'image|mimes:jpeg,png,svg,jpg,gif|max:2048'

        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $hotelfacility = new HotelFacility();
        $uploadedFiles = [];
        $image = '';
        $icon = '';

        if ($request->hasFile('image')) {
            $uploadedFiles['image'] = $request->file('image');
            $uploadedFiles = GlobalHelper::uploadAndSaveFile($uploadedFiles, 'facility_images');

            $image = $uploadedFiles['image'] ?? null;
        } elseif (!empty($id)) {
            $image = $hotelfacility->image;
        }

        $hotelfacility->image = $image;
        $hotelfacility->name = $request->name;
        $hotelfacility->hotel_id = $request->hotel_id;
        $hotelfacility->description = $request->description;
        if (!empty($request->status) && $request->status == 'on') {
            $hotelfacility->status = 1;
        } else {
            $hotelfacility->status = 0;
        }

        $hotelfacility->save();

        return redirect()->route('hotelfacility.index')->with('success', 'Hotel Facility saved successfully.');
    }
    public function edithotelFacility($id)
    {
        $hotelfacility = HotelFacility::find($id);
        $hotels = Hotel::where('status', 1)->get();
        return view('hotelfacility.edit', compact('hotelfacility', 'hotels'));
    }
    public function updatehotelFacility(Request $request, $id)
    {
        $hotelfacility = HotelFacility::find($id);
        $uploadedFiles = [];
        $image = '';

        if ($request->hasFile('image')) {
            $uploadedFiles['image'] = $request->file('image');
            $uploadedFiles = GlobalHelper::uploadAndSaveFile($uploadedFiles, 'facility_images');

            $image = $uploadedFiles['image'] ?? null;
        } elseif (!empty($id)) {
            $image = $hotelfacility->image;
        }
        $hotelfacility->image = $image;
        $hotelfacility->name = $request->name;
        $hotelfacility->hotel_id = $request->hotel_id;
        $hotelfacility->description = $request->description;

        if ($request->status == 'on') {
            $hotelfacility->status = 1;
        } else {
            $hotelfacility->status = 0;
        }
        $hotelfacility->save();

        return redirect()->route('hotelfacility.index')->with('success', 'Hotel Facility updated successfully.');
    }
    public function deletehotelFacility($id)
    {
        HotelFacility::find($id)->delete();
        return back()->with('success', 'Hotel Facility deleted Successfully');
    }



    public function contactForms(Request $request)
    {
        $data = Contact::all();

        if ($request->ajax()) {
            return DataTables::of($data)

                ->addColumn('email', function ($data) {
                    $email = $data->email;
                    return $email;
                })
                ->addColumn('phone_number', function ($data) {
                    $phoneNumber = $data->country_code . '-' . $data->phone_number;
                    return $phoneNumber;
                })

                ->rawColumns(['email','phone_number'])
                ->make(true);
        }
        return view('contact.index');
    }

    public function newsletterForms(Request $request)
    {
        $data = Newsletter::all();

        if ($request->ajax()) {
            return DataTables::of($data)

                ->addColumn('email', function ($data) {
                    $email = $data->email;
                    return $email;
                })


                ->rawColumns(['email'])
                ->make(true);
        }
        return view('newsletter.index');
    }



    public function customerreviewIndex(Request $request)
    {
        $data = CustomerReview::orderBy('created_at', 'desc')->get();
        if ($request->ajax()) {
            return DataTables::of($data)
                ->addColumn('image', function ($data) {
                    $imageUrl = asset( $data->image); // Adjust the path accordingly
                    return '<img src="' . $imageUrl . '" alt="Image" class="img-thumbnail" width="50" height="50">';
                })
                ->addColumn('status', function ($data) {
                    $status = '<span class="badge badge-pill badge-soft-danger font-size-11">InActive</span>';
                    if ($data->status == 1) {
                        $status = '<span class="badge badge-pill badge-soft-success font-size-11">Active</span>';
                    }
                    return $status;
                })
                ->addColumn('actions', function ($data) {
                    $actions = '<div class=" btn-group-sm" role="group" aria-label="Basic example">
                    <a  href="' . route('edit.customerreview', $data->id) . '" class="btn btn-outline-primary btn-sm">Edit</a>
                                        <button class="btn btn-outline-danger btn-sm delete-customerreview" data-id="' . $data->id . '">Delete</button>

                    </div>';

                    return $actions;
                })
                ->rawColumns(['image', 'status', 'actions'])
                ->make(true);
        }
        return view('customerreview.index');
    }
    public function addcustomerReview()
    {
        return view('customerreview.edit');
    }
    public function storecustomerReview(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'company_name' => 'required',
            'image' => 'image|mimes:jpeg,png,svg,jpg,gif|max:2048'

        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $customerreview = new CustomerReview();
        $uploadedFiles = [];
        $image = '';

        if ($request->hasFile('image')) {
            $uploadedFiles['image'] = $request->file('image');
            $uploadedFiles = GlobalHelper::uploadAndSaveFile($uploadedFiles, 'customer_images');

            $image = $uploadedFiles['image'] ?? null;
        } elseif (!empty($id)) {
            $image = $customerreview->image;
        }
        $customerreview->image = $image;
        $customerreview->name = $request->name;
        $customerreview->company_name = $request->company_name;
        $customerreview->review = $request->review;
        if (!empty($request->status) && $request->status == 'on') {
            $customerreview->status = 1;
        } else {
            $customerreview->status = 0;
        }

        $customerreview->save();

        return redirect()->route('customerreview.index')->with('success', 'Customer Review saved successfully.');
    }
    public function editcustomerReview($id)
    {
        $customerreview = CustomerReview::find($id);

        return view('customerreview.edit', compact('customerreview'));
    }
    public function updatecustomerReview(Request $request, $id)
    {
        $customerreview = CustomerReview::find($id);
        $uploadedFiles = [];
        $image = '';

        if ($request->hasFile('image')) {
            $uploadedFiles['image'] = $request->file('image');
            $uploadedFiles = GlobalHelper::uploadAndSaveFile($uploadedFiles, 'customer_images');

            $image = $uploadedFiles['image'] ?? null;
        } elseif (!empty($id)) {
            $image = $customerreview->image;
        }
        $customerreview->image = $image;
        $customerreview->name = $request->name;
        $customerreview->company_name = $request->company_name;
        $customerreview->review = $request->review;

        if ($request->status == 'on') {
            $customerreview->status = 1;
        } else {
            $customerreview->status = 0;
        }
        $customerreview->save();

        return redirect()->route('customerreview.index')->with('success', 'Customer Review updated successfully.');
    }
    public function deletecustomerReview($id)
    {
        CustomerReview::find($id)->delete();
        return back()->with('success', 'Customer Review deleted Successfully');
    }




    public function categories(Request $request)
    {
        $data = Category::all();

        if ($request->ajax()) {
            return DataTables::of($data)
                ->addColumn('status', function ($data) {
                    //                    dd($riders);
                    $status = '<span class="badge badge-pill badge-soft-danger font-size-11">InActive</span>';
                    if ($data->status == 1) {
                        $status = '<span class="badge badge-pill badge-soft-success font-size-11">Active</span>';
                    }
                    return $status;
                })
                ->addColumn('actions', function ($data) {

                    $actions = '<div class="btn-group-sm" role="group" aria-label="Basic example">
                    <a href="' . route('edit.category', $data->id) . '" class="btn btn-outline-primary btn-sm">Edit</a>
                    <button class="btn btn-outline-danger btn-sm delete-category" data-id="' . $data->id . '">Delete</button>

                                            </div>';
                    return $actions;
                })
                ->rawColumns(['status', 'actions'])
                ->make(true);
        }
        return view('categories.index');
    }

    public function addCategory(Request $request)
    {
        return view('categories.edit');
    }

    public function insertCategory(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        if ($request->has('status') && $request->status == 'on') {
            $request['status'] = 1;
        } else {
            $request['status'] = 0;
        }

        $category = new Category();
        $category->name = $request->name;
        $category->slug = $request->slug;
        $category->status = $request->status;
        $category->save();

        $subcategories = $request->subcategories;

        if (!is_null($subcategories)) {
            foreach ($subcategories as $subcategory) {
                $category->subcategory()->create([
                    'name' => $subcategory['name'],
                ]);
            }
        }


        return redirect()->route('categories')->with('success', 'Category Added Successfully');
    }

    public function editCategory($id)
    {
        $category = Category::find($id);
        return view('categories.edit', compact('category'));
    }

    public function updateCategory($id, Request $request)
    {

        $validator = Validator::make($request->all(), [
            'name' => ['required'],

        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        if ($request->has('status') && $request->status == 'on') {
            $request['status'] = 1;
        } else {
            $request['status'] = 0;
        }

        $category = Category::find($id);
        $category->name = $request->name;
        $category->slug = $request->slug;
        $category->status = $request->status;
        $category->save();

              // Handle the removed subcategories
              if ($request->filled('deleted_subcategories')) {
                $removedSubcategories = explode(',', $request->deleted_subcategories);
                SubCategory::whereIn('id', $removedSubcategories)->delete();
            }

                 // Handle subcategories update and creation
        if ($request->has('subcategories')) {
            foreach ($request->subcategories as $subcategoryData) {
                if (isset($subcategoryData['id'])) {
                    // Update existing subcategories
                    $subcategory = SubCategory::find($subcategoryData['id']);
                    if ($subcategory) {
                        $subcategory->name = $subcategoryData['name'];

                        $subcategory->save();
                    }
                } else {
                    // Create new SubCategory
                    $newCategory = new SubCategory();
                    $newCategory->name = $subcategoryData['name'];
                    $newCategory->category_id = $category->id; // Assuming there's a relationship
                    $newCategory->save();
                }
            }
        }


        return redirect()->route('categories')->with('success', 'Category Updated Successfully');
    }

    public function deleteCategory($id)
    {
        Category::find($id)->delete();
        return back()->with('success', 'Category deleted Successfully');
    }



    public function flights(Request $request)
    {
        $data = Flight::all();

        if ($request->ajax()) {
            return DataTables::of($data)
                ->addColumn('status', function ($data) {
                    $status = '<span class="badge badge-pill badge-soft-danger font-size-11">InActive</span>';
                    if ($data->active == 1) {
                        $status = '<span class="badge badge-pill badge-soft-success font-size-11">Active</span>';
                    }
                    return $status;
                })

                ->addColumn('actions', function ($data) {

                    $actions = '<div class="btn-group-sm" role="group" aria-label="Basic example">
                    <a href="' . route('edit.flight', $data->id) . '" class="btn btn-outline-primary btn-sm">Edit</a>
                    <button class="btn btn-outline-danger btn-sm delete-flight" data-id="' . $data->id . '">Delete</button>

                                            </div>';
                    return $actions;
                })
                ->rawColumns(['status', 'actions'])
                ->make(true);
        }
        return view('flights.index');
    }

    public function addFlight(Request $request)
    {

        return view('flights.edit');
    }

    public function insertFlight(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'services' => 'nullable|array',
            'services.*.name' => 'nullable|string',
            'services.*.image' => 'nullable|mimes:png,jpg,jpeg,svg,gif,webp',
        ], [
            'files.required' => 'Please upload at least one file.',
            'files.*.mimes' => 'Each file must be a PNG, JPG, or JPEG file.',
            'services.required' => 'Please add at least one service.',
            'services.*.name.required' => 'Each service must have a name.',
            'services.*.image.required' => 'Each service must have an image.',
        ]);


        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        if ($request->has('status') && $request->status == 'on') {
            $request['status'] = 1;
        } else {
            $request['status'] = 0;
        }

        $flight = new Flight();

        $flight->name = preg_replace('/[-]/', ' ', $request->name);
        $flight->description = $request->description;
        $flight->active = $request->status;
        $flight->save();

        if ($request->has('services') && is_array($request->services)) {
        $services = $request->services;
        foreach ($services as $service) {
            if (isset($service['image'])) {
                $serviceImage = GlobalHelper::uploadAndSaveFile([$service['image']], 'uploads/flightservices')[0];
            } else {
                // Handle the case where 'image' is not provided, e.g., set a default value or skip the service
                $serviceImage = null; // Or any default image path you want to set
            }
            $flight->flightdata()->create([
                'price' => $service['price'],
                'flight_name' => $service['flight_name'],
                'baggage' => $service['baggage'],
                'image' => $serviceImage
            ]);
        }
    }
        return redirect()->route('flights')->with('success', 'Flight Data Added Successfully');
    }

    public function editFlight($id)
    {
        $flight = Flight::with('flightdata')->find($id);

        return view('flights.edit', compact('flight'));

    }

    public function updateFlight($id, Request $request)
    {

        $validator = Validator::make($request->all(), [
            'name' => ['nullable'],
            'services' => 'array',
            'services.*.name' => 'nullable|string',
            'services.*.image' => 'nullable|mimes:png,jpg,jpeg,webp,gif,svg|max:5120',  // Not required, but if provided, must be a valid type
        ], [
            'services.*.name.required' => 'Each service must have a name.',
            'services.*.image.mimes' => 'Each service image must be a PNG, JPG, JPEG, WEBP, GIF, or SVG file.',
        ]);


        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        if ($request->has('status') && $request->status == 'on') {
            $request['status'] = 1;
        } else {
            $request['status'] = 0;
        }

        $flight = Flight::find($id);
        $flight->name =preg_replace('/[-]/', ' ', $request->name);
        $flight->description = $request->description;
        $flight->active = $request->status;
        $flight->save();



        // Handle the removed facilities
        if ($request->filled('deleted_services')) {
            $removedServices = explode(',', $request->deleted_services);
            FlightData::whereIn('id', $removedServices)->delete();
        }

        // Handle services update and creation
        if ($request->has('services')) {
            foreach ($request->services as $serviceData) {
                if (isset($serviceData['id'])) {
                    // Update existing service
                    $service = FlightData::find($serviceData['id']);
                    if ($service) {
                        $service->price = $serviceData['price'];
                        $service->flight_name = $serviceData['flight_name'];
                        $service->baggage = $serviceData['baggage'];
                        if (isset($serviceData['image'])) {
                            $serviceImage = GlobalHelper::uploadAndSaveFile([$serviceData['image']], 'uploads/flightservices')[0];
                            $service->image = $serviceImage;
                        }
                        $service->save();
                    }
                } else {
                    // Create new service
                    $newService = new FlightData();
                    $newService->price = $serviceData['price'];
                    $newService->flight_name = $serviceData['flight_name'];
                    $newService->baggage = $serviceData['baggage'];
                    if (isset($serviceData['image'])) {
                        $serviceImage = GlobalHelper::uploadAndSaveFile([$serviceData['image']], 'uploads/flightservices')[0];
                        $newService->image = $serviceImage;
                    }
                    $newService->flight_id = $flight->id; // Assuming there's a relationship
                    $newService->save();
                }
            }
        }


        return redirect()->back()->with('success', 'Flights Updated Successfully');

    }


    public function deleteFlight($id)
    {
        Flight::find($id)->delete();
        return back()->with('success', 'Flight deleted Successfully');
    }


    public function contents(Request $request)
    {
        $data = Content::all();

        if ($request->ajax()) {
            return DataTables::of($data)
                ->addColumn('status', function ($data) {
                    //                    dd($riders);
                    $status = '<span class="badge badge-pill badge-soft-danger font-size-11">InActive</span>';
                    if ($data->active == 1) {
                        $status = '<span class="badge badge-pill badge-soft-success font-size-11">Active</span>';
                    }
                    return $status;
                })


                ->addColumn('actions', function ($data) {

                    $actions = '<div class="btn-group-sm" role="group" aria-label="Basic example">
                    <a href="' . route('edit.content', $data->id) . '" class="btn btn-outline-primary btn-sm">Edit</a>
                    <button class="btn btn-outline-danger btn-sm delete-content" data-id="' . $data->id . '">Delete</button>

                                            </div>';
                    return $actions;
                })
                ->rawColumns(['status', 'actions'])
                ->make(true);
        }
        return view('contents.index');
    }

    public function addContent(Request $request)
    {

        return view('contents.edit');
    }

    public function insertContent(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'image' => 'image|mimes:jpeg,png,svg,jpg,gif,webp|max:5120',

        ]);


        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        if ($request->has('status') && $request->status == 'on') {
            $request['status'] = 1;
        } else {
            $request['status'] = 0;
        }


        $content = new Content();

        $image = '';

        if ($request->hasFile('image')) {
            $uploadedFiles['image'] = $request->file('image');
            $uploadedFiles = GlobalHelper::uploadAndSaveFile($uploadedFiles, 'uploads/content');

            $image = $uploadedFiles['image'] ?? null;
        } elseif (!empty($id)) {
            $image = $content->image;
        }
        $content->image = $image;
        $content->name =$request->name;
        $content->page =$request->page;
        $content->description = $request->description;
        $content->active = $request->status;
        $content->save();


        return redirect()->route('contents')->with('success', 'Content Added Successfully');
    }

    public function editContent($id)
    {
        $content = Content::find($id);

        return view('contents.edit',compact('content'));
    }

    public function updateContent($id, Request $request)
    {

        $validator = Validator::make($request->all(), [
            'name' => ['required'],

        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        if ($request->has('status') && $request->status == 'on') {
            $request['status'] = 1;
        } else {
            $request['status'] = 0;
        }

        $content = Content::find($id);
        $image = '';

        if ($request->hasFile('image')) {
            $uploadedFiles['image'] = $request->file('image');
            $uploadedFiles = GlobalHelper::uploadAndSaveFile($uploadedFiles, 'uploads/content');

            $image = $uploadedFiles['image'] ?? null;
        } elseif (!empty($id)) {
            $image = $content->image;
        }
        $content->image = $image;
        $content->name = $request->name;
        $content->page = $request->page;
        $content->description = $request->description;
        $content->active = $request->status;
        $content->save();



        return redirect()->route('contents')->with('success', 'Content Updated Successfully');
    }

    public function deleteContent($id)
    {
        Content::find($id)->delete();
        return back()->with('success', 'Content deleted Successfully');
    }

}
