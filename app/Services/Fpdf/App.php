<?php
namespace App\Services\Fpdf;

use Codedge\Fpdf\Fpdf\Fpdf;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use Imagick;

class App extends Fpdf
{
    // En-tête
    function Header()
    {
        // Logo
        $this->Image('images/logo.png', 10, 4, 12);
        $this->Image('images/logo.png', 190, 4, 12);
        
        $this->SetX(10);
        $this->SetFont('Arial', 'B', 18);
        $this->Cell(190, 4, utf8_decode("ASSOCIATION DES JEUNES POUR LA SANTE"), 'C', 0, 'C');
        
        // Générer le QR code au format SVG
        QrCode::margin(4)
            ->backgroundColor(211,211,211, 80)
            ->size(100)
            ->generate(url()->current());
        
        
        // Police Arial gras 15
        $this->SetFont('Arial', 'B', 15);
        $this->Ln(7);
        // Décalage à droite
        $this->Cell(190, 0.35, '', 1);
        // Saut de ligne
        $this->Ln(4);
    }

    // Pied de page
    function Footer()
    {
        // Positionnement à 1,5 cm du bas
        $this->SetXY(40, -19.5);
        
        // Police Arial italique 8
        // Numéro de page
        $this->SetFont('Arial', 'IB', 8);
        $this->Cell(130, 2,'Page '.$this->PageNo(), 'LR', 1,'C');
        $this->SetX(40);
        $this->SetFont('Arial', 'I', 6.5);
        $this->Cell(130, 3, utf8_decode("SIS A L'AEROPORT INTERNATIONAL D'AHMED SEKOU TOURE"), 'LR', 1, 'C');
        $this->SetX(40);
        $this->Cell(130, 3, utf8_decode("Immeuble TOURE APPARTEMENT 4A-AUTO-ROUTE FIDEL CASTRO"), 'LR', 1, 'C');
        $this->SetX(40);
        $this->Cell(130, 3, utf8_decode("COMMUNE DE MATOTO - BP: 2024 Conakry - République de Guinée"), 'LR', 1, 'C');
        $this->SetX(40);
        $this->SetFont('Arial', 'IB', 6.5);
        $this->Cell(130, 3, utf8_decode("Tél: 00224 625 12 32 32 - Site Web: www.jss-gn.com"), 'LR', 1, 'C');
        
        // Flag Guinea
        // $this->Image('images/flag.png', 10, 277, 25);
        // $this->Image('images/branding.png', 175, 277, 25);
    }

    // Tableau simple
    function basicTable($header, $data)
    {
        // En-tête
        foreach($header as $col)
            $this->Cell(40, 7, utf8_decode(strtoupper($col)), 1);
        $this->Ln();
        // Données
        foreach($data as $row)
        {
            foreach($row as $col)
                $this->Cell(40, 6, $col, 1);
            $this->Ln();
        }
    }

    // Tableau amélioré
    function nfs_table($header, $data)
    {
        // Column Width
        $width = [80, 50, 20, 20, 20];
        
        // Headers
        for($i = 0; $i < count($header); $i++)
            $this->Cell($width[$i], 7, utf8_decode($header[$i]), 1, 0, 'C');
        $this->Ln();

        
        $this->setFont('Arial', 'I', 9);
        // Data
        foreach($data as $key => $row)
        {
            $this->Cell($width[0], 6, utf8_decode($key), 'LRTB', 0, 'C', $row['fill']);
            $this->Cell($width[1], 6, utf8_decode(str_replace('.', ',', $row['value'])), 'LRTB', 0, 'C', $row['fill']);
            $this->Cell($width[2], 6, utf8_decode($row['unit']), 'LRTB', 0, 'R', $row['fill']);
            $this->Cell($width[3], 6, $row['min'], 'LRTB', 0, 'R', $row['fill']);
            $this->Cell($width[4], 6, $row['max'], 'LRTB', 0, 'R', $row['fill']);
            $this->Ln();
        }
        // Trait de terminaison
        $this->Cell(array_sum($width), 0, '', 'T');
    }

