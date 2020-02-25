<?php

namespace App\Http\Controllers;

 

use Illuminate\Http\Request; 
use App\responsable;
use App\ResponsableModel;

class agregarResponsable extends Controller
{
    public function index(){
        $responsables = ResponsableModel::all();

        return view('index')->with('responsables', $responsables);
      }
    
      // Fetch records
      public function getUsers(){
        // Call getuserData() method of responsable Model
        $userData['data'] = ResponsableModel::getuserData();
    
        echo json_encode($userData);
        exit;
      }
      public function store(Request $request)
      {
        $responsables = new ResponsableModel;

        $responsables->nombreRespons =  $request->input('txtnombre');
        $responsables->correoRespons =  $request->input('txtcorreo');
        $responsables->sedeRespons =  $request->input('txtsede');
        $responsables->dependRespons =  $request->input('txtdependencia'); 
        $responsables->save();
      }
    
      // Insert record
      public function addUser(Request $request){
    
        $name = $request->input('name');
        $username = $request->input('username');
        $email = $request->input('email');
    
        if($name !='' && $username !='' && $email != ''){
          $data = array('name'=>$name,"username"=>$username,"email"=>$email);
    
          // Call insertData() method of responsable Model
          $value = ResponsableModel::insertData($data);
          if($value){
            echo $value;
          }else{
            echo 0;
          }
    
        }else{
           echo 'Fill all fields.';
        }
    
        exit; 
      }
    
      // Update record
      public function updateUser(Request $request){
    
        $name = $request->input('name');
        $email = $request->input('email');
        $editid = $request->input('editid');
    
        if($name !='' && $email != ''){
          $data = array('name'=>$name,"email"=>$email);
    
          // Call updateData() method of responsable Model
          ResponsableModel::updateData($editid, $data);
          echo 'Update successfully.';
        }else{
          echo 'Fill all fields.';
        }
    
        exit; 
      }
    
      // Delete record
      public function deleteUser($id=0){
        // Call deleteData() method of responsable Model
        ResponsableModel::deleteData($id);
    
        echo "Delete successfully";
        exit;
      }
   }
   