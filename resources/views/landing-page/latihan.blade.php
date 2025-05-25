<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="en" xml:lang="en">

<head>
    <meta content="text/html; charset=UTF-8" http-equiv="Content-Type" />
    <meta content="width=device-width, initial-scale=1" name="viewport" />
    <meta content="IE=edge" http-equiv="X-UA-Compatible" />
    <title>Access to the edalevbang / Dashboard Bekasi project was granted</title>
    <style data-premailer="ignore" type="text/css">
        body,
        table,
        td,
        a {
            -webkit-text-size-adjust: 100%;
            -ms-text-size-adjust: 100%
        }

        table,
        td {
            mso-table-lspace: 0pt;
            mso-table-rspace: 0pt
        }

        img {
            -ms-interpolation-mode: bicubic
        }

        .hidden {
            display: none !important;
            visibility: hidden !important
        }

        a[x-apple-data-detectors] {
            color: inherit !important;
            text-decoration: none !important;
            font-size: inherit !important;
            font-family: inherit !important;
            font-weight: inherit !important;
            line-height: inherit !important
        }

        div[style*="margin: 16px 0"] {
            margin: 0 !important
        }

        @media only screen and (max-width: 639px) {

            body,
            #body {
                min-width: 320px !important
            }

            table.wrapper {
                width: 100% !important;
                min-width: 320px !important
            }

            table.wrapper td.wrapper-cell {
                border-left: 0 !important;
                border-right: 0 !important;
                border-radius: 0 !important;
                padding-left: 10px !important;
                padding-right: 10px !important
            }
        }
    </style>

    <style>
        body {
            margin: 0 !important;
            background-color: rgb(241, 241, 241);
            padding: 0;
            text-align: center;
            min-width: 640px;
            width: 100%;
            height: 100%;
            font-family: "Helvetica Neue", Helvetica, Arial, sans-serif;
        }
    </style>
</head>

<body style="justify-content: center; min-width: 640px; width: 100%; height: auto; margin: 0; padding: 0;">
    <table border="0" cellpadding="0" cellspacing="0" id="body" style="text-align: center; min-width: 640px; width: 100%; margin: 0; padding: 0;">
        <tbody>
            <tr>
                <td style="">
                    <table border="0" cellpadding="0" cellspacing="0" class="wrapper" style="width: 480px; border-collapse: separate; border-spacing: 0; margin: 0 auto;">
                        <tbody>
                            <tr>
                                <td class="wrapper-cell" style=" border-radius: 3px; overflow: hidden; padding: 18px 25px; border: 1px solid #ededed;" align="left" bgcolor="#fff">
                                    <table border="0" cellpadding="0" cellspacing="0" class="content" style="width: 100%; border-collapse: separate; border-spacing: 0;">
                                        <tbody>
                                            <tr>
                                                <td class="text-content" style=" color: #333; font-size: 15px; font-weight: 400; line-height: 1.4; padding: 15px 5px;" align="center">
                                                    <h2>Halo {{ $pesan->namalengkap }},</h2>

                                                    <p>Terima kasih telah melakukan pemesanan layanan kami.</p>

                                                    <p>Berikut adalah detail pemesanan Anda:</p>

                                                    <table style="text-align: left;">
                                                        <tr>
                                                            <td><strong>Nama Lengkap</strong></td>
                                                            <td><strong>:</strong></td>
                                                            <td>{{ $pesan->namalengkap }}</td>
                                                        </tr>
                                                        <tr>
                                                            <td><strong>Tanggal Pemesanan</strong></td>
                                                            <td><strong>:</strong></td>
                                                            <td>{{ \Carbon\Carbon::parse($pesan->tanggal)->format('d M Y') }}</td>
                                                        </tr>
                                                        <tr>
                                                            <td><strong>Kode Pembatalan</strong></td>
                                                            <td><strong>:</strong></td>
                                                            <td><span style="font-family: monospace; background-color: #eee; padding: 2px 6px;">{{ $pesan->kode }}</span></td>
                                                        </tr>
                                                    </table>


                                                    <p>Jika Anda ingin membatalkan pemesanan, silakan gunakan kode di atas melalui halaman pembatalan kami.</p>

                                                    <p>Salam hangat, <br>Tim Layanan Kami</p>
                                                    <img class="w-auto h-5 lg:h-10 md:h-7 sm:h-6" src="https://cdn.rareblocks.xyz/collection/celebration/images/logo.svg" alt="" />
                                                </td>
                                            </tr>

                                        </tbody>
                                    </table>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </td>
            </tr>


            <!-- <tr class="footer">
                <td style=" font-size: 13px; line-height: 1.6; color: #5c5c5c; padding: 25px 0;">
                    <img alt="GitLab" class="footer-logo" src="https://git.gi.co.id/assets/mailers/gitlab_logo_black_text-5430ca955baf2bbce6d3aa856a025da70ac5c9595597537254f665c10beab7a5.png" style="display: block; width: 90px; margin: 0 auto 1em;" />
                    <div>
                        You're receiving this email because of your account on <a target="_blank" rel="noopener noreferrer" href="https://git.gi.co.id" style="color: #3777b0; text-decoration: none;">git.gi.co.id</a>. <a href="https://git.gi.co.id/-/profile/notifications" target="_blank" rel="noopener noreferrer" class="mng-notif-link" style="color: #3777b0; text-decoration: none;">Manage all notifications</a> &#183; <a href="https://git.gi.co.id/help" target="_blank" rel="noopener noreferrer" class="help-link" style="color: #3777b0; text-decoration: none;">Help</a>
                    </div>
                </td>
            </tr>


            <tr>
                <td class="footer-message" style=" font-size: 13px; line-height: 1.6; color: #5c5c5c; padding: 25px 0;"></td>
            </tr> -->
        </tbody>
    </table>
</body>

</html>