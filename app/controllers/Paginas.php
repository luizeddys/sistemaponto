<?php
    class Paginas extends Controller{

        public function __construct(){
            $this->paginaModel = $this->model('Pagina');
        }

        // Função para carregar a tela inicial do e-commerce
        public function index(){
            $dados = [
                'titulo' => 'Página Inicial - Ponto Digital R2 Barcode',
                'desc' => 'Descricao',
            ];
            $this->view('Paginas/Home/home', $dados);
        }

        // Função responsável por chamar a página de erro
        private function errorPage(){
            $this->view('Paginas/Error/error');
        }

        public function pontoEntrada(){
            $this->view('Paginas/Ponto/entrada');
        }

        public function pontoSaida(){
            $this->view('Paginas/Ponto/saida');
        }

        public function pontoIntervaloSaida(){
            $this->view('Paginas/Ponto/saidaIntervalo');
        }

        public function pontoIntervaloEntrada(){
            $this->view('Paginas/Ponto/entradaIntervalo');
        }

        public function saidaJustificada(){
            $this->view('Paginas/Ponto/saidaJustificada');
        }

        public function consultarHistorico(){
            $this->view('Paginas/Historico/ConsultarHistorico');
        }

        public function computarEntrada(){
            $formulario = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            date_default_timezone_set('America/Sao_Paulo');

            $dados = [
                'codigo' => trim($formulario['funcionarioCode']),
                'data' => date('Y-m-d'),
                'hora' => date('H:i:s', time())
            ];

            if(in_array("", $dados)){
                if(empty($formulario['funcionarioCode'])){
                    echo '
                            <script>
                                alert("Insira o código do funcionário!");
                                window.location.href="'.url.'paginas/pontoEntrada";
                            </script>';
                }
            }else{
                if($this->paginaModel->validaFuncionario($dados)){
                    if(!$this->paginaModel->validaPonto($dados)){
                        if($this->paginaModel->computarEntrada($dados)){
                            echo '
                                    <script>
                                        alert("Ponto computado!");
                                        window.location.href="'.url.'paginas/index";
                                    </script>';
                        }else{
                            echo '
                                    <script>
                                        alert("Erro ao computar ponto!");
                                        window.location.href="'.url.'paginas/index";
                                    </script>';
                        }
                    }else{
                        echo '
                        <script>
                            alert("Ponto já computado.");
                            window.location.href="'.url.'paginas/index";
                        </script>';
                    }
                }else{
                    echo '
                    <script>
                        alert("Funcionário não localizado");
                        window.location.href="'.url.'paginas/index";
                    </script>';
                }
            }
        }

        public function computarSaida(){
            $formulario = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            date_default_timezone_set('America/Sao_Paulo');

            $dados = [
                'codigo' => trim($formulario['funcionarioCode']),
                'data' => date('Y-m-d'),
                'hora' => date('H:i:s', time())
            ];

            if(in_array("", $dados)){
                if(empty($formulario['funcionarioCode'])){
                    echo '
                            <script>
                                alert("Insira o código do funcionário!");
                                window.location.href="'.url.'paginas/pontoEntrada";
                            </script>';
                }
            }else{
                if($this->paginaModel->validaFuncionario($dados)){
                    if($this->paginaModel->validaPonto($dados)){
                        if(!$this->paginaModel->validaPontoSaida($dados) && !$this->paginaModel->validaPontoSaidaJustificada($dados)){
                            if($this->paginaModel->computarSaida($dados)){
                                echo '
                                        <script>
                                            alert("Ponto computado!");
                                            window.location.href="'.url.'paginas/index";
                                        </script>';
                            }else{
                                echo '
                                        <script>
                                            alert("Erro ao computar ponto!");
                                            window.location.href="'.url.'paginas/index";
                                        </script>';
                            }
                        }else{
                            echo '
                            <script>
                                alert("Ponto de saída já computado.");
                                window.location.href="'.url.'paginas/index";
                            </script>';
                        }
                    }else{
                        echo '
                        <script>
                            alert("Ponto de entrada não computado.");
                            window.location.href="'.url.'paginas/index";
                        </script>';
                    }
                }else{
                    echo '
                    <script>
                        alert("Funcionário não localizado");
                        window.location.href="'.url.'paginas/index";
                    </script>';
                }
            }
        }

        public function computarSaidaJustificada(){
            $formulario = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            date_default_timezone_set('America/Sao_Paulo');

            $dados = [
                'codigo' => trim($formulario['funcionarioCode']),
                'data' => date('Y-m-d'),
                'hora' => date('H:i:s', time())
            ];

            if(in_array("", $dados)){
                if(empty($formulario['funcionarioCode'])){
                    echo '
                            <script>
                                alert("Insira o código do funcionário!");
                                window.location.href="'.url.'paginas/pontoEntrada";
                            </script>';
                }
            }else{
                if($this->paginaModel->validaFuncionario($dados)){
                    if($this->paginaModel->validaPonto($dados)){
                        if(!$this->paginaModel->validaPontoSaida($dados)){
                            if(!$this->paginaModel->validaPontoSaidaJustificada($dados)){
                                if($this->paginaModel->computarSaidaJustificada($dados)){
                                    echo '
                                            <script>
                                                alert("Ponto computado!");
                                                window.location.href="'.url.'paginas/index";
                                            </script>';
                                }else{
                                    echo '
                                            <script>
                                                alert("Erro ao computar ponto!");
                                                window.location.href="'.url.'paginas/index";
                                            </script>';
                                }
                            }else{
                                echo '
                                <script>
                                    alert("Ponto de saída justificada já computado.");
                                    window.location.href="'.url.'paginas/index";
                                </script>';
                            }
                        }else{
                            echo '
                            <script>
                                alert("Ponto de saída já computado.");
                                window.location.href="'.url.'paginas/index";
                            </script>';
                        }
                    }else{
                        echo '
                        <script>
                            alert("Ponto de entrada não registrado.");
                            window.location.href="'.url.'paginas/index";
                        </script>';
                    }
                }else{
                    echo '
                    <script>
                        alert("Funcionário não localizado");
                        window.location.href="'.url.'paginas/index";
                    </script>';
                }
            }
        }

        public function computarSaidaIntervalo(){
            $formulario = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            date_default_timezone_set('America/Sao_Paulo');

            $dados = [
                'codigo' => trim($formulario['funcionarioCode']),
                'data' => date('Y-m-d'),
                'hora' => date('H:i:s', time())
            ];

            if(in_array("", $dados)){
                if(empty($formulario['funcionarioCode'])){
                    echo '
                            <script>
                                alert("Insira o código do funcionário!");
                                window.location.href="'.url.'paginas/pontoEntrada";
                            </script>';
                }
            }else{
                if($this->paginaModel->validaFuncionario($dados)){
                    if($this->paginaModel->validaPonto($dados)){
                        if(!$this->paginaModel->validaPontoSaida($dados)){
                            if(!$this->paginaModel->validaPontoSaidaIntervalo($dados)){
                                if($this->paginaModel->computarSaidaIntervalo($dados)){
                                    echo '
                                            <script>
                                                alert("Ponto computado!");
                                                window.location.href="'.url.'paginas/index";
                                            </script>';
                                }else{
                                    echo '
                                            <script>
                                                alert("Erro ao computar ponto!");
                                                window.location.href="'.url.'paginas/index";
                                            </script>';
                                }
                            }else{
                                echo '
                                <script>
                                    alert("Ponto de saída para o intervalo já computado.");
                                    window.location.href="'.url.'paginas/index";
                                </script>';
                            }
                        }else{
                            echo '
                            <script>
                                alert("Ponto de saída já computado. Intervalo indisponível");
                                window.location.href="'.url.'paginas/index";
                            </script>';
                        }
                    }else{
                        echo '
                            <script>
                                alert("Ponto de entrada não registrado");
                                window.location.href="'.url.'paginas/index";
                            </script>';
                    }
                }else{
                    echo '
                    <script>
                        alert("Funcionário não localizado");
                        window.location.href="'.url.'paginas/index";
                    </script>';
                }
            }
        }

        public function computarEntradaIntervalo(){
            $formulario = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            date_default_timezone_set('America/Sao_Paulo');

            $dados = [
                'codigo' => trim($formulario['funcionarioCode']),
                'data' => date('Y-m-d'),
                'hora' => date('H:i:s', time())
            ];

            if(in_array("", $dados)){
                if(empty($formulario['funcionarioCode'])){
                    echo '
                            <script>
                                alert("Insira o código do funcionário!");
                                window.location.href="'.url.'paginas/pontoEntrada";
                            </script>';
                }
            }else{
                if($this->paginaModel->validaFuncionario($dados)){
                    if($this->paginaModel->validaPonto($dados)){
                        if(!$this->paginaModel->validaPontoSaida($dados)){
                            if($this->paginaModel->validaPontoSaidaIntervalo($dados)){
                                if(!$this->paginaModel->validaPontoEntradaIntervalo($dados)){
                                    if($this->paginaModel->computarEntradaIntervalo($dados)){
                                        echo '
                                                <script>
                                                    alert("Ponto computado!");
                                                    window.location.href="'.url.'paginas/index";
                                                </script>';
                                    }else{
                                        echo '
                                                <script>
                                                    alert("Erro ao computar ponto!");
                                                    window.location.href="'.url.'paginas/index";
                                                </script>';
                                    }
                                }else{
                                    echo '
                                    <script>
                                        alert("Ponto de entrada já computado.");
                                        window.location.href="'.url.'paginas/index";
                                    </script>';
                                }
                            }else{
                                echo '
                                <script>
                                    alert("Ponto de saída ao intervalo não registrado.");
                                    window.location.href="'.url.'paginas/index";
                                </script>';
                            }
                        }else{
                            echo '
                            <script>
                                alert("Ponto de saída já computado. Intervalo indisponível");
                                window.location.href="'.url.'paginas/index";
                            </script>';
                        }
                    }else{
                        echo '
                            <script>
                                alert("Ponto de entrada não registrado");
                                window.location.href="'.url.'paginas/index";
                            </script>';
                    }
                }else{
                    echo '
                    <script>
                        alert("Funcionário não localizado");
                        window.location.href="'.url.'paginas/index";
                    </script>';
                }
            }
        }

        public function buscaHistorico(){
            $formulario = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            date_default_timezone_set('America/Sao_Paulo');

            $dados = [
                'codigo' => trim($formulario['funcionarioCode']),
                'data' => date('Y-m-d'),
                'hora' => date('H:i:s', time()),
                'historico' => '',
                'dadosUsuario' => $this->paginaModel->getInfoUser($formulario['funcionarioCode'])
            ];

            if(in_array("", $dados) && $dados['historico'] != ''){
                if(empty($formulario['funcionarioCode'])){
                    echo '
                            <script>
                                alert("Insira o código do funcionário!");
                                window.location.href="'.url.'paginas/pontoEntrada";
                            </script>';
                }
            }else{
                if($this->paginaModel->validaFuncionario($dados)){
                    $historico = $this->paginaModel->getHistorico($dados['codigo']);
                    $dados['historico'] = $historico;

                    $this->view('Paginas/Historico/listarHistorico', $dados);
                }else{
                    echo '
                    <script>
                        alert("Funcionário não localizado");
                        window.location.href="'.url.'paginas/index";
                    </script>';
                }
            }
        }
    }
?>