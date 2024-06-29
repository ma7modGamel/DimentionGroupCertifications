<html>

<head>

<title></title>
<style>
    .text-center {
        width: 200px;
        height: 300px;
        transform: translate(280%, 20%);
        vertical-align: middle;
      }
    </style>
</head>

<body>

<div class="d-print-block text-center">
<h1>QR Code For {{$student_name}}</h1>
{!! QrCode::size(250)->merge('https://certificate.dimensionsgroup.sa/admin/assets/images/logo/logo.png', 0, true)->generate("https://certificate.dimensionsgroup.sa/certificates/download?student_name=$student_name&view=true"); !!}
</div>

</body>

</html>