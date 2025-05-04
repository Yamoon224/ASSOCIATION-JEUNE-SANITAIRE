<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Patient
 * 
 * @property int $id
 * @property string $firstname
 * @property string $name
 * @property string $gender
 * @property int $age
 * @property string $phone
 * @property string $address
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * 
 * @property Collection|Hematology[] $hematologies
 *
 * @package App\Models
 */
class Patient extends Model
{
	protected $casts = [
		'age' => 'int'
	];

	protected $guarded = [];

	public function nfs()
	{
		return $this->hasMany(Nfs::class);
	}

	public function blood_chemistries()
	{
		return $this->hasMany(BloodBiochemistry::class);
	}
}
