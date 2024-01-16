<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactusStore;
use App\Http\Requests\Storejob;
use App\Http\Requests\StoreRate;
use App\Http\Requests\StoreService;
use App\Models\Ads;
use App\Models\Branch;
use App\Models\Consult;
use App\Models\ConsultDetails;
use App\Models\ContactUs;
use App\Models\JobRequest;
use App\Models\Rate;
use App\Models\Subscrip;
use App\Models\Section;
use App\Models\ServiceRequest;
use App\Models\SubSection;
use GuzzleHttp\Psr7\ServerRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\JobMail;
use App\Mail\ServiceMail;
use Artesaos\SEOTools\Traits\SEOTools as SEOToolsTrait;
class HomeController extends Controller
{
    use SEOToolsTrait;

    public function index()
    {

        $this->seo()->setTitle(__('website.rcpa'));
        $this->seo()->setDescription(__('website.seoDesc'));
        $this->seo()->setCanonical(url('/'));
        $this->seo()->opengraph()->setUrl(url('/'));
        $this->seo()->opengraph()->addProperty('type', 'articles');
        $this->seo()->opengraph()->addProperty('locale:alternate', ['pt-pt', 'en-us']);
        $this->seo()->twitter()->setSite(url('/'));
        $this->seo()->jsonLd()->setType('articles');
        $this->seo()->jsonLd()->setTitle(__('website.rcpa'));
        $this->seo()->jsonLd()->setDescription(__('website.seoDesc'));

        $sliders  = Section::where(function($query) {  
            return   $query->where('type','news')->orWhere('type','respons')->orWhere('type','service');
        })->get();
        $newss  = Section::where('type','news')->first();
         $news  = Section::where('type','news')->first();
        $abouts = Section::where('type','about')->first();
        $services = Section::where('type','service')->first();
        $joins = Section::where('type','join')->first();
        $clients = Section::where('type','partners')->first();
        $video = Section::where('type','video')->first();
        $reviews = Rate::where('active',1)->get();
        $respons  = Section::where('type','respons')->first();
        
        return view('front.home',compact('video','sliders','newss','news','abouts','services','joins','reviews','clients','respons'));
    }

    public function storeRate(StoreRate $request)
    {
        $rate =  Rate::create($request->validated());
        return response()->json(['status' => 'success', 'data' => $rate]);
    }
    
    public function storeMail(Request $request)
    {
 if($request->email != null)
        $subs =  Subscrip::create([
            'email' =>  $request->email
            ]);
        return redirect()->back();
    }

    public function aboutUs()
    {
        $this->seo()->setTitle(__('website.rcpa'));
        $this->seo()->setDescription(__('website.seoDesc'));
        $this->seo()->setCanonical(url('/aboutus'));
        $this->seo()->opengraph()->setUrl(url('/aboutus'));
        $this->seo()->opengraph()->addProperty('type', 'articles');
        $this->seo()->opengraph()->addProperty('locale:alternate', ['pt-pt', 'en-us']);
        $this->seo()->twitter()->setSite(url('/aboutus'));
        $this->seo()->jsonLd()->setType('articles');
        $this->seo()->jsonLd()->setTitle(__('website.rcpa'));
        $this->seo()->jsonLd()->setDescription(__('website.seoDesc'));
        
        $respons  = Section::where('type','respons')->first();
        $newss  = Section::where('type','news')->first();
        $services = Section::where('type','service')->first();
        $abouts = Section::where('type','about')->first();
        return view('front.aboutus',compact('abouts','services','newss','respons'));
    }

    public function services()
    {
        $this->seo()->setTitle(__('website.rcpa'));
        $this->seo()->setDescription(__('website.seoDesc'));
        $this->seo()->setCanonical(url('/services'));
        $this->seo()->opengraph()->setUrl(url('/services'));
        $this->seo()->opengraph()->addProperty('type', 'articles');
        $this->seo()->opengraph()->addProperty('locale:alternate', ['pt-pt', 'en-us']);
        $this->seo()->twitter()->setSite(url('/services'));
        $this->seo()->jsonLd()->setType('articles');
        $this->seo()->jsonLd()->setTitle(__('website.rcpa'));
        $this->seo()->jsonLd()->setDescription(__('website.seoDesc'));

        $respons  = Section::where('type','respons')->first();
        $newss  = Section::where('type','news')->first();
        $services = Section::where('type','service')->first();
        return view('front.services',compact('services','respons','newss'));
    }

