@extends('layouts.app')
@section('title', 'Update Faq')
@section('body')

    <div class="row mt-5">
        <div class="col-lg-12">
            <div class="card box-shadow-0">
                <div class="card-header border-bottom">
                    <h4 class="card-title">FAQ Add Form</h4>
                </div>
                <div class="card-body">
                    <p class="text-primary">{{session('message') }}</p>
                    <form action="{{route('faq.update', ['id' => $faq->id])}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="form-group col-md-12">
                                <label class="col-md-3 form-label">Choose Tour Package</label>
                                <div class="col-md-9">
                                    <select class="form-control select2-show-search form-select border-warning" data-placeholder="Choose one" name="tour_id">
                                        <option value="" selected disabled>Choose One</option>
                                        @foreach($packages as $item)
                                            <option value="{{$item->id}}" {{$faq->tour_id == $item->id ? 'selected' : ' '}}>{{$item->tour_title}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="guest_count" class="form-label mb-3">Question</label>
                                <input type="text" class="form-control border-secondary" placeholder="Question" value="{{$faq->question}}" name="question">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="guest_count" class="form-label mb-3">Answer</label>
                                <input type="text" class="form-control border-success" placeholder="Answer" value="{{$faq->answer}}" name="answer">
                            </div>

                            <button type="submit" class="btn btn-primary mt-3">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection

