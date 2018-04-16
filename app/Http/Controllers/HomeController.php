<?php namespace App\Http\Controllers;


use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Enewspublic;
use App\Models\Enewstags;
use App\Models\EcmsPhoto;
use App\Models\Enewstagsdata;
use App\Models\AlbumInfo;




class HomeController extends Controller {
	/**
	 * Create a new controller instance.
	 * @return void
	 */
	public function __construct()
	{
		$this->middleware('guest');
	}

	/**
	 * Show the application dashboard to the user.
	 *
	 * @return Response
	 */
	public function index()
	{
		$title = Enewspublic::first(['sitename','siteintro']);
		$tags = Enewstags::where('isgood', '>', 0)->orderBy('tagid','DESC')->get();
		$info = EcmsPhoto::orderBy('newstime', 'DESC')->limit(24)->get();

		return view('home')
				->with('title', $title->sitename)
				->with('siteintro', $title->siteintro)
				->with('tags', $tags)
				->with('info', $info);
	}

	public function tag( Request $request, $tagid )
	{
		$tag = Enewstags::find($tagid);
		$info_id = Enewstagsdata::where('tagid', $tagid)
		->orderBy('newstime', 'DESC')
		->limit(24)
		->get(['id'])
		->toArray();
		

		$title = $tag->tagname.' - 图片 - 兔找找';
		$tags = Enewstags::where('isgood', '>', 0)
			->orderBy('tagid','DESC')
			->get();

		$info = EcmsPhoto::whereIn('id', $info_id)->get();

		return view('home')
				->with('title', $title)
				->with('siteintro', $tag->tagname)
				->with('tags', $tags)
				->with('info', $info);
	}

	public function photo( Request $request, $id )
	{
		$photo = EcmsPhoto::find($id);
		$tags = Enewstags::where('isgood', '>', 0)->orderBy('tagid','DESC')->get();

		$tagids = EcmsPhoto::find($photo->id)->photoToTagsArray();

		$photo_tags = Enewstags::select(['tagid', 'tagname'])
		 	->whereIn('tagid', $tagids)->get()->toArray();

		// $photo_album = EcmsPhoto::find($photo->id)->hasManyAlbum;

		// $album_photos = AlbumInfo::find(229)->hasManyPhoto;
		// var_dump($album_photos->toArray());


		return view('photo')
				->with('title', $photo->title)
				->with('tags', $tags)
				->with('siteintro', $photo->title)
				->with('photo', $photo)
				->with('photo_tags', $photo_tags)
				;
	}

	// ajax 请求获取数据
	public function getlist(Request $request)
	{
		return $request->page;
	}

}
