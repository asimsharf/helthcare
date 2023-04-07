<?php

namespace App\Http\Controllers;

use GuzzleHttp\Psr7\Request;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

/**
 * @OA\PathItem(
 *   path="/products/{product_id}",
 *   @OA\Parameter(ref="#/components/parameters/product_id_in_path_required")
 * )
 */
class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    // public function send_code(Request $request)
    // {
    //     $client = new \GuzzleHttp\Client();
    //     $response = $client->get('https://api1.yamamah.com/SendSMSV2?Username=0505573444&Password=Aa12312300&Tagname=fnrco&RecepientNumber=+966558412655&Message=your verification code is 63442 fnrco&SendDateTime=0&EnableDR=true&SentMessageID=true');
    //     $res = json_decode((string)$response->getBody());
    //     $message  = $res . "\n";
    //     file_put_contents(app()->storagePath() . '/logs/otp.log', $message, FILE_APPEND);
    //     return $res;
    // }
}