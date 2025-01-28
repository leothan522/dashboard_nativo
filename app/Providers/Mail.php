<?php

namespace app\Providers;

use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\PHPMailer;

class Mail
{
    protected PHPMailer $mail;

    /**
     * @throws Exception
     */
    public function __construct()
    {
        // Al pasar true habilitamos las excepciones
        $this->mail = new PHPMailer(true);
        // Ajustes del Servidor
        //self::$mail->SMTPDebug = SMTP::DEBUG_SERVER; // Comenta esto antes de producción
        $this->mail->isSMTP();
        $this->mail->Host = MAIL_HOST;
        $this->mail->SMTPAuth = true;
        $this->mail->Username = MAIL_USERNAME;
        $this->mail->Password = MAIL_PASSWORD;
        $this->mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $this->mail->Port = MAIL_PORT;
        $this->mail->setFrom(MAIL_USERNAME, APP_NAME);
        $this->mail->isHTML();
        return $this;
    }

    /**
     * @throws Exception
     */
    public function to($email): static
    {
        // Destinatario
        $this->mail->addAddress($email);
        return $this;
    }

    /**
     * @throws Exception
     */
    public function cc($email): static
    {
        // Con Copia
        $this->mail->addCC($email);
        return $this;
    }

    /**
     * @throws Exception
     */
    public function attachment($file, $name = null): static
    {
        // Adjuntar Archivo
        $this->mail->addAttachment($file, $name);
        return $this;
    }

    /**
     * @throws Exception
     */
    public function send($subject, $body, $altBody = 'null'): static
    {
        $this->mail->Subject = $subject;
        $this->mail->Body = $body;
        $this->mail->AltBody = $altBody;
        $this->mail->send();
        //echo 'Se envio el mensaje';
        return $this;
    }

    /**
     * @throws Exception
     */
    public static function sendMail($to, $subject, $body, $altBody = ''): void
    {
        $mail = new Mail();
        if (is_array($to)){
            foreach ($to as $email){
                $mail->to($email);
            }
        }else{
            $mail->to($to);
        }
        $mail->send($subject, $body, $altBody);
    }

    /**
     * @throws Exception
     */
    public static function sendMailWithCC($to, $cc, $subject, $body, $altBody = ''): void
    {
        $mail = new Mail();
        if (is_array($to)){
            foreach ($to as $email){
                $mail->to($email);
            }
        }else{
            $mail->to($to);
        }
        if (is_array($cc)){
            foreach ($cc as $email){
                $mail->cc($email);
            }
        }else{
            $mail->cc($cc);
        }
        $mail->send($subject, $body, $altBody);
    }






}