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
    <style>
        .api-card {
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }
        .api-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 20px rgba(0,0,0,0.1);
        }
        .method-badge {
            font-size: 0.8rem;
            padding: 0.3rem 0.6rem;
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary mb-4">
        <div class="container">
            <a class="navbar-brand" href="/">快点API</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <!-- <li class="nav-item">
                        <a class="nav-link" href="#">文档</a>
                    </li> -->
                    <li class="nav-item">
                        <a class="nav-link" href="#footer-about">关于</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container">
        <div class="row mb-4">
            <div class="col-lg-8">
                <h1 class="mb-3">API接口列表</h1>
                <p class="text-muted">提供各类实用API接口服务，支持多种应用场景</p>
            </div>
            <div class="col-lg-4 d-flex align-items-end justify-content-lg-end">
                <div class="badge bg-secondary">
                    共 <span id="api-count">0</span> 个API接口
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
                            
                            <button class="btn btn-sm btn-outline-secondary mt-2" type="button" data-bs-toggle="collapse" data-bs-target="#<?php echo $apiId; ?>" aria-expanded="false">
                                查看描述
                            </button>
                            
                            <div class="collapse mt-3" id="<?php echo $apiId; ?>">
                                <div class="card card-body p-3 bg-light">
                                    <h6 class="card-subtitle mb-2 text-muted">接口描述</h6>
                                    <p class="card-text"><?php echo htmlspecialchars($api['description']); ?></p>
                                     
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

    <footer class="bg-light py-4 mt-5">
        <div class="container">
            <div class="row">
                <div class="col-md-4 mb-4" id="footer-about">

                    <h5 class="text-primary">关于我们</h5>
                    <p class="text-muted small">专业API接口服务平台，提供稳定可靠的接口服务</p>
                    <div class="text-muted small">
                        <div>© <?php echo date('Y'); ?> 快点API</div>
                    </div>
                </div>
                <!-- <div class="col-md-4 mb-4">
                    <h5 class="text-primary">服务支持</h5>
                    <ul class="list-unstyled small">
                        <li><a href="/service" class="text-muted text-decoration-none">服务条款</a></li>
                        <li><a href="/privacy" class="text-muted text-decoration-none">隐私政策</a></li>
                        <li><a href="/contact" class="text-muted text-decoration-none">联系我们</a></li>
                    </ul>
                </div>
                <div class="col-md-4 mb-4">
                    <h5 class="text-primary">合作伙伴</h5>
                    <ul class="list-unstyled small">
                        <li><a href="https://beian.miit.gov.cn" class="text-muted text-decoration-none" target="_blank">工信部备案查询</a></li>
                        <li><a href="https://www.aliyun.com" class="text-muted text-decoration-none" target="_blank">阿里云</a></li>
                        <li><a href="https://cloud.tencent.com" class="text-muted text-decoration-none" target="_blank">腾讯云</a></li>
                    </ul>
                </div> -->
            </div>
            <div class="text-center text-muted small mt-4" >
                本站API接口数据来源于公开网络，仅用于技术研究用途
            </div>
        </div>
    </footer>

    <!-- Bootstrap 5 JS Bundle with Popper -->
    <script src="https://gcore.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://gcore.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">
    <script>
        // 设置API数量
        document.addEventListener('DOMContentLoaded', function() {
            const apiCount = <?php echo count($apis); ?>;
            document.getElementById('api-count').textContent = apiCount;
        });
    </script>
</body>
</html>