<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>E-mails</title>
    <style>
    .footer {
        background: #12b3e9;
    }

    .text-footer {
        color: #fff;
        font-size: 12px;
        line-height: 16px;
        font-family: 'Arial';
        padding: 10px;
    }

    td.line {
        background: #efefef;
        color: #444444;
        font-size: 14px;
        padding: 5px;
        font-family: Arial;
    }

    td.line_two {
        background: #FFF;
        color: #444444;
        font-size: 14px;
        padding: 5px;
        font-family: Arial;
    }

    .title {
        color: #d03682;
        font-size: 18px;
        font-weight: 100;
        font-family: 'Arial';
    }

    .text {
        color: #444;
        font-size: 15px;
        font-weight: 100;
        font-family: 'Arial';
    }
    </style>
</head>

<body>
    <table width="600" cellpadding="0" cellspacing="0" border="0">
        <tr class="header" style="border-bottom:3px solid #d03682;">
            <td style="text-align:center" align="center"><br />
                <a href="{{ url('/') }}" target="_blank" title="CTRL+D">
                    <img src="{{ asset('assets/images/logo-ctrld.png')}}" alt="CTRL+D"
                        style="display:block; border:none; background:#d03682; color:#fff; margin:0 auto;" />
                </a><br />
            </td>
        </tr>
        <tr>
            <td>
                @yield('content')
            </td>
        </tr>
        <tr class="footer">
            <td>
                <table width="100%" border="0" cellpadding="0" cellspacing="0">
                    <tr>
                        <td class="text-footer">{{ __('informacoes.tag_email') }}</td>
                        <td class="text-footer">{{ __('informacoes.tag_phone') }}</td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
</body>

</html>