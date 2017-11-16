<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Email_model extends CI_Model {

    function __construct()
    {
        parent::__construct();
    }

    function account_opening_email($account_type = '' , $email = '', $password = '')
    {
        $system_name	=	$this->db->get_where('settings' , array('type' => 'system_name'))->row()->description;

        $email_msg		=	"خوش آمدید ".$system_name." به<br />";
        $email_msg		.=	"نوع حساب کاربری : ".$account_type."<br />";
        $email_msg		.=	"نام کاربری : ".$email."<br />";
        //	$email_msg		.=	"رمز عبور : ". $password ."<br />";
        $email_msg		.=	"لینک ورود : ".base_url()."<br />";

        $email_sub		=	"مشخصات حساب کاربری";
        $email_to		=	$email;

        $this->do_email($email_msg , $email_sub , $email_to);
    }

    function password_reset_email($new_password = '' , $account_type = '' , $email = '')
    {
        $query			=	$this->db->get_where($account_type , array('email' => $email));
        if($query->num_rows() > 0)
        {

            $email_msg	=	"نوع حساب کاربری : ".$account_type."<br />";
            $email_msg	.=	"رمز عبور جدید شما : ".$new_password."<br />";

            $email_sub	=	"درخواست بازنشانی رمز عبور";
            $email_to	=	$email;
            $this->do_email($email_msg , $email_sub , $email_to);
            return true;
        }
        else
        {
            return false;
        }
    }

    function notify_email($email_sub, $email_message) {
        //$this->contact_message_email($email_message['sender'],$email_message=['reciever'], $email_message);
        //$data = implode(" ", $email_message);
        //$this->do_email($data, $email_sub, $email_message['reciever'], $email_message['sender']);
        $email_to = '';
        $account_type = explode('-', $email_message['reciever'])[0];
        $id = explode('-', $email_message['reciever'])[1];
        $query = $this->db->get_where($account_type, array($account_type.'_id' => $id));
        foreach ($query->result() as $row)
        {
            $email_to = $row->email;
        }
        $sender_account_type = explode('-', $email_message['sender'])[0];
        $sender_id = explode('-', $email_message['sender'])[1];
        $sender_query = $this->db->get_where($sender_account_type, array($sender_account_type.'_id' => $sender_id));
        foreach ($sender_query->result() as $row)
        {
            $sender_name = $row->name;
        }
        $message = 'شما یک پیام تازه از '.$sender_name.' دریافت کرده اید: '.$email_message['message'];
        $this->do_email($message, $email_sub, $email_to, 'admin@helli2portal.ir');
    }

    function contact_message_email($email_from, $email_to, $email_message) {
        $email_sub = "پیام از سسیستم مدیریت مدرسه";
        $this->do_email($email_message, $email_sub, $email_to, $email_from);
    }

    /***custom email sender****/
    function do_email($msg=NULL, $sub=NULL, $to=NULL, $from=NULL)
    {

        $config = array();
        $config['useragent']	= "CodeIgniter";
        $config['mailpath']		= "/usr/bin/sendmail"; // or "/usr/sbin/sendmail"
        $config['protocol']		= "smtp";
        $config['smtp_host']	= "localhost";
        $config['smtp_port']	= "26";
        $config['mailtype']		= 'html';
        $config['charset']		= 'utf-8';
        $config['newline']		= "\r\n";
        $config['wordwrap']		= TRUE;

        $this->load->library('email');

        $this->email->initialize($config);

        $system_name	=	$this->db->get_where('settings' , array('type' => 'system_name'))->row()->description;
        if($from == NULL)
            $from		=	$this->db->get_where('settings' , array('type' => 'system_email'))->row()->description;

        $this->email->from($from, $system_name);
        $this->email->from($from, $system_name);
        $this->email->to($to);
        $this->email->subject($sub);

        $msg	=	$msg."<br /><br /><br /><br /><br /><br /><br /><hr /><center><a href=\"http://helli2portal.ir\">دبیرستان دوره اول علامه حلی ۲ تهران</a></center>";

        $this->email->message($msg);

        $this->email->send();

        //echo $this->email->print_debugger();
    }
}
