<?php
// 预设的前缀字符串（可修改为您需要的固定前缀）
$prefix = "https://jx.xmflv.com/?url=";

// 处理表单提交
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // 获取用户输入的原始网址
    $originalUrl = trim($_POST['url']);
    
    // 验证URL格式
    if (!filter_var($originalUrl, FILTER_VALIDATE_URL)) {
        $error = "请输入有效的网址（如：https://example.com）";
    } else {
        // 拼接新网址（URL编码确保特殊字符正确处理）
        $newUrl = $prefix . urlencode($originalUrl);
    }
}
?>

<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>网址拼接工具</title>
    <style>
        * {
            box-sizing: border-box;
            font-family: 'Segoe UI', Tahoma, sans-serif;
        }
        body {
            background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%);
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            margin: 0;
            padding: 20px;
        }
        .container {
            background: white;
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.1);
            width: 100%;
            max-width: 600px;
            padding: 30px;
        }
        h1 {
            color: #3498db;
            text-align: center;
            margin-top: 0;
        }
        .input-group {
            margin-bottom: 25px;
        }
        label {
            display: block;
            margin-bottom: 8px;
            color: #2c3e50;
            font-weight: 500;
        }
        input[type="url"] {
            width: 100%;
            padding: 14px;
            border: 2px solid #ddd;
            border-radius: 8px;
            font-size: 16px;
            transition: border-color 0.3s;
        }
        input[type="url"]:focus {
            border-color: #3498db;
            outline: none;
            box-shadow: 0 0 0 3px rgba(52, 152, 219, 0.2);
        }
        button {
            background: #3498db;
            color: white;
            border: none;
            border-radius: 8px;
            padding: 14px 20px;
            font-size: 16px;
            cursor: pointer;
            width: 100%;
            font-weight: 600;
            transition: background 0.3s;
        }
        button:hover {
            background: #2980b9;
        }
        .result-box {
            margin-top: 30px;
            background: #f8f9fa;
            border-radius: 8px;
            padding: 20px;
            border-left: 4px solid #3498db;
        }
        .result-label {
            font-weight: 600;
            color: #2c3e50;
            margin-bottom: 10px;
        }
        #resultUrl {
            word-break: break-all;
            color: #27ae60;
            font-weight: 500;
        }
        .error {
            color: #e74c3c;
            background: #fdecea;
            padding: 10px;
            border-radius: 5px;
            margin: 15px 0;
            border-left: 3px solid #e74c3c;
        }
        .info {
            font-size: 14px;
            color: #7f8c8d;
            margin-top: 5px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>网址拼接工具</h1>
        
        <form method="POST">
            <div class="input-group">
                <label for="url">输入原始网址：</label>
                <input type="url" id="url" name="url" 
                       placeholder="https://example.com" 
                       value="<?php echo isset($originalUrl) ? htmlspecialchars($originalUrl) : '' ?>"
                       required>
                <div class="info">请确保网址包含协议头（如http://或https://）</div>
            </div>
            
            <?php if (isset($error)): ?>
                <div class="error"><?php echo $error; ?></div>
            <?php endif; ?>
            
            <button type="submit">生成新网址</button>
        </form>
        
        <?php if (isset($newUrl)): ?>
            <div class="result-box">
                <div class="result-label">生成的新网址：</div>
                <div id="resultUrl"><?php echo htmlspecialchars($newUrl); ?></div>
                <div style="margin-top: 15px;">
                    <button onclick="copyToClipboard()">复制到剪贴板</button>
                    <a href="<?php echo $newUrl; ?>" target="_blank" style="text-decoration: none;">
                        <button style="background: #2ecc71; margin-top: 10px;">访问新网址</button>
                    </a>
                </div>
            </div>
        <?php endif; ?>
    </div>
    
    <script>
        function copyToClipboard() {
            const text = document.getElementById('resultUrl').innerText;
            navigator.clipboard.writeText(text)
                .then(() => {
                    alert('网址已复制到剪贴板！');
                })
                .catch(err => {
                    console.error('复制失败:', err);
                    alert('复制失败，请手动复制网址');
                });
        }
    </script>
</body>
</html>