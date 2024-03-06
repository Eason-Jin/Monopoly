<!doctype html>
<html lang="en">
<head>
    <title>{{ $item->title }}</title>
    @vite('resources/css/app.css')
</head>
<body>
<div>
    <div>
        {!! $item->renderBlocks() !!}
    </div>
</div>
</body>
</html>
