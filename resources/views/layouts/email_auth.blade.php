<!DOCTYPE html>
<html dir="{{ transs("ltr","rtl") }}">
<head>
    <title></title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Tajawal:wght@200;300;400;500;700;800;900&display=swap');
        html,body { padding: 0; margin:0; font-family: 'Tajawal', sans-serif !important; }
        * { font-family: 'Tajawal', sans-serif !important; }

    </style>

</head>
<body dir="rtl">

    <div dir="rtl" style=" direction:{{ transs("ltr","rtl") }};font-family:Arial,Helvetica,sans-serif; line-height: 1.5; font-weight: normal; font-size: 15px; color: #2F3044; min-height: 100%; margin:0; padding:0; width:100%; background-color:#edf2f7">
        <table align="center" border="0" cellpadding="0" cellspacing="0" width="100%" style="border-collapse:collapse;margin:0 auto; padding:0; max-width:600px">
            <tbody>
                <tr>
                    <td align="center" valign="center" style="text-align:center; padding: 40px">
                        <a href="{{ request()->root() }}" rel="noopener" target="_blank">
                            <img alt="Logo" src="{{ request()->root() }}/_files/media/logo-dark.png" style="height: 60px" />
                        </a>
                    </td>
                </tr>
                <tr>
                    <td align="left" valign="center">

                        @isset($slot)
                            {{ $slot }}
                        @endisset

                        @yield('content')
                    </td>
                </tr>
            </tbody>
        </table>
    </div>

</body>
</html>
