<?php
    class Admin extends Controller{

        public function __construct(){
            $this->adminModel = $this->model('Administrativo');
        }

        // Função para carregar a tela inicial do e-commerce
        public function index(){
            if(isset($_SESSION['admin_id'])){
                Url::redirecionar('admin/home');
            }else{
                $dados = [
                    'titulo' => 'Painel Administrativo - Ponto Digital R2 Barcode',
                    'desc' => 'Descricao',
                ];
                $this->view('Admin/Login/login', $dados);
            }
        }

        // Função responsável por chamar a página de erro
        private function errorPage(){
            $this->view('Admin/Error/error');
        }

        public function autenticar(){
            if(isset($_SESSION['admin_id'])){
                Url::redirecionar('admin/home');
            }else{
                $formulario = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

                if(isset($formulario)){
                    $dados = [
                        'login' => trim($formulario['login']),
                        'senha' => trim($formulario['senha'])
                    ];
                    if(in_array("", $formulario)){
                        if(empty($formulario['login'])){
                            Sessao::mensagem('login', 'Preencha o login', 'alert-info-error');
                        }
                        if(empty($formulario['senha'])){
                            Sessao::mensagem('login', 'Preencha a Senha', 'alert-info-error');
                        }
                    }else{
                        $admin = $this->adminModel->verificaLogin($formulario['login'], $formulario['senha']);

                        if($admin){
                            $this->criarSessao($admin);
                        }else{
                            Sessao::mensagem('login', 'Usuário ou senha inválidos', 'alert-info-error');
                        }
                    }
                }else{
                    $dados = [
                        'login' => '',
                        'senha' => ''
                    ];
                }
                $this->view('Admin/Login/login', $dados);
            }
        }

        private function criarSessao($admin){
            $_SESSION['admin_id'] = $admin->id;
            $_SESSION['admin_nome'] = $admin->nome;
            Url::redirecionar('admin/home');
        }

        public function logoff(){
            unset($_SESSION['admin_id']);
            unset($_SESSION['admin_nome']);

            session_destroy();
            
            Url::redirecionar('admin/login');
        }

        public function verificaSessao(){
            if(isset($_SESSION['admin_id'])){
                return true;
            }else{
                return false;
            }
        }

        public function home(){
            if($this->verificaSessao()){
                $dados = [
                    // Parametros
                ];
                $this->view('Admin/Home/home', $dados);
            }else{
                $this->index();
            }
        }

        public function usuarios(){
            if($this->verificaSessao()){
                $dados = [
                    'usuarios' => $this->adminModel->getUsuarios()
                ];
                $this->view('Admin/Cadastros/Usuarios/usuarios', $dados);
            }else{
                $this->index();
            }
        }

        public function getHistorico($id){
            date_default_timezone_set('America/Sao_Paulo');

            $dados = [
                'data' => date('Y-m-d'),
                'hora' => date('H:i:s', time()),
                'historico' => '',
                'dadosUsuario' => $this->adminModel->getInfoUser($id)
            ];

            if($this->adminModel->validaFuncionario($id)){
                $historico = $this->adminModel->getHistorico($id);
                $dados['historico'] = $historico;

                $this->view('Admin/Cadastros/Usuarios/relatorio', $dados);
            }else{
                Sessao::mensagem('usuarios', 'Usuário não localizado', 'alert-info-error');
                Url::redirecionar('Admin/Usuarios');
            }
        }
    }
?>