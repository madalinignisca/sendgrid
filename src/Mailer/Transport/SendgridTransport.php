<?php

namespace MadalinIgnisca\Sendgrid\Mailer\Transport;

use Cake\Mailer\AbstractTransport;
use Cake\Mailer\Email;

class SendgridTransport extends AbstractTransport
{
    protected $sendgrid;
    protected $sendgridEmail;
    
    protected function setupSendgrid()
    {
        $this->sendgrid = new \SendGrid(
            $this->config('username'),
            $this->config('password')
        );
    }

    protected function setupEmail(Email $email)
    {
        $this->sendgridEmail = new \SendGrid\Email();
        foreach ($email->to() as $e => $n) {
            $this->sendgridEmail->addTo($e, $n);
        }
        foreach ($email->cc() as $e => $n) {
            $this->sendgridEmail->addCc($e, $n);
        }
        foreach ($email->bcc() as $e => $n) {
            $this->sendgridEmail->addBcc($e, $n);
        }
        foreach ($email->from() as $e => $n) {
            $this->sendgridEmail->setFrom($e);
            $this->sendgridEmail->setFromName($n);
        }
        foreach ($email->replyTo() as $e => $n) {
            $this->sendgridEmail->setReplyTo($e, $n);
        }
        foreach ($email->sender() as $e => $n) {
            $this->sendgridEmail->addHeader('Sender', sprintf('%s <%s>', $n, $e));
        }
        $this->sendgridEmail->setSubject($email->subject());
        $this->sendgridEmail->setText($email->message(Email::MESSAGE_TEXT));
        $this->sendgridEmail->setHtml($email->message(Email::MESSAGE_HTML));
        if ($email->attachments()) {
            foreach ($email->attachments() as $attachment) {
                $this->sendgridEmail->setAttachment($attachment['file'], $attachment['custom_filename']);
            }
        }
    }

    public function send(Email $email)
    {
        $this->setupSendgrid();
        $this->setupEmail($email);
        $this->sendgrid->send($this->sendgridEmail);
    }
}
