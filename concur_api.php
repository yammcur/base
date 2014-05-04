<?php

$ch = curl_init();

curl_setopt($ch, CURLOPT_URL,"https://www.concursolutions.com/api/expense/expensereport/v2.0/report/242292F36345402BBCE7");

curl_setopt($ch, CURLOPT_POST, 0);

curl_setopt($ch, CURLOPT_HTTPHEADER, array(
    'Authorization: OAuth 2dsGlNTxz+erYJZJUhwqWeyFgrY='
    ));

curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

$server_output = curl_exec ($ch);

curl_close ($ch);

$data = new SimpleXMLElement($server_output);
$data = (array) $data;

echo $data['TotalApprovedAmount'] . $data['CurrencyCode'];

$expenseEntriesList = (array) $data['ExpenseEntriesList'];
foreach($expenseEntriesList['ExpenseEntry'] as $expenseEntry){
	$expense = (array) $expenseEntry;
	//var_dump($expense);
	$result[] = array(
		'ReportEntryID' => $expense['ReportEntryID'],
		'TransactionCurrencyName' => $expense['TransactionCurrencyName'],
		'ApprovedAmount' => $expense['ApprovedAmount']
	);
}
echo "<pre>";
var_dump($result);

?>

