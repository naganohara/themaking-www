<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="/favicon.ico">

    <title>日科⑨课 日本科学技术视频导航</title>

    <link href="/css/app.css" rel="stylesheet">
    <link rel="stylesheet" href="/css/font-awesome.min.css">
    <style>
    </style>
</head>

<body>

<div class="container">

    <div class="row">
        <h1>日科⑨课
            <small>科普视频导航</small>
        </h1>
        <hr>
        <p>
            @if ($auth->check)
                <img src="{{ $auth->user->avatar }}">
                {{ $auth->user->name }}
            @else
                <a role="button" class="btn btn-default btn-lg"
                   href="/login/qq">
                    <i class="fa fa-qq" aria-hidden="true"></i> QQ 登录
                </a>
            @endif
        </p>
    </div>

    <div class="row">
        <h2>《日本科学技术》系列视频</h2>
        <table class="table table-striped">
            <thead>
            <tr>
                <th>EP</th>
                <th>片名</th>
                <th>Bilibili</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <th scope="row">233</th>
                <td>蒲烧鳗鱼的制作流程</td>
                <td><a href="https://www.bilibili.com/video/av1549616">av1549616</a></td>
            </tr>
            <tr>
                <th scope="row">55</th>
                <td>薯片的制作流程</td>
                <td><a href="https://www.bilibili.com/video/av1742870">av1742870</a></td>
            </tr>
            <tr>
                <td colspan="3">（添加整理中）</td>
            </tr>
            </tbody>
        </table>
    </div>

</div>

<footer>
    <div class="container">
        <hr>
        <p>日科9课视频导航站 2014 - 2017</p>
        <p>本站不提供任何视听上传服务，所有视频内容均为至其他视频网站的链接。</p>
    </div>
</footer>


<script src="/js/app.js"></script>

</body>
</html>
