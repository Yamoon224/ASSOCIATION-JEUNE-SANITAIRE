<?php

namespace App\Http\Controllers;

use App\Models\BloodBiochemistry;
use App\Models\Nfs;
use App\Services\Fpdf\App;
use Illuminate\Http\Request;

class PdfController extends Controller
{
    private $pdf;

    public function __construct()
    {
        $this->pdf = new App('P','mm','A4');
    }

    public function nfs($id) 
    {
        $nfs = Nfs::find($id);

        $this->pdf->setFont('Arial', 'B', 8);
        $this->pdf->setTitle(utf8_decode("NFS"));
        $this->pdf->addPage();

        $this->pdf->SetX(10);

        $this->pdf->cell(70, 6, utf8_decode("N° ENREGISTREMENT: "), '', 0, 'L');
        $this->pdf->cell(70, 6, utf8_decode("PRELEVEMENT DU: ".date('d/m/Y', strtotime($nfs->created_at))), '', 0, 'L');
        $this->pdf->cell(60, 6, utf8_decode("CONTACT MEDECIN: ".$nfs->doctor->phone), '', 1, 'L');
        
        $this->pdf->setFont('Arial', 'I', 8);
        $this->pdf->cell(70, 6, utf8_decode("GENRE: ".$nfs->patient->gender), '', 0, 'L');
        $this->pdf->setFillColor(220, 220, 220);
        $this->pdf->cell(45, 6, utf8_decode(date('H:i', strtotime($nfs->created_at))), 'LTRB', 0, 'C', true);
        $this->pdf->setX($this->pdf->getX()+25);
        $this->pdf->cell(50, 6, utf8_decode(""), '', 1, 'C', true);
        
        $this->pdf->ln(1);
        $this->pdf->setX(10);
        $this->pdf->setFont('Arial', 'I', 7);
        $this->pdf->cell(70, 5, utf8_decode("DATE DE NAISSANCE: ".date('d/m/Y', strtotime($nfs->patient->birthday))), 'LTB', 0, 'L');
        $this->pdf->setFont('Arial', 'B', 8);
        $this->pdf->cell(40, 10, utf8_decode("DOSSIER N°: "), 'LTB', 0, 'L');
        $this->pdf->setFont('Arial', 'B', 10);
        $this->pdf->cell(80, 6, utf8_decode($nfs->patient->firstname." ".strtoupper($nfs->patient->name)), 'RT', 1, 'C');
        $this->pdf->setX(120);
        $this->pdf->setFont('Arial', '', 6);
        $this->pdf->cell(80, 4, utf8_decode($nfs->patient->phone), 'RB', 1, 'C');
        $this->pdf->setFont('Arial', 'B', 7);
        $this->pdf->setXY(10, $this->pdf->getY()-5);
        $this->pdf->cell(70, 5, utf8_decode("N° SIGMA : ".strtoupper($nfs->patient->sigma)), 'LTRB', 1, 'L', true);
         
        $this->pdf->ln(2);
        $this->pdf->setX(10);
        $this->pdf->setLineWidth(.3);
        $this->pdf->setDrawColor(0, 180, 240);
        $this->pdf->cell(190, 0.35, '', 1);

        $this->pdf->ln(2);
        $this->pdf->setX(65);
        $this->pdf->setTextColor(255);
        $this->pdf->setDrawColor(0, 0, 0);
        $this->pdf->setFillColor(0, 180, 240);
        $this->pdf->setFont('Arial', 'B', 14);
        $this->pdf->cell(80, 10, utf8_decode("HEMATOLOGIE"), 'LTRB', 1, 'C', true);
        
        $this->pdf->setX(10);
        $this->pdf->setTextColor(0);
        $this->pdf->setFont('Arial', 'I', 8);
        $this->pdf->cell(65, 6, utf8_decode("( Type échantillon primaire : Sang total )"), '', 0, 'C');
        $this->pdf->cell(60, 6, utf8_decode("( Aspect Echantillon : )"), '', 0, 'C');
        $this->pdf->cell(65, 6, utf8_decode("Valeurs Réf: Âge && Genre"), '', 1, 'C');

        $this->pdf->setTextColor(255);
        $this->pdf->setFont('Arial', 'B', 12);
        $this->pdf->cell(190, 8, utf8_decode("NUMERATION FORMULE SANGUINE (NFS)"), 'LTRB', 0, 'C', true);
        
        $this->pdf->ln(8);
        $this->pdf->setTextColor(0);
        $this->pdf->setFont('Arial', 'B', 8);
        $headers = ['PARAMETRES', 'VALEURS', 'UNITES', 'Ref. Min', 'Ref. Max'];
        $this->pdf->nfs_table($headers, [
            __('locale.globulary_numeration') => ['value'=>'', 'min'=>'', 'max'=>'', 'unit'=>'', 'fill'=>true], 
            __('locale.white_globule') => [
                'value'=>$nfs->white_globule, 
                'min'=>nfs_ref($nfs->patient->age, $nfs->patient->gender)['white_globule']['min'], 
                'max'=>nfs_ref($nfs->patient->age, $nfs->patient->gender)['white_globule']['max'], 
                'unit'=>'10³/mm³', 
                'fill'=>false
            ], 
            __('locale.red_globule') => [
                'value'=>$nfs->red_globule, 
                'min'=>nfs_ref($nfs->patient->age, $nfs->patient->gender)['red_globule']['min'], 
                'max'=>nfs_ref($nfs->patient->age, $nfs->patient->gender)['red_globule']['max'], 
                'unit'=>'10⁶/mm³', 
                'fill'=>false
            ], 
            __('locale.hemoglobine') => [
                'value'=>$nfs->hemoglobine, 
                'min'=>nfs_ref($nfs->patient->age, $nfs->patient->gender)['hemoglobine']['min'], 
                'max'=>nfs_ref($nfs->patient->age, $nfs->patient->gender)['hemoglobine']['max'], 
                'unit'=>'g/dl', 
                'fill'=>false
            ], 
            __('locale.hematocrite') => [
                'value'=>$nfs->hematocrite, 
                'min'=>nfs_ref($nfs->patient->age, $nfs->patient->gender)['hematocrite']['min'], 
                'max'=>nfs_ref($nfs->patient->age, $nfs->patient->gender)['hematocrite']['max'], 
                'unit'=>'%', 
                'fill'=>false
            ],
            __('locale.vm') => [
                'value'=>$nfs->vm, 
                'min'=>nfs_ref($nfs->patient->age, $nfs->patient->gender)['vm']['min'], 
                'max'=>nfs_ref($nfs->patient->age, $nfs->patient->gender)['vm']['max'],  
                'unit'=>'fl', 
                'fill'=>false
            ], 
            __('locale.tcmh') => [
                'value'=>$nfs->tcmh, 
                'min'=>nfs_ref($nfs->patient->age, $nfs->patient->gender)['tcmh']['min'], 
                'max'=>nfs_ref($nfs->patient->age, $nfs->patient->gender)['tcmh']['max'],  
                'unit'=>'pg', 
                'fill'=>false
            ], 
            __('locale.ccmh') => [
                'value'=>$nfs->ccmh, 
                'min'=>nfs_ref($nfs->patient->age, $nfs->patient->gender)['ccmh']['min'], 
                'max'=>nfs_ref($nfs->patient->age, $nfs->patient->gender)['ccmh']['max'],  
                'unit'=>'g/dl', 
                'fill'=>false
            ], 
            __('locale.plaquettes') => [
                'value'=>$nfs->plaquettes, 
                'min'=>nfs_ref($nfs->patient->age, $nfs->patient->gender)['plaquettes']['min'], 
                'max'=>nfs_ref($nfs->patient->age, $nfs->patient->gender)['plaquettes']['max'],   
                'unit'=>'10³/mm³', 
                'fill'=>true
            ], 
            __('locale.leucocytary_formula') => ['value'=>'', 'min'=>'', 'max'=>'', 'unit'=>'', 'fill'=>true], 
            __('locale.neutrophiles') => [
                'value'=>$nfs->neutrophiles, 
                'min'=>nfs_ref($nfs->patient->age, $nfs->patient->gender)['neutrophiles']['min'], 
                'max'=>nfs_ref($nfs->patient->age, $nfs->patient->gender)['neutrophiles']['max'], 
                'unit'=>'%', 
                'fill'=>false
            ],
            "Soit:" => [
                'value'=>$nfs->neutrophiles*$nfs->white_globule*10, 
                'min'=>1700.00, 
                'max'=>7000.00, 
                'unit'=>'mm³', 
                'fill'=>true
            ],
            __('locale.basophiles') => [
                'value'=>$nfs->basophiles, 
                'min'=>nfs_ref($nfs->patient->age, $nfs->patient->gender)['basophiles']['min'], 
                'max'=>nfs_ref($nfs->patient->age, $nfs->patient->gender)['basophiles']['max'], 
                'unit'=>'%', 
                'fill'=>false
            ], 
            "Soit: " => [
                'value'=>$nfs->basophiles*$nfs->white_globule*10, 
                'min'=>0.00, 
                'max'=>50.00, 
                'unit'=>'mm³', 
                'fill'=>true
            ],
            __('locale.eosinophiles') => [
                'value'=>$nfs->eosinophiles, 
                'min'=>nfs_ref($nfs->patient->age, $nfs->patient->gender)['eosinophiles']['min'], 
                'max'=>nfs_ref($nfs->patient->age, $nfs->patient->gender)['eosinophiles']['max'], 
                'unit'=>'%', 
                'fill'=>false
            ], 
            "Soit:  " => [
                'value'=>$nfs->eosinophiles*$nfs->white_globule*10, 
                'min'=>0.00, 
                'max'=>400.00, 
                'unit'=>'mm³', 
                'fill'=>true
            ],
            __('locale.monocytes') => [
                'value'=>$nfs->monocytes, 
                'min'=>nfs_ref($nfs->patient->age, $nfs->patient->gender)['monocytes']['min'], 
                'max'=>nfs_ref($nfs->patient->age, $nfs->patient->gender)['monocytes']['max'], 
                'unit'=>'%', 
                'fill'=>false
            ], 
            "Soit:   " => [
                'value'=>$nfs->monocytes*$nfs->white_globule*10, 
                'min'=>8.00, 
                'max'=>1000.00, 
                'unit'=>'mm³', 
                'fill'=>true
            ],
            __('locale.lymphocytes') => [
                'value'=>$nfs->lymphocytes, 
                'min'=>nfs_ref($nfs->patient->age, $nfs->patient->gender)['lymphocytes']['min'], 
                'max'=>nfs_ref($nfs->patient->age, $nfs->patient->gender)['lymphocytes']['max'],  
                'unit'=>'%', 
                'fill'=>false
            ],
            "Soit:    " => [
                'value'=>$nfs->lymphocytes*$nfs->white_globule*10, 
                'min'=>1200.00, 
                'max'=>4000.00, 
                'unit'=>'mm³', 
                'fill'=>true
            ],
        ]);
        $this->pdf->output();
        exit;
    }