    public function serviceSingle(Request $request, $id)
    {
        $service = SubSection::where('id',$id)->first();
        $respons  = Section::where('type','respons')->first();
        $newss  = Section::where('type','news')->first();
        $services = Section::where('type','service')->first();
        
        $this->seo()->setTitle($service->title);
        $this->seo()->setDescription(\Str::limit($service->description, 150));
        $this->seo()->setCanonical(url('/service/' . $service->id));
        $this->seo()->opengraph()->addImage(getImagePath($service->images()->first()->image));
        $this->seo()->opengraph()->setUrl(url('/service/' . $service->id));
        $this->seo()->opengraph()->addProperty('type', 'articles');
        $this->seo()->opengraph()->addProperty('locale:alternate', ['pt-pt', 'en-us']);
        $this->seo()->twitter()->setSite(url('/service/' . $service->id));
        $this->seo()->jsonLd()->setType('articles');
        $this->seo()->jsonLd()->setTitle($service->title);
        $this->seo()->jsonLd()->setDescription(\Str::limit($service->description, 150));

        return view('front.singleservices',compact('service','services','respons','newss'));
    }

    public function newsDetails(Request $request, $id)
    {
        $news = SubSection::where('id',$id)->first();
        $respons  = Section::where('type','respons')->first();
        $newss  = Section::where('type','news')->first();
        $services = Section::where('type','service')->first();
        
        $this->seo()->setTitle($news->title);
        $this->seo()->setDescription(\Str::limit($news->description, 150));
        $this->seo()->setCanonical(url('/news/' . $news->id));
        $this->seo()->opengraph()->addImage(getImagePath($news->images()->first()->image));
        $this->seo()->opengraph()->setUrl(url('/news/' . $news->id));
        $this->seo()->opengraph()->addProperty('type', 'articles');
        $this->seo()->opengraph()->addProperty('locale:alternate', ['pt-pt', 'en-us']);
        $this->seo()->twitter()->setSite(url('/news/' . $news->id));
        $this->seo()->jsonLd()->setType('articles');
        $this->seo()->jsonLd()->setTitle($news->title);
        $this->seo()->jsonLd()->setDescription(\Str::limit($news->description, 150));

        return view('front.newsDetails',compact('news','services','respons','newss'));
    }
    public function sliderDetails(Request $request, $id)
    {
        $news = SubSection::where('id',$id)->first();
      
        $respons  = Section::where('type','respons')->first();
        $newss  = Section::where('type','news')->first();
        $services = Section::where('type','service')->first();
        $this->seo()->setTitle($news->title);
        $this->seo()->setDescription(\Str::limit($news->description, 150));
        $this->seo()->setCanonical(url('/slider/' . $news->id));
        $this->seo()->opengraph()->addImage(getImagePath($news->images()->first()->image));
        $this->seo()->opengraph()->setUrl(url('/slider/' . $news->id));
        $this->seo()->opengraph()->addProperty('type', 'articles');
        $this->seo()->opengraph()->addProperty('locale:alternate', ['pt-pt', 'en-us']);
        $this->seo()->twitter()->setSite(url('/slider/' . $news->id));
        $this->seo()->jsonLd()->setType('articles');
        $this->seo()->jsonLd()->setTitle($news->title);
        $this->seo()->jsonLd()->setDescription(\Str::limit($news->description, 150));

        return view('front.newsDetails',compact('news','services','respons','newss'));
    }

    public function contactsUs()
    {
        $respons  = Section::where('type','respons')->first();
        $newss  = Section::where('type','news')->first();
        $services = Section::where('type','service')->first();
        $branches = Branch::get();
        return view('front.contactus',compact('branches','services','newss','respons'));
    }
    public function rates()
    {
        $respons  = Section::where('type','respons')->first();
        $newss  = Section::where('type','news')->first();
        $services = Section::where('type','service')->first();
        $branches = Branch::get();
        $reviews = Rate::where('active',1)->get();
        return view('front.rates',compact('branches','services','newss','respons','reviews'));;
    }

    public function contactsUsStore(ContactusStore $request)
    {
        $contact =  ContactUs::create($request->validated());
        return response()->json(['status' => 'success', 'data' => $contact]);
    }

    public function serviceRequest()
    {
                $respons  = Section::where('type','respons')->first();
        $newss  = Section::where('type','news')->first();
        $services = Section::where('type','service')->first();
        
        return view('front.service_request',compact('services','newss','respons'));
    }

    public function serviceStore(StoreService $request)
    {
        $serviceData =  $request->safe()->except(['commercial_register','found_contract','financial','balance']);
        if($request->commercial_register)
            $serviceData['commercial_register']  = UploadFile($request->commercial_register,'commercials');
        if($request->found_contract)
            $serviceData['found_contract']  = UploadFile($request->found_contract,'contracts');
        if($request->financial)
            $serviceData['financial']  = UploadFile($request->financial,'financials');
        if($request->balance)
            $serviceData['balance']  = UploadFile($request->balance,'balances');

        $service = ServiceRequest::create($serviceData);
         $serviceMailData = [
            'name' => $service->name,  
            'email' => $service->email,  
            'phone' => $service->phone,  
            'activity_type' => $service->activity_type,  
            'legal_entity' => $service->legal_entity,  
            'service_location' => $service->service_location,
            'request_service' => $service->request_service,
            'organization_name' => $service->organization_name,
          ];

         Mail::to('info@rcpa.sa')->send(new ServiceMail($serviceMailData));
        return response()->json(['status' => 'success', 'data' => $service]);
    }

