<?php
/**
 * Oceanex Contact Form - SMTP Email Handler
 * Menggunakan Gmail SMTP dengan App Password
 */

// CORS headers untuk allow request dari frontend
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: POST, OPTIONS');
header('Access-Control-Allow-Headers: Content-Type');
header('Content-Type: application/json');

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
// CONFIGURATION - ISI DATA GMAIL KAMU
// ==========================================
$smtp_config = [
    'host' => 'smtp.gmail.com',
    'port' => 587,
    'username' => 'your-email@gmail.com',        // Ganti dengan Gmail kamu
    'password' => 'your-app-password-here',      // Ganti dengan App Password (16 karakter)
    'from_email' => 'your-email@gmail.com',      // Email pengirim
    'from_name' => 'Oceanex Website',
    'to_email' => 'your-email@gmail.com',        // Email tujuan (penerima)
    'to_name' => 'Oceanex Team'
];

// Get POST data
$input = json_decode(file_get_contents('php://input'), true);

// Validate required fields
$required_fields = ['from_name', 'reply_to', 'inquiry_type'];
foreach ($required_fields as $field) {
    if (empty($input[$field])) {
        http_response_code(400);
        echo json_encode([
            'success' => false, 
            'message' => "Field '$field' is required"
        ]);
        exit();
    }
}

// Sanitize input
$from_name = htmlspecialchars(strip_tags($input['from_name']));
$reply_to = filter_var($input['reply_to'], FILTER_VALIDATE_EMAIL);
$phone = htmlspecialchars(strip_tags($input['phone'] ?? '-'));
$inquiry_type = htmlspecialchars(strip_tags($input['inquiry_type']));
$message = htmlspecialchars(strip_tags($input['message'] ?? 'No additional message provided.'));

// Validate email
if (!$reply_to) {
    http_response_code(400);
    echo json_encode([
        'success' => false, 
        'message' => 'Invalid email address'
    ]);
    exit();
}

// Map inquiry type to readable text
$inquiry_types = [
    'product-inquiry' => 'Product & Pricing Information',
    'bulk-order' => 'Bulk Order / Wholesale',
    'sample-request' => 'Request Product Samples',
    'partnership' => 'Partnership / Distribution',
    'general' => 'General Inquiry'
];
$inquiry_label = $inquiry_types[$inquiry_type] ?? $inquiry_type;

// ==========================================
// BUILD EMAIL
// ==========================================

// Email subject
$subject = "New Inquiry from $from_name - $inquiry_label";

