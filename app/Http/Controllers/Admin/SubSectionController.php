<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\SubSectionDataTable;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreSubSection;
use App\Http\Requests\UpdateSubSection;
use App\Models\Image;
use App\Models\Section;
use App\Models\SubSection;
use App\Models\SubSectionImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SubSectionController extends Controller
{
    public function store(StoreSubSection $request)
    {
        $subsection = SubSection::create($request->validated());
        if ($request->images) {
            foreach($request->images as $image){
                $subsection->images()->create([
                    'image' => UploadImage($image,'subsections'),
                ]);
            }
        }
        return response()->json(['status' => 'success', 'data' => $subsection]);
    }

    public function update(UpdateSubSection $request, $id)
    {
        $subsection = SubSection::findOrFail($id);
        $sub2 = $request->validated();
        $sub2 = array_filter($sub2);

        $subsection->update($sub2);

        if ($request->images) {
            foreach($request->images as $image){
                $subsection->images()->create([
                    'image' => UploadImage($image,'subsections'),
                ]);
            }
        }
        return response()->json(['status' => 'success', 'data' => $subsection]);
    }

    public function destroy($id)
    {
        $subsection = SubSection::findOrFail($id);
        $subsection->delete();
        return response()->json(['status' => 'success']);
    }
    
    public function subActive(Request $request)
    {
        $subs = SubSection::find($request->sub_id)->update(['active' => $request->active]);
        return response()->json(['status' => 'success', 'data' => $subs]);
    }
    public function subcheckBanner(Request $request)
    {
        $subs = SubSection::find($request->sub_id)->update(['is_banner' => $request->is_banner]);
        return response()->json(['status' => 'success', 'data' => $subs]);
    }

    public function subImages(Request $request)
    {
        $subsection = SubSection::findOrFail($request->subsection_id);
        $images = $subsection->images()->get();
        return json_decode($images);
    }

    public function deleteImage($id)
    {
        $images = Image::where('id',$id)->delete();
      //  Storage::delete($images->image);
        return response()->json(['status'=>'success']);
    }
}
