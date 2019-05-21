<?php
	require_once('PHPMailer.php'); //chama a classe de onde você a colocou.
	require_once('SMTP.php');

	class Email {
		private $mail;
		private $emailDestinatario;
		private $nomeDestinatario;
		private $assunto;
		private $corpo;

		function __construct(){
			$this->mail = new PHPMailer\PHPMailer\PHPMailer();
			$this->mail->IsSMTP();

			//configuração do gmail
			$this->mail->Port = '465'; //porta usada pelo gmail.
			$this->mail->Host = 'smtp.gmail.com'; 
			$this->mail->IsHTML(true); 
			$this->mail->Mailer = 'smtp'; 
			$this->mail->SMTPSecure = 'ssl';

			//configuração do usuário do gmail
			$this->mail->SMTPAuth = true; 
			$this->mail->Username = 'machad.lari@gmail.com'; // usuario gmail.   
			$this->mail->Password = 'doremifasol'; // senha do email.

			$this->mail->SingleTo = true; 

			$this->mail->From = 'machad.lari@gmail.com'; 
			$this->mail->FromName = 'Orientação Acadêmica'; 
		}

		public function recuperarSenhaEmail($email){
			$this->mail->addAddress($email); // email do destinatario.

			$this->mail->Subject = "Recuperação de Senha do Sistema de Orientação Acadêmica"; 
			$this->mail->Body = "Sua nova senha é : " . $this->gerarNovaSenha() . ".";

			if(!$this->mail->Send())
			    echo "Erro ao enviar Email:" . $this->mail->ErrorInfo;
		}

		public function notificarOrientacao($email,$nomeProfessor, $nomeAluno){
			$this->mail->addAddress($email); // email do destinatario.

			$this->mail->Subject = "Nova Orientação no Sistema de Orientação Acadêmica"; 
			$this->mail->Body = "Caro(a) Professor(a) " . $nomeProfessor . ",<br>O aluno " . $nomeAluno . " solicita a sua orientação.";

			if(!$this->mail->Send())
			    echo "Erro ao enviar Email:" . $this->mail->ErrorInfo;
		}

		public function respostaOrientacao($email, $nomeProfessor, $nomeAluno) {
			$this->mail->addAddress($email); // email do destinatario.

			$this->mail->Subject = "Notificação de Resposta no Sistema de Orientação Acadêmica"; 
			$this->mail->Body = "Caro(a) Aluno(a) " . $nomeAluno . ", <br>Você possui uma nova resposta do professor(a) " . $nomeProfessor . ".";

			if(!$this->mail->Send())
			    echo "Erro ao enviar Email:" . $this->mail->ErrorInfo;
		}

	}
?>
