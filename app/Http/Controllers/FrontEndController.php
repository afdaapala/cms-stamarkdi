<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class FrontEndController extends Controller
{
  public function beranda()
  {
    //Get data Peringatan dini cuaca
    // $url = "https://data.mhews.id/api/warningcuaca/Sulawesi%20Tenggara";
    // $curl = curl_init($url);
    // curl_setopt($curl, CURLOPT_URL, $url);
    // curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    // $headers = array(
    //   "Apikey: Qyzq2rgEdpC46r2wz42bvqWSUIkD7y4W5PiN98AQhtJ7EMkjzROdJsTIEcxdo5ZA",
    //   "Content-Type: application/json",
    // );
    // curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
    // $respWarning = curl_exec($curl);
    // curl_close($curl);
    // $dataWarning = json_decode($respWarning);

    //Get data Gempa
    // $urlGempa = "https://data.mhews.id/api/autogempa";
    $urlGempa = "https://data.bmkg.go.id/DataMKG/TEWS/autogempa.json";
    $curlGempa = curl_init($urlGempa);
    curl_setopt($curlGempa, CURLOPT_URL, $urlGempa);
    curl_setopt($curlGempa, CURLOPT_RETURNTRANSFER, true);
    // $headers = array(
    //   "Apikey: Qyzq2rgEdpC46r2wz42bvqWSUIkD7y4W5PiN98AQhtJ7EMkjzROdJsTIEcxdo5ZA",
    //   "Content-Type: application/json",
    // );
    // curl_setopt($curlGempa, CURLOPT_HTTPHEADER, $headers);
    $respGempa = curl_exec($curlGempa);
    curl_close($curlGempa);
    $dataGempa = json_decode($respGempa);



    //Get data Prakiraan Cuaca
    $urlCuaca = "https://data.mhews.id/api/cuaca?prov=Sulawesi%20Tenggara";
    $curlCuaca = curl_init($urlCuaca);
    curl_setopt($curlCuaca, CURLOPT_URL, $urlCuaca);
    curl_setopt($curlCuaca, CURLOPT_RETURNTRANSFER, true);
    $headers = array(
      "Apikey: Qyzq2rgEdpC46r2wz42bvqWSUIkD7y4W5PiN98AQhtJ7EMkjzROdJsTIEcxdo5ZA",
      "Content-Type: application/json",
    );
    curl_setopt($curlCuaca, CURLOPT_HTTPHEADER, $headers);
    $respCuaca = curl_exec($curlCuaca);
    curl_close($curlCuaca);
    $dataCuaca = json_decode($respCuaca);

    //Get data Post
    $post = Post::with('user', 'category', 'tags')->limit(6)->get();

    $xmlm5 = simplexml_load_file("https://data.bmkg.go.id/DataMKG/TEWS/autogempa.xml") or die("Gagal ambil data gempa");
    $xmlpd = simplexml_load_file("http://datadisplay.bmkg.go.id/XML/Warning_Cuaca_Indonesia.xml") or die("Gagal ambil data warning cuaca");
    $skip = true;
    // $gempaTanggal = $xmlm5->Infogempa->gempa->Tanggal;
    $peringatanterakhir = "Tidak ada peringatan dini cuaca wilayah Sulawesi Tenggara";
    $peringatanimg0 = "Tidak ada infografis peringatan dini terbaru";
    if (is_array($xmlpd) || is_object($xmlpd)) {
      foreach ($xmlpd->info->data as $pdcuaca) {
        // echo $pdcuaca->headline . "<br>"; 
        if ($pdcuaca->headline == "Peringatan Dini Cuaca Sulawesi Tenggara") {
          $skip = false;
          $peringatanterakhir = $pdcuaca->description;
          $peringatanhead = $pdcuaca->headline;
          $peringatanimg = $pdcuaca->ID_Kode;
          // $peringatanimg0 = "https://warningcuaca.bmkg.go.id/infografis/CST/" . substr($peringatanimg, 3, 4) . "/" . substr($peringatanimg, 7, 2) . "/" . substr($peringatanimg, 9, 2) . "/" . $peringatanimg . "_image0.jpg";
        }
        if ($skip) {
          continue;
        } else {
          // echo $peringatanterakhir . "<br>";
          // $peringatanterakhir = "Tidak ada peringatan dini cuaca wilayah Sulawesi Tenggara" . "<br>";
          // echo "Tidak ada peringatan dini cuaca wilayah Sulawesi Tenggara";
          break;
        }
      }
    }

    $data = [
      // 'dataWarning' => $dataWarning,
      'dataGempa' => $dataGempa,
      'dataCuaca' => $dataCuaca,
      'post' => $post,
      'xmlm5' => $xmlm5,
      // 'gTanggal' => $gempaTanggal,
      'xmlpd' => $xmlpd,
      // 'skip' => $skip,
      'peringatanterakhir' => $peringatanterakhir,
      // 'peringatanimg0' => $peringatanimg0
    ];

    return view('frontend.beranda', compact('data'));
  }

  public function post($slug)
  {
    $post = Post::with('user', 'category', 'tags')->where('slug', '=', $slug)->first();
    $recentPost = Post::with('user', 'category', 'tags')->limit(5)->get();


    return view('frontend.berita', compact('post', 'recentPost'));
  }

  public function postingan()
  {
    // $recentPost = Post::with('user', 'category', 'tags')->limit(5)->get();
    $recentPost = Post::all();

    return view('frontend.postingan', compact('recentPost'));
  }

  public function citra()
  {
    $data = [];
    return view('frontend.citra', compact('data'));
  }

  public function ibf()
  {
    $data = [];
    return view('frontend.ibf', compact('data'));
  }

  public function display()
  {
    $data = [];
    return view('frontend.display', compact('data'));
  }

  public function pertamina()
  {
    $data = [];
    return view('frontend.display.pertamina-baubau', compact('data'));
  }

  public function pertaminakdi()
  {
    $data = [];
    return view('frontend.display.pertamina-kendari', compact('data'));
  }

  public function gempa()
  {
    $data = [];
    return view('frontend.gempa', compact('data'));
  }

  public function profil()
  {
    $data = [];
    return view('frontend.profil', compact('data'));
  }
}
