<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class FrontEndController extends Controller
{
  public function beranda()
  {
    //Get data Peringatan dini cuaca
    $url = "https://data.mhews.id/api/warningcuaca/Sulawesi%20Tenggara";
    $curl = curl_init($url);
    curl_setopt($curl, CURLOPT_URL, $url);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    $headers = array(
      "Apikey: Qyzq2rgEdpC46r2wz42bvqWSUIkD7y4W5PiN98AQhtJ7EMkjzROdJsTIEcxdo5ZA",
      "Content-Type: application/json",
    );
    curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
    $respWarning = curl_exec($curl);
    curl_close($curl);
    $dataWarning = json_decode($respWarning);

    //Get data Gempa
    $urlGempa = "https://data.mhews.id/api/autogempa";
    $curlGempa = curl_init($urlGempa);
    curl_setopt($curlGempa, CURLOPT_URL, $urlGempa);
    curl_setopt($curlGempa, CURLOPT_RETURNTRANSFER, true);
    $headers = array(
      "Apikey: Qyzq2rgEdpC46r2wz42bvqWSUIkD7y4W5PiN98AQhtJ7EMkjzROdJsTIEcxdo5ZA",
      "Content-Type: application/json",
    );
    curl_setopt($curlGempa, CURLOPT_HTTPHEADER, $headers);
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
    $peringatanterakhir = "Tidak ada peringatan dini cuaca wilayah Sulawesi Tenggara";
    if (is_array($xmlpd) || is_object($xmlpd)) {
      foreach ($xmlpd->info->data as $pdcuaca) {
        // echo $pdcuaca->headline . "<br>"; 
        if ($pdcuaca->headline == "Peringatan Dini Cuaca Sulawesi Tenggara") {
          $skip = false;
          $peringatanterakhir = $pdcuaca->description;
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
      'dataWarning' => $dataWarning,
      'dataGempa' => $dataGempa,
      'dataCuaca' => $dataCuaca,
      'post' => $post,
      // 'xmlm5' => $xmlm5,
      // 'xmlpd' => $xmlpd,
      // 'skip' => $skip,
      'peringatanterakhir' => $peringatanterakhir
    ];

    return view('frontend.beranda', compact('data'));
  }

  public function post($slug)
  {
    $post = Post::with('user', 'category', 'tags')->where('slug', '=', $slug)->first();
    $recentPost = Post::with('user', 'category', 'tags')->limit(5)->get();


    return view('frontend.berita', compact('post', 'recentPost'));
  }
}
