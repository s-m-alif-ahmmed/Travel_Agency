<?php

namespace App\Http\Controllers;
use App\Models\Faq;
use App\Models\Package;
use Illuminate\Http\Request;

class FaqController extends Controller
{
    public function index(){
        return view('admin.faqs.index',[
            'faqs' => Faq::latest()->get()
        ]);
    }
    public function create(){
        return view('admin.faqs.create', [
            'packages' => Package::where('status', 1)->get(),
        ]);
    }

    public function saveFaq(Request $request){
        Faq::saveFaqs($request);
        return back()->with('message','Info save successfully');
    }
    public function statusFaq($id){
        Faq::statusFaq($id);
        return back()->with('message','status Info update successfully');
    }

    public function faqDelete(Request $request){
        Faq::faqsDelete($request);
        return back()->with('message','Info Delete successfully');
    }
    public function edit($id)
    {
        return view('admin.faqs.edit', [
            'faq'   => Faq::find($id),
            'packages' => Package::where('status', 1)->get(),
        ]);
    }
    public function faqUpdate(Request $request, $id)
    {
        Faq::faqsUpdate($request, $id);
        return back()->with('message', 'Faqs info updated.');
    }
}
