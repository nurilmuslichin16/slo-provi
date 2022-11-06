<?php


function sendMessage($telegram_id, $message_text, $meid) {
    $url = "https://api.telegram.org/bot5473618432:AAEDxPS_tXcW3nvVRqz4pweUOYbDIjue-d0/sendMessage?parse_mode=markdown&chat_id=" . $telegram_id;
    $url = $url . "&text=" . urlencode($message_text);
    $url = $url . "&reply_to_message_id=" . $meid;
    $ch = curl_init();
    $optArray = array(
            CURLOPT_URL => $url,
            CURLOPT_RETURNTRANSFER => true
    );
    curl_setopt_array($ch, $optArray);
    $result = curl_exec($ch);
    curl_close($ch);
}

function sendMessageSales($s_t_id, $message_text, $s_m_id) {
    $url = "https://api.telegram.org/bot5473618432:AAEDxPS_tXcW3nvVRqz4pweUOYbDIjue-d0/sendMessage?parse_mode=markdown&chat_id=" . $s_t_id;
    $url = $url . "&text=" . urlencode($message_text);
    $url = $url . "&reply_to_message_id=" . $s_m_id;
    $ch = curl_init();
    $optArray = array(
            CURLOPT_URL => $url,
            CURLOPT_RETURNTRANSFER => true
    );
    curl_setopt_array($ch, $optArray);
    $result = curl_exec($ch);
    curl_close($ch);
}

function sendChat($telegram_id, $message_text) {
    $url = "https://api.telegram.org/bot5473618432:AAEDxPS_tXcW3nvVRqz4pweUOYbDIjue-d0/sendMessage?parse_mode=markdown&chat_id=" . $telegram_id;
    $url = $url . "&text=" . urlencode($message_text);
    $ch = curl_init();
    $optArray = array(
            CURLOPT_URL => $url,
            CURLOPT_RETURNTRANSFER => true
    );
    curl_setopt_array($ch, $optArray);
    $result = curl_exec($ch);
    curl_close($ch);
}

function randoms_string($len = 10) {
    $word = array_merge(range('a', 'z'), range('A', 'Z'), range(0, 9));
    shuffle($word);
    return substr(implode($word), 0, $len);
}


function bCrypt($pass,$cost){
      $chars='./ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
 
      // Build the beginning of the salt
      $salt=sprintf('$2a$%02d$',$cost);
 
      // Seed the random generator
      mt_srand();
 
      // Generate a random salt
      for($i=0;$i<22;$i++) $salt.=$chars[mt_rand(0,63)];
 
     // return the hash
    return crypt($pass,$salt);
}

function statusProvi($status_id)
{
    if ($status_id == 1) {
        return '<span class="label label-danger">waiting</span>';
    }
    else if ($status_id == 2) {
        return '<span class="label label-warning">ogp</span>';
    }
    else if ($status_id == 3) {
        return '<span class="label label-warning">fact</span>';
    }
    else if ($status_id == 4) {
        return "comp";
    }
    else if ($status_id == 5) {
        return '<span class="label label-warning">fdata</span>';
    }
    else if ($status_id == 6) {
        return  "live";
    }
    else if ($status_id == 7) {
        return "ps";
    }
    else{
        return "FALSE";
    }
}

if ( ! function_exists('tgl_indo'))
{
    function date_indo($tgl)
    {
        $ubah = gmdate($tgl, time()+60*60*8);
        $pecah = explode("-",$ubah);
        $tanggal = $pecah[2];
        $bulan = bulan($pecah[1]);
        $tahun = $pecah[0];
        return $tanggal.' '.$bulan.' '.$tahun;
    }
}
  
if ( ! function_exists('bulan'))
{
    function bulan($bln)
    {
        switch ($bln)
        {
            case 1:
                return "Jan";
                break;
            case 2:
                return "Feb";
                break;
            case 3:
                return "Mar";
                break;
            case 4:
                return "Apr";
                break;
            case 5:
                return "Mei";
                break;
            case 6:
                return "Juni";
                break;
            case 7:
                return "Juli";
                break;
            case 8:
                return "Agt";
                break;
            case 9:
                return "Sept";
                break;
            case 10:
                return "Okt";
                break;
            case 11:
                return "Nov";
                break;
            case 12:
                return "Des";
                break;
        }
    }
}

//Format Shortdate
if ( ! function_exists('shortdate_indo'))
{
    function shortdate_indo($tgl)
    {
        $ubah = gmdate($tgl, time()+60*60*8);
        $pecah = explode("-",$ubah);
        $tanggal = $pecah[2];
        $bulan = short_bulan($pecah[1]);
        $tahun = $pecah[0];
        return $tanggal.'/'.$bulan.'/'.$tahun;
    }
}
  
