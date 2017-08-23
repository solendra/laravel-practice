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

public function importexcel(Request $request){

  $rules=array(
    'file_upload'=>'required|max:50000|mimes:xlsx,csv'
    );
  $msg=[
  'file_upload.required'=>'please select file',
  'file_upload.mimes'=>'please upload excel or csv format file',
  'file_upload.max'=>'File size is more'
  ];

  if ( $this->validate($request, $rules,$msg)) {
    Excel::load(Input::file('file_upload'),function($reader){
   $reader->each(function($sheet){
      foreach ($sheet->toArray() as $row) {
         Member::firstOrCreate($sheet->toArray());
         }
   });
  });
  return redirect('members');  } 

  else {
    return redirect('members')-withErrors($msg);
  }
  
//   $this->validate($request, $rules,$msg);

//   Excel::load(Input::file('file_upload'),function($reader){
//    $reader->each(function($sheet){
//       foreach ($sheet->toArray() as $row) {
//          Member::firstOrCreate($sheet->toArray());
//          }
//    });
//   });
//   return redirect('members');
// }

}
}