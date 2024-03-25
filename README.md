# PHP SMTP Mailer

This PHP script allows you to send emails using SMTP authentication. It's a beginner-friendly tool that you can easily integrate into your projects to send emails reliably. 

### Getting Started

1. **Download**: Download the source code from this repository.

2. **Include PHPMailer**: Make sure to include the `PHPMailerAutoload.php` file in your project. You can download it from [PHPMailer GitHub repository](https://github.com/PHPMailer/PHPMailer).

3. **Configure SMTP**: Open the PHP script and configure the SMTP settings within the `smtp_mailer` function:
    - Set the `Host` to your SMTP server address (e.g., `"smtp.gmail.com"` for Gmail SMTP).
    - Set the `Port` to the appropriate port for your SMTP server (e.g., `587` for Gmail).
    - Set `Username` to your email address.
    - Set `Password` to the app-specific password generated from Google App Passwords.
    - Ensure that you have enabled 2-step verification for your Google account.

4. **Send Email**: Use the `smtp_mailer` function to send emails:
    ```php
    smtp_mailer('recipient@example.com', "Subject", "Message Body");
    ```

### Example

```php
<?php
include ('smtp/PHPMailerAutoload.php');

// Send email
smtp_mailer('recipient@example.com', "Hello!", "This is a test email from PHP SMTP Mailer.");

// Function to send email
function smtp_mailer($to, $subject, $msg)
{
    $mail = new PHPMailer();
    $mail->IsSMTP();
    $mail->SMTPAuth = true;
    $mail->SMTPSecure = 'tls';
    $mail->Host = "smtp.gmail.com";
    $mail->Port = 587;
    $mail->IsHTML(true);
    $mail->CharSet = 'UTF-8';
    $mail->Username = "your email id here"; // your email
    $mail->Password = "16 digit password here"; // your password
    $mail->SetFrom("your email id here"); // (From: )
    $mail->Subject = $subject;
    $mail->Body = $msg;
    $mail->AddAddress($to);
    $mail->SMTPOptions = array(
        'ssl' => array(
            'verify_peer' => false,
            'verify_peer_name' => false,
            'allow_self_signed' => false
        )
    );
    if (!$mail->Send()) {
        echo $mail->ErrorInfo;
    } else {
        return 'Sent';
    }
}
?>
```

### Note

- Replace placeholders (`'your email id here'`, `'16 digit password here'`) with your actual email credentials.
- Depending on your SMTP server settings, you might need to adjust the SMTPSecure option (`'tls'` or `'ssl'`).
- Ensure that your SMTP server allows connections from your server's IP address.
- Be cautious with storing sensitive information like passwords in your code.



## Obtaining SMTP Password

To obtain the password required for SMTP authentication, please follow these steps:

1. **Visit the Web Page**: Navigate to the following web page using your preferred web browser: [Google App Passwords](https://myaccount.google.com/apppasswords)

2. **Enable 2-Step Verification**: Ensure that you have enabled 2-step verification for your Google account. This is a security measure that provides an additional layer of protection for your account.

3. **Generate App-Specific Password**: Once you're logged into your Google account and have enabled 2-step verification, you'll be able to generate an app-specific password for your SMTP usage. Follow the instructions on the web page to generate the password.

4. **Copy Password**: After generating the app-specific password, make sure to copy it securely. This password will be used in your PHP script for SMTP authentication.

Please note that the app-specific password is different from your regular Google account password and is specifically generated for SMTP usage. Keep it confidential and avoid sharing it with others.

If you encounter any issues or have questions about this process, refer to the help resources provided by Google or reach out to their support team for assistance.

Once you have obtained the app-specific password, you can use it in your PHP script for SMTP authentication. Replace the placeholder `'16 digit password here'` with the generated app-specific password in your script.