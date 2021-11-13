<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

class SendMail implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;


    protected $receiverEmail;
    protected $data;
    protected $subject;
    protected $template;
    protected $receiverName;
    protected $attachment;
    protected $attachmentName;


    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($data, $subject, $template, $receiverName, $receiverEmail, $attachment = null, $attachmentName = null)
    {
        $this->receiverEmail = $receiverEmail;
        $this->data = $data;
        $this->subject = $subject;
        $this->template = $template;
        $this->receiverName = $receiverName;
        $this->attachment = $attachment;
        $this->attachmentName = $attachmentName;
        
    }



    /**
     *  Ex : SendMail::dispatch($data, $subject, $template, Auth::user()->name, Auth::user()->email);
     */
    public function handle()
    {

        # 1 : Get list of email address & shuffle it 
        $senderList = explode(',',env("MAIL_USERNAME"));   
        shuffle($senderList);                     
        $check = true;
      
        # 2 : Loop email address and send mail - if error swith another email 
        foreach($senderList as $sender)
        {
            if($check)
            {
                try{
                    $transport = (new \Swift_SmtpTransport(env('MAIL_HOST'),env('MAIL_PORT'),env('MAIL_ENCRYPTION')))                 
                        ->setUsername($sender)
                        ->setPassword(env("MAIL_PASSWORD"));   
                       
                    $mailer = new \Swift_Mailer($transport);
                    
                    //Check if receiverEmail is array 
                    if(is_array($this->receiverEmail))   
                    {
                        $message =  (new \Swift_Message($this->subject))
                            ->setFrom([$sender=>env('APP_NAME')])
                            ->setTo([$this->receiverEmail[0]=>$this->receiverName])
                            ->setBcc($this->receiverEmail)
                            ->setBody(view($this->template, $this->data)->render(),'text/html');   
                    }
                    else 
                    {
                        $message =  (new \Swift_Message($this->subject))
                            ->setFrom([$sender=>env('APP_NAME')])
                            ->setTo([$this->receiverEmail=>$this->receiverName])
                            ->setBody(view($this->template, $this->data)->render(),'text/html');                                        
                    }                                    
                   
                    //Check if got attachhment 
                    if($this->attachment)
                    {
                        $message->attach(\Swift_Attachment::fromPath($this->attachment)->setFilename($this->attachmentName));
                    }
                       
                    $mailer->send($message);          
                    $check = false;

                }catch (\Exception $e) {                                                              
                    dd($e);
                    continue;
                }
            }                                     
        }    
    }
}
