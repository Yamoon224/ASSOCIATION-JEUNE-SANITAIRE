<?php

    /**
     * @return string : public | public_html | empty
     */
    if (!function_exists('nfs_ref')) 
    {     
        function nfs_ref($age, $gender, $nfs = NULL) 
        {
            $parameters = [];
            if($age < 1) {
                $parameters = [
                    'white_globule' => ['value'=>!is_null($nfs) ? $nfs->white_globule : '', 'min'=>9.0, 'max'=>25.0, 'unit'=>'10³/mm³'], 
                    'red_globule' => ['value'=>!is_null($nfs) ? $nfs->red_globule : '', 'min'=>5.0, 'max'=>6.0, 'unit'=>'10⁶/mm3'], 
                    'hemoglobine' => ['value'=>!is_null($nfs) ? $nfs->hemoglobine : '', 'min'=>14.0, 'max'=>18.0, 'unit'=>'g/dl'], 
                    'hematocrite' => ['value'=>!is_null($nfs) ? $nfs->hematocrite : '', 'min'=>44.0, 'max'=>62.0, 'unit'=>'%'],
                    'vm' => ['value'=>!is_null($nfs) ? $nfs->vm : '', 'min'=>90.0, 'max'=>120.0, 'unit'=>'fl'], 
                    'tcmh' => ['value'=>!is_null($nfs) ? $nfs->tcmh : '', 'min'=>33.0, 'max'=>40.0, 'unit'=>'pg'], 
                    'ccmh' => ['value'=>!is_null($nfs) ? $nfs->ccmh : '', 'min'=>32.3, 'max'=>36.5, 'unit'=>'g/dl'], 
                    'plaquettes' => ['value'=>!is_null($nfs) ? $nfs->plaquettes : '', 'min'=>11.6, 'max'=>14.4, 'unit'=>'10³/mm³'], 
                    'neutrophiles' => ['value'=>!is_null($nfs) ? $nfs->neutrophiles : '', 'min'=>5.0, 'max'=>17.0, 'unit'=>'10³/mm³'],
                    'basophiles' => ['value'=>!is_null($nfs) ? $nfs->basophiles : '', 'min'=>0.00, 'max'=>0.64, 'unit'=>'10³/mm³'], 
                    'eosinophiles' => ['value'=>!is_null($nfs) ? $nfs->eosinophiles : '', 'min'=>0.02, 'max'=>0.85, 'unit'=>'10³/mm³'], 
                    'monocytes' => ['value'=>!is_null($nfs) ? $nfs->monocytes : '', 'min'=>0.4, 'max'=>3.1, 'unit'=>'10³/mm³'], 
                    'lymphocytes'  => ['value'=>!is_null($nfs) ? $nfs->lymphocytes : '', 'min'=>2.0, 'max'=>11.0, 'unit'=>'10³/mm³']
                ];
            }

            if($age >= 1 && $age <= 15) {
                $parameters = [
                    'white_globule' => ['value'=>!is_null($nfs) ? $nfs->white_globule : '', 'min'=>4.5, 'max'=>15.0, 'unit'=>'10³/mm³'], 
                    'red_globule' => ['value'=>!is_null($nfs) ? $nfs->red_globule : '', 'min'=>4.2, 'max'=>5.4, 'unit'=>'10⁶/mm3'], 
                    'hemoglobine' => ['value'=>!is_null($nfs) ? $nfs->hemoglobine : '', 'min'=>12.0, 'max'=>16.0, 'unit'=>'g/dl'], 
                    'hematocrite' => ['value'=>!is_null($nfs) ? $nfs->hematocrite : '', 'min'=>36.0, 'max'=>44.0, 'unit'=>'%'],
                    'vm' => ['value'=>!is_null($nfs) ? $nfs->vm : '', 'min'=>80.0, 'max'=>95.0, 'unit'=>'fl'], 
                    'tcmh' => ['value'=>!is_null($nfs) ? $nfs->tcmh : '', 'min'=>27.0, 'max'=>32.0, 'unit'=>'pg'], 
                    'ccmh' => ['value'=>!is_null($nfs) ? $nfs->ccmh : '', 'min'=>32.0, 'max'=>35.0, 'unit'=>'g/dl'], 
                    'plaquettes' => ['value'=>!is_null($nfs) ? $nfs->plaquettes : '', 'min'=>150, 'max'=>400, 'unit'=>'10³/mm³'], 
                    'neutrophiles' => ['value'=>!is_null($nfs) ? $nfs->neutrophiles : '', 'min'=>2.0, 'max'=>6.5, 'unit'=>'10³/mm³'],
                    'basophiles' => ['value'=>!is_null($nfs) ? $nfs->basophiles : '', 'min'=>0.04, 'max'=>0.54, 'unit'=>'10³/mm³'], 
                    'eosinophiles' => ['value'=>!is_null($nfs) ? $nfs->eosinophiles : '', 'min'=>0.01, 'max'=>0.08, 'unit'=>'10³/mm³'], 
                    'monocytes' => ['value'=>!is_null($nfs) ? $nfs->monocytes : '', 'min'=>2.0, 'max'=>8.0, 'unit'=>'10³/mm³'], 
                    'lymphocytes'  => ['value'=>!is_null($nfs) ? $nfs->lymphocytes : '', 'min'=>'', 'max'=>'', 'unit'=>'10³/mm³']
                ];
            }

            if($age > 15) {
                $parameters = [
                    'white_globule' => ['value'=>!is_null($nfs) ? $nfs->white_globule : '', 'min'=>4.0, 'max'=>10.0, 'unit'=>'10³/mm³'], 
                    'red_globule' => ['value'=>!is_null($nfs) ? $nfs->red_globule : '', 'min'=>3.93, 'max'=>5.22, 'unit'=>'10⁶/mm3'], 
                    'hemoglobine' => ['value'=>!is_null($nfs) ? $nfs->hemoglobine : '', 'min'=>$gender == 'M' ? 13.0 : 12.0, 'max'=>16.0, 'unit'=>'g/dl'], 
                    'hematocrite' => ['value'=>!is_null($nfs) ? $nfs->hematocrite : '', 'min'=>$gender == 'M' ? 40.0 : 37.0, 'max'=>47.0, 'unit'=>'%'],
                    'vm' => ['value'=>!is_null($nfs) ? $nfs->vm : '', 'min'=>80.0, 'max'=>95.0, 'unit'=>'fl'], 
                    'tcmh' => ['value'=>!is_null($nfs) ? $nfs->tcmh : '', 'min'=>27.0, 'max'=>32.0, 'unit'=>'pg'], 
                    'ccmh' => ['value'=>!is_null($nfs) ? $nfs->ccmh : '', 'min'=>31.0, 'max'=>35.0, 'unit'=>'g/dl'], 
                    'plaquettes' => ['value'=>!is_null($nfs) ? $nfs->plaquettes : '', 'min'=>150, 'max'=>400, 'unit'=>'10³/mm³'], 
                    'neutrophiles' => ['value'=>!is_null($nfs) ? $nfs->neutrophiles : '', 'min'=>$gender == 'M' ? 2.0 : 1.5, 'max'=>6.5, 'unit'=>'10³/mm³'],
                    'basophiles' => ['value'=>!is_null($nfs) ? $nfs->basophiles : '', 'min'=>0.01, 'max'=>0.08, 'unit'=>'10³/mm³'], 
                    'eosinophiles' => ['value'=>!is_null($nfs) ? $nfs->eosinophiles : '', 'min'=>0.04, 'max'=>$gender == 'M' ? 0.54 : 0.36, 'unit'=>'10³/mm³'], 
                    'monocytes' => ['value'=>!is_null($nfs) ? $nfs->monocytes : '', 'min'=>0, 'max'=>1000, 'unit'=>'10³/mm³'], 
                    'lymphocytes'  => ['value'=>!is_null($nfs) ? $nfs->lymphocytes : '', 'min'=>$gender == 'M' ? 2.0 : 1.2, 'max'=>$gender == 'M' ? 8.0 : 4.0, 'unit'=>'10³/mm³']
                ];
            }

            return $parameters;
        }
    }  

    /**
     * @return string : public | public_html | empty
     */
    if (!function_exists('bs_ref')) 
    {     
        function bs_ref($age, $gender, $bloodBioChemistry = NULL) 
        {
            return [
                'urea' => ['value'=>!is_null($bloodBioChemistry) ? $bloodBioChemistry->urea : '', 'min'=>0.10, 'max'=>0.50, 'unit'=>'g/L'], 
                'glycemy' => ['value'=>!is_null($bloodBioChemistry) ? $bloodBioChemistry->glycemy : '', 'min'=>0.70, 'max'=>1.1, 'unit'=>'g/L'], 
                'creatinine' => ['value'=>!is_null($bloodBioChemistry) ? $bloodBioChemistry->creatinine : '', 'min'=>6.0, 'max'=>13.0, 'unit'=>'mg/L'], 
                'total_cholesterol' => ['value'=>!is_null($bloodBioChemistry) ? $bloodBioChemistry->total_cholesterol : '', 'min'=>1.50, 'max'=>2.60, 'unit'=>'g/L'],
                'hdl_cholesterol' => ['value'=>!is_null($bloodBioChemistry) ? $bloodBioChemistry->hdl_cholesterol : '', 'min'=>$gender == 'M' ? 0.4 : 0.5, 'max'=>$gender == 'M' ? 0.6 : 0.75, 'unit'=>'g/L'], 
                'ldl_cholesterol' => ['value'=>!is_null($bloodBioChemistry) ? $bloodBioChemistry->ldl_cholesterol : '', 'min'=>1.04, 'max'=>1.60, 'unit'=>'g/L'], 
                'c_hdl_report' => ['value'=>!is_null($bloodBioChemistry) ? $bloodBioChemistry->c_hdl_report : '', 'min'=>0, 'max'=>$gender == 'M' ? 4.4 : 3.3, 'unit'=>'g/L'], 
                'triglycerides' => ['value'=>!is_null($bloodBioChemistry) ? $bloodBioChemistry->triglycerides : '', 'min'=>0.35, 'max'=>1.60, 'unit'=>'g/L'], 
                'asat_tgo' => ['value'=>!is_null($bloodBioChemistry) ? $bloodBioChemistry->asat_tgo : '', 'min'=>0, 'max'=>40, 'unit'=>'UI/L'],
                'alat_tgp' => ['value'=>!is_null($bloodBioChemistry) ? $bloodBioChemistry->alat_tgp : '', 'min'=>0, 'max'=>40, 'unit'=>'UI/L'], 
                'sodium' => ['value'=>!is_null($bloodBioChemistry) ? $bloodBioChemistry->sodium : '', 'min'=>133, 'max'=>146, 'unit'=>'mEq/L'], 
                'potassium' => ['value'=>!is_null($bloodBioChemistry) ? $bloodBioChemistry->potassium : '', 'min'=>3.7, 'max'=>4.7, 'unit'=>'mEq/L'], 
                'chloride'  => ['value'=>!is_null($bloodBioChemistry) ? $bloodBioChemistry->chloride : '', 'min'=>95, 'max'=>110, 'unit'=>'mEq/L']
            ];
        }
    }  

    /**
     * @param string : user's name | app_name default value
     * @return string : url of resource from https://ui-avatars.com
     */
    if (!function_exists('uiavatar')) 
    {     
        function uiavatar($name = '') 
        {
            return 'https://ui-avatars.com/api/?name='. (empty($name) ? env('APP_NAME') : strtolower($name));
        }
    }  


    /**
     * @param string : value to format
     * @param string : currency 
     * @param string : sepator
     * @return string : amount - sep - currency 
     */
    if (!function_exists('moneyformat')) 
    {
        function moneyformat(string $amount, string $currency = "GNF", string $sep = " ") 
        {
            $number = number_format($amount, 0, ',', $sep);
            return $number. " " .$currency;
        }   
    }