<?php
header("Content-Type: application/json");

$data = json_decode(file_get_contents("php://input"), true);
$name = $data["name"];
$amount = $data["amount"];
$slipUrl = $data["slipUrl"];

$discordWebhook = "https://discord.com/api/webhooks/1356522064583987241/o8Ie6eMWorUD-BomTefQA0ibu37P0eWBUW8439Ex2tus20QVCWoXGE7YPh-N8ENhqLnl"; // ใส่ Webhook URL ตรงนี้

$message = [
    "content" => "**📢 มีการโดเนทใหม่!**\n💰 จำนวน: {$amount} บาท\n🧑 ผู้โดเนท: {$name}\n📷 สลิป: {$slipUrl}"
];

$options = [
    "http" => [
        "header"  => "Content-type: application/json",
        "method"  => "POST",
        "content" => json_encode($message)
    ]
];

$context = stream_context_create($options);
$result = file_get_contents($discordWebhook, false, $context);

echo json_encode(["message" => "ส่งข้อมูลเรียบร้อย!"]);
?>
