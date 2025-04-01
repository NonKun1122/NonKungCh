<?php
header("Content-Type: application/json");

$data = json_decode(file_get_contents("php://input"), true);
$name = $data["name"] ?? "ไม่ระบุ";
$amount = $data["amount"] ?? "0";
$slipUrl = $data["slipUrl"] ?? "";

$discordWebhook = "https://discord.com/api/webhooks/1356522064583987241/o8Ie6eMWorUD-BomTefQA0ibu37P0eWBUW8439Ex2tus20QVCWoXGE7YPh-N8ENhqLnl";

$message = [
    "content" => "**📢 มีการโดเนทใหม่!**\n💰 จำนวน: {$amount} บาท\n🧑 ผู้โดเนท: {$name}\n📷 สลิป: {$slipUrl}"
];

$ch = curl_init($discordWebhook);
curl_setopt($ch, CURLOPT_HTTPHEADER, ["Content-Type: application/json"]);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($message));
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

$response = curl_exec($ch);
$http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
curl_close($ch);

if ($http_code == 204) {
    echo json_encode(["message" => "ส่งข้อมูลเรียบร้อย!"]);
} else {
    echo json_encode(["message" => "ส่งไม่สำเร็จ!", "error" => $response, "code" => $http_code]);
}
?>
