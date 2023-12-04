<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PackageCategory;
use App\Http\Requests\packageCategoryRequest;

class PackageCategoryController extends Controller
{
    public function create(){
        return view('admin.package.category.create',[
            'packageCategories' => PackageCategory::all()
        ]);
    }

    public function savePackageCategory(PackageCategoryRequest $request){
        PackageCategory::savePackageCategory($request);
        return back()->with('message','Info save successfully');
    }

    public function statusPackageCategory($id){
        PackageCategory::statusPackageCategory($id);
        return back()->with('message','status Info update successfully');
    }

    public function packageCategoryDelete(Request $request){
        PackageCategory::packageCategoryDelete($request);
        return back()->with('message','Info Delete successfully');
    }

    public function edit($id)
    {
        return view('admin.package.category.edit', [
            'packageCategory'   => PackageCategory::find($id),
            'packageCategories' => PackageCategory::all()

        ]);
    }

    public function packageCategoryUpdate(PackageCategoryRequest $request, $id)
    {
        PackageCategory::packageCategoryUpdate($request, $id);
        return back()->with('message', 'Package Category info updated.');
    }
}
