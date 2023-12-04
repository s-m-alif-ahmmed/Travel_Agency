@extends('layouts.app')
@section('title', 'Update Package Category')
@section('body')

    <div class="row mt-5">
        <div class="col-lg-12">
            <div class="card box-shadow-0">
                <div class="card-header border-bottom">
                    <h4 class="card-title">Update Package Category</h4>
                </div>
                <div class="card-body">
                    <p class="text-primary">{{session('message') }}</p>
                    <form action="{{route('package.category.update', ['id' => $packageCategory->id])}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="form-group col-md-4">
                                <label for="package_category" class="form-label mb-3">Package Category Name </label>
                                <input type="text" class="form-control border-warning" placeholder="Enter Category Name" value="{{$packageCategory->package_category_name}}" name="package_category_name">
                                <p class="alert-danger">{{$errors->first()}}</p>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary mt-3">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="row mt-5">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header border-bottom">
                    <h3 class="card-title">Manage Package Category</h3>

                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered text-nowrap border-bottom" id="basic-datatable">
                            <thead>
                            <tr>
                                <th class="wd-15p border-bottom-0">Serial No.</th>
                                <th class="wd-15p border-bottom-0">Package Category Name</th>
                                <th class="wd-20p border-bottom-0">Status</th>
                                <th class="wd-20p border-bottom-0">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($packageCategories as $item)
                                <tr class="">
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{$item->package_category_name}}</td>
                                    <td class="">
                                        @if($item->status == 1)
                                            <a href="{{ route('package.category.status',['id'=>$item->id]) }}" class="btn btn-primary  btn-sm ">Active</a>
                                        @else
                                            <a href="{{ route('package.category.status',['id'=>$item->id]) }}" class="btn btn-warning btn-sm">Inactive</a>
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{ route('package.category.edit',['id'=>$item->id]) }}" class="btn btn-primary btn-sm"><span class=""><i class="fa fa-edit"></i></span> Edit</a>
                                        <a href="{{ route('package.category.delete',['id'=>$item->id]) }}" class="btn btn-dark btn-sm m-0"><span class=""><i class="fa fa-trash"></i></span> Delete</a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

