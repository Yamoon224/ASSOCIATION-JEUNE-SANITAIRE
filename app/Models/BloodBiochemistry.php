<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class BloodBiochemistry
 * 
 * @property int $id
 * @property float $white_globule
 * @property float $red_globule
 * @property float $hemoglobine
 * @property float $hematocrite
 * @property float $vm
 * @property float $tcmh
 * @property float $ccmh
 * @property float $plaquettes
 * @property float $neutrophiles
 * @property float $basophiles
 * @property float $eosinophiles
 * @property float $monocytes
 * @property float $lymphocytes
 * @property int $patient_id
 * @property int|null $doctor_id
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * 
 * @property Doctor|null $doctor
 *
 * @package App\Models
 */
class BloodBiochemistry extends Model
{
	protected $casts = [
		'white_globule' => 'float',
		'red_globule' => 'float',
		'hemoglobine' => 'float',
		'hematocrite' => 'float',
		'vm' => 'float',
		'tcmh' => 'float',
		'ccmh' => 'float',
		'plaquettes' => 'float',
		'neutrophiles' => 'float',
		'basophiles' => 'float',
		'eosinophiles' => 'float',
		'monocytes' => 'float',
		'lymphocytes' => 'float',
		'patient_id' => 'int',
		'doctor_id' => 'int'
	];

	protected $guarded = [];

	public function doctor()
	{
		return $this->belongsTo(Doctor::class);
	}

	public function patient()
	{
		return $this->belongsTo(Patient::class);
	}
}
