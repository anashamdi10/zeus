<?php

namespace App\Models;

class MyFatoorah
{
	public static $is_site = 0;
    protected static $domain, $token;
	public static $currency = 'EGP';

	public static function init()
	{
	       $type="test";
		self::$token = $type == 'test' ? 'rLtt6JWvbUHDDhsZnfpAhpYk4dxYDQkbcPTyGaKp2TYqQgG7FGZ5Th_WD53Oq8Ebz6A53njUoo1w3pjU1D4vs_ZMqFiz_j0urb_BH9Oq9VZoKFoJEDAbRZepGcQanImyYrry7Kt6MnMdgfG5jn4HngWoRdKduNNyP4kzcp3mRv7x00ahkm9LAK7ZRieg7k1PDAnBIOG3EyVSJ5kK4WLMvYr7sCwHbHcu4A5WwelxYK0GMJy37bNAarSJDFQsJ2ZvJjvMDmfWwDVFEVe_5tOomfVNt6bOg9mexbGjMrnHBnKnZR1vQbBtQieDlQepzTZMuQrSuKn-t5XZM7V6fCW7oP-uXGX-sMOajeX65JOf6XVpk29DP6ro8WTAflCDANC193yof8-f5_EYY-3hXhJj7RBXmizDpneEQDSaSz5sFk0sV5qPcARJ9zGG73vuGFyenjPPmtDtXtpx35A-BVcOSBYVIWe9kndG3nclfefjKEuZ3m4jL9Gg1h2JBvmXSMYiZtp9MR5I6pvbvylU_PP5xJFSjVTIz7IQSjcVGO41npnwIxRXNRxFOdIUHn0tjQ-7LwvEcTXyPsHXcMD8WtgBh-wxR8aKX7WPSsT1O8d8reb2aR7K3rkV3K82K_0OgawImEpwSvp9MNKynEAJQS6ZHe_J_l77652xwPNxMRTMASk1ZsJL' : 'T11fwgvBhtuhTmyq9KlPAwTCRGxPi3F0jutETU8aHQ3v8uJ0njThmulh-Qu0lejrENnMzOPIKlRkQJ9wyCtgeZ_2-t_XqCEButhqYKv4DuXUeynjlKEG_qt1JZE2CQ1GOrEibvODV3iEf8rnt63NNVTUyR2ugBb1Tex2vOhhFwjzqFuJ7ZPwL_XWQWq6AF4yRXls62N66VZm-Bc0TD5CAIvm376rG_O0_cE6q07KfpnErMt6gx2VMnR47nFJfhm_l8wDdvlYfnvwsOVo79E6M3Nq2-_4ss_HCbjYhHeKSiooYCQxXPWnwTrhFmoeAXLuFFQhe2-4pu51bm30zUoBIQaFQp08YdvU_jOx73vWQAN3i1BIi-hmDGjwmuIi9WnOMDccOPv27A42k4NtVkx1R-teq1KG8keBQjCsE4eDlLYuDWcXGOA6MtuyQzVzhN8O8Qfkv1nq1s_tIybFD4acLPbaeI36jpHMHyqvVBHOY0bu2HcEOnIT9yFdVVgRV7O4-Ayz1589u8Gm2PULQp4kj6EsKC--NbUE1WktCmcNxG6kMLP4lTwzsMt6UTtJnP52npABRBoCHOYOJ-PkPsQN11TCom_GbpjbSxX80BYG5OGsn6zKIYfPzthTy2Ni7JAHVXwDrDjMonOc60bZQV75vX70FmBF-gCOr_nZwH001U2nuMrP-eLGQShw-jQalWb10CkZbQ';
		self::$domain = $type == 'live' ? 'api.myfatoorah.com' : 'apitest.myfatoorah.com';
	}

    protected static function doRequest($params, $query)
    {
		self::init();
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 0);
        curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($curl, CURLOPT_HEADER, 0);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        $header[0] = "Authorization: bearer " . self::$token;
        $header[1] = 'Content-Type:application/json';
        curl_setopt($curl, CURLOPT_POSTFIELDS, $params);
        curl_setopt($curl, CURLOPT_HTTPHEADER, $header);
        curl_setopt($curl, CURLOPT_URL, $query);
		$result = curl_exec($curl);
        if ($result == false) {
            error_log("Domain::CreateSubSomain Exception curl_exec threw error \"" . curl_error($curl) . "\" for $query");
        }
        curl_close($curl);
        return $result;
    }

    public static function initializePayment($price, $currency)
    {
		self::init();
        $directory = "/v2/InitiatePayment";
        $query = "https://" . self::$domain . "/{$directory}";
        $params = json_encode(["InvoiceAmount" => $price, "CurrencyIso" => $currency]);
        $result = self::doRequest($params, $query);
        return $result;
    }

    public static function executePayment($params)
    {
		self::init();
        $directory = "/v2/ExecutePayment";
        $query = "https://" . self::$domain . "/{$directory}";
		$params = json_encode($params);
        $result = self::doRequest($params, $query);
        return $result;
    }

    public static function status($key)
    {
		self::init();
        $params = ['Key' => $key, 'KeyType' => 'InvoiceId'];
        $directory = "/v2/GetPaymentStatus";
        $query = "https://" . self::$domain . "/{$directory}";
        $params = json_encode($params);
        $result = self::doRequest($params, $query);
        return json_decode($result);
    }

    public static function directPayment($params, $url)
    {
		self::init();
        $params = json_encode($params);
        $result = self::doRequest($params, $url);
        return $result;
    }
}
