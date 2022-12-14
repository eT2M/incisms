<h1 align="center">İnci SMS Modüler Yapı</h1>

[![GitHub issues](https://img.shields.io/github/issues/eT2M/incisms)](https://github.com/eT2M/incisms/issues)
[![GitHub forks](https://img.shields.io/github/forks/eT2M/incisms)](https://github.com/eT2M/incisms/network)
[![GitHub stars](https://img.shields.io/github/stars/eT2M/incisms)](https://github.com/eT2M/incisms/stargazers)
[![Latest Version on Packagist](https://img.shields.io/packagist/v/eT2m/inci-sms.svg?style=flat-square)](https://packagist.org/packages/eT2M/inci-sms)
[![Total Downloads](https://img.shields.io/packagist/dt/eT2M/inci-sms.svg?style=flat-square)](https://packagist.org/packages/eT2M/inci-sms)
[![License: MIT](https://img.shields.io/badge/License-MIT-yellow.svg)](https://opensource.org/licenses/MIT)

İnci Kurumsal Sms Sistemi ( Gateway ) için Yazılmış Modüler Php Composer Paketidir.

 - Laravel 7,8,9 Tam Uyumlu (Providers Gerek yok) 
 - Lumen API ve OOP için Tam Uyumlu 
 - Symfony İçin Tam Uyumlu Pakettir.

# Kurulumu :

    composer require et2m/inci-sms

# Kullanımı :

    <?php

    use eT2M\InciSms\InciSms;

    // Ayar Dosyasının İşlenmesi
    $ayar=[
        "id" => 'KODUNUZ', // İnci SMS özel Kod
        'kadi' => "KULLANICIADINIZ",
        "sifre" => "SİFRENİZ",
        "baslik" => "BASLIGINIZ",
    ];
    $sms = new InciSms($ayar);

    // SMS Gönderimi
    $smsGonderimi = $sms->SmsGonder('SMS_Gidecek_TEL', 'SMS MESAJINIZ');
    
    // Bakiye Sorgulama
    $BakiyemNe = $sms->BakiyeSor();

    // Başlık Sorgulama
    $BakiyemNe = $sms->GondericiAdlar();

<p align="center">
  <img width="460" height="166" src="https://img.et2m.com/logo_kirmizi.png">
</p>
<p align="center">
    Bu proje, MIT lisansı altında lisanslanmış açık kaynaklı bir yazılımdır .
</p>

