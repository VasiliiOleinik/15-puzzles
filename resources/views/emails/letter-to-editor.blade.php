<!DOCTYPE html>
<html>
<head>
<title>Letter to editor</title>
</head>

<body>
    <h1>from:</h1>
    {{ $email }}

    <h1>Phone:</h1>
    @if($phone != null)      
    {{ $phone }}
    @else          
        not specified
    @endif

    <h1>Name:</h1>
    @if($name != null)      
    {{ $name }}
    @else          
        not specified
    @endif

    <h1>Letter:</h1>
    {{ $letter }}
</body>

</html>
