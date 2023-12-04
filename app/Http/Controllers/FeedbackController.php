<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Feedback;

class FeedbackController extends Controller
{
    public function index(){
        return view('admin.feedback.index',[
            'feedbacks' => Feedback::latest()->get()
        ]);
    }
    public function create(){
        return view('admin.feedback.create');
    }

    public function saveFeedback(Request $request){
        Feedback::saveFeedback($request);
        return back()->with('message','Info save successfully');
    }
    public function statusFeedback($id){
        Feedback::statusFeedback($id);
        return back()->with('message','status Info update successfully');
    }

    public function feedbackDelete(Request $request){
        Feedback::feedbackDelete($request);
        return back()->with('message','Info Delete successfully');
    }
    public function edit($id)
    {
        return view('admin.feedback.edit', [
            'feedback'   => Feedback::find($id),
        ]);
    }
    public function feedbackUpdate(Request $request, $id)
    {
        Feedback::feedbackUpdate($request, $id);
        return redirect('/feedback')->with('message', 'Feedbacks info updated.');
    }
}