    public function consultants()
    {
        $consultmanage  = Consult::where('type','manage')->first();
        
        $consults = Consult::where('type','branch')->get();
        $consultsdepart = Consult::where('type','department')->get();
        $consultscon = Consult::where('type','consult')->get();
        
        $consultbr = ConsultDetails::where('type','branch')->first();
        $consultdb = ConsultDetails::where('type','department')->first();
        
        $respons  = Section::where('type','respons')->first();
        $newss  = Section::where('type','news')->first();
        $services = Section::where('type','service')->first();
        
        return view('front.consults',compact('consults','consultsdepart','consultscon','consultbr','consultdb','services','newss','respons','consultmanage'));
    }

    public function consultantDetails(Request $request, $id)
    {
        $consultant = Consult::where('id',$id)->first();
        $respons  = Section::where('type','respons')->first();
        $newss  = Section::where('type','news')->first();
        $services = Section::where('type','service')->first();
        return view('front.consultdetails',compact('consultant','services','newss','respons'));
    }

    public function clients()
    {
        $clients = Section::where('type','partners')->first();
         $respons  = Section::where('type','respons')->first();
        $newss  = Section::where('type','news')->first();
        $services = Section::where('type','service')->first();
        return view('front.clients',compact('clients','services','newss','respons'));
    }

    public function requestJobs()
    {
        $tabs = Ads::where('active',1)->get();
        $respons  = Section::where('type','respons')->first();
        $newss  = Section::where('type','news')->first();
        $services = Section::where('type','service')->first();
        return view('front.job_request',compact('tabs','services','newss','respons'));
    }

    public function news()
    {
        $services = Section::where('type','service')->first();
        $respons  = Section::where('type','respons')->first();
        $newss  = Section::where('type','news')->first();
        $news  = Section::where('type','news')->first();

        $this->seo()->setTitle(__('website.rcpa'));
        $this->seo()->setDescription(__('website.seoDesc'));
        $this->seo()->setCanonical(url('/news'));
        $this->seo()->opengraph()->setUrl(url('/news'));
        $this->seo()->opengraph()->addProperty('type', 'articles');
        $this->seo()->opengraph()->addProperty('locale:alternate', ['pt-pt', 'en-us']);
        $this->seo()->twitter()->setSite(url('/news'));
        $this->seo()->jsonLd()->setType('articles');
        $this->seo()->jsonLd()->setTitle(__('website.rcpa'));
        $this->seo()->jsonLd()->setDescription(__('website.seoDesc'));
        
        return view('front.news',compact('newss','respons','services','news'));
    }

    public function respons()
    {
        $newss  = Section::where('type','news')->first();
        $services = Section::where('type','service')->first();
        $respons  = Section::where('type','respons')->first();
        
        return view('front.social',compact('respons','services','newss'));
    }

    public function responsDetails(Request $request, $id)
    {
        $responss = SubSection::where('id',$id)->first();
        $newss  = Section::where('type','news')->first();
        $services = Section::where('type','service')->first();
        $respons  = Section::where('type','respons')->first();
        return view('front.socialDetails',compact('responss','respons','services','newss'));
    }
    public function responsFilter(Request $request, $id)
    {
        //$responss = SubSection::where('id',$id)->first();
        $responsAll = SubSection::where('category_id',$id)->get();
        $newss  = Section::where('type','news')->first();
        $services = Section::where('type','service')->first();
        $respons  = Section::where('type','respons')->first();

        return view('front.socialFilter',compact('responsAll','respons','services','newss','id'));
    }

    public function jobStore(Storejob $request)
    {
        $job =  JobRequest::create($request->validated());
        
          $jobMailData = [
            'job_type' =>  $job->job_type,  
            'job_address' => $job->job_address,  
            'job_numb' => $job->job_numb,  
            'job_city' => $job->job_city,  
            'name' => $job->name,  
            'sex' => $job->sex,  
            'national' => $job->national,  
            'birth_date' => $job->birth_date,  
            'birth_place' => $job->birth_place,  
            'region' => $job->region,  
            'special' => $job->special,  
            'certificate' => $job->certificate,  
            'graduation_rate' => $job->graduation_rate,  
            'graduation_year' => $job->graduation_year,  
            'Fellowships' => $job->Fellowships,  
            'experience' => $job->experience,  
            'experience_year' => $job->experience_year,  
            'email' => $job->email,  
            'phone' => $job->phone,  
            'note' => $job->note,
          ];

         Mail::to('hrcpa429@gmail.com')->send(new JobMail($jobMailData));
        return response()->json(['status' => 'success', 'data' => $job]);
    }

    public function langHome($locale)
    {
        if (! in_array($locale, ['en', 'ar'])) {
           abort(400);
        }
        session()->put('locale', $locale);
        return redirect()->back();
    }
    
    public function notWork()
    {
        return view('front.notworkpage');
    }
}
