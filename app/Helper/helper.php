<?php

    function text_shuffle($len)
    {
    	$text = password_hash(time(), PASSWORD_DEFAULT);
    	$text = str_replace('$', '', $text);
    	$text = str_replace('/', '', $text);
    	$text = str_replace('.', '', $text);
    	return substr($text, rand(1, 25), intval($len));
    }

    function trimText($text, $length)
    {
        if ( mb_strlen($text, 'UTF-8') > $length) {
            return mb_substr($text, 0, $length, 'utf-8').' ...';
        }else {
            return $text;
        }
    }

    function getUri($slug, $class)
    {
        if( \Request::getRequestUri() == $slug )
        {
            return $class;
        }
    }

    function getLang()
    {
        return \App::getLocale();
    }
    
    
    function setting()
    {
        $site = App\Models\Setting::first();

        if ($site === null) {
            $site = new App\Models\Setting();
        }
        return $site;
    }

    function adminInfo($data)
    {
        //The admin must be logged in
        if ( auth('AuthAdmin')->check() ) {
            return auth('AuthAdmin')->user()->$data;
        }else {
            return redirect('/auth/admin');
        }
        
    }

    
    function formatSizeUnits($path)
    {
        $bytes = sprintf('%u', filesize($path));

        if ($bytes > 0){
            $unit = intval(log($bytes, 1024));
            $units = array('B', 'KB', 'MB', 'GB');

            if (array_key_exists($unit, $units) === true)
            {
                return sprintf('%d %s', $bytes / pow(1024, $unit), $units[$unit]);
            }
        }
        return $bytes;
    }

    function remove_space($text) {
        $text = trim($text);
        $text = str_replace(' ', '-', $text);
        return $text;
    }

    function remove_dash($text) {

        $text = str_replace('-', ' ', $text);
        return $text;
    }


?>



