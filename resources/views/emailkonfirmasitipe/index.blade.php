<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Informasi Publik ITS</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
<link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
<style type="text/css">
    html, body {
        background-color: #fff;
        color: #000;
        font-family: 'Montserrat', sans-serif;
        font-weight: 100;
        height: 100vh;
        margin: 0;
    }
</style>
</head>
{{-- <body style="margin: 0; padding: 0; background-image:url({{ URL::asset('bg.png') }}); background-repeat: repeat;background-size: 100%"> --}}
<body style="margin: 0; padding: 0;">
    <table align="center" border="0" cellpadding="0" cellspacing="0" width="600" style="border-collapse: collapse;">
        <tr>
            <td align="center" style="padding: 40px 0 30px 0;background-color: rgba(32,65,127,0.7); border-bottom: 4px solid #20417f">
                <h1 style="color: white">INFORMASI PUBLIK ITS</h1>
            </td>
        </tr>
        <tr>
            <td style="padding: 40px 30px 40px 30px;">
             <table border="0" cellpadding="0" cellspacing="0" width="100%">
             <tr>
              <td style="padding: 20px 0 30px 0;">
                <p>{{$data['pertanyaan']->judul_pertanyaan}}</p>
              </td>
             </tr>
             <tr>
              <td>
               <h3>Jenis dari tipe pertanyaan adalah <b>{{urldecode($data['pertanyaan']->tipe)}}</b></h3>
              </td>
             </tr>
             <tr>
              <td style="padding: 20px 0 30px 0;">
                {!!html_entity_decode($data['pertanyaan']->notes)!!}
              </td>
             </tr>
            </table>
            </td>
        </tr>
        <tr>
            <td bgcolor="#ffcb10" style="padding: 30px 30px 30px 30px;">
             <table border="0" cellpadding="0" cellspacing="0" width="100%">
             <tr>
                <td width="75%" style="text-align: right;" >
                 <b style="color: #20417f">&reg; Informasi Publik ITS, 2017</b><br/>
                </td>
             </tr>
            </table>
            </td>
        </tr>
    </table>
</body>
</html>