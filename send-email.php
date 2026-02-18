<?php
/**
 * Oceanex Contact Form - PHP Mail Handler
 * Optimized untuk cPanel hosting
 * 
 * Upload file ini ke cPanel bersama dengan website files
 */

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
// KONFIGURASI EMAIL - SESUAIKAN DENGAN DOMAIN
// ==========================================

$config = [
    'to_email'   => 'info@oceanexmarine.com',   // Email penerima inquiry
    'to_name'    => 'Oceanex Marine Team',
    'from_email' => 'noreply@oceanexmarine.com', // Email pengirim (harus domain yang sama)
    'from_name'  => 'Oceanex Website'
];

// ==========================================
// GET & VALIDATE INPUT
// ==========================================

// Get JSON input
$json = file_get_contents('php://input');
$input = json_decode($json, true);

// Fallback to POST if not JSON
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

// Validate email format
if (!$email) {
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

$subject = "🔔 New Inquiry: $inquiry_label - from $name";

// HTML Email Body (Professional Template)
$html_body = "
<!DOCTYPE html>
<html>
<head>
    <meta charset='UTF-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
</head>
<body style='margin: 0; padding: 0; font-family: Arial, Helvetica, sans-serif; background-color: #f4f4f4;'>
    <table role='presentation' width='100%' cellspacing='0' cellpadding='0' style='max-width: 600px; margin: 20px auto; background: #ffffff;'>
        <!-- Header -->
        <tr>
            <td style='background: linear-gradient(135deg, #062351 0%, #0d3a6d 100%); padding: 30px; text-align: center;'>
                <h1 style='color: #ffffff; margin: 0; font-size: 24px;'>🐟 New Website Inquiry</h1>
                <p style='color: #C4A574; margin: 10px 0 0 0; font-size: 14px;'>Oceanex Marine Industries</p>
            </td>
        </tr>
        
        <!-- Inquiry Type Badge -->
        <tr>
            <td style='padding: 30px 30px 10px 30px;'>
                <table role='presentation' width='100%' cellspacing='0' cellpadding='0'>
                    <tr>
                        <td style='background: #FFF7E6; border-left: 4px solid #C4A574; padding: 15px 20px;'>
                            <p style='margin: 0; color: #92400E; font-size: 12px; text-transform: uppercase; letter-spacing: 1px;'>Inquiry Type</p>
                            <p style='margin: 5px 0 0 0; color: #062351; font-size: 18px; font-weight: bold;'>$inquiry_label</p>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
        
        <!-- Contact Details -->
        <tr>
            <td style='padding: 20px 30px;'>
                <h2 style='color: #062351; font-size: 16px; margin: 0 0 15px 0; border-bottom: 2px solid #f0f0f0; padding-bottom: 10px;'>📋 Contact Details</h2>
                
                <table role='presentation' width='100%' cellspacing='0' cellpadding='0' style='margin-bottom: 20px;'>
                    <tr>
                        <td width='30%' style='padding: 10px 0; color: #666; font-size: 14px;'>Name:</td>
                        <td style='padding: 10px 0; color: #333; font-size: 14px; font-weight: bold;'>$name</td>
                    </tr>
                    <tr>
                        <td width='30%' style='padding: 10px 0; color: #666; font-size: 14px;'>Email:</td>
                        <td style='padding: 10px 0;'><a href='mailto:$email' style='color: #062351; text-decoration: none; font-weight: bold;'>$email</a></td>
                    </tr>
                    <tr>
                        <td width='30%' style='padding: 10px 0; color: #666; font-size: 14px;'>Phone/WhatsApp:</td>
                        <td style='padding: 10px 0; color: #333; font-size: 14px; font-weight: bold;'>$phone</td>
                    </tr>
                </table>
            </td>
        </tr>
        
        <!-- Message -->
        <tr>
            <td style='padding: 0 30px 30px 30px;'>
                <h2 style='color: #062351; font-size: 16px; margin: 0 0 15px 0; border-bottom: 2px solid #f0f0f0; padding-bottom: 10px;'>💬 Message</h2>
                <div style='background: #f9f9f9; padding: 20px; color: #333; line-height: 1.6;'>
                    " . nl2br($message) . "
                </div>
            </td>
        </tr>
        
        <!-- Action Buttons -->
        <tr>
            <td style='padding: 0 30px 30px 30px;'>
                <table role='presentation' cellspacing='0' cellpadding='0'>
                    <tr>
                        <td style='padding-right: 10px;'>
                            <a href='mailto:$email?subject=Re: Your Inquiry - Oceanex Marine' style='display: inline-block; background: #062351; color: #ffffff; padding: 12px 24px; text-decoration: none; font-size: 14px; font-weight: bold;'>↩️ Reply to Customer</a>
                        </td>
                        <td>
                            <a href='https://wa.me/" . preg_replace('/[^0-9]/', '', $phone) . "' style='display: inline-block; background: #25D366; color: #ffffff; padding: 12px 24px; text-decoration: none; font-size: 14px; font-weight: bold;'>📱 WhatsApp</a>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
        
        <!-- Footer -->
        <tr>
            <td style='background: #f4f4f4; padding: 20px 30px; text-align: center;'>
                <p style='margin: 0; color: #888; font-size: 12px;'>
                    This email was sent from <strong>oceanexmarine.com</strong> contact form<br>
                    " . date('F j, Y \a\t g:i A') . " (Server Time)
                </p>
            </td>
        </tr>
    </table>
</body>
</html>
";

// ==========================================
// SEND EMAIL
// ==========================================

// Email headers
$headers = [
    'MIME-Version: 1.0',
    'Content-Type: text/html; charset=UTF-8',
    'From: ' . $config['from_name'] . ' <' . $config['from_email'] . '>',
    'Reply-To: ' . $name . ' <' . $email . '>',
    'X-Mailer: PHP/' . phpversion(),
    'X-Priority: 1'
];

// Send email using PHP mail() - works on cPanel
$mail_sent = mail(
    $config['to_email'],
    $subject,
    $html_body,
    implode("\r\n", $headers)
);

// ==========================================
// RESPONSE
// ==========================================

if ($mail_sent) {
    // Success
    http_response_code(200);
    echo json_encode([
        'success' => true,
        'message' => 'Your message has been sent successfully!'
    ]);
    
    // Log successful submission (optional)
    error_log("Contact form submitted: $name <$email> - $inquiry_label");
    
} else {
    // Failed
    http_response_code(500);
    echo json_encode([
        'success' => false,
        'message' => 'Failed to send email. Please try again or contact us directly at info@oceanexmarine.com'
    ]);
    
    // Log error
    error_log("Contact form FAILED: $name <$email> - " . (error_get_last()['message'] ?? 'Unknown error'));
}
