<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\General;
use App\SliderBanner;
use App\Http\Requests\GeneralUpdateRequest;

class GeneralController extends Controller
{
	public static function getGeneral()
	{
		return General::first();
	}

	public static function getLogo()
	{
		return SliderBanner::find(4);
	}

	public function updateGeneral(GeneralUpdateRequest $request)
	{
		$this->setImg($request->file('logo'),4,'logo');
		$this->setImg($request->file('slider1'),1,'slider');
		$this->setImg($request->file('slider2'),2,'slider');
		$this->setImg($request->file('slider3'),3,'slider');
		$this->setImg($request->file('banner1'),5,'banner');
		$this->setImg($request->file('banner2'),6,'banner');
		$this->setImg($request->file('banner3'),7,'banner');
		$this->setImg($request->file('banner4'),8,'banner');
		
		$general=General::first();
		$general->name=$request->name;
		$general->email=$request->email;
		$general->tel=$request->tel;
		$general->save();

		return redirect()->route('managegeneral')->with(['success'=>'Cập nhật thông tin shop thành công']);
	}
	
	private function setImg($req,$id,$type){
		if(!empty($req)){
			$image = $req->getClientOriginalName();
			$old_img=SliderBanner::find($id)->img;
			$this->destroy($old_img,$type);
			$req->move('source/img/'.$type.'/',$image);
			$model=SliderBanner::find($id);
			$model->img=$image;
			$model->save();
		}
	}

	private function destroy($image,$type)
	{
		$filename = 'source/img/'.$type.'/'.$image;
		\File::delete($filename);
	}
}
