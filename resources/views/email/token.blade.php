<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Company Name</title>
</head>
<body bgcolor="#0f3462" style="margin-top:20px;margin-bottom:20px">
    {{-- <ul>
        <li>TOKEN : {{ $token->token }}</li>
        <li>LINK FORMULIR PENDAFTARAN : {</li>
        <li>EMAIL TERDAFTAR : {{ $token->email }}</li>
        <li>ANGKATAN  {{ $token->angkatan }} / {{ $token->angkatan+1 }}</li>
        <li>GELOMBANG  {{ $token->gelombang}}</li>
    </ul> --}}
  <table border="0" align="center" cellspacing="0" cellpadding="0" bgcolor="white" width="650">
    <tr>
      <td>
        <!-- Child table -->
        <table border="0" cellspacing="0" cellpadding="0" style="color:#0f3462; font-family: sans-serif;">
          <tr>
            <td>
              <h2 style="text-align:center; margin: 0px; padding-bottom: 25px; margin-top: 25px;">
                <i>UNIVERSITAS </i><span style="color:rgb(231, 17, 231)">POHUWATO</span></h2>
            </td>
          </tr>
          <tr>
            <td>
              <img src="http://unipo.niagalancer.com/media/other/logoone.png" height="50px" style="display:block; margin:auto;padding-bottom: 25px; ">
            </td>
          </tr>
          <tr>
            <td style="text-align: center;">
              <h1 style="margin: 0px;padding-bottom: 25px; text-transform: uppercase;">{{ $token->token }}</h1>
              <h2 style="margin: 0px;padding-bottom: 25px;font-size:22px;"> Please renew your subscription</h2>
              <p style=" margin: 0px 40px;padding-bottom: 25px;line-height: 2; font-size: 15px;">Click any item in your email to open
                setting pannel on the right. You can change background colour, padding
                and set position of the text and image.
              </p>
              <p style=" margin: 0px 32px;padding-bottom: 25px;line-height: 2; font-size: 15px;">To edit this text, change
                text alignment and add links, double click to get into text edit mode. To change fonts, Use Default
                fonts from the design tab on the right.
              </p>
              <h2 style="margin: 0px; padding-bottom: 25px;">Expire: 05 November</h2>
            </td>
          </tr>
          <tr>
            <td>
              <a href="{{ url('/validation') }}" style="background-color:#36b445; color:white; padding:15px 97px; outline: none; display: block; margin: auto; border-radius: 31px;
                                font-weight: bold; margin-top: 25px; margin-bottom: 25px; border: none; text-transform:uppercase; ">LINK FORMULIR PENDAFTARAN</a>
            </td>
          </tr>
          <tr>
            <td style="text-align:center;">
              <h2 style="padding-top: 25px; line-height: 1; margin:0px;">Need Help?</h2>
              <div style="margin-bottom: 25px; font-size: 15px;margin-top:7px;">Give us a Missed call Sample-1800
              </div>
            </td>
          </tr>
        </table>
        <!-- /Child table -->
      </td>
    </tr>
  </table>
  <!-- / Main table -->
</body>
</html>
