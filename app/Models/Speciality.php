<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Speciality
 * 
 * @property int $id
 * @property string $name
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * 
 * @property Collection|Doctor[] $doctors
 *
 * @package App\Models
 */
class Speciality extends Model
{
	protected $guarded = [];

	public function doctors()
	{
		return $this->hasMany(Doctor::class);
	}
}
