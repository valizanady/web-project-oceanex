<?php
/**
 * Oceanex Contact Form - SMTP Mail Handler
 * Menggunakan PHPMailer untuk reliability yang lebih baik
 * 
 * SETUP:
 * 1. Upload folder 'PHPMailer' ke hosting (sudah include di bawah)
 * 2. Ganti PASSWORD_EMAIL_KAMU dengan password email info@oceanexmarine.com
 * 3. Upload file ini ke root website
 */

// Load PHPMailer (jika pakai Composer, uncomment baris di bawah)
// require 'vendor/autoload.php';

// Jika tidak pakai Composer, download PHPMailer manual dan uncomment ini:
// require 'PHPMailer/src/Exception.php';
// require 'PHPMailer/src/PHPMailer.php';
// require 'PHPMailer/src/SMTP.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

// CORS headers
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: POST, OPTIONS');
header('Access-Control-Allow-Headers: Content-Type');
header('Content-Type: application/json; charset=utf-8');

// Handle preflight request
if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
    http_response_code(200);
    exit();
}

// Only accept POST requests
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    echo json_encode(['success' => false, 'message' => 'Method not allowed']);
    exit();
}

// ==========================================
// KONFIGURASI SMTP - SESUAIKAN INI
// ==========================================

$smtp_config = [
    'host'     => 'mail.oceanexmarine.com',
    'port'     => 465,
    'username' => 'info@oceanexmarine.com',
    'password' => 'PASSWORD_EMAIL_KAMU',  // <-- GANTI INI dengan password email
    'encryption' => 'ssl'  // atau 'tls' untuk port 587
];

$email_config = [
    'to_email'   => 'info@oceanexmarine.com',
    'to_name'    => 'Oceanex Marine Team',
    'from_email' => 'info@oceanexmarine.com',
    'from_name'  => 'Oceanex Website'
];

// ==========================================
// GET & VALIDATE INPUT
// ==========================================

$json = file_get_contents('php://input');
$input = json_decode($json, true);

if (!$input) {
    $input = $_POST;
}

// Validate required fields
if (empty($input['name']) || empty($input['email']) || empty($input['inquiry_type'])) {
    http_response_code(400);
    echo json_encode([
        'success' => false, 
        'message' => 'Please fill in all required fields (Name, Email, Inquiry Type)'
    ]);
    exit();
}

// Sanitize input
$name = htmlspecialchars(strip_tags(trim($input['name'])));
$email = filter_var(trim($input['email']), FILTER_VALIDATE_EMAIL);
$phone = htmlspecialchars(strip_tags(trim($input['phone'] ?? 'Not provided')));
$inquiry_type = htmlspecialchars(strip_tags(trim($input['inquiry_type'])));
$message = htmlspecialchars(strip_tags(trim($input['message'] ?? 'No additional message')));

if (!$email) {
    http_response_code(400);
    echo json_encode(['success' => false, 'message' => 'Invalid email address']);
    exit();
}

// Map inquiry type
$inquiry_types = [
    'product-inquiry' => 'Product & Pricing Information',
    'bulk-order' => 'Bulk Order / Wholesale',
    'sample-request' => 'Request Product Samples',
    'partnership' => 'Partnership / Distribution',
    'general' => 'General Inquiry'
];
$inquiry_label = $inquiry_types[$inquiry_type] ?? $inquiry_type;

// ==========================================
// BUILD EMAIL HTML
// ==========================================

$subject = "🔔 New Inquiry: $inquiry_label - from $name";