if ( ! function_exists('short_bulan'))
{
    function short_bulan($bln)
    {
        switch ($bln)
        {
            case 1:
                return "01";
                break;
            case 2:
                return "02";
                break;
            case 3:
                return "03";
                break;
            case 4:
                return "04";
                break;
            case 5:
                return "05";
                break;
            case 6:
                return "06";
                break;
            case 7:
                return "07";
                break;
            case 8:
                return "08";
                break;
            case 9:
                return "09";
                break;
            case 10:
                return "10";
                break;
            case 11:
                return "11";
                break;
            case 12:
                return "12";
                break;
        }
    }
}

//Format Medium date
if ( ! function_exists('mediumdate_indo'))
{
    function mediumdate_indo($tgl)
    {
        $ubah = gmdate($tgl, time()+60*60*8);
        $pecah = explode("-",$ubah);
        $tanggal = $pecah[2];
        $bulan = medium_bulan($pecah[1]);
        $tahun = $pecah[0];
        return $tanggal.'-'.$bulan.'-'.$tahun;
    }
}
  
if ( ! function_exists('medium_bulan'))
{
    function medium_bulan($bln)
    {
        switch ($bln)
        {
            case 1:
                return "Jan";
                break;
            case 2:
                return "Feb";
                break;
            case 3:
                return "Mar";
                break;
            case 4:
                return "Apr";
                break;
            case 5:
                return "Mei";
                break;
            case 6:
                return "Jun";
                break;
            case 7:
                return "Jul";
                break;
            case 8:
                return "Ags";
                break;
            case 9:
                return "Sep";
                break;
            case 10:
                return "Okt";
                break;
            case 11:
                return "Nov";
                break;
            case 12:
                return "Des";
                break;
        }
    }
}
 
//Long date indo Format
if ( ! function_exists('longdate_indo'))
{
    function longdate_indo($tanggal)
    {
        $ubah = gmdate($tanggal, time()+60*60*8);
        $pecah = explode("-",$ubah);
        $tgl = $pecah[2];
        $bln = $pecah[1];
        $thn = $pecah[0];
        $bulan = bulan($pecah[1]);
  
        $nama = date("l", mktime(0,0,0,$bln,$tgl,$thn));
        $nama_hari = "";
        if($nama=="Sunday") {$nama_hari="Minggu";}
        else if($nama=="Monday") {$nama_hari="Senin";}
        else if($nama=="Tuesday") {$nama_hari="Selasa";}
        else if($nama=="Wednesday") {$nama_hari="Rabu";}
        else if($nama=="Thursday") {$nama_hari="Kamis";}
        else if($nama=="Friday") {$nama_hari="Jumat";}
        else if($nama=="Saturday") {$nama_hari="Sabtu";}
        return $nama_hari.','.$tgl.' '.$bulan.' '.$thn;
    }
}

function option_tahun()
{
    $y = date('Y');
    for($i=2019;$i<=$y;$i++){
        echo "<option value=\"$i\">$i</option>";
    }
}

function option_bulan()
{
    $formattedMonthArray = array(
        "1" => "Januari", "2" => "Februari", "3" => "Maret", "4" => "April",
        "5" => "Mei", "6" => "Juni", "7" => "Juli", "8" => "Agustus",
        "9" => "September", "10" => "Oktober", "11" => "November", "12" => "Desember",
    );
    for($i=1;$i<=12;$i++){
        echo "<option value=\"$i\">$formattedMonthArray[$i]</option>";
    }
}

function option_tahun_filtered($year)
{
    $y = date('Y');
    for($i=2019;$i<=$y;$i++){
        if($year == $i){
            $ceked = "selected=\"selected\"";
        }
        else{
            $ceked = "";
        }
        echo "<option value=\"$i\" $ceked >$i</option>";
    }
}

function option_bulan_filtered($month)
{
    $formattedMonthArray = array(
        "1" => "Januari", "2" => "Februari", "3" => "Maret", "4" => "April",
        "5" => "Mei", "6" => "Juni", "7" => "Juli", "8" => "Agustus",
        "9" => "September", "10" => "Oktober", "11" => "November", "12" => "Desember",
    );
    for($i=1;$i<=12;$i++){
        if($month == $i){
            $ceked = "selected=\"selected\"";
        }
        else{
            $ceked = "";
        }
        echo "<option value=\"$i\" $ceked >$formattedMonthArray[$i]</option>";
    }
}
