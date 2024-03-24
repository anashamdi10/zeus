<?php

namespace App\Console\Commands;

use App\Models\Product;
use Illuminate\Console\Command;
use SoapClient;

class GetProducts extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'get:products';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $posUsername = "S7sa.com@gmail.com";
        $secretKey = 'dGq@kePBfDGu&JPd';
        $signature = md5($posUsername . $secretKey);
        $client = new SoapClient('https://www.netader.com/webservice/OneCardPOSSystem.wsdl');
        $params = array(
            'posUsername' => $posUsername,
            'signature' => $signature,
        );
        $myXMLData = $client->POSGetProductList($params);
        $products = Product::pluck('product_code')->toArray();
        foreach($myXMLData->productList->product as $value){
            $pro = Product::where('product_code',$value->productCode)->first();
            if(in_array($value->productCode,$products)){
               $pro->update([
                        'pos_price'=>$value->posPrice,
                        'price'=>$value->productPrice,
                        'pos_currency'=>$value->posCurrency,
                        'available'=>$value->available,
                   ]);
            }else{
                Product::create([
                        'product_code'=>$value->productCode,
                        'name_ar'=>$value->nameAr,
                        'name_en'=>$value->nameEn,
                        'description_ar'=>$value->nameAr,
                        'description_en'=>$value->nameEn,
                        'pos_price'=>$value->posPrice,
                        'price'=>$value->productPrice,
                        'pos_currency'=>$value->posCurrency,
                        'available'=>$value->available,
                ]);
            }
            
        }
        return true;
    }
}
