<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Member;
use PDF;

class PDFController extends Controller
{
    public function pdf(){
    	$members=Member::all();
    	$pdf=PDF::loadView('layouts.export-pdf',['members'=>$members])->setPaper('a4', 'landscape');
    	return $pdf->download('members.pdf');
    }
}
