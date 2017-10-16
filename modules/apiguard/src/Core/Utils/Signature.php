<?php

namespace Drupal\apiguard\Core\Utils;

class Signature {
	
	/**
	 * Create HMAC SHA-256 signature
	 */
	public static function getBase64HmacSha256($url, $date, $payload, $secret) {
	  $encodePay = base64_encode($payload);

	  $signStr = $url . ' ' . 
	  			 $date . ' ' .
	  			 $encodePay;

	  // drupal_set_message(t('Signing string is %s', array(
	  //   '%s' => $signStr,
	  // )));

	  $res = hash_hmac('sha256', $signStr, $secret);   
	  $res = base64_encode($res);

	  // drupal_set_message(t('Base64 Signature is %s', array(
	  //   '%s' => $res,
	  // )));
	  
	  return $res;
	}
}