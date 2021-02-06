<?php
namespace App\Http\Controllers;
use App\Mail\PmbAccount;
use App\Mail\PmbToken;
use App\Models\Pengaturan;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Mail;
class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    public function remove_image_one($image){
        if($image != ''){
            if(file_exists(public_path($image))){
                unlink(public_path($image));
            }
        }
    }
    public function pengaturan()
    {
        $pmb['status']    = Pengaturan::find(1)->pmb == 1 ? true : false;
        $pmb['data']      = Pengaturan::find(1);
        return $pmb;
    }
    public function send_email_token($data)
    {
        Mail::to($data['email'])->send(new PmbToken($data));
        return response()->json(200);
    }
    public function send_email_account($data)
    {
        Mail::to($data['email'])->send(new PmbAccount($data));
        return response()->json(200);
    }
}
