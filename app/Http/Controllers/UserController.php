<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

use App\nomertelephone;
use App\penyakit;
use App\obat;

class UserController extends Controller
{
    public function index(){
      //penyakit
      $kumpulanagejala = DB::table('penyakit')->select('gejala')->distinct()->get();
      $sakitdd = array();
      $i=0;
      foreach ($kumpulanagejala as $key) {
        $e = explode(" ",$key->gejala);
        foreach ($e as $f) {
          $sakitdd[$i] = $f;
          $i++;
        }
      }
      $sakits = penyakit::where('gejala','none');
      $condition = false;

      //obat
      $kumpulanagejala2 = DB::table('obat')->select('gejala')->distinct()->get();
      $obatdd = array();
      $k=0;
      foreach ($kumpulanagejala2 as $key2) {
        $l = explode(",",$key2->gejala);
        foreach ($l as $a) {
          $obatdd[$k] = $a;
          $k++;
        }
      }
      $obats = obat::where('gejala','none');

      //rumah sakit
      $nomerdd = DB::table('nomertelephone')->select('kota')->distinct()->get();
      $nomers = nomertelephone::where('kota','none');
      return view('home',['sakitdd'=>array_unique($sakitdd),'condition'=>$condition,'obats'=>$obats,'obatdd'=>array_unique($obatdd),'sakits'=>$sakits,'nomers'=>$nomers,'nomerdd'=>$nomerdd]);
    }

    public function selectGejala(Request $request){
      $kumpulanagejala = DB::table('penyakit')->select('gejala')->distinct()->get();
      $sakitdd = array();
      $i=0;
      foreach ($kumpulanagejala as $key) {
        $e = explode(" ",$key->gejala);
        foreach ($e as $f) {
          $sakitdd[$i] = $f;
          $i++;
        }
      }
      $sakits = DB::table('penyakit')->where('gejala', 'like', '%'.$request->sakitdd1.'%')->where('gejala', 'like', '%'.$request->sakitdd2.'%')->where('gejala', 'like', '%'.$request->sakitdd3.'%')->get();
      $condition = true;
      $max = false;
      if ($request->sakitdd1 == "" && $request->sakitdd2 == "" && $request->sakitdd3 == "") {
        $max = true;
      }
      $kumpulanagejala2 = DB::table('obat')->select('gejala')->distinct()->get();
      $obatdd = array();
      $k=0;
      foreach ($kumpulanagejala2 as $key2) {
        $l = explode(",",$key2->gejala);
        foreach ($l as $a) {
          $obatdd[$k] = $a;
          $k++;
        }
      }
      $obats = obat::where('gejala','none');
      $nomerdd = DB::table('nomertelephone')->select('kota')->distinct()->get();
      $nomers = nomertelephone::where('kota','none');
      return view('home',['sakitdd'=>array_unique($sakitdd),'condition'=>$condition,'max'=>$max,'obats'=>$obats,'obatdd'=>array_unique($obatdd),'sakits'=>$sakits,'nomers'=>$nomers,'nomerdd'=>$nomerdd]);
    }

    public function selectKota(Request $request){
      $kumpulanagejala = DB::table('penyakit')->select('gejala')->distinct()->get();
      $sakitdd = array();
      $i=0;
      foreach ($kumpulanagejala as $key) {
        $e = explode(" ",$key->gejala);
        foreach ($e as $f) {
          $sakitdd[$i] = $f;
          $i++;
        }
      }
      $sakits = penyakit::where('gejala','none');
      $condition = false;
      $kumpulanagejala2 = DB::table('obat')->select('gejala')->distinct()->get();
      $obatdd = array();
      $k=0;
      foreach ($kumpulanagejala2 as $key2) {
        $l = explode(",",$key2->gejala);
        foreach ($l as $a) {
          $obatdd[$k] = $a;
          $k++;
        }
      }
      $obats = obat::where('gejala','none');
      $nomerdd = DB::table('nomertelephone')->select('kota')->distinct()->get();
      $nomers = DB::table('nomertelephone')->where('kota',$request->kota)->get();
      return view('home',['sakitdd'=>array_unique($sakitdd),'condition'=>$condition,'obats'=>$obats,'obatdd'=>array_unique($obatdd),'sakits'=>$sakits,'nomers'=>$nomers,'nomerdd'=>$nomerdd]);
    }

    public function selectGejala2(Request $request){
      //penyakit
      $kumpulanagejala = DB::table('penyakit')->select('gejala')->distinct()->get();
      $sakitdd = array();
      $i=0;
      foreach ($kumpulanagejala as $key) {
        $e = explode(" ",$key->gejala);
        foreach ($e as $f) {
          $sakitdd[$i] = $f;
          $i++;
        }
      }
      $sakits = penyakit::where('gejala','none');
      $condition = false;

      //obat
      $kumpulanagejala2 = DB::table('obat')->select('gejala')->distinct()->get();
      $obatdd = array();
      $k=0;
      foreach ($kumpulanagejala2 as $key2) {
        $l = explode(",",$key2->gejala);
        foreach ($l as $a) {
          $obatdd[$k] = $a;
          $k++;
        }
      }
      $obats = DB::table('obat')->where('gejala', 'like', '%'.$request->obatdd.'%')->get();

      //rumah sakit
      $nomerdd = DB::table('nomertelephone')->select('kota')->distinct()->get();
      $nomers = nomertelephone::where('kota','none');
      return view('home',['sakitdd'=>array_unique($sakitdd),'condition'=>$condition,'obats'=>$obats,'obatdd'=>array_unique($obatdd),'sakits'=>$sakits,'nomers'=>$nomers,'nomerdd'=>$nomerdd]);
    }

}
