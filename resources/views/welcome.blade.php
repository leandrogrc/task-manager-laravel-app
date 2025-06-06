<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TaskFlow - Seu Gerenciador de Tarefas Inteligente</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <style>
        :root {
            --primary-color: #6c63ff;
            --secondary-color: #4d44db;
            --accent-color: #ff6584;
        }

        .hero-section {
            background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%);
            padding: 5rem 0;
            border-radius: 0 0 30px 30px;
        }

        .feature-icon {
            font-size: 2.5rem;
            color: var(--primary-color);
            margin-bottom: 1rem;
        }

        .cta-section {
            background-color: var(--primary-color);
            color: white;
            padding: 4rem 0;
            border-radius: 30px;
        }

        .btn-primary {
            background-color: var(--primary-color);
            border-color: var(--primary-color);
        }

        .btn-primary:hover {
            background-color: var(--secondary-color);
            border-color: var(--secondary-color);
        }

        .btn-accent {
            background-color: var(--accent-color);
            border-color: var(--accent-color);
            color: white;
        }

        .app-screenshot {
            border-radius: 15px;
            box-shadow: 0 15px 30px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease;
        }

        .app-screenshot:hover {
            transform: translateY(-10px);
        }

        .testimonial-card {
            border-radius: 15px;
            background: white;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
            padding: 2rem;
            height: 100%;
        }

        .navbar-brand {
            font-weight: 700;
            color: var(--primary-color) !important;
        }
    </style>
</head>

