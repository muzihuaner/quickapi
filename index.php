<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>快点API - 专业接口服务平台 | 免费API接口调用 | 数据接口服务</title>
    <meta name="description" content="快点API提供稳定可靠的接口服务平台，包含免费API接口调用、数据接口、开发接口等服务，助力开发者快速构建应用。">
    <meta name="keywords" content="API接口,免费API,数据接口,接口服务,开发接口,接口调用">
    <!-- Bootstrap 5 CSS -->
    <link href="https://gcore.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://gcore.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">
    <style>
        :root {
            --primary-color: #4361ee;
            --secondary-color: #3f37c9;
            --accent-color: #4cc9f0;
            --light-color: #f8f9fa;
            --dark-color: #212529;
        }
        
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f0f2f5;
        }
        
        .navbar {
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        }
        
        .hero-section {
            background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
            color: white;
            padding: 4rem 0;
            margin-bottom: 2rem;
            border-radius: 0 0 1rem 1rem;
        }
        
        .api-card {
            transition: all 0.3s ease;
            border: none;
            border-radius: 1rem;
            overflow: hidden;
            box-shadow: 0 4px 6px rgba(0,0,0,0.1);
        }
        
        .api-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 20px rgba(0,0,0,0.15);
        }
        
        .card-text {
            max-height: 100px;
            overflow: hidden;
            text-overflow: ellipsis;
            display: -webkit-box;
            -webkit-line-clamp: 3;
            -webkit-box-orient: vertical;
        }
        
        .method-badge {
            font-weight: bold;
            border-radius: 0.5rem;
        }
        
        .btn-outline-primary {
            border-radius: 0.5rem;
            border: 2px solid var(--primary-color);
            color: var(--primary-color);
        }
        
        .btn-outline-primary:hover {
            background-color: var(--primary-color);
            color: white;
        }
        
        .footer {
            background-color: var(--dark-color);
            color: white;
            padding: 2rem 0;
        }
        
        .api-icon {
            font-size: 2rem;
            color: var(--accent-color);
            margin-bottom: 1rem;
        }
        
        .stats-card {
            background: white;
            border-radius: 1rem;
            box-shadow: 0 4px 6px rgba(0,0,0,0.1);
            padding: 1.5rem;
            text-align: center;
            transition: transform 0.3s ease;
        }
        
        .stats-card:hover {
            transform: translateY(-5px);
        }
        
        .stats-number {
            font-size: 2rem;
            font-weight: bold;
            color: var(--primary-color);
        }
        
        .feature-icon {
            width: 60px;
            height: 60px;
            background: linear-gradient(135deg, var(--primary-color), var(--accent-color));
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 1rem;
            color: white;
            font-size: 1.5rem;
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark sticky-top" style="background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));">
        <div class="container">
            <a class="navbar-brand d-flex align-items-center" href="/">
                <i class="bi bi-lightning-charge fs-3 me-2"></i>
                <span class="fw-bold">快点API</span>
            </a>
            <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item mx-2">
                        <a class="nav-link" href="#">首页</a>
                    </li>
                    <!-- <li class="nav-item mx-2">
                        <a class="nav-link" href="#">API文档</a>
                    </li> -->
                    <!-- <li class="nav-item mx-2">
                        <a class="nav-link" href="#">价格</a>
                    </li> -->
                    <li class="nav-item mx-2">
                        <a class="nav-link" href="#footer-about">关于</a>
                    </li>
                    <!-- <li class="nav-item ms-2">
                        <a class="btn btn-outline-light btn-sm" href="#">登录</a>
                    </li> -->
                </ul>
            </div>
        </div>
    </nav>

    <div class="hero-section">
        <div class="container text-center">
            <h1 class="display-4 fw-bold mb-3">专业API接口服务平台</h1>
            <p class="lead mb-4">提供稳定可靠的接口服务，助力开发者快速构建应用</p>
            <!-- <div class="d-flex justify-content-center gap-3">
                <button class="btn btn-light btn-lg px-4">开始使用</button>
                <button class="btn btn-outline-light btn-lg px-4">查看文档</button>
            </div> -->
        </div>
    </div>

    <div class="container">
        <div class="row mb-5">
            <div class="col-md-4 mb-4">
                <div class="stats-card">
                    <div class="feature-icon">
                        <i class="bi bi-rocket"></i>
                    </div>
                    <div class="stats-number" id="api-count">0</div>
                    <p class="mb-0">可用API接口</p>
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <div class="stats-card">
                    <div class="feature-icon">
                        <i class="bi bi-lightning"></i>
                    </div>
                    <div class="stats-number">100K+</div>
                    <p class="mb-0">日调用次数</p>
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <div class="stats-card">
                    <div class="feature-icon">
                        <i class="bi bi-shield-check"></i>
                    </div>
                    <div class="stats-number">99.9%</div>
                    <p class="mb-0">服务可用性</p>
                </div>
            </div>
        </div>

        <div class="row mb-4">
            <div class="col-lg-8">
                <h2 class="mb-3">API接口列表</h2>
                <p class="text-muted">提供各类实用API接口服务，支持多种应用场景</p>
            </div>
            <div class="col-lg-4 d-flex align-items-end justify-content-lg-end">
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="搜索API..." id="search-api">
                    <button class="btn btn-outline-primary" type="button">
                        <i class="bi bi-search"></i>
                    </button>
                </div>
            </div>
        </div>

        <div class="row" id="api-container">
            <?php
            // 读取API信息JSON文件
            $jsonFile = 'api_info.json';
            $jsonContent = file_get_contents($jsonFile);
            $apiData = json_decode($jsonContent, true);
            $apis = $apiData['apis'] ?? [];
            
            // 输出API卡片
            foreach ($apis as $api) {
                $apiId = 'api-' . md5($api['path']);
                // Replace match expression with compatible array lookup
                $methodMap = [
                    'GET' => 'bg-success',
                    'POST' => 'bg-primary',
                    'PUT' => 'bg-warning',
                    'DELETE' => 'bg-danger'
                ];
                $methodClass = $methodMap[strtoupper($api['method'])] ?? 'bg-secondary';
                // 获取当前网站URL组件
                $scheme = $_SERVER['REQUEST_SCHEME'] ?? 'http';
                $host = $_SERVER['HTTP_HOST'] ?? '';
                $fullUrl = $scheme . '://' . $host . $api['path'];
                
                // 读取调用次数
                $relativePath = ltrim($api['path'], '/');
                $counterFile = dirname($relativePath) . '/counter.dat';
                $callCount = 0;
                if (file_exists($counterFile)) {
                    $callCount = (int)trim(file_get_contents($counterFile));
                }
            ?>
                <div class="col-md-6 col-lg-4 mb-4">
                    <div class="card h-100 api-card shadow-sm">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-start mb-3">
                                <h5 class="card-title mb-0"><?php echo htmlspecialchars($api['name']); ?></h5>
                                <span class="badge <?php echo $methodClass; ?> method-badge"><?php echo htmlspecialchars($api['method']); ?></span>
                            </div>
                            <p class="text-muted mb-2">
                                <small><i class="bi bi-link-45deg"></i> <?php echo htmlspecialchars($fullUrl);  ?></small>
                            </p>
                            <p class="text-muted mb-2">
                                <small><i class="bi bi-eye"></i> 调用次数: <?php echo $callCount; ?></small>
                            </p>
                            
                            <div class="mt-3">
                                <h6 class="card-subtitle mb-2 text-muted">接口描述</h6>
                                <p class="card-text"><?php echo htmlspecialchars($api['description']); ?></p>
                                
                                <?php if (!empty($api['params'])): ?>
                                <button class="btn btn-sm btn-outline-primary mb-2" type="button" data-bs-toggle="collapse" data-bs-target="#<?php echo $apiId; ?>-details" aria-expanded="false" aria-controls="<?php echo $apiId; ?>-details">
                                    查看请求参数
                                </button>
                                <?php endif; ?>
                                
                                <div class="collapse" id="<?php echo $apiId; ?>-details">
                                    <?php if (!empty($api['params'])): ?>
                                    <div class="mt-3">
                                        <h6 class="card-subtitle mb-2 text-muted">请求参数</h6>
                                        <ul class="list-group list-group-flush">
                                            <?php foreach ($api['params'] as $param): ?>
                                            <li class="list-group-item p-3">
                                                <div class="d-flex justify-content-between align-items-start">
                                                    <code><?php echo htmlspecialchars($param['name']); ?></code>
                                                    <span class="badge <?php echo $param['required'] ? 'bg-danger' : 'bg-secondary'; ?>">
                                                        <?php echo $param['required'] ? '必填' : '可选'; ?>
                                                    </span>
                                                </div>
                                                <div class="mt-1 text-muted small">
                                                    <strong>类型:</strong> <?php echo htmlspecialchars($param['type']); ?>
                                                </div>
                                                <?php if (!empty($param['description'])): ?>
                                                <div class="mt-1 text-sm">
                                                    <strong>描述:</strong> <?php echo htmlspecialchars($param['description']); ?>
                                                </div>
                                                <?php endif; ?>
                                            </li>
                                            <?php endforeach; ?>
                                        </ul>
                                    </div>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer bg-transparent d-flex justify-content-between">
                            <small class="text-muted">
                                <i class="bi bi-box-arrow-up-right"></i>
                                <a href="<?php echo htmlspecialchars($api['path']); ?>" target="_blank" class="text-decoration-none">访问接口</a>
                            </small>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>

    <footer class="footer mt-5">
        <div class="container">
            <div class="row">
                <div class="col-md-4 mb-4" id="footer-about">
                    <h5 class="text-white mb-3">关于我们</h5>
                    <p class="text-light">专业API接口服务平台，提供稳定可靠的接口服务，助力开发者快速构建应用。</p>
                    <div class="text-light">
                        <div>© <?php echo date('Y'); ?> 快点API</div>
                    </div>
                </div>
                <div class="col-md-4 mb-4">
                    <h5 class="text-white mb-3">快速链接</h5>
                    <ul class="list-unstyled">
                        <li class="mb-2"><a href="#" class="text-light text-decoration-none">API文档</a></li>
                        <li class="mb-2"><a href="#" class="text-light text-decoration-none">使用教程</a></li>
                        <li class="mb-2"><a href="#" class="text-light text-decoration-none">价格方案</a></li>
                        <li class="mb-2"><a href="#" class="text-light text-decoration-none">联系我们</a></li>
                    </ul>
                </div>
                <div class="col-md-4 mb-4">
                    <h5 class="text-white mb-3">联系方式</h5>
                    <ul class="list-unstyled text-light">
                        <li class="mb-2"><i class="bi bi-envelope me-2"></i> admin@huangetech.com</li>
                    </ul>
                </div>
            </div>
        </div>
    </footer>

    <!-- Bootstrap 5 JS -->
    <script src="https://gcore.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // 更新API计数
        document.addEventListener('DOMContentLoaded', function() {
            const apiCount = document.querySelectorAll('.api-card').length;
            document.getElementById('api-count').textContent = apiCount;

            // 添加搜索功能
            const searchInput = document.getElementById('search-api');
            const apiCards = document.querySelectorAll('.api-card');
            
            searchInput.addEventListener('input', function() {
                const searchTerm = this.value.toLowerCase();
                
                apiCards.forEach(card => {
                    const apiName = card.querySelector('.card-title').textContent.toLowerCase();
                    const apiDescription = card.querySelector('.card-text').textContent.toLowerCase();
                    const apiUrl = card.querySelector('.text-muted small').textContent.toLowerCase();
                    
                    if (apiName.includes(searchTerm) || apiDescription.includes(searchTerm) || apiUrl.includes(searchTerm)) {
                        card.closest('.col-md-6').style.display = '';
                    } else {
                        card.closest('.col-md-6').style.display = 'none';
                    }
                });
            });
        });
    </script>
</body>
</html>