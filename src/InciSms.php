<?php

namespace eT2M\InciSms;

class InciSms
{
    protected $id;
    protected $kadi;
    protected $sifre;
    protected $secret;
    protected $baslik;
    protected $dil;
    protected $GonderimTarihi;
    protected $ZamanAsimi;

    public function __construct($ayar)
    {
        $this->id = @$ayar['id'] ? $ayar['id'] : '';
        $this->kadi = @$ayar['kadi'];
        $this->sifre = @$ayar['sifre'];
        $this->secret = @$ayar['secret'] ? $ayar['secret'] : '';
        $this->baslik = $ayar['baslik'];
        $this->dil = @$ayar['dil'] ? $ayar['dil'] : 'Turkce';
        $this->GonderimTarihi = @$ayar['gonderim_tarihi'] ? $ayar['gonderim_tarihi'] : '';
        $this->ZamanAsimi = @$ayar['zaman_asimi'] ? $ayar['zaman_asimi'] : '';
    }
    public function test()
    {
        print_r($this);
        return 'İnci Sms Test Dosyası';
    }

    function mCurl($url, $xml = null)
    {
        header('Content-Type: text/html; charset=utf-8');
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, 1);
        if ($xml != null) {
            curl_setopt($ch, CURLOPT_POSTFIELDS, $xml);
        }
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
        curl_setopt($ch, CURLOPT_TIMEOUT, 30);
        $response = curl_exec($ch);
        curl_close($ch);
        return $response;
    }

    public function SmsGonder($telNo,$sms)
    {
        header('Content-Type: text/html; charset=utf-8');
        $postUrl = 'http://www.oztekbayi.com/panel/smsgonder1Npost.php';
        $smsID= $this->id;
        $smsKadi= $this->kadi;
        $smsSifre=$this->sifre;
        $baslik=$this->baslik;
        $sms=urlencode(htmlspecialchars($sms));
        $telNo=substr($telNo,-10);
        $TUR = $this->dil;  // Normal yada Turkce
        $ZAMAN = $this->GonderimTarihi;
        $ZAMANASIMI = $this->ZamanAsimi;
        $xmlString = 'data=<sms><kno>' . $smsID . '</kno><kulad>' . $smsKadi . '</kulad><sifre>' . $smsSifre . '</sifre><gonderen>' . $baslik . '</gonderen><mesaj>' . $sms . '</mesaj><numaralar>' . $telNo . '</numaralar><tur>' . $TUR . '</tur></sms>';
        $response = $this->mCurl("$postUrl", "$xmlString");
        return $response;
    }
    public function BakiyeSor()
    {
        header('Content-Type: text/html; charset=utf-8');
        $smsID= $this->id;
        $smsKadi= $this->kadi;
        $smsSifre=$this->sifre;
        $baslik=$this->baslik;
        $getUrl = 'http://www.oztekbayi.com/panel/kullanicibilgi.php?kul_ad='.$smsKadi.'&sifre='.$smsSifre;
        $response = $this->mCurl("$getUrl");
        return $response;
    }
    public function GondericiAdlar()
    {
        header('Content-Type: text/html; charset=utf-8');
        $smsID= $this->id;
        $smsKadi= $this->kadi;
        $smsSifre=$this->sifre;
        $baslik=$this->baslik;
        $getUrl = 'http://www.oztekbayi.com/panel/orjinatorliste.php?kno='.$smsID.'&kulad='.$smsKadi.'&sifre='.$smsSifre;
        $response = $this->mCurl("$getUrl");
        return $response;
    }

}
