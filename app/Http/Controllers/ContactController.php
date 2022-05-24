<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;
use Illuminate\Support\Facades\DB;

class ContactController extends Controller
{
    public function index()
    {
        return view('index');
    }
    function check(Request $request){
        $validate_rule =[
            'lastname' => 'required',
            'firstname' => 'required',
            'email' => 'requied',
            'email' => 'email',
            'postcode'=>'required',
            'address'=>'required',
            'opinion'=>'required',
        ];
        $this->validate($request, $validate_rule);
        $inputs = new Contact;
        $inputs -> lastname = $request-> lastname;
        $inputs -> firstname =$request -> firstname;
        $inputs -> fullname = $inputs->lastname.$request->firstname;
        $gender = $request->input('gender');
        if($gender == 'male'){
            $gender = '男性';
        };
        if($gender == 'female'){
            $gender = '女性';
        };
        $inputs -> gender = $gender;
        $inputs -> email = $request->email;
        $inputs -> postcode = $request->postcode;
        $inputs -> address = $request->address;
        $building_name = $request->input('building_name');
        if(empty($building_name)){
            $building_name = null;
        };
        $inputs -> building_name = $building_name;
        $inputs -> opinion = $request->opinion;

        return view('check', ['inputs' => $inputs]);
	}
    public function send(Request $request)
    {
        if ($request->get('back')) {
            return redirect('/')->withInput();
        }
        $input = new Contact;
        $input -> fullname = $request->fullname;
        $input -> gender = $request->gender;
        $input -> email = $request->email;
        $input -> postcode = $request->postcode;
        $input -> address = $request->address;
        $input -> building_name = $request->building_name;
        $input -> opinion = $request->opinion;
        $input -> save();
        return view('thanks');
    }	
    public function list(Request $request)
    {
        $name = $request->input('name');
        $gender = $request->input('gender');
        $from = $request->input('from');
        if(!empty($from)) {
            $from = date('Y/m/d 00:00:00',strtotime($from));
        };
        $until = $request->input('until');
        if(!empty($until)) {
            $until = date('Y/m/d 23:59:59',strtotime($until));
        };
        $email = $request->input('email');
        $query = Contact::query();
        if(!empty($name)) {
            $query->where('fullname', 'LIKE', "%{$name}%");
        };
        if($gender == "male") {
            $query->where('gender','男性');
        };
        if($gender == "female") {
            $query->where('gender','女性');
        };
        if(!empty($email)) {
            $query->where('email', 'LIKE', "%{$email}%");
        };
        if (!empty($from) && !empty($until)) {
            $query->whereBetween("created_at",[$from, $until]);
        };
        $items = $query->paginate(5);
        return view('list',compact('items', 'name'));
    }
    public function delete(Request $request)
    {
        $param = ['id' => $request->id];
        $item = DB::select('select * from contacts where id = :id', $param);
        return view('list', ['form' => $item[0]]);
    }
    public function remove($id)
    {
        $param = \App\Models\Contact::find($id);
        $param->delete();
        return redirect()->to('/list');
    }
}
