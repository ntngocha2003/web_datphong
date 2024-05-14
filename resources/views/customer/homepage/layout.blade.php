<!DOCTYPE html>
<html>

<head>
    @include('customer.homepage.component.head')
</head>

<body>
    <div class="app">
        <!-- phần đầu -->
        @include('customer.homepage.component.header')       
        
        <!-- phần nội dung -->
        @include($template)       
        <!-- phần cuối -->
        @include('customer.homepage.component.footer')        
    
    </div>
</body>
</html>