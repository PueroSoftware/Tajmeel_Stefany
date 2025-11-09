<?php
/**
 * SMTP Mailer - Clase simple para enviar emails vía SMTP
 * Alternativa a PHPMailer para proyectos simples
 */

class SimpleSMTPMailer {
    private $host;
    private $port;
    private $username;
    private $password;
    private $from_name;
    private $smtp_connection;
    
    public function __construct($config) {
        $this->host = $config['host'];
        $this->port = $config['port'];
        $this->username = $config['username'];
        $this->password = $config['password'];
        $this->from_name = $config['from_name'] ?? 'Website';
    }
    
    public function send($to, $subject, $message, $reply_to = null) {
        try {
            // Conectar al servidor SMTP
            $this->smtp_connection = fsockopen($this->host, $this->port, $errno, $errstr, 30);
            
            if (!$this->smtp_connection) {
                throw new Exception("No se pudo conectar al servidor SMTP: $errstr ($errno)");
            }
            
            // Leer respuesta inicial
            $this->getResponse();
            
            // EHLO
            $this->sendCommand("EHLO {$_SERVER['SERVER_NAME']}");
            
            // STARTTLS
            $this->sendCommand("STARTTLS");
            stream_socket_enable_crypto($this->smtp_connection, true, STREAM_CRYPTO_METHOD_TLS_CLIENT);
            
            // EHLO después de STARTTLS
            $this->sendCommand("EHLO {$_SERVER['SERVER_NAME']}");
            
            // AUTH LOGIN
            $this->sendCommand("AUTH LOGIN");
            $this->sendCommand(base64_encode($this->username));
            $this->sendCommand(base64_encode($this->password));
            
            // MAIL FROM
            $this->sendCommand("MAIL FROM: <{$this->username}>");
            
            // RCPT TO
            $this->sendCommand("RCPT TO: <{$to}>");
            
            // DATA
            $this->sendCommand("DATA");
            
            // Construir el mensaje
            $email_message = "From: {$this->from_name} <{$this->username}>\r\n";
            $email_message .= "To: {$to}\r\n";
            if ($reply_to) {
                $email_message .= "Reply-To: {$reply_to}\r\n";
            }
            $email_message .= "Subject: {$subject}\r\n";
            $email_message .= "Content-Type: text/plain; charset=UTF-8\r\n";
            $email_message .= "X-Mailer: SimpleSMTPMailer\r\n\r\n";
            $email_message .= $message . "\r\n";
            $email_message .= ".\r\n";
            
            fputs($this->smtp_connection, $email_message);
            $this->getResponse();
            
            // QUIT
            $this->sendCommand("QUIT");
            
            fclose($this->smtp_connection);
            return true;
            
        } catch (Exception $e) {
            error_log("Error SMTP: " . $e->getMessage());
            if ($this->smtp_connection) {
                fclose($this->smtp_connection);
            }
            return false;
        }
    }
    
    private function sendCommand($command) {
        fputs($this->smtp_connection, $command . "\r\n");
        return $this->getResponse();
    }
    
    private function getResponse() {
        $response = '';
        while ($line = fgets($this->smtp_connection, 515)) {
            $response .= $line;
            if (substr($line, 3, 1) == ' ') {
                break;
            }
        }
        return $response;
    }
}

// Función helper para enviar emails fácilmente
function enviarEmailSMTP($destinatario, $asunto, $cuerpo, $reply_to = null) {
    // Cargar configuración desde archivo externo
    $config = require __DIR__ . '/email_config.php';
    
    // Verificar que la contraseña está configurada
    if ($config['password'] === 'TU_CONTRASEÑA_AQUI') {
        error_log('ERROR: Contraseña de email no configurada en email_config.php');
        return false;
    }
    
    $mailer = new SimpleSMTPMailer($config);
    return $mailer->send($destinatario, $asunto, $cuerpo, $reply_to);
}
?>
