@php
print_r($LabelprintingData);
@endphp

<!DOCTYPE html>
<html>
<head>
    <title>Label Print</title>
</head>
<body>
    <h1>Label Printing Data</h1>
            @foreach($LabelprintingData as $item)
                <h3>{{ $item->prefix}} {{ $item->name}}</h3>
                <p>{{ $item->address}}</p>
                <p>{{ $item->local_area}}</p>
                <p>{{ $item->city}}</p>
                <p>{{ $item->district}}</p>
                <p>{{ $item->state}}, {{ $item->zip_code}}</p>
            @endforeach


   
</body>
</html>
