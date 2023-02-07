


# Netgsm NetSantral Laravel Paketi

![alt text](https://github.com/netgsm/netsantral/blob/main/netsantral.jpg?raw=true)


NetSantral paket aboneliği bulunan kullanıcılarımız için laravel paketidir.

# İletişim & Destek

 Netgsm API Servisi ile alakalı tüm sorularınızı ve önerilerinizi teknikdestek@netgsm.com.tr adresine iletebilirsiniz.


# Doküman 
https://www.netgsm.com.tr/dokuman/
 API Servisi için hazırlanmış kapsamlı dokümana ve farklı yazılım dillerinde örnek amaçlı hazırlanmış örnek kodlamalara 
 [https://www.netgsm.com.tr/dokuman](https://www.netgsm.com.tr/dokuman) adresinden ulaşabilirsiniz.  
 
### Supported Laravel Versions

Laravel 6.x, Laravel 7.x, Laravel 8.x, Laravel 9.x, 

### Supported Php Versions

PHP 7.2.5 ve üzeri

### Kurulum

<b>composer require netgsm/netsantral</b>

.env  dosyası içerisinde NETGSM ABONELİK bilgileriniz tanımlanması zorunludur.  

<b>NETGSM_USERCODE=""</b>  
<b>NETGSM_PASSWORD=""</b>  

### Santral Yönetimi

Çağrı işlemleri (başlatma, sonlandırma, sessize alma, bağlama, transfer),
Kuyruk işlemleri (durum sorgulama, dahili ekleme/çıkarma, dış numara ekleme/çıkarma, dinamik yönlendirme)
olayları gerçekleştirilebilir.




### Çağrı Başlatma

Bu servis, santral numaranızdan (312xxxxxxx,850xxxxxxx) santralinizdeki register olan bir dahilden dış arama yapmak için veya santralinizdeki register olan diğer bir dahiliye arama yapmak için kullanılır.

<table>
<thead>
<tr>
<th>Değişken</th>
<th>Anlamı</th>
</tr>
</thead>
<tbody>

<tr>
<td><code>customer_num</code></td>
<td>Arama yapılacak dış numara bilgisi, dahilinizin aramak istediği GSM numara bilgisidir. Eğer originate order if yapılırsa önce dahiliniz of yapılırsa önce cep numarası aranır.  <em> Zorunlu parametre </em></td>
</tr>
<tr>
<td><code>internal_num</code></td>
<td>Çağrının başlatılacağı iç dahilinin numarasıdır.  <em> Zorunlu parametre </em></td>
</tr>
<tr>
<td><code>ring_timeout</code></td>
<td>Çağrının açılmadan önce çaldırma süresidir.  <em> Zorunlu parametre </em></td>
</tr>
<tr>
<td><code>crm_id</code></td>
<td>Yapılan istegin IDsidir, yapılan isteklerin cevabı yine istekle beraber gönderilen "crm_id" ile döner.  <em> Zorunlu parametre </em></td>
</tr>
<tr>
<td><code>wait_response</code></td>
<td>Eğer 1 ise isteğin cevabını çağrıyı biri açana kadar döndürmez, açarsada unique id ile beraber döndürür, 0 ise çağrıyı sisteme teslim edince hemen cevabı döndürür.  <em> Zorunlu parametre </em></td>
</tr>
<tr>
<td><code>originate_order</code></td>
<td>Eğer “if” ise öncelikle dahili çalar, “of” ise öncelikle dış numara çalar.  <em> Zorunlu parametre </em></td>
</tr>
<tr>
<td><code>Trunk</code></td>
<td>Santral numaranız, Aradığınızda görünecek numara bilgisidir.(çıkış yapılacak numara).  <em> Zorunlu parametre </em></td>
</tr>
<tr>
<td><code>call_time</code></td>
<td>Saniye cinsinden süre verildiğinde, çağrı tetiklenme süresinden itibaren o kadar süre açık kalacağı anlamına gelir.  <em> Zorunlu olmayan parametre </em></td>
</tr>
<tr>
<td><code>hide_callerid</code></td>
<td>1 değerini aldığında aranan numara dahilinin ekranında gizlenerek gösterilir. 0 değerini aldığında gizlenmez.  <em> Zorunlu olmayan parametre </em></td>
</tr>
<tr>
<td><code>caller_text</code></td>
<td><code>originate_order</code> if seçilmişse kullanılabilen bu parametre, çağrı başlatıldığında dahiliye text içeriği ses olarak dinletilebilir. <em> Zorunlu olmayan parametre </em></td>
</tr>
<tr>
<td><code>called_text</code></td>
<td><code>originate_order</code> if seçilmişse kullanılabilen bu parametre, çağrı başlatıldığında aranan dış numaraya text içeriği ses olarak dinletilebilir.    <em> Zorunlu olmayan parametre </em></td>
</tr>
<tr>
<td><code>caller_record</code></td>
<td><code>originate_order</code> if seçilmişse kullanılabilen bu parametre, çağrı başlatıldığında dahiliye öncesinde Netsantral arayüzden daha öncesinde yüklenmiş ses dosyasını dinletilebilirsiniz. (dosya adı yazılırken uzantısıyla birlikte arayüzdeki tam adı yazılmalıdır.) <em> Zorunlu olmayan parametre </em></td>
</tr>
<tr>
<td><code>called_record</code></td>
<td><code>originate_order</code> if seçilmişse kullanılabilen bu parametre, çağrı başlatıldığında aranan dış numarayaetsantral arayüzden daha öncesinde yüklenmiş ses dosyasını dinletilebilirsiniz. ( yalnızca dosya adı yazılır, .wav uzantısı yazılmamalıdır.) <em> Zorunlu olmayan parametre </em></td>
</tr>
</tbody>
</table>



## Örnek

```
       use Netgsm\Netsantral\Package as NetsantralPackage;
       
       $data=array(   
            "customer_num"=>"553xxxxxxx",
            "pbxnum"=>"850xxxxxxx",
            "internal_num"=>"110",
            "ring_timeout"=>"20",
            "crm_id"=>"xxx",
            "wait_response"=>"1",
            "originate_order"=>"if",
            "trunk"=>"312xxxxxxx",
            "call_time"=>"49",
            // "caller_text"=>"merhaba bu bir test aramasıdır.",
            // "called_text"=>"merhaba bu bir test aramasıdır.",
            "called_record"=>"mesaidisistandart.wav"
        );
        $islem=new NetsantralPackage;
        $sonuc=$islem->cagribaslat($data);
        
        echo '<pre>';
            print_r($sonuc);
        echo '<pre>';

```
#### Başarılı istek örnek sonuç
```
Array
(
    [unique_id] => sip3-xxxxxxxx.53336
    [caller_num] => 102
    [called_num] => 553xxxxxxx
    [crm_id] => xxx
    [response] => originate
    [status] => Success
    [message] => Successfully
)
```
#### Başarısız istek örnek sonuç
```
Array
(
    [code] => 30
    [status] => Error
    [message] => Eksik yada yanlis parametre 2 
)
```
## Sistemden Alınan Cevap

<table>
<thead>
<tr>
<th>Parametre</th>
<th>Anlamı</th>
</tr>
</thead>
<tbody>
<tr>
<td><code>caller_num</code></td>
<td>Arayan Numara</td>
</tr>
<tr>
<td><code>called_num</code></td>
<td>Aranan Numara</td>
</tr>
<tr>
<td><code>response</code></td>
<td>İstek Bilgisi</td>
</tr>
<tr>
<td><code>crm_id</code></td>
<td>Yapılan istek ID</td>
</tr>
<tr>
<td><code>unique_id</code></td>
<td>Çağrıya ait ID, Unique_id bilgisi çağrı başlatma başarılı olursa döner, çağrı başarısız olursa dönmez.</td>
</tr>
<tr>
<td><code>status</code></td>
<td>Durum açıklaması, success ya da error döner.</td>
</tr>
<tr>
<td><code>message</code></td>
<td>Mesaj açıklaması</td>
</tr>
</tbody>
</table>

## Başarılı başlatılan çağrılarda message parametresinden dönebilir cevaplar

<table>
<thead>
<tr>
<th>Durum</th>
<th>Anlamı</th>
</tr>
</thead>
<tbody>
<tr>
<td><code>No registration</code></td>
<td>Eğer dahili veya trunk register değilse</td>
</tr>
<tr>
<td><code>Get Busy</code></td>
<td>Karşı taraf meşgule aldığında</td>
</tr>
<tr>
<td><code>No Answer</code></td>
<td>Karşı telefon çaldı, fakat cevaplayan olmadığında</td>
</tr>
<tr>
<td><code>Busy</code></td>
<td>Meşgul</td>
</tr>
<tr>
<td><code>Successfully</code></td>
<td>Başarılı</td>
</tr>
<tr>
<td><code>Unknown reason</code></td>
<td>Nedeni belli olmayan durum(Hata mesajıdır.)</td>
</tr>
</tbody>
</table>

## Hata Durumlarında message parametresinden dönebilir cevaplar

<table>
<thead>
<tr>
<th>message</th>
<th>sebebi</th>
</tr>
</thead>
<tbody>
<tr>
<td><code>Kullanıcı doğrulanamadi</code></td>
<td>username bilgisi hatalı gönderilirse gelen hata mesajı</td>
</tr>
<tr>
<td><code>Eksik yada yanlis parametre 2</code></td>
<td>internal_num veya trunk bilgisi hatalı gönderilirse gelen hata mesajı</td>
</tr>
<tr>
<td><code>Channel not specified</code></td>
<td>originate_order bilgisi hatalı gönderilirse gelen hata mesajı *Dış numaraya başlatıln çağrılarda olabilir.</td>
</tr>
</tbody>
</table>

##  İç Dahiliye Çağrı Başlatma

```
       use Netgsm\Netsantral\Package as NetsantralPackage;
       $data=array(   
            "pbxnum"=>"312xxxxxxx",
            "caller"=>"110",
            "called"=>"153",
            "ring_timeout"=>"20",
            "crm_id"=>"123456",
            "wait_response"=>"1",
            // "caller_text"=>"merhaba bu bir test aramasıdır.",
            // "called_text"=>"merhaba bu bir test aramasıdır.",
            "called_record"=>"mesaidisistandart.wav"
        );
        $islem=new NetsantralPackage;
        $sonuc=$islem->icDahiliCagriBaslat($data);
        
        echo '<pre>';
            print_r($sonuc);
        echo '<pre>';

```
#### Başarılı istek örnek sonuç
```
Array
(
    [unique_id] => sip3-xxxxxxxx.53336
    [caller_num] => 102
    [called_num] => 553xxxxxxx
    [crm_id] => xxx
    [response] => originate
    [status] => Success
    [message] => Successfully
)
```
#### Başarısız istek örnek sonuç
```
Array
(
    [code] => 30
    [status] => Error
    [message] => Eksik yada yanlis parametre 2 
)
```

### Çağrı Sonlandırma

Parametre olarak aldığı uniqueid değerine sahip kanalı santraliniz üzerinde kapatarak çağrının sonlanmasını sağlar.  
Çağrı sonlandırma santral çağrı trafiği izleme ile size gönderilen unique_id bilgisi ile de yapılabilir.  

<table>
<thead>
<tr>
<th>Parametre</th>
<th>Anlamı</th>
</tr>
</thead>
<tbody>

<tr>
<td><code>crm_id</code></td>
<td>Yapılan istegin IDsidir, yapılan isteklerin cevabı yine istekle beraber gönderilen "crm_id" ile döner.  <em> Zorunlu parametre </em></td>
</tr>
<tr>
<td><code>unique_id</code></td>
<td>onlandırmak istenilen çağrıya ait ID   <em> Zorunlu parametre </em></td>
</tr>
</tbody>
</table>

## Örnek

```
        use Netgsm\Netsantral\Package as NetsantralPackage;
        $data=array(   
            "unique_id"=>"sip9-1675081620.181687",
            "crm_id"=>"xxx",
            
        );
        $islem=new NetsantralPackage;
        $sonuc=$islem->cagrisonlandirma($data);
        
        
        echo '<pre>';
            print_r($sonuc);
        echo '<pre>';

```

#### Başarılı istek örnek sonuç
```
Array
(
    [crm_id] => xxx
    [response] => hangup
    [status] => Success
    [message] => Successful
)
```
#### Başarısız istek örnek sonuç
```
Array
(
    [code] => 30
    [status] => Error
    [message] => Eksik yada yanlis parametre
)
```
## Servisten Alınan Örnek Cevap

<table>
<thead>
<tr>
<th>Kodu</th>
<th>Anlamı</th>
</tr>
</thead>
<tbody>
<tr>
<td><code>response</code></td>
<td>istek bilgisi</td>
</tr>
<tr>
<td><code>crm_id</code></td>
<td>Yaptığınız istek IDsi</td>
</tr>
<tr>
<td><code>unique_id</code></td>
<td>Çağrıya ait ID</td>
</tr>
<tr>
<td><code>status</code></td>
<td>Durum açıklaması</td>
</tr>
<tr>
<td><code>message</code></td>
<td>Mesaj Açıklaması</td>
</tr>
</tbody>
</table>


## Çağrıyı Sessize Alma

<table>
<thead>
<tr>
<th>Parametre</th>
<th>Anlamı</th>
</tr>
</thead>
<tbody>

<tr>
<td><code>/muteaudio</code></td>
<td>çağrıyı sessize alma işlemine ait komut <em>  Zorunlu Parametre</em></td>
</tr>
<tr>
<td><code>username</code></td>
<td>Sistemden hizmet aldığınız abone numarasıdır. (Santral numaranızı göndermelisiniz.312911xxxx,850xxxxxxx)  <em> Zorunlu parametre </em></td>
</tr>
<tr>
<td><code>password</code></td>
<td>API yetkisi tanımlı alt kullanıcı şifresi.  <em> Zorunlu parametre </em></td>
</tr>
<tr>
<td><code>unique_id</code></td>
<td>Sessize alınmak istenilen çağrıya ait ID *  * Zorunlu parametre **</td>
</tr>
<tr>
<td><code>crm_id</code></td>
<td>Yapılan istegin IDsidir, yapılan isteklerin cevabı yine istekle beraber gönderilen "crm_id" ile döner.  <em> Zorunlu parametre </em></td>
</tr>
<tr>
<td><code>direction</code></td>
<td>Hangi tarafa doğru sessize alınacağı bilgisi. Bu parametrede all, in, out değerleri gönderilebilir.   <em> Zorunlu parametre </em></td>
</tr>
<tr>
<td><code>state</code></td>
<td>Sessize almak istediğinizde mute, sessizden almak istediğinizde unmute gönderiniz.  <em> Zorunlu parametre </em></td>
</tr>
</tbody>
</table>

## Örnek

```
        use Netgsm\Netsantral\Package as NetsantralPackage;
        $data=array(   
            "unique_id"=>"sip9-1675084716.207479",
            "crm_id"=>"xxx",
            "state"=>'unmute',
            'direction'=>'all'
            
        );
        $islem=new NetsantralPackage;
        $sonuc=$islem->cagrisessizeal($data);

        echo '<pre>';
            print_r($sonuc);
        echo '<pre>';

```

##### Başarılı istek örnek sonuç

```
Array
(
    [crm_id] => xxx
    [response] => muteaudio
    [status] => Success
    [message] => Successful
)

```
##### Başarısız istek örnek sonuç

```
Array
(
    [code] => 30
    [status] => Error
    [message] => Eksik yada yanlis parametre
)
```
## Çağrı Bağlama

İki dış numarayı arayarak birbirine bağlama işlemidir.  

<table>
<thead>
<tr>
<th>Parametre</th>
<th>Anlamı</th>
</tr>
</thead>
<tbody>

<tr>
<td><code>caller</code></td>
<td>Arama yapılacak dış numara bilgisi girilmelidir.  <em> Zorunlu parametre </em></td>
</tr>
<tr>
<td><code>called</code></td>
<td>Çağrının bağlanacağı diğer dış numara bilgisi girilmelidir.  <em> Zorunlu parametre </em></td>
</tr>
<tr>
<td><code>ring_timeout</code></td>
<td>Çağrının açılmadan önce çaldırma süresidir, saniye cinsinden belirtebilirsiniz.  <em> Zorunlu parametre </em></td>
</tr>
<tr>
<td><code>crm_id</code></td>
<td>Yapılan istegin IDsidir, yapılan isteklerin cevabı yine istekle beraber gönderilen "crm_id" ile döner.  <em> Zorunlu parametre </em></td>
</tr>
<tr>
<td><code>wait_response</code></td>
<td>ğer 1 ise isteğin cevabını çağrıyı biri açana kadar döndürmez, açarsada unique id ile beraber döndürür, 0 ise çağrıyı sisteme teslim edince hemen cevabı döndürür.  <em> Zorunlu parametre </em></td>
</tr>
<tr>
<td><code>originate_order</code></td>
<td>Eğer “if” ise öncelikle “caller” çalar, “of” ise öncelikle “called” çalar.  <em> Zorunlu parametre </em></td>
</tr>
<tr>
<td><code>trunk</code></td>
<td>Santral numaranız (8xxxxxxxxx).  <em>  Zorunlu Parametre</em></td>
</tr>
<tr>
<td><code>call_time</code></td>
<td>Saniye cinsinden süre verildiğinde, çağrı tetiklenme süresinden itibaren o kadar süre açık kalacağı anlamına gelir.  <em> Zorunlu olmayan parametre </em></td>
</tr>
<tr>
<td><code>caller_text</code></td>
<td>çağrı bağlandığında caller parametresinde gönderilen numaraya text içeriği ses olarak dinletilebilir. <em> Zorunlu olmayan parametre </em></td>
</tr>
<tr>
<td><code>called_text</code></td>
<td>çağrı bağlandığında called parametresinde gönderilen numaraya text içeriği ses olarak dinletilebilir.    <em> Zorunlu olmayan parametre </em></td>
</tr>
<tr>
<td><code>caller_record</code></td>
<td>çağrı bağlandığında caller parametresinde gönderilen numaraya Netsantral arayüzden daha öncesinde yüklenmiş ses dosyasını dinletilebilirsiniz. ( yalnızca dosya adı yazılır, .wav uzantısı yazılmamalıdır.) <em> Zorunlu olmayan parametre </em></td>
</tr>
<tr>
<td><code>called_record</code></td>
<td><code>originate_order</code> if seçilmişse kullanılabilen bu parametre, çağrı başlatıldığında aranan dış numarayaetsantral arayüzden daha öncesinde yüklenmiş ses dosyasını dinletilebilirsiniz. ( yalnızca dosya adı yazılır, .wav uzantısı yazılmamalıdır.) <em> Zorunlu olmayan parametre </em></td>
</tr>
</tbody>
</table>

## Örnek

```
        use Netgsm\Netsantral\Package as NetsantralPackage;
        $data=array(   
            "caller"=>"553xxxxxx",
            "called"=>"553xxxxxx",
            "internal_num"=>"110",
            "ring_timeout"=>"20",
            "crm_id"=>"xxx",
            "wait_response"=>"1",
            "originate_order"=>"if",
            "trunk"=>"312xxxxxxx",
            "call_time"=>"49",
            // "caller_text"=>"merhaba bu bir test aramasıdır.",
            // "called_text"=>"merhaba bu bir test aramasıdır.",
            "called_record"=>"mesaidisistandart.wav"
        );
        $islem=new NetsantralPackage;
        $sonuc=$islem->cagribagla($data);
        
        echo '<pre>';
            print_r($sonuc);
        echo '<pre>';

```
##### Başarılı istek örnek sonuç
```
Array
(
    [unique_id] => sip3-1675766849.90638
    [caller_num] => 553xxxxxxx
    [called_num] => 537xxxxxxx
    [crm_id] => xxx
    [response] => linkup
    [status] => Success
    [message] => Successfully
)
```
##### Başarısız istek örnek sonuç
```
Array
(
    [code] => 30
    [status] => Error
    [message] => Eksik yada yanlis parametre 2 
)
```
## Çağrı Transfer


<table>
<thead>
<tr>
<th>Değişken</th>
<th>Anlamı</th>
</tr>
</thead>
<tbody>
<tr>
<td><code>type=xfer </code></td>
<td>parametresi ile devam eden çağrıya ait unique_id parametresi kullanılarak, exten ile belirtilen dahiliye kör transfer yapılır. <em> Zorunlu parametre </em></td>
</tr>
<tr>
<td><code>type=atxfer </code></td>
<td>parametresi ile devam eden çağrıya ait unique id parametresi kullanılarak, exten ile belirtilen dahiliye çağrıyı katılımlı olarak aktarır. Çağrı başlatılırken originate_order of olmalıdır. <em> Zorunlu parametre </em></td>
</tr>
<tr>
<td><code>unique_id</code></td>
<td>Transfer istenilen çağrıya ait ID <em> Zorunlu parametre </em></td>
</tr>
<tr>
<td><code>crm_id</code></td>
<td>Yapılan istegin IDsidir, yapılan isteklerin cevabı yine istekle beraber gönderilen "crm_id" ile döner.  <em> Zorunlu parametre </em></td>
</tr>
<tr>
<td><code>exten</code></td>
<td>Çağrının aktarılacağı numaradır. <em> Zorunlu parametre </em></td>
</tr>
</tbody>
</table>

```
        use Netgsm\Netsantral\Package as NetsantralPackage;
        $data=array(   
            "unique_id"=>"sip9-1675145346.6541",
            "crm_id"=>"123456",
            "type"=>"xfer",
            "exten"=>"0544xxxxxxx"
        );
        $islem=new NetsantralPackage;
        $sonuc=$islem->cagritransfer($data);
        
        
        echo '<pre>';
            print_r($sonuc);
        echo '<pre>';

```
##### Başarılı istek örnek sonuç
```
Array
(
    [crm_id] => 123456
    [response] => xfer
    [status] => Success
    [message] => Successful
)
```
##### Başarısız istek örnek sonuç
```
Array
(
    [status] => Error
    [message] => Hatali istek: URI hatali
)
```
## Servisten message parametresiyle dönen değerler

<table>
<thead>
<tr>
<th>message</th>
<th>Anlamı</th>
</tr>
</thead>
<tbody>
<tr>
<td><code>No registration</code></td>
<td>Eğer dahili veya trunk register değilse</td>
</tr>
<tr>
<td><code>Get Busy</code></td>
<td>Karşı taraf meşgule aldığında</td>
</tr>
<tr>
<td><code>No Answer</code></td>
<td>Karşı telefon çaldı, fakat cevaplayan olmadığında</td>
</tr>
<tr>
<td><code>Busy</code></td>
<td>Meşgul</td>
</tr>
<tr>
<td><code>Successfully</code></td>
<td>Başarılı</td>
</tr>
<tr>
<td><code>Unknown reason</code></td>
<td>Nedeni belli olmayan durum(Hata mesajıdır.)</td>
</tr>
</tbody>
</table>

## Kuyruğa Dahili Ekleme

<table>
<thead>
<tr>
<th>Değişken</th>
<th>Anlamı</th>
</tr>
</thead>
<tbody>
<tr>
<td><code>crm_id</code></td>
<td>Yapılan istegin IDsidir, yapılan isteklerin cevabı yine istekle beraber gönderilen "crm_id" ile döner.  <em> Zorunlu parametre.Netsantral portaldan eklenecek departman nodur. </em></td>
</tr>
<tr>
<td><code>exten</code></td>
<td>Eklenmesi istenen dahili bilgisini bu parametrede belirtiniz.  <em> Zorunlu parametre </em></td>
</tr>
<tr>
<td><code>queue</code></td>
<td>İşlem yapılacak kuyruk adını bu parametrede belirtiniz.  <em> Zorunlu parametre. Netsantral portaldan eklenecek departman adıdır. </em></td>
</tr>
<tr>
<td><code>paused</code></td>
<td>Molada baslangıç için 1, açık başlamak için 0 gönderilebilir.  <em> Zorunlu parametre </em></td>
</tr>
<tr>
<td><code>penalty</code></td>
<td><em> Kuyruktaki dahililerinizin hangisine daha fazla çağrı verileceğini belirtir. 0-99 arasında değer alabilir. penalty değeri önceliğine göre sistem çağrıları dağıtır.   </em> Zorunlu parametre *</td>
</tr>
</tbody>
</table>

```
        use Netgsm\Netsantral\Package as NetsantralPackage;
        $data=array(
                "exten"=>"110",
                "queue"=>"muhasebe",
                "paused"=>"0",
                "crm_id"=>"345",
                "penalty"=>"0"
                );
         
        $islem=new NetsantralPackage;
        $sonuc=$islem->kuyrukEkle($data);
        echo '<pre>';
            print_r($sonuc);
        echo '<pre>';

```
##### Başarılı istek örnek sonuç
```
Array
(
    [crm_id] => 345
    [status] => Success
    [message] => Successful
)
```
##### Başarısız istek örnek sonuç
```
Array
(
    [status] => Error
    [message] => Bir veya birden fazla kuyrukta hata olustuUnable to add interface to queue: No such queue
)
```
## Kuyruktan Dahili Çıkarma

<table>
<thead>
<tr>
<th>Değişken</th>
<th>Anlamı</th>
</tr>
</thead>
<tbody>
<tr>
<td><code>crm_id</code></td>
<td>Yapılan istegin IDsidir, yapılan isteklerin cevabı yine istekle beraber gönderilen "crm_id" ile döner.  <em> Zorunlu parametre.Netsantral portaldan eklenecek departman nodur. </em></td>
</tr>
<tr>
<td><code>exten</code></td>
<td>Eklenmesi istenen dahili bilgisini bu parametrede belirtiniz.  <em> Zorunlu parametre </em></td>
</tr>
<tr>
<td><code>queue</code></td>
<td>İşlem yapılacak kuyruk adını bu parametrede belirtiniz.  <em> Zorunlu parametre. Netsantral portaldan eklenecek departman adıdır. </em></td>
</tr>


</tbody>
</table>

```
        use Netgsm\Netsantral\Package as NetsantralPackage;
        $data=array(
                "exten"=>"101",
                "queue"=>"muhasebe",
                "crm_id"=>"345",
                );
         
        $islem=new NetsantralPackage;
        $sonuc=$islem->kuyrukCikar($data);
        echo '<pre>';
            print_r($sonuc);
        echo '<pre>';

```
##### Başarılı istek örnek sonuç
```
Array
(
    [crm_id] => 345
    [status] => Success
    [message] => Successful
)
```
##### Başarısız istek örnek sonuç
```
Array
(
    [status] => Error
    [message] => Bir veya birden fazla kuyrukta hata olustuUnable to remove interface from queue: No such queue
)
```
## Kuyruk Durum Sorgula  
Santralinizdeki kuyruklardaki olaylar anlık olarak izlenebilir.  

<table>
<thead>
<tr>
<th>Değişken</th>
<th>Anlamı</th>
</tr>
</thead>
<tbody>
<tr>
<td><code>crm_id</code></td>
<td>Yapılan istegin IDsidir, yapılan isteklerin cevabı yine istekle beraber gönderilen "crm_id" ile döner.  <em> Zorunlu parametre.Netsantral portaldan eklenecek departman nodur. </em></td>
</tr>

<td><code>queue</code></td>
<td>İşlem yapılacak kuyruk adını bu parametrede belirtiniz.  <em> Zorunlu parametre. Netsantral portaldan eklenecek departman adıdır. </em></td>
</tr>


</tbody>
</table>

```
        use Netgsm\Netsantral\Package as NetsantralPackage;
        $data=array(
            "queue"=>"muhasebe",
            "crm_id"=>"345",
            );
     
        $islem=new NetsantralPackage;
        $sonuc=$islem->kuyrukSorgula($data);
        echo '<pre>';
            print_r($sonuc);
        echo '<pre>';

```

##### Başarılı istek örnek sonuç



```
Array
(
    [crm_id] => 345
    [pbx_num] => 3129116589
    [queues] => Array
        (
            [0] => stdClass Object
                (
                    [queuename] => 3129116589-queue-Operator
                    [callers] => stdClass Object
                        (
                        )

                    [agents] => Array
                        (
                            [0] => stdClass Object
                                (
                                    [agent] => 101
                                    [status] => empty
                                    [membership] => static
                                    [paused] => false
                                    [reason] => 
                                )

                        )

                    [calls] => 0
                    [holdtime] => 0
                    [talktime] => 0
                    [completed] => 0
                    [abondaned] => 0
                    [max] => 0
                )

        )

)       

```
##### Başarısız istek örnek sonuç
```
(
    [code] => 70
    [status] => Error
    [message] => 312xxxxxxx isimli santrale ait boyle bir kuyruk yoktur
)
```

### Servisten Alınan Cevap Parametreleri

<table>
<thead>
<tr>
<th>Değişken</th>
<th>Anlamı</th>
</tr>
</thead>
<tbody>
<tr>
<td><code>queuename</code></td>
<td>Santralde bulunan kuyruğun adı</td>
</tr>
<tr>
<td><code>pbx_num</code></td>
<td>Santralinizin Netgsm ara yüzünde görünen adıdır.</td>
</tr>
<tr>
<td><code>talktime</code></td>
<td>Kaç saniye konuşulduğu bilgisini tutar.</td>
</tr>
<tr>
<td><code>crm_id</code></td>
<td>Tarafınızda belirleyeceğiniz, isteğe ait Id bilgisi</td>
</tr>
<tr>
<td><code>calls</code></td>
<td>Kuyrukta aktif bekleyen çağrı adedi</td>
</tr>
<tr>
<td><code>max</code></td>
<td>Kuyrukta maksimum bekleyen çağrı adedi</td>
</tr>
<tr>
<td><code>abondaned</code></td>
<td>Kuyruğu terkeden kişi sayısı</td>
</tr>
<tr>
<td><code>callers</code></td>
<td>Kuyrukta bekleyen kişi numarası : Beklediği saniye</td>
</tr>
<tr>
<td><code>completed</code></td>
<td>Başarılı çağrı adedi</td>
</tr>
<tr>
<td><code>holdtime</code></td>
<td>Bekleme süresi</td>
</tr>
<tr>
<td><code>agents</code></td>
<td>Kuyruğun içindeki dahililer</td>
</tr>
<tr>
<td><code>agent</code></td>
<td>Dahilin numarası</td>
</tr>
<tr>
<td><code>status</code></td>
<td>Dahilinin çağrı durumu</td>
</tr>
<tr>
<td><code>unregister</code></td>
<td>status parametresi alabilceği değer, dahili register degil</td>
</tr>
<tr>
<td><code>onhook</code></td>
<td>status parametresi alabilceği değer, dahili su an konusuyor</td>
</tr>
<tr>
<td><code>empty</code></td>
<td>status parametresi alabilceği değer, dahili boşta bekliyor</td>
</tr>
<tr>
<td><code>ringing</code></td>
<td>status parametresi alabilceği değer, dahili çalıyor</td>
</tr>
<tr>
<td><code>membership</code></td>
<td>dahilinin kuyruğa eklenme yöntemi, static ise arayüzden, dynamic ise apiden</td>
</tr>
<tr>
<td><code>paused</code></td>
<td>dahili mola durumu (true,false)</td>
</tr>
<tr>
<td><code>reason</code></td>
<td>dahili mola sebebi</td>
</tr>
</tbody>
</table>

## Kuyruktaki Dahiliyi Molaya Alma//Çıkarma

<table>
<thead>
<tr>
<th>Parametre</th>
<th>Anlamı</th>
</tr>
</thead>
<tbody>

<td><code>exten</code></td>
<td>Mola konumuna alınacak dahili numarası  <em> Zorunlu parametre </em></td>
</tr>
<tr>
<td><code>queue</code></td>
<td>İşlem yapılacak kuyruk adı  <em> Zorunlu parametre </em></td>
</tr>
<tr>
<td><code>crm_id</code></td>
<td>Login isteğinde tarafınızda oluşturup gönderdiğiniz ID  <em> Zorunlu parametre </em></td>
</tr>
<tr>
<td><code>paused</code></td>
<td>Molaya almak için 1 değeri, moladan çıkmak için 0 gönderiniz.  <em> Zorunlu parametre </em></td>
</tr>
<tr>
<td><code>reason</code></td>
<td>Molaya alma sebebini bu parametre ile gönderebilirsiniz, bu işleminize göre kuyruk izleme APIsinden tarafınıza bu reason bilgisi dönecektir. <em> Zorunlu parametre </em></td>
</tr>
</tbody>
</table>

```
        use Netgsm\Netsantral\Package as NetsantralPackage;
        $data=array(
            "exten"=>"110",
            "queue"=>"muhasebe",
            "paused"=>"1",
            "crm_id"=>"345",
            "reason"=>"test"
            );
     
        $islem=new NetsantralPackage;
        $sonuc=$islem->mola($data);
        echo '<pre>';
            print_r($sonuc);
        echo '<pre>';

```
##### Başarılı istek örnek sonuç
```
Array
(
    [crm_id] => 345
    [status] => Success
    [message] => Successful
)
```

##### Başarısız istek örnek sonuç
```
Array
(
    [status] => Error
    [message] => Bir veya birden fazla kuyrukta hata olustuInterface not found
)
```
## Kuyruğa Dış Numara Ekleme/Çıkarma

Netsantral'iniz üzerinde kuyruğa harici (dahili dışında) numara/ekleyip çıkarma işlemi gerçekleştirebilirsiniz. Gelen çağrıları karşılamasını istediğiniz, belirleyeceğiniz kuyruğa (departmana) harici numara eklemek ya da çıkarabilirsiniz.  

<table>
<thead>
<tr>
<th>Değişken</th>
<th>Anlamı</th>
</tr>
</thead>
<tbody>

<td><code>command</code></td>
<td>Numara ekleme işlemi için <strong>queueaddnumber</strong> , listeden numara çıkarmak için <strong>queuedelnumber</strong> gönderebilirsiniz.   <em> Zorunlu parametre </em></td>
</tr>
<tr>
<td><code>tenant</code></td>
<td>Santral numarası.  <em> Zorunlu parametre </em></td>
</tr>
<tr>
<td><code>queue</code></td>
<td>Santralinizde tanımlı olan kuyruk(departman) bilgisi. (85030XXXXX-queue-kuyrukismi formatında gönderilmeli) <em> Zorunlu parametre </em></td>
</tr>
<tr>
<td><code>no</code></td>
<td>Kuyruğa eklenecek ya da kuruktan çıkarılacak numara.  5xxxxxxxxx, 312xxxxxxx formatında gönderilmeli. <em> Zorunlu parametre </em></td>
</tr>
<tr>
<td><code>penalty</code></td>
<td>Çağrıların numaralara dağıtımı sırasındaki önceliği belirler.Düşük değerler yüksek önceliğe sahiptir.Birden fazla numara aynı önceliğe sahip olabilir.Dahili numaralarda ve harici numaralarda belirlemiş olduğunuz öncelikler birbirini etkilemektedir. 1-10 arası değer alabilir. <em> Zorunlu parametre </em></td>
</tr>
</tbody>
</table>

```
use Netgsm\Netsantral\Package as NetsantralPackage;
$data=array(
            "command"=>"queuedelnumber",
            "tenant"=>"312xxxxxxx",
            "queue"=>"muhasebe",
            "no"=>"553xxxxxxx",
            "penalty"=>"1"
            );
     
        $islem=new NetsantralPackage;
        $sonuc=$islem->kuyrukDisNum($data);
        echo '<pre>';
            print_r($sonuc);
        echo '<pre>';

```
##### Başarılı istek örnek sonuç
```
Array
(
    [code] => 200
    [message] => queuedelnumber islemi yapildi.
)
```

##### Başarısız istek örnek sonuç
```
Array
(
    [code] => 70
    [error] => gecersiz tenant
)

```
<table>
<thead>
<tr>
<th>Hata Kodu</th>
<th>Anlamı</th>
</tr>
</thead>
<tbody>
<tr>
<td><code>30</code></td>
<td>Geçersiz kullanıcı adı , şifre veya kullanıcınızın API erişim izninin olmadığını gösterir.Ayrıca eğer API erişiminizde IP sınırlaması yaptıysanız ve sınırladığınız ip dışında gönderim sağlıyorsanız 30 hata kodunu alırsınız. API erişim izninizi veya IP sınırlamanızı , web arayüzümüzden; sağ üst köşede bulunan ayarlar&gt; API işlemleri menüsünden kontrol edebilirsiniz.</td>
</tr>
<tr>
<td><code>40</code></td>
<td>Gecersiz Santral Bilgileri</td>
</tr>
<tr>
<td><code>70</code></td>
<td>Hatalı sorgulama.Gönderdiğiniz parametrelerden birisi hatalı veya zorunlu alanlardan birinin eksik olduğunu ifade eder.</td>
</tr>
<tr>
<td><code>80</code></td>
<td>Sorgulama sınır aşımı. <em>(dakikada en fazla 2 kez sorgulanabilir, bir kuyruğa max. 5 numara eklenebilir, aynı anda max. 5 kuyruğa işlem sağlanabilir.)</em></td>
</tr>
<tr>
<td><code>100</code></td>
<td>Sistem hatası</td>
</tr>
</tbody>
</table>


## Dinamik Yönlendirme

Linkup API'ye (Çağrı bağlama API) benzer mantıkta çalışan, called parametresinde belirtilen numarayı arar ve ardından tipi redirect_type, ismi redirect_menu de belirtilmiş menüye aktarır.

Örneğin, arama yapmak istediğiniz dış numara 05XXXXXXXXX olduğunu varsayalım, bu numarayı arayarak operator isimli kuyruğunuza bu çağrıyı API ile yönlendirebilirsiniz.  
<table>
<thead>
<tr>
<th>Parametre</th>
<th>Anlamı</th>
</tr>
</thead>
<tbody>

<tr>
<td><code>called</code></td>
<td>Arama yapılacak numara bilgisi girilmelidir.  <em> Zorunlu parametre </em></td>
</tr>
<tr>
<td><code>ring_timeout</code></td>
<td>Çağrının açılmadan önce çaldırma süresidir.  <em> Zorunlu parametre </em></td>
</tr>
<tr>
<td><code>crm_id</code></td>
<td>Yapılan istegin IDsidir, yapılan isteklerin cevabı yine istekle beraber gönderilen "crm_id" ile döner.  <em> Zorunlu parametre </em></td>
</tr>
<tr>
<td><code>wait_response</code></td>
<td>Eğer 1 ise isteğin cevabını çağrıyı biri açana kadar döndürmez, açarsada unique id ile beraber döndürür, 0 ise çağrıyı sisteme teslim edince hemen cevabı döndürür.  <em> Zorunlu parametre </em></td>
</tr>
<tr>
<td><code>trunk</code></td>
<td>Santral numaranızdır.  <em> Zorunlu parametre </em></td>
</tr>
<tr>
<td><code>redirect_menu</code></td>
<td>Aktarılcak menü ismi belirtilmelidir.  <em> Zorunlu parametre </em></td>
</tr>
<tr>
<td><code>redirect_type</code></td>
<td>Yönlendirmenin yapılması için; <strong>queue</strong> , <strong>announcement</strong> , <strong>ivr</strong> herhagi biri belirtilir. <em> Zorunlu parametre </em></td>
</tr>
<tr>
<td><code>call_time</code></td>
<td>Saniye cinsinden süre verildiğinde, çağrı tetiklenme süresinden itibaren o kadar süre açık kalacağı anlamına gelir.  <em> Zorunlu olmayan parametre </em></td>
</tr>
<tr>
<td><code>prefix</code></td>
<td>Gelen çağrıda aranan numaranın başına eklenecek karakterlerdir, maksimum 5 adet string karakter eklenebilir.  <em> Zorunlu olmayan parametre </em></td>
</tr>
</tbody>
</table>

```
        use Netgsm\Netsantral\Package as NetsantralPackage;
        $data=array(
            "called"=>"553xxxxxxx",
            "ring_timeout"=>"35",
            "crm_id"=>"1234",
            "wait_response"=>"1",
            "trunk"=>"850xxxxxxx",
            "redirect_menu"=>"muhasabe",
            "redirect_type"=>"queue",
            "call_time"=>"75",
            "prefix"=>"test",
            );
     
        $islem=new NetsantralPackage;
        $sonuc=$islem->dinamikyonlendirme($data);
        echo '<pre>';
            print_r($sonuc);
        echo '<pre>';
    
  ```
 ##### Başarılı istek örnek sonuç 
   ``` 
Array
(
    [unique_id] => sip3-1675768456.108813
    [caller_num] => 3129116589
    [called_num] => 3129116589
    [crm_id] => 1234
    [response] => dynamic_redirect
    [status] => Success
    [message] => Successfully
)
  ```
   ##### Başarısız istek örnek sonuç 
   ``` 
Array
(
    [caller_num] => caller
    [called_num] => 3129116589
    [crm_id] => 1234
    [response] => dynamic_redirect
    [status] => Error
    [message] => Unsuccessful
)
  ```
### Otomatik Arama Nedir 

Netsantral'iniz üzerinden otomatik arama yaparak müşterilere duyuru, onay alma, hatırlatma, borç bilgisi okutma gibi işlemleri yaptırabilirsiniz.

Neler Yapılabilir ?

- Otomatik Arama listenizi  oluşturabilirsiniz.  
- Tüm otomatik aramalarınızı listeleyebilirsiniz.  
- Serviste numara bazlı otomatik arama geçmişini görebilirsiniz.  
- Dinamik listenize yeni numaralar ekleyebilirsiniz.  
- Dinamik listenizi durdurup, başlatabilirsiniz. 

### Arama Listesi Oluştur 

2 tür liste tipi oluşturabilirsiniz.
Bitirmeli Sabit Liste ve Devamlı Dinamik Liste(interaktif).  
Bitirmeli sabit listelerde düzenleme işlemi yapılamaz, numara ekleme-silme yapılamaz.  
Verilen numara listesini belirlenen zaman içerisinde arar ve bir daha bu liste kullanılmaz. Örneğin; 3 günlük bir kampanya yaptınız. Girdiğiniz numaralara bu kampanyayı dinleten bir anons belirleyip tüm numaralar arandığında veya çalışma zamanı bittiğinde listenin tamamlanmasını sağlayabilirsiniz. Bu listeye daha sonradan numara eklemeye ihtiyaç yoktur.  
Devamlı dinamik listede ise daha sonradan numara ekleyebilir, liste üzerinde belirli düzenlemeleri yapabilirsiniz.  
Bazı entegrasyonlardan bu listeye numara ekletmesi yapabilirsiniz.  


<table>
<thead>
<tr>
<th>Değişken</th>
<th>Anlamı</th>
</tr>
</thead>
<tbody>

<tr>
<td><code>list_name</code></td>
<td>Otomatik arama liste adı, maksimum 50 karakter olabilir.  <em> Zorunlu parametre </em></td>
</tr>
<tr>
<td><code>list_prefix</code></td>
<td>Otomatik arama liste ön eki, otomatik aramanın dahilinize bağlandığında numaranın önünde görünecek kısa koddur. Maksimum 4 haneli olabilir. <em> Zorunlu parametre </em></td>
</tr>
<tr>
<td><code>liste_type</code></td>
<td>1 değeri bitirmeli sabit liste, 2 değeri devamlı dinamik listeyi ifade eder. <em> Zorunlu parametre </em></td>
</tr>
<tr>
<td><code>list_startdate</code></td>
<td>Otomatik aramanın yapılacağı başlangıç tarihi (YYYY-MM-DD) <em> Zorunlu parametre </em></td>
</tr>
<tr>
<td><code>list_stopdate</code></td>
<td>Otomatik aramanın yapılacağı bitiş tarihi (YYYY-MM-DD) <em> Zorunlu parametre </em></td>
</tr>
<tr>
<td><code>list_starttime</code></td>
<td>Otomatik aramanın belirlenen günler arasında, her gün için kaçta başlayacağı.  (HH:MM) <em> Zorunlu parametre </em></td>
</tr>
<tr>
<td><code>list_stoptime</code></td>
<td>Otomatik aramanın belirlenen günler arasında, her gün için kaçta biteceği. (HH:MM) <em> Zorunlu parametre </em></td>
</tr>
<tr>
<td><code>retry_count</code></td>
<td>Bir numaraya başlatılan otomatik aramanın başarısız olması durumunda kaç kere tekrar deneneceğidir. Arama başarılı olduktan sonra kalan tekrarlarda aranmaz. Aramanın başarılı olması çağrının açılması demektir. En fazla 3 kez tekrar edebilir. <em> Zorunlu parametre </em></td>
</tr>
<tr>
<td><code>try_time</code></td>
<td>Bir numaraya başlatılan Otomatik aramanın başarısız olması durumunda tekrarlanan aramalar arasında minimum kaç dakika olacağı bilgisidir. Varsayılan olarak 60 dakika, maksimum 1440 dk, minimum 0 dk.) <em> Zorunlu parametre </em></td>
</tr>
<tr>
<td><code>department</code></td>
<td>Otomatik aramadan sorumlu departmanın adıdır. Bu departmandaki boş dahili sayısınca arama başlatılacaktır. <em> Zorunlu parametre </em></td>
</tr>
<tr>
<td><code>trunk</code></td>
<td>Otomatik aramanın hangi giden hattınızdan yapılacağı bilgisidir. <em> Zorunlu parametre </em></td>
</tr>
<tr>
<td><code>destination_type</code></td>
<td>Alabileceği değerler : ivr,queue, announcement. Bir numaraya başlatılan otomatik aramanın başarılı olması durumunda santralin hangi hedefine gideceği bilgisidir. <em> Zorunlu parametre </em></td>
</tr>
<tr>
<td><code>destination_name</code></td>
<td>Bir numaraya başlatılan otomatik aramanın başarılı olması durumunda bağlanılacak hedefin adı.  <em> Zorunlu parametre </em></td>
</tr>
<tr>
<td><code>queue_limit_type</code></td>
<td>Kuyruk Limit tipi default 1 tanımlı.</td>
</tr>
<tr>
<td><code>queue_limit</code></td>
<td>Kuyrukta bekleyecek max. numara sayısı. Varsayılan olarak 1 değerini alır. *</td>
</tr>
<tr>
<td><code>url</code></td>
<td>URL bilgisai göndermeniz halinde belirttiğiniz URLe otomatik arama durumuna ilişkin raporlama için veri POST edilir. Raporlama Servisinde detayını görebilirsiniz. <em> Zorunlu parametre </em></td>
</tr>
<tr>
<td><code>groups</code></td>
<td>Otomatik aramanın başlatılacağı Netgsm rehberinize ait grup isimleri. Array olarak gönderilir. <em> Zorunlu olmayan parametre </em></td>
</tr>
<tr>
<td><code>numbers</code></td>
<td>Otomatik aramanın başlatılacağı numaralar. Array olarak gönderilir.  <em> groups parametresi varsa, zorunlu olmayan parametre </em></td>
</tr>
<tr>
<td><code>number</code></td>
<td>Otomatik aramanın başlatılacağı numaralarda numara bilgisi. 5xx....,312xxx.. formatında gönderiniz. <em> numbers parametresi varsa, zorunlu parametre </em></td>
</tr>
<tr>
<td><code>callstop_type</code></td>
<td>Otomatik arama görev durdurma limiti tipi.</td>
</tr>
<tr>
<td><code>callstop_limit</code></td>
<td>Otomatik arama görev durdurma limiti değeri.</td>
</tr>
<tr>
<td><code>filter</code></td>
<td>Ticari içerikli otomatik aramalarda kullanılır. Ticari içerikli bireysele başlatılacak aramalar için İYS kontrolünde "11" değerini, tacire  başlatılacak aramalar için İYS kontrolünde "12" değerini almalıdır. null gönderildiği taktirde filtre uygulanmadan gönderilecektir.</td>
</tr>
</tbody>
</table>

```
		use Netgsm\Netsantral\Package as NetsantralPackage;

        $islem=new NetsantralPackage;
        $data=array(
            "list_name"       => "list_name",
            "list_prefix"     => "110",
            "liste_type"      => "2",
            "list_startdate"  => "2023-02-01",
            "list_stopdate"   => "2023-02-01",
            "list_starttime"  => "11:00",
            "list_stoptime"   => "11:15",
            "retry_count"     => "1",
            "try_time"        => "5",
            "department"      => "muhasebe",
            "trunk"           => "312xxxxxxx",
            "destination_type"=> "queue",
            "destination_name"=> "muhasebe",
            "queue_limit"     => "1",                                      
            "groups"          => ["otolist"],
            "callstop_type "    =>1,
            "numbers"         => [
				array( "number" => "553xxx","name" => "name1"),
			  ]
                
        ); 

```


#### queue_limit_type açıklamaları

<table>
<thead>
<tr>
<th>Kod</th>
<th>Anlamı</th>
</tr>
</thead>
<tbody>
<tr>
<td><code>1</code></td>
<td>Sorumlu departmandaki boş temsilci + Kuyrukta bekleyecek numara sayısı : boş temsilci sayısı ve belirlediğiniz kuyrukta bekleyecek max. numara sayıları toplamı kadar arama başlatılır.</td>
</tr>
<tr>
<td><code>2</code></td>
<td>Sorumlu departmandaki boş temsilci X Kuyrukta bekleyecek numara sayısı : Boş temsilci başına başlatılacak numara sayısı verilebilir.</td>
</tr>
<tr>
<td><code>3</code></td>
<td>IVR araması: Aramalar bir IVR a yönlendirilecekse tercih edilebilir. Dakikada başlatılacak IVR arama sayısı verilebilir.</td>
</tr>
</tbody>
</table>

#### callstop_type açıklamaları

<table>
<thead>
<tr>
<th>Kod</th>
<th>Anlamı</th>
</tr>
</thead>
<tbody>
<tr>
<td><code>0</code></td>
<td>Limit Yok.</td>
</tr>
<tr>
<td><code>1</code></td>
<td>Başarılı aramaya göre (adet)</td>
</tr>
<tr>
<td><code>2</code></td>
<td>Başarılı aramaya göre (yüzde)</td>
</tr>
<tr>
<td><code>3</code></td>
<td>Başarısız aramaya göre (adet)</td>
</tr>
<tr>
<td><code>4</code></td>
<td>Başarısız aramaya göre (yüzde)</td>
</tr>
<tr>
<td><code>5</code></td>
<td>Toplam aramaya göre (adet)</td>
</tr>
<tr>
<td><code>6</code></td>
<td>Toplam aramaya göre (yüzde)</td>
</tr>
</tbody>
</table>


##### Başarılı istek örnek sonuç
```
Array
(
    [header] => stdClass Object
        (
            [error] => 
            [code] => 200
            [message] => Otomatik arama listesi başarıyla oluşturuldu.
        )

    [body] => Array
        (
            [0] => stdClass Object
                (
                    [id] => 12504
                    [list_name] => list_name
                    [list_prefix] => 110
                    [list_type] => 2
                    [list_startdate] => 2023-02-01
                    [list_stopdate] => 2023-02-01
                    [list_starttime] => 11:00
                    [list_stoptime] => 11:15
                    [retry_count] => 1
                    [try_time] => 5
                    [department] => muhasebe
                    [trunk] => 312xxxxxxx
                    [destination_type] => queue
                    [destination_name] => muhasebe
                    [queue_limit] => 1
                    [groups] => Array
                        (
                        )

                )

        )
)
```

##### Başarısız istek örnek sonuç
```
Array
(
    [header] => stdClass Object
        (
            [error] => 1
            [code] => 70
            [message] => Hatalı sorgulama. Gönderdiğiniz parametrelerden birisi hatalı veya zorunlu alanlardan birinin eksik olduğunu ifade eder. Departman adı belirtmek zorunludur.
        )

    [body] => Array
        (
        )

)
```
### Otomatik Arama Listele

<table>
<thead>
<tr>
<th>Değişken</th>
<th>Anlamı</th>
</tr>
</thead>
<tbody>

<td><code>list_id</code></td>
<td>Ulaşmak istediğiniz otomatik arama listesinin ID bilgisi, bu parametreyi göndermediğinizde tüm listelerinizi görüntüleyebilirsiniz. <em> Zorunlu olmayan parametre </em></td>
</tr>
</tbody>
</table>

```
        use Netgsm\Netsantral\Package as NetsantralPackage;
        $islem=new NetsantralPackage;
        $data=array('list_id'=>"12406");
        $sonuc=$islem->otomatikAramaList($data);
        echo '<pre>';
            print_r($sonuc);
        echo '<pre>';

```
##### Başarılı istek örnek sonuç
```
Array
(
    [header] => stdClass Object
        (
            [error] => 
            [code] => 200
            [message] => Otomatik arama listeleme başarılı.
        )

    [body] => Array
        (
            [0] => stdClass Object
                (
                    [list_id] => 12505
                    [list_name] => list_name
                    [list_status] => 0
                    [list_prefix] => 110
                    [list_type] => 2
                    [list_startdate] => 2023-02-01
                    [list_stopdate] => 2023-02-01
                    [list_starttime] => 11:00     
                    [list_stoptime] => 11:15     
                    [retry_count] => 1
                    [try_time] => 5
                    [department] => muhasebe
                    [destination_type] => queue
                    [destination_name] => muhasebe
                    [queue_limit] => 1
                    [groups] => Array
                        (
                        )

                )

        )

)
```
##### Başarısız istek örnek sonuç
```
Array
(
    [header] => stdClass Object
        (
            [error] => 1
            [code] => 400
            [message] => HAtalı sorgulama. Bu id ye ait otomatik arama listesi yok yada yetkiniz yok.
        )

    [body] => Array
        (
        )

)
```
### Otomatik Arama Listesini Durdur/Başlat

<table>
<thead>
<tr>
<th>Değişken</th>
<th>Anlamı</th>
</tr>
</thead>
<tbody>

<tr>
<td><code>list_id</code></td>
<td>Durumunu güncelleyeceğiniz otomatik arama liste ID bilgisi  <em> Zorunlu parametre </em></td>
</tr>

<td><code>status</code></td>
<td>Durum bilgisi bu parametrede gönderilir. 1: listeyi aktifleştirmek için , 2: listeyi pasifleştirmek için gönderilir. <em>zorunlu parametre </em></td>
</tr>
</tbody>
</table>

```
       use Netgsm\Netsantral\Package as NetsantralPackage;
       $islem=new NetsantralPackage;
        $data=array(
            'list_id'=>"12430",
            'status'=>"1"
        );
        $sonuc=$islem->listChangeStatus($data);
        echo '<pre>';
            print_r($sonuc);
        echo '<pre>';

```
##### Başarılı istek örnek sonuç
```
Array
(
    [header] => stdClass Object
        (
            [error] => 
            [code] => 200
            [message] => Otomatik arama listesi başarıyla aktifleştirildi.
        )

    [body] => Array
        (
            [0] => stdClass Object
                (
                    [list_id] => 12505
                    [status] => 1
                )

        )

)
```
##### Başarısız istek örnek sonuç
```
Array
(
    [header] => stdClass Object
        (
            [error] => 1
            [code] => 70
            [message] => Hatalı sorgulama. Gönderdiğiniz parametrelerden birisi hatalı veya zorunlu alanlardan birinin eksik olduğunu ifade eder. Liste ID si yok.
        )

    [body] => Array
        (
        )

)
```
### Otomatik Arama Raporlama

```
	use Netgsm\Netsantral\Package as NetsantralPackage;
	$islem=new NetsantralPackage;
        $data=array('list_id'=>"12431");
        $sonuc=$islem->aramaRapor($data);
        echo '<pre>';
            print_r($sonuc);
        echo '<pre>';
	

```
##### Başarılı istek örnek sonuç
```
Array
(
    [header] => stdClass Object
        (
            [error] => 
            [code] => 200
            [message] => Raporlama basarili.
        )

    [body] => Array
        (
            [0] => stdClass Object
                (
                    [numbers_status] => Array
                        (
                            [0] => stdClass Object
                                (
                                    [type] => Hiç aranmamış
                                    [count] => 0
                                )

                            [1] => stdClass Object
                                (
                                    [type] => Başarılı
                                    [count] => 0
                                )

                            [2] => stdClass Object
                                (
                                    [type] => Başarısız
                                    [count] => 0
                                )

                            [3] => stdClass Object
                                (
                                    [type] => Tekrar aranacak
                                    [count] => 0
                                )

                        )

                    [numbers] => Array
                        (
                        )

                )

        )

)
```
##### Başarısız istek örnek sonuç
```
Array
(
    [header] => stdClass Object
        (
            [error] => 1
            [code] => 301
            [message] => Gönderilen ID değeri numerik ve sıfırdan büyük bir değer olmalıdır. 
        )

    [body] => Array
        (
        )

)
```
### Listeye Numara Ekle

<table>
<thead>
<tr>
<th>Değişken</th>
<th>Anlamı</th>
</tr>
</thead>
<tbody>

<tr>
<td><code>list_id</code></td>
<td>Otomatik arama liste ID bilgisi  <em> Zorunlu parametre </em></td>
</tr>

<td><code>name</code></td>
<td>Listenize eklenecek numara için ad - soyad bilgisi.  <em>zorunlu parametre </em></td>
</tr>
<tr>
<td><code>nstatus</code></td>
<td>Eklenecek numaranın durumunu ifade eder, 0 değeri gönderdiğinizde numaranın aranması pasif duruma geçer, 1 ile numaranın aranma durumunu aktif edebilrisiniz.</td>
</tr>
<tr>
<td><code>calltime</code></td>
<td>Numaranın aranacağı zamanı ileri tarih olarak belirleyebilirsiniz, numara formatı ddMMYYHHmm (Örneğin 05.09.2020 15:00 için 050920201500)</td>
</tr>
<tr>
<td><code>trunk</code></td>
<td>Aramanın yapılacağı dış numara seçilebilir.</td>
</tr>
</tbody>
</table>

Dinamik devam eden ya da durdurulmuş listenize numara ekleyebilirsiniz. 

```
	use Netgsm\Netsantral\Package as NetsantralPackage;
	$islem=new NetsantralPackage;
        $data=array(
            'list_id'=>"12431",
            'numbers'=>array( "number" => "542xxxxxxx","name" => "netgsm")
        );
        $sonuc=$islem->listeNumEkle($data);
        echo '<pre>';
            print_r($sonuc);
        echo '<pre>';

```
##### Başarılı istek örnek sonuç
```
Array
(
    [header] => stdClass Object
        (
            [error] => 
            [code] => 200
            [message] => 12505 ID numaralı projeye 1 numara eklenemedi. 
        )

    [body] => Array
        (
            [0] => stdClass Object
                (
                    [list_id] => 12505
                    [list_name] => list_name
                    [numbers] => Array
                        (
                            [0] => stdClass Object
                                (
                                    [number] => 542xxxxxxx
                                    [name] => netgsm
                                    [status] => error
                                )

                        )

                )

        )

)
```
##### Başarısız istek örnek sonuç
```
Array
(
    [header] => stdClass Object
        (
            [error] => 1
            [code] => 70
            [message] => Hatalı sorgulama. Gönderdiğiniz parametrelerden birisi hatalı veya zorunlu alanlardan birinin eksik olduğunu ifade eder. Numaraların ekleneceği proje ID si girilmelidir.
        )

    [body] => Array
        (
        )

)
```
### Listeden Numara Çıkar
<table>
<thead>
<tr>
<th>Değişken</th>
<th>Anlamı</th>
</tr>
</thead>
<tbody>
<tr>
<td><code>id</code></td>
<td>Listeden çıkarılacak numara IDsi gönderilir. Numaraya ait ID bilgisini numara eklediğinizde ya da raporlama yaptığınızda alabilirsiniz.  <em>zorunlu parametre </em></td>
</tr>
</tbody>
</table>

```
	use Netgsm\Netsantral\Package as NetsantralPackage;
	$islem=new NetsantralPackage;
        $data=array(
            'list_id'=>"12431",
            'id'=>'27229043'
        );
        $sonuc=$islem->listeNumCikar($data);
        echo '<pre>';
            print_r($sonuc);
        echo '<pre>';

```
### Numara Durum Güncelle

Listenizde bulunan bir numaranın aranma durumu, aranma tarihi, numaraya ait isim ya da numaranın aranacağı dış numara (trunk) bilgisi güncellenebilir.  

<table>
<thead>
<tr>
<th>Değişken</th>
<th>Anlamı</th>
</tr>
</thead>
<tbody>

<tr>
<td><code>list_id</code></td>
<td>Otomatik arama liste ID bilgisi  <em> Zorunlu parametre </em></td>
</tr>

<td><code>name</code></td>
<td>Listenize eklenecek numara için ad - soyad bilgisi.  <em>zorunlu parametre </em></td>
</tr>
<tr>
<td><code>nstatus</code></td>
<td>Eklenecek numaranın durumunu ifade eder, 0 değeri gönderdiğinizde numaranın aranması pasif duruma geçer, 1 ile numaranın aranma durumunu aktif edebilrisiniz.</td>
</tr>
<tr>
<td><code>calltime</code></td>
<td>Numaranın aranacağı zamanı ileri tarih olarak belirleyebilirsiniz, numara formatı ddMMYYHHmm (Örneğin 05.09.2020 15:00 için 050920201500)</td>
</tr>
<tr>
<td><code>trunk</code></td>
<td>Aramanın yapılacağı dış numara seçilebilir.</td>
</tr>
</tbody>
</table>

```
	use Netgsm\Netsantral\Package as NetsantralPackage;
	$islem=new NetsantralPackage;
        $data=array('list_id'=>"12431",
                    'id'=>"12356",
                    'name'=>'test',
                    'calltime'=>'50',
                    'trunk'=>'312xxxxxxx',
                    'nstatus'=>'0'

            );
        $sonuc=$islem->listeNumGuncelle($data);
        echo '<pre>';
            print_r($sonuc);
        echo '<pre>';

```

### Görüşme Detay (CDR)

Netsantralinizdeki görüşme kayıtlarına (CDRlarınıza) bu servisten ulaşabilirsiniz.  
Görüşme kayıtlarınızı, belirteceğiniz zaman aralığına göre, çağrıya ait uniqueid bilgisi ile, arayan - aranan numaraya göre sorgulayabilirsiniz.  
Çağrı detayı ve ses kaydı linkine ulaşabilirsiniz, ses kaydı linki CDR detayını santral çağrı trafiği de izleyerek alabilirsiniz, cdr scenario bilgisi ile tarafınıza bildirilir.  

<table>
<thead>
<tr>
<th>Parametre</th>
<th>Anlamı</th>
</tr>
</thead>
<tbody>

<td><code>startdate</code></td>
<td>İki tarih arası sorgulamanızda başlangıç tarihi (ddMMyyyyHHmm)</td>
</tr>
<tr>
<td><code>stopdate</code></td>
<td>İki tarih arası sorgulamanızda bitiş tarihi(ddMMyyyyHHmm)</td>
</tr>
<tr>
<td><code>uniqueid</code></td>
<td>uniqueid bilgisi ile sorgulama yapabilirsiniz.(1234567890.123459)</td>
</tr>
<tr>
<td><code>querytype</code></td>
<td>Aranan ya da arayan numara ile yapılan sorgulamalarda kullanmalısınız. 1 değeri aranan numara bilgisini, 2 değeri arayan numara bilgisini ifade eder.</td>
</tr>
<tr>
<td><code>no</code></td>
<td>Aranan ya da arayan numara ile yapılan sorgulamalarda numara bilgisini ifade eder.</td>
</tr>
</tbody>
</table>  

#### uniqueid ile cdr sorgulama

```
	use Netgsm\Netsantral\Package as NetsantralPackage;
	$islem=new NetsantralPackage;
        $data=array(
            'uniqueid' =>"sip9-1675248884.94499",
            );
        $sonuc=$islem->gorusmeDetay($data);
        echo '<pre>';
            print_r($sonuc);
        echo '<pre>';

```

#### querytype ile cdr sorgulama

```
	use Netgsm\Netsantral\Package as NetsantralPackage;
	$islem=new NetsantralPackage;
        $data=array(
            'querytype' =>"2",
            'startdate'=>'010220231000',
            'stopdate'=>'010220231400',
            'no'  =>"553xxxxxxx",
            );
        $sonuc=$islem->gorusmeDetay($data);
        echo '<pre>';
            print_r($sonuc);
        echo '<pre>';
```

#### Tarih aralığı ile cdr sorgulama

```
	use Netgsm\Netsantral\Package as NetsantralPackage;
	$islem=new NetsantralPackage;
        $data=array(
            'startdate'=>'010220231000',
            'stopdate'=>'010220231400',
            );
        $sonuc=$islem->gorusmeDetay($data);
        echo '<pre>';
            print_r($sonuc);
        echo '<pre>';
```
##### Başarılı istek örnek sonuç
```
Array
(
    [0] => stdClass Object
        (
            [uniqueid] => sip3-1675767033.92222
            [values] => Array
                (
                    [0] => stdClass Object
                        (
                            [date] => 07.02.2023 13:50:33
                            [destination] => 553xxxxxxx
                            [source] => 102
                            [duration] => 54
                            [direction] => 0
                            [recording] => https://dosyaindir.netgsm.com.tr/upload.php?tip=1&a=8f344a1062ac54................
                            [line] => 312xxxxxxx
                            [directory] => "102" <102>
                            [commonID] => 36xxxxxx
                        )

                )

        )
)
```
##### Başarısız istek örnek sonuç
```
Array
(
    [code] => 40
    [error] => Kayit bulunamadi
)
```
###### SERVİSTEN GELEN CEVAP  

<table>
<thead>
<tr>
<th>Parametre</th>
<th>Anlamı</th>
</tr>
</thead>
<tbody>
<tr>
<td><code>uniqueid</code></td>
<td>Çağrıya ait ID</td>
</tr>
<tr>
<td><code>values</code></td>
<td>Çağrıya ait değerler, array şeklinde döner.</td>
</tr>
<tr>
<td><code>destination</code></td>
<td>Aranan</td>
</tr>
<tr>
<td><code>source</code></td>
<td>Arayan</td>
</tr>
<tr>
<td><code>duration</code></td>
<td>Süre</td>
</tr>
<tr>
<td><code>direction</code></td>
<td>Yön</td>
</tr>
<tr>
<td><code>recording</code></td>
<td>Ses kaydı, varsa bu parametre döner.</td>
</tr>
<tr>
<td><code>line</code></td>
<td>Santrale gelen yada giden çağrının hangi trunk üzerinden çıkış yaptığı bilgisidir.</td>
</tr>
<tr>
<td><code>directory</code></td>
<td>Görüşme detayında yer alan rehber (ön ek bilgisi) bilgisi içerir.</td>
</tr>
</tbody>
</table>  

###### YÖN AÇIKLAMALARI


<table>
<thead>
<tr>
<th>Kod</th>
<th>Anlamı</th>
</tr>
</thead>
<tbody>
<tr>
<td><code>0</code></td>
<td>Giden Arama</td>
</tr>
<tr>
<td><code>1</code></td>
<td>Gelen Arama</td>
</tr>
<tr>
<td><code>2</code></td>
<td>Gelen Cevapsız Arama</td>
</tr>
<tr>
<td><code>3</code></td>
<td>Giden Cevapsız Arama</td>
</tr>
<tr>
<td><code>4</code></td>
<td>İç Arama</td>
</tr>
<tr>
<td><code>5</code></td>
<td>İç Cevapsız Arama</td>
</tr>
</tbody>
</table>

## İstatistik(Gelen Çağrı)  
Gelen çağrılarınızdan oluşan tarih bazlı istatistiğe bu servisle ulaşabilirsiniz.  

```
	use Netgsm\Netsantral\Package as NetsantralPackage;
	$islem=new NetsantralPackage;
        $data=array(
            'startdate' =>'310120231000',
            'stopdate'  =>'010220231600',
            );
        $sonuc=$islem->istatistikGelenCagri($data);
        echo '<pre>';
            print_r($sonuc);
        echo '<pre>';

```

<table>
<thead>
<tr>
<th>Kod</th>
<th>Anlamı</th>
</tr>
</thead>
<tbody>
<tr>
<td><code>date</code></td>
<td>İstatistik alınan gün bilgisi</td>
</tr>
<tr>
<td><code>incoming_call</code></td>
<td>Gelen çağrı sayısı</td>
</tr>
<tr>
<td><code>answered</code></td>
<td>Cevaplanan çağrı sayısı</td>
</tr>
<tr>
<td><code>noanswer</code></td>
<td>Cevapsız çağrı sayısı</td>
</tr>
<tr>
<td><code>abandoned</code></td>
<td>Terkedilmiş çağrı sayısı</td>
</tr>
<tr>
<td><code>t_calltime</code></td>
<td>Toplam konuşma süresi (sn)</td>
</tr>
<tr>
<td><code>t_waittime</code></td>
<td>Toplam Bekleme süresi (sn)</td>
</tr>
<tr>
<td><code>max_waiting</code></td>
<td>Maksimum Bekleme süresi (sn)</td>
</tr>
<tr>
<td><code>avr_waiting</code></td>
<td>Ortalama bekleme süresi (sn)</td>
</tr>
<tr>
<td><code>avr_answered</code></td>
<td>Ortalama Konuşma süresi (sn)</td>
</tr>
</tbody>
</table>
##### Başarılı istek örnek sonuç
```
Array
(
    [date] => 01.02.2023
    [answered] => 2
    [noanswer] => 0
    [t_calltime] => 39
    [t_waittime] => 42
    [max_waiting] => 16
    [avr_waiting] => 11
    [avr_answered] => 20
)
```
##### Başarısız istek örnek sonuç
```
Array
(
    [code] => 40
    [error] => Kayit Bulunamadi
)
```
### Gün Detayı 

Terkedilmiş, cevapsız, cevaplanan çağrı bilgisine ulaşılabilir.  

	use Netgsm\Netsantral\Package as NetsantralPackage;
	$islem=new NetsantralPackage;
        $data=array(
            'date' =>'01022023',
            );
        $sonuc=$islem->istatistikGunDetay($data);
        echo '<pre>';
            print_r($sonuc);
        echo '<pre>';

##### Başarılı istek örnek sonuç
```
Array
(
    [date] => 01.02.2023
    [answered] => 2
    [noanswer] => 0
    [t_calltime] => 39
    [t_waittime] => 42
    [max_waiting] => 16
    [avr_waiting] => 11
    [avr_answered] => 20
)
```
##### Başarısız istek örnek sonuç
```
Array
(
    [code] => 40
    [error] => Kayit Bulunamadi
)
```
