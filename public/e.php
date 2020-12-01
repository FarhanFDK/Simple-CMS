<?php
    /*require "src/includes/pdf/TCPDF-main/tcpdf.php";
    $pdf = NEW TCPDF('p' , 'mm' , 'A4' , true , 'UTF-8' , false);
    $fontname = TCPDF_FONTS::addTTFfont('src/fonts/samim/Samim.ttf', 'TrueTypeUnicode', '', 20);
    $pdf->SetFont($fontname, '', 14, '', false);
    $pdf->setPrintHeader(false);
    $pdf->setPrintFooter(false);
    $pdf->AddPage();
    $html = '<div style="text-align:center;color:red;">sss</div>';
    // $pdf->SetLineStyle(array('width' => 0.5, 'cap' => 'butt', 'join' => 'miter', 'dash' => 4, 'color' => array(255, 0, 0)));
    // $pdf->SetTextColor(0,0,50);
    $pdf->SetFillColor(255,255,255);
    // $pdf->MultiCell(60, 4, $html, 1, 'C', 1, 0);
    // $pdf->writeHTMLCell(0, 0, '', '', $html, 'LRTB', 1, 1, true, 'R', true);
    $pdf->WriteHTML($html , true , 0 , true , true);
    $pdf->Output();*/
 /* $title = "شرکت افراگسترنوین-صفحه اصلی" ?>
<?php
    class Content{
        public $h;
    }
?>
<?php require "src/includes/classes.php"; ?>
<?php require "src/includes/head.php"; ?>
<?php require "src/includes/header.php"; ?>
<div class="middle mtop">
  <?php
  require("src/includes/class.phpmailer.php");

$mail = new PHPMailer();

$mail->IsSMTP();                                      // set mailer to use SMTP
$mail->Host = "https://mail.afragostarnovin.ir:2080";  // specify main and backup server
$mail->SMTPAuth = true;     // turn on SMTP authentication
$mail->Username = "farhanabdollahi@afragostarnovin.ir";  // SMTP username
$mail->Password = "d4Mbn0qAzV731k"; // SMTP password

$mail->From = "farhanabdollahi@afragostarnovin.ir";
$mail->FromName = "Mailer";
$mail->AddAddress("farhanabdollahisd@gmail.com", "Josh Adams");
/*$mail->AddAddress("ellen@example.com");                  // name is optional
$mail->AddReplyTo("info@example.com", "Information");

$mail->WordWrap = 50;                                 // set word wrap to 50 characters
/*$mail->AddAttachment("/var/tmp/file.tar.gz");         // add attachments
$mail->AddAttachment("/tmp/image.jpg", "new.jpg");    // optional name
$mail->IsHTML(true);                                  // set email format to HTML

$mail->Subject = "Here is the subject";
$mail->Body    = "This is the HTML message body <b>in bold!</b>";
$mail->AltBody = "This is the body in plain text for non-HTML mail clients";

if(!$mail->Send())
{
echo "Message could not be sent. <p>";
echo "Mailer Error: " . $mail->ErrorInfo;
exit;
}

?>
</div>
<?php require "src/includes/footer.php" ?>*/
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset='UTF-8'>
        <title>ایمیل خود را تایید کنید</title>
        <style>
            @font-face {
                font-family: Samim;
                src: url('src/fonts/samim/Samim.eot');
                src: url('src/fonts/samim/Samim.eot') format('embedded-opentype'),
                     url('src/fonts/samim/Samim.woff') format('woff'),
                     url('src/fonts/samim/Samim.ttf') format('truetype');
                font-weight: normal;
                /* Samim font */
            }

            body{
                font-family:Samim;
                text-align:center;
                direction:rtl;
                font-size:20px;
            }

            #en{
                direction:ltr;
                font-family:Arial !important;
            }
        </style>
    </head>
    <body>
        <div>
            لطفا کد پایین را جهت تایید ایمیل خود در سایت وارد کنید
        </div>
        <div id="en">
            <?php echo rand(10000 , 50000); ?>
        </div>
        <div>
            کد را نمیبینید؟
            <br>
            روی لینک زیر کلیک کنید تا ایمیلتان تایید شود
        </div>
    </body>
    <script>
        let format = /../;
        if(format.test("..")){
            alert();
        }
    </script>
</html>
