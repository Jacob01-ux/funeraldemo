<?php
$to = "recipient@example.com";
$subject = "Test Email with Attachment";
$message = "This is a test email with an attachment.";

// Attachment file path and name
$file_path = "/path/to/attachment/file.pdf";
$file_name = "attachment.pdf";

// Read attachment file contents
$file_contents = file_get_contents($file_path);

// Encode attachment contents with base64
$encoded_file = base64_encode($file_contents);

// Generate boundary string
$boundary = md5(uniqid());

// Email headers
$headers = "From: sender@example.com\r\n";
$headers .= "MIME-Version: 1.0\r\n";
$headers .= "Content-Type: multipart/mixed; boundary=\"" . $boundary . "\"\r\n";

// Email body
$body = "--" . $boundary . "\r\n";
$body .= "Content-Type: text/plain; charset=\"UTF-8\"\r\n";
$body .= "Content-Transfer-Encoding: 8bit\r\n\r\n";
$body .= $message . "\r\n";

// Attachment
$body .= "--" . $boundary . "\r\n";
$body .= "Content-Type: application/pdf; name=\"" . $file_name . "\"\r\n";
$body .= "Content-Transfer-Encoding: base64\r\n";
$body .= "Content-Disposition: attachment; filename=\"" . $file_name . "\"\r\n\r\n";
$body .= chunk_split($encoded_file) . "\r\n";

// End boundary
$body .= "--" . $boundary . "--";

// Send email
if (mail($to, $subject, $body, $headers)) {
    echo "Email sent successfully.";
} else {
    echo "Email sending failed.";
}
?>
