<?php



class ContatoController extends Controller
{


    public function index()
    {

        $dados = array();
        $dados['titulo'] = 'Contato - Ki Oficina';


        $this->carregarViews('contato', $dados);
    }

    //Enviar Email
    public function enviarEmail()
    {

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            $nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_SPECIAL_CHARS);
            $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
            $tel = filter_input(INPUT_POST, 'tel', FILTER_SANITIZE_NUMBER_INT);
            $assunto = filter_input(INPUT_POST, 'assunto', FILTER_SANITIZE_SPECIAL_CHARS);
            $msg = filter_input(INPUT_POST, 'msg', FILTER_SANITIZE_SPECIAL_CHARS);


            if ($nome && $email && $tel && $msg) {


                //Instanciar o Model de Contato
                $contatoModel = new Contato();

                $salvar = $contatoModel->salvarEmail($assunto, $nome, $email, $tel, $msg);

                if ($salvar) {

                    //reconhecer estrutura PHPMAILER
                    require_once("vendors/phpmailer/PHPMailer.php");
                    require_once("vendors/phpmailer/SMTP.php");
                    require_once("vendors/phpmailer/Exception.php");

                    $phpmail = new PHPMailer\PHPMailer\PHPMailer(); //Gerando variavel de email

                    try {
                        $phpmail->isSMTP(); //envio por SMTP
                        $phpmail->SMTPDebug = 0;

                        $phpmail->Host = EMAIL_HOST; //SMTP Servidor de Email
                        $phpmail->Port = EMAIL_PORT; //Porta do Servidor SMTP

                        $phpmail->SMTPSecure = 'ssl'; //Certificado / Autenticação SMTP
                        $phpmail->SMTPAuth = true; //Caso necessite ser autenticado

                        $phpmail->Username = EMAIL_USER; //Email SMTP
                        $phpmail->Password = EMAIL_PASS; //Senha SMTP

                        $phpmail->IsHTML(true); //Trabalhar com estrutura HTML
                        $phpmail->setFrom(EMAIL_USER, $nome); //Email do remetente
                        $phpmail->addAddress(EMAIL_USER, $assunto); //Email do destinatário

                        $phpmail->Subject = $assunto; //Assunto enviado pelo método POST

                        //Estrutura do Email
                        $phpmail->msgHTML(" Nome:  $nome <br>
                                        E-Mail: $email <br>
                                        Telefone: $tel <br>
                                        Mensagem: $msg");

                        $phpmail->AltBody = "   Nome:  $nome \n
                                            E-Mail: $email \n
                                            Telefone: $tel \n
                                            Mensagem: $msg";

                        $phpmail->send();

                        $dados = array(
                            'mensagem' => 'Obrigado pelo seu contato, em breve responderemos',
                            'status'   => 'sucesso'
                        );

                        $this->carregarViews('contato', $dados);


                        // EMAIL DE RESPOSTA


                    } catch (Exception $e) {

                        $dados = array(
                            'mensagem'  => 'Não foi possível enviar sua mensagem!',
                            'status'    => 'erro',
                            'nome'      => $nome,
                            'email'     => $email
                        );

                        error_log('Erro ao enviar o email' . $phpmail->ErrorInfo);

                        $this->carregarViews('contato', $dados);
                    } //  FIM TRY


                }

            } // FIM DO IF que testa se os campos estão preenchidos

        } else {
            $dados = array();
            $this->carregarViews('contato', $dados);
        }
    }
}
