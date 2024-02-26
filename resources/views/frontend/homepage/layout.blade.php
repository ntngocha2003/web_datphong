<!DOCTYPE html>
<html>

<head>
    @include('frontend.homepage.component.head')
</head>

<body>
    <div class="app">
        <!-- phần đầu -->
        @include('frontend.homepage.component.header')       
        
        <!-- phần nội dung -->
        @include($template)       
        <!-- phần cuối -->
        @include('frontend.homepage.component.footer')        
    
    </div>
</body>
</html>