$html_body = "
<!DOCTYPE html>
<html>
<head>
    <meta charset='UTF-8'>
    <style>
        body { font-family: Arial, sans-serif; line-height: 1.6; color: #333; }
        .container { max-width: 600px; margin: 0 auto; }
        .header { background: linear-gradient(135deg, #0a2540 0%, #1a3a5c 100%); color: white; padding: 30px; text-align: center; }
        .content { padding: 30px; background: #f8f9fa; }
        .field { margin-bottom: 20px; padding: 15px; background: white; border-left: 4px solid #c6a35f; }
        .label { font-size: 12px; color: #888; text-transform: uppercase; margin-bottom: 5px; }
        .value { font-size: 16px; color: #0a2540; font-weight: 500; }
        .footer { padding: 20px; text-align: center; font-size: 12px; color: #888; }
    </style>
</head>
<body>
    <div class='container'>
        <div class='header'>
            <h1 style='margin:0;font-size:24px;'>📩 New Contact Inquiry</h1>
            <p style='margin:10px 0 0;opacity:0.8;'>Oceanex Marine Industries</p>
        </div>
        <div class='content'>
            <div class='field'>
                <div class='label'>Inquiry Type</div>
                <div class='value'>$inquiry_label</div>
            </div>
            <div class='field'>
                <div class='label'>Name</div>
                <div class='value'>$name</div>
            </div>
            <div class='field'>
                <div class='label'>Email</div>
                <div class='value'><a href='mailto:$email'>$email</a></div>
            </div>
            <div class='field'>
                <div class='label'>Phone / WhatsApp</div>
                <div class='value'>$phone</div>
            </div>
            <div class='field'>
                <div class='label'>Message</div>
                <div class='value'>" . nl2br($message) . "</div>
            </div>
        </div>
        <div class='footer'>
            Received: " . date('F j, Y \a\t g:i A') . " (Server Time)
        </div>
    </div>
</body>
</html>
";

// ==========================================
// SEND EMAIL via SMTP
// ==========================================

// Cek apakah PHPMailer tersedia
if (!class_exists('PHPMailer\PHPMailer\PHPMailer')) {
    // Fallback ke mail() biasa jika PHPMailer tidak ada
    $headers = [
        'MIME-Version: 1.0',
        'Content-Type: text/html; charset=UTF-8',
        'From: ' . $email_config['from_name'] . ' <' . $email_config['from_email'] . '>',
        'Reply-To: ' . $name . ' <' . $email . '>',
        'X-Mailer: PHP/' . phpversion()
    ];
    
    $mail_sent = mail(
        $email_config['to_email'],
        $subject,
        $html_body,
        implode("\r\n", $headers)
    );
    
    if ($mail_sent) {
        echo json_encode(['success' => true, 'message' => 'Your message has been sent successfully!']);
    } else {
        http_response_code(500);
        echo json_encode(['success' => false, 'message' => 'Failed to send email. Please contact us via WhatsApp.']);
    }
    exit();
}

// Pakai PHPMailer SMTP
$mail = new PHPMailer(true);

try {
    // SMTP Configuration
    $mail->isSMTP();
    $mail->Host       = $smtp_config['host'];
    $mail->SMTPAuth   = true;
    $mail->Username   = $smtp_config['username'];
    $mail->Password   = $smtp_config['password'];
    $mail->SMTPSecure = $smtp_config['encryption'] === 'ssl' ? PHPMailer::ENCRYPTION_SMTPS : PHPMailer::ENCRYPTION_STARTTLS;
    $mail->Port       = $smtp_config['port'];
    
    // Sender & Recipients
    $mail->setFrom($email_config['from_email'], $email_config['from_name']);
    $mail->addAddress($email_config['to_email'], $email_config['to_name']);
    $mail->addReplyTo($email, $name);
    
    // Content
    $mail->isHTML(true);
    $mail->CharSet = 'UTF-8';
    $mail->Subject = $subject;
    $mail->Body    = $html_body;
    $mail->AltBody = "New inquiry from $name ($email)\nType: $inquiry_label\nPhone: $phone\nMessage: $message";
    
    $mail->send();
    
    echo json_encode([
        'success' => true,
        'message' => 'Your message has been sent successfully!'
    ]);
    
    error_log("Contact form sent via SMTP: $name <$email> - $inquiry_label");
    
} catch (Exception $e) {
    http_response_code(500);
    echo json_encode([
        'success' => false,
        'message' => 'Failed to send email. Please contact us via WhatsApp.',
        'debug' => $mail->ErrorInfo // Hapus ini di production
    ]);
    
    error_log("SMTP Error: " . $mail->ErrorInfo);
}
