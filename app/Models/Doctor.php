<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Doctor
 * 
 * @property int $id
 * @property string $firstname
 * @property string $name
 * @property string $gender
 * @property int $age
 * @property Carbon $birthday
 * @property string $phone
 * @property string $address
 * @property string $sigma
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * 
 * @property Collection|Nf[] $nfs
 *
 * @package App\Models
 */
class Doctor extends Model
{
	protected $casts = [
		'age' => 'int',
		'birthday' => 'datetime'
	];

	protected $guarded = [];

	public function nfs()
	{
		return $this->hasMany(Nfs::class);
	}

	public function speciality()
	{
		return $this->belongsTo(Speciality::class);
	}
}