<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-white sticky-top">
        <div class="container">
            <a class="navbar-brand" href="#">
                <i class="bi bi-check-circle-fill me-2"></i>TaskFlow
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="#features">Recursos</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#how-it-works">Como Funciona</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#testimonials">Depoimentos</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#pricing">Planos</a>
                    </li>
                    <!-- Links adicionados aqui -->
                    <li class="nav-item">
                        <a class="nav-link" href="/login">Login</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/register">Registrar-se</a>
                    </li>
                </ul>
                <a href="#cta" class="btn btn-primary ms-lg-3">Comece Agora</a>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <section class="hero-section">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <h1 class="display-4 fw-bold mb-4">Organize sua vida com o TaskFlow</h1>
                    <p class="lead mb-4">O aplicativo de gerenciamento de tarefas que simplifica sua rotina e aumenta sua produtividade.</p>
                    <div class="d-flex gap-3">
                        <a href="#cta" class="btn btn-primary btn-lg px-4">Experimente Grátis</a>
                        <a href="#how-it-works" class="btn btn-outline-primary btn-lg px-4">Saiba Mais</a>
                    </div>
                </div>
                <div class="col-lg-6 mt-5 mt-lg-0">
                    <img src="https://via.placeholder.com/600x400" alt="App TaskFlow" class="img-fluid app-screenshot">
                </div>
            </div>
        </div>
    </section>

    <!-- Features Section -->
    <section id="features" class="py-5 my-5">
        <div class="container">
            <div class="text-center mb-5">
                <h2 class="fw-bold">Recursos Incríveis</h2>
                <p class="text-muted">Tudo que você precisa para gerenciar suas tarefas</p>
            </div>

            <div class="row g-4">
                <div class="col-md-4">
                    <div class="text-center p-4">
                        <div class="feature-icon">
                            <i class="bi bi-list-check"></i>
                        </div>
                        <h4>Listas Inteligentes</h4>
                        <p class="text-muted">Organize suas tarefas em listas personalizadas com categorias e tags.</p>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="text-center p-4">
                        <div class="feature-icon">
                            <i class="bi bi-bell-fill"></i>
                        </div>
                        <h4>Lembretes</h4>
                        <p class="text-muted">Nunca mais perca um prazo com nossos lembretes inteligentes.</p>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="text-center p-4">
                        <div class="feature-icon">
                            <i class="bi bi-people-fill"></i>
                        </div>
                        <h4>Colaboração</h4>
                        <p class="text-muted">Compartilhe tarefas e projetos com sua equipe ou família.</p>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="text-center p-4">
                        <div class="feature-icon">
                            <i class="bi bi-bar-chart-fill"></i>
                        </div>
                        <h4>Relatórios</h4>
                        <p class="text-muted">Acompanhe seu progresso com relatórios visuais semanais.</p>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="text-center p-4">
                        <div class="feature-icon">
                            <i class="bi bi-phone"></i>
                        </div>
                        <h4>Multiplataforma</h4>
                        <p class="text-muted">Acesse suas tarefas em qualquer dispositivo, a qualquer hora.</p>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="text-center p-4">
                        <div class="feature-icon">
                            <i class="bi bi-shield-lock-fill"></i>
                        </div>
                        <h4>Segurança</h4>
                        <p class="text-muted">Seus dados protegidos com criptografia de ponta a ponta.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- How It Works -->
    <section id="how-it-works" class="py-5 bg-light">
        <div class="container">
            <div class="text-center mb-5">
                <h2 class="fw-bold">Como Funciona</h2>
                <p class="text-muted">Simples, rápido e eficiente</p>
            </div>

            <div class="row g-4 align-items-center">
                <div class="col-lg-6">
                    <div class="p-4">
                        <div class="d-flex mb-4">
                            <div class="me-4">
                                <div class="bg-primary text-white rounded-circle d-flex align-items-center justify-content-center" style="width: 50px; height: 50px;">
                                    <span class="fw-bold">1</span>
                                </div>
                            </div>
                            <div>
                                <h4>Crie sua conta</h4>
                                <p class="text-muted mb-0">Registre-se em menos de 1 minuto e comece a usar imediatamente.</p>
                            </div>
                        </div>

                        <div class="d-flex mb-4">
                            <div class="me-4">
                                <div class="bg-primary text-white rounded-circle d-flex align-items-center justify-content-center" style="width: 50px; height: 50px;">
                                    <span class="fw-bold">2</span>
                                </div>
                            </div>
                            <div>
                                <h4>Adicione tarefas</h4>
                                <p class="text-muted mb-0">Crie tarefas rapidamente com nosso sistema inteligente.</p>
                            </div>
                        </div>

                        <div class="d-flex">
                            <div class="me-4">
                                <div class="bg-primary text-white rounded-circle d-flex align-items-center justify-content-center" style="width: 50px; height: 50px;">
                                    <span class="fw-bold">3</span>
                                </div>
                            </div>
                            <div>
                                <h4>Seja produtivo</h4>
                                <p class="text-muted mb-0">Acompanhe seu progresso e conquiste seus objetivos.</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6">
                    <img src="https://via.placeholder.com/600x400" alt="Como funciona o TaskFlow" class="img-fluid app-screenshot">
                </div>
            </div>
        </div>
    </section>

    <!-- Testimonials -->
    <section id="testimonials" class="py-5 my-5">
        <div class="container">
            <div class="text-center mb-5">
                <h2 class="fw-bold">O que dizem nossos usuários</h2>
                <p class="text-muted">Veja como o TaskFlow está transformando vidas</p>
            </div>

            <div class="row g-4">
                <div class="col-md-4">
                    <div class="testimonial-card">
                        <div class="d-flex align-items-center mb-3">
                            <img src="https://via.placeholder.com/50" class="rounded-circle me-3" alt="Usuário">
                            <div>
                                <h5 class="mb-0">Carlos Silva</h5>
                                <small class="text-muted">Empreendedor</small>
                            </div>
                        </div>
                        <p>"O TaskFlow revolucionou minha produtividade. Agora consigo gerenciar meu negócio e vida pessoal com muito mais eficiência."</p>
                        <div class="text-warning">
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-fill"></i>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="testimonial-card">
                        <div class="d-flex align-items-center mb-3">
                            <img src="https://via.placeholder.com/50" class="rounded-circle me-3" alt="Usuário">
                            <div>
                                <h5 class="mb-0">Ana Souza</h5>
                                <small class="text-muted">Estudante</small>
                            </div>
                        </div>
                        <p>"Como estudante, o TaskFlow me ajuda a organizar todas as minhas tarefas e prazos. Nunca mais perdi um trabalho da faculdade!"</p>
                        <div class="text-warning">
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-fill"></i>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="testimonial-card">
                        <div class="d-flex align-items-center mb-3">
                            <img src="https://via.placeholder.com/50" class="rounded-circle me-3" alt="Usuário">
                            <div>
                                <h5 class="mb-0">Roberto Lima</h5>
                                <small class="text-muted">Gerente de Projetos</small>
                            </div>
                        </div>
                        <p>"A função de colaboração é incrível! Minha equipe está muito mais alinhada desde que começamos a usar o TaskFlow."</p>
                        <div class="text-warning">
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-half"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Pricing -->
    <section id="pricing" class="py-5 bg-light">
        <div class="container">
            <div class="text-center mb-5">
                <h2 class="fw-bold">Planos Acessíveis</h2>
                <p class="text-muted">Escolha o plano perfeito para suas necessidades</p>
            </div>

            <div class="row g-4 justify-content-center">
                <div class="col-md-4">
                    <div class="card border-0 shadow-sm h-100">
                        <div class="card-body p-4 text-center">
                            <h5 class="card-title">Básico</h5>
                            <h2 class="my-4">Grátis</h2>
                            <ul class="list-unstyled mb-4">
                                <li class="mb-2"><i class="bi bi-check text-success me-2"></i>Até 5 listas</li>
                                <li class="mb-2"><i class="bi bi-check text-success me-2"></i>100 tarefas</li>
                                <li class="mb-2"><i class="bi bi-check text-success me-2"></i>1 dispositivo</li>
                                <li class="mb-2 text-muted"><i class="bi bi-x me-2"></i>Colaboração</li>
                                <li class="text-muted"><i class="bi bi-x me-2"></i>Relatórios</li>
                            </ul>
                            <a href="#cta" class="btn btn-outline-primary w-100">Começar</a>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="card border-0 shadow-sm h-100">
                        <div class="card-header bg-primary text-white text-center py-3">
                            <h5 class="mb-0">Premium</h5>
                        </div>
                        <div class="card-body p-4 text-center">
                            <h2 class="my-4">R$19,90<span class="text-muted fs-6">/mês</span></h2>
                            <ul class="list-unstyled mb-4">
                                <li class="mb-2"><i class="bi bi-check text-success me-2"></i>Listas ilimitadas</li>
                                <li class="mb-2"><i class="bi bi-check text-success me-2"></i>Tarefas ilimitadas</li>
                                <li class="mb-2"><i class="bi bi-check text-success me-2"></i>5 dispositivos</li>
                                <li class="mb-2"><i class="bi bi-check text-success me-2"></i>Colaboração</li>
                                <li class="mb-2"><i class="bi bi-check text-success me-2"></i>Relatórios básicos</li>
                            </ul>
                            <a href="#cta" class="btn btn-primary w-100">Assinar</a>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="card border-0 shadow-sm h-100">
                        <div class="card-body p-4 text-center">
                            <h5 class="card-title">Empresarial</h5>
                            <h2 class="my-4">R$39,90<span class="text-muted fs-6">/mês</span></h2>
                            <ul class="list-unstyled mb-4">
                                <li class="mb-2"><i class="bi bi-check text-success me-2"></i>Todos os recursos Premium</li>
                                <li class="mb-2"><i class="bi bi-check text-success me-2"></i>+10 usuários</li>
                                <li class="mb-2"><i class="bi bi-check text-success me-2"></i>Relatórios avançados</li>
                                <li class="mb-2"><i class="bi bi-check text-success me-2"></i>Suporte prioritário</li>
                                <li class="mb-2"><i class="bi bi-check text-success me-2"></i>Integrações</li>
                            </ul>
                            <a href="#cta" class="btn btn-outline-primary w-100">Fale Conosco</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section id="cta" class="cta-section py-5 my-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8 text-center">
                    <h2 class="fw-bold mb-4">Pronto para transformar sua produtividade?</h2>
                    <p class="lead mb-5">Junte-se a mais de 100.000 usuários satisfeitos e comece hoje mesmo.</p>
                    <div class="d-flex flex-column flex-sm-row justify-content-center gap-3">
                        <a href="#" class="btn btn-light btn-lg px-4">Baixe Agora</a>
                        <a href="#" class="btn btn-accent btn-lg px-4">Experimente Grátis</a>
                    </div>
                    <div class="mt-4">
                        <p class="mb-2">Já tem uma conta? <a href="/login" class="text-white">Faça login</a></p>
                        <p>Novo por aqui? <a href="/register" class="text-white">Crie sua conta</a></p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-dark text-white py-5">
        <div class="container">
            <div class="row">
                <!-- ... outras colunas ... -->
                <div class="col-lg-2 col-md-6 mb-4 mb-md-0">
                    <h5 class="mb-4">Conta</h5>
                    <ul class="list-unstyled">
                        <li class="mb-2"><a href="/login" class="text-white text-decoration-none">Login</a></li>
                        <li class="mb-2"><a href="/register" class="text-white text-decoration-none">Registrar-se</a></li>
                        <li><a href="#" class="text-white text-decoration-none">Recuperar senha</a></li>
                    </ul>
                </div>
                <!-- ... resto do footer ... -->
            </div>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>