    public function blood_chemistries ($id) 
    {
        $bloodBioChemistry = BloodBiochemistry::find($id);

        $this->pdf->setFont('Arial', 'B', 8);
        $this->pdf->setTitle(utf8_decode("BS"));
        $this->pdf->addPage();

        $this->pdf->SetX(10);

        $this->pdf->cell(70, 6, utf8_decode("N° ENREGISTREMENT: "), '', 0, 'L');
        $this->pdf->cell(70, 6, utf8_decode("PRELEVEMENT DU: ".date('d/m/Y', strtotime($bloodBioChemistry->created_at))), '', 0, 'L');
        $this->pdf->cell(60, 6, utf8_decode("CONTACT MEDECIN: ".$bloodBioChemistry->doctor->phone), '', 1, 'L');
        
        $this->pdf->setFont('Arial', 'I', 8);
        $this->pdf->cell(70, 6, utf8_decode("GENRE: ".$bloodBioChemistry->patient->gender), '', 0, 'L');
        $this->pdf->setFillColor(220, 220, 220);
        $this->pdf->cell(45, 6, utf8_decode(date('H:i', strtotime($bloodBioChemistry->created_at))), 'LTRB', 0, 'C', true);
        $this->pdf->setX($this->pdf->getX()+25);
        $this->pdf->cell(50, 6, utf8_decode(""), '', 1, 'C', true);
        
        $this->pdf->ln(1);
        $this->pdf->setX(10);
        $this->pdf->setFont('Arial', 'I', 7);
        $this->pdf->cell(70, 5, utf8_decode("DATE DE NAISSANCE: ".date('d/m/Y', strtotime($bloodBioChemistry->patient->birthday))), 'LTB', 0, 'L');
        $this->pdf->setFont('Arial', 'B', 8);
        $this->pdf->cell(40, 10, utf8_decode("DOSSIER N°: "), 'LTB', 0, 'L');
        $this->pdf->setFont('Arial', 'B', 10);
        $this->pdf->cell(80, 6, utf8_decode($bloodBioChemistry->patient->firstname." ".strtoupper($bloodBioChemistry->patient->name)), 'RT', 1, 'C');
        $this->pdf->setX(120);
        $this->pdf->setFont('Arial', '', 6);
        $this->pdf->cell(80, 4, utf8_decode($bloodBioChemistry->patient->phone), 'RB', 1, 'C');
        $this->pdf->setFont('Arial', 'B', 7);
        $this->pdf->setXY(10, $this->pdf->getY()-5);
        $this->pdf->cell(70, 5, utf8_decode("N° SIGMA : ".strtoupper($bloodBioChemistry->patient->sigma)), 'LTRB', 1, 'L', true);
         
        $this->pdf->ln(2);
        $this->pdf->setX(10);
        $this->pdf->setLineWidth(.3);
        $this->pdf->setDrawColor(0, 180, 240);
        $this->pdf->cell(190, 0.35, '', 1);

        $this->pdf->ln(2);
        $this->pdf->setX(65);
        $this->pdf->setTextColor(255);
        $this->pdf->setDrawColor(0, 0, 0);
        $this->pdf->setFillColor(0, 180, 240);
        $this->pdf->setFont('Arial', 'B', 14);
        $this->pdf->cell(80, 10, utf8_decode("BIOCHIMIE"), 'LTRB', 1, 'C', true);
        
        $this->pdf->setX(10);
        $this->pdf->setTextColor(0);
        $this->pdf->setFont('Arial', 'I', 8);
        $this->pdf->cell(65, 6, utf8_decode("( Type échantillon primaire : Sang total )"), '', 0, 'C');
        $this->pdf->cell(60, 6, utf8_decode("( Aspect Echantillon : )"), '', 0, 'C');
        $this->pdf->cell(65, 6, utf8_decode("Valeurs Réf: Âge && Genre"), '', 1, 'C');

        $this->pdf->setTextColor(255);
        $this->pdf->setFont('Arial', 'B', 12);
        $this->pdf->cell(190, 8, utf8_decode("BIOCHIMIE SANGUINE (BS)"), 'LTRB', 0, 'C', true);
        
        $this->pdf->ln(8);
        $this->pdf->setTextColor(0);
        $this->pdf->setFont('Arial', 'B', 8);
        $headers = ['PARAMETRES', 'VALEURS', 'UNITES', 'Ref. Min', 'Ref. Max'];
        $this->pdf->nfs_table($headers, [
            __('locale.urea') => [
                'value'=>$bloodBioChemistry->urea, 
                'min'=>bs_ref($bloodBioChemistry->patient->age, $bloodBioChemistry->patient->gender)['urea']['min'], 
                'max'=>bs_ref($bloodBioChemistry->patient->age, $bloodBioChemistry->patient->gender)['urea']['max'], 
                'unit'=>bs_ref($bloodBioChemistry->patient->age, $bloodBioChemistry->patient->gender)['urea']['unit'], 
                'fill'=>false
            ], 
            __('locale.glycemy') => [
                'value'=>$bloodBioChemistry->glycemy, 
                'min'=>bs_ref($bloodBioChemistry->patient->age, $bloodBioChemistry->patient->gender)['glycemy']['min'], 
                'max'=>bs_ref($bloodBioChemistry->patient->age, $bloodBioChemistry->patient->gender)['glycemy']['max'], 
                'unit'=>bs_ref($bloodBioChemistry->patient->age, $bloodBioChemistry->patient->gender)['glycemy']['unit'], 
                'fill'=>false
            ], 
            __('locale.creatinine') => [
                'value'=>$bloodBioChemistry->creatinine, 
                'min'=>bs_ref($bloodBioChemistry->patient->age, $bloodBioChemistry->patient->gender)['creatinine']['min'], 
                'max'=>bs_ref($bloodBioChemistry->patient->age, $bloodBioChemistry->patient->gender)['creatinine']['max'], 
                'unit'=>bs_ref($bloodBioChemistry->patient->age, $bloodBioChemistry->patient->gender)['creatinine']['unit'], 
                'fill'=>false
            ], 
            __('locale.total_cholesterol') => [
                'value'=>$bloodBioChemistry->total_cholesterol, 
                'min'=>bs_ref($bloodBioChemistry->patient->age, $bloodBioChemistry->patient->gender)['total_cholesterol']['min'], 
                'max'=>bs_ref($bloodBioChemistry->patient->age, $bloodBioChemistry->patient->gender)['total_cholesterol']['max'], 
                'unit'=>bs_ref($bloodBioChemistry->patient->age, $bloodBioChemistry->patient->gender)['total_cholesterol']['unit'], 
                'fill'=>false
            ], 
            __('locale.hdl_cholesterol') => [
                'value'=>$bloodBioChemistry->hdl_cholesterol, 
                'min'=>bs_ref($bloodBioChemistry->patient->age, $bloodBioChemistry->patient->gender)['hdl_cholesterol']['min'], 
                'max'=>bs_ref($bloodBioChemistry->patient->age, $bloodBioChemistry->patient->gender)['hdl_cholesterol']['max'], 
                'unit'=>bs_ref($bloodBioChemistry->patient->age, $bloodBioChemistry->patient->gender)['hdl_cholesterol']['unit'], 
                'fill'=>false
            ], 
            __('locale.ldl_cholesterol') => [
                'value'=>$bloodBioChemistry->ldl_cholesterol, 
                'min'=>bs_ref($bloodBioChemistry->patient->age, $bloodBioChemistry->patient->gender)['ldl_cholesterol']['min'], 
                'max'=>bs_ref($bloodBioChemistry->patient->age, $bloodBioChemistry->patient->gender)['ldl_cholesterol']['max'], 
                'unit'=>bs_ref($bloodBioChemistry->patient->age, $bloodBioChemistry->patient->gender)['ldl_cholesterol']['unit'], 
                'fill'=>false
            ], 
            __('locale.c_hdl_report') => [
                'value'=>$bloodBioChemistry->c_hdl_report, 
                'min'=>bs_ref($bloodBioChemistry->patient->age, $bloodBioChemistry->patient->gender)['c_hdl_report']['min'], 
                'max'=>bs_ref($bloodBioChemistry->patient->age, $bloodBioChemistry->patient->gender)['c_hdl_report']['max'], 
                'unit'=>bs_ref($bloodBioChemistry->patient->age, $bloodBioChemistry->patient->gender)['c_hdl_report']['unit'], 
                'fill'=>false
            ], 
            __('locale.triglycerides') => [
                'value'=>$bloodBioChemistry->triglycerides, 
                'min'=>bs_ref($bloodBioChemistry->patient->age, $bloodBioChemistry->patient->gender)['triglycerides']['min'], 
                'max'=>bs_ref($bloodBioChemistry->patient->age, $bloodBioChemistry->patient->gender)['triglycerides']['max'], 
                'unit'=>bs_ref($bloodBioChemistry->patient->age, $bloodBioChemistry->patient->gender)['triglycerides']['unit'], 
                'fill'=>false
            ], 
            
            __('locale.enzym') => ['value'=>'', 'min'=>'', 'max'=>'', 'unit'=>'', 'fill'=>true], 
            __('locale.asat_tgo') => [
                'value'=>$bloodBioChemistry->asat_tgo, 
                'min'=>bs_ref($bloodBioChemistry->patient->age, $bloodBioChemistry->patient->gender)['asat_tgo']['min'], 
                'max'=>bs_ref($bloodBioChemistry->patient->age, $bloodBioChemistry->patient->gender)['asat_tgo']['max'], 
                'unit'=>bs_ref($bloodBioChemistry->patient->age, $bloodBioChemistry->patient->gender)['asat_tgo']['unit'], 
                'fill'=>false
            ],
            __('locale.alat_tgp') => [
                'value'=>$bloodBioChemistry->alat_tgp, 
                'min'=>bs_ref($bloodBioChemistry->patient->age, $bloodBioChemistry->patient->gender)['alat_tgp']['min'], 
                'max'=>bs_ref($bloodBioChemistry->patient->age, $bloodBioChemistry->patient->gender)['alat_tgp']['max'], 
                'unit'=>bs_ref($bloodBioChemistry->patient->age, $bloodBioChemistry->patient->gender)['alat_tgp']['unit'], 
                'fill'=>false
            ],

            __('locale.ionogram') => ['value'=>'', 'min'=>'', 'max'=>'', 'unit'=>'', 'fill'=>true], 
            __('locale.sodium') => [
                'value'=>$bloodBioChemistry->sodium, 
                'min'=>bs_ref($bloodBioChemistry->patient->age, $bloodBioChemistry->patient->gender)['sodium']['min'], 
                'max'=>bs_ref($bloodBioChemistry->patient->age, $bloodBioChemistry->patient->gender)['sodium']['max'], 
                'unit'=>bs_ref($bloodBioChemistry->patient->age, $bloodBioChemistry->patient->gender)['sodium']['unit'], 
                'fill'=>false
            ],
            __('locale.potassium') => [
                'value'=>$bloodBioChemistry->potassium, 
                'min'=>bs_ref($bloodBioChemistry->patient->age, $bloodBioChemistry->patient->gender)['potassium']['min'], 
                'max'=>bs_ref($bloodBioChemistry->patient->age, $bloodBioChemistry->patient->gender)['potassium']['max'], 
                'unit'=>bs_ref($bloodBioChemistry->patient->age, $bloodBioChemistry->patient->gender)['potassium']['unit'], 
                'fill'=>false
            ],  
            __('locale.chloride') => [
                'value'=>$bloodBioChemistry->chloride, 
                'min'=>bs_ref($bloodBioChemistry->patient->age, $bloodBioChemistry->patient->gender)['chloride']['min'], 
                'max'=>bs_ref($bloodBioChemistry->patient->age, $bloodBioChemistry->patient->gender)['chloride']['max'], 
                'unit'=>bs_ref($bloodBioChemistry->patient->age, $bloodBioChemistry->patient->gender)['chloride']['unit'], 
                'fill'=>false
            ],            
        ]);
        $this->pdf->output();
        exit;
    }
}
