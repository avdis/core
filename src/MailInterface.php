<?php

namespace Mwyatt\Core;

/**
 * @author Martin Wyatt <martin.wyatt@gmail.com>
 * @version     0.1
 * @license http://www.php.net/license/3_01.txt PHP License 3.01
 */
interface MailInterface
{
    public function __construct(\Swift_Mailer $swiftMailer);
    public function getNewMessage();
    public function send($message);
}
