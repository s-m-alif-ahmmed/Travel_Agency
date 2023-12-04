@extends('layouts.app')
@section('title', 'Manage Faq')
@section('body')

        <div class="row mt-5">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header border-bottom">
                        <h3 class="card-title">Manage Faq</h3>

                    </div>
                    <div class="card-body">
                        <p class="text-warning">{{session('message')}}</p>
                        <div class="table-responsive">
                            <table class="table table-bordered text-nowrap border-bottom" id="basic-datatable">
                                <thead>
                                <tr>
                                    <th class="wd-15p border-bottom-0">Serial No.</th>
                                    <th class="wd-15p border-bottom-0">Question</th>
                                    <th class="wd-20p border-bottom-0">Answer</th>
                                    <th class="wd-20p border-bottom-0">Status</th>
                                    <th class="wd-20p border-bottom-0">Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                    @foreach($faqs as $faq)
                                    <tr class="">
                                        <td>{{$loop->iteration}}</td>
                                        <td>{{$faq->question}}</td>
                                        <td>{{$faq->answer}}</td>

                                        <td class="">
                                            @if($faq->status == 1)
                                                <a href="{{ route('faq.status',['id'=>$faq->id]) }}" class="btn btn-primary  btn-sm ">Active</a>
                                            @else
                                                <a href="{{ route('faq.status',['id'=>$faq->id]) }}" class="btn btn-warning btn-sm">Inactive</a>
                                            @endif
                                        </td>
                                        <td>
                                            <a href="{{ route('faq.edit',['id'=>$faq->id]) }}" class="btn btn-primary btn-sm"><span class=""><i class="fa fa-edit"></i></span> Edit</a>
                                            <a href="{{ route('faq.delete',['id'=>$faq->id]) }}" class="btn btn-dark btn-sm m-0"><span class=""><i class="fa fa-trash"></i></span> Delete</a>
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