    // Tableau coloré
    function FancyTable($header, $data, $isReceipt, $others = [], $isDiama = false)
    {
        // Couleurs, épaisseur du trait et police grasse
        $this->SetFillColor(150, 0, 0);
        $this->SetTextColor(255);
        $this->SetDrawColor(0, 0, 0);
        $this->SetLineWidth(.3);
        $this->SetFont('', 'IB');
        // En-tête
        $w = array(10, 80, 35, 30, 35);
        for($i=0; $i < count($header); $i++)
            $this->Cell($w[$i], 7, utf8_decode($header[$i]), 1, 0, 'C', true);
        $this->Ln();
        // Restauration des couleurs et de la police
        $this->SetFillColor(224, 215, 215);
        $this->SetTextColor(0);
        $this->SetLineWidth(.1);
        // Données
        $fill = false;
        $this->SetFont('Arial', 'I', 8);
        $sum = 0;
        $taxs = 0;
        foreach($data as $key => $row)
        {
            $this->Cell($w[0], 6, ++$key, 'LR', 0, 'C', $fill);
            $this->Cell($w[1], 6, utf8_decode($row->employee->matricule." - ".(!empty($row->employee->currentAffectation()->location) ? $row->employee->currentAffectation()->location : 'Non défini')), 'LR', 0, 'C', $fill);
            $this->Cell($w[2], 6, moneyformat($row->price), 'LR', 0, 'C', $fill);
            $this->Cell($w[3], 6, moneyformat($row->tva*0.01*$row->price), 'LR', 0, 'C', $fill);
            $this->Cell($w[4], 6, moneyformat($row->price+$row->tva*0.01*$row->price), 'LR', 0, 'C', $fill);
            $this->Ln();
            $fill = !$fill;
            $sum += $row->price;
            $taxs += $row->tva*0.01*$row->price;
        }
        // Trait de terminaison
        $this->Cell(array_sum($w), 0, '', 'T', 1);
        $this->Ln();
        $this->SetFont('Arial', 'I', 9);
        $supp = ['TOTAL HT'=>moneyformat($sum), 'TOTAL TVA'=>moneyformat($taxs)];
        $ttc = $sum+$taxs;
        if(!empty($others['discount'])) {
            $ttc -= $others['discount']; 
            $supp['TOTAL REMISE'] = moneyformat($others['discount']);
        }
        if(!empty($others['arrears'])) {
            $ttc += $others['arrears']; 
            $supp['TOTAL ARRIERES'] = moneyformat($others['arrears']);
        }
        $supp['MONTANT TTC'] = moneyformat($ttc);
        
        foreach($supp as $key => $item)
        {
            $this->setX(115);
            $this->Cell(40, 9, $key, 'LRT', 0, 'L', $fill);
            $this->Cell(45, 9, utf8_decode($item), 'LRT', 0, 'C', $fill);
            $this->Ln();
            $fill = !$fill;
        }
        $this->setX(115);
        $this->Cell(85, 0, '', 'T');
        
        $this->SetFont('Arial', 'I', 8);
        $this->setXY(10, $this->getY()-24);
        $this->Cell(80, 0, 'Conakry le '.date('d/m/Y'), '');
        $this->Image('images/signature.png', 10, $this->getY()+2, 30, 0);
        
        $this->Ln(25);
        $this->SetFont('Arial', 'I', 7.8);
        $txt = "Sauf Erreur ou Omission, le montant de ".($isReceipt == 1 ? 'ce reçu' : 'cette facture')." s'élève à ".$supp['MONTANT TTC']." comme TTC ".(!empty($supp['TOTAL ARRIERES']) ? "avec ".$supp['TOTAL ARRIERES']." comme arriérés sur le total HT " : "") . (!empty($supp['TOTAL REMISE']) ? "et ".$supp['TOTAL REMISE']." comme remise sur le total HT " : ""). "Payable en";
        
        if(strlen($txt) <= 110) 
            $txt .= "par chèque ou virement bancaire à l'ordre de: ";
        if(strlen($txt) <= 147 && strlen($txt) > 110) 
            $txt .= "par chèque,";
        // if(strlen($txt) <= 191 && strlen($txt) > 144){
        //     $txt = str_replace("sur le total HT Payable en liquidité, ", '', $txt);
        // } 
        
        $this->Cell(190, 6, utf8_decode($txt), '', 1, 'L');
        if(strlen($txt) <= 110) 
            $this->setXY(10, $this->getY());
        
        // if(strlen($txt) <= 156 && strlen($txt) > 110 && strlen($txt) != 149) {
        //     $this->setX(10);
        //     $this->Cell(30, 3, utf8_decode("par virement bancaire à l'ordre de: "), '', 0, 'L');
        //     $this->setX(53);
        // }
        // dd( strlen($txt) );
        if(strlen($txt) <= 191 && strlen($txt) > 144){
            $this->setX(10);
            $this->Cell(40, 3, utf8_decode("liquidité, par chèque ou par virement bancaire à l'ordre de: "), '', 0, 'L');
            $this->setX(81);
        } 
        
        $bankname = "JAGUAR SECURITY SERVICES SARL - RIB: ". ($isDiama ? '0010330009-04 - DIAMA BANK' : '004.002.4410425102.05 - BANQUE ISLAMIQUE DE GUINEE (BIG)');
        // if(strlen($txt) <= 191 && strlen($txt) > 144) {
        //     $bankname = str_replace("ISLAMIQUE DE GUINEE (BIG)", '', $bankname);
        // } 
        $this->SetFont('Arial', 'IB', 6.5);
        $this->Cell(80, 3, utf8_decode($bankname), '', 1, 'L');
        // if(strlen($txt) <= 191 && strlen($txt) > 144) {
        //     $this->setX(10);
        //     $this->Cell(40, 5, utf8_decode("ISLAMIQUE DE GUINEE (BIG)"), '', 1, 'L');
        // }
    }
    
