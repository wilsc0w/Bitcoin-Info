<?php 
/* coded by Wilson (wilsc0w on github) :) ♥ */
@$btcadress = $argv[1];
function multiexplode ($delimiters,$string) {

    $ready = str_replace($delimiters, $delimiters[0], $string);
    $launch = explode($delimiters[0], $ready);
    return  $launch;
}
$api = "https://chain.api.btc.com/v3/address/$btcadress";
$kxk = @file_get_contents($api);
if(preg_match("/tx_count/",$kxk)) {
$plodexk = multiexplode(array(":",",","}",'"'),$kxk);
	echo "\n ~ BitcoinInfo coded by {wilc0w} on github ~\n";
	echo "\n Bitcoin Address : $btcadress\n";
	echo " Transactions : $plodexk[28]\n";
	echo " BTC's received : " . sprintf('%.8f', $plodexk[16]/100000000)."\n";
	echo " BTC's sent : " . sprintf('%.8f', $plodexk[20]/100000000)."\n";
	echo " Balance : " . sprintf('%.8f', $plodexk[24]/100000000). " BTC's\n\n";
	}
if(preg_match("/bad params/",$kxk)) {
	echo "\nInvalid BTC Address\n\n";
}
elseif(!isset($btcadress)) {
echo "\n/// php $argv[0] Btc-Address\n\n";
}
?>
