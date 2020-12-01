<table role="presentation" width="100%" cellspacing="0" cellpadding="0" border="0" align="center">
    <tbody>
    <tr>
        <td style="padding-top:10px;background-color:#e6e6e6" width="100%" valign="top" bgcolor="#E6E6E6">
            <table role="presentation" style="margin:0 auto;width:600px"
                   width="600" cellspacing="0" cellpadding="0" border="0" bgcolor="#E6E6E6" align="center">
                <tbody>
                <tr height="24">
                    <td></td>
                </tr>
                <tr>
                    <td align="center">
                        <a href="#">
                            <img src="{{asset('img/logo.png')}}" width="150" border="0">
                        </a>
                    </td>
                </tr>
                <tr height="24">
                    <td></td>
                </tr>
                </tbody>
            </table>
            <table style="margin:0 auto;width:600px" width="600" cellspacing="0" cellpadding="0" border="0"
                   bgcolor="#eeeeed" align="center">
                <tbody>
                <tr>
                    <td style="padding:0" valign="top" bgcolor="#ffffff">
                        <a href="#">
                            <img
                                src="{{asset('img/banner/video.png')}}" style="display:block;width:600px" width="600"
                                border="0">
                        </a>
                    </td>
                </tr>
                </tbody>
            </table>
            <table style="margin:0 auto;width:600px"
                   width="600" cellspacing="0" cellpadding="0" border="0" bgcolor="#FFFFFF" align="center">
                <tbody>
                <tr>
                    <td style="font-size:16px;line-height:20px;color:#000000;font-weight:bold;text-align:justify;font-family:Arial,'Helvetica Neue',Helvetica,sans-serif;vertical-align:top;padding:15px 50px 10px 50px;margin:0">
                        Visit toba adalah sebuah aplikasi berbasis website yang menyediakan berbagai informasi mengenai
                        Danau toba beserta 7 kabpupaten yang mengelilinginya. Aplikasi ini menyediakan informasi seputar
                        paket wisata di kawasan danau toba, informasi event atau acara, dan informasi tentang Comunity
                        Based Tourism. Aplikasi ini juga ikut serta dalam memanejemen keanggotaan Comunity Based
                        Tourism. Sehingga para pelaku/ pemilik layanan wisata bisa ikut serta berinteraksi dengan
                        pelaku/pemilik layanan wisata di daerah-daerah lain.
                    </td>
                </tr>
                </tbody>
            </table>
            @if($paket->status==1)
                <table style="margin:0 auto;width:600px"
                       width="600" cellspacing="0" cellpadding="0" border="0" bgcolor="#FFFFFF" align="center">
                    <tbody>
                    <tr>
                        <td style="font-size:22px;line-height:26px;color:#000000;font-weight:normal;text-align:left;font-family:Arial,'Helvetica Neue',Helvetica,sans-serif;vertical-align:top;padding:15px 30px 5px 30px;margin:0">
                            <hr>
                            {{$paket->nama_paket}} (Rp. {{number_format($paket->harga_paket)}}/orang)
                            <hr>
                        </td>

                    </tr>
                    </tbody>
                </table>
                <table style="margin:0 auto;width:600px"
                       width="600" cellspacing="0" cellpadding="0" border="0" bgcolor="#FFFFFF" align="center">
                    <tbody>

                    <tr>
                        <td style="font-size:18px;line-height:18px;color:#000000;font-weight:normal;text-align:left;font-family:Arial,'Helvetica Neue',Helvetica,sans-serif;vertical-align:top;padding:15px 60px 10px 60px;margin:0">
                            Availability : <span style="font-size: 16px">{{$paket->availability}}</span>
                        </td>
                    </tr>
                    {{--                        <tr>--}}
                    {{--                            <td style="font-size:14px;line-height:18px;color:#000000;font-weight:normal;text-align:left;font-family:Arial,'Helvetica Neue',Helvetica,sans-serif;vertical-align:top;padding:15px 70px 10px 70px;margin:0">--}}
                    {{--                                {{$paket->availability}}--}}
                    {{--                            </td>--}}
                    {{--                        </tr>--}}
                    <tr>
                        <td style="font-size:18px;line-height:18px;color:#000000;font-weight:normal;text-align:left;font-family:Arial,'Helvetica Neue',Helvetica,sans-serif;vertical-align:top;padding:15px 60px 10px 60px;margin:0">
                            Durasi &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <span style="font-size: 16px">{{$paket->durasi}}</span>
                        </td>
                    </tr>
                    {{--                        <tr>--}}
                    {{--                            <td style="font-size:14px;line-height:18px;color:#000000;font-weight:normal;text-align:left;font-family:Arial,'Helvetica Neue',Helvetica,sans-serif;vertical-align:top;padding:15px 70px 10px 70px;margin:0">--}}
                    {{--                                {{$paket->durasi}}--}}
                    {{--                            </td>--}}
                    {{--                        </tr>--}}
                    <tr>
                        <td style="font-size:18px;line-height:18px;color:#000000;font-weight:normal;text-align:left;font-family:Arial,'Helvetica Neue',Helvetica,sans-serif;vertical-align:top;padding:15px 60px 10px 60px;margin:0">
                            Kabupaten : <span style="font-size: 16px">{{$paket->getKabupaten->nama_kabupaten}}</span>
                        </td>
                    </tr>
                    {{--                        <tr>--}}
                    {{--                            <td style="font-size:14px;line-height:18px;color:#000000;font-weight:normal;text-align:left;font-family:Arial,'Helvetica Neue',Helvetica,sans-serif;vertical-align:top;padding:15px 70px 10px 70px;margin:0">--}}
                    {{--                                {{$paket->getKabupaten->nama_kabupaten}}--}}
                    {{--                            </td>--}}
                    {{--                        </tr>--}}
                    <tr>
                        <td style="font-size:18px;line-height:18px;color:#000000;font-weight:normal;text-align:left;font-family:Arial,'Helvetica Neue',Helvetica,sans-serif;vertical-align:top;padding:15px 60px 10px 60px;margin:0">
                            Deskripsi &nbsp;&nbsp;&nbsp;:
                        </td>
                    </tr>
                    <tr>
                        <td style="font-size:14px;line-height:18px;color:#000000;font-weight:normal;text-align:left;font-family:Arial,'Helvetica Neue',Helvetica,sans-serif;vertical-align:top;padding:15px 70px 10px 70px;margin:0">
                            <?php echo $paket->deskripsi_paket; ?>
                        </td>
                    </tr>
                    @if($paket->getSesi->count()!=0)
                        <tr>
                            <td style="font-size:18px;line-height:18px;color:#000000;font-weight:normal;text-align:left;font-family:Arial,'Helvetica Neue',Helvetica,sans-serif;vertical-align:top;padding:15px 60px 10px 60px;margin:0">
                                Sesi/jadwal kegiatan paket :
                            </td>
                        </tr>
                        <tr>
                            <td style="font-size:12px;line-height:18px;color:#000000;font-weight:normal;text-align:left;font-family:Arial,'Helvetica Neue',Helvetica,sans-serif;vertical-align:top;padding:10px 70px 10px 45px;margin:0">
                                <ul>
                                    @foreach($paket->getSesi as $sesi)
                                        @if($sesi->status==1)
                                            <li>{{$sesi->jadwal}}</li>
                                        @endif
                                    @endforeach
                                </ul>
                            </td>
                        </tr>
                    @endif
                    </tbody>
                </table>
            @endif
            <table role="presentation" style="margin:0 auto;width:600px"
                   width="600" cellspacing="0" cellpadding="0" border="0" bgcolor="#FFFFFF" align="center">
                <tbody>
                <tr>
                    <td style="font-size:14px;line-height:18px;color:#000000;font-weight:normal;text-align:left;font-family:Arial,'Helvetica Neue',Helvetica,sans-serif;vertical-align:top;padding:15px 60px 10px 60px;margin:0">
                        <strong>hubungi nomor 082160085708, jika ada pertanyaan/kritik/saran.</strong>
                    </td>
                </tr>
                </tbody>
            </table>
            <table role="presentation" style="margin:0 auto;width:600px"
                   width="600" cellspacing="0" cellpadding="0" border="0" bgcolor="#FFFFFF" align="center">
                <tbody>
                <tr>
                    <td style="vertical-align:top;padding:0px 20px 0px 20px;margin:0" valign="top" align="center">
                        <table width="160" cellspacing="0"
                               cellpadding="0" border="0" align="center">
                            <tbody>
                            <tr>
                                <td style="margin-bottom: 40px;color:#ffffff;font-family:Arial,Helvetica,sans-serif;font-size:14px;line-height:16px;text-align:center"
                                    nowrap="" height="30" bgcolor="#009ddc" align="center">
                                    <a href="{{asset('/')}}"
                                       title="Visit Toba"
                                       style="color:#ffffff;font-family:Arial,Helvetica,sans-serif;font-size:14px;line-height:16px;display:block;text-decoration:none;text-transform:uppercase;font-style:normal;font-weight:bold;text-align:center;padding:7px 5px"
                                    >
                                        VISIT&nbsp;TOBA
                                    </a>
                                </td>
                            </tr>
                            <tr>
                                <td style="margin-bottom: 40px;color:#ffffff;font-family:Arial,Helvetica,sans-serif;font-size:14px;line-height:16px;text-align:center"
                                    nowrap="" height="30" align="center">

                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </td>
                </tr>
                </tbody>
            </table>
            <table style="margin:0 auto;width:600px"
                   width="600" cellspacing="0" cellpadding="0" border="0" bgcolor="#E6E6E6" align="center">
                <tbody>
                <tr height="30"></tr>
                <tr height="19">
                    <td height="19" align="center">
            <span style="color:#74787d;font-size:12px;line-height:18px">
              <p>
                &nbsp;
                <span>
                  © Visit Toba
                  <br>
                  PA-III-02-2020
                </span>
                &nbsp;
              </p>
            </span>
                    </td>
                </tr>
                <tr style="height:16px">
                    <td style="height:16px" width="100%">&nbsp;</td>
                </tr>
                </tbody>
            </table>
        </td>
    </tr>
    </tbody>
</table>
