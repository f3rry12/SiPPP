<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Exception;
use App\admin;
use App\nomertelephone;
use App\penyakit;
use App\obat;


class AdminController extends Controller
{
  public function auth(){
      if(!Session::get('login')){
          return redirect('login')->with('alert','Kamu harus login dulu');
      }
      else{
        $nomers = nomertelephone::all();
        $sakits = penyakit::all();
        $obats = obat::all();
        return view('admin',['nomers'=>$nomers,'sakits'=>$sakits,'obats'=>$obats]);
      }
  }


  public function login(){
      return view('login');
  }
  public function loginPost(Request $request){
      $usrname = $request->usrname;
      $pass = $request->pass;
      $data = admin::where('usrname',$usrname)->first();
        //  if($data->count() > 0){
        try { //try
        if($data->count() > 0){ //apakah email tersebut ada atau tidak
            if(Hash::check($pass,$data->pass)){
              Session::put('usrname',$data->usrname);
              Session::put('login',TRUE);
              return redirect('admin');
            }
            else{
                return redirect('login')->with('alert','Username atau password tidak sesuai'.Hash::check($password,$data->password));
            }
        }
        else{
            return redirect('login')->with('alert','Username atau password tidak sesuai');
        }
      } catch (\Throwable $ex) { //catch
  return redirect('login')->with('alert','Username atau password tidak sesuai'); //catch
} //catch
  }
  public function logout(){
      Session::flush();
      return redirect(url('/'));
  }


  public function tambahskt(Request $request){
    if(!Session::get('login')){
        return redirect('login')->with('alert','Kamu harus login dulu');
    }
    else{
    return view('tambahskt');
    }
  }

  public function sktpost(Request $request){
    $this->validate($request, [
      'namaPenyakit' => 'required|max:100',
      'gejala' => 'required|max:255',
      'penjelasan' => 'max:255',
    ]);
    $sakit = new penyakit();
    $sakit->namaPenyakit = $request->namaPenyakit;
    $sakit->gejala = '  '.$request->gejala;
    $sakit->penjelasan = $request->penjelasan;
    $sakit->save();
    return redirect('admin');
  }

  public function hapusskt($namaPenyakit){
    $sakit = penyakit::where('namaPenyakit',$namaPenyakit);
    $sakit->delete();
    return redirect('admin');
  }

  public function tambahobt(Request $request){
    if(!Session::get('login')){
        return redirect('login')->with('alert','Kamu harus login dulu');
    }
    else{
    return view('tambahobt');
    }
  }

  public function obtpost(Request $request){
    $this->validate($request, [
      'namaObat' => 'required|max:100',
      'gejala' => 'required|max:255',
      'jenisObat' => 'required',
    ]);
    $obat = new obat();
    $obat->namaObat = $request->namaObat;
    $obat->gejala = $request->gejala;
    $obat->jenisObat = $request->jenisObat;
    $obat->save();
    return redirect('admin');
  }

  public function hapusobt($namaObat){
    $obat = obat::where('namaObat',$namaObat);
    $obat->delete();
    return redirect('admin');
  }


public function tambahrs(Request $request){
  if(!Session::get('login')){
      return redirect('login')->with('alert','Kamu harus login dulu');
  }
  else{
  return view('tambahrs');
  }
}

public function rspost(Request $request){
  $this->validate($request, [
    'namaRS' => 'required|max:100',
    'kota' => 'required|max:100',
    'NmrTlpn' => 'required|max:12',
  ]);
  $nomer = new nomertelephone();
  $nomer->namaRS = $request->namaRS;
  $nomer->kota = $request->kota;
  $nomer->NmrTlpn = $request->NmrTlpn;
  $nomer->save();
  return redirect('admin');
}

public function hapusrs($namaRS){
  $nomer = nomertelephone::where('namaRS',$namaRS);
  $nomer->delete();
  return redirect('admin');
}


  public function register(Request $request){
        return view('register');
    }
    public function registerPost(Request $request){
        $data =  new admin();
        $data->usrname= $request->usrname;
        $data->pass = bcrypt($request->pass);
        $data->save();
        return redirect('login')->with('alert-success','Kamu berhasil Register');
    }

}
