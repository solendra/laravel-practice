<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\MembersController;
use App\Member;
use Excel;
use Input;


class ExcelController extends Controller
{
    public function exportMembers(){

   	$export=Member::all();
   	Excel::create('members_export',function($excel) use ($export){
   		$excel->sheet('sheet1',function($sheet) use ($export){
   			$sheet->fromArray($export);
   		});
   	})->export('xlsx');
      return redirect('members');

}

public function exportMembersCSV(){

   	$export=Member::all();
   	Excel::create('members_export',function($excel) use ($export){
   		$excel->sheet('sheet1',function($sheet) use ($export){
   			$sheet->fromArray($export);
   		});
   	})->export('csv');
      return redirect('members');

}

public function importexcel(){
  Excel::load(Input::file('file_upload'),function($reader){
   $reader->each(function($sheet){
      foreach ($sheet->toArray() as $row) {
         Member::firstOrCreate($sheet->toArray());
         }
   });
  });
  return redirect('members');
}

}
