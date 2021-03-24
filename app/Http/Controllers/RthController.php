<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redis;

class RthController extends Controller
{
    function family(Request $request){
        $path1= $request->file('pic1');
        $newname1 = rand().'.'.$path1->getClientOriginalExtension();
        $path1->move(public_path('pichome'),$newname1);
        $path2= $request->file('pic2');
        $newname2 = rand().'.'.$path2->getClientOriginalExtension();
        $path2->move(public_path('pichome'),$newname2);

        $cardid = ($request->input('cardid'))?: NULL;
        $no = ($request->input('no'))?: NULL;
        $soy = ($request->input('soy'))?: NULL;
        $tel = ($request->input('tel'))?: NULL;
        $road = ($request->input('road'))?: NULL;
        $firstname = ($request->input('firstname'))?: NULL;
        $lastname = ($request->input('lastname'))?: NULL;
        $occupation = ($request->input('occupation'))?: NULL;
        $status = ($request->input('status'))?: NULL;
        $moo = ($request->input('moo'))?: NULL;
        $amount = ($request->input('family'))?: NULL;
        $pic1 = ($newname1)?: NULL;
        $pic2 = ($newname2)?: NULL;



        $getid = DB::table('family')
                    ->insertGetId([
                        'idcard' => $cardid,
                        'family_no' => $no,
                        'family_soy' => $soy,
                        'family_tel' => $tel,
                        'family_road' => $road,
                        'family_firstname' => $firstname,
                        'family_lastname' => $lastname,
                        'family_occupation' => $occupation,
                        'family_status' => $status,
                        'family_amount' => $amount,
                        'family_moo' => $moo,
                        'family_pic1' => $pic1,
                        'family_pic2' => $pic2
                    ]);
                    if ($getid&&$amount>0) {
                        for ($i=1; $i <=$amount ; $i++) {
                            $firstnamei = ($request->input('firstname'.$i))?: NULL;
                            $lastnamei = ($request->input('lastname'.$i))?: NULL;
                            $cardidi = ($request->input('cardid'.$i))?: NULL;
                            $abouti = ($request->input('about'.$i))?: NULL;
                            $agei = ($request->input('age'.$i))?: NULL;
                            $desibledi = ($request->input('desibled'.$i))?: NULL;
                            $money1 = ($request->input('mony'.$i.'1'))?: NULL;
                            $money2 = ($request->input('mony'.$i.'2'))?: NULL;
                            $money3 = ($request->input('mony'.$i.'3'))?: NULL;
                            $money4 = ($request->input('mony'.$i.'4'))?: NULL;
                            $money5 = ($request->input('mony'.$i.'5'))?: NULL;
                            $money6 = ($request->input('mony'.$i.'6'))?: NULL;

                            $savemember = DB::table('family_member')
                                            ->insertGetId([
                                                'family_id' => $getid,
                                                'member_firstname' => $firstnamei,
                                                'member_lastname' => $lastnamei,
                                                'member_about' => $abouti,
                                                'member_age' => $agei,
                                                'member_disabled' => $desibledi,
                                                'idcard' => $cardidi,
                                                'member_money1' => $money1,
                                                'member_money2' => $money2,
                                                'member_money3' => $money3,
                                                'member_money4' => $money4,
                                                'member_money5' => $money5,
                                                'member_money6' => $money6
                                            ]);

                        }
                        $disabled1 = ($request->input('disabled1'))?: NULL;
                        $disabled2 = ($request->input('disabled2'))?: NULL;
                        $disabled3 = ($request->input('disabled3'))?: NULL;
                        $disabled4 = ($request->input('disabled4'))?: NULL;
                        $live1 = ($request->input('live1'))?: NULL;
                        $live2 = ($request->input('live2'))?: NULL;
                        $live3 = ($request->input('live3'))?: NULL;
                        $live4 = ($request->input('live4'))?: NULL;
                        $price = ($request->input('price'))?: NULL;
                        $vasatdu1 = ($request->input('vasatdu1'))?: NULL;
                        $vasatdu2 = ($request->input('vasatdu2'))?: NULL;
                        $vasatdu3 = ($request->input('vasatdu3'))?: NULL;
                        $vasatdu4 = ($request->input('vasatdu4'))?: NULL;
                        $vasatdu5 = ($request->input('vasatdu5'))?: NULL;
                        $vasatdu6 = ($request->input('vasatdu6'))?: NULL;
                        $vasatdu7 = ($request->input('vasatdu7'))?: NULL;
                        $vasatdu8 = ($request->input('vasatdu8'))?: NULL;
                        $farban1 = ($request->input('farban1'))?: NULL;
                        $farban2 = ($request->input('farban2'))?: NULL;
                        $farban3 = ($request->input('farban3'))?: NULL;
                        $farban4 = ($request->input('farban4'))?: NULL;
                        $farban5 = ($request->input('farban5'))?: NULL;
                        $farban6 = ($request->input('farban6'))?: NULL;
                        $farban7 = ($request->input('farban7'))?: NULL;
                        $farban8 = ($request->input('farban8'))?: NULL;
                        $rangcar1 = ($request->input('rangcar1'))?: NULL;
                        $rangcar2 = ($request->input('rangcar2'))?: NULL;
                        $rangcar3 = ($request->input('rangcar3'))?: NULL;
                        $rangcar4 = ($request->input('rangcar4'))?: NULL;
                        $rangcar5 = ($request->input('rangcar5'))?: NULL;
                        $rangcar6 = ($request->input('rangcar6'))?: NULL;
                        $toilet = ($request->input('toilet'))?: NULL;
                        $kasad = ($request->input('kasad'))?: NULL;
                        $kasad2 = ($request->input('kasad2'))?: NULL;
                        $water1 = ($request->input('water1'))?: NULL;
                        $water2 = ($request->input('water2'))?: NULL;
                        $water3 = ($request->input('water3'))?: NULL;
                        $water4 = ($request->input('water4'))?: NULL;
                        $water5 = ($request->input('water5'))?: NULL;
                        $electricity = ($request->input(' $electricity'))?: NULL;
                        $electricity2 = ($request->input('electricity2'))?: NULL;
                        $vehicle = ($request->input('vehicle'))?: NULL;
                        $vehicle1 = ($request->input('vehicle1'))?: NULL;
                        $car = ($request->input('car'))?: NULL;
                        $car2 = ($request->input('car2'))?: NULL;
                        $carkasad = ($request->input('carkasad'))?: NULL;
                        $carkasad1 = ($request->input('carkasad1'))?: NULL;
                        $carmoto = ($request->input('carmoto'))?: NULL;
                        $carno = ($request->input('carno'))?: NULL;
                        $air = ($request->input('air'))?: NULL;
                        $tv = ($request->input('tv'))?: NULL;
                        $com = ($request->input('com'))?: NULL;
                        $refrigerator = ($request->input('refrigerator'))?: NULL;
                        $washer = ($request->input('washer'))?: NULL;
                        $nohave = ($request->input('nohave'))?: NULL;

                        $savestatushome = DB::table('home_status')
                                            ->insertGetId([
                                                'family_id' =>$getid,
                                                'disabled1' => $disabled1 ,
                                                'disabled2' => $disabled2 ,
                                                'disabled3' => $disabled3 ,
                                                'disabled4' => $disabled4 ,
                                                'live1' => $live1 ,
                                                'live2' => $live2 ,
                                                'live3' => $live3 ,
                                                'live4' => $live4 ,
                                                'price' => $price ,
                                                'vasatdu1' => $vasatdu1 ,
                                                'vasatdu2' => $vasatdu2 ,
                                                'vasatdu3' => $vasatdu3 ,
                                                'vasatdu4' => $vasatdu4 ,
                                                'vasatdu5' => $vasatdu5 ,
                                                'vasatdu6' => $vasatdu6 ,
                                                'vasatdu7' => $vasatdu7 ,
                                                'vasatdu8' => $vasatdu8 ,
                                                'rangcar1' => $rangcar1 ,
                                                'rangcar2' => $rangcar2 ,
                                                'rangcar3' => $rangcar3 ,
                                                'rangcar4' => $rangcar4 ,
                                                'rangcar5' => $rangcar5 ,
                                                'rangcar6' => $rangcar6 ,
                                                'farban1' => $farban1 ,
                                                'farban2' => $farban2 ,
                                                'farban3' => $farban3 ,
                                                'farban4' => $farban4 ,
                                                'farban5' => $farban5 ,
                                                'farban6' => $farban6 ,
                                                'farban7' => $farban7 ,
                                                'farban8' => $farban8 ,
                                                'ftoilet' => $toilet ,
                                                'kasad1' => $kasad ,
                                                'kasad2' => $kasad2 ,
                                                'water1' => $water1 ,
                                                'water2' => $water2 ,
                                                'water3' => $water3 ,
                                                'water4' => $water4 ,
                                                'water5' => $water5 ,
                                                'electricity1' => $electricity ,
                                                'electricity2' => $electricity2 ,
                                                'vehicle1' => $vehicle ,
                                                'vehicle2' => $vehicle1 ,
                                                'car1' => $car ,
                                                'car2' => $car2 ,
                                                'carkasad1' => $carkasad ,
                                                'carkasad2' => $carkasad1 ,
                                                'carmoto' => $carmoto,
                                                'carno' => $carno ,
                                                'air' => $air ,
                                                'tv' => $tv ,
                                                'com' => $com ,
                                                'refrigerator' => $refrigerator ,
                                                'washer' => $washer ,
                                                'nohave' => $nohave
                                            ]);

                                                // if (!$savemember||!$savestatushome) {
                                                //     DB::table('family')->where('family_id', $getid)->delete();
                                                //     if (!$savemember) {
                                                //         DB::table('family_member')->where('family_id', $getid)->delete();
                                                //     }
                                                //     if (!$savestatushome) {
                                                //         DB::table('home_status')->where('family_id', $getid)->delete();
                                                //     }

                                                //     return false;
                                                // }
                    }
        return $getid;

    }
    function store(Request $request){
        $path=$request->file('pic');
        $newname = 'store'.rand().'.'.$path->getClientOriginalExtension();
        $path->move(public_path('pichome'),$newname);
        $no = ($request->input('no'))?: NULL;
        $soy = ($request->input('soy'))?: NULL;
        $road = ($request->input('road'))?: NULL;
        $moo = ($request->input('moo'))?: NULL;
        $store = ($request->input('store'))?: NULL;
        $firstname = ($request->input('firstname'))?: NULL;
        $lastname = ($request->input('lastname'))?: NULL;
        $tel = ($request->input('tel'))?: NULL;
        $getid =DB::table('store')
                ->insertGetId([
                    'store_no' => $no,
                    'store_soy' => $soy,
                    'store_road' => $road,
                    'store_moo' => $moo,
                    'store_name' => $store,
                    'store_firstname' => $firstname,
                    'store_lastname' => $lastname,
                    'store_tel' => $tel,
                    'store_pic' => $newname
                ]);
                return $getid;

    }
}
