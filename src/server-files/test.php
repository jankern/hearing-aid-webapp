<?php

	$input = array();
	
	$input["section-7-1"] = "asd@ads";
	$input["section-8-1"] = "af <scr";
	$input["section-8-2"] = "item-8-2-2";
	$input["section-8-3"] = "asd";
	$input["section-8-4"] = "Dies ist ein text der einen doofen Link //bit.lys enthält";
	$input["section-9-1"] = "item-9-1-1";
	$input["concam-type"] = "Mg==";
	$input["concam-assignment"] = "QWt0aW9uIEjDtnJ0ZWNobmlrIGRlciBadWt1bmZ0";
	$input["concam-location"] = "QmVybGlu";
	$input["_csrf_token"] = "BGt677igIUCZN5p2RmJ7P9NeBXxmGbyjpGTEbqEUA6c";
	$input["captcha_code"] = "SNRjBo";
	

	$regExpSpamRules = '/<[^>]*script/, /https?:\/\/(www\.)?[-a-zA-Z0-9@:%._\+~#=]{1,256}\.[a-zA-Z0-9()]{1,6}\b([-a-zA-Z0-9()@:%_\+.~#?&\/=]*)/';

	// $pizza = "piece1 piece2 piece3 piece4 piece5 piece6";
	$regExpSpamRuleList = explode("/, ", $regExpSpamRules);
	// echo '<pre>'; print_r($regExpSpamRuleList); echo '</pre>';

	for($i = 0; $i < sizeof($regExpSpamRuleList); $i++) {
		echo $regExpSpamRuleList[$i];
		if($i+1 < sizeof($regExpSpamRuleList)){
			echo "/</br>";
		}else{
			echo "</br>";

		}
	}

	$regExpSpamRuleList = explode("/, ", $regExpSpamRules);
	foreach ( $input as $key => $value ){
		// Check all the fields that have user inserted content
		if(substr($value, 0, 4) != 'item'){
			// Go through all the different rules and if one matches stop and exit!
			for($i = 0; $i < sizeof($regExpSpamRuleList); $i++) {
				if($i+1 < sizeof($regExpSpamRuleList)){
					$regExpSpamRule = $regExpSpamRuleList[$i]."/";
				}else{
					$regExpSpamRule = $regExpSpamRuleList[$i];
				}
				if(preg_match($regExpSpamRule, $value, $matches) != 0){
					//$result = rex_i18n::msg('contact_campaign_form_validation_required');
					//$this->httpForbidden( $result );
					echo 'not 0';
				}else{
					//echo "0";
				}
				// preg_match('/https?:\/\/(www\.)?[-a-zA-Z0-9@:%._\+~#=]{1,256}\.[a-zA-Z0-9()]{1,6}\b([-a-zA-Z0-9()@:%_\+.~#?&\/=]*)/', $value, $matches);
				// preg_match($regExpSpamRule, $value, $matches);
				
				// echo '<pre>'; print_r($matches); echo '</pre>';
			}
		}
	}



?>