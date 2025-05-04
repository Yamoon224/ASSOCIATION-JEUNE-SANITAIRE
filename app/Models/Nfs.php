<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Hematology
 * 
 * @property int $id
 * @property float $whiteglobule
 * @property float $redglobule
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
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * 
 * @property Patient $patient
 *
 * @package App\Models
 */
class Nfs extends Model
{
	protected $casts = [
		'whiteglobule' => 'float',
		'redglobule' => 'float',
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
		'patient_id' => 'int'
	];

	protected $guarded = [];

	public function patient()
	{
		return $this->belongsTo(Patient::class);
	}

	public function doctor()
	{
		return $this->belongsTo(Doctor::class);
	}
}
