<?php

//error_reporting(E_ALL);
//$site_name = Nom du site qu'on utilisera comme texte du From (equivalent $nameFrom)
//$admin_mail = variable à utiliser comme reply to (equivalent $from)
//$destinataire = destinataire du mail (equivalent $to)
//$sujet = Sujet du message (equivalent $subject)
//$message_texte = texte du mail (equivalent $body)
//$nameTo = alias du nom du destinataire (optionnel)
//A prevoir : txt_mail_defaut (Services informations), adr_mail_defaut (infos@....) et mdp_mail_defaut (...) dans site_settings

function sendMail($nameFrom, $from, $to, $subject, $body, $nameTo = "", $fichiersJoints = "", $ical_content = "") {
    require_once('plugins/mailer/class.phpmailer.php');

    $mail = new PHPMailer();
    $mail->CharSet = 'utf-8';
    $mail->XMailer = 'net-profil.com';
    $mail->IsSMTP(); // telling the class to use SMTP
    $mail->SMTPDebug = 0; // enables SMTP debug information (for testing)
    // 1 = errors and messages
    // 2 = messages only
    $mail->SMTPAuth = true; // enable SMTP authentication
    $mail->SMTPSecure = "ssl"; // sets the prefix to the servier
    $mail->Host = "smtp.gmail.com"; // sets GMAIL as the SMTP server
    $mail->Port = 465; // set the SMTP port for the GMAIL server
    $mail->Username = "mail@net-profil.com"; // GMAIL username
    $mail->Password = "GgTNtpRofIl2018"; // GMAIL password

    if ($from) {
        $mail->SetFrom($from, $nameFrom);
        $mail->AddReplyTo($from, $nameFrom);
    } else {
        $mail->SetFrom('no-reply@net-profil.com', 'Service Informations');
        $mail->AddReplyTo("no-reply@net-profil.com", "Service Informations");
    }

    $mail->Subject = $subject;

    $mail->MsgHTML($body);

    $mail->AddAddress($to, $nameTo);
    if (($fichiersJoints) && (is_array($fichiersJoints))) {
        foreach ($fichiersJoints as $cle => $valeur) {
            $mail->AddAttachment($valeur['chemin_fichier'], $valeur['nom_fichier']);
        }
    }
    if (!empty($ical_content)) {
        $mail->addStringAttachment($ical_content, 'ical.ics', 'base64', 'text/calendar');
    }

    if (!$mail->Send()) {
        echo $mail->ErrorInfo;
        return false;
    }

    $mail->SmtpClose(); // à supprimer si vous n'utilisez pas SMTP

    unset($mail);

    return true;
}
?>

