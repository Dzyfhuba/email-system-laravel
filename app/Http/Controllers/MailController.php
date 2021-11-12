<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Webklex\PHPIMAP\ClientManager;

class MailController extends Controller
{
    public function index()
    {
        if (!Session::has('auth')) {
            return redirect()->route('login');
        }
        $mc = new MailController();
        $mails = $mc->getMail(Session::get('auth'));
        return view('mail', [
            'mails' => $mails
        ]);
    }

    public function getMail($request)
    {
        $cm = new ClientManager($options = [
            'host' => $request['host'],
            'port' => $request['port'],
            'encryption' => $request['encryption'],
            'validate_cert' => true,
            'username' => $request['email'],
            'password' => $request['password'],
            'authentication' => 'oauth',
        ]);

        /** @var \Webklex\PHPIMAP\Client $client */
        // $client = $cm->account('account_identifier');

        // or create a new instance manually
        $client = $cm->make([
            'host' => $request['host'],
            'port' => $request['port'],
            'encryption' => $request['encryption'],
            'validate_cert' => true,
            'username' => $request['email'],
            'password' => $request['password'],
            'protocol' => 'imap'
        ]);

        //Connect to the IMAP Server
        $client->connect();

        //Get all Mailboxes
        /** @var \Webklex\PHPIMAP\Support\FolderCollection $folders */
        $folders = $client->getFolders();

        //Loop through every Mailbox
        /** @var \Webklex\PHPIMAP\Folder $folder */
        $result = array();
        $i = 0;
        foreach ($folders as $folder) {

            //Get all Messages of the current Mailbox $folder
            /** @var \Webklex\PHPIMAP\Support\MessageCollection $messages */
            // $messages = $folder->messages()->from("*@gmail.com")->setFetchOrder('asc')->limit($limit = 30, $page = 2)->get();
            $messages = $folder->messages()->since(Carbon::now()->subDays(1))->setFetchOrderDesc()->get();
            /** @var \Webklex\PHPIMAP\Message $message */
            foreach ($messages as $message) {

                $result[$i++] = array(
                    'from' => $message->get('from')[0],
                    'subject' => $message->getSubject(),
                    'attachments_count' => $message->getAttachments()->count(),
                    'attachments' => $message->getAttachments(),
                    'content' => $message->getHTMLBody(),
                    'date' => new Carbon($message->get('date')[0]),
                    'uid' => $message->getMessageId()
                );
            }
        }
        $mails = $result;
        $mc = new MailController();
        $mc->arraySortByColumn($mails, 'date');

        return $mails;
    }
    public function arraySortByColumn(&$arr, $col, $direction = SORT_DESC) {
        $sort_col = array();
        foreach ($arr as $key=> $row) {
            $sort_col[$key] = $row[$col];
        }

        array_multisort($sort_col, $direction , $arr);
     }
}