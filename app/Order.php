<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $guarded = ['id'];

    public static function storeOrder($products, $email, $sum, $adminEmail)
    {
        $order = new Order();
        $order->user_email = $email;
        $order->products_id = $products;
        $order->sum = $sum;
        $order->save();
        $orderid = $order->id;

        $message = 'На сайте новый заказ № ' . $orderid;
        Order::mailOrder($adminEmail, $message);

        return $orderid;
    }

    public static function mailOrder($email, $message)
    {
        $order = new Order();
        $order->swiftMail('Информация о заказе', $email, $message);
    }

    private function swiftMail(string $theme, $to, string $mess)
    {
        $transport = (new \Swift_SmtpTransport('ssl://smtp.yandex.ru', 465))
            ->setUsername('kopose@yandex.ru')
            ->setPassword('89516775954');
        $mailer = new \Swift_Mailer($transport);
        $message = (new \Swift_Message($theme))
            ->setFrom(['kopose@yandex.ru'])
            ->setTo($to)
            ->setBody($mess, 'text/html');
        $result = $mailer->send($message);
        return $result;
    }
}
