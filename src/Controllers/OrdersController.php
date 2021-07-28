<?php
declare(strict_types=1);

/**
 * This file is part of the Vökuró.
 *
 * (c) Phalcon Team <team@phalcon.io>
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */

namespace Vokuro\Controllers;

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
use Vokuro\Models\Goodsinorders;
use Vokuro\Models\Orders;

class OrdersController extends ControllerBase
{
    public function indexAction()
    {
        $this->view->setVar('logged_in', is_array($this->auth->getIdentity()));
        $this->view->setTemplateBefore('public');
    }

    public function makeorderAction()
    {
        $items = $this->cart->content();
        if (count($items) == 0) {
            $this->response->redirect('');
        } else {
            $tel = $this->request->getPost('phone');
            $adress = $this->request->getPost('adress');
            $name = $this->request->getPost('name');
            $order = new Orders([
                'tel_orders' => $tel,
                'adress_orders' => $adress,
                'name_orders' => $name
            ]);
            $order->save();
    
            $order_id = Orders::maximum([
                "column" => "id_orders"
            ]);

            $subject = "Vokuro store";
            $message = "Hello, $name. Your order is:<br>";
            foreach($items as $value) {
                $goods_id = $value->id;
                $count = $value->qty;
                $goods_name = $value->name;
                $goods_price = $value->price*$count;
                $goodsinorders = new Goodsinorders([
                    'goods_id_gio'    =>  $goods_id,
                    'order_id_gio'    =>  $order_id,
                    'count_goods_gio' =>  $count
                ]);
                $message .= "$count $goods_name for $goods_price $<br>";
                $goodsinorders->save();
            }

            $mail = new PHPMailer(true);

            try {
                //Server settings
                $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
                $mail->isSMTP();                                            //Send using SMTP
                $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
                $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
                $mail->Username   = 'smthgood52@gmail.com';                     //SMTP username
                $mail->Password   = '7ssgTwFT8AyJ5bi';                               //SMTP password
                $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
                $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

                //Recipients
                $mail->setFrom('from@example.com', 'Mailer');
                $mail->addAddress($adress, $name);     //Add a recipient
                // $mail->addAddress('ellen@example.com');               //Name is optional
                $mail->addReplyTo('info@example.com', 'Information');
                $mail->addCC($adress);
                // $mail->addBCC('bcc@example.com');

                //Attachments
                // $mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
                // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name

                //Content
                $mail->isHTML(true);                                  //Set email format to HTML
                $mail->Subject =  $subject;
                $mail->Body    =  $message;
                $mail->AltBody = 'Thanks';

                $mail->send();
                echo 'Message has been sent';
            } catch (Exception $e) {
                echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
            }

            $this->cart->destroy();
            // $this->response->redirect('/check');
        }

    }
}