    function bankTransfer($header, $data)
    {
        // Couleurs, épaisseur du trait et police grasse
        $this->SetFillColor(150, 0, 0);
        $this->SetTextColor(255);
        $this->SetDrawColor(0, 0, 0);
        $this->SetLineWidth(.6);
        $this->SetFont('','B');
        // En-tête
        $w = array(10, 75, 35, 35, 35);
        for($i=0; $i < count($header); $i++)
            $this->Cell($w[$i], 7, utf8_decode($header[$i]), 1, 0, 'C', true);
        $this->Ln();
        // Restauration des couleurs et de la police
        $this->SetFillColor(224, 215, 215);
        $this->SetTextColor(0);
        $this->SetLineWidth(.1);
        $this->SetFont('');
        // Données
        $fill = false;
        $this->SetFont('Arial', 'I', 9);
        $sum = 0; $tva = 0;
        foreach($data as $key => $row)
        {
            $this->Cell($w[0], 6, ++$key, 'LR', 0, 'C', $fill);
            $this->Cell($w[1], 6, utf8_decode($row->firstname." ".$row->name), 'LR', 0, 'L', $fill);
            $this->Cell($w[2], 6, utf8_decode($row->matricule), 'LR', 0, 'C', $fill);
            $this->Cell($w[3], 6, utf8_decode($row->rib), 'LR', 0, 'C', $fill);
            $this->Cell($w[4], 6, moneyformat(($row->salary+$row->prime)-($row->acompte+$row->sanction)-($row->salary+$row->prime)*($row->cnss+$row->rts)*0.01), 'LR', 0, 'C', $fill);
            $this->Ln();
            $fill = !$fill; 
            $sum += ($row->salary+$row->prime)-($row->acompte+$row->sanction)-($row->salary+$row->prime)*($row->cnss+$row->rts)*0.01; 
            $tva += ($row->salary+$row->prime-$row->acompte-$row->sanction)*($row->cnss+$row->rts)*0.01; 
        }
        // Trait de terminaison
        $this->Cell(array_sum($w), 0, '', 'T', 1);
        $this->Ln(2);
        $this->SetFont('Arial', 'I', 9);
        foreach(array('TOTAL HT'=>moneyformat($sum+$tva), 'TAXES (CNSS & RTS)'=>moneyformat($tva), 'MONTANT TTC'=>moneyformat($sum)) as $key => $item)
        {
            $this->setX(105);
            $this->Cell(50, 9, $key, 'LRT', 0, 'L', $fill);
            $this->Cell(45, 9, utf8_decode($item), 'LRT', 0, 'C', $fill);
            $this->Ln();
            $fill = !$fill;
        }
        $this->setX(105);
        $this->Cell(95, 0, '', 'T');
        $this->Ln(5);
        $this->setX(160);
        $this->Cell(80, 0, 'Conakry, le '.date('d/m/Y'), '');
        $this->Image('images/signature.png', 70, $this->getY()-30, 30, 0);
        
        $this->setX(30);
        $this->Image('images/cachet.png', 10, $this->getY()-30, 20, 0);
        $this->Image('images/signature_only.png', 35, $this->getY()-15, 50, 0);
        
        $this->setX(100);
        
    }
    
