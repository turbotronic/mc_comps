<?php
/**
 *  @package    dfm-base
 *  @author     Jonathan Boho
 *  @copyright  (c) 2012
 *  @version    1.0
 *  @license    xxx
 */

require_once 'phpMailer/class.phpmailer.php';
require_once 'phpMailer/class.smtp.php';
require_once 'phpMailer/language/phpmailer.lang-en.php';

class io
{
    public function __construct()
    {
        // does not instantiate
    }

    public static function send_email($email, $name, $sub, $msg)
    {
        $to = $email;
        $to_name = $name;
        $from_name = "Count Generator Support";
        $from = "jboho@denverpost.com";
        $subject = $sub;
        $headers = "From: ". $from . "\n";
        $headers .= "Reply-To: noreply\n";
        $headers .= "X-Mailer: PHP/" . phpversion() . "\n";
        $headers .= "MIME-Version: 1.0\n";
        $headers .= "Content-Type: text/plain; charset=iso-8859-1";
        $message =  strip_tags($msg);

        // PHPMailer's Object-oriented approach
        $mail = new PHPMailer();

        // Can use SMTP
        // comment out this section and it will use PHP mail() instead
        // $mail->IsSMTP();
        // 		$mail->Host     = "killer";
        // 		$mail->Port     = 143;
        // 		$mail->SMTPAuth = true;
        // 		$mail->Username = "jboho";
        // 		$mail->Password = "Nap7obob";

        $mail->FromName = $from_name;
        $mail->From     = $from;
        $mail->AddAddress($to, $to_name);
        $mail->Subject  = $subject;
        $mail->Body     = $message;

        $result = $mail->Send();

        return $result ? true : false;
    }

    // Prints messages to the log file
    public static function log_item($msg, $err=array())
    {
        $date = strftime("%Y-%m-%d %T");
        $log_item = $date . ": " . $msg . "\r\n";
        $str = $_SERVER['REQUEST_URI'];
        if (!empty($err)) {
            //cycle through errors and stores them to file
            foreach ($err as $key=>$error) {
                $log_item .= "Error: " . $error . "\r\n";
            }
        }
        if (!strpos($str, "admin")) {
            $file_contents = read_file("logs", "log.txt");
        } else {
            $file_contents = read_file("../logs", "log.txt");
        }

        $write_to_file = $file_contents . $log_item;

        if (!strpos($str, "admin")) {
            write_file("logs", "log.txt", $write_to_file);
        } else {
            write_file("../logs", "log.txt", $write_to_file);
        }
    }

    // Writes data to a file. if the file does not yet exist, the file is created.
    public static function write_file($dir, $filename, $data) // arguments are the file directory, file name and data to be written
    {
        $path = $dir . "/" . $filename; // path is the combination of the dir and filename.
        if (!file_exists($path)) { // if the file does not exist . . .
            if (!$filehandle = fopen($path, 'w')) { // if the file can't be created . . .
                echo ("<p><strong>The file \"{$filename}\" cannot be created.</strong></p>");

                return false; // . . . tell the user
            } else { // if the file is created . . .
                fwrite($filehandle, $data); // write the data to the file.
                fclose($filehandle); // close the file.

                return true;
            }
        } else { // if the file already exists . . .
            if (!$filehandle = fopen($path, 'w')) { // . . . see if it can be written to. if not . . .
                echo ("<p><strong>The file \"{$filename}\" can't be written to.</strong></p>"); // . . . tell the user.

                return false;
            } else { // if it can . . .
                if (!fwrite($filehandle, $data)) { // . . . attempt to write to the file. If writing fails . . .
                    echo ("<p><strong>Writing to \"{$filename}\" failed.</strong></p>"); // . . . tell the user.

                    return false;
                } else { // if writing succeeds . . .
                    fclose($filehandle); // close the file

                    return true;
                }
            }
        }
    }

    // This function reads a file and returns the data within the file.
    public static function read_file($dir, $filename) // arguments are the file directory and name.
    {
        $path = $dir . "/" . $filename; // set path to file
        if (file_exists($path)) { // if the file exists . . .
            if ($filehandle = fopen($path, 'r')) { // . . . and can be opened . . .
                $data = fread($filehandle, filesize($path)); // . . . store the file data in a variable.
                fclose($filehandle); // close the file

                return $data; // and return the data.
            } else {
                echo ("<p><strong>The file \"{$filename}\" cannot be read.</strong></p>"); // tell the user the file cannot be read.
            }
        } else {
            echo("<p><strong>The file \"{$filename}\" does not exist</strong></p>"); // the the user the file does not exist.
        }
    }

}
