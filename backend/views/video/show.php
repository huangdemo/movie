<!DOCTYPE html>
<html lang="en">
<head>
    <title>hivideo</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/video/assets/hivideo.css" />
    <script type="text/javascript" src="/video/hivideo.js"></script>
    <style type="text/css">
        .main-wrap{
            margin: 0 auto;
            min-width: 320px;
            max-width: 640px;
        }

        .main-wrap video{
            width: 100%;
        }
    </style>
</head>
<body>
    <div class="main-wrap">
        <video ishivideo="true" autoplay="true" isrotate="false" autoHide="true">
            <source src="<?=$urls['video_url']?>" type="video/mp4">
        </video>
    </div>
</body>
</html>