// Email body (HTML)
$email_body = "
<!DOCTYPE html>
<html>
<head>
    <meta charset='UTF-8'>
    <style>
        body { font-family: Arial, sans-serif; line-height: 1.6; color: #333; }
        .container { max-width: 600px; margin: 0 auto; padding: 20px; }
        .header { background: #0d2845; color: white; padding: 20px; text-align: center; border-radius: 8px 8px 0 0; }
        .content { background: #f9f9f9; padding: 30px; border: 1px solid #ddd; }
        .section { margin-bottom: 20px; }
        .label { font-weight: bold; color: #0d2845; }
        .value { margin-top: 5px; padding: 10px; background: white; border-left: 3px solid #C4A574; }
        .divider { border-top: 2px solid #C4A574; margin: 20px 0; }
        .footer { text-align: center; padding: 20px; color: #666; font-size: 12px; }
    </style>
</head>
<body>
    <div class='container'>
        <div class='header'>
            <h2>🔔 New Contact Form Submission</h2>
            <p>Oceanex Marine Industries Website</p>
        </div>
        
        <div class='content'>
            <div class='section'>
                <div class='label'>📋 Inquiry Type:</div>
                <div class='value'>$inquiry_label</div>
            </div>
            
            <div class='section'>
                <div class='label'>👤 Customer Name:</div>
                <div class='value'>$from_name</div>
            </div>
            
            <div class='section'>
                <div class='label'>📧 Email Address:</div>
                <div class='value'><a href='mailto:$reply_to'>$reply_to</a></div>
            </div>
            
            <div class='section'>
                <div class='label'>📱 WhatsApp / Phone:</div>
                <div class='value'>$phone</div>
            </div>
            
            <div class='divider'></div>
            
            <div class='section'>
                <div class='label'>💬 Message:</div>
                <div class='value'>" . nl2br($message) . "</div>
            </div>
        </div>
        
        <div class='footer'>
            <p>Reply directly to the customer at: <strong>$reply_to</strong></p>
            <p>Sent via Oceanex Website Contact Form</p>
        </div>
    </div>
</body>
</html>
";

// Plain text version (fallback)
$email_body_plain = "
New Contact Form Submission - Oceanex Marine Industries

━━━━━━━━━━━━━━━━━━━━━━━━━━━
CONTACT DETAILS
━━━━━━━━━━━━━━━━━━━━━━━━━━━

Name: $from_name
Email: $reply_to
Phone/WhatsApp: $phone
Inquiry Type: $inquiry_label

━━━━━━━━━━━━━━━━━━━━━━━━━━━
MESSAGE
━━━━━━━━━━━━━━━━━━━━━━━━━━━

$message

━━━━━━━━━━━━━━━━━━━━━━━━━━━

Reply to this customer directly at: $reply_to

---
Sent via Oceanex Website Contact Form
";

// ==========================================
// SEND EMAIL VIA SMTP
// ==========================================

try {
    // Create email headers
    $boundary = md5(time());
    
    $headers = [
        "From: {$smtp_config['from_name']} <{$smtp_config['from_email']}>",
        "Reply-To: $from_name <$reply_to>",
        "MIME-Version: 1.0",
        "Content-Type: multipart/alternative; boundary=\"$boundary\"",
        "X-Mailer: PHP/" . phpversion()
    ];
    
    // Build multipart email body
    $email_message = "--$boundary\r\n";
    $email_message .= "Content-Type: text/plain; charset=UTF-8\r\n";
    $email_message .= "Content-Transfer-Encoding: 7bit\r\n\r\n";
    $email_message .= $email_body_plain . "\r\n";
    $email_message .= "--$boundary\r\n";
    $email_message .= "Content-Type: text/html; charset=UTF-8\r\n";
    $email_message .= "Content-Transfer-Encoding: 7bit\r\n\r\n";
    $email_message .= $email_body . "\r\n";
    $email_message .= "--$boundary--";
    
    // Connect to SMTP server
    $smtp = fsockopen(
        $smtp_config['host'], 
        $smtp_config['port'], 
        $errno, 
        $errstr, 
        30
    );
    
    if (!$smtp) {
        throw new Exception("Failed to connect to SMTP server: $errstr ($errno)");
    }
    
    // Helper function to send SMTP command
    function smtp_send($smtp, $command, $expected_code = 250) {
        fwrite($smtp, $command . "\r\n");
        $response = fgets($smtp, 515);
        $code = substr($response, 0, 3);
        if ($code != $expected_code) {
            throw new Exception("SMTP Error: $response");
        }
        return $response;
    }
    
    // SMTP handshake
    fgets($smtp, 515); // Read welcome message
    smtp_send($smtp, "EHLO " . $_SERVER['SERVER_NAME'], 250);
    smtp_send($smtp, "STARTTLS", 220);
    
    // Enable TLS encryption
    stream_socket_enable_crypto($smtp, true, STREAM_CRYPTO_METHOD_TLS_CLIENT);
    smtp_send($smtp, "EHLO " . $_SERVER['SERVER_NAME'], 250);
    
    // Authenticate
    smtp_send($smtp, "AUTH LOGIN", 334);
    smtp_send($smtp, base64_encode($smtp_config['username']), 334);
    smtp_send($smtp, base64_encode($smtp_config['password']), 235);
    
    // Send email
    smtp_send($smtp, "MAIL FROM: <{$smtp_config['from_email']}>", 250);
    smtp_send($smtp, "RCPT TO: <{$smtp_config['to_email']}>", 250);
    smtp_send($smtp, "DATA", 354);
    
    // Send headers and body
    fwrite($smtp, "To: {$smtp_config['to_name']} <{$smtp_config['to_email']}>\r\n");
    fwrite($smtp, "Subject: $subject\r\n");
    fwrite($smtp, implode("\r\n", $headers) . "\r\n\r\n");
    fwrite($smtp, $email_message);
    smtp_send($smtp, "\r\n.", 250);
    
    // Close connection
    fwrite($smtp, "QUIT\r\n");
    fclose($smtp);
    
    // Success response
    http_response_code(200);
    echo json_encode([
        'success' => true,
        'message' => 'Email sent successfully!'
    ]);
    
} catch (Exception $e) {
    // Error response
    error_log("Email Error: " . $e->getMessage());
    http_response_code(500);
    echo json_encode([
        'success' => false,
        'message' => 'Failed to send email: ' . $e->getMessage()
    ]);
}