    function getEmployeesAffected($header, $data)
    {
        // Couleurs, épaisseur du trait et police grasse
        $this->SetFillColor(150, 0, 0);
        $this->SetTextColor(255);
        $this->SetDrawColor(0, 0, 0);
        $this->SetLineWidth(.3);
        $this->SetFont('','IB');
        // En-tête
        $w = array(10, 35, 40, 105);
        for($i=0; $i < count($header); $i++)
            $this->Cell($w[$i], 7, utf8_decode($header[$i]), 1, 0, 'C', true);
        $this->Ln();
        // Restauration des couleurs et de la police
        $this->SetFillColor(224, 215, 215);
        $this->SetTextColor(0);
        $this->SetLineWidth(.1);
        $this->SetFont('');
        // Données
        $fill = false;
        $this->SetFont('Arial', 'I', 11);
        $sum = 0; $tva = 0;
        foreach($data as $key => $row)
        {
            $this->Cell($w[0], 6, ++$key, 'LR', 0, 'C', $fill);
            $this->Cell($w[1], 6, utf8_decode($row->matricule), 'LR', 0, 'C', $fill);
            $this->Cell($w[2], 6, moneyformat(($row->salary+$row->prime)-($row->acompte+$row->sanction)-($row->salary+$row->prime)*($row->cnss+$row->rts)*0.01), 'LR', 0, 'C', $fill);
            $this->Cell($w[3], 6, utf8_decode($row->affectations->first()->customer->name), 'LR', 0, 'L', $fill);
            $this->Ln();
            $fill = !$fill; 
            $sum += ($row->salary+$row->prime)-($row->acompte+$row->sanction)-($row->salary+$row->prime)*($row->cnss+$row->rts)*0.01; 
            $tva += ($row->salary+$row->prime)*($row->cnss+$row->rts)*0.01; 
        }
        // Trait de terminaison
        $this->Cell(array_sum($w), 0, '', 'T', 1);
        $this->Ln(2);
        $this->SetFont('Arial', 'I', 10);
        foreach(array('TOTAL HT'=>moneyformat($sum+$tva), 'TAXES (CNSS & RTS)'=>moneyformat($tva), 'MONTANT TTC'=>moneyformat($sum)) as $key => $item)
        {
            $this->setX(115);
            $this->Cell(40, 9, $key, 'LRT', 0, 'L', $fill);
            $this->Cell(45, 9, utf8_decode($item), 'LRT', 0, 'C', $fill);
            $this->Ln();
            $fill = !$fill;
        }
        $this->setX(115);
        $this->Cell(85, 0, '', 'T');
        $this->Ln(5);
        $this->setX(160);
        $this->Cell(80, 0, 'Conakry, le '.date('d/m/Y'), '');
        $this->Image('images/signature.png', 150, $this->getY()+3, 50, 0);
        
        $this->setX(30);
        $this->Cell(80, 0, 'PDG', '');
        $this->Image('images/signature_pdg.png', 15, $this->getY()+3, 70, 0);
    }
}