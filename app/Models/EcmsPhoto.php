<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EcmsPhoto extends Model {
	protected $table = 'ecms_photo';

	public function belongsToUser()
	{
		return $this->belongsTo('App\Models\Enewsmember', 'userid', 'userid');
	}

	public function hasManyAlbum()
    {
        return $this->hasMany('App\Models\AlbumPhoto', 'photo_id', 'id');
	}

	// 根据图片ID获取标签id组成的数组
	public function photoToTagsArray()
	{
		// 获取对应标签信息
		$tags = $this->hasMany('App\Models\Enewstagsdata', 'id', 'id')->get()->toArray();

		$tagids = array();

		foreach($tags as $tag ) {
			$tagids[] = $tag['tagid'];
		}

		return $tagids;
	}
}	
