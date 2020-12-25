<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductImage extends Model
{
	public const UPLOAD_DIR = 'uploads';

	protected $guarded = [
		'id',
		'created_at',
		'updated_at'
	];

	public const SMALL = '141x141';
	public const MEDIUM = '400x400';
	public const LARGE = '656x656';
	public const EXTRA_LARGE = '1200x1200';

	/**
	 * Relationship with the product
	 *
	 * @return array
	 */
	public function product()
	{
		return $this->belongsTo('App\Models\Product');
	}
}
